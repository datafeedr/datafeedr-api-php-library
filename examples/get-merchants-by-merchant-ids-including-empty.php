<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - Specific Merchants Including Empty
 *
 * This request returns specific merchants by merchant ID including merchants with 0 products.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$merchant_ids  = array( 34432, 5134, 4191, 95093 );
$include_empty = true;

try {
	$response = $api->getMerchantsById( $merchant_ids, $include_empty );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

