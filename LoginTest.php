<?php
/**
 * Description of LoginTest
 *
 * @author vikram
 * @package default
 * @license default
 * @version 1.0
 */

require_once 'bootstrap.php';
require_once 'library/Login.php';

$username = 'admin';
$password = 'test1234567890';


$login = new Login(SERVER_LOGIN_URL);
$sessionId = $login->login($username, $password);

if($sessionId) {
    echo "You are logged in Successfully, with SessionID: ".$sessionId;
} else {
    echo $login->getError();
}