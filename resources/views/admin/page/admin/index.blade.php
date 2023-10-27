@extends('admin.share.master')
@section('title')
    Quản Lý Admin
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Admin
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID </label>
                        <input v-model="add.id_admin" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Họ và Tên</label>
                        <input v-model="add.ho_va_ten"  type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="add.email" type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="add.password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input v-model="add.so_dien_thoai" type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input v-model="add.dia_chi" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh</label>
                        <input v-model="add.ngay_sinh" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <input v-model="add.gioi_tinh" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ID Quyền</label>
                        <input v-model="add.id_quyen" type="text" class="form-control">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="themMoi()">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách Admin
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Họ và Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số Điện Thoại</th>
                                <th class="text-center">Địa Chỉ</th>
                                <th class="text-center">Ngày Sinh</th>
                                <th class="text-center">Giới Tính</th>
                                <th class="text-center">ID Quyền</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_admin">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.id_admin }}</td>
                                    <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                    <td class="align-middle">@{{ value.email }}</td>
                                    <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                                    <td class="align-middle">@{{ value.dia_chi }}</td>
                                    <td class="align-middle">@{{ value.ngay_sinh }}</td>
                                    <td class="align-middle">@{{ value.gioi_tinh }}</td>
                                    <td class="align-middle">@{{ value.id_quyen }}</td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary" v-on:click="edit = value " data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                        <button class="btn btn-danger" v-on:click="del = value " data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                    </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Admin</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID </label>
                                            <input v-model="edit.id_admin" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Họ và Tên</label>
                                            <input v-model="edit.ho_va_ten"  type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input v-model="edit.email" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input v-model="edit.password" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Số Điện Thoại</label>
                                            <input v-model="edit.so_dien_thoai" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa Chỉ</label>
                                            <input v-model="edit.dia_chi" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Sinh</label>
                                            <input v-model="edit.ngay_sinh" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giới Tính</label>
                                            <input v-model="edit.gioi_tinh" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Quyền</label>
                                            <input v-model="edit.id_quyen" type="text" class="form-control">
                                        </div>
                                    </div>
                                        <div id="edit_holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatAdmin()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa Admin</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa Admin : "@{{ del.ho_va_ten }}"" này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaAdmin()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
            list_admin      :   [],
            add                 :   {},
            edit                :   {},
            del                 :   {},
        },
        created() {
            this.loadAdmin();
        },
        methods :   {
            loadAdmin(){
                axios
                    .get('/admin/admin/data')
                    .then((res) => {
                        this.list_admin = res.data.data;
                    });
            },
            themMoi(){
                axios
                    .post('/admin/admin/create', this.add)
                    .then((res) => {
                        if(res.data.status == true) {
                            // toastr.success("Đã thêm mới tour thành công!");toastr chưa dung
                            this.loadAdmin();
                        }
                    })
                    .catch((res) => {
                        var errors = res.response.data.errors;
                        $.each(errors, function(k, v) {
                            // toastr.error(v[0]);
                        });
                    });
            },
            capNhatAdmin(){
                axios
                    .post('/admin/admin/update', this.edit)
                    .then((res) => {
                        if(res.data.status == true) {
                            // toastr.success("Đã cập nhật tour thành công!");toastr chưa dung
                            this.loadAdmin();
                        }
                    })
                    .catch((res) => {
                        var errors = res.response.data.errors;
                        $.each(errors, function(k, v) {
                            // toastr.error(v[0]);
                        });
                    });
            },
            xoaAdmin(){
                axios
                    .post('/admin/admin/delete', this.del)
                    .then((res) => {
                        if(res.data.status == true) {
                            // toastr.success("Đã xóa tour thành công!");toastr chưa dung
                            this.loadAdmin();
                        }
                    })
                    .catch((res) => {
                        var errors = res.response.data.errors;
                        $.each(errors, function(k, v) {
                            // toastr.error(v[0]);
                        });
                    });
            },
        }
    });
    </script>
@endsection
