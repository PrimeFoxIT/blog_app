<?php
declare(strict_types=1);

namespace App\Services\Interfaces;

use App\ValueObjects\PostObject;
use Illuminate\Support\Collection;
use Ramsey\Uuid\UuidInterface;

interface IPostService
{
    public function create(UuidInterface $uuid, PostObject $postObject): void;

    public function update(UuidInterface $uuid, PostObject $postObject): void;

    public function remove(UuidInterface $uuid): void;

    public function getAll(): Collection;

    public function getPublished(): Collection;

    public function getDraft(): Collection;
}
