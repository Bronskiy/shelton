<?php

namespace App\Http\Controllers\Admin;

use App\Rooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Redirect;
use Schema;
use App\Language;
use App\RoomCategories;


class RoomsController extends Controller {

	use FileUploadTrait;
	/**
	* Display a listing of rooms
	*
	* @param Request $request
	*
	* @return \Illuminate\View\View
	*/
	public function index(Request $request)
	{
		$rooms = Rooms::with("roomcategories")->with("language")->get();

		return view('admin.rooms.index', compact('rooms'));
	}

	/**
	* Show the form for creating a new rooms
	*
	* @return \Illuminate\View\View
	*/
	public function create()
	{
		$roomcategories = RoomCategories::pluck("room_cat_title", "id")->prepend('Выбрать', 0);
		$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);


		return view('admin.rooms.create', compact("roomcategories", "language"));
	}

	/**
	* Store a newly created rooms in storage.
	*
	* @param CreateRoomsRequest|Request $request
	*/
	public function store(CreateRoomsRequest $request)
	{
		$request = $this->saveFiles($request);
		$rooms = Rooms::create($request->all());

		foreach ($request->input('room_gallery_id', []) as $index => $id) {
			$model          = config('laravel-medialibrary.media_model');
			$file           = $model::find($id);
			$file->model_id = $rooms->id;
			$file->save();
		}

		return redirect()->route(config('quickadmin.route').'.rooms.index');
	}

	/**
	* Show the form for editing the specified rooms.
	*
	* @param  int  $id
	* @return \Illuminate\View\View
	*/
	public function edit($id)
	{
		$rooms = Rooms::find($id);
		$roomcategories = RoomCategories::pluck("room_cat_title", "id")->prepend('Выбрать', 0);
		$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);


		return view('admin.rooms.edit', compact('rooms', "roomcategories", "language"));
	}

	/**
	* Update the specified rooms in storage.
	* @param UpdateRoomsRequest|Request $request
	*
	* @param  int  $id
	*/
	public function update($id, UpdateRoomsRequest $request)
	{
		$request = $this->saveFiles($request);
		$rooms = Rooms::findOrFail($id);
		$rooms->update($request->all());

		$media = [];
		foreach ($request->input('room_gallery_id', []) as $index => $id) {
			$model          = config('laravel-medialibrary.media_model');
			$file           = $model::find($id);
			$file->model_id = $rooms->id;
			$file->save();
			$media[] = $file->toArray();
		}
		$rooms->updateMedia($media, 'room_gallery');

		return redirect()->route(config('quickadmin.route').'.rooms.index');
	}

	/**
	* Remove the specified rooms from storage.
	*
	* @param  int  $id
	*/
	public function destroy($id)
	{
		//Rooms::destroy($id);

		$rooms = Rooms::findOrFail($id);
		$rooms->deletePreservingMedia();

		return redirect()->route(config('quickadmin.route').'.rooms.index');
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
			Rooms::destroy($toDelete);
		} else {
			//  Rooms::whereNotNull('id')->delete();
			$entries = Rooms::whereIn('id', $request->input('ids'))->get();

			foreach ($entries as $entry) {
				$entry->deletePreservingMedia();
			}
		}

		return redirect()->route(config('quickadmin.route').'.rooms.index');
	}

}
