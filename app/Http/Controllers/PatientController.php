<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Owner;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show()
	{
		$patients = Patient::select('patients.*', 'owners.first_name', 'owners.last_name')
			->leftJoin('owners', 'patients.owner_id', '=', 'owners.owner_id')
			->orderBy('patients.created_at', 'asc')->get();
		return view('patients', [
			'patients' => $patients
		]);
	}
	
	public function add()
	{
		$owners = Owner::get();
		return view('patient-add', [
			'owners' => $owners
		]);
	}
	
	public function create(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'required',
			'species' => 'required',
			'color' => 'required',
			'dob' => 'required',
			'owner_id' => 'required'
		], [
			'name.required' => 'Name field is required.',
			'species.required' => 'Species field is required.',
			'color.required' => 'Color field is required.',
			'dob.required' => 'Date of Birth field is required.',
			'owner_id.required' => 'Owner field is required.'
		]);

        $patient = Patient::create($validatedData);
        return redirect('/patients')->with('success', 'Patient created successfully.');
	}
	
	public function edit(Request $request, $id)
	{
		$patient = Patient::find($id);
		if ($patient == NULL)
		{
			return redirect('/patients');
		}
		$owners = Owner::get();
		return view('patient-edit', [
			'patient' => $patient,
			'owners' => $owners
		]);
	}
	
	public function save(Request $request)
	{
		$id = $request->input('id');
		$validatedData = $request->validate([
			'name' => 'required',
			'species' => 'required',
			'color' => 'required',
			'dob' => 'required',
			'owner_id' => 'required'
		], [
			'name.required' => 'Name field is required.',
			'species.required' => 'Species field is required.',
			'color.required' => 'Color field is required.',
			'dob.required' => 'Date of Birth field is required.',
			'owner_id.required' => 'Owner field is required.'
		]);

        $patient = Patient::where('patient_id', $id)->update($validatedData);
		return redirect('/patients')->with('success', 'Patient updated successfully.');
	}
	
	public function delete($id)
	{
		$patient = Patient::find($id);
		$patient->delete();
		return redirect('/patients')->with('success','Patient deleted successfully');
	}
}
