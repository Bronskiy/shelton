<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CommonPages;
use App\Http\Requests\CreateCommonPagesRequest;
use App\Http\Requests\UpdateCommonPagesRequest;
use Illuminate\Http\Request;

use App\Language;


class CommonPagesController extends Controller {

	/**
	 * Display a listing of commonpages
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $commonpages = CommonPages::with("language")->get();

		return view('admin.commonpages.index', compact('commonpages'));
	}

	/**
	 * Show the form for creating a new commonpages
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
	    return view('admin.commonpages.create', compact("language"));
	}

	/**
	 * Store a newly created commonpages in storage.
	 *
     * @param CreateCommonPagesRequest|Request $request
	 */
	public function store(CreateCommonPagesRequest $request)
	{
	    
		CommonPages::create($request->all());

		return redirect()->route(config('quickadmin.route').'.commonpages.index');
	}

	/**
	 * Show the form for editing the specified commonpages.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$commonpages = CommonPages::find($id);
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
		return view('admin.commonpages.edit', compact('commonpages', "language"));
	}

	/**
	 * Update the specified commonpages in storage.
     * @param UpdateCommonPagesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCommonPagesRequest $request)
	{
		$commonpages = CommonPages::findOrFail($id);

        

		$commonpages->update($request->all());

		return redirect()->route(config('quickadmin.route').'.commonpages.index');
	}

	/**
	 * Remove the specified commonpages from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CommonPages::destroy($id);

		return redirect()->route(config('quickadmin.route').'.commonpages.index');
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
            CommonPages::destroy($toDelete);
        } else {
            CommonPages::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.commonpages.index');
    }

}
