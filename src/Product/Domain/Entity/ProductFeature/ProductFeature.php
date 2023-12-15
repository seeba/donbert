<?php

declare(strict_types=1);

namespace App\Product\Domain\Entity\ProductFeature;

use App\Shared\Aggregate\AggregateRoot;
use Doctrine\Common\Collections\ArrayCollection;

class ProductFeature extends AggregateRoot
{
    public function __construct(
        private ProductFeatureId $id,
        private string $name,
        private $products = new ArrayCollection()
    )
    {    
    }
}