<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Network Request - Specific Networks and a subset of fields about each network.
 *
 * This request returns specific affiliate networks available in Datafeedr API by network ID as well as just
 * a few of the fields. The "_id" field will always be returned.
 *
 * Possible values for the $fields array are: group, merchant_count, name, product_count & type.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids   = array( 3, 4, 6 );
$include_empty = true;
$fields        = array( 'name', 'product_count' );

try {
	$response = $api->getNetworks( $network_ids, $include_empty, $fields );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

