@extends('admin.layouts.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Modification Mot de Passe</div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.profile.password.update') }}">
                            @csrf

                            @if (Session('status'))
                            <div class="alert alert-success" role=alert> 
                                {{ session('status') }}
                            </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger" role=alert>
                                {{ session('error') }}
                            </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ancien mot de passe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="old_password" class="form-control 
                                    @error('old_password') is-invalid @enderror" id="current_password" placeholder="Ancien mot de passe"/>

                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nouveau mot de passe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="new_password" class="form-control @error('old_password') is-invalid @enderror"
                                    id="new_password" placeholder="Nouveau mot de passe"/>

                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirmer mot de passe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" placeholder="Confirmer mot de passe"/>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Sauvegarder" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection