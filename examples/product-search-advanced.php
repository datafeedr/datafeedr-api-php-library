<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Search Products (Advanced)
 *
 * This request will search for products matching the various filters.
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

/**
 * Initialize new DatafeedrSearchRequest object.
 */
$search = $api->searchRequest();

/**
 * Filter products that have the word "pets" in their name.
 */
$search->addFilter( 'name LIKE mens puff jacket' );

/**
 * Filter products from specific affiliate networks by network ID.
 */
$search->addFilter( 'source_id IN 3, 4, 6, 126' );

/**
 * Remove specific merchants from the search by merchant ID. Use "merchant_id IN 123" to be inclusive
 * instead of exclusive.
 */
$search->addFilter( 'merchant_id !IN 4729, 37792, 22262, 44930, 60537, 69626, 33407, 33794, 37794, 37533' );

/**
 * Filter products for only products in USD currency.
 */
$search->addFilter( 'currency = USD' );

/**
 * Filter products by the final price. The final price is either the regular price or if the product
 * is on sale, then the sale price. Final price = lowest price provided by the merchant. Prices
 * should be in value of cents (ie. no decimals).
 */
$search->addFilter( 'finalprice >= 8000' );  // $80.00
$search->addFilter( 'finalprice <= 20000' ); // $200.00

/**
 * Filter products that contain the "brand" field. If products do not have a brand field, they
 * will not be returned.
 */
$search->addFilter( 'brand !EMPTY' );

/**
 * Filter products that are on sale.
 */
$search->addFilter( 'onsale = 1' );

/**
 * Filter out duplicate products. This example excludes products which have the
 * same merchant id AND (product name OR image URL).
 */
$search->excludeDuplicates( 'merchant_id name|image' );

/**
 * Sort returned products by specific field. Default is 'relevancy'. Below we sort by final price descending.
 */
$search->addSort( '-finalprice' );

/**
 * Limit the number of products returned. Default is 20. Maximum is 100. Below we set the number of products
 * to be returned to 10.
 */
$search->setLimit( 10 );

/**
 * This allows you to access page 2, 3, 4... of your search results. The maximum number of products returned
 * by a product search request is 100. However, up to 10,000 products can be returned via a search. To access
 * all 10,000 you can set the offset to 100 to access products 101 ~ 200. Set offset to 200 to access products
 * 201 ~ 300.
 */
$search->setOffset( 10 );

try {
	$products = $search->execute();
	$response = $search->getResponse();
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
}

var_dump( $response );

