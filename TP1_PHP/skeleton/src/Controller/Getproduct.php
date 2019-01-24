<?php
/**
 * Created by PhpStorm.
 * User: afrass
 * Date: 1/24/19
 * Time: 11:45 AM
 */
declare(strict_types=1);
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Getproduct
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        // TODO: Implement __invoke() method.

        $repository = $em->getRepository(Product::class);
        $productId = $request->get('id');

        //dump($productId);
        $product = $repository->find($productId);

        return new JsonResponse($product);
    }
}