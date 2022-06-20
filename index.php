<?php
require 'vendor/autoload.php';

use PayTech\ApiResponse;
use PayTech\Config;
use PayTech\Enums\Currency;
use PayTech\Invoice\InvoiceItem;
use PayTech\PayTech;


Config::setApiKey('031bca2d24f780fbcf5391f1b2feb7fe19f47b845dfc851c6340af40cf6d7a68');
Config::setApiSecret('d6edccf2a55da1c6d09e2ccb0438dfda6d364502f75b75a9cfa2a2510524b8f0');
//\PayTech\Config::setApiUrl();
//\PayTech\Config::setEnv(\PayTech\Enums\Env::TEST);
// \PayTech\Enums\Env::TEST;
/*
 * The PayTech\Enums\Currency class defined authorized currencies
 * You can change XOF (in the following example) by USD, CAD or another currency
 * All allowed currencies are in \PayTech\Enums\Currency class
 * !!! Notice that XOF is the default currency !!!
*/

Config::setCurrency(Currency::XOF);

/* !!! Note that if you decide to set the ipn_url, it must be in https !!! */

Config::setIpnUrl('https://paytech.sn/app/settings/api');
Config::setSuccessUrl('https://paytech.sn/app/settings/api');
//\PayTech\Config::setCanceUrl('https://paytech.sn/app/settings/api');

/*
 * if you want the mobile success or cancel page, you can set
 * the following parameter
*/

Config::setIsMobile(true);

$article_price = 15000;
$article = new InvoiceItem('INFINIX S6', $article_price, 'commande INF', 'REF12345');

/* You can also add custom data or fields like this */

\PayTech\CustomField::set('nom_dev', 'DIEYE');

/* Make the payment request demand to the API */

PayTech::send($article);

/* Get the API Response */

$response = [
    'success' => ApiResponse::getSuccess(),
    'errors' => ApiResponse::getErrors(),
    'token' => ApiResponse::getToken(),
    'redirect_url' => ApiResponse::getRedirectUrl(),
];
var_dump(
$response
);
