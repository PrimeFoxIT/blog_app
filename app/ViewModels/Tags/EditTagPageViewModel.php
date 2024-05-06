<?php

namespace App\ViewModels\Tags;

use App\Models\Tag;
use App\ViewModels\ViewModel;

final class EditTagPageViewModel extends ViewModel
{
    public function __construct(public Tag $tag)
    {
    }
}
