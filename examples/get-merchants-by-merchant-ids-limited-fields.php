<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - Limit fields returned about each merchant.
 *
 * This request returns merchants by merchant ID and only a subset of fields.
 * The "_id" field will always be returned.
 *
 * Possible values for the $fields array are: source_id, source, product_count & name.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$merchant_ids  = array( 34432, 5134, 4191, 95093 );
$include_empty = false;
$fields        = array( 'name', 'source' );

try {
	$response = $api->getMerchantsById( $merchant_ids, $include_empty, $fields );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

