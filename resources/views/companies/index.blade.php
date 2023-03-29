@extends('layouts.app')
@section('title', 'Companies')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Companies</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('companies.create') }}"
                    role="button">Add New Company</a></div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">owner</th>
                        <th scope="col">tax numebr</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $key => $company)
                        <tr class="">
                            <td scope="row">{{ $key + $companies->firstItem() }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->owner }}</td>
                            <td>{{ $company->tax_numebr }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td>{{ $company->updated_at }}</td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $companies->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $companies->links('vendor.pagination.bootstrap-5') }}
        </div>

    </div>
@endsection
