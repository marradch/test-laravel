<?php

namespace App\Modules\Captcha;

interface CaptchaServiceContract
{
    public function generate(string $formKey);

    public function validate(string $formKey, string $inputValue);
}
