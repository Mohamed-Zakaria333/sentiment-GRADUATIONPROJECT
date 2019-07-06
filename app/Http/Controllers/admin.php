<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Config;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Support\Carbon;
use App\Mail\comment_replay;
use Carbon\Carbon;

class admin extends Controller
{
private $fff;
         // constructor
        function __construct() {
           $fff=DB::table('products')->orderBy('id', 'desc')->first();
           //dd($fff);
           if($fff==null)
           {
           Config::set('first_analyting_product',-1);
           }
         else
         {

            Config::set('first_analyting_product',$fff->id);
         }

         
        }


  
   

    
    public function index()
    {
         $products=DB::table('products')->orderBy('id', 'desc')->get();
        return view('admin.index')->with('products',$products);
        
    }
     public function edit_pro($id)
     {
     
     $product=\App\theproduct::find($id);
     return view('admin.Modifing')->with('product',$product);


     }


















      public function del($id)
    {
     //dd($id);
      $product=DB::table('products')->where('id',$id)->get();
      $product_comments=\App\thecomment::where('product_id',$id)->delete();
      
      foreach ($product as $pro) {
        //dd(public_path('uploaded').'\\'.$pro->pro_imgPath);
       File::delete(public_path('uploaded').'\\'.$pro->pro_imgPath);
      }
      
      DB::table('products')->where('id', $id)->delete();
      $products=DB::table('products')->orderBy('id', 'desc')->get();
    
     
      
     //dd($product->pro_imgPath);
     //File::delete(public_path('uploaded').'/$product->pro_imgPath');
     return view('admin.index')->with('products',$products)->with('suc', 'product deleted Successfully');
        //dd($suc);
    }








          public function Requests()
    {
           return view('admin.productRequests');
   }






















    public function analysis_page($id)
    {
  //dd($id);

    if($id == -1)
     {
      return view('admin.noanalyting');
     }

    


     else
     {

      $_twoD = array();
      //================================================

     $products=DB::table('products')->orderBy('id', 'desc')->get();
  


     $product_id=\App\theproduct::find($id);
     $product_comments=\App\thecomment::where('product_id',$id)->orderBy('created_at', 'desc')->get();
     $positive_num=\App\thecomment::where(['sentiment_result'=>'positive','product_id'=>$id])->get()->count();
     //======================================================
     $negative_num=\App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$id])->get()->count();
    // $negative_user_num = \App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$id])->groupBy('user_id');
     //=======================
     $negative_user_num =  \App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$id])->distinct()->get(['user_id'])->count();
     
    //========================


     //======================================================
     $netural_num=\App\thecomment::where(['sentiment_result'=>'netural','product_id'=>$id])->get()->count();
     $comment_total=$product_comments->count();
    if($comment_total==0)
      {
        $rating = '0.0';
      }
      else
      {
        
        $rating = 3.5;   

      }



      for($t=0;$t<$products->count();$t++)
      {
        $total=\App\thecomment::where('product_id',$products[$t]->id)->orderBy('created_at', 'desc')->get()->count();
        $pos=\App\thecomment::where(['sentiment_result'=>'positive','product_id'=>$products[$t]->id])->get()->count();
        $neg=\App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$products[$t]->id])->get()->count();
        $_twoD[$t][0] = $products[$t]->id;
        $_twoD[$t][1] = $total;
        $_twoD[$t][2] = $pos;
        $_twoD[$t][3] = $neg;
      }
      // dd($_twoD);
    



     //dd($products);
     return view('admin.analytic',[
        'products'=>$products,
        'product_id'=>$product_id,
        'product_comments'=>$product_comments,
        'positive_num'=>$positive_num,
        'netural_num'=> $netural_num,
        'rating'=>$rating,
        'negative_num'=>$negative_num,
        'comment_total'=>$comment_total,
        '_twoD' => $_twoD,
        'negative_user_num'=>$negative_user_num
        



 ]);
   }
        
    }



























//=========================================================
//=========================================================
//=========================================================
//=========================================================
  public function singleMail($product,$id)
  {
   $user = \App\theuser::find($id);
   $product= \App\theproduct::find($product);
  // dd( $product->proNAME);

   $source = "www.mywebsite.com";
  // $subject = 'Replaying your comment on product '.'('.$user->email.')';
   return view('admin.sendMail',
    ['source'=>$source,
     'user'=>$user,
     'product'=>$product
      ]);
  }
  public function apply_single_send(Request $request,$id)
  {
//===================
 $pro=DB::table('products')->where('id',$request->input('pro_id'))->first();
 $user=DB::table('users')->where('id',$request->input('user_id'))->first();
//===================         
 if($request->input('subject')==null)
 {

$subject = 'Replaying your comment on product    ({{$product->pro_name}})';
 }
 else
 {
$subject = $request->input('subject');
 }
 if($request->input('content')==null)
 {

$content = 'Thank you for your interest in commenting on our product. We read your comment and focused on some things that might bother you and which we will improve in the near future';
 }
 else
 {
$content = $request->input('content');
 }
  $data = [
           'fname' => $user->Fname,
           'lname' => $user->Lname,
           'content' => $content ,
           'pro_img' =>$pro->pro_imgPath ,
           'pro_name' =>$pro->pro_name 
   ];





        Mail::to($user->email)->send(new comment_replay($data));
       return back()->with('success', 'product added Successfully');
 //return redirect()->with();

  }
  //========
  //========
  //========


  public function multipleMails($num,$product)
  {
      $negative_user_emails =  \App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$product])->distinct()->get(['user_id']);
  


      $source = "www.mywebsite.com";
      $number = $num; 
      $user= "multiple users";
      $product= \App\theproduct::find($product);

   //dd(223+223);
   return view('admin.multipleMails',
     ['source'=>$source,
     'user'=>$user,
     'number'=>$number,
     'product'=>$product,
     'neg_users' => $negative_user_emails
      ]);

  }


    public function apply_multi_send(Request $request)
  {
//===================
 $pro=DB::table('products')->where('id',$request->input('pro_id'))->first();
 
 $neg_users= \App\thecomment::where(['sentiment_result'=>'negative','product_id'=>$request->input('pro_id')])->distinct()->get(['user_id']);
// dd($neg_users);
//===================         
if($request->input('subject')==null)
 {

$subject = 'Replaying your comment on product    ({{$product->pro_name}})';
 }
 else
 {
$subject = $request->input('subject');
 }
 if($request->input('content')==null)
 {

$content = 'Thank you for your interest in commenting on our product. We read your comment and focused on some things that might bother you and which we will improve in the near future';
 }
 else
 {
$content = $request->input('content');
 }


foreach ($neg_users as $neg_user) {
   
  $data = [
           'fname' => $neg_user->user->Fname,
           'lname' => $neg_user->user->Lname,
           'content' => $request->input('content') ,
           'pro_img' =>$pro->pro_imgPath ,
           'pro_name' =>$pro->pro_name 
   ];
$when = Carbon::now()->addMinutes(1);
Mail::to($neg_user->user->email)->later($when, new comment_replay($data));

}
 return back()->with('success', 'product added Successfully');


  }
//=========================================================
//=========================================================
//=========================================================
//=========================================================























public function add()
{

return view('admin.adding');


  
}




























































    public function store(Request $request)
    {
        $this->validate($request, [
       'file-image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       'pro_price' => 'required',
       'pro_catagory' => 'required',
       'pro_name' => 'required',
       'pro_amount' => 'required',
       'pro_paymentMethods' => 'required',
       
     ]);
     //======================================================
     $name = $request->input('pro_name');
     $salary = $request->input('pro_price');
     $description = $request->input('pro_description');
     $amount = $request->input('pro_amount');
     $catagory = $request->input('pro_catagory');
     $image = $request->file('file-image');
     $returnPolicy = $request->input('pro_returnPolicy');
     $feature1 = $request->input('pro_feature1');
     $feature2 = $request->input('pro_feature2');
     $feature3 = $request->input('pro_feature3');
     $feature4 = $request->input('pro_feature4');
     $feature5 = $request->input('pro_feature5');
     $paymentMethods = implode("|",$request->input('pro_paymentMethods'));
     //=======
       if($catagory==null)
     {
      $returnPolicy="You can replace and return this product within 15 days";
     }  
     if($returnPolicy==null)
     {
      $returnPolicy="You can replace and return this product within 15 days";
     }    


     if($feature1==null)
     {
      $feature1="this is an feature one";
     }
     if($feature2==null)
     {
            $feature2="this is an feature tow";
     }
    if($feature3==null)
     {
            $feature3="this is an feature three";
     }
    if($feature4==null)
     {
            $feature4="this is an feature foure";
     }
    if($feature5==null)
     {
            $feature5="this is an feature five";
     }

     //=======
     $last_element =  DB::table('products')->orderBy('id', 'desc')->first();
     if($last_element===null)
     {
        $last_img_name = "pro (0)";
     }
    else
     {
       $last_img_name = $last_element->pro_imgPath;
     }
     $new_name =image_name($last_img_name).$image->getClientOriginalExtension();
    
     
    $image->move(public_path('uploaded'), $new_name);
     //=======
     
     //======================================================
      DB::table('products')->insert(['pro_name' => $name, 'pro_price' => $salary,'pro_amount'=>$amount,'pro_imgPath' =>  $new_name ,'pro_returnPolicy'=>$returnPolicy,'pro_feature1'=>$feature1,'pro_feature2'=>$feature2,'pro_feature3'=>$feature3,'pro_feature4'=>$feature4,'pro_feature5'=>$feature5,'pro_paymentMethods'=>$paymentMethods,'created_at' => date("Y-m-d H:i:s"),'pro_description'=>$description,'pro_catagory'=>$catagory]);





      //=====================================================
    return redirect()->route('Adding')->with('success', 'product added Successfully');

    }
    //========================================================






































    public  function exe_modifing(Request $request) 
    {


//=======================================================
      $id=$request->input('product_id');
      $produc =  DB::table('products')->where('id',$id);
       $product= DB::table('products')->where('id',$id)->first();
//========================================================
      // dd($target_pro);
     $name = $request->input('pro_name');
     //dd($name);
     $salary = $request->input('pro_price');
     $description = $request->input('pro_description');
     $amount = $request->input('pro_amount');
     $catagory = $request->input('pro_catagory');
     $image = $request->file('file-image');
     $returnPolicy = $request->input('pro_returnPolicy');
     $feature1 = $request->input('pro_feature1');
     $feature2 = $request->input('pro_feature2');
     $feature3 = $request->input('pro_feature3');
     $feature4 = $request->input('pro_feature4');
     $feature5 = $request->input('pro_feature5');
     $paymentMethods = implode("|",$request->input('pro_paymentMethods'));
     //=======
    if($name==null)
     {
      $name=$product->pro_name;
     }
      if($salary==null)
     {
      $salary=$product->pro_price;
     }
      if( $description==null)
     {
       $description=$product->pro_description;
     }
      if( $amount==null)
     {
      $amount=$product->pro_amount;
     }
      if($returnPolicy==null)
     {
     $returnPolicy=$product->pro_returnPolicy;
     }
      if($paymentMethods==null)
     {
      $paymentMethods=$product->pro_returnPolicy;
     }
         //===============================

     if($feature1==null)
     {
      $feature1=$product->pro_feature1;
     }
     if($feature2==null)
     {
            $feature2=$product->pro_feature2;
     }
    if($feature3==null)
     {
            $feature3=$product->pro_feature3;
     }
    if($feature4==null)
     {
            $feature4=$product->pro_feature4;
     }
    if($feature5==null)
     {
            $feature5=$product->pro_feature5;
     }

     //=======
//==================================================
       if($request->file('file-image')=="")
       {
    DB::table('products')->where('id',$id)->update(['pro_name' => $name, 'pro_price' => $salary,'pro_amount'=>$amount,'pro_returnPolicy'=>$returnPolicy,'pro_feature1'=>$feature1,'pro_feature2'=>$feature2,'pro_feature3'=>$feature3,'pro_feature4'=>$feature4,'pro_feature5'=>$feature5,'pro_paymentMethods'=>$paymentMethods,'updated_at' => date("Y-m-d H:i:s"),'pro_description'=>$description,'pro_catagory'=>$catagory]);
       }
      else
      {
         //=======
        //delete_old_image
       File::delete(public_path('uploaded').'\\'.$product->pro_imgPath);     
     $new_name =remove_extention($product->pro_imgPath).'.'.$image->getClientOriginalExtension();
    
     
    $image->move(public_path('uploaded'), $new_name);
     //=======
        DB::table('products')->where('id',$id)->update(['pro_name' => $name, 'pro_price' => $salary,'pro_amount'=>$amount,'pro_imgPath' =>  $new_name ,'pro_returnPolicy'=>$returnPolicy,'pro_feature1'=>$feature1,'pro_feature2'=>$feature2,'pro_feature3'=>$feature3,'pro_feature4'=>$feature4,'pro_feature5'=>$feature5,'pro_paymentMethods'=>$paymentMethods,'updated_at' => date("Y-m-d H:i:s"),'pro_description'=>$description,'pro_catagory'=>$catagory]);
       
      }
      
 

    
      return redirect()->route('modifing',['id'=>$id])->with('success', 'product modified Successfully');
    }


}
