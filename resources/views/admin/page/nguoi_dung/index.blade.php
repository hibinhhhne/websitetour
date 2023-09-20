@extends('admin.share.master')
@section('title')
    Quản Lý Chi Tiết Phòng
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Chi Tiết Phòng
                </div>
                <div class="card-body">
                    <form id="form_create">
                        <div class="form-group">
                            <label>Mã Phòng</label>
                            <select id="id_phong" class="form-control">
                                {{-- @foreach ($phong as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->ma_phong }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Phòng</label>
                            <input id="ten_phong" type="text" class="form-control" placeholder="Nhập vào tên phòng">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả Phòng</label>
                            <textarea id="noi_that" cols="30" rows="10" class="form-control"><table style="width: 304px;" border="1" width="304">
                                <tbody>
                                <tr>
                                <td style="width: 59.8281px;"><strong>STT</strong></td>
                                <td style="width: 115.922px;"><strong>T&ecirc;n Đồ D&ugrave;ng</strong></td>
                                <td style="width: 106.25px;"><strong>Số Lượng</strong></td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">1</td>
                                <td style="width: 115.922px;">B&agrave;n L&agrave;</td>
                                <td style="width: 106.25px;">1</td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">2</td>
                                <td style="width: 115.922px;">Đ&egrave;n Ngủ</td>
                                <td style="width: 106.25px;">2</td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">3</td>
                                <td style="width: 115.922px;">M&aacute;y Sấy T&oacute;c</td>
                                <td style="width: 106.25px;">1</td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">4</td>
                                <td style="width: 115.922px;">K&eacute;t Sắt Mini</td>
                                <td style="width: 106.25px;">1</td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">5</td>
                                <td style="width: 115.922px;">&Aacute;o Tắm</td>
                                <td style="width: 106.25px;">2</td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">6</td>
                                <td style="width: 115.922px;">&Aacute;o Ngủ</td>
                                <td style="width: 106.25px;">2</td>
                                </tr>
                                <tr>
                                <td style="width: 59.8281px;">7</td>
                                <td style="width: 115.922px;">M&oacute;c &Aacute;o Quần</td>
                                <td style="width: 106.25px;">4</td>
                                </tr>
                                <tr>
                                    <td style="width: 59.8281px;">8</td>
                                    <td style="width: 115.922px;">Gi&#432;&#7901;ng</td>
                                    <td style="width: 106.25px;">2</td>
                                </tr>
                                </tbody>
                                </table>
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <button type="button" id="createChiTietPhong" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách Các Phòng Trong Khách Sạn
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th>STT</th>
                                    <th>Loại Phòng</th>
                                    <th>Tên Phòng</th>
                                    <th>Nội Thất</th>
                                    <th>Tình Trạng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa Chi Tiết Phòng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa chi tiết phòng này hay không?
                                            <input type="hidden" id="idDelete" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="sureDelete" type="button" class="btn btn-danger" data-dismiss="modal">Chắc Chắn!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Chi Tiết Phòng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="edit_id" class="form-control">
                                            <div class="form-group">
                                                <label>Mã Phòng</label>
                                                <select id="edit_id_phong" class="form-control">
                                                    {{-- @foreach ($phong as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->ma_phong }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên Phòng</label>
                                                <input id="edit_ten_phong" type="text" class="form-control" placeholder="Nhập vào tên phòng">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô Tả Phòng</label>
                                                <textarea id="edit_noi_that" name="edit_noi_that" cols="30" rows="10" class="form-control"><table style="width: 304px;" border="1" width="304"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="sureUpdate" type="button" class="btn btn-danger" data-dismiss="modal">Chắc Chắn!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
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
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('noi_that');
    CKEDITOR.replace('edit_noi_that');
</script>
<script>
//     $(document).ready(function() {
//         $("#createChiTietPhong").click(function() {
//             var payload = {
//                 'id_phong'  :   $("#id_phong").val(),
//                 'ten_phong' :   $("#ten_phong").val(),
//                 'noi_that'  :   CKEDITOR.instances['noi_that'].getData(),
//             };

//             $.ajax({
//                 url     :   '/admin/chi-tiet-phong/create',
//                 type    :   'post',
//                 data    :   payload,
//                 success :   function(res) {
//                     if(res.status) {
//                         toastr.success("Đã thêm mới chi tiết phòng thành công!");
//                         loadTable();
//                         $('#form_create').trigger("reset");
//                     } else {
//                         toastr.error("Mã phòng đã tồn tại!!!");
//                     }
//                 },
//                 error   :   function(res) {
//                     var errors = res.responseJSON.errors;
//                     $.each(errors, function(k, v) {
//                         toastr.error(v[0]);
//                     });
//                 },
//             });

//         });

//         loadTable();
//         function loadTable() {
//             $.ajax({
//                 url     :   '/admin/chi-tiet-phong/data',
//                 type    :   'get',
//                 success :   function(res) {
//                     var content = '';
//                     $.each(res.data, function(k, v) {
//                         content += '<tr>';
//                         content += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
//                         content += '<td class="text-center align-middle">'+ v.ma_phong +'</td>';
//                         content += '<td class="text-center align-middle">'+ v.ten_phong +'</td>';
//                         content += '<td class="text-center align-middle">'+ v.noi_that +'</td>';
//                         content += '<td class="text-center align-middle text-nowrap">';
//                         if(v.is_open) {
//                             content += '<button class="btn btn-success changeStatus" data-id="'+ v.id +'">Đang có thể bán</button>';
//                         } else {
//                             content += '<button class="btn btn-danger changeStatus" data-id="'+ v.id +'">Không thể bán</button>';
//                         }
//                         content += '</td>';
//                         content += '<td class="text-center align-middle text-nowrap">';
//                         content += '<button class="btn btn-primary mr-1 edit" data-id="'+ v.id +'" data-toggle="modal" data-target="#editModal">Edit</button>';
//                         content += '<button class="btn btn-danger delete" data-id="'+ v.id +'" data-toggle="modal" data-target="#deleteModal">Delete</button>';
//                         content += '</td>';
//                         content += '</tr>';
//                     });
//                     $("#table tbody").html(content);
//                 },
//             });
//         }

//         $("body").on('click', '.changeStatus', function() {
//             var payload = {
//                 'id'    : $(this).data('id'),
//             };

//             $.ajax({
//                 url     :   '/admin/chi-tiet-phong/changeStatus',
//                 type    :   'post',
//                 data    :   payload,
//                 success :   function(res) {
//                     if(res.status) {
//                         toastr.success("Đã đổi trạng thái thành công!");
//                         loadTable();
//                     }
//                 },
//                 error   :   function(res) {
//                     var errors = res.responseJSON.errors;
//                     $.each(errors, function(k, v) {
//                         toastr.error(v[0]);
//                     });
//                 },
//             });
//         });

//         $("body").on('click', '.delete', function() {
//             $("#idDelete").val($(this).data('id'));
//         });

//         $("body").on('click', '#sureDelete', function() {
//             var payload = {
//                 'id'    :   $("#idDelete").val(),
//             };

//             $.ajax({
//                 url     :   '/admin/chi-tiet-phong/delete',
//                 type    :   'post',
//                 data    :   payload,
//                 success :   function(res) {
//                     if(res.status) {
//                         toastr.success("Đã xóa chi tiết phòng thành công!");
//                         loadTable();
//                     }
//                 },
//                 error   :   function(res) {
//                     var errors = res.responseJSON.errors;
//                     $.each(errors, function(k, v) {
//                         toastr.error(v[0]);
//                     });
//                 },
//             });
//         });

//         $("body").on('click', '.edit', function() {
//             var payload = {
//                 'id'    :   $(this).data('id'),
//             };

//             $.ajax({
//                 url     :   '/admin/chi-tiet-phong/edit',
//                 type    :   'post',
//                 data    :   payload,
//                 success :   function(res) {
//                     $("#edit_id").val(res.data.id);
//                     $("#edit_id_phong").val(res.data.id_phong);
//                     $("#edit_ten_phong").val(res.data.ten_phong);
//                     CKEDITOR.instances['edit_noi_that'].setData(res.data.noi_that);
//                 },
//                 error   :   function(res) {
//                     var errors = res.responseJSON.errors;
//                     $.each(errors, function(k, v) {
//                         toastr.error(v[0]);
//                     });
//                 },
//             });
//         });

//         $("body").on('click', '#sureUpdate', function() {
//             var payload = {
//                 'id'        :   $("#edit_id").val(),
//                 'id_phong'  :   $("#edit_id_phong").val(),
//                 'ten_phong' :   $("#edit_ten_phong").val(),
//                 'noi_that'  :   CKEDITOR.instances['edit_noi_that'].getData(),
//             };

//             $.ajax({
//                 url     :   '/admin/chi-tiet-phong/update',
//                 type    :   'post',
//                 data    :   payload,
//                 success :   function(res) {
//                     if(res.status) {
//                         toastr.success("Đã cập nhật chi tiết phòng thành công!");
//                         loadTable();
//                     } else {
//                         toastr.error("Mã phòng đã tồn tại!!!");
//                     }
//                 },
//                 error   :   function(res) {
//                     var errors = res.responseJSON.errors;
//                     $.each(errors, function(k, v) {
//                         toastr.error(v[0]);
//                     });
//                 },
//             });
//         });
//     });
</script>
// @endsection
