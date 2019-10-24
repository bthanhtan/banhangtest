function upload_Image() {
    console.log('asd');
    var content = '<div class="form-group" id="aaa">';
    content += '<label for="exampleInputEmail1">Image</label>';
    content += '<input type="file" class="form-control" id="Image" aria-describedby="emailHelp" name="image">';
    content += '</div>';
    $("#aaa").append(content);
}


//xử lý khi có sự kiện click
$('#upload').on('click', function() {
    //token
    var token = $('meta[name="csrf-token"]').attr('content');
    //Lấy ra files
    var file_data = $('#file').prop('files');
    var form_data = new FormData();
    form_data.append('_token', token);
    //thêm files vào trong form data
    //form_data.append('file', $("#file")[0].files);
    $.each(file_data, function(index, value) {
        //console.log(index + ": " + value.name);
        form_data.append('file[]', value);
    });
    var content_img = "";
    $.ajax({
        url: "http://weblocal.win/admin/category_product/uploadimage", // gửi đến file upload.php 
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {

            var danhsach_images = response;
            console.log(danhsach_images);
            $.each(danhsach_images, function(index, value) {
                console.log('test');
                console.log(value);
                content_img = '<div style="margin-bottom: 60px;" onclick="xoa_ajax_multi_Image(' + value + ')">';
                content_img += '<img src="http://weblocal.win/' + value + '" width="200">';
                content_img += '<div style="position: relative;right: 20px;display: inline-block;top: -80px;border: 1px solid;padding: 5px 10px;border-radius: 50%;">X</div>';
                content_img += '</div>';
                $('#them_img').append(content_img);
            });

            $('.status').text(response);
            $('#file').val('');

        }
    });
    return false;
});

function xoa_ajax_multi_Image() {
    console.log('link_image');
}


function upload_Image_change(this_input) {
    var data_file = this_input.files;
    // var file_data = $('#file').prop('files');
    var token = $('meta[name="csrf-token"]').attr('content');
    var form_data = new FormData();
    form_data.append('_token', token);
    $.each(data_file, function(index, value) {
        form_data.append('file[]', value);
    });
    var content_img = "";
    var status_img = "";
    $.ajax({
        url: "http://weblocal.win/admin/category_product/uploadimage", // gửi đến file upload.php 
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {

            var danhsach_images = response;
            console.log(danhsach_images);
            $.each(danhsach_images, function(index, value) {
                console.log('test');
                console.log(value);
                content_img = '<div style="margin-bottom: 60px;" onclick="xoa_ajax_multi_Image(' + value + ')">';
                content_img += '<img src="http://weblocal.win/' + value + '" width="200">';
                content_img += '<input type="text" value="' + value + '"/>';
                content_img += '<div style="position: relative;right: 20px;display: inline-block;top: -80px;border: 1px solid;padding: 5px 10px;border-radius: 50%;">X</div>';
                content_img += '</div>';
                status_img += value + '<br>';
                $('#them_img').append(content_img);

            });
            $('.name_img').append(status_img);
            // $('.status').append(status_img);
            // $('.status').append(value);
            // $('#file').val('');

        }
    });
    return false;
}