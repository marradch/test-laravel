<?php

namespace App\Modules\Captcha;

interface CaptchaServiceContract
{
    public function validate(string $formKey, string $inputValue): bool;

    public function build(string $formKey) : string;
}
