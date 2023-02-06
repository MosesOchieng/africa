<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["sessionCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to Pesa Otas.Dear user choose an option below to proceed.\n";
    $response .= "1. Log in to Pesa Otas. \n";
    $response .= "2. Register with Pesa Otas.\n";
    $response .= "3. About Pesa Otas.";

} else if ($text == "1") {
    $response = "CON Enter your Id Number to log in. \n";
    $response .="1. Ok.";

}else if($text == "2"){
    $response = "CON Enter your  Id number to register. \n";
    $response .= "1.Ok";


}else if($text == "3"){
    $about = "Pesa Otas is a blockchain application that is a financial technology that enables users perform various activities across the internet that include.";
    $response = "END This information about.".$about;

} else if ($text == "1*1") {
  $response = "CON Your details are \n";
  $response .="1. Account Pesa Coin balances. \n";
  $response .="2. Change pin. \n";
  $response .="3. Mini statement of balances. \n";
  $response .="4. Withdraws.\n";
  $response .="5. Back.";

}else if($text == "2*1"){
  $response = "CON Your details are \n";
  $response .="1. Account Pesa Coin balances. \n";
  $response .="2. Change pin. \n";
  $response .="3. Mini statement of balances. \n";
  $response .="4. Withdraws.\n";
  $response .="5. Back.";

}else if($text == "1*1*1"){
  $balance = "Ksh.3546";
  $response = "END Your balance is.".$balance;



}else if($text == "2*1*1"){


}else if($text == "1*1*1*1"){
    $details = "";
    $balance = "";
    $response ="CON Your details are : ".$details."and your balance is".$balance;


}


// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

?>
