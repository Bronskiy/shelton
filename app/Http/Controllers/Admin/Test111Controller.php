<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Test111;
use App\Http\Requests\CreateTest111Request;
use App\Http\Requests\UpdateTest111Request;
use Illuminate\Http\Request;



class Test111Controller extends Controller {

	/**
	 * Display a listing of test111
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $test111 = Test111::all();

		return view('admin.test111.index', compact('test111'));
	}

	/**
	 * Show the form for creating a new test111
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.test111.create');
	}

	/**
	 * Store a newly created test111 in storage.
	 *
     * @param CreateTest111Request|Request $request
	 */
	public function store(CreateTest111Request $request)
	{
	    
		Test111::create($request->all());

		return redirect()->route(config('quickadmin.route').'.test111.index');
	}

	/**
	 * Show the form for editing the specified test111.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$test111 = Test111::find($id);
	    
	    
		return view('admin.test111.edit', compact('test111'));
	}

	/**
	 * Update the specified test111 in storage.
     * @param UpdateTest111Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTest111Request $request)
	{
		$test111 = Test111::findOrFail($id);

        

		$test111->update($request->all());

		return redirect()->route(config('quickadmin.route').'.test111.index');
	}

	/**
	 * Remove the specified test111 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Test111::destroy($id);

		return redirect()->route(config('quickadmin.route').'.test111.index');
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
            Test111::destroy($toDelete);
        } else {
            Test111::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.test111.index');
    }

}
