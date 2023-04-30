@extends('layouts.app')
@section('title', 'Create Course')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-center">Create New Course</h1>
        <form method="POST" action="{{ 'courses.store' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                            placeholder="price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hours" class="form-label">hours</label>
                        <input type="text" class="form-control" name="hours" id="hours" aria-describedby="helpId"
                            placeholder="hours">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="vendor_id" class="form-label">Vendor</label>
                        <select class="form-select form-select-lg" name="vendor_id" id="vendor_id">
                            <option selected>Select one</option>
                            @foreach (App\Models\Vendor::all() as $key => $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Main Category</label>
                        <select class="form-select form-select-lg" name="category_id" id="category">
                            <option selected>Select one</option>
                            @foreach (App\Models\Category::whereNull('category_id')->get() as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Sub Category</label>
                        <select class="form-select form-select-lg" name="category_id" id="sub_category">
                            <option selected>Select one</option>
                        </select>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#category').on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({
                    url: "{{ route('sub_categories') }}",
                    type: "POST",
                    data: {
                        category_id: cat_id
                    },
                    success: function(data) {
                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">Select one</option>');
                        $.each(data.sub_categories, function(index,
                            subcategory) {
                            $('#sub_category').append('<option value="' + subcategory
                                .id + '">' + subcategory.name + '</option>');
                        })
                    }
                })
            });
        });
    </script>
@endsection
