@extends('admin.share.master')
@section('title')
    Quản Lý Quốc Tịch
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Quốc Tịch
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Quốc Tịch</label>
                        <input v-model="add.ten_quoc_tich" v-on:keyup="slugAdd()" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slug Quốc Tịch</label>
                        <input v-model="slug" type="text" class="form-control">
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
                    Danh Sách Quốc Tịch
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Quốc Tịch</th>
                                <th class="text-center">Slug Quốc Tịch</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list">
                                <th>@{{ key + 1 }}</th>
                                <td>@{{ value.ten_quoc_tich }}</td>
                                <td>@{{ value.slug}}</td>
                                <td class="text-center text-nowrap">
                                    <button class="btn btn-primary" v-on:click="edit = value" data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                    <button class="btn btn-danger" v-on:click="dele = value" data-toggle="modal" data-target="#deleteModal">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Quốc Tịch</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên Quốc Tịch</label>
                                        <input v-model="edit.ten_quoc_tich" v-on:keyup="slug_edit()" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug Quốc Tịch</label>
                                        <input v-model="edit.slug" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatQuocTich()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa Quốc Tịch</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        Bạn có chắc chắn muốn xóa Quốc Tịch : "@{{ dele.ten_quoc_tich }}" này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaQuocTich()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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

                },
                list:   [],
                edit:   {},
                dele:   {},
                slug     : '',
            },
            created() {
                this.loadQuocTich();
            },
            methods : {
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
                    this.slug = this.toSlug(this.add.ten_quoc_tich);
                    this.add.slug = this.slug;
                },
                slug_edit() {
                    this.edit.slug = this.toSlug(this.edit.ten_quoc_tich);
                },
                themMoi() {
                    axios
                        .post('/admin/quoc-tich/create', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadQuocTich();
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
                loadQuocTich() {
                    axios
                        .get('/admin/quoc-tich/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                capNhatQuocTich() {
                    axios
                        .post('/admin/quoc-tich/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadQuocTich();
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
                xoaQuocTich() {
                    axios
                        .post('/admin/quoc-tich/delete', this.dele)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadQuocTich();
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
            },
        });
    </script>
@endsection
