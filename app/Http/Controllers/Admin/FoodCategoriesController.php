<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\FoodCategories;
use App\Http\Requests\CreateFoodCategoriesRequest;
use App\Http\Requests\UpdateFoodCategoriesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;

use App\Language;


class FoodCategoriesController extends Controller {

	/**
	 * Display a listing of foodcategories
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $foodcategories = FoodCategories::with("foodcategories")->with("language")->get();

		return view('admin.foodcategories.index', compact('foodcategories'));
	}


	/**
	 * Show the form for creating a new foodcategories
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{

		$foodcategories = FoodCategories::where("foodcategories_id", 0)->pluck("food_cat_title", "id")->prepend('Выбрать', 0);
		$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);
	    return view('admin.foodcategories.create', compact("foodcategories", "language"));
	}

	/**
	 * Store a newly created foodcategories in storage.
	 *
     * @param CreateFoodCategoriesRequest|Request $request
	 */
	public function store(CreateFoodCategoriesRequest $request)
	{
		$request = $this->saveFiles($request);

		FoodCategories::create($request->all());

		return redirect()->route(config('quickadmin.route').'.foodcategories.index');
	}

	/**
	 * Show the form for editing the specified foodcategories.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$foodcategories = FoodCategories::find($id);
		$foodcategories_p = FoodCategories::where("foodcategories_id", 0)->pluck("food_cat_title", "id")->prepend('Выбрать', 0);
		$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);

		return view('admin.foodcategories.edit', compact('foodcategories', "foodcategories_p", "language"));
	}

	/**
	 * Update the specified foodcategories in storage.
     * @param UpdateFoodCategoriesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFoodCategoriesRequest $request)
	{
		$foodcategories = FoodCategories::findOrFail($id);

$request = $this->saveFiles($request);


		$foodcategories->update($request->all());

		return redirect()->route(config('quickadmin.route').'.foodcategories.index');
	}

	/**
	 * Remove the specified foodcategories from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		FoodCategories::destroy($id);

		return redirect()->route(config('quickadmin.route').'.foodcategories.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            FoodCategories::destroy($toDelete);
        } else {
            FoodCategories::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.foodcategories.index');
    }

}
