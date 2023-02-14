@extends('admin.layouts.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-wrapper">
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Site Setting</div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                        <form method="post" action="{{ route('admin.settings.site.save') }}" enctype="multipart/form-data">
                        @csrf
                        
                            <input type="hidden" name="id" class="form-control" value="{{ $setting->id }}" />

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Téléphone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Courriel</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control" value="{{ $setting->email }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Copyright</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Adresse</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" class="form-control" value="{{ $setting->address }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Message</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="message" class="form-control" value="{{ $setting->messages }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Facebook</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Logo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="logo" class="form-control" id="image" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="showImage" src="{{ asset($setting->logo)   }}" alt="Plansher Laurentides LOGO" style="width:60px; height:60px;">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Sauvegarder" />
                                </div>
                            </div>

                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection