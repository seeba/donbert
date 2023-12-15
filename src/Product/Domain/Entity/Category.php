<?php

declare(strict_types=1);

namespace App\Product\Domain\Entity;

use App\Shared\Aggregate\AggregateRoot;
use Doctrine\Common\Collections\ArrayCollection;

class Category extends AggregateRoot
{
    public function __construct(
        private CategoryId $id,
        private string $name,
        private $parents = new ArrayCollection(),
        private $children = new ArrayCollection(),
        private $products = new ArrayCollection()
    )
    {    
    }
}