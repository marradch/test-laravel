<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Modules\Captcha\CaptchaService;

class FormCaptcha implements Rule
{
    protected $formKey;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($formKey)
    {
        $this->formKey = $formKey;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (new CaptchaService())->validate($this->formKey, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Entered captcha is not valid.';
    }
}
