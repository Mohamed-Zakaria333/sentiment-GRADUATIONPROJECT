
@extends('admin.layouts.master')
@section('sidebar')
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{url($avatars_path)}}/{{Session::get('active_admin')[1]}}" class="img-circle" width="80"></a></p>
          <h5 class="centered"><span style="margin-right: 10px">{{Session::get('active_admin')[2]}}</span>{{Session::get('active_admin')[3]}}</h5>
          <li class="mt">
            <!-- mt -->
            <a  href="{{ route('Editing')}}">
              <!-- fa fa-dashboard -->
              <i class="fa fa-dashboard"></i>
              <span>Edit/Delete</span>
              </a>
          </li>
          <li class="mt">
            <a  href="{{ route('Adding')}}">
              <i class="fa fa-desktop"></i>
              <span>ADD product</span>
              </a>
 
          </li>
          <li class="mt">
            <a class = "active" href="{{ route('Analyting',[Config::get('first_analyting_product')])}}">
              <i class="fa fa-cogs"></i>
              <span>Comment analytic</span>
              </a>
 
          </li>
          <li class="mt">
            <a href="{{ route('Requesting')}}">
              <i class="fa fa-book"></i>
              <span>Product Requests</span>
              </a>
 
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>



@endsection
@section('content')
    <section id="main-content">
      <section class="wrapper">


        <div class = "Comment_container" style="height: 1000px;">
               <div class="results" id="const">
                  
                  <div style="float: left;color: white;font-size: 20px;" >
                   <div>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  
                  <div>total comment        </div>
                  <div>positive           </div>
                  <div>netural           </div>
                  <div>negative           </div>
                  </div>
                  </div>
                  <div style="float: left;color: white;font-size: 20px;" >
                     <div style="color: #ffa500;margin-left:12px; "><span style="margin-right: 10px">{{$rating}}</span>from 5</div>
                     <div style="color: #4ecdc4;margin-left:12px; ">{{$comment_total}}</div> 
                     <div style="color: #4ecdc4;margin-left:12px; ">{{$positive_num}}</div> 
                     <div style="color: #4ecdc4;margin-left:12px; ">{{$netural_num}}</div> 
                     <div style="color: #4ecdc4;margin-left:12px; ">{{$negative_num}}</div> 



                </div>

                    @if($comment_total==0||$negative_user_num<=1)
                  
                    @else
                    
                  <a  href="{{ route('Mailing_mv',['product'=>$product_id->id,'num'=>$negative_user_num])}}"> <div class="broadcast">broadcast to negative</div> </a>
                     
                     @endif

                 
               </div>          

            

                  
                @foreach($product_comments as $product_comment)
               
                              
            <div class="L_comment">
            <div class="top">
            <div class="userimage">    
            <img class="img" src="{{url($avatars_path)}}/{{$product_comment->user->avatar}}" style="width:50px;height:50px">
            </div>
           <div class="details">
            <div class="name"> {{$product_comment->user->email}}</div>
            <div class="date"> {{$product_comment->created_at}}</div>
            </div>
           </div>
           <div class="text">
               {{$product_comment->comment}}

             </div>  

            </div>
                  @if($product_comment->sentiment_result=='positive')
                  <div class="R_comment_P">
                <div class="emojy" align="center" style="margin-top: 30px;margin-bottom: 10px;"><img class="img" src="{{url($slidingimages_admin_path)}}/4.png" style="width:32%;height:32px">  </div>

             <!-- <div class="res">positive</div> 
             <div class="emojy"><img class="img" src="slidingImages/4.png" style="width:40%;height:40px">  </div> -->
           </div>
                
                @else
                 <div class="R_comment_N">
                  <div class="emojy" align="center" style="margin-top: 20px;margin-bottom: 10px;"><img class="img" src="{{url($slidingimages_admin_path)}}/1.png" style="width:32%;height:32px">  </div>
                  <div class="link">
                  <a href="{{route('Mailing_sv',['id'=>$product_comment->user->id ,'product'=>$product_comment->product_id])}}">send mail</a>
                  </div>

        <!--     <div class="res">negative</div> 
             <div class="emojy"><img class="img" src="slidingImages/1.png" style="width:40%;height:40px">  </div>
            <div class="link">
             <a href="">send mail</a>
            </div> -->
           </div>
           @endif

                
                @endforeach

                 @if($comment_total==0)
                <div class="no_comment">
                  there is no comments on this product
               
                </div>
                @endif
        </div>
        <div class="searching"  style="height: 1000px;">
          <form>
            <div class="search_f">
            <input type="text" name="searching" placeholder="filter results">
            </div>

          </form>
             
           
                  
                @for($i=0;$i<$products->count();$i++) 
              

                <a class="active" href="{{ route('Analyting',['id'=>$products[$i]->id])}}"> <div class="pro" >  
                <img class="img" src="{{url($uploaded_img_path)}}/{{$products[$i]->pro_imgPath}}" style="width:100%;height:150px">
                <div class="totalcomment">
                {{$_twoD[$i][1]}}
                </div>
                <div class="positive" >
                {{$_twoD[$i][2]}}
                </div>
                <div class="negative" >
                {{$_twoD[$i][3]}}
                </div> 
                </div></a>

               @endfor

        </div>


    </section>
  </section>
@endsection
