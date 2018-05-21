<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ContactEntries;
use App\Http\Requests\CreateContactEntriesRequest;
use App\Http\Requests\UpdateContactEntriesRequest;
use Illuminate\Http\Request;



class ContactEntriesController extends Controller {

	/**
	 * Display a listing of contactentries
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $contactentries = ContactEntries::all();

		return view('admin.contactentries.index', compact('contactentries'));
	}

	/**
	 * Show the form for creating a new contactentries
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.contactentries.create');
	}

	/**
	 * Store a newly created contactentries in storage.
	 *
     * @param CreateContactEntriesRequest|Request $request
	 */
	public function store(CreateContactEntriesRequest $request)
	{
	    
		ContactEntries::create($request->all());

		return redirect()->route(config('quickadmin.route').'.contactentries.index');
	}

	/**
	 * Show the form for editing the specified contactentries.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$contactentries = ContactEntries::find($id);
	    
	    
		return view('admin.contactentries.edit', compact('contactentries'));
	}

	/**
	 * Update the specified contactentries in storage.
     * @param UpdateContactEntriesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateContactEntriesRequest $request)
	{
		$contactentries = ContactEntries::findOrFail($id);

        

		$contactentries->update($request->all());

		return redirect()->route(config('quickadmin.route').'.contactentries.index');
	}

	/**
	 * Remove the specified contactentries from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ContactEntries::destroy($id);

		return redirect()->route(config('quickadmin.route').'.contactentries.index');
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
            ContactEntries::destroy($toDelete);
        } else {
            ContactEntries::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.contactentries.index');
    }

}
