@extends('admin.layouts.master')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tous les paramêtres du site</div>
            <div class="ps-3"></div> 
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped" width="100%">
                        <thead>  
                            <tr>
                                <th>Paramêtre</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><h5>Livraison</h5></td>
                                <td><h5>Permet de modifier les régions de livraison de votre boutique.</h5></td>
                                <td>
                                <a href="{{ route('admin.shipping.index') }}" class="btn btn-info" id="edit" title="Modifier la livraison"><i class="bx bx-location-plus"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><h5>F.A.Q</h5></td>
                                <td><h5>Gère la page de FAQ de votre boutique</h5></td>
                                <td>
                                <a href="{{ route('admin.faq.index') }}" class="btn btn-info" id="edit" title="Accéder aux paramêtres des F.A.Q"><i class="bx bx-info-circle"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><h5>Informations</h5></td>
                                <td><h5>Gère les informations de la boutique.</h5></td>
                                <td>
                                <a href="{{ route('admin.settings.site.index') }}" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-support"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td><h5>SEO</h5></td>
                                <td><h5>Gère les entrées SEO de vos pages.</h5></td>
                                <td>
                                <a href="#" class="btn btn-info" id="edit" title="Modifier l'entrée"><i class="bx bx-search"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Paramêtre</th>
                                <th>Description</th>
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

