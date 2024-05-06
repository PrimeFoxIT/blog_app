<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Tag;
use App\Repositories\ITagRepository;
use App\ValueObjects\TagObject;
use Ramsey\Uuid\UuidInterface;

final class TagRepository implements ITagRepository
{

    public function create(UuidInterface $uuid, TagObject $tagData): void
    {
        Tag::create([
            'id' => $uuid->toString(),
            ...$tagData->toArray()
        ]);
    }

    public function update(UuidInterface $uuid, TagObject $tagData): void
    {
        Tag::where('id', $uuid->toString())->update($tagData->toArray());
    }

    public function remove(UuidInterface $uuid): void
    {
        Tag::where('id', $uuid->toString())->delete();
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return Tag::all();
    }
}
