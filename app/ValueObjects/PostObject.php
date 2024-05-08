<?php
declare(strict_types=1);

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

final  class PostObject implements Arrayable
{
    private ?string $thumbnail_path = null;
    private string $slug;

    public function __construct(
        private readonly string $title,
        private readonly string $content,
        private readonly array $tags,
        private readonly string $category_id,
        private readonly ?string $published_at = null,
        private readonly ?UploadedFile  $thumbnail = null,
    )
    {
        $this->slug = Str::slug($title);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'slug' => $this->getSlug(),
            'content' => $this->getContent(),
            'category_id' => $this->getCategoryId(),
            'published_at' => $this->getPublishedAt(),
            'thumbnail' => $this->getThumbnailPath(),
            'author_id' => 1
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getCategoryId(): string
    {
        return $this->category_id;
    }

    public function getPublishedAt(): ?string
    {
        return $this->published_at;
    }

    public function getThumbnail(): ?UploadedFile
    {
        return $this->thumbnail;
    }

    public function getThumbnailPath(): ?string
    {
        return $this->thumbnail_path;
    }

    public function setThumbnailPath(string $thumbnail_path): void
    {
        $this->thumbnail_path = $thumbnail_path;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
