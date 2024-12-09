<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\ShopOwner;
use App\Models\BikeService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
 


class CustomerController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();   
        return redirect('/shopOwner');
    }
    
    public function index(String $id)
    {
        if ($user = User::where('id', $id)->first()){
            return view('customer', compact('user'));
        } else{
            return back()->with("unsuccessful");
        }
    }

    public function order(Request $request, String $id)
    {
        $data = new BikeService();
        $data->bookingDate = $request->BookDate;
        $data->deliverDate = $request->DeliverDate;
        $data->bikemodel = $request->bikeModel;
        $data->bikebrand = $request->bikebrand;
        $data->city = $request->city;
        $data->users_id = $id;
        $data->service1 = $request->service1;
        $data->service2 = $request->service2;
        $data->service3 = $request->service3;
        $data->service4 = $request->service4;
        $data->service5 = $request->service5;
        $data->rate1 = $request->rate1;
        $data->rate2 = $request->rate2;
        $data->rate3 = $request->rate3;
        $data->rate4 = $request->rate4;
        $data->rate5 = $request->rate5;
        $data->shop_owners_id = $request->shopName;
        $data->aditional = $request->additional;
        $data->save();

        return redirect()->route('booked',['id'=>$id]);
    }

    public function show(string $id)
    {
        $data = ShopOwner::get();
        $encryptedData = Crypt::encryptString($data);
        return view('bookService', compact('id','encryptedData'));
    }

    public function history(String $id)
    {
        $history = BikeService::where('users_id',$id)->get();
        $user = User::where('id', $id)->first();
        $shopOwner = [];
        foreach($history as $data){
            $shop = ShopOwner::where('id',$data->shop_owners_id)->first();
            $shopOwner[] = array(
                "name" => $shop->shopName,
                "address" => $shop->address
            );
        }
        return view('historyCus', compact('history','shopOwner','user'));
    }

    public function home(String $id)
    {
        $user = User::where('id', $id)->first();
        return view('customer', compact('user')); 
    }

    public function cancleBook(String $id)
    {
        $data = BikeService::where('id',$id)->first();
        $data->status = "cancle";
        $data->save();

        return redirect()->route('historyCustomer',['id'=>$data->users_id]);
    }

    public function about(String $id)
    {
        $user = User::where('id', $id)->first();
        if($user->userType == 'customer'){
            return view('CustomerAbout', compact('user'));
        }
    }

    public function contact(String $id)
    {
        $user = User::where('id', $id)->first();
        return view('CustomerContact', compact('user'));
    }

    public function decrypted(Request $request)
    {
        $encryptedData = $request->input('encryptedData');
        try {
            $decryptedData = Crypt::decryptString($encryptedData);
            return response()->json($decryptedData);
        } catch (\Illuminate\contracts\Encryption\DecryptException $e) {
            return response()->json(['error' => 'Decryption Failed'],400);
        }
    }
}
