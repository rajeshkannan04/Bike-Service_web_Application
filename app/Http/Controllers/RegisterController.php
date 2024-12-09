<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BickService;
use App\Models\ShopOwner;
use App\Models\User;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index(string $userType)
    {
        $email = "clear";
        return view('sign-in', compact('userType','email'));
    }

    public function signup(string $userType)
    {
        $user = $userType;
        $alert = 'none';
        return view('sign-up', compact('user','alert'));
    }

    public function loginCustomer(string $userType, Request $request)
    {
        if (Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
        {
            $user = User::where('email', $request->email)->first();

            if ($userType == $user->userType)
            { 
                return view('customer', compact('user'));
            } else if($user->userType == "shopOwner") {
                $email = "incorrect";  
                return view('sign-in', compact('email','userType'));
            }
        } else {
            $email = "incorrect";
            return view('sign-in', compact('email','userType'));
        }
    }

    public function loginShopowner(string $userType, Request $request)
    {
        if (Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
        {
            $user = User::where('email', $request->email)->first();
            if ($userType == $user->userType)
            {
                if ($shopOwner = ShopOwner::where('users_id',$user->id)->first())
                {
                    if ($image = Images::where('users_id',$user->id)->first()){
                        $user = $shopOwner;
                        return view('shopOwner', compact('user','image'));
                    } else{
                        $image = 'upload';
                        $user = $shopOwner;
                        return view('shopOwner', compact('user','image'));
                    }
                } else{
                    $image = 'upload';
                    return view('shopOwner', compact('user','image'));
                }
            } else {
                $email = "incorrect";
                return view('sign-in', compact('email','userType'));
            }
        } else {
            $email = "incorrect";
            return view('sign-in', compact('email','userType'));
        }
    }

    public function store(Request $request)
    {
        if (User::where('email', $request->email)->first()){
            $alert = "exits";
            $user = $request->userType;
            return view('sign-up', compact('user','alert'));
        } else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->userType = $request->userType;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('newUser',['id'=>$user->id]);
        }
    }

    public function show(string $id)
    {
        $user = User::where('id',$id)->first();
        if ($user->userType == "customer") {
            $owner = $user;
            return view('customer',compact('user','owner'));
        }
        else if ($user->userType == "shopOwner") {
            if($image = Images::where('users_id',$id)->first()){
                return view('shopOwner', compact('user','image'));
            } else {
                $image = 'upload';
                return view('shopOwner', compact('user','image'));
            }
        }
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
