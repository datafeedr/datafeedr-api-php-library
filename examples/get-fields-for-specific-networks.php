<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Fields Request
 *
 * Return a list of searchable fields and their field type (ie. text, int or date) for a specific network or networks.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids = array( 276, 277 );

try {
	$response = $api->getFields( $network_ids );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

