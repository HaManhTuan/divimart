$(document).ready(function() {
    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    $('#table-category').DataTable();

    var triggeredByChild = false;
    $(document).on('ifChecked', ".checkall input[type='checkbox']", function(event) {
        $('.checkbox-list input[type="checkbox"]').iCheck('check');
        triggeredByChild = false;
    });

    $(document).on('ifUnchecked', ".checkall input[type='checkbox']", function(event) {
        if (!triggeredByChild) {
            $(".checkbox-list input[type='checkbox']").iCheck('uncheck');
        }
        triggeredByChild = false;
    });

    // Removed the checked state from "All" if any checkbox is unchecked
    $(document).on('ifUnchecked', ".checkbox-list input[type='checkbox']", function(event) {
        triggeredByChild = true;
        $(".checkall input[type='checkbox']").iCheck('uncheck');
        var chkCheckLength = $(".checkbox-list input[type='checkbox']").filter(':checked').length;
        $("#btn-del-all > span").html(chkCheckLength);
        if (chkCheckLength > 0) {
            $("#btn-del-all").fadeIn(300);
        } else {
            $("#btn-del-all").hide();
        }
    });
    $(document).on('ifChecked', ".checkbox-list input[type='checkbox']", function(event) {
        if ($(".checkbox-list input[type='checkbox']").filter(':checked').length == $(".checkbox-list input[type='checkbox']").length) {
            $(".checkall input[type='checkbox']").iCheck('check');
        }
        var chkCheckLength = $(".checkbox-list input[type='checkbox']").filter(':checked').length;
        $("#btn-del-all > span").html(chkCheckLength);
        if (chkCheckLength > 0) {
            $("#btn-del-all").fadeIn(300);
        } else {
            $("#btn-del-all").hide();
        }

    });
});
//Thêm mới danh mục
$(document).on('click', '.btn-add-save', function() {
    $("#addCategoryForm").validate({
        submitHandler: function() {
            let action = $("#addCategoryForm").attr('action');
            let method = $("#addCategoryForm").attr('method');
            let formData = $("#addCategoryForm").serialize();
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
                    $("#add-category-modal").modal('hide');
                    if (data.status == '_success') {
                        Swal({
                            title: data.msg,
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: 'success',
                            timer: 2000
                        }).then(() => {
                            $("#addCategoryForm")[0].reset();
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
    });
});
//mở popup danh mục
$(document).on("click", ".btn-edit-category", function() {
    let id = $(this).attr('data-id');
    let action = $(this).attr('data-action');
    $.ajax({
        url: action,
        type: 'POST',
        data: { id: id },
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        },
        success: function(data) {
            $("#edit-category-modal .modal-body").html(data.body);
            $('[data-ajax="edit"]').html(data.category_name);
            $("#edit-category-modal #parent_id option[value='" + data.parent_id_data + "']").prop('selected', true);
            $('input[type="checkbox"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });
            $("#edit-category-modal").modal('show');
        },
        error: function(err) {
            console.log(err);
            Swal({
                title: "Error " + err.status,
                text: err.responseText,
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: 'OK',
                type: 'error'
            });
        }
    });
    return false;
});
//Sửa danh mục
$(document).on('click', ".btn-edit-save", function() {
    $("#editCategoryForm").validate({
        submitHandler: function() {
            let formData = $("#editCategoryForm").serialize();
            let action = $("#editCategoryForm").attr('action');
            let method = $("#editCategoryForm").attr('method');
            $.ajax({
                url: action,
                type: method,
                data: formData,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == '_success') {
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
    });
});
//Xóa all
$(document).on('click', "#btn-del-all", function() {
    let action = $(this).data('action');
    let id_array = new Array();
    let chkCheckLength = $(".checkbox-list input[type='checkbox']").filter(':checked').length;
    $(".checkbox-list input[type='checkbox']").filter(':checked').each(function() {
        let id = $(this).data('id');
        id_array.push(id);
    });
    let idStr = id_array.join(',');

    Swal({
        title: 'Xác nhận xóa?',
        type: 'error',
        html: '<p>Bạn sắp xóa ' + chkCheckLength + ' danh mục. Điều này là không thể đảo ngược.</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
                url: action,
                type: 'POST',
                data: { id: idStr, length: chkCheckLength },
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                },
                success: function(data) {
                    //console.log(data);
                    if (data.status == '_success') {
                        Swal({
                            title: data.msg,
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: 'success',
                            timer: 2000
                        }).then(() => {
                            $("#btn-del-all").hide();
                            $("input[type='checkbox']").prop('checked', false);
                            $.each(id_array, function(index, value) {
                                $("#dd-item-" + value).remove();
                                //console.log(value);
                            });
                            if ($("#table-category .tr").length == 0) {
                                location.reload();
                            }
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
//Xóa one
$(document).on("click", ".btn-del-cate", function() {
    let id = $(this).attr('data-id');
    let action = $(this).attr('data-action');
    Swal({
        title: 'Xác nhận xóa?',
        type: 'error',
        html: '<p>Bạn muốn xóa danh mục này</p><p>Bạn có chắn chắn muốn xóa?</p>',
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
                url: action,
                type: 'POST',
                data: { id: id, length: 1 },
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == '_success') {
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