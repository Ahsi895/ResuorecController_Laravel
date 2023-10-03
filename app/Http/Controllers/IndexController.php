<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Mechanic;
use App\Models\Role;
// use App\Models\roleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Member;

class IndexController extends Controller
{
    public function index(){
            return Member::with('getGroup')->get();
    }
    public function user(){
        return Group::with('getUser')->get();
    }
    public function belong(){
        return Member::with('belong')->get();
    }
    public function getRolerelation(){
        return Role::with('users')->get();
    }
    public function userRoles(){
        $user =  User::with('roles')->get();
        return $user;
    }
    public function get(){
        return Role::with('users')->get();
    }
    public function owner(){
        return Mechanic::with('carOwner')->get();
    }
    public function many(){
        return Mechanic::with('many')->get();
    }
}
