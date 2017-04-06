<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - All Merchants
 *
 * This request returns ALL merchants available in Datafeedr API which contain at least one product.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

try {
	$response = $api->getMerchants();
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

