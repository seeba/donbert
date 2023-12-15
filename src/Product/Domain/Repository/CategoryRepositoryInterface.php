<?php

declare(strict_types=1);

namespace App\Product\Domain\Repository;

use App\Product\Domain\Entity\Category;

interface CategoryRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null);

    public function save(Category $category): void;
}