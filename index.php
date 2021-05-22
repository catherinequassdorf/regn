<?php
// index.php ligger längst ner i "turordningslistan". men alla nya sidor hänvisas till denna sidan om ingen annan finns i turordningen.
?>
<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>
<div id="ttr_main" class="row">
<div id="ttr_content" class="col-md-12">

<div class="row-regn">
<div class="col-md-12">
<div class="d-flex justify-content-center">
<h3>REGN</h3>
</div>
<div class="d-flex justify-content-center">
<p>Without a plan you get soaked.</p>
</div>
</div>
</div>
</div>
<?php include('templates/footer.php');?>