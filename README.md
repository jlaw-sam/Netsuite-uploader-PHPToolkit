## Netsuite Uploader
Webservices SOAP migrate & import records


##Getting Started

1. To use the PHPToolkit 2019_1 project define passport configuration on PHPtoolkit > NSconfig.php

```php

	define("NS_ENDPOINT", "2019_1");
	define("NS_HOST", "https://account.api.netsuite.com");
	define("NS_EMAIL", "");
	define("NS_PASSWORD", "");
	define("NS_ROLE", "");
	define("NS_ACCOUNT", "");

	define("NS_APPID", "");


```

2. Create a database named netsuite and import the following netsuite.sql table

Database configuration is located on :
```

	config/env.php


```

3. Run Mysql and Apache and make sure SOAP is enabled on php.ini


4. Some sample csv file that we could import on 

```

	import test > test.csv


```

##List of Required Maps for Chart of Accounts

* Account Number required 
* Account Name required 
* Account Type required 
* Subsidiary required 