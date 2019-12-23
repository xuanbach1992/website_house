<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        return view('welcome');
//        return view('page.home');
    }

    public function showChangePass()
    {
        return view('user.change_pass');
    }

    public function showFormEdit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function updateSuccess(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if($request->file('images')){
            $file = $request->file('images');
            $filename = $file->getClientOriginalName('images');
            $file->move('storage/rooms',$filename);
            $user->images = $filename;
        }
        $user->save();
        toastr()->success('Cap nhat thanh cong');
        return redirect('/');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','string', 'min:6'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        toastr()->success('Doi pass thanh cong');
        return redirect()->route('index');
    }


    public function contactTest()
    {
        return view('page.contact');
    }

    public function blogTest()
    {
        return view('page.blog');
    }

    public function aboutTest()
    {
        return view('page.about');
    }

    public function propertydetails(){
        return view('page.property-details');
    }
}
