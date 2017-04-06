<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Status Request
 *
 * This request allows you to get information about your Datafeedr API account such as
 * your user_id, bill_day, request_count and plan_id. It also returns information
 * regarding the number of products available in the API.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

try {
	$response = $api->getStatus();
} catch ( Exception $e ) {
	$response = $e;
}

var_dump( $response );