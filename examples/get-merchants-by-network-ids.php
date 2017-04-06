<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - Specific Networks
 *
 * This request returns merchants for specific affiliate networks.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids = array( 276, 277 );

try {
	$response = $api->getMerchants( $network_ids );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

