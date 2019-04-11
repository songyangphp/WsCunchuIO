<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-11
 * Time: 10:06
 */
require_once __DIR__ . '/vendor/autoload.php';
include_once "Config.php";

use Azure\App;
use Azure\CunChuIO;

(new App())->setConfig(new Config())->run();

var_dump(CunChuIO::$storename);