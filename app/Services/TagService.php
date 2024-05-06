<?php

namespace App\Services;

use App\Repositories\ITagRepository;
use App\Services\Interfaces\ITagService;
use App\ValueObjects\TagObject;
use Ramsey\Uuid\UuidInterface;

final class TagService implements ITagService
{

    public function __construct(private ITagRepository $tagRepository)
    {

    }


    public function create(UuidInterface $uuid, TagObject $tagData): void
    {
        $this->tagRepository->create($uuid, $tagData);
    }

    public function update(UuidInterface $uuid, TagObject $getTagData): void
    {
        $this->tagRepository->update($uuid, $getTagData);
    }

    public function remove(UuidInterface $uuid): void
    {
        $this->tagRepository->remove($uuid);
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return $this->tagRepository->getAll();
    }
}
