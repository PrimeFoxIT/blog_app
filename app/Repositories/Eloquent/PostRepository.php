<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\IPostRepository;
use App\ValueObjects\PostObject;
use Ramsey\Uuid\UuidInterface;

class PostRepository implements IPostRepository
{

    public function create(UuidInterface $uuid, PostObject $postObject): void
    {
        $post = Post::create([
            'id' => $uuid,
            ...$postObject->toArray()
        ]);

        $post->tags()->sync($postObject->getTags());
    }

    public function update(UuidInterface $uuid, PostObject $postObject): void
    {
        $post = $this->getPost($uuid);

        $post->update($postObject->toArray());

        $post->tags()->sync($postObject->getTags());
    }

    public function remove(UuidInterface $uuid): void
    {
        Post::where('id', $uuid)->delete();
    }

    public function getPost(UuidInterface $uuid)
    {
        return Post::where('id', $uuid)->firstOrFail();
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return Post::with(['category', 'tags', 'author'])->get();
    }

    public function getDraft(): \Illuminate\Support\Collection
    {
        return Post::draft()
            ->with(['category', 'tags', 'author'])
            ->get();
    }

    public function getPublished(): \Illuminate\Support\Collection
    {
        return Post::published()
            ->with(['category', 'tags', 'author'])
            ->get();
    }
}
