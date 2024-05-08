<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\IPostRepository;
use App\Services\Interfaces\IPostService;
use App\ValueObjects\PostObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Ramsey\Uuid\UuidInterface;

class PostService implements IPostService
{
    public function __construct(private readonly IPostRepository $postRepository)
    {
    }

    public function create(UuidInterface $uuid, PostObject $postObject): void
    {
        $thumbnail = $postObject->getThumbnail();

        if ($thumbnail) {
            $fileName = $this->getFileName($thumbnail);
            $thumbnail->move(public_path() . '/posts/', $fileName);

            $postObject->setThumbnailPath($fileName);
        }

         $this->postRepository->create($uuid, $postObject);
    }

    public function update(UuidInterface $uuid, PostObject $postObject): void
    {
        $thumbnail = $postObject->getThumbnail();

        if ($thumbnail) {

            $post = $this->postRepository->getPost($uuid);

            if ($post->thumbnail != $postObject->getThumbnailPath()) {
                if ($post->thumbnail) {
                    unlink(public_path() . '/posts/' . $post->thumbnail);
                }
            }

            $fileName = $this->getFileName($thumbnail);
            $thumbnail->move(public_path() . '/posts/', $fileName);

            $postObject->setThumbnailPath($fileName);
        }

        $this->postRepository->update($uuid, $postObject);
    }

    public function remove(UuidInterface $uuid): void
    {
        $post = $this->postRepository->getPost($uuid);

        if ($post->thumbnail) {
            unlink(public_path() . '/posts/' . $post->thumbnail);
        }

        $this->postRepository->remove($uuid);
    }

    public function getAll(): Collection
    {
        return $this->postRepository->getAll();
    }

    public function getPublished(): Collection
    {
        return $this->postRepository->getPublished();
    }

    public function getDraft(): Collection
    {
        return $this->postRepository->getDraft();
    }

    private function getFileName(\Illuminate\Http\UploadedFile $thumbnail): string
    {
        $fileName = $thumbnail->getClientOriginalName();

        $fileNameWithoutExt = Str::replace('.'.$thumbnail->getClientOriginalExtension(), '', $fileName);

        return $fileNameWithoutExt . '_' . time() . '.' . $thumbnail->getClientOriginalExtension();
    }
}
