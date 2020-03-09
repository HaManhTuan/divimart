
          $("#btn-login").click(function() {
            $("#frm-login").validate({
                submitHandler: function() {
                    let action = $("#frm-login").attr('action');
                    let method = $("#frm-login").attr('method');
                    let formData = $("#frm-login").serialize();
                      $.ajax({
                        url: action,
                        type: method,
                        data: formData,
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                        },
                        success: function(data) {
                            //console.log(data);
                            if (data.status == '_success') {
                                $.notify(data.msg,"success");
                                window.location.href="admin/dashboard";
                            }
                            else{
                                $("#btn-login").notify(data.msg,"error");
                            }
                        },
                        error: function(err) {
                            //console.log(err);
                            $("#password").notify("Có lỗi xảy ra. Vui lòng thử lại","error");

                        }
                    });


                }
            });
    });
    