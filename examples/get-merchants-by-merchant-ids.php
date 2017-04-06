<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - Specific Merchants
 *
 * This request returns specific merchants by merchant ID excluding merchants with 0 products.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$merchant_ids = array( 34432, 5134, 4191, 95093 );

try {
	$response = $api->getMerchantsById( $merchant_ids );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

