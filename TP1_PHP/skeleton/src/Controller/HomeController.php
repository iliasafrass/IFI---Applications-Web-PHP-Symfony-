<?php
/**
 * Created by PhpStorm.
 * User: afrass
 * Date: 1/24/19
 * Time: 10:17 AM
 */

declare(strict_types=1);

//bin/console debug:router

//../composer.phar require debug

//pour lier a une bdd
//../composer.phar require orm

//creer une bdd
//bin/console doctrine:database:create




namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function __invoke(Request $request)
    {
        // TODO: Implement __invoke() method.

        //throw new \Exception('exep msg');

        $name = $request->get('name','Anounymous');
//        return new Response("welcome $name on the homePage");

        return new Response(<<<HTML
<html>
    <head></head>
    <body>welcome $name on the homePage</body>
</html>
HTML
            );
    }
}