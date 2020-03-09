   // Dropify
  $(".dropify").dropify();
  $("#status").bootstrapSwitch();
     $("#btn-save").click(function() {
       let redirect = $(this).data('redirect');
       $("#editProductForm").validate({
         submitHandler: function() {
           let action = $("#editProductForm").attr('action');
           let method = $("#editProductForm").attr('method');
           let form = document.querySelector("#editProductForm");
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
                   window.location.href=redirect;
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
     $(document).on('click', '#edit-stock', function() {
        //let form = $("#frm-edit-stock").serialize();
        let action = $("#frm-edit-stock").attr('action');
        let method = $("#frm-edit-stock").attr('method');
        let form = document.querySelector("#frm-edit-stock");
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

                  window.location.reload();
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

      });
  $(document).on("click",".btn-del-size",function() {
    let id = $(this).attr('data-id');
    Swal({
      title: 'Xác nhận xóa?',
      type: 'error',
      html: '<p>Bạn sắp xóa 1 size</p><p>Bạn có chắn chắn muốn xóa?</p>',
      showConfirmButton: true,
      confirmButtonText: '<i class="ti-check" style="margin-right:5px"></i>Đồng ý',
      confirmButtonColor: '#ef5350',
      cancelButtonText: '<i class="ti-close" style="margin-right:5px"></i> Hủy bỏ',
      showCancelButton: true,
      focusConfirm: false,
      reverseButtons: true
    }).then((result) => {
      if (result.value == true) {
        $.ajax({
          url: 'delete-size',
          type: 'POST',
          data: {id: id},
          dataType: 'JSON',
          headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
          },
          success: function(data) {
            //console.log(data);
            if(data.status == '_success') {
              Swal({
                title: data.msg,
                showCancelButton: false,
                showConfirmButton: false,
                type: 'success',
                timer: 2000
              }).then(() => {
                location.reload();
              });
            } else {
              Swal({
                title: data.msg,
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: 'OK',
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
              showConfirmButton: true,
              confirmButtonText: 'OK',
              type: 'error'
            });
          }
        });
      }
      return false;
    });
    return false;
  });