<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>


<div class="col-md-12">
<div class="d-flex justify-content-center">
<img alt="Qries" src="http://pngimg.com/uploads/umbrella/umbrella_PNG69213.png"
         width="250" height="250">
</div>
</div>

</br>
<div class="col-md-12">
<div class="d-flex justify-content-center">
<form method="GET" action="">
    <input type="submit" value="London" name="london" />
    <input type="submit" value="Tokyo" name="tokyo" />
	<input type="submit" value="Stockholm" name="stockholm" />
    </form>
</br>



</div>
</div>
<div class="col-md-12">
<div class="d-flex justify-content-center">

<?php
if(isset($_GET['london'])) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=london%",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
		"x-rapidapi-key: 26db325f99msh4de8923d94d55afp12e057jsn02ffc24b7b21",
		"accept: application/json"
	  ),
	));
	
	$response = curl_exec($curl);
	$result = json_decode($response, true);
	
	echo $result['weather'][0]['main'];
	?></br>
	<?php
	echo $result['weather'][0]['description'];
	}
?>

<?php
if(isset($_GET['tokyo'])) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=tokyo%",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
		"x-rapidapi-key: 26db325f99msh4de8923d94d55afp12e057jsn02ffc24b7b21",
		"accept: application/json"
	  ),
	));
	
	$response = curl_exec($curl);
	$result = json_decode($response, true);
	
	echo $result['weather'][0]['main'];
	?></br>
	<?php
	echo $result['weather'][0]['description'];
	}
	?>

<?php
if(isset($_GET['stockholm'])) {
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?q=stockholm%",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
	"x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
	"x-rapidapi-key: 26db325f99msh4de8923d94d55afp12e057jsn02ffc24b7b21",
	"accept: application/json"
  ),
));

$response = curl_exec($curl);
$result = json_decode($response, true);

echo $result['weather'][0]['main'];
?></br>
<?php
echo $result['weather'][0]['description'];
}
?>
</div>

