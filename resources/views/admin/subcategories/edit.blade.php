@extends('admin.layouts.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Sub Category</div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                        
                        <form id="myForm" method="post" action="{{ route('admin.subcategories.update') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $subcategories->id }}"/>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <select name="category_id" class="form-select mb-3">
                                        <option selected="">Selectionné une catégorie</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategories->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Sub Category Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategories->subcategory_name }}"/>
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
        $('#myForm').validate({
            rules: {
                subcategory_name: {
                    required : true,
                },
            },
            messages: {
                subcategory_name: {
                    required : 'Inscrire le nom de la category',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>




@endsection