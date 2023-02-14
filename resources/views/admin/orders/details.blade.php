@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Détails de commande</div>
            </div>
        <!--end breadcrumb-->
        <hr/>

            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                <div class="col">
                    <div class="card">
                        <div class="card-header"><h4>Order Details
                            <span class="text-danger">Invoice : {{ $order->invoice_no }} </span></h4>
                        </div> 
                        <hr>
                        <div class="card-body">
                            <table class="table" style="background:#F4F6FA;font-weight: 600;">
                            <tr>
                            <th>Date:</th>
                            <th>{{ $order->order_date }}</th>
                            </tr>
                            <tr>
                            <th>Nom:</th>
                            <th>{{ $order->user->name }}</th>
                            </tr>

                            <tr>
                            <th>Téléphone:</th>
                            <th>{{ $order->user->phone }}</th>
                            </tr>

                            <tr>
                            <th>Type de paiement:</th>
                            <th>{{ $order->payment_method }}</th>
                            </tr>


                            <tr>
                            <th>ID Transaction:</th>
                            <th>{{ $order->transaction_id }}</th>
                            </tr>

                            <tr>
                            <th>Facture:</th>
                            <th class="text-danger">{{ $order->invoice_no }}
                            <a href="{{ url('admin/orders/details/invoice/'.$order->id) }}"><span class="badge bg-info" style="font-size: 15px;">Visionner</span></a>
                            </th>
                            
                            </tr>

                            <tr>
                            <th>Sous-total:</th>
                            <th>{{ $order->sub_amount }} $</th>
                            </tr>

                            <tr>
                            <th>Tax:</th>
                            <th>{{ $order->amount_tax }} $</th>
                            </tr>

                            <tr>
                            <th>Montant:</th>
                            <th>{{ $order->amount/100 }} $</th>
                            </tr>

                            <tr>
                            <th>Status:</th>
                                <th>
                                @if($order->status == 'Pending')
                                <span class="badge bg-warning" style="font-size: 15px;">En attente</span>
                                @elseif ($order->status == 'Cancelled')
                                <span class="badge bg-secondary" style="font-size: 15px;">Cancellé</span>
                                @elseif ($order->status == 'Returned')
                                <span class="badge bg-secondary" style="font-size: 15px;">Retourné</span>
                                @elseif ($order->status == 'Done')
                                <span class="badge bg-success" style="font-size: 15px;">Complété</span>
                                @endif  
                                </th>
                            </tr>
                            <tr>
                                <th> </th>
                                <th>
                                @if($order->status == 'Pending')
                                <a href="{{ route('admin.orders.confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm" >Confirmer la commande</a>
                                <a href="{{ route('admin.orders.cancel',$order->id) }}" class="btn btn-block btn-secondary" id="confirm" >Canceller la commande</a>
                                <a href="{{ route('admin.orders.return',$order->id) }}" class="btn btn-block btn-secondary" id="confirm" >Retourner la commande</a>
                                @elseif ($order->status == 'Done')
                                <a href="{{ route('admin.orders.return',$order->id) }}" class="btn btn-block btn-secondary" id="confirm" >Retourner la commande</a>
                                @endif  
                                </th>
                            </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col">
                    <div class="card">
                        <div class="card-header"><h4>Détails de facturation</h4> </div> 
                        <hr>
                        <div class="card-body">     
                            <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                <tr>
                                <th>Compagnie:</th>
                                <th>{{ $order->billing_cname }}</th>
                                </tr>
                                <tr>
                                <th>Nom:</th>
                                <th>{{ $order->name }}</th>
                                </tr>
    
                                <tr>
                                <th>Téléphone:</th>
                                <th>{{ $order->phone }}</th>
                                </tr>
    
                                <tr>
                                <th>Courriel:</th>
                                <th>{{ $order->email }}</th>
                                </tr>
    
                                <tr>
                                <th>Adresse:</th>
                                <th>{{ $order->billing_address }}</th>
                                </tr>
                    
                                <tr>
                                <th>Code postale:</th>
                                <th>{{ $order->billing_postal }}</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header"><h4>Détails de livraison</h4> </div> 
                        <hr>
                        <div class="card-body">     
                            <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                <tr>
                                <th>Compagnie:</th>
                                <th>{{ $order->billing_cname }}</th>
                                </tr>
                                <tr>
                                <th>Nom:</th>
                                <th>{{ $order->name }}</th>
                                </tr>
    
                                <tr>
                                <th>Téléphone:</th>
                                <th>{{ $order->phone }}</th>
                                </tr>
    
                                <tr>
                                <th>Courriel:</th>
                                <th>{{ $order->email }}</th>
                                </tr>
    
                                <tr>
                                <th>Adresse:</th>
                                <th>{{ $order->billing_address }}</th>
                                </tr>
                    
                                <tr>
                                <th>Code postale:</th>
                                <th>{{ $order->billing_postal }}</th>
                                </tr>
    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                <div class="col">
                    <div class="card">
    
                        <div class="table-responsive">
                                <table class="table" style="font-weight: 600;"  >
                                <tbody>
                                <tr>
                                <td class="col-md-1">
                                <label>Image </label>
                                </td>
                                <td class="col-md-2">
                                <label>Produit </label>
                                </td>
                                <td class="col-md-2">
                                <label>Brand </label>
                                </td>
                                <td class="col-md-2">
                                <label>SKU  </label>
                                </td>
                                <td class="col-md-1">
                                <label>Quantité </label>
                                </td>
    
                                <td class="col-md-3">
                                <label>Prix  </label>
                                </td> 

                                <td class="col-md-3">
                                <label>Total  </label>
                                </td> 

                                </tr>
    

                                @foreach($orderItem as $item)
                                <tr>
                                <td class="col-md-1">
                                <label><img src="{{ asset($item->products->product_thumbnail) }}" style="width:50px; height:50px;" > </label>
                                </td>
                                <td class="col-md-2">
                                <label>{{ $item->products->product_name }}</label>
                                </td>
                                @if($item->brand_id == NULL)
                                <td class="col-md-2">
                                <label>Plancher Laurentides</label>
                                </td>
                                @else
                                <td class="col-md-2">
                                <label>{{ $item->products->brands->brand_name }} </label>
                                </td>
                                @endif
    
                                <td class="col-md-2">
                                <label>{{ $item->products->product_sku }} </label>
                                </td>
    
                                <td class="col-md-1">
                                <label>{{ $item->qty }} </label>
                                </td>
    
                                <td class="col-md-2">
                                <label>{{ $item->price }} $</label>
                                </td>
                                <td class="col-md-2">
                                <label>{{ $item->price * $item->qty }} $</label>
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
</div>

@endsection

