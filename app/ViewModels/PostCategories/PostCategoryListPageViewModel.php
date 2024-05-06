<?php

namespace App\ViewModels\PostCategories;

use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

class PostCategoryListPageViewModel extends ViewModel
{
    public function __construct(public Collection $postCategories)
    {
    }

}
