@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Commandes</div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" width="100%">
                        <thead>  
                            <tr>
                                <th>ID</th>
                                <th># Commande</th>
                                <th>Nom</th>
                                <th>Courriel</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Postal</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->invoice_no  }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->billing_unit }}-{{ $item->billing_address }} {{ $item->billing_province }} {{ $item->billing_city }}</td>
                                <td>{{ $item->billing_postal }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->order_date }}</td>
                                <td>
                                    @if($item->status == 'Pending')
                                    <span class="badge rounded-pill bg-warning">En cours</span>
                                    @elseif ($item->status == 'Done')
                                    <span class="badge rounded-pill bg-success">Complété</span>
                                    @elseif ($item->status == 'Cancelled')
                                    <span class="badge rounded-pill bg-secondary">Cancellé</span>
                                    @elseif ($item->status == 'Returned')
                                    <span class="badge rounded-pill bg-danger">Retourné</span>
                                    @endif
                                </td>
                                <td> 
                                <a href="{{ url('admin/orders/details/'.$item->id) }}" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-edit"></i></a>
                                <a href="{{ url('admin/orders/details/invoice/'.$item->id) }}" class="btn btn-success" id="edit" title="Visionne la facture"><i class="bx bx-detail"></i></a>
                                <a href="{{ url('admin/orders/delete/'.$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer l'entrée"><i class="bx bx-trash"></i></a>    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th># Commande</th>
                                <th>Nom</th>
                                <th>Courriel</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Postal</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

