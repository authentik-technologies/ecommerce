@extends('admin.layouts.master')
@section('admin')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sub Categories</div>
        <div class="ps-3"></div>
        <a type="button" href="{{ route('admin.subcategories.add') }}" class="btn btn-primary">Add Sub Category</a>  
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" width="100%">
                    <thead>  
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item['categories']['category_name'] }}</td>
                            <td>{{ $item->subcategory_name }}</td>
                            <td> 
                            <a href="{{ route('admin.subcategories.edit',$item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('admin.subcategories.delete',$item->id) }}" class="btn btn-danger" id="delete">Delete</a> 
                            </td>
                      
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

