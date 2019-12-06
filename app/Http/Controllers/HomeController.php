<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/');
    }

    public function showFormEdit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function updateSuccess(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('/');
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current_password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }

    public function postCredentials(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::check()) {
                $request_data = $request->All();
                $validator = $this->admin_credential_rules($request_data);
                if ($validator->fails()) {
                    return response()->json(array('error' => $validator->getMessageBag()->toArray()));
                } else {
                    $current_password = Auth::user()->password;
                    if (Hash::check($request_data['current_password'], $current_password)) {
                        $obj_user = Auth::user();
                        $obj_user->password = Hash::make($request_data['password']);;
                        $obj_user->save();
                        return response()->json(array('success' => "thanh cong"));
                    } else {
                        $error = array('current-password' => 'Please enter correct current password');
                        return response()->json(array('error' => $error));
                    }
                }
//            } else {
//                return redirect()->to('/');
            }
        }
    }
}
