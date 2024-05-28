@extends('backend.master')
@section('title', 'Add Product')
@section('content')
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h3 class="fw-bolder text-center">Add Product</h3>
                        <hr>
                        <h5 class="text-success text-center fw-bolder mt-2">{{ Session::get('success') ? Session::get('success') : '' }}</h5>
                        <form action="{{ route('product-store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label for="" class="col-md-3">Product Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="product_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="" class="col-md-3">Category Name</label>
                                <div class="col-md-9">
{{--                                    <input type="text" name="category_name" class="form-control"/>--}}
                                    <select name="category_id" class="form-control" id="">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="" class="col-md-3">Brand Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="brand_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="" class="col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="" class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" accept="image/*" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-3">Status</label>
                                <div class="col-md-9">
                                    <label for="publish"><input type="radio" id="publish" name="status" value="1" checked/> Published</label>
                                    <label for="unpublish"><input type="radio" id="unpublish" name="status" value="0"/> Unpublished</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div>
                                    <input type="submit" class="btn btn-outline-success rounded-0 col-md-12" value="Create Product">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
