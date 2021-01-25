<?php

namespace App\Modules\Captcha;

class CaptchaService implements CaptchaServiceContract
{
    protected static $n = 8;

    public function generate(string $formKey)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < self::$n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        session([$formKey.'.captcha' => $randomString]);

        return $randomString;
    }

    public function validate(string $formKey, string $inputValue)
    {
        $originValue = session($formKey.'.captcha');

        return $inputValue == $originValue;
    }
}
