<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Merchant Request - All Including Empty
 *
 * This request returns all merchants whether they contain any products or not.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids   = array();
$include_empty = true;

try {
	$response = $api->getMerchants( $network_ids, $include_empty );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

