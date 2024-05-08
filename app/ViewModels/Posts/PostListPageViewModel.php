<?php
declare(strict_types=1);

namespace App\ViewModels\Posts;

use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

final class PostListPageViewModel extends ViewModel
{
    public function __construct(
        public Collection $posts
    ) {
    }

}
