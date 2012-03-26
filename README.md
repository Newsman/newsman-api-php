# Newsman PHP API Client - version 1.2

This is the Newsman App PHP API client for API version 1.2.

## Newsman - Smart Email Service Provider

[Newsman](http://www.newsmanapp.com "Smart Email Service Provider") is a Smart Email Service Provider. 
We send newsletters on behalf of our customers.

## About Newsman API - version 1.2

Our current API version is 1.2. API documentation can be found here:

* RO: http://kb.newsman.ro/api/
* EN: http://kb.newsmanapp.com/api/
* FR: http://kb.newsman.fr/api/
 
Our API requires an API KEY which you can generate in your Account and your Newsman user id.
The API exposes XML RPC and REST interfaces.

This Client offers both options: XML RPC and REST in one single client library. 
Call type can be set to *rpc* or *rest*. Default type is *rpc*.

### XML RPC

The XML RPC *call type* requires one of the following XML RPC clients installed:

* Zend XML RPC - http://framework.zend.com/manual/en/zend.xmlrpc.html 
* xmlrpc PHP module - http://www.php.net/manual/en/ref.xmlrpc.php

XML RPC *call type* is recommended. 

Example code:
```php
$client = new Newsman_Client($newsman_user_id, $api_key);
$client->setCallType("rpc"); // rpc transport will be detected: zend_http_client or xmlrpc_encode
```

### REST

The REST *call type* is done over HTTP POST and requires one of the following http clients installed:

* curl - http://php.net/manual/en/book.curl.php
* Zend Http Client - http://framework.zend.com/manual/en/zend.http.client.html

Example code:
```php
$client = new Newsman_Client($newsman_user_id, $api_key);
$client->setCallType("rest"); // http transport will be detected: zend_http_client or curl
```

# String Encoding

Please make sure all strings are UTF-8 encoded.

# Example 

A more detailed [example](https://github.com/Newsman/newsman-api-php/blob/master/example/example.php "Newsman PHP API Client example") can be found [here](https://github.com/Newsman/newsman-api-php/blob/master/example/example.php).
