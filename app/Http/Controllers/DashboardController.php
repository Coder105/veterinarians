<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show()
	{
		$owners = Owner::count();
		$patients = Patient::count();
		return view('dashboard', ['owners' => $owners, 'patients' => $patients]);
	}
}
