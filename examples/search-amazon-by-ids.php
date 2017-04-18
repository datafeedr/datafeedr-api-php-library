<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Search Amazon (Barcodes)
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

/**
 * Initialize new DatafeedrAmazonLookupRequest object.
 */
$search = $api->amazonLookupRequest( AMAZON_ACCESS_KEY, AMAZON_SECRET_KEY, AMAZON_ASSOCIATE_TAG, AMAZON_LOCALE );

/**
 * Filter products by keywords.
 */
$search->addParam( 'EAN', array( '0859555005318', '0858941006397' ) );

try {
	$products = $search->execute();
	$response = $search->getResponse();
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
}

var_dump( $response );

