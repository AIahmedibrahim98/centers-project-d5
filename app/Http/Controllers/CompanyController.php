<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('companies.index')->with(compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    public function store(Request $request)
    {
        // Validate
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('_token'));
        Company::create($request->except('_token'));
        // return redirect()->back();
        // return redirect()->to('/companies');
        // return redirect()->route('companies.index');
        session()->flash('message', "Company Added");
        // session()->forget()
        // session()->put('message',"Company Added");
        return redirect()->route('companies.index'); //->with('message',"Company Added");
    }
    public function delete($id)
    {
        try {
            Company::destroy($id);
            return redirect()->route('companies.index')->with('message', "Company Deleted");
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->route('companies.index')->with('message', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }
    public function update($id, Request $request)
    {
        $company = Company::find($id)->update($request->except('_token'));
        return redirect()->route('companies.index')->with('message', "Company Updated " . $request->name);
    }
}
