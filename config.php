<?php

/**
 * All Config releated stuff goes here
 *
 * @author vikram
 * @package default
 * @license default
 * @version 1.0
 */

$defaultCronOptions = array(
                CURLOPT_ENCODING => 'UTF-8', CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT => 5, CURLOPT_MAXCONNECTS => 2,
                CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTPHEADER => array('Content-type: text/xml')
        );
define('SERVER_HOST', 'http://example.com');
define('SERVER_LOGIN_URL', SERVER_HOST . '/api/index.php?/Login');
