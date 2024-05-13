<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Products;

class CartController extends Controller
{
    public function add($id){
        if(Auth::check()){
            $user = Auth::user();
            $cart = new Cart();
            $cart->userid = $user->id;
            $cart->product_id = $id;
            $cart->save();

            return [
                "error"=>false,
            ];
        }
        return [
            "error" => true,
            "message" => "Not logged in"
        ];
    }
    public function view(){
        if(Auth::check()){
            $user = Auth::user();
            $items = Cart::join("products", "products.id", "=", "cart.product_id")
            ->select("products.name", "products.price", "cart.id", "products.id as product_id")
            ->where("cart.userid", $user->id)
            ->get();

            return $items;
        }
        return [
            "error" => true,
            "message" => "Not logged in"
        ];
    }
    public function delete($id){
        if(Auth::check()){
            $user = Auth::user();

            $item = Cart::find($id);
            $item->delete();

            return [
                "success"=> true,
                "id" => $id
            ];
        }
        return [
            "error" => true,
            "message" => "Not logged in",
        ];
    }
}
