<?php

namespace App\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class Categories extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $categories = Category::withCount(['posts'])->whereNull('parent_id')->latest()->get();

        return view('widgets.categories', [
            'config' => $this->config,
            'categories' => $categories,
        ]);
    }
}
