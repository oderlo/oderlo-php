<?php
/**
 * Send Email Transaction
 *
 */
class Oderlo_Email {

	/**
	 * Send Email Transaction
	 *
	 * @param array $params Email Field
	 * @return object Email.
	 * @throws Exception curl error or Oderlo error
	 */
	public static function sendEmail($params) {
		return (Oderlo_Email::createTransaction($params));
	}

	/**
	 * Create Email Transaction
	 *
	 *
	 * @param array $params Email field
	 * @return object Email
	 * @throws Exception curl error or Oderlo error
	 */
	public static function createTransaction($params){
		if (Oderlo_Config::$isSanitized) {
			Oderlo_Sanitizer::jsonRequest($params);
		}

		$result = Oderlo_ApiRequestor::post(
			Oderlo_Config::getBaseUrl() . '/email/send',
			Oderlo_Config::$serverKey,
			$params
		);

		return $result;
	}  
}
