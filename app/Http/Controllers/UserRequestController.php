<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    private static function generateCaptchaString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public function add(Request $request)
    {
        return view('user-request/add', [
            'captchaString' => self::generateCaptchaString(8)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'title' => ['required', 'unique:requests', 'max:255'],
            'description' => ['required'],
            'entered_code' => ['same:origin_code']
        ]);

        $model = new UserRequest();

		$columns = $model->getFillable();
		foreach ($validatedData as $key => $value)
		{
			if (in_array($key, $columns))
			{
				$model->$key = $value;
			}
		}

		$model->save();

        return redirect('/');
    }

    public function index()
    {
        return view('user-request/index', [
            'userRequests' => UserRequest::paginate(2)
        ]);
    }
}
