<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/analytic.blade.php */ ?>
<?php $__env->startSection('sidebar'); ?>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?php echo e(url($avatars_path)); ?>/<?php echo e(Session::get('active_admin')[1]); ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><span style="margin-right: 10px"><?php echo e(Session::get('active_admin')[2]); ?></span><?php echo e(Session::get('active_admin')[3]); ?></h5>
          <li class="mt">
            <!-- mt -->
            <a  href="<?php echo e(route('Editing')); ?>">
              <!-- fa fa-dashboard -->
              <i class="fa fa-dashboard"></i>
              <span>Edit/Delete</span>
              </a>
          </li>
          <li class="mt">
            <a  href="<?php echo e(route('Adding')); ?>">
              <i class="fa fa-desktop"></i>
              <span>ADD product</span>
              </a>
 
          </li>
          <li class="mt">
            <a class = "active" href="<?php echo e(route('Analyting',[Config::get('first_analyting_product')])); ?>">
              <i class="fa fa-cogs"></i>
              <span>Comment analytic</span>
              </a>
 
          </li>
          <li class="mt">
            <a href="<?php echo e(route('Requesting')); ?>">
              <i class="fa fa-book"></i>
              <span>Product Requests</span>
              </a>
 
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                     <div style="color: #ffa500;margin-left:12px; "><span style="margin-right: 10px"><?php echo e($rating); ?></span>from 5</div>
                     <div style="color: #4ecdc4;margin-left:12px; "><?php echo e($comment_total); ?></div> 
                     <div style="color: #4ecdc4;margin-left:12px; "><?php echo e($positive_num); ?></div> 
                     <div style="color: #4ecdc4;margin-left:12px; "><?php echo e($netural_num); ?></div> 
                     <div style="color: #4ecdc4;margin-left:12px; "><?php echo e($negative_num); ?></div> 



                </div>

                    <?php if($comment_total==0||$negative_user_num<=1): ?>
                  
                    <?php else: ?>
                    
                  <a  href="<?php echo e(route('Mailing_mv',['product'=>$product_id->id,'num'=>$negative_user_num])); ?>"> <div class="broadcast">broadcast to negative</div> </a>
                     
                     <?php endif; ?>

                 
               </div>          

            

                  
                <?php $__currentLoopData = $product_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                              
            <div class="L_comment">
            <div class="top">
            <div class="userimage">    
            <img class="img" src="<?php echo e(url($avatars_path)); ?>/<?php echo e($product_comment->user->avatar); ?>" style="width:50px;height:50px">
            </div>
           <div class="details">
            <div class="name"> <?php echo e($product_comment->user->email); ?></div>
            <div class="date"> <?php echo e($product_comment->created_at); ?></div>
            </div>
           </div>
           <div class="text">
               <?php echo e($product_comment->comment); ?>


             </div>  

            </div>
                  <?php if($product_comment->sentiment_result=='positive'): ?>
                  <div class="R_comment_P">
                <div class="emojy" align="center" style="margin-top: 30px;margin-bottom: 10px;"><img class="img" src="<?php echo e(url($slidingimages_admin_path)); ?>/4.png" style="width:32%;height:32px">  </div>

             <!-- <div class="res">positive</div> 
             <div class="emojy"><img class="img" src="slidingImages/4.png" style="width:40%;height:40px">  </div> -->
           </div>
                
                <?php else: ?>
                 <div class="R_comment_N">
                  <div class="emojy" align="center" style="margin-top: 20px;margin-bottom: 10px;"><img class="img" src="<?php echo e(url($slidingimages_admin_path)); ?>/1.png" style="width:32%;height:32px">  </div>
                  <div class="link">
                  <a href="<?php echo e(route('Mailing_sv',['id'=>$product_comment->user->id ,'product'=>$product_comment->product_id])); ?>">send mail</a>
                  </div>

        <!--     <div class="res">negative</div> 
             <div class="emojy"><img class="img" src="slidingImages/1.png" style="width:40%;height:40px">  </div>
            <div class="link">
             <a href="">send mail</a>
            </div> -->
           </div>
           <?php endif; ?>

                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 <?php if($comment_total==0): ?>
                <div class="no_comment">
                  there is no comments on this product
               
                </div>
                <?php endif; ?>
        </div>
        <div class="searching"  style="height: 1000px;">
          <form>
            <div class="search_f">
            <input type="text" name="searching" placeholder="filter results">
            </div>

          </form>
             
           
                  
                <?php for($i=0;$i<$products->count();$i++): ?> 
              

                <a class="active" href="<?php echo e(route('Analyting',['id'=>$products[$i]->id])); ?>"> <div class="pro" >  
                <img class="img" src="<?php echo e(url($uploaded_img_path)); ?>/<?php echo e($products[$i]->pro_imgPath); ?>" style="width:100%;height:150px">
                <div class="totalcomment">
                <?php echo e($_twoD[$i][1]); ?>

                </div>
                <div class="positive" >
                <?php echo e($_twoD[$i][2]); ?>

                </div>
                <div class="negative" >
                <?php echo e($_twoD[$i][3]); ?>

                </div> 
                </div></a>

               <?php endfor; ?>

        </div>


    </section>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>