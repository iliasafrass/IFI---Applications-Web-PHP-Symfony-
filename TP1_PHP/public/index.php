<?php
/**
 * Created by PhpStorm.
 * User: afrass
 * Date: 1/24/19
 * Time: 9:25 AM
 */

//INSTALLATION COMPOSER "https://getcomposer.org/download/"
//php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
//php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
//php composer-setup.php
//php -r "unlink('composer-setup.php');"

//php composer.phar init
//php composer.phar require symfony/http-foundation

//php composer.phar create-project symfony/skeleton


declare(strict_types=1);
require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$response = new Response(<<<HTML
<html>
    <head></head>
    <body>Hello world :)</body>
</html>
HTML
, Response::HTTP_NOT_FOUND
, ['X-MONENTETE'=>'maValeur']);
$response -> send();

echo '<pre>';
//var_dump($_REQUEST);
//var_dump($_GET);
//var_dump($_POST);
//var_dump($request);

echo '</pre>';



?>