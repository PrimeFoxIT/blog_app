<?php
declare(strict_types=1);

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

final readonly class TagObject implements Arrayable
{
    private string $slug;

    public function __construct(
        private string $name,
    )
    {
        $this->slug = Str::slug($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'slug' => $this->getSlug(),
        ];
    }
}
