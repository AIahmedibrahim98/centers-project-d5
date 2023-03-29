<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at','desc')->paginate(10);
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
        session()->flash('message',"Company Added");
        // session()->forget()
        // session()->put('message',"Company Added");
        return redirect()->route('companies.index');//->with('message',"Company Added");
    }
}
