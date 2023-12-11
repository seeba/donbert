<?php

declare(strict_types=1);

namespace App\Product\Domain\Entity;

use App\Shared\Aggregate\AggregateRoot;

class ProductFeature extends AggregateRoot
{
    public function __construct(
        private ProductFeatureId $id
    )
    {    
    }
}