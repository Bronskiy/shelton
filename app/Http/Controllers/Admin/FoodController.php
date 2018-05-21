<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Food;
use App\Http\Requests\CreateFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\FoodCategories;
use App\Language;


class FoodController extends Controller {

	/**
	 * Display a listing of food
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $food = Food::with("foodcategories")->with("language")->get();

		return view('admin.food.index', compact('food'));
	}

	/**
	 * Show the form for creating a new food
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $foodcategories = FoodCategories::pluck("food_cat_title", "id")->prepend('Выбрать', 0);
$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);


	    return view('admin.food.create', compact("foodcategories", "language"));
	}

	/**
	 * Store a newly created food in storage.
	 *
     * @param CreateFoodRequest|Request $request
	 */
	public function store(CreateFoodRequest $request)
	{
	    $request = $this->saveFiles($request);
		Food::create($request->all());

		return redirect()->route(config('quickadmin.route').'.food.index');
	}

	/**
	 * Show the form for editing the specified food.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$food = Food::find($id);
	    $foodcategories = FoodCategories::pluck("food_cat_title", "id")->prepend('Выбрать', 0);
$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);


		return view('admin.food.edit', compact('food', "foodcategories", "language"));
	}

	/**
	 * Update the specified food in storage.
     * @param UpdateFoodRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFoodRequest $request)
	{
		$food = Food::findOrFail($id);

        $request = $this->saveFiles($request);

		$food->update($request->all());

		return redirect()->route(config('quickadmin.route').'.food.index');
	}

	/**
	 * Remove the specified food from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Food::destroy($id);

		return redirect()->route(config('quickadmin.route').'.food.index');
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
            Food::destroy($toDelete);
        } else {
            Food::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.food.index');
    }

}
