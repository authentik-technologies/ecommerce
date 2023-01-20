@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Banners</div>
            <div class="ps-3"></div>
            <a type="button" href="{{ route('admin.banners.add') }}" class="btn btn-primary">Add Banner</a>  
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" width="100%">
                        <thead>  
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->url }}</td>
                                <td> <img src="{{ asset($item->image)  }}" style="width:60px; height:60px;"></td>
                                <td>
                                <a href="{{ route('admin.banners.edit',$item->id) }}" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-edit"></i></a>
                                <a href="{{ route('admin.banners.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer l'entrée"><i class="bx bx-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

