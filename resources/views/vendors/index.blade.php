@extends('layouts.app')
@section('title', 'Vendors')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Vendors</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('vendors.create') }}"
                    role="button">Add New Vendor</a></div>
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
                        <th scope="col">logo</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vendors as $key =>$vendor)
                        <tr class="">
                            <td scope="row">{{ $key + $vendors->firstItem() }}</td>
                            <td>{{ $vendor->name }}</td>
                            <td><img width="50px" src="{{ asset('storage/' . $vendor->logo) }}"
                                    class="img-fluid rounded-top" alt=""></td>
                            {{-- <td><img width="50px" src="{{ 'storage/'.$vendor->logo }}" class="img-fluid rounded-top" alt=""></td> --}}
                            <td>{{ $vendor->created_at->diffForHumans() }}</td>
                            <td>{{ $vendor->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('vendors.destroy', $vendor->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('vendors.edit', $vendor->id) }}" role="button">
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
            {{-- {{$vendors->links('vendor.pagination.simple-bootstrap-5') }} --}}
            {{ $vendors->links() }}
        </div>

    </div>
@endsection
