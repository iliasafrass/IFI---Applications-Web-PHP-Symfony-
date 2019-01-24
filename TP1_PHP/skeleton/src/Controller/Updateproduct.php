<?php
/**
 * Created by PhpStorm.
 * User: afrass
 * Date: 1/24/19
 * Time: 11:55 AM
 */

declare(strict_types=1);
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Updateproduct
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        // TODO: Implement __invoke() method.

        $repository = $em->getRepository(Product::class);
        $productId = $request->get('id');
        $productname = $request->get('name');
        $productprice = $request->get('price');
        $product = $repository->find($productId);

        $product->name=$productname;
        $product->price=$productprice;

        //commit l'objet ds la bdd
        $em->flush();

        dump($product);
        return new JsonResponse($product);
    }

}