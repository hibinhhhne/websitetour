@extends('admin.share.master')
@section('title')
    Quản Lý Khách Sạn
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Khách Sạn
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Khách Sạn</label>
                        <input v-model="add.ten_khach_san" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slug Tên Khách Sạn</label>
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
                        <textarea v-model="add.thong_tin" class="form-control" cols="30" rows="5"></textarea>
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
                    <div id="holder" style="height: 100% "></div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select v-model="add.trang_thai" class="form-control">
                            <option value="1">Còn Phòng</option>
                            <option value="0">Hết Phòng</option>
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
                    Danh Sách Khách Sạn
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Khách Sạn</th>
                                <th class="text-center">Slug Tên Khách Sạn</th>
                                <th class="text-center">ID Tỉnh Thành</th>
                                <th class="text-center">Thông Tin</th>
                                <th class="text-center">Hình Ảnh</th>
                                <th class="text-center">Trạng Thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(value, key) in list_khachsan">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ value.ten_khach_san }}</td>
                                <td class="align-middle">@{{ value.slug }}</td>
                                <td class="align-middle">@{{ value.id_tinh_thanh }}</td>
                                <td class="align-middle">@{{ value.thong_tin }}</td>
                                <td class="text-center">
                                    <img v-bind:src="value.hinh_anh" class="img-thumbnail" style="height: 200%">
                                </td>
                                <td class="text-center text-nowrap">
                                    <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai == 1"
                                            class="btn btn-success">Còn Phòng
                                    </button>
                                    <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Hết Phòng
                                    </button>
                                </td>
                                <td class="text-center text-nowrap">
                                    <button class="btn btn-info" v-on:click="click_edit(value)" data-toggle="modal"
                                            data-target="#editModal">Cập Nhật
                                    </button>
                                    <button class="btn btn-danger" v-on:click="dele = value" data-toggle="modal"
                                            data-target="#deleteModal">Xóa
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Khách Sạn</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tên Khách Sạn</label>
                                                    <input v-model="edit.ten_khach_san" type="text"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Slug Tên Khách Sạn</label>
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
                                                    <textarea v-model="edit.thong_tin" class="form-control" cols="30"
                                                              rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hình Ảnh</label>
                                                    <div class="input-group">
                                                        <input id="edit_hinh_anh" class="form-control" type="text"
                                                               name="filepath">
                                                        <span class="input-group-prepend">
                                                  <a id="lfm" data-input="edit_hinh_anh" data-preview="edit_holder"
                                                     class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                                </span>
                                                    </div>
                                                </div>
                                                <div id="edit_holder" style="height: 100% "></div>
                                                <div class="form-group">
                                                    <label>Trạng Thái</label>
                                                    <select v-model="edit.trang_thai" class="form-control">
                                                        <option value="1">Còn Phòng</option>
                                                        <option value="0">Hết Phòng</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button v-on:click="click_update()" class="btn btn-primary" data-dismiss="modal">Cập
                                                Nhật

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa Khách Sạn</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa chức năng: @{{ del.ten_khach_san }} này không
                                                ?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="button" v-on:click="xoaKhachSan()" class="btn btn-danger"
                                                    data-dismiss="modal">Xóa
                                            </button>
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
            el: '#app',
            data: {
                list_khachsan: [],
                add: {
                    id_tinh_thanh: 0
                },
                edit: {},
                del: {},
                list_tt: [],

            },
            created() {
                this.loadKhachSan();
                this.loadTinhThanh();
            },
            methods: {
                click_edit(value) {
                    this.edit = value;
                    $("#edit_hinh_anh").val(value.hinh_anh);
                    $("#edit_holder").html('<img src="' + value.hinh_anh + '" style="max-height:300px;">');
                },
                loadKhachSan() {
                    axios
                        .get('/admin/khach-san/data')
                        .then((res) => {
                            this.list_khachsan = res.data.data;
                        });
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
                        .post('/admin/khach-san/create', this.add)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã thêm mới tour thành công!");toastr chưa dung
                                this.loadKhachSan();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function (k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                doiTrangThai(payload) {
                    axios
                        .post('/admin/khach-san/change-status', payload)
                        .then((res) => {
                            if (res.data.status) {
                                // toastr.success('Đã thay đổi trạng thái thành công!');
                                this.loadKhachSan();
                            }

                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function (k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                click_update() {
                    this.edit.hinh_anh = $("#edit_hinh_anh").val();
                    axios
                        .post('/admin/khach-san/update_data', this.edit)
                        .then((res) => {
                            console.log(res)

                            if (res.data.status == true) {
                                console.log(1)
                                toastr.success("Đã cập nhật khách sạn thành công!");
                                this.loadKhachSan();
                            }
                        })
                        .catch((res) => {
                            console.log(res)

                            var errors = res.response.data.errors;
                            $.each(errors, function (k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaKhachSan() {
                    axios
                        .post('/admin/khach-san/delete', this.del)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã xóa tour thành công!");toastr chưa dung
                                this.loadKhachSan();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function (k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
            }
        });
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image', {prefix: '/laravel-filemanager'});
    </script>
@endsection
