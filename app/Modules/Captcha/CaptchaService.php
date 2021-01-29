<?php

namespace App\Modules\Captcha;

class CaptchaService implements CaptchaServiceContract
{
    protected static $n = 8;

    private function generateCode(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < self::$n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    private function generateKey(string $formKey): string
    {
        return $formKey.'.captcha.'.date('U');
    }

    public function validate(string $formKey, string $inputValue): bool
    {
        $originValue = session($formKey);

        $pass = ($inputValue === $originValue);

        session()->forget($formKey);

        return $pass;
    }

    public function build(string $formKey) : string
    {
        $captchaCode = $this->generateCode();
        $formKey = $this->generateKey($formKey);

        session([$formKey => $captchaCode]);

        $widgetString = <<<WIDGET
        <label for="captcha_code">Enter code: $captchaCode</label>
        <input name="captcha_code" type="text" value="" class="form-control">
        <input type="hidden" name="captcha_key" value="$formKey">
WIDGET;

        return $widgetString;
    }
}
