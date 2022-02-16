<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show()
	{
		$owners = Owner::orderBy('created_at', 'asc')->get();
		return view('owners', [
			'owners' => $owners
		]);
	}
	
	public function add()
	{
		return view('owner-add');
	}
	
	public function create(Request $request)
	{
		$validatedData = $request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'phone_number' => 'required'
		], [
			'first_name.required' => 'First Name field is required.',
			'last_name.required' => 'Last Name field is required.',
			'phone_number.required' => 'Phone Number field is required.'
		]);

        $owner = Owner::create($validatedData);
        return redirect('/owners')->with('success', 'Owner created successfully.');
	}
	
	public function edit(Request $request, $id)
	{
		$owner = Owner::find($id);
		if ($owner == NULL)
		{
			return redirect('/owners');
		}
		return view('owner-edit', [
			'owner' => $owner
		]);
	}
	
	public function save(Request $request)
	{
		$id = $request->input('id');
		$validatedData = $request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'phone_number' => 'required'
		], [
			'first_name.required' => 'First Name field is required.',
			'last_name.required' => 'Last Name field is required.',
			'phone_number.required' => 'Phone Number field is required.'
		]);

        $owner = Owner::where('owner_id', $id)->update($validatedData);
        return redirect('/owners')->with('success', 'Owner updated successfully.');
	}
	
	public function delete($id)
	{
		$owner = Owner::find($id);
		$owner->delete();
		return redirect('/owners')->with('success','Owner deleted successfully');
	}
}
