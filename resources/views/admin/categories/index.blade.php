@extends('admin.layouts.master')
@section('admin')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Categories</div>
        <div class="ps-3"></div>
        <a type="button" href="{{ route('admin.categories.add') }}" class="btn btn-primary">Add Category</a>  
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" width="100%">
                    <thead>  
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td> <img src="{{ asset($item->category_image)  }}" style="width:60px; height:60px;"></td>
                            <td>
                            <a href="{{ route('admin.categories.edit',$item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('admin.categories.delete',$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

