    <?php
         function image_name($old_name) {
            $string = $old_name;
			$substring ='(';
			$substring2 =')';

			$firstIndex = stripos($string, $substring);
			$lastIndex = strripos($string, $substring2);
			$length = $lastIndex-($firstIndex+1);
			$number = substr($string, $firstIndex+1, $length);
			$new = 'pro ('.($number+1).').';
		   return $new;
         }
         function get_avatar_name($first_name,$lastname)
         {
             $char1 = substr($first_name,0,1);
             $char2 = substr($lastname,0,1);
             return strtoupper($char1).strtoupper($char2);
         }
              function remove_extention($imgName)
         {
              $substring2 ='.';
              $lastIndex = strripos($imgName, $substring2);
              return substr($imgName,0,$lastIndex);
         }
         function posComment() {
         $names = array(
        'this product is very well and have alot of advantages  ',
        'The speed of delivery to home and as described in the site completely',
        'Cheap compared to other products of the category to which he belongs',
        'Available throughout time and against industrial defects and easy return',
        'Contains many properties that may be lacking in other products',
        'Excellent product and super excellent deal from the manufacturer'
        // and so on
         );
    return $names[rand ( 0 , count($names) -1)];
           }
         function negComment() {
         $names = array(
        'You care about the delegate that is the best deal for us',
        'It lacks a lot of supplies',
        'Price is expensive compared to its features located in other devices have more features and lower price',
        'We are waiting for updates to speed up the fingerprint, solve its problems and treat the ligates',
        'There is no way for the product to be used',
        'Ores are very bad and do not work efficiently',
        'soooo bad'
        // and so on
         );
    return $names[rand ( 0 , count($names) -1)];
           }





      ?>