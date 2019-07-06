<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\DB;
class cart extends Controller
{
   public function cart()
   {
    return view('website.checkout');
   }
  //=================================================
  //=================================================
  //=================================================
   public function show_payment()
   {
    return view('website.payment');
   }

   public function applay_payment()
   {
    return view('website.payment');
   }




  //=================================================
  //=================================================
  //=================================================





















   public function addToCart($id)
    {

    	//dd(56565656+786876);
          $product=DB::table('products')->where('id',$id)->first();
 
        if(!$product) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
       
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "name" => $product->pro_name,
                        "quantity" => 1,
                        "price" => $product->pro_price,
                        "photo" => $product->pro_imgPath,
                        "Admin_amount" => $product->pro_amount
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            
            //dd($cart[$id]['Admin_amount']);
             //dd($cart[$id]['quantity']);
            if($cart[$id]['quantity']>=$cart[$id]['Admin_amount'])
            {
            
            }
            else
            {
             $cart[$id]['quantity']++;

            }




            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
                        "name" => $product->pro_name,
                        "quantity" => 1,
                        "price" => $product->pro_price,
                        "photo" => $product->pro_imgPath,
                        "Admin_amount" => $product->pro_amount
        ];
                 
        session()->put('cart', $cart);
        
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }











//====================================================================
//====================================================================    
public function update(Request $request)
    {
          //dd(434+3434);
        if($request->id and $request->new_amount)
        {
             $cart = session()->get('cart');
            if($request->new_amount>=$cart[$request->id]["Admin_amount"])
            {
           
            $cart[$request->id]["quantity"] =$cart[$request->id]["Admin_amount"];
            session()->put('cart', $cart);
            session()->flash('updated', 'Cart updated successfully');
            }
             else {
        
            $cart[$request->id]["quantity"] = $request->new_amount;
            session()->put('cart', $cart);
            session()->flash('updated', 'Cart updated successfully');
             }
        }
           return redirect()->back()->with('updated', 'cart updated successfully!');



  }
 









//================================================
  public function del_from_Cart($id)
    {
         
 
            $cart = session()->get('cart');
 
            if(isset($cart[$id])) {
 
                unset($cart[$id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        
            return back()->with('success', 'Product added to cart successfully!');


    }


}
