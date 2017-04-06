<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Fields Request
 *
 * Return a list of default searchable fields and their field type (ie. text, int or date). Not all fields
 * are available for all networks.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

try {
	$response = $api->getFields();
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );

