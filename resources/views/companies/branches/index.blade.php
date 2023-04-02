@extends('layouts.app')
@section('title', 'Branches')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Branches of {{ $branches->first()->company->name }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('companies.branches.create',$branches->first()->company->id) }}"
                    role="button">Add New Branch</a></div>
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
                        <th scope="col">location</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($branches as $key => $branch)
                        <tr class="">
                            <td scope="row">{{ $key + $branches->firstItem() }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->location }}</td>
                            <td>{{ $branch->created_at }}</td>
                            <td>{{ $branch->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('companies.delete', $branch->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('companies.edit', $branch->id) }}" role="button">
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
            {{-- {{ $branches->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $branches->links() }}
        </div>

    </div>
@endsection
