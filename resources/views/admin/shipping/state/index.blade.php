@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
                    <div class="container-fluid">
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"> <a class="nav-link" aria-current="page" href="{{ route('admin.shipping.index') }}"><i class='bx bx-home-alt me-1'></i>Divisions</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district.index') }}"><i class='bx bx-user me-1'></i>Districts</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link active" href="{{ route('admin.state.index') }}"><i class='bx bx-category-alt me-1'></i>States</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        
    

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">States</div>
            <div class="ps-3"></div>
            <a type="button" href="{{ route('admin.shipping.add') }}" class="btn btn-primary">Add</a>  
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" width="100%">
                        <thead>  
                            <tr>
                                <th>ID</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($district as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->division_id }}</td>
                                <td>{{ $item->division_district }}</td>
                                <td> 
                                <a href="{{ route('admin.subcategories.edit',$item->id) }}" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-edit"></i></a>
                                <a href="{{ route('admin.subcategories.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer l'entrée"><i class="bx bx-trash"></i></a>    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Division Name</th>
                                <th>District Name</th>
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

