<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Network Request - Specific Networks
 *
 * This request returns specific affiliate networks available in Datafeedr API by network ID.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids = array( 6, 8 );

try {
	$response = $api->getNetworks( $network_ids );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

