<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Psy\Util\Json;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AngularController extends Controller
{

    public function index()
    {
        return View('members.admin.angular');
    }

    public function users($user)
    {
        $users = User::where('nama', 'like', '%' . $user . '%')->get();

        return \Response::json($users);
    }
}
