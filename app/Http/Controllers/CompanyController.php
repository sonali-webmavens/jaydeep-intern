<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Mail\MyTestEmail;
use App\Jobs\SendEmailJob;
use App\Models\Scopes\DeletedScope;
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
        // active company
        $companies = Company::withoutGlobalScope(DeletedScope::class)->get();
        $companyCount = Company::withoutGlobalScope(DeletedScope::class)->count();

        // deleted company 
        $deletedCompanies = Company::onlyTrashed()->get();
        $deletedCompanyCount =  Company::onlyTrashed()->count();
        return view('company.lists',compact('companies','deletedCompanies','companyCount','deletedCompanyCount'));
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
        $company=Company::findOrFail($id);
        $company->delete();
        return back();
    }

    public function restore($id)
    {
        $company = Company::withTrashed()->findOrFail($id);
        $company->restore();

        return back();
    }

    public function forceDelete($id)
    {
        $company = Company::withTrashed()->findOrFail($id);
        $company->forceDelete();

        return back();
    }

    public function deletecompany(){
        
        $companies = Company::all();
        $deletedCompanies = Company::onlyTrashed()->get();
        
        $companyCount = $companies->count();
        $deletedCompanyCount =  Company::onlyTrashed()->count();

        return view('company.deletecompany',compact('companyCount', 'deletedCompanies', 'deletedCompanyCount', 'companies'));
    }

}
