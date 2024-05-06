<?php

namespace App\Repositories;

use App\ValueObjects\TagObject;
use Ramsey\Uuid\UuidInterface;

interface ITagRepository
{
    public function create(UuidInterface $uuid, TagObject $tagData): void;

    public function update(UuidInterface $uuid, TagObject $tagData): void;

    public function remove(UuidInterface $uuid): void;

    public function getAll(): \Illuminate\Support\Collection;
}
