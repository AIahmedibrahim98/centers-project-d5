@extends('layouts.app')
@section('title', 'Add New Branch')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Add New Branch</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('companies.branches.store', ['company_id' => $id]) }}">
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row border rounded m-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="name">
                    </div>
                    {{--  @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input value="{{ old('location') }}" type="text" class="form-control" name="location" id="location" aria-describedby="helpId"
                            placeholder="location">
                        {{-- @error('location')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
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
