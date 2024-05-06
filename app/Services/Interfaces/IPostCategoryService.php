<?php

namespace App\Services\Interfaces;

use App\ValueObjects\PostCategoryObject;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

interface IPostCategoryService
{

    public function create(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void;

    public function update(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void;

    public function remove(UuidInterface $uuid): void;

    public function getAll(): Collection;

    public function getParentCategories(): Collection;
}
