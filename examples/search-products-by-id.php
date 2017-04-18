<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Search Products By Product ID
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

/**
 * Initialize new DatafeedrSearchRequest object.
 */
$search = $api->searchRequest();

/**
 * Filter products by product IDs.
 */
$search->addFilter( 'id IN 131200184959634, 3588201351768421' );

try {
	$products = $search->execute();
	$response = $search->getResponse();
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
}

var_dump( $response );

