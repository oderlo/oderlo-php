<?php
/**
 * Create Snap payment page and return snap token
 *
 */
class Oderlo_Email {

	/**
	 * Create Snap payment page
	 *
	 * Example:
	 *
	 * ```php
	 *   $params = array(
	 *     'transaction_details' => array(
	 *       'order_id' => rand(),
	 *       'gross_amount' => 10000,
	 *     )
	 *   );
	 *   $paymentUrl = Oderlo_Snap::getSnapToken($params);
	 * ```
	 *
	 * @param array $params Payment options
	 * @return string Snap token.
	 * @throws Exception curl error or Oderlo error
	 */
	public static function sendEmail($params) {
		return (Oderlo_Email::createTransaction($params));
	}

	/**
	 * Create Snap payment page, with this version returning full API response
	 *
	 * Example:
	 *
	 * ```php
	 *   $params = array(
	 *     'transaction_details' => array(
	 *       'order_id' => rand(),
	 *       'gross_amount' => 10000,
	 *     )
	 *   );
	 *   $paymentUrl = Oderlo_Snap::getSnapToken($params);
	 * ```
	 *
	 * @param array $params Payment options
	 * @return object Snap response (token and redirect_url).
	 * @throws Exception curl error or Oderlo error
	 */
	public static function createTransaction($params)
	{
		// $payloads = array(
		//   'credit_card' => array(
		//     // 'enabled_payments' => array('credit_card'),
		//     'secure' => Oderlo_Config::$is3ds
		//   )
		// );

		// if (array_key_exists('item_details', $params)) {
		// 	$gross_amount = 0;
		// 	foreach ($params['item_details'] as $item) {
		// 		$gross_amount += $item['quantity'] * $item['price'];
		// 	}
		// 	$params['transaction_details']['gross_amount'] = $gross_amount;
		// }

		// if (Oderlo_Config::$isSanitized) {
		// 	Oderlo_Sanitizer::jsonRequest($params);
		// }

		// $params = array_replace_recursive($payloads, $params);

		$result = Oderlo_ApiRequestor::post(
			Oderlo_Config::getBaseUrl() . '/email',
			Oderlo_Config::$serverKey,
			$params
		);

		return $result;
	}  
}
