<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Slider;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;

use App\Language;


class SliderController extends Controller {

	use FileUploadTrait;
	/**
	 * Display a listing of slider
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $slider = Slider::with("language")->get();

		return view('admin.slider.index', compact('slider'));
	}

	/**
	 * Show the form for creating a new slider
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);


	    return view('admin.slider.create', compact("language"));
	}

	/**
	 * Store a newly created slider in storage.
	 *
     * @param CreateSliderRequest|Request $request
	 */
	public function store(CreateSliderRequest $request)
	{

		$request = $this->saveFiles($request);
		Slider::create($request->all());

		return redirect()->route(config('quickadmin.route').'.slider.index');
	}

	/**
	 * Show the form for editing the specified slider.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$slider = Slider::find($id);
	    $language = Language::pluck("lang_name", "id")->prepend('Выбрать', 0);


		return view('admin.slider.edit', compact('slider', "language"));
	}

	/**
	 * Update the specified slider in storage.
     * @param UpdateSliderRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSliderRequest $request)
	{
		$request = $this->saveFiles($request);
		$slider = Slider::findOrFail($id);



		$slider->update($request->all());

		return redirect()->route(config('quickadmin.route').'.slider.index');
	}

	/**
	 * Remove the specified slider from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Slider::destroy($id);

		return redirect()->route(config('quickadmin.route').'.slider.index');
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
            Slider::destroy($toDelete);
        } else {
            Slider::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.slider.index');
    }

}
