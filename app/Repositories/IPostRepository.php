<?php

namespace App\Repositories;

use App\ValueObjects\PostObject;
use Ramsey\Uuid\UuidInterface;

interface IPostRepository
{

    public function create(UuidInterface $uuid, PostObject $postObject): void;

    public function update(UuidInterface $uuid, PostObject $postObject): void;

    public function remove(UuidInterface $uuid): void;

    public function getAll(): \Illuminate\Support\Collection;
    public function getPublished(): \Illuminate\Support\Collection;
    public function getDraft(): \Illuminate\Support\Collection;

    public function getPost(UuidInterface $uuid);
}
