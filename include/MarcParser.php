<?php

function getMarcField($marc, $field, $subfield)
{
	$marc->registerXPathNamespace('marc', 'http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd');
	$result=$marc->xpath('marc:datafield[@tag="'.$field.'"]/marc:subfield[@code = "'.$subfield.'"]');
	if ($result) {
		return($result[0]);
	} else {
		return "";
	}
}

function getNebisSystemNumber($marc)
{
	$marc->registerXPathNamespace('marc', 'http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd');
	$result=$marc->xpath('marc:datafield[@tag="035"]/marc:subfield[@code = "a"][starts-with(.,"(NEBIS)")]');
	if ($result) {
		return(substr($result[0],7));
	} else {
		return "";
	}
}

function getControlField($marc, $field)
{
	$marc->registerXPathNamespace('marc', 'http://www.loc.gov/standards/marcxml/schema/MARC21slim.xsd');
	$result=$marc->xpath('marc:controlfield[@tag="'.$field.'"]');
	if ($result) {
		return($result[0]);
	} else {
		return "";
	}
}

function getHoldingField($marc, $subfield)
{
	$marc->registerXPathNamespace('ns3', 'urn:oclc-srw:holdings');
	$result=$marc->xpath('ns3:subfield[@code = "'.$subfield.'"]');
	if ($result) {
		return($result[0]);
	} else {
		return "";
	}
}

?>