@extends('admin.share.master')
@section('title')
    Quản Lý Cấu Hình
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Thêm Mới Cấu Hình
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Slide</label>
                    <div class="input-group">
                        <input id="slide" class="form-control" type="text" name="filepath">
                        <span class="input-group-prepend">
                            <a id="lfm" data-input="slide" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>
                <div class="form-group">
                    <label>Hình Ảnh </label>
                    <div class="input-group">
                        <input id="images" class="form-control" type="text" name="filepath">
                        <span class="input-group-prepend">
                            <a id="lfm_images" data-input="images" data-preview="holder_images" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                    </div>
                    <div id="holder_images" style="margin-top:15px;max-height:100px;"></div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" id="createConfig">Cập Nhật</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image', {prefix: '/laravel-filemanager'});
    $('#lfm_images').filemanager('image', {prefix: '/laravel-filemanager'});
</script>
<script>
    $(document).ready(function() {
        $("#createConfig").click(function() {
            var payload = {
                'slide'     :   $("#slide").val(),
                'images'    :   $("#images").val(),
            };
            $.ajax({
                url     :   '/admin/cau-hinh',
                type    :   'post',
                data    :   payload,
                success :   function(res) {
                    if(res.status) {
                        // toastr.success("Đã Cập Nhật Thông Tin Thành Công!");//
                        loadData();
                    }
                },
                error   :   function(res) {
                    var errors = res.responseJSON.errors;
                    $.each(errors, function(k, v) {
                        // toastr.error(v[0]);
                    });
                },
            });

        });
        loadData();
        function loadData() {
            $.ajax({
                url     :   '/admin/cau-hinh/data',
                type    :   'get',
                success :   function(res) {
                    $("#slide").val(res.data.slide);
                    var a = res.data.slide.split(',');
                    var html_hinh_anh = '';
                    for(i = 0; i < a.length; i++) {
                        html_hinh_anh +=  '<img src="' + a[i] + '" style="height: 5rem;">';
                    }
                    $("#holder").html(html_hinh_anh);

                    $("#images").val(res.data.images);
                    var a = res.data.images.split(',');
                    var html_hinh_anh = '';
                    for(i = 0; i < a.length; i++) {
                        html_hinh_anh +=  '<img src="' + a[i] + '" style="height: 5rem;">';
                    }
                    $("#holder_images").html(html_hinh_anh);
                },
            });
        }
    });
</script>
@endsection
