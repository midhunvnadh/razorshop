<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if(isset($query)){
            $products = Products::select('name', 'price', 'id')->where("id", "LIKE", "%$query%")->get();
        }else{
            $products = Products::select('name', 'price', 'id')->get();
        }
        return $products;
    }

    public function insert(Request $request)
    {
        $fields = $request->validate([
            "ProductName"=> "min:8",
            "ProductDesc"=> "min:8",
            "ProductPrice"=> "numeric",
            "ProductTags"=> "min:2",
            "ProductPicture"=> "min:1",
        ]);

        $p = new Products();
        $p->name = $fields["ProductName"];
        $p->description = $fields["ProductDesc"];
        $p->tags = $fields["ProductTags"];
        $p->image = $fields["ProductPicture"];
        $p->price = $fields["ProductPrice"];

        $p->save();

        return $fields;
    }

    public function viewProduct(string $id)
    {
        $product = Products::find($id);
        if($product == null){
            return redirect("/");
        }
        $product->makeHidden(["image"]);


        return view('product-page', ['product'=>$product]);
    }

    public function image(string $id)
    {
        $product = Products::find($id);
        $image = $product->image;

        $ex = explode(",", $image);
        $contents = $ex[1];
        $mime = $ex[0];
        $p1 = explode(":", $mime)[1];
        $ct = explode(";", $p1)[0];

        $contents = base64_decode($contents);

        $res = new Response($contents);
        $res->header("Content-Type", "$ct");

        return $res;
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $product = Products::find($id);
        $product->delete();
    }
}
