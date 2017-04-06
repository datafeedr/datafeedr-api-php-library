<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Search Merchants
 *
 * This request will search for merchants based on keywords, product count and network ids and sort the
 * results by product count descending.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

/**
 * Initialize new DatafeedrMerchantSearchRequest object.
 */
$search = $api->merchantSearchRequest();

/**
 * Filter merchants that have the word "pets" in their name.
 */
$search->addFilter( 'name LIKE pets' );

/**
 * Filter merchants that have at least 50 products.
 */
$search->addFilter( 'product_count >= 50' );

/**
 * Filter merchants that are from affiliate networks Commission Junction (Network ID: 3) or
 * ShareASale (Network ID: 6).
 */
$search->addFilter( 'source_id IN 3, 6' );

/**
 * Filter merchants that are in an affiliate network which has the term "UK" in their name.
 */
// $search->addFilter( 'source LIKE UK' );

/**
 * Sort merchants by product count descending.
 *
 * Options include:
 *      '+_id'           - Sort by merchant ID Ascending.
 *      '-_id'           - Sort by merchant ID Descending.
 *      '+product_count' - Sort by product count Ascending.
 *      '-product_count' - Sort by product count Descending.
 *      '+name'          - Sort by merchant name Ascending.
 *      '-name'          - Sort by merchant name Descending.
 *      '+source'        - Sort by affiliate network name Ascending.
 *      '-source'        - Sort by affiliate network name Descending.
 *      '+source_id'     - Sort by affiliate network ID Ascending.
 *      '-source_id'     - Sort by affiliate network ID Descending.
 */
$search->addSort( '-product_count' );

try {
	$merchants = $search->execute();
	$response  = $search->getResponse();
} catch ( Exception $e ) {
	$merchants = array();
	$response  = $e;
}

var_dump( $response );

