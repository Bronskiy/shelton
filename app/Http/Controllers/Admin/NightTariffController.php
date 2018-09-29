<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\NightTariff;
use App\Http\Requests\CreateNightTariffRequest;
use App\Http\Requests\UpdateNightTariffRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;

use App\Language;

class NightTariffController extends Controller {

	/**
	 * Display a listing of nighttariff
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $nighttariff = NightTariff::with("language")->get();

		return view('admin.nighttariff.index', compact('nighttariff'));
	}

	/**
	 * Show the form for creating a new nighttariff
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{

		$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);

	    return view('admin.nighttariff.create', compact("language"));
	}

	/**
	 * Store a newly created nighttariff in storage.
	 *
     * @param CreateNightTariffRequest|Request $request
	 */
	public function store(CreateNightTariffRequest $request)
	{
	    $request = $this->saveFiles($request);
		NightTariff::create($request->all());

		return redirect()->route(config('quickadmin.route').'.nighttariff.index');
	}

	/**
	 * Show the form for editing the specified nighttariff.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$nighttariff = NightTariff::find($id);

		$language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);

		return view('admin.nighttariff.edit', compact('nighttariff', "language"));
	}

	/**
	 * Update the specified nighttariff in storage.
     * @param UpdateNightTariffRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateNightTariffRequest $request)
	{
		$nighttariff = NightTariff::findOrFail($id);

        $request = $this->saveFiles($request);

		$nighttariff->update($request->all());

		return redirect()->route(config('quickadmin.route').'.nighttariff.index');
	}

	/**
	 * Remove the specified nighttariff from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		NightTariff::destroy($id);

		return redirect()->route(config('quickadmin.route').'.nighttariff.index');
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
            NightTariff::destroy($toDelete);
        } else {
            NightTariff::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.nighttariff.index');
    }

}
