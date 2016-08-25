<?php
namespace PnxPlease\PnxPlease;
class PnxPlease {

  private $recordId;
  private $primoUrl;
  
  public function __construct($recordId, $primoUrl) {
    $this->recordId = $recordId;
    $this->primoUrl = $primoUrl;
  }
  
  public function getPnx() {
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

 
}
