<?php
declare(strict_types=1);

namespace App\ViewModels\Tags;

use App\ViewModels\ViewModel;
use Illuminate\Support\Collection;

final class TagListPageViewModel extends ViewModel
{
    public function __construct(public Collection $tags)
    {
    }
}
