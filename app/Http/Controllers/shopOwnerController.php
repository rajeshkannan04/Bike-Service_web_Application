<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopOwner;
use App\Models\User;
use App\Models\BikeService;
use App\Models\Customers;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class shopOwnerController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/shopOwner/shopOwner');
    }
   
    public function create(String $id, Request $request)
    {
        if ($user = shopOwner::where('users_id', $id)->first()){
            $user->shopName = $request->shopName;
            $user->users_id = $id;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->service1 = $request->service1;
            $user->service2 = $request->service2;
            $user->service3 = $request->service3;
            $user->service4 = $request->service4;
            $user->service5 = $request->service5;
            $user->rate1 = $request->rate1;
            $user->rate2 = $request->rate2;
            $user->rate3 = $request->rate3;
            $user->rate4 = $request->rate4;
            $user->rate5 = $request->rate5;
            $user->save();
            return redirect()->route('BickSer',['id'=>$id]);
        } else {
            $user = new ShopOwner();
            $user->shopName = $request->shopName;
            $user->users_id = $id;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->service1 = $request->service1;
            $user->service2 = $request->service2;
            $user->service3 = $request->service3;
            $user->service4 = $request->service4;
            $user->service5 = $request->service5;
            $user->rate1 = $request->rate1;
            $user->rate2 = $request->rate2;
            $user->rate3 = $request->rate3;
            $user->rate4 = $request->rate4;
            $user->rate5 = $request->rate5;
            $user->save();
            return redirect()->route('BickSer',['id'=>$id]);
        }
    }

    public function index(string $id)
    {
        $user = shopOwner::where('users_id',$id)->first();
        if($image = Images::where('users_id',$id)->first()){
            return view('shopOwner', compact('user','image'));
        } else {
            $image = "upload";
            return view('shopOwner', compact('user','image'));
        }
    }

    public function home(String $id)
    {
        $user = User::where('id', $id)->first();
        if ($shopOwner = ShopOwner::where('users_id',$id)->first())
        {
            if ($image = Images::where('users_id',$id)->first()){
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
    }

    public function register(string $id)
    {
        return view('registerShop', compact('id'));
    }

    public function edit(string $id)
    {
        if($user = ShopOwner::where('users_id',$id)->first()){
            if($image = Images::where('users_id', $id)->first()){
                return view('shopOwnerProfile', compact('user','image'));
            } else {
                $image = 'upload';
                return view('shopOwnerProfile', compact('user','image'));
            }
        } else {
            $user = User::where('id',$id)->first();
            $image = 'upload';
            return view('shopOwnerProfile', compact('user','image'));
        }
    }

    public function history(string $id)
    {
        $ShopOwnerHistory =  BikeService::where('shop_owners_id',$id)->get();
        $CustomerName = [];
        foreach ($ShopOwnerHistory as $data){
            $customer = User::where('id',$data->users_id)->first();
            $CustomerName[] = $customer->name;
        }
        $user = ShopOwner::where('id', $id)->first();
        if($image = Images::where('users_id',$user->users_id)->first()){
            return view('historySO', compact('ShopOwnerHistory','CustomerName','image','user'));
        }else {
            $image = 'upload';
            return view('historySO', compact('ShopOwnerHistory','CustomerName','image','user'));
        }
    }

    public function bookingStatus(string $data, string $id)
    {
        $booking = BikeService::where('id',$id)->first();
        $booking->status = $data;
        $booking->save();
        return redirect()->route('historySO',['id'=>$booking->shop_owners_id]);
    }

    public function image(string $id,Request $request)
    {
        $owner = ShopOwner::where('users_id',$id)->first();

        if ($Image = Images::where('users_id', $id)->first()) {
            if ($request->file('image')){
                $image = $request->file('image');
                $imageName = time()."".$image->getClientOriginalName();
                $imagePath = $image->storeAs('/public/profile',$imageName);
                $Image->image = $imageName;
            }
            $Image->save();
            return redirect()->route('getImage',['id'=>$id]);
        } else{
            $Image = new Images();
            $Image->users_id = $id;
            if ($request->file('image')){
                $image = $request->file('image');
                $imageName = time()."-".$image->getClientOriginalName();
                $imagePath = $image->storeAs('/public/profile',$imageName);
                $Image->image = $imageName;
            }
            $Image->save();
            return redirect()->route('getImage',['id'=>$id]);
        }
    }
    
    public function getImage(string $id,Request $request)
    {
        $Image = Images::where('users_id', $id)->first();
        if($owner = ShopOwner::where('users_id',$id)->first()){
            return view('shopOwnerProfile', compact('Image','owner'));   
        } else {
            $owner = User::where('id',$id)->first();
            return view('shopOwnerProfile', compact('Image','owner'));   
        }
    }

    public function about(String $id)
    {
        $user = User::where('id', $id)->first();
        if ($shopOwner = ShopOwner::where('users_id',$id)->first())
        {
            if ($image = Images::where('users_id',$id)->first()){
                $user = $shopOwner;
                return view('shopOwnerAbout', compact('user','image'));
            } else{
                $image = 'upload';
                $user = $shopOwner;
                return view('shopOwnerAbout', compact('user','image'));
            }
        } else{
            $image = 'upload';
            return view('shopOwnerAbout', compact('user','image'));
        }
    }

    public function contact(String $id)
    {
        $user = User::where('id', $id)->first();
        if ($shopOwner = ShopOwner::where('users_id',$id)->first())
        {
            if ($image = Images::where('users_id',$id)->first()){
                $user = $shopOwner;
                return view('shopOwnerContact', compact('user','image'));
            } else{
                $image = 'upload';
                $user = $shopOwner;
                return view('shopOwnerContact', compact('user','image'));
            }
        } else{
            $image = 'upload';
            return view('shopOwnerContact', compact('user','image'));
        }
    }
}
