<?php

declare(strict_types=1);

namespace App\Product\Domain\Entity;

use App\Shared\Aggregate\AggregateRoot;

class Product extends AggregateRoot
{
    public function __construct(
        private ProductId $id
    )
    {    
    }
}