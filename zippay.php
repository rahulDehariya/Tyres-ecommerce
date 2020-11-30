<?php 

	$HTTP_HOST = 'https://tyre.staffstarr.com/';

	$order_id = $_GET['order_id'];
	$amount = $_GET['amount'];
	$specials_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getOrderDetails_tyres&order_id=".$order_id);
	// print_r($specials_json); die;
	$Order_items=json_decode($specials_json,true);

  // print_r($Order_items);die;

	// print_r($Order_items['order_details']['items']);die;

  $items = array();

  $total_amount = 0;

  $k = 0;

  foreach ($Order_items['order_details']['items'] as $item_arr) {

     

     $unit_price = $item_arr['unit_price'];
     

    // $subtotal = $item_arr['subtotal'];
     $qty = $item_arr['qty'];
    // $unit_price  = round($subtotal/$qty);
     // echo $unit_price;

     $unit_price  = round($unit_price);

    if($unit_price < 0)
    {
      $m = $k-1;
      $total_amount = $total_amount+$unit_price;

      $prev_amount = $items[$m]['amount']*$items[$m]['quantity'];
      $items[$m]['amount']= $prev_amount+$unit_price;
      $items[$m]['quantity']= 1;

    }else{
      $total_amount = $total_amount+($unit_price*$qty);
      $items[$k] = array("name" => $item_arr['product'],"amount"=> $unit_price,"quantity"=> $item_arr['qty']);
      $k++;
    }
    // echo $total_amount;

  }


  // echo $total_amount;die;

// echo "<pre>";
 $json_builder = '{
  "shopper": {
    "title": "Mr",
    "first_name": "John",
    "last_name": "Smith",
    "middle_name": "Joe",
    "phone": "0400000000",
    "email": "test@emailaddress.com",
    "birth_date": "2017-10-10",
    "gender": "Male",
    "statistics": {
      "account_created": "2015-09-09T19:58:47.697Z",
      "sales_total_number": 2,
      "sales_total_amount": 450,
      "sales_avg_value": 250,
      "sales_max_value": 350,
      "refunds_total_amount": 0,
      "previous_chargeback": false,
      "currency": "AUD"
    },
    "billing_address": {
      "line1": "10 Test st",
      "city": "Sydney",
      "state": "NSW",
      "postal_code": "2000",
      "country": "AU"
    }
  },
  "order": {
    "reference": "testdarren124",
    "amount": '.$total_amount.',
    "currency": "AUD",
    "shipping": {
      "pickup": false,
      "tracking": {
        "uri": "http://tracking.com?code=CBX-343",
        "number": "CBX-343",
        "carrier": "tracking.com"
      },
      "address": {
        "line1": "10 Test st",
        "city": "Sydney",
        "state": "NSW",
        "postal_code": "2000",
        "country": "AU"
      }
    },
    "items": '.json_encode($items).'
  },
  "config": {
    "redirect_uri": "https://tyre.staffstarr.com/zippayPaymentSuccess.php?order_id='.$_GET['order_id'].'&amount='.$_GET['amount'].'"
  }
}';
// die;





$header = array();
$header[] = 'Content-Type: application/json';
$header[] = 'Authorization:Bearer G1Qt/l+PG/XUAdf7ii1wpxVablK27rUaQwT12Hi6CuA=';
$header[] = 'Zip-Version: 2017-03-01';
 
$ch = curl_init("https://api.sandbox.zipmoney.com.au/merchant/v1/checkouts");
//See the cURL documentation for more information: http://curl.haxx.se/docs/sslcerts.html
//We recommend using this bundle: https://raw.githubusercontent.com/bagder/ca-bundle/master/ca-bundle.crt
// curl_setopt( $ch, CURLOPT_CAINFO, "ca-bundle.crt");


curl_setopt( $ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_builder);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
curl_close ($ch);
// print_r($response);die;
 
$json = json_decode($response, true);

 echo "<script>window.location.href='".$json["uri"]."'</script>";
// header('Location: '.$json["uri"]);

?>