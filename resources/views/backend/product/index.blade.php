
@extends('backend.master')
@section('title', 'Add Product')
@section('content')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="fw-bolder text-center">Manage Product</h3>
                        </div>
                        <div class="card-body">

                            <h5 class="text-success text-center fw-bolder mt-2">{{ Session::get('success') ? Session::get('success') : '' }}</h5>
                            <table class="table table-hover table-bordered text-center mt-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" style="height: 80px; width: 60px" alt="">
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('product-edit',['id' => $product->id]) }}" class="btn btn-outline-primary rounded-0 mt-2">Edit</a>
                                            <a href="{{ route('product-delete',['id' => $product->id]) }}" class="btn btn-outline-danger rounded-0 mt-2" onclick="return confirm('Do you want to Delete this!!')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

