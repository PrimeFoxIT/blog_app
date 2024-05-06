<?php
declare(strict_types=1);

namespace App\Services\Interfaces;

use App\ValueObjects\TagObject;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

interface ITagService
{
    public function create(UuidInterface $uuid, TagObject $tagData): void;

    public function update(UuidInterface $uuid, TagObject $getTagData): void;

    public function remove(UuidInterface $uuid): void;

    public function getAll(): Collection;
}
