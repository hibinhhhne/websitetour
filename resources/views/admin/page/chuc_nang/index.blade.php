@extends('admin.share.master')
@section('title')
    Quản Lý Chức Năng
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Chức Năng
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID Chức Năng</label>
                        <input v-model="add.id_chuc_nang" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên Chức Năng</label>
                        <input v-model="add.ten_chuc_nang" v-on:keyup="toSlug(add.ten_chuc_nang)" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slug Chức Năng</label>
                        <input v-model="add.slug" type="text" class="form-control">
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
                    Danh Sách Chức Năng
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">ID </th>
                                <th class="text-center">Tên Chức Năng</th>
                                <th class="text-center">Slug Chức Năng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list">
                                <th>@{{ key + 1 }}</th>
                                <td>@{{ value.id_chuc_nang }}</td>
                                <td>@{{ value.ten_chuc_nang }}</td>
                                <td>@{{ value.slug}}</td>
                                <td class="text-center text-nowrap">
                                    <button class="btn btn-primary" v-on:click="click_edit(value)" data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                    <button class="btn btn-danger" v-on:click="dele = value" data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Chức Năng</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>ID Chức Năng</label>
                                        <input v-model="edit.id_chuc_nang" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Chức Năng</label>
                                        <input v-model="edit.ten_chuc_nang" v-on:keyup="toSlug(edit.ten_chuc_nang)" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug Chức Năng</label>
                                        <input v-model="edit.slug" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatChucNang()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa Chức Năng</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        Bạn có chắc chắn muốn xóa chức năng: "@{{ dele.ten_chuc_nang }}" này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaChucNang()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
            el  :   '#app',
            data:   {
                add :   {
                    slug     : '',
                },
                list:   [],
                edit:   {},
                dele:   {},
            },
            created() {
                this.loadChucNang();
            },
            methods : {
                click_edit(value) {
                    this.edit = value;

                },
                themMoi() {
                    axios
                        .post('/admin/chuc-nang/create', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã thêm mới thành công!");
                                this.loadChucNang();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                loadChucNang() {
                    axios
                        .get('/admin/chuc-nang/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                capNhatChucNang() {
                    axios
                        .post('/admin/chuc-nang/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã cập nhật thành công!");
                                this.loadChucNang();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaChucNang() {
                    axios
                        .post('/admin/chuc-nang/delete', this.dele)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã xóa thành công!");
                                this.loadChucNang();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                toSlug(str) {
                    str = str.toLowerCase();
                    str = str
                        .normalize('NFD')
                        .replace(/[\u0300-\u036f]/g, '');
                    str = str.replace(/[đĐ]/g, 'd');
                    str = str.replace(/([^0-9a-z-\s])/g, '');
                    str = str.replace(/(\s+)/g, '-');
                    str = str.replace(/-+/g, '-');
                    str = str.replace(/^-+|-+$/g, '');
                    this.add.slug = str;
                },
            },
        });
    </script>
@endsection
