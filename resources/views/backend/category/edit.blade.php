@extends('backend.master')
@section('title', 'Edit Category')
@section('content')
    <section class="py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="fw-bolder text-center">Edit Category</h3>
                            <hr>
                            <h5 class="text-success text-center fw-bolder mt-2">{{ Session::get('success') ? Session::get('success') : '' }}</h5>
                            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <label for="publish"><input type="radio" id="publish" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }} checked/> Published</label>
                                        <label for="unpublish"><input type="radio" id="unpublish" name="status" value="0" {{ $category->status == 0 ? 'checked' : '' }}/> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div>
                                        <input type="submit" class="btn btn-outline-success rounded-0 col-md-12" value="Update Category">
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
