﻿<!DOCTYPE html>

<html>
  <head>
  <title>EPFL Bibliothèque - Horaires</title>
  <?php
	include("../include/html/header.html");
  ?>
    
</head>
<body data-theme="l">

<div data-role="page" id="horaires" data-add-back-btn="true">
<div data-role="header" data-theme="l">
    <h1>Horaires</h1>
</div>
<div data-role="content">	
	
	<?php
		$url="http://library.epfl.ch/scripts/hours-search.php";		
		$text_full=@file_get_contents($url);
		$opening=substr($text_full,0,strpos($text_full, "|"));		
		$services=substr($text_full,strpos($text_full, "|")+1);						
	?>
	
	
	<h3>Aujourd'hui</h3>
	<p>Ouverture : <?php echo $opening;?><br />
	   Services : <?php echo $services;?></p>
	
	
	<h3>Horaires habituels</h3>
	<p>Ouverture : 7 jours sur 7, 7h-24h<br />
	   Services : lu-ve, 8h-20h</p>
	<br />
	<ul data-role="listview">
	<li><a href="http://library.epfl.ch/bib/?pg=hours" rel="external" target="_blank">Horaires détaillés</a></li>
	</ul>
	
	

	
	
	
	</div><!-- /content -->



</div>
</body>
</html>