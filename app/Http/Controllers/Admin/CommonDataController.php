<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CommonData;
use App\Http\Requests\CreateCommonDataRequest;
use App\Http\Requests\UpdateCommonDataRequest;
use Illuminate\Http\Request;

use App\Language;


class CommonDataController extends Controller {

	/**
	 * Display a listing of commondata
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $commondata = CommonData::with("language")->get();

		return view('admin.commondata.index', compact('commondata'));
	}

	/**
	 * Show the form for creating a new commondata
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
	    return view('admin.commondata.create', compact("language"));
	}

	/**
	 * Store a newly created commondata in storage.
	 *
     * @param CreateCommonDataRequest|Request $request
	 */
	public function store(CreateCommonDataRequest $request)
	{
	    
		CommonData::create($request->all());

		return redirect()->route(config('quickadmin.route').'.commondata.index');
	}

	/**
	 * Show the form for editing the specified commondata.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$commondata = CommonData::find($id);
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
		return view('admin.commondata.edit', compact('commondata', "language"));
	}

	/**
	 * Update the specified commondata in storage.
     * @param UpdateCommonDataRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCommonDataRequest $request)
	{
		$commondata = CommonData::findOrFail($id);

        

		$commondata->update($request->all());

		return redirect()->route(config('quickadmin.route').'.commondata.index');
	}

	/**
	 * Remove the specified commondata from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CommonData::destroy($id);

		return redirect()->route(config('quickadmin.route').'.commondata.index');
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
            CommonData::destroy($toDelete);
        } else {
            CommonData::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.commondata.index');
    }

}
