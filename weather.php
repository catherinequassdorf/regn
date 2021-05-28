<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<div class="col-md-12">
<div class="d-flex justify-content-center">
<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=London%2Cuk&lat=0&lon=0&callback=test&id=2172797&lang=null&units=%22metric%22%20or%20%22imperial%22&mode=xml%2C%20html",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
		"x-rapidapi-key: 26db325f99msh4de8923d94d55afp12e057jsn02ffc24b7b21"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
    //designa response bättre
}
?>
</div>
</div>