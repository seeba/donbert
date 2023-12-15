<?php

declare(strict_types=1);

namespace App\Product\Domain\Entity;

use App\Shared\Aggregate\AggregateRoot;

class Variant extends AggregateRoot
{
    public function __construct(
        private VariantId $id,
        private string $name,
        private Product $product
    )
    {    
    }
}