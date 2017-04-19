<?php

require_once '../config.php';
require_once '../datafeedr.php';

/**
 * Get Zanox affiliate ID from Connection Key and Adspace ID.
 */

/**
 * Return an array of Zanox affiliate IDs keyed with the merchant ID.
 *
 * Example of array returned:
 *
 *      Array (
 *          [92596] => 32263359558549C64
 *          [46777] => 2587728149214C88
 *      )
 *
 * In this example, "92596" would be the $product['merchant_id'] and "32263359558549C64" would
 * be the affiliate ID needed to replace @@@ in the $product['url'] field.
 *
 * @param DatafeedrApi $api
 * @param array $merchants An array of merchants returned by a call to $search->getMerchants().
 *
 * @return array An array of merchant_id => affiliate_id for Zanox.
 */
function get_zmids( DatafeedrApi $api, array $merchants ) {

	$zanox_connection_key = '12392JC92C02JC0282F9';
	$zanox_adspace_id     = '1234567';

	$zmids        = array();
	$merchant_ids = array();

	foreach ( $merchants as $merchant ) {
		$merchant_ids[] = $merchant['merchant_id'];
	}

	if ( empty( $merchant_ids ) ) {
		return $zmids;
	}

	$zanox_merchant_ids = $api->getZanoxMerchantIds( $merchant_ids, $zanox_adspace_id, $zanox_connection_key );

	foreach ( $zanox_merchant_ids as $zanox_merchant_id ) {
		$zmids[ $zanox_merchant_id['merchant_id'] ] = ( isset( $zanox_merchant_id['zmid'] ) ) ? $zanox_merchant_id['zmid'] : '_invalid';
	}

	return $zmids;
}

$api = new DatafeedrApi( DATAFEEDR_ACCESS_ID, DATAFEEDR_SECRET_KEY );

$search = $api->searchRequest();
$search->addFilter( 'name LIKE lego marvel' );
$search->addFilter( 'source_id IN 406' ); // Products from Zanox France.

try {
	$products = $search->execute();
	$response = $search->getResponse();
	$zmids    = get_zmids( $api, $search->getMerchants() );
} catch ( Exception $e ) {
	$products = array();
	$response = $e;
	$zmids    = array();
}

$html = '';
foreach ( $products as $product ) {

	$affiliate_id = ( isset( $zmids[ $product['merchant_id'] ] ) ) ? $zmids[ $product['merchant_id'] ] : '__NOT_ZANOX__';

	$url = str_replace( '@@@', $affiliate_id, $product['url'] );

	$html .= '<p>';
	$html .= '<strong>Name: </strong>' . $product['name'] . '<br />';
	$html .= '<strong>URL: </strong>' . $url;
	$html .= '</p>';
}
echo $html;

//var_dump( $response );

