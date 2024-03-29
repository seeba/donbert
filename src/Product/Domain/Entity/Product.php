<?php

declare(strict_types=1);

namespace App\Product\Domain\Entity;

use App\Shared\Aggregate\AggregateRoot;
use Doctrine\Common\Collections\ArrayCollection;

class Product extends AggregateRoot
{
    public function __construct(
        private ProductId $id,
        private string $name,
        private $categories = new ArrayCollection(),
        private $productFeatures = new ArrayCollection(),
        private $variants = new ArrayCollection()
    )
    {    
    }
}