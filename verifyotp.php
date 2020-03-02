<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="number" name="mobile"><br>
    <input type="number" name="otp"><br>
      <button type="submit" name="submit">verify otp</button>
    </form>

</body>
</html>

<?php
$authKey = "308215AWvcCsbvpgi5df357ef";
$senderId = "NewUsr";
if(isset($_POST['submit'])){
$mobile = $_POST['mobile'];
$otp = $_POST['otp'];
$url = "https://control.msg91.com/api/verifyRequestOTP.php?authkey=$authKey&mobile=$mobile&otp=$otp";
$curl = curl_init($url);

curl_setopt_array($curl, array(
  // CURLOPT_URL => "https://api.msg91.com/api/v5/otp?invisible=1&otp=OTP%20to%20send%20and%20verify.%20If%20not%20sent%2C%20OTP%20will%20be%20generated.&userip=IPV4%20User%20IP&authkey=Authentication%20Key&email=Email%20ID&mobile=Mobile%20Number&template_id=Template%20ID&otp_length=&otp_expiry=",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "",
   CURLOPT_SSL_VERIFYHOST => 0,
   CURLOPT_SSL_VERIFYPEER => 0
 ));

 $response = curl_exec($curl);
 $err = curl_error($curl);
 $a = $response;
 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } 
 else{
   echo "<pre>";
  
   print_r($response);
   echo   json_encode($response);
     
   $ans =  json_encode($response);
      echo $ans;
 }



}


?>