@extends('admin.layouts.master')
@section('admin')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
        <div class="ps-3"></div>
        <a type="button" href="{{ route('admin.products.add') }}" class="btn btn-primary">Add Products</a>  
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" width="100%">
                    <thead>  
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Cost</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td> <img src="{{ asset($item->product_image)  }}" style="width:60px; height:60px;"></td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td>{{ $item->product_cost }}</td>
                            <td>{{ $item->product_qty }}</td>
                            <td>{{ $item->product_status }}</td>
                            <td>
                            <a href="#" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Cost</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

