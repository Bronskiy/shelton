<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Features;
use App\Http\Requests\CreateFeaturesRequest;
use App\Http\Requests\UpdateFeaturesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Language;


class FeaturesController extends Controller {

	/**
	 * Display a listing of features
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $features = Features::with("language")->get();

		return view('admin.features.index', compact('features'));
	}

	/**
	 * Show the form for creating a new features
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
	    return view('admin.features.create', compact("language"));
	}

	/**
	 * Store a newly created features in storage.
	 *
     * @param CreateFeaturesRequest|Request $request
	 */
	public function store(CreateFeaturesRequest $request)
	{
	    $request = $this->saveFiles($request);
		Features::create($request->all());

		return redirect()->route(config('quickadmin.route').'.features.index');
	}

	/**
	 * Show the form for editing the specified features.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$features = Features::find($id);
	    $language = Language::pluck("lang_name", "id")->prepend('Please select', 0);

	    
		return view('admin.features.edit', compact('features', "language"));
	}

	/**
	 * Update the specified features in storage.
     * @param UpdateFeaturesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFeaturesRequest $request)
	{
		$features = Features::findOrFail($id);

        $request = $this->saveFiles($request);

		$features->update($request->all());

		return redirect()->route(config('quickadmin.route').'.features.index');
	}

	/**
	 * Remove the specified features from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Features::destroy($id);

		return redirect()->route(config('quickadmin.route').'.features.index');
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
            Features::destroy($toDelete);
        } else {
            Features::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.features.index');
    }

}
