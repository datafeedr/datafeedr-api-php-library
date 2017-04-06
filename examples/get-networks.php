<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Network Request - All Networks
 *
 * This request returns ALL affiliate networks available in Datafeedr API which contain
 * at least one product.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

try {
	$response = $api->getNetworks();
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

