<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\PostCategory;
use App\Repositories\IPostCategoryRepository;
use App\ValueObjects\PostCategoryObject;
use Ramsey\Uuid\UuidInterface;

final class PostCategoryRepository implements IPostCategoryRepository
{

    public function create(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void
    {
        PostCategory::create([
            'id' => $uuid,
            ...$postCategoryObject->toArray()
        ]);
    }

    public function update(UuidInterface $uuid, PostCategoryObject $postCategoryObject): void
    {
        PostCategory::where('id', $uuid)->update($postCategoryObject->toArray());
    }

    public function remove(UuidInterface $uuid): void
    {
        PostCategory::where('id', $uuid)->delete();
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return PostCategory::with([
            'children',
            'parent',
            'posts'
        ])->get();
    }

    public function getParentCategories(): \Illuminate\Support\Collection
    {
        return PostCategory::whereNull('parent_id')
            ->with(['posts'])
            ->get();
    }
}
