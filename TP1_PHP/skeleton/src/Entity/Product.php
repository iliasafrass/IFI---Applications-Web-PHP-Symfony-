<?php
/**
 * Created by PhpStorm.
 * User: afrass
 * Date: 1/24/19
 * Time: 10:51 AM
 */

declare(strict_types=1);
namespace App\Entity;

//bin/console doctrine:migration:diff
//bin/console doctrine:migration:migrate

//../composer.phar require validator


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Product
 * @ORM\Entity
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="5")
     */
    public $name;
    /**
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     */
    public $price;
}