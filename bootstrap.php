<?php

/**
 * All bootstraping releated stuff goes here
 *
 * @author vikram
 * @package default
 * @license default
 * @version 1.0
 */


require_once 'config.php';
require_once 'library/Consts.php';
require_once 'library/Base.php';

Base::$defaultCurlOptions = $defaultCronOptions;
