<?php


require_once "server_data.php";
global $myCategory;
$myCategory = new Category();
//echo 11;die;

error_reporting(E_ALL);
$action = $_REQUEST['action'];

if($action == "alterDB"){

	$mycattreee = $myCategory->alterDB();

}


if($action == "getMenuItemsFromIds"){

	$itemNum = $_GET['itemNum'];
	$accNum = $_GET['accNum'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->getMenuItems($accNum,$itemNum);

	 // print_r($mycattreee);die;

	echo json_encode($mycattreee);

}

if($action == "GetSubcat_items"){

	$Cat_id = $_GET['Cat_id'];
	$accNum = $_GET['accNum'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->GetSubcat_items($accNum,$Cat_id);

	 // print_r($mycattreee);die;

	echo json_encode($mycattreee);

}



if($action == "GetSpData"){

	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);

	$post_data = $array_el['data'];

	$accNum = $_GET['accNum'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->GetSpData($accNum,$post_data);

	// print_r($mycattreee);die;

	echo json_encode($mycattreee);

}
if($action == "GetSpDataTable"){

	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);

	$post_data = $array_el['data'];

	$accNum = $_REQUEST['accNum'];
	$sp1 = $_REQUEST['sp1'];
	$sp2 = $_REQUEST['sp2'];
	$sp3 = $_REQUEST['sp3'];
	$user_id = $_REQUEST['user_id'];
	$brand = $_REQUEST['brand'];
	$subCat_check = $_REQUEST['subCat_check'];
	$fuel_Saving = $_REQUEST['fuel_Saving'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->GetSpDataTable($accNum,$sp1,$sp2,$sp3,$user_id,$brand,$subCat_check,$fuel_Saving);

	// print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}

if($action == "insertZippayResponse"){


	

	$POST = file_get_contents("php://input");
	
	$post_data = $POST;



	$order_id = $_GET['order_id'];
	$accNum = $_GET['accNum'];
	

	//print_r($_GET);die;
	$mycattreee = $myCategory->insertZippayResponse($accNum,$post_data,$order_id);

	print_r($mycattreee);die;

	// echo json_encode($mycattreee);

}


if($action == "GetfuelSaving_item"){

	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);

	$post_data = $array_el['data'];

	$accNum = $_GET['accNum'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->GetfuelSaving_item($accNum,$post_data);

	// print_r($mycattreee);die;

	echo json_encode($mycattreee);

}
if($action == "get_manufactures"){

	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);

	$post_data = $array_el['data'];

	$accNum = $_GET['accNum'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->get_manufactures($accNum,$post_data);

	// print_r($mycattreee);die;

	echo json_encode($mycattreee);

}

if($action == "GetTyresPerformsItem"){

	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);

	$post_data = $array_el['data'];

	$accNum = $_GET['accNum'];

	//print_r($_GET);die;
	$mycattreee = $myCategory->GetTyresPerformsItem($accNum,$post_data);

	// print_r($mycattreee);die;

	echo json_encode($mycattreee);

}


if($action == "GetSp1"){

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->GetSp1($accNum);

	//print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
if($action == "SupplierM_images"){
	
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->SupplierM_images($accNum);

	// print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
if($action == "getBanners"){
	
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getBanners($accNum);

	// print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
if($action == "GetFrontBanner"){
	
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->GetFrontBanner($accNum);

	// print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}


if($action == "getSpecification"){
	$menu_id=$_REQUEST['menu_id'];
	$variety_id=$_REQUEST['variety_id'];

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getSpecification($accNum,$menu_id,$variety_id);

	//print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
if($action == "GetAmmounts"){
	// print_r($_REQUEST);die;
	
	$menu_id=$_REQUEST['menu_id'];

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->GetAmmounts($accNum,$menu_id);

	print_r(json_encode($mycattreee));

	

}

if($action == "GetSp2"){

	$accNum = $_REQUEST['accNum'];
	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);
	$post_data = $array_el['data'];


	$mycattreee = $myCategory->GetSp2($accNum,$post_data);
	//print_r($mycattreee);die;
	print_r(json_encode($mycattreee));

}
if($action == "GetSp3"){

	$accNum = $_REQUEST['accNum'];
	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);
	$post_data = $array_el['data'];


	$mycattreee = $myCategory->GetSp3($accNum,$post_data);
	//print_r($mycattreee);die;
	print_r(json_encode($mycattreee));

}
if($action == "getUserDetails"){

	$user_id = $_REQUEST['user_id'];
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getUserDetails($accNum,$user_id);

	//print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
//poliPaymentCancelled
if($action == "PaymentCancelled"){

	$accNum = $_REQUEST['accNum'];
	$user_id = $_REQUEST['guest_id'];
	$order_id=$_REQUEST['order_id'];
	$txn_tokken=$_REQUEST['txn_token'];

	$mycattreee = $myCategory->PaymentCancelled($accNum,$user_id,$order_id,$txn_tokken);

	print_r($mycattreee);//die;

	//print_r(json_encode($mycattreee));

}

if($action == "poliPaymentSuccess"){

	

	$accNum = $_REQUEST['accNum'];
	$user_id = $_REQUEST['guest_id'];
	$order_id=$_REQUEST['order_id'];
	$txn_tokken=$_REQUEST['txn_token'];
	$amount=$_REQUEST['amount'];


	$mycattreee = $myCategory->poliPaymentSuccess($accNum,$user_id,$order_id,$txn_tokken,$amount);

	print_r($mycattreee);die;

	//print_r(json_encode($mycattreee));

}
if($action == "zipPaymentSuccess"){

	$accNum = $_REQUEST['accNum'];
	$user_id = $_REQUEST['guest_id'];
	$order_id=$_REQUEST['order_id'];
	$txn_tokken=$_REQUEST['txn_token'];
	$customerId=$_REQUEST['customerId'];
	$amount=$_REQUEST['amount'];

	$mycattreee = $myCategory->zipPaymentSuccess($accNum,$user_id,$order_id,$txn_tokken,$customerId,$amount);

	print_r($mycattreee);//die;

	//print_r(json_encode($mycattreee));

}
if($action == "zipPaymentCancelled"){

	$accNum = $_REQUEST['accNum'];
	$user_id = $_REQUEST['guest_id'];
	$order_id=$_REQUEST['order_id'];
	$txn_tokken=$_REQUEST['txn_token'];

	$mycattreee = $myCategory->zipPaymentCancelled($accNum,$user_id,$order_id,$txn_tokken);

	print_r($mycattreee);//die;

	//print_r(json_encode($mycattreee));

}
if($action == "getUserAddress"){

	$user_id = $_REQUEST['user_id'];
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getUserAddress($accNum,$user_id);

	//print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
if($action == "getItemDetails"){

	$menuNum = $_REQUEST['menuNum'];
	$accNum = $_REQUEST['accNum'];
	$variety_id = $_REQUEST['variety_id'];

	$mycattreee = $myCategory->getItemDetails($accNum,$menuNum,$variety_id);

	//print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}
if($action == "getItemDetails_autohub"){

	$menuNum = $_REQUEST['menuNum'];
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getItemDetails_autohub($accNum,$menuNum);

	//print_r($mycattreee);die;

	print_r(json_encode($mycattreee));

}


if($action == "getContactDetails"){

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getContactDetails($accNum);

	//print_r($mycattreee);die;

	echo json_encode($mycattreee);

}

if($action == "getMainCategories"){

	$menuNum = $_GET['menuNum'];
	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getMainCategories($accNum,$menuNum);

	//print_r($mycattreee);die;

	echo json_encode($mycattreee);

}

if($action == "getCategoryTreeView"){

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getCategoryTreeView($accNum);

	//print_r($mycattreee);die;

	echo json_encode($mycattreee);

}
if($action == "getSpecials"){

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getSpecials($accNum);

	//print_r($mycattreee);die;

	echo json_encode($mycattreee);
	exit;
// die;
}


// new getCategoriesTree
if($action == "getCategoriesTree"){

	$accNum = $_REQUEST['accNum'];

	$mycattreee = $myCategory->getCategoriesTree($accNum);

	//print_r($mycattreee);die;

	echo json_encode($mycattreee);

}

if($action == "getMenuItems"){

	$categoryNum = $_GET['categoryNum'];
	$accNum = $_REQUEST['accNum'];

	$all_menuitems = $myCategory->getAllMenuIdAccount($accNum,$categoryNum);
	$all_menuitems_str = implode(",", $all_menuitems);
	$mycattreee = $myCategory->getMenuItems($accNum,$all_menuitems_str);

	 //print_r($mycattreee);die;

	echo json_encode($mycattreee);

}
if($action == "getMenuItems2"){

	$categoryNum = $_GET['categoryNum'];
	$accNum = $_REQUEST['accNum'];

	$all_menuitems = $myCategory->getAllMenuIdAccount($accNum,$categoryNum);

	print_r($all_menuitems);
	$all_menuitems_str = implode(",", $all_menuitems);
	$mycattreee = $myCategory->getMenuItems($accNum,$all_menuitems_str);

	// print_r($mycattreee);die;

	echo json_encode($mycattreee);

}

if($action == "getOrderDetails"){

	$order_id = $_GET['order_id'];

	$accNum = $_REQUEST['accNum'];

	$order_details = $myCategory->getOrderDetails($accNum,$order_id);

	print_r($order_details); //die;

	// echo json_encode($mycattreee);

}
if($action == "getOrderDetails_tyres"){

	$order_id = $_GET['order_id'];

	$accNum = $_REQUEST['accNum'];

	$order_details = $myCategory->getOrderDetails_tyres($accNum,$order_id);

	print_r($order_details); //die;

	// echo json_encode($mycattreee);

}

if($action == "transactionCompleted"){

	$POST = file_get_contents("php://input");
	$array_el = json_decode($POST, true);

	$post_data = $array_el['data'];
	// print_r($data);die;
	// print_r($POST);die;
	//$post = file_get_contents(filename)
	$accNum = $_REQUEST['accNum'];
	$res = $myCategory->transactionCompleted($accNum,$post_data);
	print_r($res);

}



if($action == "getMenuVarietyPrice"){
	$varietyNum = $_GET['varietyNum'];
	$accNum = $_REQUEST['accNum'];
	$price = $myCategory->getVarietiesdata($varietyNum);
	echo $price;
}

if($action == "download_invoice"){

	include("mpdf/mpdf.php");

	$order_id = $_GET['order_id'];

	$file_name = rand(99999,999999).'.pdf';
	$mpdf=new mPDF('A4');
	$res = file_get_contents('http://hotel.staffstarr.com/invoice.php?order_id='.$order_id);
	
	$mpdf->WriteHTML($res); 
	
	$mpdf->Output($file_name,'D');
	header("Location:order_history.php");
}

if($action == "download_items_pdf"){

	include("mpdf/mpdf.php");

	$mpdf=new mPDF('A4');

	$file_name = rand(99999,999999).'.pdf';
	$mpdf->WriteHTML(file_get_contents('http://hotel.staffstarr.com/items_pdf.php') ); 

	$mpdf->Output($file_name,'I');
	 //header("Location:my_orders.php");
}

if($action == "removeCartItems"){
	$itemId = $_GET['itemId'];
	$accNum = $_REQUEST['accNum'];
	$res = $myCategory->removeCartItems($itemId,$accNum);
	// print_r($res);die;
	echo $res;
}

if($action == "checkEmailExist"){
	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);

	$post_data = $data['data'];
	// print_r($data);die;
	// print_r($POST);die;
	//$post = file_get_contents(filename)
	$accNum = $_REQUEST['accNum'];
	$res = $myCategory->checkEmailExist($accNum,$post_data);
	print_r($res);
}

if($action == "getUserRegister"){
	//print_r($_POST);
	$accNum = $_REQUEST['accNum'];
	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	$res = $myCategory->getUserRegister($accNum,$post_data);
	print_r($res);
}

if($action == "getMenuIngredientOptionPrice"){
	$iot_id = $_GET['iot_id'];
	$price = $myCategory->getMenuIngredientOptionPrice($iot_id);
	echo $price;
}
if($action == "getGuestId"){
	$accNum = $_GET['accNum'];
	$guest_id = getGuestId_arr($myCategory);

	echo json_encode($guest_id);
	//echo $guest_id;
}

function getGuestId_arr($myCategory){

	$guest_ip = get_client_ip();
	$guest_id = $myCategory->createGuestUser($guest_ip);
	
	$array_data = array("guest_id"=>$guest_id,"guest_ip"=>$guest_ip);

	return $array_data;
}


function getGuestId($myCategory){

	if(!isset($_SESSION["guest_id"]) && !isset($_COOKIE['cart_items'])) { 
	 	$guest_ip = get_client_ip();
	 	$guest_id = $myCategory->createGuestUser($guest_ip);
	  	$_SESSION["guest_id"] = $guest_id;
	  	$_SESSION["guest_ip"] = $guest_ip;
	}else if(isset($_COOKIE['cart_items']) && count($_COOKIE['cart_items']) > 0 ){

		//echo "in cookies ";
		$cookie_items = json_decode($_COOKIE['cart_items'], true);
	    foreach ($cookie_items as $singleItem)
	      {
	      	$guest_id = $singleItem["guest_id"];

	      	$guest_ip = get_client_ip();

	      	if($guest_id == '' || $guest_id == 0) 
	      	{
	      		$guest_id = $myCategory->createGuestUser($guest_ip);
	      	}
	      	$_SESSION["guest_id"] = $guest_id;
	      	$_SESSION["guest_ip"] = $guest_ip;
	      }
	}else{
		$guest_id = $_SESSION["guest_id"];
		$guest_ip = $_SESSION["guest_ip"];
	}

	//$array_data = array("guest_id"=>$guest_id,"guest_ip"=>$guest_ip);

	return $guest_id;
}

if($action == "addToCart")
{

	$accNum = $_REQUEST['accNum'];
	$guest_id = $_REQUEST['guest_id'];
	$is_guest = $_REQUEST['is_guest'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	//print_r($_POST);die;
	$res = $myCategory->addToCart($accNum,$guest_id,$is_guest,$post_data);
	//print_r($res);
	echo $res;
}

if($action == "updateCart")
{
	$guest_id = $_REQUEST['guest_id'];
	$accNum = $_REQUEST['accNum'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	//print_r($_POST);die;
	$res = $myCategory->updateCart($accNum,$guest_id,$post_data);
	echo $res;
}

if($action == "updateProfile")
{
	$accNum = $_REQUEST['accNum'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	//print_r($post_data);die;

	$res = $myCategory->updateProfile($accNum,$post_data);
	//print_r($res);
	echo $res;
}

if($action == "updateProfilePic")
{
	//print_r($_POST);
	//print_r($_FILES);die;
	$accNum = $_REQUEST['accNum'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	 $res = $myCategory->updateProfilePic($accNum,$post_data);
	// echo $res;
}

if($action == "getOrders")
{
	$accNum = $_REQUEST['accNum'];
	$user_id = $_REQUEST['user_id'];
	$res = $myCategory->getOrders($accNum,$user_id);
	echo json_encode($res);
	 //echo $res;
}
if($action == "getOrders_tyres")
{
	$accNum = $_REQUEST['accNum'];
	$user_id = $_REQUEST['user_id'];
	$res = $myCategory->getOrders_tyres($accNum,$user_id);
	echo json_encode($res);
	 //echo $res;
}

if($action == "confirmCart")
{
	$guest_id = $_REQUEST['guest_id'];
	$is_guest = $_REQUEST['is_guest'];
	$accNum = $_REQUEST['accNum'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	//print_r($_POST);die;
	$res = $myCategory->confirmCart($accNum,$guest_id,$is_guest,$post_data);
	echo $res;
}

if($action == "eventCreate")
{
	$guest_id = $_REQUEST['guest_id'];
	//print_r($_POST);//die;
	//print_r($_POST);die;
	$accNum = $_REQUEST['accNum'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	$res = $myCategory->eventCreate($accNum,$guest_id,$post_data);
	echo $res;
}

if($action == "eventMenu")
{
	$guest_id = $_REQUEST['guest_id'];
	//print_r($_POST);//die;
	//print_r($_POST);die;
	$accNum = $_REQUEST['accNum'];
	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	$res = $myCategory->eventMenu($accNum,$guest_id,$post_data);
	echo $res;
}

if($action == "forgot_password")
{

	$accNum = $_REQUEST['accNum'];
	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	$res = $myCategory->emailToForgotPassword($accNum,$post_data);
	echo $res;
}

if($action == "update_password")
{
	$accNum = $_REQUEST['accNum'];
	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	$res = $myCategory->updatePassword($accNum,$post_data);
	echo $res;
}


if($action == "getCartItems") {
	$guest_id = $_REQUEST['guest_id'];
	$accNum = $_REQUEST['accNum'];
	$is_guest = $_REQUEST['is_guest'];

	//print_r($_REQUEST);

  	$getCartItems = $myCategory->getCartItems($accNum,$guest_id,$is_guest);
  	// print_r($getCartItems);die;
  	print_r(json_encode($getCartItems));
}

if($action == "getCartItems_tyres") {
	$guest_id = $_REQUEST['guest_id'];
	$accNum = $_REQUEST['accNum'];
	$is_guest = $_REQUEST['is_guest'];
	$order_id = $_REQUEST['order_id'];

	//print_r($_REQUEST);

  	$getCartItems = $myCategory->getCartItems_tyres($accNum,$guest_id,$is_guest,$order_id);
  	// print_r($getCartItems);die;
  	print_r(json_encode($getCartItems));
}


if($action == "getOpenInvoiceId") {
	$guest_id = $_REQUEST['guest_id'];
	$accNum = $_REQUEST['accNum'];
	$is_guest = $_REQUEST['is_guest'];

	//print_r($_REQUEST);

  	$invoiceId = $myCategory->getOpenInvoiceId($accNum,$guest_id,$is_guest);
  	// print_r($getCartItems);die;
  	print_r($invoiceId);
}

if($action == "isguest_data") {
	
	$accNum = $_REQUEST['accNum'];

	//print_r($_REQUEST);

  	$invoiceId = $myCategory->isguest_data($accNum);
  	// print_r($getCartItems);die;
  	print_r($invoiceId);
}




if($action == "check_cookies")
{
	print_r($_SESSION);
	$cookie_data = json_decode($_COOKIE['cart_items'], true);
	print_r($cookie_data);
}


if($action == "delete_cookies")
{
	session_destroy();
	setcookie("cart_items", "", time() - 3600);
	$cookie_data = json_decode($_COOKIE['cart_items'], true);
	print_r($cookie_data);
}


if($action == "getUserLogin") {
	//$guest_id = getGuestId($myCategory);
	$accNum = $_REQUEST['accNum'];

	$POST = file_get_contents("php://input");
	$data = json_decode($POST, true);
	$post_data = $data['data'];

	$res = $myCategory->getUserLogin($accNum,$post_data);
	//echo $res;

	$msg = array();
	$result = 0;
	if($res!= 0)
		{
			$msg = $res;
			$result = 1;
		}
	
	$arr_res = array("status"=>$result,"msg" => $msg);

	echo json_encode($arr_res);
}


function get_client_ip() {

    $ipaddress = '';

    if (getenv('HTTP_CLIENT_IP'))

        $ipaddress = getenv('HTTP_CLIENT_IP');

    else if(getenv('HTTP_X_FORWARDED_FOR'))

        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');

    else if(getenv('HTTP_X_FORWARDED'))

        $ipaddress = getenv('HTTP_X_FORWARDED');

    else if(getenv('HTTP_FORWARDED_FOR'))

        $ipaddress = getenv('HTTP_FORWARDED_FOR');

    else if(getenv('HTTP_FORWARDED'))

       $ipaddress = getenv('HTTP_FORWARDED');

    else if(getenv('REMOTE_ADDR'))

        $ipaddress = getenv('REMOTE_ADDR');

    else

        $ipaddress = 'UNKNOWN';

    return $ipaddress;

}

 ?>