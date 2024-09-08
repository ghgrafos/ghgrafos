<?php
require 'vendor/autoload.php';

use Ghgrafos\Product;
// create_product.php <name>
require_once "config/bootstrap.php";

$newProductName = $argv['novo-produto'];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
