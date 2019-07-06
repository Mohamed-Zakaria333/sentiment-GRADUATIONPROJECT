<?php

use Illuminate\Database\Seeder;

class fillTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     //   	for($i=1;$i<=40;$i++)
    	// {
     //        DB::table('products')->insert([
     //        'pro_name' =>'EcommerceproductNum'.$i,
     //        'pro_price' =>rand(100,500),
     //        'pro_amount' =>20,
     //        'pro_description' => 'The more powerful the customer’s fantasy of owning the product, the more likely they are to buy it. Therefore',
     //        'pro_imgPath' => 'pro ('.$i.').jpg',
     //        'pro_catagory' => 'clothes',
     //        'pro_returnPolicy'=>"You can replace and return this product within 15 days",
     //        'pro_feature1'=>"this is an feature one",
     //        'pro_feature2'=>"this is an feature tow",
     //        'pro_feature3'=>"this is an feature three",
     //        'pro_feature4'=>"this is an feature four",
     //        'pro_feature5'=>"this is an feature five",
     //        'pro_paymentMethods'=>'Debit|net banking',
     //        'created_at' => date("Y-m-d H:i:s"),
            
     //    ]);
     //    }




        	for($i=1;$i<30;$i++)
    	{




               for($j=1;$j<300;$j++)
               {

                if($j%2 == 0 )
            	{

                 DB::table('comments')->insert([
            	'user_id' => 1,
            	'product_id' => $i,
            	'comment' => posComment(),
                'sentiment_result' => 'positive',
                'sentiment_ratio' => 0.8,
                'created_at' => date("Y-m-d H:i:s"),
                // 'updated_at' => date("Y-m-d H:i:s"),
                 ]);

            	}
                if($j%2 == 0 && $j>150)
            	{

                DB::table('comments')->insert([
            	'user_id' =>2,
            	'product_id' =>$i,
            	'comment' =>negComment(),
                'sentiment_result' => 'negative',
                'sentiment_ratio' => 0.2,
                'created_at' => date("Y-m-d H:i:s"),
                
                 ]);
            	}
               }






          }
}
}
