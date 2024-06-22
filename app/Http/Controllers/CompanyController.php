<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Mail\MyTestEmail;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
class CompanyController extends Controller
{
    public function create(){
        return view('company.create');
    }

    public function save(request $request){
        $company = Company::create([
            'name' => $request->input('name'),
            'address' => $request->input('address')
        ]);
       
        $emails = User::pluck('email')->toArray();

        foreach ($emails as $email) {
            $details = ['email' => $email];
             SendEmailJob::dispatchNow($details);
        }

    return redirect()->route('company.create')->with('success', 'Mail sent successfully');
               
    }

    public function lists(){
        $companies=Company::all();
        return view('company.lists',compact('companies'));
    }

    public function edit($id){
        $company=Company::find($id);

        return view('company.create',compact('company'));
    }

    public function update(request $request ,$id){
        $company=Company::find($id);
        $company->update([
            'name' => $request->input('name'),
            'address' => $request->input('address')
        ]);
    
        return redirect()->route('company.lists');
    }

    public function delete($id){
        $company=Company::find($id);
        $company->delete();
        return back();
    }

}
