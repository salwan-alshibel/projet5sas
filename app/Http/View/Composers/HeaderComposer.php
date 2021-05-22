<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */

    //Call this with other views:
    public function compose(View $view)
    {
        $conditions = ['online'=>1, 'parent_id'=>null];
        $view->with('categories', Category::where($conditions)->get());
    }
}