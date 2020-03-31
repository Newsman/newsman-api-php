# Newsman PHP API Client - version 1.2

This is the Newsman App PHP API client for API version 1.2.

## Newsman - Smart Email Service Provider

[Newsman](https://www.newsman.app "Smart Email Service Provider") is a Smart Email Service Provider. 
We send newsletters on behalf of our customers.

## About Newsman API - version 1.2

Our current API version is 1.2. API documentation can be found here:

* RO: https://kb.newsman.ro/api/
* EN: https://kb.newsman.app/api/
* FR: https://kb.newsman.fr/api/
 
Our API requires an API KEY which you can generate in your Account and your Newsman User id.

### Requirements

Newsman PHP API requires `curl` installed:

* curl - https://www.php.net/manual/en/book.curl.php

## Example

```php
<?php
$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->list->all();
?>
```

# String Encoding

Please make sure all strings are `UTF-8` encoded.

# Example 

More detailed [examples](https://github.com/Newsman/newsman-api-php/tree/master/example "Newsman PHP API Client examples") can be found [here](https://github.com/Newsman/newsman-api-php/tree/master/example).


### Composer Install

Put a file named `composer.json` at the root of your project, containing your project dependencies:

```
{
    "require": {
        "newsman/api": "1.0.1"
    }
}
```

Install Composer In Your Project
Run this in your command line:

`curl -sS https://getcomposer.org/installer | php`

Execute this in your project root.

`php composer.phar install`
