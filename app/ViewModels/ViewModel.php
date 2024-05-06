<?php
declare(strict_types=1);

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

abstract class ViewModel implements Arrayable
{
    public function toArray(): array
    {
        return [
            'view' => $this
        ];
    }
}
