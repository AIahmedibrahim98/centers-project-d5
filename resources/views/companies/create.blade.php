@extends('layouts.app')
@section('title', 'Add New Company')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Add New Company</h1>
        <form method="POST" action="{{ route('companies.store') }}">
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="owner" class="form-label">Owner</label>
                        <input type="text" class="form-control" name="owner" id="owner" aria-describedby="helpId"
                            placeholder="owner">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tax_numebr" class="form-label">Tax Number</label>
                        <input type="text" class="form-control" name="tax_numebr" id="tax_numebr"
                            aria-describedby="helpId" placeholder="Tax Number">
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
