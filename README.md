# Newsman PHP API Client - version 1.2

This is the Newsman App PHP API client for API version 1.2.

## Newsman - Smart Email Service Provider

[Newsman](http://www.newsmanapp.com title="Smart Email Service Provider") is a Smart Email Service Provider. 
We send newsletters on behalf of our customers.

## About Newsman API - version 1.2

Our current API version is 1.2. API documentation can be found here:

* RO: http://kb.newsman.ro/api/
* EN: http://kb.newsmanapp.com/api/
* FR: http://kb.newsman.fr/api/
 
Our API requires an API KEY which you can generate in your Account.
The API exposes XML RPC and REST interfaces.

This Client offers both options: XML RPC and REST in one single client library. 
Call type can be set to *rpc* or *rest*. Default type is *rpc*.

### XML RPC

The XML RPC *call type* requires one of the following XML RPC clients installed:

* Zend XML RPC - http://framework.zend.com/manual/en/zend.xmlrpc.html 
* xmlrpc PHP module - http://www.php.net/manual/en/ref.xmlrpc.php

XML RPC *call type* is recommended. 

### REST

The REST *call type* is done over HTTP POST and requires one of the following http clients installed:

* curl - http://php.net/manual/en/book.curl.php
* Zend Http Client - http://framework.zend.com/manual/en/zend.http.client.html

# String Encoding

Please make sure all strings are UTF-8 encoded.

# Example 

A more detailed [example](https://github.com/Newsman/newsman-api-php/blob/master/example.php title="Newsman PHP API Client example") can be found [here](https://github.com/Newsman/newsman-api-php/blob/master/example.php).
