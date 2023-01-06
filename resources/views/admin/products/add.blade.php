@extends('admin.layouts.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
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
                                    <input type="file" class="form-control" id="productThumbnail" name="product_thumbnail" id="formFile">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Images</label>
                                    <input type="file" class="form-control" name="multi_images[]" id="formFileMultiple" multiple="">
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
                                            <option selected="">Select a brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <span class="col-title">Product pricing</span>
                                        <div class="col-md-3"> 
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" id="inputPrice" name="product_price" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Cost</label>
                                            <input type="text" class="form-control" id="inputCompareatprice" name="product_cost" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Discount</label>
                                            <input type="text" class="form-control" id="inputCostPerPrice" name="product_discount" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputProductType" class="form-label">Taxes</label>
                                            <select class="form-select" id="inputProductType" name="product_tax">
                                                <option></option>
                                                <option value="1">TPS/TVQ</option>
                                                <option value="2">TPS</option>
                                                <option value="3">Zéro</option>
                                            </select>
                                        </div>
                                        <span class="col-title">Product Dimensions</span>
                                        <div class="col-md-3">
                                            <label class="form-label">Length</label>
                                            <input type="text" name="product_length" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Width</label>
                                            <input type="text" name="product_width" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Height</label>
                                            <input type="text" name="product_height" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Weigth</label>
                                            <input type="text" name="product_weight" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                        </div>
                                        <span class="col-title">Product Details</span>
                                        <div class="col-md-5">
                                            <label class="form-label">SKU</label>
                                            <input type="text" class="form-control" id="inputCostPerPrice" placeholder="ABC000">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">QTY</label>
                                            <input type="text" class="form-control" id="inputCostPerPrice" placeholder="00">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputProductType" class="form-label">Measurement</label>
                                            <select class="form-select mb-3" name="category_id" aria-label="Product Categroy">
                
                                            </select>
                                        </div>
                                        <span class="col-title">Product Categories</span>
                                        <div class="col-6">
                                            <select class="form-select mb-3" name="category_id" aria-label="Product Categroy">
                                                <option selected="">Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select mb-3" name="subcategory_id" aria-label="Product SubCategroy">
                                                <option selected="">Subcategory</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-primary">Sauvegarder</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div><!-- END BORDER -->
                        </div>
                    </div>
                </div><!--end row-->
            </div><!--end form-->
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

<script>
    $(document).ready(function () {
        $('#image-uploadify').imageuploadify();
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },
            },
            messages: {
                category_name: {
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