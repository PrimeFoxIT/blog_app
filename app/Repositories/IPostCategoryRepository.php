<?php

namespace App\Repositories;

use App\ValueObjects\PostCategoryObject;
use Ramsey\Uuid\UuidInterface;

interface IPostCategoryRepository
{

    public function create(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void;

    public function update(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void;

    public function remove(UuidInterface $uuid): void;

    public function getAll(): \Illuminate\Support\Collection;

    public function getParentCategories(): \Illuminate\Support\Collection;
}
