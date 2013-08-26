<!DOCTYPE html>
<?php
//English Version 
include("../include/Header.php");
?>
<html>
<head>
	<title>EPFL Library Mobile</title>
	<?php
	include("../include/html/header.html");
	?>

	<!--google analytics -->
	<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-2281887-1']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>
</head>
<body data-theme="l">
<div data-role="page" data-add-back-btn="true">
	<div data-role="header" data-theme="l">
		<h1>EPFL Library</h1>
	</div>
	<div data-role="content">
    
	<?php
	//the form is hidden when we display a specific record
	if (!isset($_REQUEST["id"])) {
		echo '<form name="query" action="index.php" method="get">';


		echo '<input type="text" name="q" value="';
		if (isset($_REQUEST["q"])) {
			echo $_REQUEST["q"];
		}
		echo '"/>';
			
		echo '<input type="submit" value="NEBIS Search" data-icon="search" data-iconpos="right" />';

		echo '<fieldset data-role="controlgroup">';
				 
		
		echo '<input type="checkbox" name="libraryfilter" id="checkbox-1" class="custom"';
		if (isset($_REQUEST["libraryfilter"]) and $_REQUEST["libraryfilter"]=="on") {
			echo "checked";
		}

		echo '>';

		echo '<label for="checkbox-1">EPFL only</label>';
		echo '</fieldset>';

		echo '</form>';
	}

	if (isset($_REQUEST["libraryfilter"])) {
		$library="E02";
	} else if (isset($_REQUEST["library"])) {
		$library=$_REQUEST["library"];
	} else {
		$library=false;
	}
	
	if (isset($_REQUEST["network"])) {
		$network=$_REQUEST["network"];
	} else {
		$network="NEBIS";
	}
		
	if (isset($_REQUEST["q"])) {
		//display a list of results

		//set defaults
		if (isset($_REQUEST["offset"])) {
			$offset=$_REQUEST["offset"];
		} else {
			$offset=1;
		}	
		search($_REQUEST["q"], $network, $library, $offset, "en");	
		
	} else if (isset($_REQUEST["id"])) {
		//display a single item	
		displayItem($_REQUEST["id"], $network, $library, "en");	
	} else {
	echo '
	<br /><br />
	<ul data-role="listview">
	  <li><a href="hours.php">Hours</a></li>
	  <li><a href="access.php">Find us</a></li>
	  <li><a href="contact.php">Contact</a></li>
	</ul>

	<br/><br/>
	<ul data-role="listview">
	  <li><a href="http://library.epfl.ch/en/?nomobile" rel="external" target="_blank">Full website</a></li>
	</ul>

		<br />
		<div data-role="controlgroup" data-type="horizontal" align="center">
			<a href="../fr/index.php" data-role="button">français</a>
			<a data-role="button" class="ui-btn-active">English</a>			
		</div>
    <br/>
    Like us on <a href="http://www.facebook.com/epfl.library">Facebook</a>. <br/><br/>
	Powered by <a href="https://github.com/swissbib/swissbibMobile">swissbibMobile</a>.
	';
	}


	?>


		
		
	</div><!-- /content -->
</div><!-- /page -->


</body>
</html>