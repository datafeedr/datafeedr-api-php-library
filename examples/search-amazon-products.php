<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Search Amazon (Simple)
 */

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

/**
 * Initialize new DatafeedrAmazonSearchRequest object.
 */
$search = $api->amazonSearchRequest( AMAZON_ACCESS_KEY, AMAZON_SECRET_KEY, AMAZON_ASSOCIATE_TAG, AMAZON_LOCALE );

/**
 * Filter products by keywords.
 */
$search->addParam( 'Keywords', 'ski jacket' );

/**
 * Filter products by brand.
 */
$search->addParam( 'Brand', 'bogner' );

/**
 * Define SearchIndex.
 *
 * @link http://docs.aws.amazon.com/AWSECommerceService/latest/DG/SearchIndices.html
 */
$search->addParam( 'SearchIndex', 'Apparel' );

try {
	$products = $search->execute();
	$response = $search->getResponse();
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
}

var_dump( $response );

