<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\user_comment;
use Illuminate\Support\Facades\Auth;
use Config;
use Session;

use Illuminate\Support\Facades\DB;
class productController extends Controller
{




        function __construct() {
         //Config::get('status');
         
        }








   //==================================================
   //==================================================
    public function PAYMENT()
    {
       return view('website.payment');

    }
 public function CHECKOUT()
    {
       return view('website.checkout');

    }

   //==================================================
   //==================================================









    public function contact()
    {
       return view('website.contact');

    }

   public function about()
    {
     return view('website.about');
      
    }



















    public function index()
    {
        $products=DB::table('products')->orderBy('id', 'desc')->get();
        //$d = DB::table('products')->where('id',3)->get();
        // dd($d->'img-path');
       //dd(get_avatar_name('mohamed','zakaria'));
        return view('website.index')->with('products',$products);
    }

























    public function product_details($id)
    {
      $product=DB::table('products')->where('id',$id)->get();
      $product_comments=\App\thecomment::where('product_id',$id)->orderBy('created_at', 'desc')->get();
      
      //rating calculation
      $comment_total=$product_comments->count();
      $positive_num=\App\thecomment::where(['sentiment_result'=>'positive','product_id'=>$id])->get()->count();
      $negative_num=\App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$id])->get()->count();
      $netural_num=\App\thecomment::where(['sentiment_result'=>'netural','product_id'=>$id])->get()->count();
      if($comment_total==0)
      {
        $rating = '0.0';
      }
      else
      {
        
        $rating = number_format(($positive_num/$comment_total)*5,1);   

      }
      //end rating calculation
   // $login_status = Config::get('login_status');
      // dd(Config::get('status'));
       return view('website.product_details',
        ['product' => $product,
        'product_comments'=>$product_comments,
        'comment_total'=>$comment_total,
        'positive_num'=> $positive_num,
        'netural_num'=> $netural_num,
        'negative_num'=>$negative_num,
        'status' => Session::get('status'),
        'rating'=>$rating


        ]);

    }




    public function search(Request $catagory)
    {
      
        $cata = $catagory->agileinfo_search;


      $products=DB::table('products')->where('pro_catagory',$cata)->orderBy('created_at', 'desc')->get();
       //,klkkkkkkkkkkkkkkkkkkkkkkkkkkkkkbgv                                                                                                dd($products);
    
       return view('website.index',['products' => $products]);

    }



















    public function submit_comment(Request $request,$id)
    {
           
       $this->validate($request, [
       'comment'  => 'required',
     ]);


    
  



       
       $product=DB::table('products')->where('id',$id)->first();
       //dd($product);
       $last_comment = DB::table('comments')->where('product_id',$id)->orderBy('created_at', 'desc')->first();
       //$ser = new ($last_comment);
      // dd($last_comment);
       if($last_comment==null)
       {

            DB::table('comments')->insert(['comment' => $request->input('comment'), 'sentiment_result' => 'positive','sentiment_ratio' => 0.7,'product_id'=>$id,'user_id' => Auth::user()->id,'created_at' => date("Y-m-d H:i:s")]);
             $comment_username=\App\thecomment::where('product_id',$id)->first();  
            // event(new user_comment($comment_username->user->email,$product->proNAME));

       }
       elseif($request->input('comment')==$last_comment->comment)
        {
        $sentiment_result = $request->input('comment');
        }
        else
        {

                 $request->input('comment');
         DB::table('comments')->insert(['comment' => $request->input('comment'), 'sentiment_result' => 'positive','sentiment_ratio' => 0.7 ,'product_id'=>$id,'user_id' => Auth::user()->id,'created_at' => date("Y-m-d H:i:s")]);
              $comment_username=\App\thecomment::where('product_id',$id)->first();  
            //  event(new user_comment($comment_username->user->email,$product->proNAME));
        }



         
       $product=DB::table('products')->where('id',$id)->get();
      // $product_comments=\App\thecomment::where('product_id',$id)->orderBy('created_at', 'desc')->get();
       //$login_status = Config::get('login_status');
      $product_comments=\App\thecomment::where('product_id',$id)->orderBy('created_at', 'desc')->get();


      
      //rating calculation
      $comment_total=$product_comments->count();
      $positive_num=\App\thecomment::where(['sentiment_result'=>'positive','product_id'=>$id])->get()->count();
      $negative_num=\App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$id])->get()->count();
      $netural_num=\App\thecomment::where(['sentiment_result'=>'netural','product_id'=>$id])->get()->count();
      if($comment_total==0)
      {
        $rating = '0.0';
      }
      else
      {
        
        $rating = 3.5;   

      }
      
      //end rating calculation
       //  dd(Config::get('status'));
        return view('website.product_details',
        ['product' => $product,
        'product_comments'=>$product_comments,
        'comment_total'=>$comment_total,
        'positive_num'=> $positive_num,
        'netural_num'=> $netural_num,
        'negative_num'=>$negative_num,
        'status' => Session::get('status'),
        'rating'=>$rating


        ]);
    }

}
