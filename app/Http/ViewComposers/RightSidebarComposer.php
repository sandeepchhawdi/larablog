<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\View\View;

class RightSidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $top_categories = Category::topUsedCategories();
        $top_tags = Tag::topUsedTags();
        $data = [
            'top_categories' => $top_categories,
            'top_tags' => $top_tags
        ];
        $view->with($data);
    }
}
