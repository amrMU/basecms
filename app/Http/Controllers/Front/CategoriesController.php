<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryTranslation,App\Category;

class CategoriesController extends Controller
{
    public $view = 'front.categories.';

    public function __construct(
			Category $category,
			CategoryTranslation $translation
		)
	{
        $this->category = $category;
        $this->translation = $translation;
	}


	public function show($id,$name)
	{
		$category = $this->category->find($id);
		if ($category == null) {
			return abort(404);
		}
		return view($this->view.'show',compact('category'));

	}

}
