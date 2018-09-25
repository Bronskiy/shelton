<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Comments;
use App\Http\Requests\CreateCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use Illuminate\Http\Request;

use App\Rooms;
use App\Language;

class CommentsController extends Controller {

	/**
	 * Display a listing of comments
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $comments = Comments::with("rooms")->with("language")->get();

		return view('admin.comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new comments
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $rooms = Rooms::pluck("room_title", "id")->prepend('Выбрать', 0);
			$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);
			$enum_comment_confirmation = Comments::$enum_comment_confirmation;


	    return view('admin.comments.create', compact("rooms", "language", "enum_comment_confirmation"));
	}

	/**
	 * Store a newly created comments in storage.
	 *
     * @param CreateCommentsRequest|Request $request
	 */
	public function store(CreateCommentsRequest $request)
	{

		Comments::create($request->all());

		return redirect()->route(config('quickadmin.route').'.comments.index');
	}

	/**
	 * Show the form for editing the specified comments.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$comments = Comments::find($id);
	    $rooms = Rooms::pluck("room_title", "id")->prepend('Выбрать', 0);
			$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);
			$enum_comment_confirmation = Comments::$enum_comment_confirmation;

		return view('admin.comments.edit', compact('comments', "rooms", "enum_comment_confirmation", "language"));
	}

	/**
	 * Update the specified comments in storage.
     * @param UpdateCommentsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCommentsRequest $request)
	{
		$comments = Comments::findOrFail($id);



		$comments->update($request->all());

		return redirect()->route(config('quickadmin.route').'.comments.index');
	}

	/**
	 * Remove the specified comments from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Comments::destroy($id);

		return redirect()->route(config('quickadmin.route').'.comments.index');
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
            Comments::destroy($toDelete);
        } else {
            Comments::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.comments.index');
    }

}
