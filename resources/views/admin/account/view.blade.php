@extends('layouts.admin.admin_layout')
@section('content')

    <style>
        .avatar-wrapper {
     position: relative;
     height: 100px;
     width: 100px;
     margin: 0px auto;
     border-radius: 50%;
     overflow: hidden;
     box-shadow: 1px 1px 15px -5px black;
     transition: all 0.3s ease;
}
 .avatar-wrapper:hover {
     transform: scale(1.05);
     cursor: pointer;
}
 .avatar-wrapper:hover .profile-pic {
     opacity: 0.5;
}
 .avatar-wrapper .profile-pic {
     height: 100%;
     width: 100%;
     transition: all 0.3s ease;
}
 .avatar-wrapper .profile-pic:after {
     font-family: FontAwesome;
     content: "\f007";
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     position: absolute;
     font-size: 190px;
     background: #ecf0f1;
     color: #34495e;
     text-align: center;
}
 .avatar-wrapper .upload-button {
     position: absolute;
     top: 0;
     left: 0;
     height: 100%;
     width: 100%;
}
 .avatar-wrapper .upload-button .fa-camera {
    position: absolute;
    font-size: 24px;
    top: 73px;
    left: 38px;
    text-align: center;
    opacity: 0;
    transition: all 0.3s ease;
    color: #34495e;
}
 .avatar-wrapper .upload-button:hover .fa-camera {
     opacity: 0.9;
}
    </style>
    <section class="content-header">
      <h1>
        Thông tin tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Thông tin tài khoản</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               <div class="avatar-wrapper">
                    <img class="profile-pic" src="{{ (trim($userLogin->avatar) != '' ? asset('public/'.$userLogin->avatar) : asset('images/no_avatar.jpg')) }}" />
                    <div class="upload-button">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                    </div>
                    <input class="file-upload" type="file" id="upload_image" name="upload_image" accept="image/*"/>
                </div>
              <h3 class="profile-username text-center">{{ $userLogin->name }}</h3>
              <p class="text-muted text-center">{{ $userLogin->type }}</p>
            <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#myModal" style="    transform: translate(50%, 0%);"><i class="fa fa-arrow-down"></i> Đổi mật khẩu</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bản thân</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Ngày sinh</strong>

              <p class="text-muted">
                {{ $userLogin->born }}
              </p>

              <hr>
              <strong><i class="fa fa-book margin-r-5"></i>Giới tính</strong>

              <p class="text-muted">
                {{ $userLogin->gender }}
              </p>

              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ</strong>

              <p class="text-muted">{{ $userLogin->address }}</p>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Chỉnh sửa thông tin</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
            <form class="form-horizontal" id="user-form" action="{{ url('admin/edit-account') }}" method="post" onsubmit="return false;">
                @csrf
                <input type="hidden" name="user_id" value="{{ $userLogin->id }}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="name" name="name" value="{{ $userLogin->name }}" placeholder="Nhập họ tên" data-rule-required="true" data-msg-required="Vui lòng nhập tên">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" value="{{ $userLogin->email }}" placeholder="Nhập email" data-rule-required="true" data-msg-required="Vui lòng nhập email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Ngày sinh</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="born" name="born" value="{{ $userLogin->born }}" placeholder="Nhập ngày sinh" data-rule-required="true" data-msg-required="Vui lòng nhập ngày sinh">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Giới tính</label>
                    <div class="col-sm-3">
                      <select name="gender" id="gender" class="form-control" data-rule-required="true" data-msg-required="Vui lòng chọn giới tính">
                          <option selected="" disabled="">---Chọn---</option>
                          <option value="Nam">Nam</option>
                          <option value="Nữ">Nữ</option>
                          option
                      </select>
                    </div>
                    <script>
                        $("#user-form select option[value='{{ $userLogin->gender }}']").prop("selected", true);
                    </script>
                    <label for="inputName" class="col-sm-2 control-label">Số điện thoại</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $userLogin->phone }}" placeholder="Nhập số điện thoại" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="4" id="address" name="address" placeholder="Nhập địa chỉ" data-rule-required="true" data-msg-required="Vui lòng nhập địa chỉ">{{ $userLogin->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" id="edit-user">Chỉnh sửa</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
        <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
        <div class="modal-dialog" style="width: 400px;">
            <form action="{{ url('admin/changePwd') }}" method="post" id="change-password-form" class="changepassword" role="form" onsubmit="return false;" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{ $userLogin->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Đổi mật khẩu</h4>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <label for="new-pwd">Mật khẩu mới</label>
                    <input type="password" id="new-pwd" name="newPwd" class="form-control" placeholder="Nhập mật khẩu mới" data-rule-required="true" data-msg-required="Vui lòng nhập mật khẩu mới" />
                </div>
                <div class="form-group">
                    <label for="retype-new-pwd">Nhập lại mật khẩu</label>
                    <input type="password" id="retype-new-pwd" name="retypeNewPwd" class="form-control" placeholder="Nhập lại mật khẩu" data-rule-required="true" data-msg-required="Vui lòng nhập lại mật khẩu" data-rule-equalto="#new-pwd" data-msg-equalto="Mật khẩu không khớp" />
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-new-pwd">Thay đổi</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div id="uploadimageModal" class="modal" role="dialog">
         <div class="modal-dialog" style="width: 380px;">
          <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thay đổi ảnh đại diện</h4>
                </div>
                <div class="modal-body">
                    <div id="image_demo" style="width:350px; margin-top:30px"></div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success crop_image">Thay đổi</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
             </div>
            </div>
        </div>
    <script src="{{ asset('public/admin/js/changepass.js') }}"></script>
    <script src="{{ asset('public/admin/js/edituser.js') }}"></script>
    <script>
        $(document).ready(function() {
             $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                  width:200,
                  height:200,
                  type:'circle' //square
                },
                boundary:{
                  width:300,
                  height:300
                }
              });
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function(){
                // readURL(this);
                var reader = new FileReader();
                reader.onload = function (event) {
                  $image_crop.croppie('bind', {
                    url: event.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });
            
            $(".upload-button").on('click', function() {
               $(".file-upload").click();
            });

            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                  type: 'canvas',
                  size: 'viewport'
                }).then(function(response){
                  $.ajax({
                    url:"{{ url('admin/change-avatar') }}",
                    type: 'POST',
                    data: {id: "{{$userLogin->id}}", old_avatar: "{{$userLogin->avatar}}", imageBase: response},
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    },
                    success:function(data)
                    {
                        console.log(data);
                        if (data.status == '_success') {
                            location.reload();
                        } else {
                            Swal({
                                title: data.msg,
                                showCancelButton: false,
                                type: 'error'
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        Swal({
                            title: 'Error ' + err.status,
                            text: err.responseText,
                            showCancelButton: false,
                            type: 'error'
                        });
                    }
                  });
                })
              });
        });
    </script>
@endsection