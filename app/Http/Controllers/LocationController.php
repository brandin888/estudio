<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departament;
use App\District;
use App\Province;

class LocationController extends Controller
{

    public function tables()
    {
        $departments = Department::whereActive()->orderByDescription()->get();
        $provinces = Province::whereActive()->orderByDescription()->get();
        $districts = District::whereActive()->orderByDescription()->get();

        return view('checkout')->with([
            'departments' => $departments,
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }
}
