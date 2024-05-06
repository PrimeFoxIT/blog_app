<?php
declare(strict_types=1);

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

final readonly class PostCategoryObject implements Arrayable
{
    private string $slug;
    public function __construct(
        private string $name,
        private string $description,
        private ?string $parentId = null
    ) {
        $this->slug = Str::slug($name);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'slug' => $this->getSlug(),
            'description' => $this->getDescription(),
            'parent_id' => $this->getParentId(),
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
