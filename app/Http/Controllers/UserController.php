<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Aduan;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'postLogin', 'login']]);
    }

    public function index()
    {
        if(Auth::guest())
        {
            return View('auth.login');
        } else {
            return \Redirect::route('members');
        }

    }

    public function login()
    {
        return View('auth.login');
    }

    public function index2()
    {
        $level = null;

        if(empty(Auth::user()->level->nama))
        {
            \Session::put('error', 'You are not authorized!');
            return \Redirect('logout');
        } else {
            $level = Auth::user()->level->nama;
        }

        if($level == 'Admin')
            return View('members.admin.index');

        if($level == 'Supervisor')
            return Redirect::route('members.supervisor.laporan.index');

        if($level == 'Technician')
            return Redirect::route('members.technician.index');

        if($level == 'User')
            return Redirect::route('members.user.laporan.index');

        if($level == 'Data Entry')
            return View('members.dataentry.index');

        if($level == null)
            return Redirect::route('logout');

    }

    public function postLogin()
    {
        $request = Request::all();
        $validation = \Validator::make(Request::all(), [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if($validation->fails()) {
            Session::flash('error', 'The credentials fails!');
            return Redirect::route('login');
        } else {

            $user = Auth::attempt([
                'username'  => Request::get('username'),
                'password'  => Request::get('password'),
                'status'    => '1'
            ]);

            if($user)
            {
                if(Auth::check())
                {
                    \Session::flash('success', 'You have successfully logged in');
                    return Redirect::intended('members');
                } else
                    return 'Failed';
            } else {

                \Session::flash('error', 'Kata nama dan kata laluan tidak sepadan!');
                return Redirect::route('login');
            }
        }
    }

    public function password()
    {
        return View('members.password');
    }

    public function passwordPost()
    {
        Validator::extend('hashmatch', function($attribute, $value, $parameters)
        {
            return \Hash::check($value, Auth::user()->$parameters[0]);
        });

        $messages = array(
            'hashmatch' => 'Your current password must match your account password.'
        );

        $validation = Validator::make(\Request::all(),[
            'old'           => 'required|hashmatch:password',
            'new'           => 'required|min:6|different:old',
            'confirmation'  => 'required|same:new'
        ]);

        if($validation->fails())
            return Redirect::back()->withInput()->withErrors($validation);
        else {

            $user = User::findOrFail(Auth::user()->username);
            $user->password = \Hash::make(Request::get('new'));

            if($user->save())
                \Session::flash('success', 'Kata Laluan berjaya ditukar');
            else
                \Session::flash('fail', 'Kata Laluan gagal ditukar');

            return Redirect::route('password');
        }

    }

    public function complaint()
    {
        $bil = 1;

        if(Auth::user()->level_id == 1)
            $messages = Aduan::all();
        else
            $messages = Aduan::where('username', Auth::user()->username)->get();

        return View('members.complaint', compact('bil', 'messages'));
    }

    public function complaintpost()
    {
        return \Request::all();
    }

    public function complaintEdit($id)
    {
        $message = Aduan::findOrFail($id);

        return View('members.admin.complaint', compact('message'));
    }

    public function complaintUpdate($id)
    {
        $message = Aduan::findOrFail($id);

        $message->fill(\Input::all());

        if($message->save())
            \Session::flash('success', 'Maklumbalas berjaya');
        else
            \Session::flash('fail', 'Maklumbalas gagal');

        return Redirect::route('complaint');

    }

    public function selfProfile() {
        return View('members.selfProfile');
    }

    public function logout()
    {
        Auth::logout();
        return \Redirect::route('home');
    }
}
