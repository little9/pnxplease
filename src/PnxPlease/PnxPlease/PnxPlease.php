<?php
namespace PnxPlease\PnxPlease;
class PnxPlease {

    private $recordId;
    private $primoUrl;
    private $pnxRecord;
    
    
    public function __construct($recordId, $primoUrl) {
	$this->recordId = $recordId;
	$this->primoUrl = $primoUrl;
	$this->pnxRecord = $this->getPnx();
    }
    
    private function getPnx() {
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $this->createRequest());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch); 
	curl_close($ch);
	return $output;
    }

    private function createRequest() {
	$recordId = $this->recordId;
	$url = $this->primoUrl . "?ct=display&fn=search&doc=$recordId&showPnx=true";
	return $url;
    }


    public function toString() {
	return $this->pnxRecord; 
    }

    public function toArray() {
	$xml = simplexml_load_string($this->pnxRecord);
	$pnxArray = unserialize(serialize(json_decode(json_encode((array) $xml), 1)));
	return $pnxArray;
    }

    public function toJSON() {
	$xml = simplexml_load_string($this->pnxRecord);
	$pnxJSON = json_encode($xml);
	return $pnxJSON;
    }
    
}
