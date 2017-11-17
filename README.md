# Datafeedr API PHP Library
A PHP client library for the Datafeedr API.

```PHP
require_once '../config.php';
require_once '../datafeedr.php';

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$search = $api->searchRequest();

$search->addFilter( 'name LIKE adjama climbing harness' );
$search->addFilter( 'source_id IN 3, 6' ); // CJ & ShareASale

try {
	$products = $search->execute();
	$response = $search->getResponse();
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
}

var_dump( $response );
```

More examples can be found in the **examples** folder.
