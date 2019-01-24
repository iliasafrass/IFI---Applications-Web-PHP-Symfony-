<?php

namespace App\User;

//ide PHPSTORM
//"composer" : l'executer et le deplacer dans /usr/bin/local
//composer create-project symfony/skeleton my-project
//composer require server --dev
//bin/console server:start

//crud
//fopen ouvrir un fichier
//fwrite ecrire sur un fichier
//fclose

//pouvoir appeller des classes d'un autre espace de nom
use App\test\myClass;

trait Log
{
  public function log():string
  {
    //dire que isArray viens du namespace global
    \isArray();
    echo 'log';
  }
}

class Index
{
  use Log;

  public function displayName(): string
  {
    return 'Ilias';
  }

    public function displayNameWithParameter(string &$name): string
    {
      $name = 'Hello '.$name;
      $name .= ' world';
      return $name;
    }

    public function displayNameWithObjectParameter(UserInterface $user): string
    {
      $user->setName($user->getName().' world');
      return $user->getName();
    }
}

interface UserInterface
{
  public function getName():string;
  public function setName(string $name):void;
  public function getUsername():string;
  }

interface bdd
{
  public function save(): bool;
}

interface SavableInterface extends UserInterface,bdd
{}

Abstract class User implements UserInterface
{

    //public(tt le monde) private(personne) protected(que moi et mes enfants)
    protected $name;
    public static $count = 0;

    //constructeur de la class
    public function __consturct()
    {}

    // toute les methodes qui commence par __ sont des methodes magiques
    // http://php.net/manual/fr/language.oop5.magic.php
    //le prorgamme se plante pas si on appelle une function qui existe pas il va executer __call
    public function __call($name,$values)
    {
      var_dump($name,$values);
    }

    public function __invoke()
    {
        echo 'invoke';
    }

    public function getName():string
    {
        static::$count +=1;
        // self::$count +=1; // la meme chose que la ligne precedente
        return $this->name;
    }

    public function setName(string $name):void
    {
        $this->name = $name;
    }

    abstract public function getUsername():string;
    }

class AdvancedUser extends User{
   public function getUsername():string
   {
       return $this->name;
   }
}

class Admin extends User{
   public function getUsername():string
   {
     return "Admin {$this->name}";
   }
}

$index = new Index();
$user = new AdvancedUser();
$user->setName('ilias');

$otherUser = new Admin();
$otherUser->setName('ayoub');

// echo $index->displayNameWithObjectParameter($user).PHP_EOL;
// echo $otherUser->getUsername().PHP_EOL;
// var_dump($user::$count);
// var_dump($otherUser::$count);
//
// var_dump($otherUser.instanceof());
// echo $index->displayName();
//echo $index->displayNameWithParameter('Ilias').PHP_EOL;

//$name = 'Ilias AFRASS';
//echo $index->displayNameWithParameter($name).PHP_EOL;
//echo $name;

//pour le __call()
//$user->getTruc('machin');

//pour le __invoke()
//$user();

//pour __clone()
//$newUser = clone($user);

//$index = null; //liberer la memoire par contre l objet existe
//unset($index); // detruire index

//exit(128);
?>
