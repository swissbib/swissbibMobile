<?php

class SruQuery
{
	private $_baseUrl="http://sru.swissbib.ch/SRW/search/?";
	private $_standardParameters="&version=1.1&operation=searchRetrieve&recordSchema=info%3Asrw%2Fschema%2F1%2Fmarcxml-v1.1&resultSetTTL=300&recordPacking=xml&maximumRecords=10";	
	
	
	function getResultsFromSearch($query, $network, $library, $offset=1)
	{
		$queryParameter="&query=dc.anywhere+%3D+%22".urlencode($query)."%22";
		
		if($network){
			$queryParameter=$queryParameter."+and+dc.xNetwork+%3D+%22".$network."%22";
		}
		
		if($library){
			$queryParameter=$queryParameter."+and+dc.possessingInstitution+%3D+%22".$library."%22";
		}		
		
		$recordOffset="&startRecord=".$offset;
		
		$url=$this->_baseUrl.$queryParameter.$this->_standardParameters.$recordOffset;
		
		return $this->sendToSru($url);
		
	}
	
	function getRecordFromIdWithHoldings($id)
	{
		$queryParameter="&query=dc.id+%3D+%22".$id."%22";
		$recordOffset="&startRecord=1";
		$withHoldings="&x-info-10-get-holdings=true";
		$url=$this->_baseUrl.$queryParameter.$this->_standardParameters.$recordOffset.$withHoldings;		
		return $this->sendToSru($url);
	}
	
	function getSpellSuggestion($query)
	{
		//no nebis because it gets a spell suggestion
		$queryParameter="&query=dc.anywhere+%3D+%22".urlencode($query)."%22";
		$spellSuggestion="&x-info-7-spelling=true";
		$recordOffset="&startRecord=1";
		$url=$this->_baseUrl.$queryParameter.$this->_standardParameters.$recordOffset.$spellSuggestion;
		$pxml=$this->sendToSru($url);
		
		$spell=$pxml->extraResponseData->children('ns4',true);
		$spell=$spell->children('spellings',true);
		$spell->registerXPathNamespace('spellings', 'urn:oclc-srw:spellings');
		$spell_suggestion=$spell->xpath('spellings:spelling/spellings:replacement/spellings:replacementText');
		
		if($spell_suggestion){		
			return $spell_suggestion[0];
		}
		else {
			return False;
		}
		
		
	}
	
	private function sendToSru($url)
	{		
		$response = @file_get_contents($url);	
		//echo "<a href='".$url."'>link</a>";
		
		if ($response === False)
		{
			echo "Impossible to connect to Swissbib SRU using ";
			echo "<a href='".$url."'>".$url."</a>";
			return False;
		}
		else
		{	
			// parse XML
			$pxml = simplexml_load_string($response);
			if ($pxml === False)
				{
					echo "Impossible to parse Swissbib SRU XML<br>";
					echo $response;
					return False; // no xml
				}
			
			return $pxml;
		}
					
	}
	

	
}

?>
