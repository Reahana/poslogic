@extends('backEnd.layouts.master') @section('title','Product Create') @section('css')
<style>
  .increment_btn,
  .remove_btn {
    margin-top: -17px;
    margin-bottom: 10px;
  }
</style>
<link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd')}}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
@endsection @section('content')
<div class="container-fluid">
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <a href="{{route('products.index')}}" class="btn btn-primary rounded-pill">Manage</a>
        </div>
        <h4 class="page-title">Product Create</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="{{route('products.store')}}" method="POST" class="row" data-parsley-validate="" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="name" class="form-label">Product Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" required="" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="category_id" class="form-label">Categories *</label>
                <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" id="category_id" required>
                  <option value="">Select..</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="subcategory_id" class="form-label">SubCategories (Optional)</label>
                <select class="form-control select2 @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id" data-placeholder="Choose ...">
                  <optgroup>
                    <option value="">Select..</option>
                  </optgroup>
                </select>
                @error('subcategory_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="childcategory_id" class="form-label">Child Categories (Optional)</label>
                <select class="form-control select2 @error('childcategory_id') is-invalid @enderror" id="childcategory_id" name="childcategory_id" data-placeholder="Choose ...">
                  <optgroup>
                    <option value="">Select..</option>
                  </optgroup>
                </select>
                @error('childcategory_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="category_id" class="form-label">Brands</label>
                <select class="form-control select2 @error('brand_id') is-invalid @enderror" value="{{ old('brand_id') }}" name="brand_id">
                  <option value="">Select..</option>
                  @foreach($brands as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
                @error('brand_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="purchase_price" class="form-label">Purchase Price *</label>
                <input type="text" class="form-control @error('purchase_price') is-invalid @enderror" name="purchase_price" value="{{ old('purchase_price') }}" id="purchase_price" required />
                @error('purchase_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="old_price" class="form-label">Old Price *</label>
                <input type="text" class="form-control @error('old_price') is-invalid @enderror" name="old_price" value="{{ old('old_price') }}" id="old_price" />
                @error('old_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="new_price" class="form-label">New Price *</label>
                <input type="text" class="form-control @error('new_price') is-invalid @enderror" name="new_price" value="{{ old('new_price') }}" id="new_price" required />
                @error('new_price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock *</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" id="stock" />
                @error('stock')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->

            {{--new--}}
            <div class="col-sm-12 mb-3">
              <label for="image">Image * <small class="text-muted">(Sort Order 0 = মূল ছবি)</small></label>
              <div class="clone hide" style="display: none;">
                <div class="control-group mb-2">
                  <div class="row">
                    <div class="col-sm-4"><input type="file" name="image[]" class="form-control" /></div>
                    <div class="col-sm-3"><input type="text" name="alt_text[]" class="form-control" placeholder="Alt text" /></div>
                    <div class="col-sm-3"><input type="text" name="image_title[]" class="form-control" placeholder="Image title" /></div>
                    <div class="col-sm-1"><input type="number" name="sort_order[]" class="form-control" value="1" min="0" /></div>
                    <div class="col-sm-1"><button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button></div>
                  </div>
                </div>
              </div>
              <div class="control-group increment mb-2">
                <div class="row">
                  <div class="col-sm-4">
                    <input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" />
                    @error('image')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                  <div class="col-sm-3"><input type="text" name="alt_text[]" class="form-control" placeholder="Alt text" /></div>
                  <div class="col-sm-3"><input type="text" name="image_title[]" class="form-control" placeholder="Image title" /></div>
                  <div class="col-sm-1"><input type="number" name="sort_order[]" class="form-control" value="0" min="0" /></div>
                  <div class="col-sm-1"><button class="btn btn-success btn-increment" type="button"><i class="fa fa-plus"></i></button></div>
                </div>
              </div>
            </div>
          {{--  previous --}}

            {{--<div class="col-sm-4 mb-3">--}}
              {{--<label for="image">Image *</label>--}}
              {{--<div class="clone hide" style="display: none;">--}}
                {{--<div class="control-group input-group">--}}
                  {{--<input type="file" name="image[]" class="form-control" />--}}
                  {{--<div class="input-group-btn">--}}
                    {{--<button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}
              {{--<div class="input-group control-group increment">--}}
                {{--<input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" />--}}
                {{--<div class="input-group-btn">--}}
                  {{--<button class="btn btn-success btn-increment" type="button"><i class="fa fa-plus"></i></button>--}}
                {{--</div>--}}
                {{--@error('image')--}}
                {{--<span class="invalid-feedback" role="alert">--}}
                  {{--<strong>{{ $message }}</strong>--}}
                {{--</span>--}}
                {{--@enderror--}}
              {{--</div>--}}
            {{--</div>--}}
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="pro_unit" class="form-label">Product Unit (Optional)</label>
                <input type="text" class="form-control @error('pro_unit') is-invalid @enderror" name="pro_unit" value="{{ old('pro_unit') }}" id="pro_unit" />
                @error('pro_unit')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="pro_video" class="form-label">Product Video (Optional)</label>
                <input type="text" class="form-control @error('pro_video') is-invalid @enderror" name="pro_unit" value="{{ old('pro_video') }}" id="pro_video" />
                @error('pro_video')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="roles" class="form-label">Size (Option)</label>
                <select class="form-control select2" name="proSize[]" multiple="multiple">
                  <option value="">Select</option>
                  @foreach($sizes as $size)
                  <option value="{{$size->id}}">{{$size->sizeName}}</option>
                  @endforeach
                </select>
                @error('sizes')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
             <!--col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="color" class="form-label">Color (Optional)</label>
                <select class="form-control select2" name="proColor[]" multiple="multiple">
                  <option value="">Select</option>
                  @foreach($colors as $color)
                  <option value="{{$color->id}}">{{$color->colorName}}</option>
                  @endforeach
                </select>
                @error('colors')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
             <!--col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="h1_title" class="form-label">H1 Title (Optional)</label>
                <input type="text" class="form-control @error('h1_title') is-invalid @enderror" name="h1_title" value="{{ old('h1_title') }}" id="h1_title" />
                @error('h1_title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="model_no" class="form-label">Model No</label>
                <input type="text" class="form-control @error('model_no') is-invalid @enderror" name="model_no" value="{{ old('model_no') }}" id="model_no" />
                @error('model_no')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="mpn" class="form-label">MPN</label>
                <input type="text" class="form-control @error('mpn') is-invalid @enderror" name="mpn" value="{{ old('mpn') }}" id="mpn" />
                @error('mpn')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="gtin" class="form-label">GTIN / Barcode</label>
                <input type="text" class="form-control @error('gtin') is-invalid @enderror" name="gtin" value="{{ old('gtin') }}" id="gtin" />
                @error('gtin')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="warranty" class="form-label">Warranty</label>
                <input type="text" class="form-control @error('warranty') is-invalid @enderror" name="warranty" value="{{ old('warranty') }}" id="warranty" placeholder="1 Year Service Warranty" />
                @error('warranty')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="availability_status" class="form-label">Availability</label>
                <select class="form-control @error('availability_status') is-invalid @enderror" name="availability_status" id="availability_status">
                  <option value="in_stock" {{ old('availability_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                  <option value="out_of_stock" {{ old('availability_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                  <option value="pre_order" {{ old('availability_status') == 'pre_order' ? 'selected' : '' }}>Pre Order</option>
                  <option value="on_request" {{ old('availability_status') == 'on_request' ? 'selected' : '' }}>On Request</option>
                </select>
                @error('availability_status')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="call_for_price" class="d-block">Call for Price</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="call_for_price" {{ old('call_for_price') ? 'checked' : '' }} />
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="delivery_info" class="form-label">Delivery Info</label>
                <input type="text" class="form-control @error('delivery_info') is-invalid @enderror" name="delivery_info" value="{{ old('delivery_info') }}" id="delivery_info" placeholder="ঢাকায় ২৪-৪৮ ঘণ্টা" />
                @error('delivery_info')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="installation_info" class="form-label">Installation Info</label>
                <input type="text" class="form-control @error('installation_info') is-invalid @enderror" name="installation_info" value="{{ old('installation_info') }}" id="installation_info" />
                @error('installation_info')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="service_info" class="form-label">Service Info</label>
                <input type="text" class="form-control @error('service_info') is-invalid @enderror" name="service_info" value="{{ old('service_info') }}" id="service_info" />
                @error('service_info')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="short_description" class="form-label">Short Description (২-৩ লাইন)</label>
                <textarea name="short_description" id="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
                @error('short_description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->


            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="description" class="form-label">Description *</label>
                <textarea name="description" rows="6" class="summernote form-control @error('description') is-invalid @enderror" required></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
               <!--col end -->
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="note" class="form-label">Note </label>
                <textarea name="note" rows="6" class=" form-control @error('note') is-invalid @enderror" ></textarea>
                @error('note')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-12"><hr><h5>SEO Settings</h5></div>
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" maxlength="191" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}" id="meta_title" />
                @error('meta_title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="focus_keyword" class="form-label">Focus Keyword</label>
                <input type="text" maxlength="150" class="form-control @error('focus_keyword') is-invalid @enderror" name="focus_keyword" value="{{ old('focus_keyword') }}" id="focus_keyword" placeholder="RH118 POS Terminal Bangladesh" />
                @error('focus_keyword')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="meta_description" class="form-label">Meta Description (১৫০-১৬০ অক্ষর)</label>
                <textarea name="meta_description" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6 mb-3">
              <div class="form-group">
                <label for="meta_keyword" class="form-label">Meta Keyword (Optional)</label>
                <textarea name="meta_keyword" id="meta_keyword" rows="3" class="form-control @error('meta_keyword') is-invalid @enderror">{{ old('meta_keyword') }}</textarea>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6 mb-3">
              <div class="form-group">
                <label for="secondary_keywords" class="form-label">Secondary Keywords</label>
                <textarea name="secondary_keywords" id="secondary_keywords" rows="3" class="form-control @error('secondary_keywords') is-invalid @enderror">{{ old('secondary_keywords') }}</textarea>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="meta_robots" class="form-label">Meta Robots</label>
                <input type="text" class="form-control @error('meta_robots') is-invalid @enderror" name="meta_robots" value="{{ old('meta_robots', 'index,follow') }}" id="meta_robots" />
                @error('meta_robots')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="canonical_url" class="form-label">Canonical URL (সাধারণত ফাঁকা)</label>
                <input type="text" class="form-control @error('canonical_url') is-invalid @enderror" name="canonical_url" value="{{ old('canonical_url') }}" id="canonical_url" />
                @error('canonical_url')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="og_image" class="form-label">OG Image (ফাঁকা থাকলে প্রথম ছবি)</label>
                <input type="text" class="form-control @error('og_image') is-invalid @enderror" name="og_image" value="{{ old('og_image') }}" id="og_image" />
                @error('og_image')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-3 mb-3">
              <div class="form-group mb-3">
                <label for="sold" class="form-label">Sold</label>
                <input type="text" class="form-control @error('sold') is-invalid @enderror" name="sold" value="{{ old('sold') }}" id="sold" />
                @error('sold')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="status" checked />
                  <span class="slider round"></span>
                </label>
                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="topsale" class="d-block">Hot Deals</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="topsale" />
                  <span class="slider round"></span>
                </label>
                @error('topsale')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->
             <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="flashsale" class="d-block">Flash Sales</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="flashsale" />
                  <span class="slider round"></span>
                </label>
                @error('flashsale')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div>
              <input type="submit" class="btn btn-success" value="Submit" />
            </div>
          </form>
        </div>
        <!-- end card-body-->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->
  </div>
</div>
@endsection @section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
<!-- Plugins js -->
<script src="{{asset('public/backEnd/')}}/assets/libs//summernote/summernote-lite.min.js"></script>
<script>
  $(".summernote").summernote({
    placeholder: "Enter Your Text Here",
  });
</script>
{{--new--}}
<script type="text/javascript">
  $(document).ready(function () {
    $(".btn-spec-add").click(function () {
      var html = $(".clone-spec").html();
      $(".spec-increment").after(html);
    });
    $("body").on("click", ".btn-spec-remove", function () {
      $(this).parents(".spec-row").remove();
    });
  });
</script>
{{--new end--}}
<script type="text/javascript">
  $(document).ready(function () {
    $(".btn-increment").click(function () {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function () {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".increment_btn").click(function () {
      var html = $(".clone_price").html();
      $(".increment_price").after(html);
    });
    $("body").on("click", ".remove_btn", function () {
      $(this).parents(".increment_control").remove();
    });

    $(".select2").select2();
  });

  // category to sub
  $("#category_id").on("change", function () {
    var ajaxId = $(this).val();
    if (ajaxId) {
      $.ajax({
        type: "GET",
        url: "{{url('ajax-product-subcategory')}}?category_id=" + ajaxId,
        success: function (res) {
          if (res) {
            $("#subcategory_id").empty();
            $("#subcategory_id").append('<option value="0">Choose...</option>');
            $.each(res, function (key, value) {
              $("#subcategory_id").append('<option value="' + key + '">' + value + "</option>");
            });
          } else {
            $("#subcategory_id").empty();
          }
        },
      });
    } else {
      $("#subcategory_id").empty();
    }
  });

  // subcategory to childcategory
  $("#subcategory_id").on("change", function () {
    var ajaxId = $(this).val();
    if (ajaxId) {
      $.ajax({
        type: "GET",
        url: "{{url('ajax-product-childcategory')}}?subcategory_id=" + ajaxId,
        success: function (res) {
          if (res) {
            $("#childcategory_id").empty();
            $("#childcategory_id").append('<option value="0">Choose...</option>');
            $.each(res, function (key, value) {
              $("#childcategory_id").append('<option value="' + key + '">' + value + "</option>");
            });
          } else {
            $("#childcategory_id").empty();
          }
        },
      });
    } else {
      $("#childcategory_id").empty();
    }
  });
</script>
@endsection
