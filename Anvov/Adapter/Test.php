<?php
/**
 * test of Adapter
 *
 * @category school5
 * @package Adapter
 * @author Andriy Vovk <andriy.vovk@smile-ukraine.com>
 * @copyright 2019 Smile
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Adapter/Classes/MobilePhone.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Adapter/Classes/Phone.php";
require_once "/Applications/MAMP/htdocs/Smile-school5/school5/Anvov/Adapter/Adapter.php";


$mobilePhone = new MobilePhone();
$phone = new Adapter($mobilePhone);
$phone->dial(911);
var_dump($phone);