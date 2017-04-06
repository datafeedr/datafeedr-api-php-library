<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Network Request - All Networks Including Empty Networks
 *
 * This request returns ALL affiliate networks available in Datafeedr API regardless of whether they
 * contain any products or not.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$network_ids   = array();
$include_empty = true;

try {
	$response = $api->getNetworks( $network_ids, $include_empty );
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

