@extends('layouts.app')
@section('title', 'Add New Vendor')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Add New Vendor</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" enctype="multipart/form-data" action="{{ route('vendors.store') }}">
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo" placeholder="logo"
                            aria-describedby="fileHelpId">
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
