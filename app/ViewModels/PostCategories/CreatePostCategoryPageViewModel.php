<?php
declare(strict_types=1);

namespace App\ViewModels\PostCategories;

use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class CreatePostCategoryPageViewModel extends ViewModel
{
    public array $parentCategories;
    public function __construct(Collection $parentCategories)
    {
        $this->parentCategories = $parentCategories->pluck('name', 'id')->toArray();
    }
}
