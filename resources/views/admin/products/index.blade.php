@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
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
                                <th>discount</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td> <img src="{{ asset($item->product_thumbnail)  }}" style="width:60px; height:60px;"></td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>{{ $item->product_cost }}</td>
                                <td>
                                    @if($item->product_discount == NULL)
                                    <span class="badge bg-primary">no discount</span>
                                    @else
                                    @php
                                        $amount = $item->product_price - $item->product_discount;
                                        $discount = ($amount/$item->product_price) * 100;
                                    @endphp
                                    <span class="badge bg-primary">{{ round($discount) }}%</span>
                                    @endif
                                </td>
                                <td>{{ $item->product_qty }}</td>
                                <td> @if($item->product_status == 'active')
                                    <span class="badge bg-success">active</span>
                                    @elseif($item->product_status == 'out of stock')
                                    <span class="badge bg-warning">out of stock</span>
                                    @else
                                    <span class="badge  bg-danger">inactive</span>
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('admin.products.edit',$item->id) }}" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-edit"></i></a>
                                <a href="#" class="btn btn-danger" id="delete" title="Supprimer l'entrée"><i class="bx bx-trash"></i></a>
                                <a href="#" class="btn btn-secondary" id="delete" title="Voir le produit en détail"><i class="bx bx-detail"></i></a>

                                @if($item->product_status == 'active')
                                <a href="#" class="btn btn-warning" id="delete" title="Présentement ACTIF - Rendre le produit inactif"><i class="bx bx-dislike"></i></a>
                                @else
                                <a href="#" class="btn btn-success" id="delete" title="Présentement INACTIF/OUT OF STOCK - Rendre le produit actif"><i class="bx bx-like"></i></a>
                                @endif
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
                                <th>Discount</th>
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
</div>


@endsection

