# pnxplease
[![Build Status](https://travis-ci.org/little9/pnxplease.svg?branch=master)](https://travis-ci.org/little9/pnxplease)

This is a PHP class that returns a Primo PNX record as a string when given an Alma/Primo record id.

# Usage

You need to provide the record id and the URL for your hosted Primo instance when initializing
the object.

```php

$pnxPlease = new PnxPlease("01UOML_ALMA21149602560002976","http://miami-primo.hosted.exlibrisgroup.com/primo_library/libweb/action/display.do");
```

After initializing the object, you can get the results in a variety of formats:

```php
// As a JSON string
$pnxPlease->toJSON;
// As a PHP array 
$pnxPlease->toArray;
// As an XML string 
$pnxPlease->toString;
```

# Tests

To run the tests:
```bash
phpunit
```


# Dependencies

The only dependency is PHPUnit for running the tests. 
