@extends('admin.share.master')
@section('title')
    Quản Lý Tài Khoản
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Tài Khoản
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input v-model="add.id_tai_khoan" type="text" class="form-control" placeholder="Nhập vào ID">
                    </div>
                    <div class="form-group">
                        <label>Tên Tài Khoản</label>
                        <input v-model="add.ten_tai_khoan" type="text" class="form-control" placeholder="Nhập vào Tên Tài Khoản">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="add.password" type="password" class="form-control" placeholder="Nhập vào Password">
                    </div>
                    <div class="form-group">
                        <label>Họ và Tên</label>
                        <input v-model="add.ho_va_ten" type="text" class="form-control" placeholder="Nhập vào Họ và Tên">
                    </div>
                    <div class="form-group">
                        <label>ID Quyền</label>
                        <input v-model="add.id_quyen" type="text" class="form-control" placeholder="Nhập vào ID Quyền">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button v-on:click="themMoi()" type="button" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Tài Khoản
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tên Tài Khoản</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Họ và Tên</th>
                                    <th class="text-center">ID Quyền</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_taikhoan">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="align-middle">@{{ value.id_tai_khoan }}</td>
                                        <td class="align-middle">@{{ value.ten_tai_khoan }}</td>
                                        <td class="align-middle">@{{ value.password }}</td>
                                        <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                        <td class="align-middle">@{{ value.id_quyen }}</td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-primary" v-on:click="edit = value " data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                            <button class="btn btn-danger" v-on:click="del = value " data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                        </td>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Tài Khoản</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <input type="hidden" id="edit_id" class="form-control">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input v-model="edit.id_tai_khoan" type="text" class="form-control" placeholder="Nhập vào ID">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên Tài Khoản</label>
                                            <input v-model="edit.ten_tai_khoan" type="text" class="form-control" placeholder="Nhập vào Tên Tài Khoản">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input v-model="edit.password" type="password" class="form-control" placeholder="Nhập vào Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Họ và Tên</label>
                                            <input v-model="edit.ho_va_ten" type="text" class="form-control" placeholder="Nhập vào Họ và Tên">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Quyền</label>
                                            <input v-model="edit.id_quyen" type="text" class="form-control" placeholder="Nhập vào ID Quyền">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                      <button v-on:click="capNhatTaiKhoan()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Tài Khoản</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa Tài Khoản : " @{{ del.ten_tai_khoan }} " này không ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button v-on:click="xoaTaiKhoan()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                list_taikhoan        :   [],
                add                 :   {},
                edit                :   {},
                del                 :   {},
            },
            created() {
                this.loadTaiKhoan();
            },
            methods :   {
                loadTaiKhoan(){
                    axios
                        .get('/admin/tai-khoan/data')
                        .then((res) => {
                            this.list_taikhoan = res.data.data;
                        });
                },
                themMoi(){
                    axios
                        .post('/admin/tai-khoan/create', this.add)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã thêm mới tour thành công!");toastr chưa dung
                                this.loadTaiKhoan();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                capNhatTaiKhoan(){
                    axios
                        .post('/admin/tai-khoan/update', this.edit)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã cập nhật tour thành công!");toastr chưa dung
                                this.loadTaiKhoan();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaTaiKhoan(){
                    axios
                        .post('/admin/tai-khoan/delete', this.del)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã xóa tour thành công!");toastr chưa dung
                                this.loadTaiKhoan();
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

@endsection
