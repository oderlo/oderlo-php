<?php

// Check PHP version.
if (version_compare(PHP_VERSION, '5.2.1', '<')) {
    throw new Exception('PHP version >= 5.2.1 required');
}

// Check PHP Curl & json decode capabilities.
if (!function_exists('curl_init') || !function_exists('curl_exec')) {
  throw new Exception('Oderlo needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Oderlo needs the JSON PHP extension.');
}

// // Configurations
require_once('Oderlo/Config.php');

// // Oderlo API Resources
// require_once('Oderlo/Transaction.php');

// Plumbing
require_once('Oderlo/ApiRequestor.php');
require_once('Oderlo/Email.php');

// Sanitization
require_once('Oderlo/Sanitizer.php');