@extends('admin.share.master')
@section('title')
    Quản Lý Phương Tiện
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Phương Tiện
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Phương Tiện</label>
                        <input v-model="add.ten_phuong_tien" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Loại Phương Tiện</label>
                        <input v-model="add.loai_phuong_tien" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chỗ Ngồi</label>
                        <input v-model="add.cho_ngoi" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ID Tỉnh Thành</label>
                        <select v-model="add.id_tinh_thanh" class="form-control">
                            <option value="0">Chọn Tỉnh Thành</option>
                            <template v-for="(v,k) in list_tt">
                                <option v-bind:value="v.id">@{{v.ten_tinh_thanh}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select v-model="add.trang_thai" class="form-control">
                            <option value="1">Đã </option>
                            <option value="0">Chưa </option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="themMoi()">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách Phương Tiện
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Phương Tiện</th>
                                <th class="text-center">Loại Phương Tiện</th>
                                <th class="text-center">Chỗ Ngồi</th>
                                <th class="text-center">ID Tỉnh Thành</th>
                                <th class="text-center">Trạng Thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_phuongtien">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ value.ten_phuong_tien }}</td>
                                <td class="align-middle">@{{ value.loai_phuong_tien }}</td>
                                <td class="align-middle">@{{ value.cho_ngoi }}</td>
                                <td class="align-middle">@{{ value.id_tinh_thanh }}</td>
                                <td class="text-center text-nowrap">
                                    <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai == 1" class="btn btn-success">Đã </button>
                                    <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Chưa </button>
                                </td>
                                <td class="text-center text-nowrap">
                                    <button class="btn btn-primary" v-on:click="edit = value" data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                    <button class="btn btn-danger" v-on:click="del = value" data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Phương Tiện</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tên Phương Tiện</label>
                                            <input v-model="edit.ten_phuong_tien" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Loại Phương Tiện</label>
                                            <input v-model="edit.loai_phuong_tien" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Chỗ Ngồi</label>
                                            <input v-model="edit.cho_ngoi" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Tỉnh Thành</label>
                                            <select v-model="edit.id_tinh_thanh" class="form-control">
                                                <option value="0">Chọn Tỉnh Thành</option>
                                                <template v-for="(v,k) in list_tt">
                                                    <option v-bind:value="v.id">@{{v.ten_tinh_thanh}}</option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng Thái</label>
                                            <select v-model="edit.trang_thai" class="form-control">
                                                <option value="1">Đã </option>
                                                <option value="0">Chưa </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatPhuongTien()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa Phương Tiện</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa phương tiện: @{{ del.ten_phuong_tien }} này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaPhuongTien()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                list_phuongtien      :   [],
                add                 :   {
                    id_tinh_thanh: 0

                },
                edit                :   {},
                del                 :   {},
                list_tt             :   [],
            },
            created() {
                this.loadPhuongTien();
                this.loadTinhThanh();

            },
            methods :   {
                loadPhuongTien(){
                    axios
                        .get('/admin/phuong-tien/data')
                        .then((res) => {
                            this.list_phuongtien = res.data.data;
                        });
                },
                loadTinhThanh() {
                    axios
                        .get('/admin/tinh-thanh/data')
                        .then((res) => {
                            this.list_tt = res.data.data;
                        });
                },
                themMoi(){
                    axios
                        .post('/admin/phuong-tien/create', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadPhuongTien();
                            } else {
                                toastr.error(res.data.message);
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
                        .post('/admin/phuong-tien/change-status', payload )
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadPhuongTien();
                            } else {
                                toastr.error(res.data.message);
                            }

                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                capNhatPhuongTien(){
                    axios
                        .post('/admin/phuong-tien/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadPhuongTien();
                            } else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaPhuongTien(){
                    axios
                        .post('/admin/phuong-tien/delete', this.del)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadPhuongTien();
                            } else {
                                toastr.error(res.data.message);
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
