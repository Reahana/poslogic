@extends('backEnd.layouts.master')
@section('title', 'Coupon Create')
@section('css')
    <link href="{{ asset('public/backEnd') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backEnd/')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backEnd') }}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet"
        type="text/css" />

@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('coupons.index') }}" class="btn btn-primary rounded-pill">Manage</a>
                    </div>
                    <h4 class="page-title">Coupon Create</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('coupon.store') }}" method="POST" class=row data-parsley-validate=""
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="coupon_code" class="form-label">Coupon Code *</label>
                                    <input name="coupon_code" rows="1" class="summernote form-control @error('coupon_code') is-invalid @enderror" required placeholder="Code..."></input>
                                    @error('coupon_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="discount_type" class="form-label">Discount Type *</label>
                                    <select class="form-control @error('discount_type') is-invalid @enderror"
                                        name="discount_type" value="{{ old('discount_type') }}"
                                        data-placeholder="Choose ..."required>
                                        <optgroup>
                                            {{-- <option value="">Select..</option> --}}
                                            <option value="fixed">Flat</option>
                                            <option value="percentage">Percent</option>
                                        </optgroup>
                                    </select>
                                    @error('discount_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="discount_amount" class="form-label">Discount Amount/Percent *</label>
                                    <input name="discount_amount" rows="1" class="summernote form-control @error('discount_amount') is-invalid @enderror" required placeholder="Discount..."></input>
                                    @error('discount_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" value="{{request()->get('start_date')}}"  class="form-control flatdate" name="start_date" placeholder="Select...">
                                </div>
                            </div> --}}
                            <!--col-sm-3--> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="end_date" class="form-label">Expire Date</label>
                                    <input type="date" value="{{request()->get('end_date')}}" class="form-control flatdate" name="end_date" placeholder="Select..." required>
                                </div>
                            </div>
                            

                            <!-- col end -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="status" class="d-block">Status</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="status" checked>
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
                            <div>
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>

                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('public/backEnd/') }}/assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/js/pages/form-advanced.init.js"></script>
    <script src="{{asset('public/backEnd/')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
    <!-- Plugins js -->
    <script src="{{ asset('public/backEnd/') }}/assets/libs//summernote/summernote-lite.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
        flatpickr(".flatdate", {});
    });
</script>
@endsection
