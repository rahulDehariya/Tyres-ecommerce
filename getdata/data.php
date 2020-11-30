<?php



    include_once './config/config.php';







/**



 * 



 */



class Dbconfig



{



  function __construct() {



    



  }



  function __destruct()



  {



    mysqli_close($con);



  }



}



/**



 * Created class for getting data of categories



 */



class Category extends Dbconfig



{



   public function __construct() {



        parent::__construct();



        error_reporting(E_ALL);

        

        //echo 1111;die;

    }







function check11()

{

  return '1111';

}



function getTopCategories($accNum)

{



  global $con;







  // images.type 4 = Category thumb 



  



    $sql = "SELECT categories.*,concat('".SITE_URL."assets/images/".$accNum."/',images.imageName) as image FROM `categories` LEFT JOIN images  ON categories.categoryNum = images.Num WHERE categories.accNum = $accNum and images.type=3";



    $where .= " AND parent = 0"; //[top]



    if($where!='')



    {



      $sql .= $where;



    }



    $result=mysqli_query($con,$sql);



    // Associative array



    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    {



      $categoryArray[] = $row;



    }



    mysqli_free_result($result);



    return $categoryArray;



}



function getToptwoCategories($accNum)



{ 



  global $con;



  



   $sql = "SELECT * FROM `categories` WHERE `accNum` = $accNum ";



    $where .= " AND parent = 0 LIMIT 2"; //[top]



    if($where!='')



    {



      $sql .= $where;



    }



    $result=mysqli_query($con,$sql);



    // Associative array



    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    {



      $categoryArray[] = $row;



    }



    mysqli_free_result($result);



    return $categoryArray;



}







function getCategoryTree($accNum,$parent_id = 0, $sub_mark = '')



{



  global $con;



  



    $sql ="SELECT * FROM categories WHERE parent = $parent_id  AND accNum = $accNum ";



     $result=mysqli_query($con,$sql);



    // Associative array



    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    {



      $categoryArray =  ''.$sub_mark.$row['categoryName'].'<br>';



      $this->getCategoryTree( $accNum ,$row['categoryNum'], $sub_mark.'---');



    }



    mysqli_free_result($result);



    return $categoryArray;



}

function getCategoryTreeView($accNum,$parent_id = 0, $i = 0,$categoryArray = array())



{



  global $con;



  



    $sql ="SELECT * FROM categories WHERE parent = $parent_id  AND accNum = $accNum ";



     $result=mysqli_query($con,$sql);



    // Associative array

     

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    {



        $categoryArray[$i]['main'] =  $row;



        $categoryNum =  $row['categoryNum'];

      if($categoryNum != 0){

        $sql2 ="SELECT * FROM categories WHERE parent = $categoryNum  AND accNum = $accNum ";

        $result2=mysqli_query($con,$sql2);

        $j = 0;

        while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 

        {

            $categoryArray[$i]['lavel1'][$j] = $row2;

            $categoryNum2 =  $row2['categoryNum'];



            $sql3 ="SELECT * FROM menu WHERE categoryNum = $categoryNum2  AND accNum = $accNum and status not in(7,9,0)";

            $result3=mysqli_query($con,$sql3);

            while ($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC)) 

            {

                $categoryArray[$i]['lavel1'][$j]["lavel2"][] = $row3;

                $categoryNum3 =  $row3['categoryNum'];



                $sql4 ="SELECT * FROM categories WHERE parent = $categoryNum3  AND accNum = $accNum ";

                $result4=mysqli_query($con,$sql4);

                while ($row4=mysqli_fetch_array($result4,MYSQLI_ASSOC)) 

                {

                    $categoryArray[$i]['lavel1']["lavel2"]['lavel3'][] = $row4;

                }



            }

            $j++;



        }



      }



      $i++;

    $this->getCategoryTreeView( $accNum ,$row['categoryNum'],$i,$categoryArray);



    }



    mysqli_free_result($result);



    return $categoryArray;



}





function getMainCategories($accNum,$parent_id){

  	global $con;

  	$sql = "SELECT DISTINCT (categories.categoryNum), categories.*,concat('".SITE_URL."assets/images/".$accNum."/".$parent_id."/',images.imageName) as image,(SELECT categoryName from categories where categoryNum = '".$parent_id."') as parent_cat_name FROM categories LEFT JOIN images  ON categories.categoryNum = images.Num WHERE categories.accNum = '".$accNum."' and categories.parent = '".$parent_id."' and images.type=1 ";

    $result=mysqli_query($con,$sql);
    // Associative array
    $cat_images = array('1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg');

    $k = 0;

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {
      $categoryArray[$k] = $row;
      $categoryArray[$k]['image'] = SITE_URL."assets/images/".$accNum."/7_fixed/".$cat_images[$k];
      $k++;
    }

    mysqli_free_result($result);
    return $categoryArray;
}

function getMenuItems($accNum,$categoryNum){

   global $con;

    $sql = "SELECT menu.*,categories.*,concat('".SITE_URL."assets/images/".$accNum."/',images.imageName) as image,(select concat('".SITE_URL."assets/images/".$accNum."/',images.imageName) from images where images.Num = categories.categoryNum AND images.type =1) as category_image  FROM menu left join categories on categories.categoryNum = menu.categoryNum  LEFT JOIN images  ON menu.menuNum = images.Num WHERE categories.accNum = '".$accNum."' and menu.status not in(7,9,0) AND menu.categoryNum = '".$categoryNum."' AND images.type =1 ";

    $result=mysqli_query($con,$sql);

    // Associative array

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {
      $categoryArray[] = $row;
    }

    mysqli_free_result($result);

    return $categoryArray;

}

function getCategoriesTree($accNum)
{
  global $con;

  $sql = "SELECT t1.categoryName AS level_1,t1.categoryNum AS level_1_id, t2.categoryName as level_2,t2.categoryNum as level_2_id, t3.categoryName as level_3,t3.categoryNum as level_3_id, t4.categoryName as level_4, t4.categoryNum as level_4_id  FROM categories AS t1  LEFT JOIN categories AS t2 ON t2.parent = t1.categoryNum LEFT JOIN categories AS t3 ON t3.parent = t2.categoryNum LEFT JOIN categories AS t4 ON t4.parent = t3.categoryNum WHERE t1.accNum = '".$accNum."' AND  t1.parent =0";

	$result=mysqli_query($con,$sql);

    // Associative array

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {

      $categoryArray[] = $row;
    }

    mysqli_free_result($result);
    return $categoryArray;



}



function getCategoryData($accNum,$categoryNum)



{



  global $con;



  



    $sql = "SELECT categories.*,concat('".SITE_URL."assets/images/".$accNum."/',images.imageName) as image  FROM categories LEFT JOIN images  ON categories.parent = images.Num



    WHERE categories.accNum = '".$accNum."' AND categories.categoryNum = '".$categoryNum."' AND images.type =3 ";



    $result=mysqli_query($con,$sql);



    // Associative array



    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    {



      $categoryArray[] = $row;



    }



    mysqli_free_result($result);



    return $categoryArray;



}



function getItemData($accNum,$menuID)



{



  global $con;



  



    $sql = "SELECT menu.*,categories.*,category.child,category.type,category.cat_img,category.lft,category.rgt,category.status,category.created_at,category.updated_at  FROM menu LEFT JOIN categories ON menu.categoryNum = categories.categoryNum LEFT JOIN category  ON categories.parent = category.categoryNum   WHERE menu.status not in(7,9,0) and categories.accNum = '".$accNum."'";



    $result=mysqli_query($con,$sql);



    // Associative array



    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    {



      $categoryArray[] = $row;



    }



    mysqli_free_result($result);



    return $categoryArray;



}


function getVarietiesdata($varietyNum){



    global $con;



    $sql_varieties = "SELECT price FROM varieties where varietyNum = $varietyNum";







    $result2=mysqli_query($con,$sql_varieties);







    if ($row_varieties=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 



    {



      $price = $row_varieties['price'];



    }



    return $price;



}



function getUserDetails($user_id)

{

    global $con;

    $result = array();



    $sql_varieties = "SELECT user_address.*,users.username,users.mobile,users.email FROM users inner join user_address on users.id = user_address.user_id where users.id = $user_id";



    $result2=mysqli_query($con,$sql_varieties);

    if ($row_users=mysqli_fetch_array($result2,MYSQLI_ASSOC)) {

      $result = $row_users;

    }

    return $result;

}









function confirmCart($accNum,$guest_id,$POST){



  global $con;



  $mobile = $POST['mobile'];

  $email = $POST['email'];

  $clientName = $POST['clientName'];

  $address = $POST['address'];

  $country = $POST['country'];

  $city = $POST['city'];

  $state = $POST['state'];

  $zip = $POST['zip'];

  $lat = $POST['lat'];

  $long = $POST['long'];

  $street_number = $POST['street_number'];

  $route = $POST['route'];





  $address1 = $street_number.' '.$route;

  $recent_delivery_address = $POST['recent_delivery_address'];

  $order_total_price = $POST['order_total_price'];

  $extraPerItemPrice = $POST['extraPerItemPrice'];  //array

  $perItemPrice = $POST['perItemPrice'];  //array

  $qty = $POST['qty'];  //array

  $cart_id_arr = $POST['cart_id'];  //array



  $created_at = date("Y-m-d H:i:s");



  if(!isset($_SESSION['user_id']))

  {



    $sql_user_check = "SELECT id FROM users where email = '$email'";

    $result2=mysqli_query($con,$sql_user_check);

    $is_guest = 1;

    if($row_user=mysqli_fetch_array($result2,MYSQLI_ASSOC)){

      $is_guest = 0;

      $guest_id = 0;

      $user_id = $row_user['id'];

    }else{

        $user_sql = "INSERT INTO `users`(`accNum`, `username`, `type`, `mobile`, `email`, `password`, `profileImg`, `otp`, `otp_verify`, `created_at`, `updated_at`,guest_id, `status`) VALUES ('$accNum','$clientName','2','$mobile','$email','','','',0,'$created_at','$created_at','$guest_id','1')";

        $result_user=mysqli_query($con,$user_sql);

        $user_id = mysqli_insert_id($con);

        $is_guest = 0;

        $guest_id = 0;



        $user_add_sql = "INSERT INTO `user_address`( `accNum`, `user_id`, `address`, `address1`, `city`, `state`, `zip`, `country`, `latitude`, `longitude`, `status`, `recent_delivery_address`, `created_at`, `updated_at`) VALUES ('$accNum','$user_id','$address','$address1','$city','$state','$zip','$country','$lat','$long','1','$recent_delivery_address','$created_at','$created_at')";



        $user_address = mysqli_query($con,$user_add_sql);

        $user_address_id = mysqli_insert_id($con);

    }

  }else{

    $user_id = $_SESSION['user_id'];



    $sql_check11 = mysqli_query($con,"SELECT address,id FROM user_address WHERE user_id = '$user_id' and address = '$address'");

    if($row_check11 = mysqli_fetch_array($sql_check11,MYSQLI_ASSOC)){



      $user_address_id = $row_check11['id'];



    }else{

      $user_add_sql = "INSERT INTO `user_address`( `accNum`, `user_id`, `address`, `address1`, `city`, `state`, `zip`, `country`, `latitude`, `longitude`, `status`, `recent_delivery_address`, `created_at`, `updated_at`) VALUES ('$accNum','$user_id','$address','$address1','$city','$state','$zip','$country','$lat','$long','1','$recent_delivery_address','$created_at','$created_at')";



        $user_address = mysqli_query($con,$user_add_sql);

        $user_address_id = mysqli_insert_id($con);

    }



  }







  $_SESSION = array('is_guest' => $is_guest,'guest_id' => $guest_id, 'user_id' => $user_id, 'is_logged_in' => 1);



  $max_order_id = 0;

  $sql_order_id = mysqli_query($con,"SELECT max(order_id) as max_order_id FROM orders where accNum = '$accNum'");



  if($row_order_id = mysqli_fetch_array($sql_order_id,MYSQLI_ASSOC)){

    $max_order_id = $row_order_id['max_order_id'];

  }



  $order_id = $max_order_id+1;





  mysqli_query($con,"INSERT INTO `orders`(`accNum`, `tableNum`, `department`, `order_id`, `user_id`, user_address_id,`type`, `delivery`, `created_at`, `status`) VALUES ('$accNum','','','$order_id','$user_id','$user_address_id','w','8','$created_at',0)");



  mysqli_query($con,"INSERT INTO `order_status`(`accNum`, `order_id`, `status`, `created_at`, `updated_at`) VALUES ('$accNum','$order_id',0,'$created_at','$created_at')");





  foreach ($cart_id_arr as $cart_id) {



    //echo "SELECT * FROM fr_temp_cart where id = '$cart_id'";die;



    $temp_cart_items = mysqli_query($con,"SELECT * FROM fr_temp_cart where id = '$cart_id'");



    while($temp_cart_row = mysqli_fetch_array($temp_cart_items,MYSQLI_ASSOC))

    {



      $temp_order_id = $temp_cart_id = $temp_cart_row['temp_cart_id'];

      

      $menuNum = $temp_cart_row['menuNum'];

      $varietyId = $temp_cart_row['variety'];

      $quantity = $temp_cart_row['quantity'];

      $chef_note = $temp_cart_row['chef_note'];

      $price = $temp_cart_row['price'];

      $status = 1;



      //echo "INSERT INTO `orders_cart`(`accNum`, `temp_order_id`, `order_id`, `menuNum`, `varietyId`, `quantity`, `chef_note`, `price`, `status`, `created_at`, `updated_at`) VALUES ('$accNum','$temp_order_id','$order_id','$menuNum','$varietyId','$quantity','$chef_note','$price','$status','$created_at','$created_at')"; 



      mysqli_query($con,"INSERT INTO `orders_cart`(`accNum`, `temp_order_id`, `order_id`, `menuNum`, `varietyId`, `quantity`, `chef_note`, `price`, `status`, `created_at`, `updated_at`) VALUES ('$accNum','$temp_order_id','$order_id','$menuNum','$varietyId','$quantity','$chef_note','$price','$status','$created_at','$created_at')");

     



      $extra_carts_sql  = mysqli_query($con,"SELECT * FROM fr_temp_extra where temp_cart_id = '$temp_cart_id'");



      while($temp_extra_row = mysqli_fetch_array($extra_carts_sql,MYSQLI_ASSOC))

      {



        $ingredientNum = $temp_extra_row['ingredientNum'];

        $optionNum = $temp_extra_row['optionNum'];

        $price_extr = $temp_extra_row['price'];

        

        mysqli_query($con,"INSERT INTO `order_extra`(`accNum`, `temp_order_id`, `ingredientNum`, `optionNum`, `price`, `created_at`, `updated_at`) VALUES ('$accNum','$temp_order_id','$ingredientNum','$optionNum','$price_extr','$created_at','$created_at')");



      }

      mysqli_query($con,"DELETE FROM fr_temp_cart where id = '$cart_id'");

      mysqli_query($con,"DELETE FROM fr_temp_extra where temp_cart_id = '$temp_cart_id'");

    }

  }



  setcookie("cart_items", "", time() - 3600);

  return json_encode(array("order_id" => $order_id, "total_price" => $order_total_price));

}



function addToCart($accNum,$guest_id,$POST){



  global $con;



  $is_guest = $_SESSION['is_guest'];



  $variety = $POST['variety'];



  $qty = $POST['qty'];



  $addextra = $POST['addextra'];



  $note = mysqli_real_escape_string($POST['note']);



  $activeTable = $POST['activeTable'];



  $activeDepartment = $POST['activeDepartment'];



  $menuNum = $POST['menuNum'];



  $totalPrice = $POST['totalPrice'];



  $created_at = date("Y-m-d H:i:s");



  $temp_cart_id = rand(99999999, 999999999);



  $sql = "INSERT INTO `fr_temp_cart`(`accNum`, `temp_cart_id`, `user_id`, `menuNum`, `variety`, `quantity`, `chef_note`, `price`, `status`, `created_at`, `updated_at`,`tableNum`, `department`,is_guest) VALUES ('$accNum','$temp_cart_id','$guest_id','$menuNum','$variety','$qty','$note','$totalPrice',2,'$created_at','$created_at','$activeTable','$activeDepartment','$is_guest')";



    $res = mysqli_query($con,$sql);



    $sql2 = '';



    $arr_keys = array_keys($addextra);



    foreach($arr_keys as $arr_key)



    {



      $ingredientNum = $arr_key;



      $optionNum = $addextra[$arr_key];



      if($optionNum != 0)

      {



        $sql_varieties = "SELECT option_price FROM ingredient_options where id = $optionNum";



        $result2=mysqli_query($con,$sql_varieties);



        $row_varieties=mysqli_fetch_array($result2,MYSQLI_ASSOC);



        $price = $row_varieties['option_price'];



        $sql2=  "INSERT INTO `fr_temp_extra`( `accNum`, `temp_cart_id`, `ingredientNum`, `optionNum`, `price`, `created_at`, `updated_at`, `status`) VALUES ('$accNum','$temp_cart_id','$ingredientNum','$optionNum','$price','$created_at','$created_at',2)";



        $res = mysqli_query($con,$sql2);



      }



    }



    $POST['accNum'] = $accNum;

    $POST['guest_id'] = $guest_id;

    $POST['guest_ip'] = $_SESSION["guest_ip"];



    $cookie_data = array();

    $cookie_data[] = $POST;



    if(isset($_COOKIE['cart_items'])){



      $cookie_items = json_decode($_COOKIE['cart_items'], true);

      foreach ($cookie_items as $singleItem) {

        $cookie_data[] = $singleItem;

      }

    }

    setcookie('cart_items', json_encode($cookie_data), time() + (86400 * 30));



    return $sql.'  '.$sql2;



}



function updateCart($accNum,$guest_id,$POST){



  global $con;



  $is_guest = $_SESSION['is_guest'];



  $qty = $POST['qty'];



  $cart_id = $POST['cart_id'];



  $totalPrice = $POST['total_price'];



  $created_at = date("Y-m-d H:i:s");



  $sql = "UPDATE `fr_temp_cart` SET `quantity`='$qty',`price`='$totalPrice',`updated_at`='$created_at' WHERE id = '$cart_id' ";



  $res = mysqli_query($con,$sql);



  $sql_cart = "SELECT menuNum FROM fr_temp_cart where id = $cart_id";

  $result3 = mysqli_query($con,$sql_cart);

  $row_cart = mysqli_fetch_array($result3);

  $menuNum = $row_cart['menuNum'];

  

    if(isset($_COOKIE['cart_items'])){



      $cookie_items = json_decode($_COOKIE['cart_items'], true);

      foreach ($cookie_items as $singleItem) {

        if($singleItem['menuNum'] == $menuNum)

        {

          $singleItem['qty']  = $qty;

          $singleItem['totalPrice']  = $totalPrice;

        }

        $cookie_data[] = $singleItem;

      }

    }



    setcookie("cart_items", "", time() - 3600);

    setcookie('cart_items', json_encode($cookie_data), time() + (86400 * 30));



    return $sql.'  '.$sql2;



}







function createGuestUser($guest_ip){



    global $con;



    $sql = "SELECT id FROM guest_login where ip = '$guest_ip'";



    $created_on = date("Y-m-d H:i:s");



    $result2=mysqli_query($con,$sql);



    if ($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 



    {



      $guest_id = $row['id'];

      $_SESSION["guest_id"] = $guest_id;

      $_SESSION["guest_ip"] = $guest_ip;



      $sql1 = "UPDATE `guest_login` SET last_opened = '$created_on' where id = $guest_id";



      mysqli_query($con,$sql1);



    }else{

      $sql1 = "INSERT INTO `guest_login`(`ip`, `created_on`,last_opened) VALUES ('$guest_ip','$created_on','$created_on')";



      mysqli_query($con,$sql1);



      $guest_id = mysqli_insert_id($con);

      $_SESSION["guest_id"] = $guest_id;

      $_SESSION["guest_ip"] = $guest_ip;



    }



    $_SESSION['is_guest'] = 1;





    return $guest_id;



}







function getMenuIngredientOptionPrice($iot_id){



  global $con;



  $sql_varieties = "SELECT option_price FROM ingredient_options where id = $iot_id";







    $result2=mysqli_query($con,$sql_varieties);







    if ($row_varieties=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 



    {



      $price = $row_varieties['option_price'];



    }



    return $price;



}







function getItemDetails($accNum,$menuNum){



   global $con;







  



    $sql_menu = "SELECT menu.*,concat('".SITE_URL."assets/images/".$accNum."/',images.imageName) as image FROM menu LEFT JOIN images  ON menu.menuNum = images.Num where menu.menuNum = $menuNum AND images.type =1 and menu.status not in(7,9,0) ";







    $result1=mysqli_query($con,$sql_menu);







    //$row_menu=mysqli_fetch_array($result1,MYSQLI_ASSOC);



    $categoryArray =array();







    $categoryArray['menu'] = array();



    $categoryArray['varieties'] = array();



    $categoryArray['ingredients'] = array();



   // $categoryArray['ingredient_options'] = array();



    while ($row_menu=mysqli_fetch_array($result1,MYSQLI_ASSOC)) 



    {



      //print_r($row_menu);



      $categoryArray['menu'][] = $row_menu;



    }







    $sql_varieties = "SELECT varieties.*,variety.itemName FROM varieties left join variety on variety.varietyNum = varieties.variety where varieties.menuNum = $menuNum";







    $result2=mysqli_query($con,$sql_varieties);







    while ($row_varieties=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 



    {



      $categoryArray['varieties'][] = $row_varieties;



    }











    $sql_ingredients = "SELECT ingredients.*,(SELECT itemName from ingredients_types where ingredients_types.ingredientNum = ingredients.ingredientNum) as itemName FROM ingredients where menuNum = $menuNum";



    



    $result3=mysqli_query($con,$sql_ingredients);



    $k = 0;







    while ($row_ingredients=mysqli_fetch_array($result3,MYSQLI_ASSOC)) 



    {



      $categoryArray['ingredients'][$k]['ingredients'] = $row_ingredients;







      $ingredientNum = $row_ingredients['ingredientNum'];







      $sql_ingredient_options ="SELECT ingredient_options.*,(SELECT plusName FROM `ingredient_options_types` where ingredient_options_types.plusNum = ingredient_options.plusTypeNum) as plus_name FROM `ingredient_options` where menuNum = $menuNum AND ingredientTypeNum = $ingredientNum";







      $result4=mysqli_query($con,$sql_ingredient_options);



      $ingredient_options = array();







      while ($row_ingredient_options=mysqli_fetch_array($result4,MYSQLI_ASSOC)) 



      {



        $ingredient_options[] = $row_ingredient_options;



      }







      $categoryArray['ingredients'][$k]['ingredient_options'] = $ingredient_options;







      $k++;



    }











    



  







    // SELECT * FROM `menu` WHERE menuNum = 43



    // SELECT * FROM `varieties` where menuNum = 43 



    // SELECT * FROM `variety` where varietyNum in (23,24,25)        



    // SELECT * FROM `ingredients` where `menuNum` = 43 



    // SELECT * FROM `ingredients_types` WHERE ingredientNum in (4, 8)



    // SELECT * FROM `ingredient_options` where menuNum = 43 AND ingredientTypeNum IN (4,8)    



    // SELECT * FROM `ingredient_options_types` WHERE plusNum IN (13, 14, 15, 16)     







    // $result=mysqli_query($con,$sql);



    // // Associative array



    // while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 



    // {



    //   $categoryArray[] = $row;



    // }



    mysqli_free_result($result);



    return $categoryArray;



}







  function getCartItems($guest_id){



    global $con;

    $is_guest = $_SESSION['is_guest'];

    $sql_carts = "SELECT fr_temp_cart.*,menu.menuName,varieties.price as perItemPrice FROM fr_temp_cart inner join menu on menu.menuNum = fr_temp_cart.menuNum left join varieties on varieties.varietyNum =fr_temp_cart.variety  where fr_temp_cart.user_id = $guest_id and fr_temp_cart.is_guest = '$is_guest' ";

    $result2=mysqli_query($con,$sql_carts);

    $cart_data = array();

    $p = 0;



    while ($row_carts=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 

    {

      $cart_data[$p]['cart'] = $row_carts;



      $id = $row_carts['id'];



      $temp_cart_id = $row_carts['temp_cart_id'];



      $sql_extra = "SELECT * FROM fr_temp_extra where temp_cart_id = $temp_cart_id";



      $result3 = mysqli_query($con,$sql_extra);



      while($row_extra = mysqli_fetch_array($result3)){

          $cart_data[$p]['extra'][] = $row_extra;

      }



      $p++;

    }



    return $cart_data;

  }



  function removeCartItems($cartId)

  {

    global $con;

      $sql_cart = "SELECT * FROM fr_temp_cart where id = $cartId";

      $result3 = mysqli_query($con,$sql_cart);

      if($row_cart = mysqli_fetch_array($result3)){

          $temp_cart_id = $row_cart['temp_cart_id'];

          $menuNum = $row_cart['menuNum'];

          $sql_extra = "DELETE FROM `fr_temp_extra` WHERE temp_cart_id = '$temp_cart_id'";

          mysqli_query($con,$sql_extra);

          $sql_cart2 = "DELETE FROM `fr_temp_cart` WHERE temp_cart_id = '$temp_cart_id'";

          mysqli_query($con,$sql_cart2);





          $cookie_data = array();

    

          if(isset($_COOKIE['cart_items'])){



            $cookie_items = json_decode($_COOKIE['cart_items'], true);

            $i = 0;

            foreach ($cookie_items as $singleItem) {

                if($singleItem['menuNum'] == $menuNum)

                {

                    unset($cookie_items[$i]);

                    $cookie_items = array_values($cookie_items);

                }

                $i++;

            }

          }

          //print_r($cookie_items);

          setcookie("cart_items", "", time() - 3600);

          setcookie('cart_items', json_encode($cookie_items), time() + (86400 * 30));



      }

      return 1;

  }

}



?>