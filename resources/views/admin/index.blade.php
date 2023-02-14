@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                <div class="d-flex align-items-center">
                    @if ($orders == 0)
                    <h5 class="mb-0 text-white">0 $</h5>
                    @else
                    <h5 class="mb-0 text-white">{{ $orders/100 }} $</h5>
                    @endif
                    <div class="ms-auto">
                        <i class='bx bx-cart fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Revenue total</p>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">{{ $users }}</h5>
                    <div class="ms-auto">
                        <i class='bx bx-group fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Utilisateurs total</p>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">{{ $pending }}</h5>
                    <div class="ms-auto">
                        <i class='bx bx-box fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Commande en attente</p>
                </div>
            </div>
        </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-moonlit">
                <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">0</h5>
                    <div class="ms-auto">
                        <i class='bx bx-envelope fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Messages</p>
                </div>
            </div>
            </div>
        </div>
    </div><!--end row-->
    
        <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Sommaire des commandes</h5>
                </div>
                <div class="dropdown options ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <i class='bx bx-dots-horizontal-rounded'></i>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                    </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
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
                            @foreach ($total_orders as $key => $item)
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
                                <a href="{{ url('admin/orders/delete/'.$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer l'entrée"><i class="bx bx-trash"></i></a>    
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

@endsection