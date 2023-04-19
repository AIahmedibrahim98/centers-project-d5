@extends('layouts.app')
@section('title', 'Companies')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Companies({{ $count }})</h1>
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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $key => $company)
                        <tr class="">
                            <td scope="row">{{ $key + $companies->firstItem() }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->owner }}</td>
                            <td>{{ $company->tax_numebr }}</td>
                            <td> <span title="{{ $company->created_at }}">{{ $company->created_at->diffForHumans() }}</span> </td>
                            <td>{{ $company->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <a name="" id="" class="btn btn-warning"
                                        href="{{ route('companies.branches.index', $company->id) }}" role="button">
                                        <i class="fa-solid fa-code-branch fa-shake"></i>
                                    </a>
                                    <form action='{{ route('companies.delete', $company->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('companies.edit', $company->id) }}" role="button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $companies->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $companies->links() }}
        </div>

    </div>
@endsection
