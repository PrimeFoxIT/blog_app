<?php

namespace App\Services;

use App\Repositories\IPostCategoryRepository;
use App\Services\Interfaces\IPostCategoryService;
use App\ValueObjects\PostCategoryObject;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

class PostCategoryService implements IPostCategoryService
{
    public function __construct(private readonly IPostCategoryRepository $postCategoryRepository)
    {

    }
    public function create(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void
    {
        $this->postCategoryRepository->create($uuid, $postCategoryObject);
    }

    public function update(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void
    {
        $this->postCategoryRepository->update($uuid, $postCategoryObject);
    }

    public function remove(UuidInterface $uuid): void
    {
        $this->postCategoryRepository->remove($uuid);
    }

    public function getAll(): Collection
    {
        return $this->postCategoryRepository->getAll();
    }

    public function getParentCategories(): Collection
    {
        return $this->postCategoryRepository->getParentCategories();
    }
}
