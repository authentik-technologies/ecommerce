@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Clients & Utilisateurs</div>
            <div class="ps-3"></div>
            <a type="button" href="#" class="btn btn-primary">Ajouter</a>  
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" width="100%">
                        <thead>  
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Courriel</th>
                                <th>Téléphone</th>
                                <th>Status</th>
                                <th>Activity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>@if($item->status == 'active')
                                    <span class="badge badege-pill bg-success">Active</span>
                                    @else
                                    <span class="badge badege-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->UserOnline())
                                    <span class="badge badege-pill bg-success">En ligne</span>
                                    @else
                                    <span class="badge badege-pill bg-danger">Hors ligne</span>
                                    @endif
                                </td>
                                <td> 
                                <a href="#" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-edit"></i></a>
                                <a href="#" class="btn btn-danger" id="delete" title="Supprimer l'entrée"><i class="bx bx-trash"></i></a>    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Courriel</th>
                                <th>Téléphone</th>
                                <th>Status</th>
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

