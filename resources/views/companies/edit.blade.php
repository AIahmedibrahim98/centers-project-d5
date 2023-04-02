@extends('layouts.app')
@section('title', 'Edit Company')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Edit Company</h1>
        <form method="POST" action="{{ route('companies.update',$company->id) }}">
            @method('patch')
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $company->name }}" type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="owner" class="form-label">Owner</label>
                        <input value="{{ $company->owner }}" type="text" class="form-control" name="owner"
                            id="owner" aria-describedby="helpId" placeholder="owner">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tax_numebr" class="form-label">Tax Number</label>
                        <input value="{{ $company->tax_numebr }}" type="text" class="form-control" name="tax_numebr"
                            id="tax_numebr" aria-describedby="helpId" placeholder="Tax Number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center mt-4">
                        <div><button type="submit" class="btn btn-lg btn-primary">Save</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
