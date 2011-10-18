<!DOCTYPE html>
<?php
//English Version 

include("../include/mobile/swissbib_search.php");
include("../include/mobile/display_item.php");
?>
<html>
  <head>
  <title>EPFL Library Mobile</title>
  <?php
	include("../include/mobile/header.html");
  ?>
  
  
</head>
<body data-theme="l">
<div data-role="page" id="horaires" data-add-back-btn="true">
<div data-role="header" data-theme="l">
    <h1>Hours</h1>
</div>
<div data-role="content">	
	
	<?php
		$url="http://library.epfl.ch/scripts/hours-search.php";
		//$url="http://sisbsrv13.epfl.ch/scripts/hours-search.php?date=2011-08-01";
		$text_full=@file_get_contents($url);
		$opening=substr($text_full,0,strpos($text_full, "|"));		
		$services=substr($text_full,strpos($text_full, "|")+1);						
	?>
	
	
	<h3>Today</h3>
	<p>Opening : <?php echo $opening;?><br />
	   Services : <?php echo $services;?></p>
	
	
	<h3>Normal hours</h3>
	<p>Opening : seven days a week, 7h-24h<br />
	   Services : mo-fr, 8h-20h</p>
	<br />
	<ul data-role="listview">
	<li><a href="http://library.epfl.ch/en/bib/?pg=hours" rel="external" target="_blank">Detailed hours</a></li>
	</ul>
	
	

	
	
	
	</div><!-- /content -->



</div>


</body>
</html>