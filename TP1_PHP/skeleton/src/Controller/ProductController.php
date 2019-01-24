<?php
/**
 * Created by PhpStorm.
 * User: afrass
 * Date: 1/24/19
 * Time: 11:27 AM
 */


declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController
{
    /*
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        // TODO: Implement __invoke() method.

        //dump($request->get('name'));
        //dump($request->get('price'));

        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');

        // voila une nouvelle entity dans la bdds
        $em->persist($product);
        //pour supprimer au lieu de persist on fait remove
        //commit l'objet ds la bdd
        $em->flush();

        dump($product);
        return new Response('');
    }
    */

    //version invoke avec le validator
    public function __invoke(ValidatorInterface $validator, Request $request, EntityManagerInterface $em)
    {
        // TODO: Implement __invoke() method.

        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');

        $errors = $validator->validate($product);

        // voila une nouvelle entity dans la bdds
        $em->persist($product);
        //pour supprimer au lieu de persist on fait remove
        //commit l'objet ds la bdd
        //$em->flush();

        dump($errors);
        return new Response('');
    }

}