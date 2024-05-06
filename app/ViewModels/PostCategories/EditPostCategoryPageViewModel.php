<?php

namespace App\ViewModels\PostCategories;

use App\Models\PostCategory;
use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class EditPostCategoryPageViewModel extends ViewModel
{
    public array $parentCategories;

    public function __construct(public PostCategory $category, Collection $parentCategories)
    {
        $this->parentCategories = $parentCategories->where('id', '!=', $category->id)->pluck('name', 'id')->toArray();
    }
}
