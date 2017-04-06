<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - Limit fields returned about each merchant.
 *
 * This request returns merchants for specific affiliate networks and only a subset of fields.
 * The "_id" field will always be returned.
 *
 * Possible values for the $fields array are: source_id, source, product_count & name.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids   = array( 276, 277 );
$include_empty = true;
$fields        = array( 'name', 'source' );

try {
	$response = $api->getMerchants( $network_ids, $include_empty, $fields );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

