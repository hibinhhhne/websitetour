@extends('admin.share.master')
@section('title')
    Quản Lý Địa Điểm
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Địa Điểm
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Địa Điểm</label>
                        <input v-model="add.ten_dia_diem" v-on:keyup="toSlug(add.ten_dia_diem)" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slug Tên Địa Điểm</label>
                        <input v-model="add.slug" type="text" class="form-control">
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
                        <label>Thông Tin</label>
                        <input v-model="add.thong_tin" type="text" class="form-control">
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
                    <div id="holder" style="height:100%;"></div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="themMoi()">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách Địa Điểm
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Địa Điểm</th>
                                <th class="text-center">Slug Tên Địa Điểm</th>
                                <th class="text-center">ID Tỉnh Thành</th>
                                <th class="text-center">Thông Tin</th>
                                <th class="text-center">Hình Ảnh</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list">
                                <th>@{{ value.id }}</th>
                                <td>@{{ value.ten_dia_diem }}</td>
                                <td>@{{ value.slug }}</td>
                                <td>@{{ value.id_tinh_thanh}}</td>
                                <td>@{{ value.thong_tin}}</td>
                                <td class="text-center">
                                    <img v-bind:src="value.hinh_anh" class="img-thumbnail" style="height: 100%">
                                </td>
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
                                  <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Địa Điểm</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
{{--                                        <label>ID Địa Điểm</label>--}}
                                        <input v-model="edit.id_dia_diem" type="hidden" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Địa Điểm</label>
                                        <input v-model="edit.ten_dia_diem" v-on:keyup="toSlug(edit.ten_dia_diem)" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug Tên Địa Điểm</label>
                                        <input v-model="edit.slug" type="text" class="form-control">
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
                                        <label>Thông Tin</label>
                                        <input v-model="edit.thong_tin" type="text" class="form-control">
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
                                    <div id="edit_holder" style="height:100%;"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="capNhatDiaDiem()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Xóa Địa Điểm</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        Bạn có chắc chắn muốn xóa Địa Điểm : "@{{ del.ten_dia_diem }}" này không ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" v-on:click="xoaDiaDiem()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                    id_tinh_thanh: 0
                },
                list:   [],
                edit:   {},
                del:   {},
                list_tt             :   [],
            },
            created() {
                this.loadDiaDiem();
                this.loadTinhThanh();
            },
            methods : {
                click_edit(value) {
                    this.edit = value;
                    $("#edit_hinh_anh").val(value.hinh_anh);
                    $("#edit_holder").html('<img src="' + value.hinh_anh +'" style="max-height:300px;">');
                },
                loadTinhThanh() {
                    axios
                        .get('/admin/tinh-thanh/data')
                        .then((res) => {
                            this.list_tt = res.data.data;
                        });
                },
                themMoi() {
                    this.add.hinh_anh = $("#hinh_anh").val();
                    axios
                        .post('/admin/dia-diem/create', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success("Đã thêm mới thành công!");
                                this.loadDiaDiem();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadDiaDiem() {
                    axios
                        .get('/admin/dia-diem/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                capNhatDiaDiem() {
                    this.edit.hinh_anh = $("#edit_hinh_anh").val();
                    axios
                        .post('/admin/dia-diem/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã cập nhật thành công!");
                                this.loadDiaDiem();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaDiaDiem() {
                    axios
                        .post('/admin/dia-diem/delete', this.dele)
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success("Đã xóa thành công!");
                                this.loadDiaDiem();
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
                    this.edit.slug = str;
                },
            },
        });
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image', { prefix: '/laravel-filemanager' });
    </script>
@endsection
