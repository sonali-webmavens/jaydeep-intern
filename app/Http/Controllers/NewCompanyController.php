<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewCompany;

class NewCompanyController extends Controller
{
    public function show(){
        $newcompany=NewCompany::all();
        return view('newcompany.show',compact('newcompany'));
    }

    // public function export()
    // {
    //     return Excel::download(new NewCompanyExport(), 'new_companies.xlsx');
    // }
}
