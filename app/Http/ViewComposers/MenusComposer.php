<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class MenusComposer
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
        $menu_categories = Category::menuCategories();
        $data = [
            'menu_categories' => $menu_categories
        ];
        $view->with($data);
    }
}
