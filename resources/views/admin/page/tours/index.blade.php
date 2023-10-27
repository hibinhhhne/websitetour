@extends('admin.share.master')
@section('title')
    Quản Lý Tours
@endsection
@section('content')
<div id="app" class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Thêm Mới Tours
            </div>
            <div class="card-body">
                <form id="form_create">
                    <div class="form-group">
                        <label>ID</label>
                        <input v-model="add.id_tour" type="text" class="form-control" placeholder="Nhập vào ID Tour">
                    </div>
                    <div class="form-group">
                        <label>Tên Tour</label>
                        <input v-model="add.ten_tour" type="text" class="form-control" placeholder="Nhập vào Tên Tour">
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea v-model="add.mo_ta" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Slug Tour</label>
                        <input v-model="add.slug" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ID Khách Sạn</label>
                        <input v-model="add.id_khach_san" type="text" class="form-control" placeholder="Nhập vào ID Khách Sạn" >
                    </div>
                    <div class="form-group">
                        <label>List Địa Điểm Tham Quan</label>
                        <textarea v-model="add.list_dia_diem_tham_quan" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>ID Phương Tiện</label>
                        <input v-model="add.id_phuong_tien" type="text" class="form-control" placeholder="Nhập vào ID Phương Tiện">
                    </div>
                    <div class="form-group">
                        <label>ID Tỉnh Thành</label>
                        <input v-model="add.id_tinh_thanh" type="text" class="form-control" placeholder="Nhập vào ID Tỉnh Thành">
                    </div>
                    <div class="form-group">
                        <label>Số Ngày</label>
                        <input v-model="add.so_ngay" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Đêm</label>
                        <input v-model="add.so_dem" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Người</label>
                        <input v-model="add.so_nguoi" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú</label>
                        <input v-model="add.ghi_chu" type="text" class="form-control" placeholder="Nhập vào Ghi Chú">
                    </div>
                    <div class="form-group">
                        <label>Đơn Giá</label>
                        <input v-model="add.don_gia" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <div class="input-group">
                            <input id="hinh_anh" class="form-control" type="text" name="filepath">
                            <span class="input-group-prepend">
                              <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                        </div>
                    </div>
                    <div id="holder" style="height: 100%;"></div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select v-model="add.trang_thai" class="form-control">
                            <option value="1">Còn Chỗ</option>
                            <option value="0">Hết Chỗ </option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-footer text-right">
                <button v-on:click="themMoi()" type="button" class="btn btn-primary">Thêm Mới</button>
            </div>
        </div>
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Tours
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tên Tour</th>
                                    <th class="text-center">Slug Tour</th>
                                    <th class="text-center">Mô Tả</th>
                                    <th class="text-center">ID Khách Sạn</th>
                                    <th class="text-center">Địa Điểm</th>
                                    <th class="text-center">ID Phương Tiện</th>
                                    <th class="text-center">ID Tỉnh Thành</th>
                                    <th class="text-center">Số Ngày</th>
                                    <th class="text-center">Số Đêm</th>
                                    <th class="text-center">Số Người</th>
                                    <th class="text-center">Ghi Chú</th>
                                    <th class="text-center">Đơn Giá</th>
                                    <th class="text-center">Hình Ảnh</th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="align-middle">@{{ value.id_tour }}</td>
                                        <td class="align-middle">@{{ value.ten_tour }}</td>
                                        <td class="align-middle">@{{ value.mo_ta }}</td>
                                        <td class="align-middle">@{{ value.slug }}</td>
                                        <td class="align-middle">@{{ value.id_khach_san }}</td>
                                        <td class="align-middle">@{{ value.list_dia_diem_tham_quan }}</td>
                                        <td class="align-middle">@{{ value.id_phuong_tien }}</td>
                                        <td class="align-middle">@{{ value.id_tinh_thanh }}</td>
                                        <td class="align-middle">@{{ value.so_ngay}}</td>
                                        <td class="align-middle">@{{ value.so_dem}}</td>
                                        <td class="align-middle">@{{ value.so_nguoi}}</td>
                                        <td class="align-middle">@{{ value.ghi_chu}}</td>
                                        <td class="align-middle">@{{ value.don_gia}}</td>
                                        <td class="text-center">
                                            <img v-bind:src="value.hinh_anh" class="img-thumbnail" style="height: 100%">
                                        </td>
                                        <td class="text-center text-nowrap">
                                            <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai == 1" class="btn btn-success">Còn Chỗ</button>
                                            <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Hết Chỗ</button>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button v-on:click="edit = value " data-toggle="modal" data-target="#editModal" class="btn btn-primary">Cập Nhật</button>
                                            <button v-on:click="del = value " data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Xóa</button>
                                        </td>
                                    </th>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Tour</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" v-model="edit.id" class="form-control">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input v-model="edit.id_tour" type="text" class="form-control" placeholder="Nhập vào ID Tour">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên Tour</label>
                                                <input v-model="edit.ten_tour" type="text" class="form-control" placeholder="Nhập vào Tên Tour">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô Tả</label>
                                                <textarea v-model="edit.mo_ta" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Slug Tour</label>
                                                <input v-model="edit.slug" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>ID Khách Sạn</label>
                                                <input v-model="edit.id_khach_san" type="text" class="form-control" placeholder="Nhập vào ID Khách Sạn" >
                                            </div>
                                            <div class="form-group">
                                                <label>List Địa Điểm Tham Quan</label>
                                                <input v-model="edit.list_dia_diem_tham_quan" type="text" class="form-control" placeholder="Nhập vào List Địa Điểm">
                                            </div>
                                            <div class="form-group">
                                                <label>ID Phương Tiện</label>
                                                <input v-model="edit.id_phuong_tien" type="text" class="form-control" placeholder="Nhập vào ID Phương Tiện">
                                            </div>
                                            <div class="form-group">
                                                <label>ID Tỉnh Thành</label>
                                                <input v-model="edit.id_tinh_thanh" type="text" class="form-control" placeholder="Nhập vào ID Tỉnh Thành">
                                            </div>
                                            <div class="form-group">
                                                <label>Số Ngày</label>
                                                <input v-model="edit.so_ngay" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Số Đêm</label>
                                                <input v-model="edit.so_dem" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Số Người</label>
                                                <input v-model="edit.so_nguoi" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ghi Chú</label>
                                                <input v-model="edit.ghi_chu" type="text" class="form-control" placeholder="Nhập vào Ghi Chú">
                                            </div>
                                            <div class="form-group">
                                                <label>Đơn Giá</label>
                                                <input v-model="edit.don_gia" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Hình Ảnh</label>
                                                <div class="input-group">
                                                    <input id="edit_hinh_anh" class="form-control" type="text" name="filepath">
                                                    <span class="input-group-prepend">
                                                      <a id="lfm" data-input="edit_hinh_anh" data-preview="edit_holder" class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                      </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="edit_holder" style="height: 100%;"></div>
                                            <div class="form-group">
                                                <label>Trạng Thái</label>
                                                <select v-model="edit.trang_thai" class="form-control">
                                                    <option value="1">Còn Chỗ</option>
                                                    <option value="0">Hết Chỗ</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                      <button v-on:click="capNhatTour()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Tour</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa tour " @{{ del.ten_tour }} " này hay không ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button v-on:click="xoaTour()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
        new Vue({
            el      :   '#app',
            data    :   {
                list            :   [],
                add             :   {},
                edit            :   {},
                del             :   {},
            },
            created() {
                this.loadTour();
            },
            methods :   {
                click_edit(value) {
                    this.edit = value;
                    $("#edit_hinh_anh").val(value.hinh_anh);
                    $("#edit_holder").html('<img src="' + value.hinh_anh +'" style="height: 100%;">');
                },
                loadTour() {
                    axios
                        .get('/admin/tour/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                themMoi()   {
                    this.add.hinh_anh = $("#hinh_anh").val();
                    axios
                        .post('/admin/tour/create', this.add)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã thêm mới tour thành công!");toastr chưa dung
                                this.loadTour();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                doiTrangThai(payload){
                    axios
                        .post('/admin/tour/change-status', payload )
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success('Đã thay đổi trạng thái thành công!');
                                this.loadTour();
                            }

                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                capNhatTour(){
                    this.edit.hinh_anh = $("#edit_hinh_anh").val();
                    axios
                        .post('/admin/tour/update', this.edit)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã cập nhật tour thành công!");toastr chưa dung
                                this.loadTour();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaTour(){
                    axios
                        .post('/admin/tour/delete', this.del)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã xóa tour thành công!");toastr chưa dung
                                this.loadTour();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
            },
        });
    </script>
     <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
     <script>
         $('#lfm').filemanager('image', { prefix: '/laravel-filemanager' });
     </script>

@endsection

