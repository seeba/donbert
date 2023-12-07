<?php
 
declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid;

class Id 
{
    private function __construct(
        protected string $id
    )
    {
    }

    final public static function random(): self
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function __toString()
    {
        return $this->id;
    }
}