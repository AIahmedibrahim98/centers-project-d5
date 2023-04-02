<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index($id)
    {
        $branches = Company::find($id)->branches()->paginate(25);
        return view('companies.branches.index')->with(compact('branches'));
    }
    public function create($id)
    {
        return view('companies.branches.create')->with(compact('id'));
    }
    public function store($id, Request $request)
    {
        $request->validate([
            'name' => "required",
            'location' => "required|string|max:10",
        ]);
        Branch::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'company_id' => $id
        ]);
        return redirect()->route('companies.branches.index', $id)->with('message', 'Branch Added');
    }
}
