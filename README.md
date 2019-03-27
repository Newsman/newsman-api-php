# Newsman PHP API Client - version 1.2

This is the Newsman App PHP API client for API version 1.2.

## Newsman - Smart Email Service Provider

[Newsman](http://www.newsmanapp.com "Smart Email Service Provider") is a Smart Email Service Provider. 
We send newsletters on behalf of our customers.

## About Newsman API - version 1.2

Our current API version is 1.2. API documentation can be found here:

* RO: https://kb.newsman.ro/api/
* EN: https://kb.newsmanapp.com/api/
* FR: https://kb.newsman.fr/api/
 
Our API requires an API KEY which you can generate in your Account and your Newsman user id.
The API exposes XML RPC and REST interfaces.

This Client offers both options: XML RPC and REST in one single client library. 
Call type can be set to *rpc* or *rest*. Default type is *rpc*.

### REST

The REST *call type* is done over HTTP POST and requires one of the following http clients installed:

* curl - https://www.php.net/manual/en/book.curl.php

Example code:

```php
<?php
$client = new Newsman_Client($newsman_user_id, $api_key);
$client->setCallType("rest"); // http transport will be detected: zend_http_client or curl
?>
```

### XML RPC

The XML RPC *call type* requires one of the following XML RPC clients installed:

* xmlrpc PHP module - https://www.php.net/manual/en/book.xmlrpc.php

Example code:

```php
<?php
$client = new Newsman_Client($newsman_user_id, $api_key);
$client->setCallType("rpc"); // rpc transport will be detected: zend_xmlrpc_client or xmlrpc_encode
?>
```

# String Encoding

Please make sure all strings are `UTF-8` encoded.

# Example 

More detailed [examples](https://github.com/Newsman/newsman-api-php/tree/master/example "Newsman PHP API Client examples") can be found [here](https://github.com/Newsman/newsman-api-php/tree/master/example).
