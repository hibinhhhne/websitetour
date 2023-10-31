@extends('admin.share.master')
@section('title')
    Quản Lý Tỉnh Thành
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Tỉnh Thành
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Tỉnh Thành</label>
                        <input v-model="add.ten_tinh_thanh" v-on:keyup="toSlug(add.ten_tinh_thanh)" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slug Tỉnh Thành</label>
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
                    Danh Sách Tỉnh Thành
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Tỉnh Thành</th>
                                <th class="text-center">Slug Tỉnh Thành</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list">
                                <th>@{{ key + 1 }}</th>
                                <td>@{{ value.ten_tinh_thanh }}</td>
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
                                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Tỉnh Thành</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên Tỉnh Thành</label>
                                        <input v-model="edit.ten_tinh_thanh" v-on:keyup="toSlug(edit.ten_tinh_thanh)" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug Tỉnh Thành</label>
                                        <input v-model="edit.slug" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatTinhThanh()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa Tỉnh Thành</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        Bạn có chắc chắn muốn xóa Tỉnh Thành : "@{{ dele.ten_tinh_thanh }}" này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaTinhThanh()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                this.loadTinhThanh();
            },
            methods : {
                click_edit(value) {
                    this.edit = value;

                },
                themMoi() {
                    axios
                        .post('/admin/tinh-thanh/create', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã thêm mới thành công!");
                                this.loadTinhThanh();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                loadTinhThanh() {
                    axios
                        .get('/admin/tinh-thanh/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                capNhatTinhThanh() {
                    axios
                        .post('/admin/tinh-thanh/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã cập nhật thành công!");
                                this.loadTinhThanh();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaTinhThanh() {
                    axios
                        .post('/admin/tinh-thanh/delete', this.dele)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã xóa thành công!");
                                this.loadTinhThanh();
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
