<?php
use PHPUnit\Framework\TestCase;
use PnxPlease\PnxPlease\PnxPlease;

class PnxPleaseTest extends TestCase
{
    public function testThatYouGetTheRightXMLRecord()
    {
	// Initialize the object with a record id and a Primo URL
	$pnxPlease = new PnxPlease("01UOML_ALMA21149602560002976","http://miami-primo.hosted.exlibrisgroup.com/primo_library/libweb/action/display.do");
	// Get the PNX Record
	$pnx = trim($pnxPlease->toString());
	// Load the XML file used for testing and trim whitepsace 
	$xml = trim(file_get_contents(__DIR__ . '/record.xml'));
	// Assert that the XML file and the PNX record from Primo are the same 
	$this->assertEquals($xml,$pnx);
    }

    public function testThatYouCanGetAnArray()
    {
	// Initialize the object with a record id and a Primo URL
	$pnxPlease = new PnxPlease("01UOML_ALMA21149602560002976","http://miami-primo.hosted.exlibrisgroup.com/primo_library/libweb/action/display.do");

	$pnxArray = $pnxPlease->toArray();

	$this->assertEquals($pnxArray['control']['sourcerecordid'], '21149602560002976');
	
    }

    public function testThatYouCanGetJSON()
    {
	// Initialize the object with a record id and a Primo URL
	$pnxPlease = new PnxPlease("01UOML_ALMA21149602560002976","http://miami-primo.hosted.exlibrisgroup.com/primo_library/libweb/action/display.do");

	$pnxJSON = $pnxPlease->toJSON();
	$testingJSON = file_get_contents(__DIR__ . '/record.json');

	
	$this->assertEquals(trim($pnxJSON), trim($testingJSON));
	
    }

    

    
}
