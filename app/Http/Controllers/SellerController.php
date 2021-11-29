<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\seller;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class SellerController extends Controller
{
    function index()
    {
        $seller = product::find(3)->seller()->orderBy('id', 'desc')->get();
        $product = seller::find(2)->product()->get(); //get products attributes also stock and price
        $allSeller = seller::all();
        $allProduct = product::all();
        return view('welcome', compact('seller', 'allSeller', 'allProduct'));
    }
    function getProductsBySeller(Request $request)
    {
        $bySeller=[];
        if(count($request->id)==0){
            return "500";
        }
        else{
            for ($i = 0; $i < count($request->id); $i++) {
                $seller=seller::find($request->id[$i])->product()->get()->toArray();
                array_push($bySeller,$seller);
            }
             return $bySeller;
        
        }

        // return view('bySeller',compact('bySeller','allSeller'));
    }
    function getProductsToName(Request $request)
        {
            $products=[];
            $count = count($request->id);
            if ($count == 0) {
                return "0";
            } else {
                for ($i = 0; $i < $count; $i++) {
                    $product=product::find($request->id[$i])->seller()->get()->toArray();
                    array_push($products,$product);
                    
                }
                 return $product;
            }
            
        }
}
