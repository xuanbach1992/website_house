<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

// không dùng đến function index
//    public function index()
//    {
//        return view('/');
//    }
    public function showChangePass(){
        return view('user.change_pass');
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

//    public function admin_credential_rules(array $data)
//    {
//        $messages = [
//            'current_password.required' => 'Please enter current password',
//            'password.required' => 'Please enter password',
//        ];
//
//        $validator = Validator::make($data, [
//            'current_password' => 'required',
//            'password' => 'required|same:password',
//            'password_confirmation' => 'required|same:password',
//        ], $messages);
//
//        return $validator;
//    }

//    public function postCredentials(Request $request)
//    {
//        if(Auth::check())
//        {
//            $request_data = $request->All();
//            $validator = $this->admin_credential_rules($request_data);
//            if($validator->fails())
//            {
//                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
//            }
//            else
//            {
//                $current_password = Auth::user()->password;
//                if(Hash::check($request_data['current_password'], $current_password))
//                {
//                    $user_id = Auth::user()->id;
//                    $obj_user = User::find($user_id);
//                    $obj_user->password = Hash::make($request_data['password']);;
//                    $obj_user->save();
//                    return redirect()->to('/');
//                }
//                else
//                {
//                    $error = array('current_password' => 'Please enter correct current password');
//                    return response()->json(array('error' => $error), 400);
//                }
//            }
//        }
//        else
//        {
//            return redirect()->to('/');
//        }
//    }
    public function index()
    {
        return view('changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('success','Doi pass thanh cong');
       return redirect()->route('index');
    }
    public function indexTest(){
        return view('page.home');
    }

    public function productTest(){
        return view('page.product');
    }

    public function contactTest(){
        return view('page.contact');
    }

    public function blogTest(){
        return view('page.blog');
    }

    public function aboutTest(){
        return view('page.about');
    }
}
