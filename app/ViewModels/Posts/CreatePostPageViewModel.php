<?php
declare(strict_types=1);

namespace App\ViewModels\Posts;

use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

final class CreatePostPageViewModel extends ViewModel
{
    public array $categories;
    public array $tags;
    public array $selectedTags = [];

    public function __construct(
        Collection $categories,
        Collection $tags
    ) {
        $this->categories = $categories->pluck('name', 'id')->toArray();
        $this->tags = $tags->pluck('name', 'id')->toArray();
    }
}
