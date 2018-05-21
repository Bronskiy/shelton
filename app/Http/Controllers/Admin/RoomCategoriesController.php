<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RoomCategories;
use App\Http\Requests\CreateRoomCategoriesRequest;
use App\Http\Requests\UpdateRoomCategoriesRequest;
use Illuminate\Http\Request;

use App\Language;


class RoomCategoriesController extends Controller {

	/**
	 * Display a listing of roomcategories
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $roomcategories = RoomCategories::with("language")->get();

		return view('admin.roomcategories.index', compact('roomcategories'));
	}

	/**
	 * Show the form for creating a new roomcategories
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
	    return view('admin.roomcategories.create', compact("language"));
	}

	/**
	 * Store a newly created roomcategories in storage.
	 *
     * @param CreateRoomCategoriesRequest|Request $request
	 */
	public function store(CreateRoomCategoriesRequest $request)
	{
	    
		RoomCategories::create($request->all());

		return redirect()->route(config('quickadmin.route').'.roomcategories.index');
	}

	/**
	 * Show the form for editing the specified roomcategories.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$roomcategories = RoomCategories::find($id);
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
		return view('admin.roomcategories.edit', compact('roomcategories', "language"));
	}

	/**
	 * Update the specified roomcategories in storage.
     * @param UpdateRoomCategoriesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRoomCategoriesRequest $request)
	{
		$roomcategories = RoomCategories::findOrFail($id);

        

		$roomcategories->update($request->all());

		return redirect()->route(config('quickadmin.route').'.roomcategories.index');
	}

	/**
	 * Remove the specified roomcategories from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RoomCategories::destroy($id);

		return redirect()->route(config('quickadmin.route').'.roomcategories.index');
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
            RoomCategories::destroy($toDelete);
        } else {
            RoomCategories::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.roomcategories.index');
    }

}
