<?php
/**
 * Oderlo Configuration
 */
class Oderlo_Config {

	/**
	 * Your merchant's server key
	 * @static
	 */
	public static $serverKey;
	/**
	 * Your merchant's client key
	 * @static
	 */
	public static $clientKey;
	/**
   * Enable request params sanitizer (validate and modify charge request params).
   * @static
   */
  public static $isSanitized = false;
	/**
	 * true for production
	 * false for sandbox mode
	 * @static
	 */
	public static $isProduction = false;
	/**
	 * Default options for every request
	 * @static
	 */
	public static $curlOptions = array();

	const SANDBOX_ENDPOINT = 'https://api.sandbox.oderlo.com';
	const PRODUCTION_ENDPOINT = 'https://api.oderlo.com';

	/**
	 * @return string Oderlo API URL, depends on $isProduction
	 */
	public static function getBaseUrl()
	{
		return Oderlo_Config::$isProduction ?
				Oderlo_Config::PRODUCTION_ENDPOINT : Oderlo_Config::SANDBOX_ENDPOINT;
	}
}
