
<?php

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("mahmu628610d8ef551");
$store_passwd=urlencode("mahmu628610d8ef551@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	// echo "<pre>";
    // print_r($result);
    // echo "</pre>";

	# TRANSACTION INFO
	$status = $result->status;    

} else {

	echo "Failed to connect with SSLCOMMERZ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transaction  Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 
  

<div class="container">
	<div class="col-md-5 mt-5 mx-auto" >
		<div class="card">
			<div class="card-header text-center"> Transaction  Result</div>
			<div class="card-body">
				<p>Transaction Status: <?php echo $status; ?></p>
			</div> 
			
		</div>
	</div>
 


</div>

</body>
</html>

