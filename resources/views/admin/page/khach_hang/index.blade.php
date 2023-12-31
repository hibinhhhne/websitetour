@extends('admin.share.master')
@section('title')
    Quản Lý Khách Hàng
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Khách Hàng
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Họ và Tên</label>
                        <input v-model="add.ho_va_ten" type="text" class="form-control" placeholder="Nhập vào Họ và Tên">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="add.email" type="email" class="form-control" placeholder="Nhập vào Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="add.password" type="password" class="form-control" placeholder="Nhập vào Password">
                    </div>

                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input v-model="add.so_dien_thoai" type="tel" class="form-control" placeholder="Nhập vào SĐT">
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input v-model="add.dia_chi" type="text" class="form-control" placeholder="Nhập vào Địa Chỉ ">
                    </div>
                    <div class="form-group">
                        <label>Quốc Tịch</label>
                        <select v-model="add.quoc_tich" class="form-control">
                            <option value="0">Chọn Quốc Tịch</option>
                            <template v-for="(v,k) in list_qt">
                                <option v-bind:value="v.id">@{{v.ten_quoc_tich}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh</label>
                        <input v-model="add.ngay_sinh" type="date" class="form-control" placeholder="Nhập vào Ngày Sinh">
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <select v-model="add.gioi_tinh" class="form-control">
                            <option value="">Chọn Giới Tinh</option>
                            <option value="1">Nam</option>
                            <option value="0">Nũ</option>
                            <option value="2">Khác</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tài Khoản</label>
                        <select v-model="add.loai_tai_khoan" class="form-control">
                            <option value="">Chọn Loại Tài Khoản</option>
                            <option value="1">Khách Hàng Mới</option>
                            <option value="0">Khách Hàng Thân Thiết</option>
                        </select>
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
                    Danh Sách Khách Hàng
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Họ và Tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số Điện Thoại</th>
                                    <th class="text-center">Địa Chỉ</th>
                                    <th class="text-center">Quốc Tịch</th>
                                    <th class="text-center">Ngày Sinh</th>
                                    <th class="text-center">Giới Tính</th>
                                    <th class="text-center">Loại Tài Khoản</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                    <td class="align-middle">@{{ value.email }}</td>
                                    <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                                    <td class="align-middle">@{{ value.dia_chi }}</td>
                                    <td class="align-middle">@{{ value.quoc_tich }}</td>
                                    <td class="align-middle text-nowrap">@{{ value.ngay_sinh }}</td>
                                    <td class="align-middle">
                                        <template v-if="value.gioi_tinh == 1">
                                            Nam
                                        </template>
                                        <template v-if="value.gioi_tinh == 0">
                                            Nữ
                                        </template>
                                        <template v-else>
                                            Khác
                                        </template>
                                    </td>
                                    <td class="text-center text-nowrap ">
                                        <button v-on:click="doiTrangThai(value)" v-if="value.loai_tai_khoan == 1"
                                            class="btn btn-success">Khách Hàng Mới</button>
                                        <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Khách Hàng
                                            Thân Thiết</button>
                                    </td>
                                    <td class="align-middle text-center text-nowrap">
                                        <button class="btn btn-primary" v-on:click="edit = value " data-toggle="modal"
                                            data-target="#editModal">Cập Nhật</button>
                                        <button class="btn btn-danger" v-on:click="del = value " data-toggle="modal"
                                            data-target="#deleteModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Họ và Tên</label>
                                        <input v-model="edit.ho_va_ten" type="text" class="form-control"
                                            placeholder="Nhập vào ID">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input v-model="edit.email" type="email" class="form-control"
                                            placeholder="Nhập vào ID">
                                    </div>
                                    <div class="form-group">
                                        <label>Số Điện Thoại</label>
                                        <input v-model="edit.so_dien_thoai" type="tel" class="form-control"
                                            placeholder="Nhập vào bình luận">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa Chỉ</label>
                                        <input v-model="edit.dia_chi" type="text" class="form-control"
                                            placeholder="Nhập vào bình luận">
                                    </div>
                                    <div class="form-group">
                                        <label>Quốc Tịch</label>
                                        <select v-model="edit.quoc_tich" class="form-control">
                                            <option value="0">Chọn Quốc Tịch</option>
                                            <template v-for="(v,k) in list_qt">
                                                <option v-bind:value="v.id">@{{v.ten_quoc_tich}}</option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Sinh</label>
                                        <input v-model="edit.ngay_sinh" type="date" class="form-control"
                                            placeholder="Nhập vào bình luận">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input v-model="edit.email" type="email" class="form-control"
                                            placeholder="Nhập vào ID">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input v-model="edit.password" type="password" class="form-control"
                                            placeholder="Nhập vào bình luận">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa Chỉ</label>
                                        <input v-model="edit.dia_chi" type="text" class="form-control"
                                            placeholder="Nhập vào bình luận">
                                    </div>

                                    <div class="form-group">
                                        <label>Ngày Sinh</label>
                                        <input v-model="edit.ngay_sinh" type="date" class="form-control"
                                            placeholder="Nhập vào bình luận">
                                    </div>
                                    <div class="form-group">
                                        <label>Giới Tính</label>
                                        <select v-model="edit.gioi_tinh" class="form-control">
                                            <option value="">Chọn Giới Tinh</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                            <option value="2">Khác</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Loại Tài Khoản</label>
                                        <select v-model="edit.loai_tai_khoan" class="form-control">
                                            <option value="">Chọn Loại Tài Khoản</option>
                                            <option value="1">Khách Hàng Mới</option>
                                            <option value="0">Khách Hàng Thân Thiết</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Đóng</button>
                                    <button v-on:click="capNhatKhachHang()" class="btn btn-primary"
                                        data-dismiss="modal">Cập Nhật</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa khách hàng " @{{ del.ho_va_ten }} " này hay không ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button v-on:click="xoaKhachHang()" class="btn btn-danger"
                                        data-dismiss="modal">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                list: [],
                add: {
                    loai_tai_khoan: '',
                    gioi_tinh: '',
                    quoc_tich: 0,

                },
                edit: {},
                del: {},
                list_qt: []
            },
            created() {
                this.loadKhachHang();
                this.loadQuocTich();
            },
            methods: {
                loadKhachHang() {
                    axios
                        .get('/admin/khach-hang/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                loadQuocTich() {
                    axios
                        .get('/admin/quoc-tich/data')
                        .then((res) => {
                            this.list_qt = res.data.data;
                        });
                },
                themMoi() {
                    axios
                        .post('/admin/khach-hang/create', this.add)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã thêm mới tour thành công!");toastr chưa dung
                                this.loadKhachHang();
                                if(res.data.status) {
                                    toastr.success(res.data.message);
                                } else {
                                    toastr.error(res.data.message);
                                }
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                doiTrangThai(payload) {
                    axios
                        .post('/admin/khach-hang/change-status', payload)
                        .then((res) => {
                            if (res.data.status) {
                                this.loadKhachHang();
                                if(res.data.status) {
                                    toastr.success(res.data.message);
                                } else {
                                    toastr.error(res.data.message);
                                }
                            }

                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                capNhatKhachHang() {
                    axios
                        .post('/admin/khach-hang/update', this.edit)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã cập nhật tour thành công!");toastr chưa dung
                                this.loadKhachHang();
                                if(res.data.status) {
                                    toastr.success(res.data.message);
                                } else {
                                    toastr.error(res.data.message);
                                }
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaKhachHang() {
                    axios
                        .post('/admin/khach-hang/delete', this.del)
                        .then((res) => {
                            if (res.data.status == true) {
                                this.loadKhachHang();
                                if(res.data.status) {
                                    toastr.success(res.data.message);
                                } else {
                                    toastr.error(res.data.message);
                                }
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
