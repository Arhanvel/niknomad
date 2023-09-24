<?php

namespace App\View\Components;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag-dropdown', [
            'tags' => Tag::all(),
            'currentTag' => Tag::firstWhere('slug', request('tags'))
        ]);
    }
}
