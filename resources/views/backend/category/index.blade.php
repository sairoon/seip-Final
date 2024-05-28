
@extends('backend.master')
@section('title', 'Manage Category')
@section('content')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="fw-bolder text-center">Manage Category</h3>
                        </div>
                        <div class="card-body">

                            <h5 class="text-success text-center fw-bolder mt-2">{{ Session::get('success') ? Session::get('success') : '' }}</h5>
                            <table class="table table-hover table-bordered text-center mt-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-outline-primary rounded-0 mt-2">Edit</a>
                                            <form action="{{ route('categories.destroy',$category->id) }}" method="post" onsubmit="return confirm('Do you want to Delete this!!')">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-outline-danger ms-2 rounded-0 mt-2" value="Delete">
                                            </form>
{{--                                            <a href="" class="btn btn-outline-danger rounded-0 mt-2" onclick="return confirm('Do you want to Delete this!!')">Delete</a>--}}
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

