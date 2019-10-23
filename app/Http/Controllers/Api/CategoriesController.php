<?php
/*
*********************************
* Name: Amr Muhamed             *
* Email: amrmuhamed9@gmail.com  *
* Phone: +201061637022          *
* Copywrits @amrMU Githup       *
* *******************************
*/
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Response;
class CategoriesController extends Controller
{


    public function __construct(Category $categories)
	{
        $this->categories = $categories;
	}	 


    public function categoriesFilterByParent($parent_id)
    {

    	$categories = $this->categories->where('parent_id',$parent_id)->with('category_translation')->get();
    	$code = 200;
    	$msg = "OK";
        $response = ["status" => $code,'message'=>$msg,'data'=>$categories];
        return Response::json($response,$code);

    }
}
