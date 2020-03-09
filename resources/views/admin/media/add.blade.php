@extends('layouts.admin.admin_layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/css/dropify.css')}}">
<div class="content">
        <h2 class="page-title">Thêm mới - <span class="fw-semi-bold">Slide</span></h2>
        <div class="row">
            <div class="col-md-12">
                <section class="box">
                    <div class="box-header">
                        <h4>
                            Thêm <span class="fw-semi-bold">Slide</span>
                        </h4>
                    </div>
                    <div class="box-body">
                        <form action="" method="POST" id="addSlideForm" action="{{ url('admin/media/add-media') }}" enctype='multipart/form-data' onsubmit="return false;">
                    		@csrf
                    		    <div class="form-group">
                                    <label id="email-label" for="email" class="control-label col-sm-2">Slide <span class="required">*</span><ul class="parsley-errors-list" id="parsley-id-2478"></ul></label>
                                    <div class="col-xs-12 col-sm-10">
                                        <input type="file" id="input-file-now" name="image" class="dropify" data-rule-required="true" data-msg-required="Vui lòng chọn slide.">
                                    </div>
                              </div>
                             <div class="form-group">
                             	<label id="email-label" for="email" class="control-label col-sm-2"> <span class="required">*</span><ul class="parsley-errors-list" id="parsley-id-2478"></ul></label>
                             	   <div class="col-xs-12 col-sm-8" style="margin-top: 15px;">
                                     <button type="submit" class="btn btn-primary" id="btn-save">Thêm</button>
                                    </div>
                                </div>
                    	</form>
                    </div>
                    </section>
                </div>
            </div>
        </div>
 <script src="{{ asset('public/admin/js/dropify.js') }}"></script>
        <script>
        		$(".dropify").dropify();
        $("#btn-save").click(function() {
            $("#addSlideForm").validate({
                submitHandler: function() {
                    let action = $("#addSlideForm").attr('action');
                    let method = $("#addSlideForm").attr('method');
                    let form = document.querySelector("#addSlideForm");
                    var formData = new FormData(form);
                    $.ajax({
                        url: action,
                        type: method,
                        processData: false,
                        contentType: false,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            console.log(data);
                           if (data.status == '_error') {
                                Swal({
                                    title: data.msg,
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK',
                                    type: 'error'
                                });
                            } else {
                                Swal({
                                    title: data.msg,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    confirmButtonText: 'OK',
                                    type: 'success',
                                    timer: 2000
                                }).then(() => {
                                    window.location.href = "{{ url('admin/media/view-media') }}";
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                            Swal({
                                title: 'Error ' + err.status,
                                text: err.responseText,
                                showCancelButton: false,
                                showConfirmButton: true,
                                confirmButtonText: 'OK',
                                type: 'error'
                            });
                        }
                    });
                  
                }
            });

        }); 
        </script>
@endsection