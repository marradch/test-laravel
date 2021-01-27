<?php

namespace App\Http\Middleware;

use App\Modules\Captcha\CaptchaServiceContract;
use Closure;
use Illuminate\Http\Request;

class FormCaptchaValidate
{
    protected $captchaService;

    public function __construct(CaptchaServiceContract $captchaService)
    {
        $this->captchaService = $captchaService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->input('captcha_code')) {
            return redirect()->back()->with('error', 'Captcha code is empty!');
        }

        if (!$request->input('captcha_key')) {
            return redirect()->back()->with('error', 'Captcha key is missing!');
        }

        $pass = $this->captchaService->validate($request->input('captcha_key'), $request->input('captcha_code'));

        if (!$pass) {
            return redirect()->back()->with('error', 'Captcha code is wrong!');
        }

        return $next($request);
    }
}
