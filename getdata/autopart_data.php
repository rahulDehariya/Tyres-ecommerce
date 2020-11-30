<?php
  
include_once './config/autopart_config.php';

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

function alterDB()
{

  global $con;

  $result=mysqli_query($con,"SELECT * from orders order by id desc limit 1");
 // $result=mysqli_query($con,"ALTER TABLE `guest_login`  ADD PRIMARY KEY (`id`);");

  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

  print_r($row);

  //   $sql = "CREATE TABLE `guest_login` (
  //   `id` int(11) NOT NULL,
  //   `ip` varchar(255) NOT NULL,
  //   `created_on` datetime NOT NULL,
  //   `last_opened` datetime NOT NULL
  // ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
  // mysqli_query($con,$sql);
  //mysqli_query($con,"ALTER TABLE fr_temp_cart ADD `is_guest` tinyint(1) NOT NULL AFTER user_id");
  //mysqli_query($con,"ALTER TABLE `guest_login`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1");

}


function getContactDetails($accNum){

  global $con;
  $sql = "SELECT * FROM `profile` WHERE accNum = $accNum";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  return $row;
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


function getAllMenuIdAccount ($accNum,$cat_id)
{
    global $con;

    if($cat_id > 0)
    {
      $sql ="SELECT distinct(menuNum) FROM menu_categary WHERE accNum = $accNum and categoryNum = $cat_id";
    }else{

      $sql ="SELECT distinct(menuNum) FROM menu_categary WHERE accNum = $accNum and categoryNum in (SELECT categoryNum FROM `categories` where type=2)";
    }
     $result=mysqli_query($con,$sql);
     $menuArray = array();

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {
      $menuArray[] = $row['menuNum'];
    } 

     return $menuArray;
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

    $sql ="SELECT * FROM categories WHERE parent = $parent_id  AND accNum = $accNum and status not in(7,9,0) and type = 1";

     $result=mysqli_query($con,$sql);

    // Associative array

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 

    {

        $categoryArray[$i]['main'] =  $row;
        $categoryNum =  $row['categoryNum'];

      if($categoryNum != 0){

        $sql2 ="SELECT * FROM categories WHERE parent = $categoryNum  AND accNum = $accNum and status not in(7,9,0) and type = 1";

        $result2=mysqli_query($con,$sql2);

        $j = 0;

        while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 

        {

            $categoryArray[$i]['lavel1'][$j] = $row2;

            $categoryNum2 =  $row2['categoryNum'];

            $sql3 ="SELECT * FROM categories WHERE parent = $categoryNum2  AND accNum = $accNum and status not in(7,9,0) and type = 1";

            $result3=mysqli_query($con,$sql3);

            $k = 0;

            while ($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC)) 

            {

                $categoryArray[$i]['lavel1'][$j]["lavel2"][$k] = $row3;

                $categoryNum3 =  $row3['categoryNum'];



                $sql4 ="SELECT * FROM categories WHERE parent = $categoryNum3  AND accNum = $accNum and status not in(7,9,0) and type = 1";

                $result4=mysqli_query($con,$sql4);

                while ($row4=mysqli_fetch_array($result4,MYSQLI_ASSOC)) 

                {

                    $categoryArray[$i]['lavel1'][$j]["lavel2"][$k]['lavel3'][] = $row4;

                }

                $k++;

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

function getBanners($accNum){

  	global $con;

  	$sql = "SELECT *,concat('https://ecommerce.staffstarr.com/its-admin/assets/images/banner/".$accNum."/',images.imageName) as imageUrl FROM `images` where type=5 and accNum=$accNum and Num in (SELECT bannerNum from banner where accNum=$accNum) ";

    $result=mysqli_query($con,$sql);
  
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {
      $data_arr[] = $row;
    }

    mysqli_free_result($result);
    return $data_arr;
}

function getMenuItems($accNum,$menu_ids){

   global $con;

    $sql = "SELECT menu.*,categories.*,(SELECT concat('https://ecommerce.staffstarr.com/its-admin/assets/images/".$accNum."/',images.imageName) as image from images where images.Num = menu.menuNum and images.type= 1 and images.accNum=".$accNum." limit 1) as image ,(select concat('https://ecommerce.staffstarr.com/its-admin/assets/images/".$accNum."/',images.imageName) from images where images.Num = categories.categoryNum AND images.type =1) as category_image ,(SELECT discountType from varieties where varieties.menuNum = menu.menuNum and discountType > 0 limit 1) as discountType FROM menu left join categories on categories.categoryNum = menu.categoryNum WHERE categories.accNum = '".$accNum."' and menu.status not in(7,9,0) AND menu.menuNum in(".$menu_ids.")";

    $result=mysqli_query($con,$sql);

    // Associative array

    //$categoryArray[0]["sql"] = $sql;

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

  $sql = "SELECT t1.categoryName AS level_1,t1.categoryNum AS level_1_id, t2.categoryName as level_2,t2.categoryNum as level_2_id, t3.categoryName as level_3,t3.categoryNum as level_3_id, t4.categoryName as level_4, t4.categoryNum as level_4_id ,t1.status as level1_status,t2.status as level2_status,t3.status as level3_status,t4.status as level4_status FROM categories AS t1  LEFT JOIN categories AS t2 ON t2.parent = t1.categoryNum LEFT JOIN categories AS t3 ON t3.parent = t2.categoryNum LEFT JOIN categories AS t4 ON t4.parent = t3.categoryNum WHERE t1.accNum = '".$accNum."' AND  t1.parent =0";

	$result=mysqli_query($con,$sql);

    // Associative array

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {
      if($row['level1_status'] != 7)
      {
        
        if($row['level2_status'] != 7)
        {
          
          if($row['level3_status'] != 7)
          {
           
            if($row['level4_status'] != 7)
            {
              
            }else{
                $row['level_4'] = "";
                $row['level_4_id'] = "";
              }
          }else{
            $row['level_3'] = "";
            $row['level_3_id'] = "";
          }
        }else{
          $row['level_2'] = "";
          $row['level_2_id'] = "";
        }
          $categoryArray[] = $row;

      }
    }

    mysqli_free_result($result);
    return $categoryArray;



}



function getCategoryData($accNum,$categoryNum)
{
  global $con;

    $sql = "SELECT categories.*,concat('".SITE_URL."assets/images/".$accNum."/',images.imageName) as image  FROM categories LEFT JOIN images  ON categories.parent = images.Num WHERE categories.accNum = '".$accNum."' AND categories.categoryNum = '".$categoryNum."' AND images.type =3 ";



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

function updateProfile($accNum,$POST){
    global $con;
    $result = array();

    $mobile = $POST['mobile'];
    $email = $POST['email'];
    $user_name = $POST['user_name'];
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
    $user_id = $_SESSION['user_id'];

    $created_on = date("Y-m-d H:i:s");

    $sql_user = "UPDATE `users` SET `username`='$user_name',`mobile`='$mobile',`email`='$email',`updated_at`='$created_on' where users.id = $user_id and users.accNum = $accNum";

    $result2=mysqli_query($con,$sql_user);


    $user_address = mysqli_query($con,"SELECT id FROM `user_address` where user_id = $user_id and accNum = $accNum and is_billing_address =1");


    if ($row_address=mysqli_fetch_array($user_address,MYSQLI_ASSOC)) {

      $add_id = $row_address['id'];

      $addr_update = "UPDATE `user_address` SET `address`='$address',`address1`='$address1',`city`='$city',`state`='$state',`zip`='$zip',`country`='$country',`latitude`='$lat',`longitude`='$long',`recent_delivery_address`='$recent_delivery_address',`updated_at`='$created_on' WHERE id = $add_id";

      mysqli_query($con,$addr_update);
      
    }else{
      $addr_insert = "INSERT INTO `user_address`(`accNum`, `user_id`, `is_billing_address`, `address`, `address1`, `city`, `state`, `zip`, `country`, `latitude`, `longitude`, `status`, `recent_delivery_address`, `created_at`, `updated_at`) VALUES ('$accNum','$user_id',1,'$address','$address1','$city','$state','$zip','$country','$lat','$long','1','$recent_delivery_address','$created_on','$created_on')";
      mysqli_query($con,$addr_insert);
    }

}

function updateProfilePic($accNum,$FILES){
    global $con;
    $result = array();

    $user_id = $_SESSION['user_id'];

    $created_on = date("Y-m-d H:i:s");

   // print_r($FILES);die;

    $target_dir = "assets/images/".$accNum."/user_profile/";

    $file_name = rand(9999,99999).$FILES["file"]["name"];

    $target_file = $target_dir .$file_name;
    $uploadOk = 1;

    if (move_uploaded_file($FILES["file"]["tmp_name"], $target_file)) {
        //  echo "The file ". basename( $FILES["file"]["name"]). " has been uploaded.";
        $sql_user = "UPDATE `users` SET `profileImg`='$file_name' where users.id = $user_id and users.accNum = $accNum";
        $result2=mysqli_query($con,$sql_user);
        echo 1;
    } else {
        echo 0;
    }



}

function getUserDetails($accNum,$user_id)
{

    global $con;

    $result = array();

    $sql_varieties = "SELECT user_address.*,users.username,users.mobile,users.email,users.profileImg FROM users left join user_address on users.id = user_address.user_id and user_address.is_billing_address = 1 where users.id = $user_id and users.accNum = $accNum";

    $result2=mysqli_query($con,$sql_varieties);

    if ($row_users=mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
      $result = $row_users;
    }

    return $result;
}

function checkEmailExist($accNum,$POST)
{

    global $con;

    $result = array();

    $email = $POST['email'];

    $sql_varieties = "SELECT id FROM users  where email = '$email' and accNum = $accNum";

    $result2=mysqli_query($con,$sql_varieties);

    if ($row_users=mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
      $res = 1;
    }else{
    	$res = 0;
    }

    return $res;
}

function getUserAddress($user_id)
{
    global $con;

    $result = array();



    $sql_varieties = "SELECT * FROM user_address where user_id = $user_id";



    $result2=mysqli_query($con,$sql_varieties);

    while($row_users=mysqli_fetch_array($result2,MYSQLI_ASSOC)) {

      $result[] = $row_users;

    }

    return $result;

}

function updatePassword($accNum,$POST)
{
  global $con;
  
  $password = $POST['password'];

  if(!isset($POST['token']) && isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0)
  {
    $user_id = $_SESSION['user_id'];
    $old_password = $POST['old_password'];
    $sql_users1 = "SELECT password from users where id='$user_id'";
    $result_users1=mysqli_query($con,$sql_users1);

    $row_user = mysqli_fetch_array($result_users1,MYSQLI_ASSOC);

    if($row_user['password'] == md5($old_password))
    {
    	$password = md5($password);
      	$sql_users2 = "UPDATE users set password='$password' where id='$user_id'";
      	$result_users2=mysqli_query($con,$sql_users2);
      	$res = 1;
    }else{
      $res = 2;
    }
  }else{
    $token = $POST['token'];
    $password = md5($password);
    $sql_users2 = "UPDATE users set password='$password' where token='$token'";
    $result_users2=mysqli_query($con,$sql_users2);
    $res = 1;
  }
  return $res;
}

function emailToForgotPassword($accNum,$POST)
{
  $email = $POST['email'];

  global $con;

  $sql_users = "SELECT * FROM users where email = '$email' and accNum = $accNum";
  $result_users=mysqli_query($con,$sql_users);

  //echo mysqli_num_rows($result_users);

  if($row_user = mysqli_fetch_array($result_users,MYSQLI_ASSOC)){
      $to = $email;
      $user_name = $row_user['username'];
      $token = md5(uniqid(rand(), true));

      $user_id = $row_user['id'];

      $sql_users2 = "UPDATE users set token='$token' where id=$user_id";
      $result_users2=mysqli_query($con,$sql_users2);

      $url_change_pwd = "https://autohubsolutions.com.au/change_pwd.php?user_token=".$token;

      
      $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title></title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href=''><img src='' alt=''></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'>Hello ".$user_name.", </td></tr>";
    $body .= "<tr><td style='border:none;'></td></tr>";
    $body .= "<tr><td style='border:none;'>Please click to below link to change the password </td></tr>";
    $body .= "<tr><td style='border:none;'><a href='".$url_change_pwd."'>Change Password</a></td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'>If you did not made this action, please ignore this email. and do not share this email with  others </td></tr>";
    
    $body .= "<tr><td></td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Password Recovery";

    $res = mail($to, $subject, $body, $headers);
    //echo $res = send_email($to, $subject, $body, $headers);
  }else{
    $res = "email not found";
  }
  return $res;
}

function poliPaymentSuccess($accNum,$GET)
{
    global $con;

    $order_id = $GET['order_id'];
    $amount = $GET['amount'];
    $user_id = $_SESSION['user_id'];
    $token = $GET['token'];

    $sql1 = "INSERT INTO `orders_payment` (`accNum`, `order_id`, `price`, `payment_by`) VALUES ( $accNum, $order_id, $amount, 'POLI')";
    //   echo $sql;
    mysqli_query($con,$sql1);
    
    $sql2 = "INSERT INTO `order_status` (`accNum`, `order_id`, `status`) VALUES ($accNum, $order_id, 1)";
    // echo $sql;
    mysqli_query($con,$sql2);
                
    $sql3 = "INSERT INTO `sq_payment_records` (`customer_id`, `accNum`, `transaction_id`, `amount`, `invoice`, `reference`, `status`)VALUES ('$user_id', '$accNum', '', '$amount', '$order_id','$token', '1');";
    mysqli_query($con,$sql3);

    $this->emailToClientOnOrderSubmit($accNum,$order_id);


}
function poliPaymentCancelled($accNum,$GET)
{
    global $con;

    $order_id = $GET['order_id'];
    $user_id = $_SESSION['user_id'];
    $token = $GET['token'];
    
    $sql2 = "INSERT INTO `order_status` (`accNum`, `order_id`, `status`) VALUES ($accNum, $order_id, 7)";
    // echo $sql;
    mysqli_query($con,$sql2);

}


function emailToClientOnOrderSubmit($accNum,$order_id)
{
  
  global $con;

  $sql_order = "SELECT orders.*,user_address.address,users.username,users.email FROM orders left join user_address on user_address.user_id=orders.user_id inner join users on users.id=orders.user_id where order_id = '$order_id' and orders.accNum = $accNum";
  $result_order=mysqli_query($con,$sql_order);

  //echo mysqli_num_rows($result_users);

  if($row_order = mysqli_fetch_array($result_order,MYSQLI_ASSOC)){
      $payment_type = $row_order['payment_type'];
      $address = $row_order['address'];
      $username = $row_order['username'];
      $useremail = $row_order['email'];

      $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title></title></head><body>";
      $body .= "<table style='width: 100%;'>";
      $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
      $body .= "<a href=''><img src='' alt=''></a><br><br>";
      $body .= "</td></tr></thead><tbody><tr>";


      $body2 = $body ."<td style='border:none;'>Hello Admin, </td></tr>";

      $body .= "<td style='border:none;'>Hello ".$username.", </td></tr>";

      $message_body = "";
      $message_body2 = "";
      $message_body_header = "";
      $message_body_header2 = "";

      $message_body_header .= "<tr><td style='border:none;'></td></tr>";

      $message_body_header2 .= $message_body_header ."<tr><td style='border:none;'>".$username." has submitted an order. Here is the order details - </td></tr>";

      $message_body_header .= "<tr><td style='border:none;'>Your order has been submitted successfully. Here is the order details - </td></tr>";

      $sql_order2 = "SELECT orders_cart.*,menu.menuName,variety.itemName FROM `orders_cart` left join menu on menu.menuNum = orders_cart.menuNum left join varieties on varieties.varietyNum = orders_cart.varietyId left join variety on variety.varietyNum = varieties.variety where order_id = $order_id";
      $result_order2=mysqli_query($con,$sql_order2);

       $message_body .= "<tr><td style='border:none;'></td></tr>";
       $message_body .= "<tr><td style='border:none;'>Order Id : ".$order_id."</td></tr>";
        $message_body .= "<tr><table><tr><td>SNO.</td><td>Product</td><td>Quantity</td><td>Price</td></tr>";

        $i = 0;
        $totalPrice = 0;
      while($row_order2 = mysqli_fetch_array($result_order2,MYSQLI_ASSOC)){
        $menuName = $row_order2['menuName'];
        $itemName = $row_order2['itemName'];
        $price = $row_order2['price'];

        $totalPrice+=$price;

        $i++;

        $message_body .= "<tr><td style='border:none;'>".$i."</td><td style='border:none;'>".$menuName."(".$itemName.")</td><td style='border:none;'>$".$price."</td></tr>";

      }

      $message_body .= "<tr><td style='border:none;'>Total Price</td><td style='border:none;'></td><td style='border:none;'>$".$totalPrice."</td></tr>";
      $message_body .= "<tr><td></td></tr>";
      
      if($payment_type == "CC")
      { 

        $message_body .= "</table><tr><td style='border:none;'>Payment Type : Card Payment</td></tr>";

        $sql_order_payment = "SELECT * FROM `orders_payment` where order_id = $order_id ORDER BY `id` DESC";
        $result_order_payment=mysqli_query($con,$sql_order_payment);

        if($row_order_payment = mysqli_fetch_array($result_order_payment,MYSQLI_ASSOC)){

          if($row_order_payment['status'] != 0)
          {
            $message_body .= "<tr><td style='border:none;'>Payment Status : Paid</td></tr>";
          }else{
            $message_body .= "<tr><td style='border:none;'>Payment Status : Pending</td></tr>";
          }
        }
      }else if($payment_type == "POLI")
      { 

        $message_body .= "</table><tr><td style='border:none;'>Payment Type : POLI</td></tr>";

        $sql_order_payment = "SELECT * FROM `orders_payment` where order_id = $order_id ORDER BY `id` DESC";
        $result_order_payment=mysqli_query($con,$sql_order_payment);

        if($row_order_payment = mysqli_fetch_array($result_order_payment,MYSQLI_ASSOC)){

          if($row_order_payment['status'] != 0)
          {
            $message_body .= "<tr><td style='border:none;'>Payment Status : Paid</td></tr>";
          }else{
            $message_body .= "<tr><td style='border:none;'>Payment Status : Pending</td></tr>";
          }
        }
      }else{

        $message_body .= "</table><tr><td style='border:none;'>Payment Type : Cash On Delivery</td></tr>";
      }
      
    
    $message_body .= "<tr><td></td></tr>";
    $message_body .= "</tbody></table>";
    $message_body .= "</body></html>";

    $body.=$message_body_header.$message_body;
    $body2.= $message_body_header2.$message_body;

    $to = $useremail;

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $subject = "Order placed successfully";

    $res = mail($to, $subject, $body, $headers);

    $sql = "SELECT email FROM `profile` WHERE accNum = $accNum";
	$result=mysqli_query($con,$sql);
	$row_profile=mysqli_fetch_array($result,MYSQLI_ASSOC);

	$admin_email = $row_profile['email'];

	$res2 = mail($admin_email, $subject, $body2, $headers);

    //echo $res = send_email($to, $subject, $body, $headers);
  }else{
    $res = "order not found";
  }
  return $res;
}


function send_email($to, $subject, $body, $headers){
    $send = mail($to, $subject, $body, $headers);
    return $send;
}

function getOrderDetails($accNum,$order_id)
{  
  global $con;

  $sql_order = "SELECT orders.*,user_address.address,user_address.address1,user_address.city,user_address.state,user_address.zip,user_address.country,users.username,users.email FROM orders left join user_address on user_address.id=orders.delivery inner join users on users.id=orders.user_id where order_id = '$order_id' and orders.accNum = $accNum";
  $result_order=mysqli_query($con,$sql_order);

  //echo mysqli_num_rows($result_users);

  $order_details = array();

  if($row_order = mysqli_fetch_array($result_order,MYSQLI_ASSOC)){
      $order_details['order_details'] = $row_order;

      $sql_order2 = "SELECT orders_cart.*,menu.menuName,menu.description,variety.itemName,varieties.Calories,varieties.price as perItemPrice FROM `orders_cart` left join menu on menu.menuNum = orders_cart.menuNum left join varieties on varieties.varietyNum = orders_cart.varietyId left join variety on variety.varietyNum = varieties.variety where order_id = $order_id";
      $result_order2=mysqli_query($con,$sql_order2);

      while($row_order2 = mysqli_fetch_array($result_order2,MYSQLI_ASSOC)){
        $order_details['order_details']['items'][] = $row_order2;
      }

  }
  return json_encode($order_details);
}


function confirmCart($accNum,$guest_id,$POST){
  global $con;

  $mobile = $POST['mobile'];

  $email = $POST['email'];

  $clientName = $POST['clientName'];

  $address = $POST['address'];
  
  $select_address = $POST['select_address'];

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
  
  $payment_type = $POST['payment_type'];  //array



  $created_at = date("Y-m-d H:i:s");



  if(!isset($_SESSION['user_id']) ||  $_SESSION['user_id'] == 0)

  {


    $sql_user_check = "SELECT id,username FROM users where email = '$email' and accNum = '$accNum'";

    $result2=mysqli_query($con,$sql_user_check);

    $is_guest = 1;

    if($row_user=mysqli_fetch_array($result2,MYSQLI_ASSOC)){

      $is_guest = 0;

      $guest_id = 0;

      $user_id = $row_user['id'];
      $clientName = $row_user['username'];

    }else{

        $user_sql = "INSERT INTO `users`(`accNum`, `username`, `type`, `mobile`, `email`, `password`, `profileImg`, `otp`, `otp_verify`, `created_at`, `updated_at`,guest_id, `status`) VALUES ('$accNum','$clientName','2','$mobile','$email','','','0',0,'$created_at','$created_at','$guest_id','1')";

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
  }

    if($select_address == ""){

      $sql_check11 = mysqli_query($con,"SELECT address,id FROM user_address WHERE user_id = '$user_id' and address = '$address' and accNum = '$accNum'");

      if($row_check11 = mysqli_fetch_array($sql_check11,MYSQLI_ASSOC)){

        $user_address_id = $row_check11['id'];

      }else{

        $user_add_sql = "INSERT INTO `user_address`( `accNum`, `user_id`, `address`, `address1`, `city`, `state`, `zip`, `country`, `latitude`, `longitude`, `status`, `recent_delivery_address`, `created_at`, `updated_at`) VALUES ('$accNum','$user_id','$address','$address1','$city','$state','$zip','$country','$lat','$long','1','$recent_delivery_address','$created_at','$created_at')";

          $user_address = mysqli_query($con,$user_add_sql);

          $user_address_id = mysqli_insert_id($con);

      }
    }else{
      $user_address_id = $select_address;
    }

  


  $_SESSION = array('is_guest' => $is_guest,'guest_id' => $guest_id, 'user_id' => $user_id, 'username' => $clientName, 'is_logged_in' => 1);

  $max_order_id = 0;

  $sql_order_id = mysqli_query($con,"SELECT max(order_id) as max_order_id FROM orders where accNum = '$accNum'");



  if($row_order_id = mysqli_fetch_array($sql_order_id,MYSQLI_ASSOC)){

    $max_order_id = $row_order_id['max_order_id'];

  }

  $order_id = $max_order_id+1;

  //echo "INSERT INTO `orders`(`accNum`, `tableNum`, `department`, `order_id`, `user_id`,`type`, `delivery`,payment_type, `created_at`, `status`) VALUES ('$accNum','0','0','$order_id','$user_id','w','$user_address_id','$payment_type','$created_at',0)";

  mysqli_query($con,"INSERT INTO `orders`(`accNum`, `tableNum`, `department`, `order_id`, `user_id`,`type`, `delivery`,payment_type, `created_at`, `status`) VALUES ('$accNum','0','0','$order_id','$user_id','w','$user_address_id','$payment_type','$created_at',0)");

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

  return json_encode(array("order_id" => $order_id, "total_price" => $order_total_price, "email" => $email, "name" => $clientName, "address" => $address));

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

  if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
  {
    $is_guest = 1;
    $user_id = $guest_id;
  }
else
  {
    $is_guest = 0;
    $user_id = $_SESSION['user_id'];
  }


  $sql = "INSERT INTO `fr_temp_cart`(`accNum`, `temp_cart_id`, `user_id`, `menuNum`, `variety`, `quantity`, `chef_note`, `price`, `status`, `created_at`, `updated_at`,`tableNum`, `department`,is_guest) VALUES ('$accNum','$temp_cart_id','$user_id','$menuNum','$variety','$qty','$note','$totalPrice',2,'$created_at','$created_at','$activeTable','$activeDepartment','$is_guest')";


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

function getUserRegister($accNum,$POST){

    global $con;

    $username = $POST['username'];
    $email = $POST['email'];
    $mobile = $POST['mobile'];
    $password = md5($POST['password']);

    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `users`(`accNum`, `username`, `type`, `mobile`, `email`, `password`, `profileImg`, `otp`, `otp_verify`, `created_at`, `updated_at`,guest_id, `status`) VALUES ('$accNum','$username','2','$mobile','$email','$password','','0',0,'$created_at','$created_at','0','1')";

    $created_on = date("Y-m-d H:i:s");
    $result2=mysqli_query($con,$sql);

    return $result2;

}

function getUserLogin($accNum,$post){
    global $con;

    $user_email = $post['email'];
    $password = md5($post['password']);

    $sql = "SELECT * FROM users where email = '$user_email' and password = '$password'";

    $created_on = date("Y-m-d H:i:s");

    $result2=mysqli_query($con,$sql);

    if ($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
    {

      $user_id = $row['id'];
      $guest_id = $row['guest_id'];
      $username = $row['username'];
      $is_guest = 0;

      $_SESSION = array('is_guest' => $is_guest,'guest_id' => $guest_id, 'user_id' => $user_id, 'username' => $username, 'is_logged_in' => 1);
      $result = 1;

    }else{
      $result = 0;
    }
    return $result;
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

    $sql_menu = "SELECT menu.*,concat('https://ecommerce.staffstarr.com/its-admin/assets/images/".$accNum."/',images.imageName) as image,(SELECT Calories from varieties where varieties.menuNum = $menuNum and Calories != '' limit 1) as Calories FROM menu LEFT JOIN images  ON menu.menuNum = images.Num where menu.menuNum = $menuNum AND images.type =1 and menu.status not in(7,9,0) ";

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

  function getCartItems($accNum,$guest_id){

    global $con;

    $is_guest = $_SESSION['is_guest'];

    $user_id = $guest_id;

    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
      {

        $is_guest = 1;
      }
    else
      {
        $is_guest = 0;
        $user_id = $_SESSION['user_id'];
      }

      $_SESSION['is_guest'] = $is_guest;

    $sql_carts = "SELECT fr_temp_cart.*,menu.menuName,varieties.price as perItemPrice,varieties.stock FROM fr_temp_cart inner join menu on menu.menuNum = fr_temp_cart.menuNum left join varieties on varieties.varietyNum =fr_temp_cart.variety  where fr_temp_cart.user_id = $user_id and fr_temp_cart.is_guest = '$is_guest' and fr_temp_cart.accNum = '$accNum'";

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

  function getOrders($accNum){

    global $con;

    $user_id = $_SESSION['user_id'];


    $draw = 1;//intval($this->input->get("draw"));

    // $start = intval($this->input->get("start"));

    // $length = intval($this->input->get("length"));

    //echo 1;die;
    $sql_query = "SELECT orders.*,(SELECT status from order_status where order_status.order_id = orders.order_id order by id desc limit 1) as order_status FROM `orders`  where user_id = $user_id and accNum = '$accNum' order by order_id desc";

    $result=mysqli_query($con,$sql_query);

    $orders_data = array();

    $p = 0;
    $total_record = mysqli_num_rows($result);

    $data_arr = array();
    while ($row_query=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
    {

      $orders_data[$p]['order'] = $row_query;
      $order_id = $row_query['order_id'];

      $sql_query2 = "SELECT * FROM `orders_cart`  where order_id = $order_id and accNum = '$accNum'";

      $result2=mysqli_query($con,$sql_query2);

      $order_price = 0;

      while ($row_query2=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
      {
        $orders_data[$p]['orders_items'][] = $row_query2;
        $order_price+=$row_query2['price'];
      }
      $p++;

      $view_link = "<a class='btn btn-primary' onclick='view_order_details(".$order_id.")'>View</a> <a class='btn btn-primary' href='ajax_autopart.php?action=download_invoice&order_id=".$order_id."'>Download Invoice</a> ";

      if($row_query['payment_type']=='POLI'){
        $payment_type = "POLI";
      }else{
        $payment_type = ($row_query['payment_type']=='COD' ? 'Cash on delivery' : 'Card Payment');
      }

      $order_status = "Pending";

      if($row_query['order_status'] == 1)
      {
        $order_status = "Paid";
      }elseif($row_query['order_status'] == 2)
      {
        $order_status = "Order Plcaed";
      }elseif($row_query['order_status'] == 3)
      {
        $order_status = "Order Accepted";
      }elseif($row_query['order_status'] == 4)
      {
        $order_status = "Order Prepared";
      }elseif($row_query['order_status'] == 5)
      {
        $order_status = "Order ready For Delivery";
      }elseif($row_query['order_status'] == 6)
      {
        $order_status = "Order on The Way";
      }elseif($row_query['order_status'] == 7)
      {
        $order_status = "Order Cancelled";
      }elseif($row_query['order_status'] == 8)
      {
        $order_status = "Order Delivered";
      }elseif($row_query['order_status'] == 9)
      {
        $order_status = "Order Closed";
      }

      //  0=checkout, 1=payment, 2=orderPlcaed, 3=accepted, 4=prepared, 5=readyForDelivery, 6=onTheWay, 7=cancelled, 8=delivered, 9=closed

      $data_arr[]= array($p,$order_id,$payment_type,$order_status,date("d M Y h:i A",strtotime($row_query['created_at'])),$view_link);
    }

    // $data_arr;

    $data = array("draw"=>$draw , "recordsTotal" => $total_record, "recordsFiltered" => $total_record, "data" => $data_arr);

    return $data;

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

  function getSpecials($accNum)
  {

    if(isset($_SESSION['specials']) && !empty($_SESSION['specials']))
    {
      return $_SESSION['specials'];
    }else{
        global $con;
        $sql = "SELECT `id`, `accNum`, `name`, `type`, `amount`, `dateFrom`, `dateTo`, `imageTag`, `status` FROM `specials` where accNum=$accNum";
        $result3 = mysqli_query($con,$sql);
        $_SESSION['specials'] = array();

        while($row_cart = mysqli_fetch_array($result3)){
            $row_id = $row_cart['id'];
            $_SESSION['specials'][$row_id] = $row_cart;
        }
        return $_SESSION['specials'];
    }
  }
}
?>