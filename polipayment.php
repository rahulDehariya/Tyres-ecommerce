<?php 

$amount = $_GET['amount'];
if($amount > 1000)
{
	$amount =  1000;
}

$json_builder = '{
    "Amount":"'.$amount.'",
    "CurrencyCode":"AUD",
    "MerchantReference":"BROADMEADOW",
    "MerchantHomepageURL":"https://tyre.staffstarr.com",
    "SuccessURL":"https://tyre.staffstarr.com/poliPaymentSuccess.php?order_id='.$_GET['order_id'].'&amount='.$_GET['amount'].'",
    "FailureURL":"https://tyre.staffstarr.com/poliPaymentFailure.php?order_id='.$_GET['order_id'].'&amount='.$_GET['amount'].'",
    "CancellationURL":"https://tyre.staffstarr.com/poliPaymentCancelled.php?order_id='.$_GET['order_id'].'&amount='.$_GET['amount'].'",
    "NotificationURL":"https://tyre.staffstarr.com/poliPaymentNudge.php?order_id='.$_GET['order_id'].'&amount='.$_GET['amount'].'" 
}';
 
$auth = base64_encode('S6104915:mE!4Y2d@z$8GW');
$header = array();
$header[] = 'Content-Type: application/json';
$header[] = 'Authorization: Basic '.$auth;
 
$ch = curl_init("https://poliapi.apac.paywithpoli.com/api/v2/Transaction/Initiate");
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

// echo 11;die;
 
header('Location: '.$json["NavigateURL"]);

?>