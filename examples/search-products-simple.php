<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Search Products (Simple)
 *
 * This request will search for products matching the various filters.
 *
 * This simple product search adds 2 filters, one for the product name and one to limit the
 * search to 2 specific affiliate networks.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

/**
 * Initialize new DatafeedrSearchRequest object.
 */
$search = $api->searchRequest();

/**
 * Filter products that have the word "pets" in their name.
 */
$search->addFilter( 'name LIKE adjama climbing harness' );

/**
 * Filter products that are from affiliate networks Commission Junction (Network ID: 3) or
 * ShareASale (Network ID: 6).
 */
$search->addFilter( 'source_id IN 3, 6' );

try {
	$products = $search->execute();
	$response = $search->getResponse();
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
}

var_dump( $response );

