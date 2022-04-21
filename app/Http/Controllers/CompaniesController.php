<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{

    public function index(){
        $data['companies'] = Company::paginate(7);
        return view('companies.index',$data);
    }

    public function show(Company $company){
        $data['company'] = $company;
        $data['employees'] = $company->employees()->paginate(7);
        return view('companies.show',$data);
    }

    public function create(){
        return view('companies.create');
    }

    public function store(CompanyStoreRequest $request){

        $company = Company::create($request->except(['_token','_method','logo']));
        if($request->hasFile('logo')){
            $file_name = Storage::disk('public')->put('/',$request->logo);
            $company->update(['logo'=>'public/storage/'.$file_name]);
        }
        return redirect(route('companies.index'))->with('success_message','Company has been added.');
    }

    public function edit(Company $company){
        $data['company'] = $company;
        return view('companies.edit',$data);
    }

    public function update(Company $company,CompanyStoreRequest $request){
        $company->update($request->except(['_token','_method','logo']));
        if($request->hasFile('logo')){
            $file_name = Storage::disk('public')->put('/',$request->logo);
            if (File::exists(public_path($company->logo))) {
                File::delete(public_path($company->logo));
            }
            $company->update(['logo'=>'public/storage/'.$file_name]);
        }
        return back()->with('success_message','The selected company has been updated.');
    }

    public function destroy($id){
        Company::destroy($id);
        return back()->with('success_message','The selected company has been removed.');
    }
}
