@extends('admin.share.master')
@section('title')
    Quản Lý Quyền
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Quyền
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID </label>
                        <input v-model="add.id_quyen" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên Quyền</label>
                        <input v-model="add.ten_quyen" v-on:keyup="slugAdd()" type="text" class="form-control" placeholder="Nhập Quyền">
                    </div>
                    <div class="form-group">
                        <label>Slug Quyền</label>
                        <input v-model="slug" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Danh Sách Chức Năng</label>
                        <textarea v-model="add.danh_sach_chuc_nang" class="form-control" cols="30" rows="5"></textarea>
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
                    Danh Sách Quyền
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Quyền</th>
                                <th class="text-center">Slug Quyền</th>
                                <th class="text-center">Danh Sách Chức Năng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_quyen">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.id_quyen }}</<td>
                                    <td class="align-middle">@{{ value.ten_quyen }}</td>
                                    <td class="align-middle">@{{ value.slug }}</td>
                                    <td class="align-middle">@{{ value.danh_sach_chuc_nang }}</td>
                                    <td class="text-center text-nowrap">
                                        <button class="btn btn-info" v-on:click="edit = value" data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                        <button class="btn btn-danger" v-on:click="del = value" data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                    </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-header">
                                        Thêm Mới Quyền
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>ID </label>
                                            <input v-model="edit.id_quyen" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên Quyền</label>
                                            <input v-model="edit.ten_quyen" v-on:keyup="slug_edit()" type="text" class="form-control" placeholder="Nhập Quyền">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug Quyền</label>
                                            <input v-model="edit.slug" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Danh Sách Chức Năng</label>
                                            <textarea v-model="edit.danh_sach_chuc_nang" class="form-control" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatQuyen()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa chức năng: @{{ del.ten_quyen }} này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaQuyen()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                list_quyen:   [],
                add       :   {},
                edit      :   {},
                del       :   {},
                slug      :   "",
            },
            created() {
                this.loadQuyen();
            },
            methods :   {
                toSlug(str) {
                    str = str.toLowerCase();
                    str = str
                        .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                        .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
                    str = str.replace(/[đĐ]/g, 'd');
                    str = str.replace(/([^0-9a-z-\s])/g, '');
                    str = str.replace(/(\s+)/g, '-');
                    str = str.replace(/-+/g, '-');
                    str = str.replace(/^-+|-+$/g, '');
                    return str;
                },
                slugAdd() {
                    this.slug = this.toSlug(this.add.ten_quyen);
                    this.add.slug = this.slug;
                },
                slug_edit() {
                    this.edit.slug = this.toSlug(this.edit.ten_quyen);
                },
                loadQuyen(){
                    axios
                        .get('/admin/quyen/data')
                        .then((res) => {
                            this.list_quyen = res.data.data;
                        });
                },
                themMoi(){
                    axios
                        .post('/admin/quyen/create', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadQuyen();
                                toastr.success(res.data.message);
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

                capNhatQuyen(){
                    axios
                        .post('/admin/quyen/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadQuyen();
                                toastr.success(res.data.message);
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
                xoaQuyen(){
                    axios
                        .post('/admin/quyen/delete', this.del)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadQuyen();
                                toastr.success(res.data.message);
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
