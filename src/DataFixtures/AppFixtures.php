<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Faker\Factory;
use Faker\Generator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }


    public function load(ObjectManager $manager): void
    {
        $product = [];
        for ($i = 0; $i < 50; $i++) {
            $product = new Product();
            $product->setTitle($this->faker->word())
                    ->setType($this->faker->word())   
                    ->setReference($this->faker->word())
                    ->setManufacturer($this->faker->word())
                    ->setDescription($this->faker->paragraph(3))
                    ->setCharacteristics($this->faker->paragraph(2))
                    ->setPrice(mt_rand(0, 1000))
                    ->setIsAvailable($this->faker->boolean())
                    ->setQuantity($this->faker->numberBetween(0, 30));
                                   
            // $products[] = $product;
            $manager->persist($product);
        }

        $subcategory = [];
        for ($j = 0; $j < 20; $j++) {
            $product = new Product();
            $product->setTitle($this->faker->word())
                    ->setType($this->faker->word())   
                    ->setReference($this->faker->word())
                    ->setManufacturer($this->faker->word())
                    ->setDescription($this->faker->paragraph(3))
                    ->setCharacteristics($this->faker->paragraph(2))
                    ->setPrice(mt_rand(0, 1000))
                    ->setIsAvailable($this->faker->boolean())
                    ->setQuantity($this->faker->numberBetween(0, 30));
                                   
            // $products[] = $product;
            $manager->persist($product);
        }

        $manager->flush();
    }
}
