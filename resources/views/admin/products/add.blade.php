@extends('admin.layouts.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            
        <form id="myForm" method="post" action="{{ route('admin.products.save') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputProductTitle" name="product_name" placeholder="Enter product title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <input type="text" name="product_tags" class="form-control" data-role="tagsinput" value="hardwood,ceramic,vinyl,carpet">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Size</label>
                                    <input type="text" name="product_size" class="form-control" data-role="tagsinput" value="12x12,12x24,12x36,24x24,24x36">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <input type="text" name="product_color" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" id="inputProductDescription" name="product_short_description" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Long Description</label>
                                    <textarea id="mytextarea" name="product_long_description">Hello, World!</textarea> 
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Main Product Image</label>
                                    <input type="file" class="form-control" name="product_thumbnail" id="formFile" onchange="mainThumbUrl(this)">
                                    <img src="" id="mainThumb" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Images</label>
                                    <input type="file" class="form-control" name="multi_images[]" id="formFileMultiple" multiple="">
                                    <div class="row" id="previewImg">

                                        
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" name="product_notes" rows="2"></textarea>
                                </div>
                            </div>
                        </div> <!-- END BORDER -->

                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <h6 class="row-title">Product Information</h6>
                                    <span class="col-title">Product Brand</span>
                                    <div class="col-md-12"> 
                                        <select class="form-select mb-3" name="brand_id" aria-label="Product Brand">
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <span class="col-title">Product pricing</span>
                                        <div class="col-md-3"> 
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" name="product_price" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Cost</label>
                                            <input type="text" class="form-control" name="product_cost" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Discount</label>
                                            <input type="text" class="form-control"  name="product_discount" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Taxes</label>
                                            <select class="form-select" name="product_tax">
                                                <option></option>
                                                <option value="14.975">TPS/TVQ</option>
                                                <option value="5">TPS</option>
                                                <option value="9.975">TVQ</option>
                                                <option value="0">Zéro</option>
                                            </select>
                                        </div>
                                        <span class="col-title">Product Dimensions</span>
                                        <div class="col-md-3">
                                            <label class="form-label">Length</label>
                                            <input type="text" name="product_length" class="form-control"  placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Width</label>
                                            <input type="text" name="product_width" class="form-control"  placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Height</label>
                                            <input type="text" name="product_height" class="form-control"  placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Weigth</label>
                                            <input type="text" name="product_weight" class="form-control"  placeholder="00.00">
                                        </div>
                                        <span class="col-title">Product Details</span>
                                        <div class="col-md-5">
                                            <label class="form-label">SKU</label>
                                            <input type="text" name="product_sku" class="form-control"  placeholder="ABC000">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">QTY</label>
                                            <input type="text" name="product_qty" class="form-control"  placeholder="00">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Product Status</label>
                                            <select class="form-select" name="product_status">
                                                <option value="1">active</option>
                                                <option value="2">inactive </option>
                                                <option value="3">out of stock</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Product Measurement</label>
                                            <select class="form-select" name="product_measurement">
                                                <option></option>
                                                <option value="each">each</option>
                                                <option value="pi²">pi²</option>
                                                <option value="box">box</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Product Category</label>
                                            <select class="form-select" name="category_id">
                                                <option></option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Product SubCategory</label>
                                            <select class="form-select" name="subcategory_id">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="special_deal">
                                                <label class="form-check-label">Hot Deal</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="featured">
                                                <label class="form-check-label">Featured</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="special_offer">
                                                <label class="form-check-label">Special Offer</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <input type="submit" class="btn btn-primary" value="Sauvegarder"/>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div><!-- END BORDER -->
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </form><!--end form-->
        </div>
    </div>
</div>

<!-- Script for Main Thumbnail Image view upon upload -->

<script type="text/javascript">
    function mainThumbUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(100).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- script for Multi Image view upon Upload -->

<script type="text/javascript"> 

$(document).ready(function(){
$('#formFileMultiple').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        var data = $(this)[0].files; //this file data
        
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                .height(80); //create image element 
                    $('#previewImg').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
        
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
});
});

</script>

<!-- script for displaying subcategories related to the categories -->

<script>

$(document).ready(function(){
$('select[name=category_id]').on('change', function(){
    var category_id = $(this).val();
    if (category_id) {
        $.ajax({
            url: "{{ url('/admin/subcategories/ajax') }}/"+category_id,
            type: "GET",
            dataType:"json",
            success:function(data){
                $('select[name="subcategory_id"]').html('');
                var d =$('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){
                    $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                    });
                },
            });
        }
    });
});

</script>

<!-- script for required fields -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                },
            },
            messages: {
                product_name: {
                    required : 'Inscrire le nom du produit',
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