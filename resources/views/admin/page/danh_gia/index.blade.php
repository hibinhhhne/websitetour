@extends('admin.share.master')
@section('title')
    Quản Lý Đánh Giá
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Đánh Giá
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID Tour</label>
                        <select v-model="add.id_tour" class="form-control">
                            <template v-for="(v,k) in list_tour">
                                <option v-bind:value="v.id">@{{ v.ten_tour }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ID Khách Hàng</label>
                        <select v-model="add.id_khach_hang" class="form-control">
                            <template v-for="(v,k) in list_khachhang">
                                <option v-bind:value="v.id">@{{ v.ho_va_ten }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea v-model="add.noi_dung" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select v-model="add.trang_thai" class="form-control">
                            <option value="1">Đã Đánh Giá</option>
                            <option value="0">Chưa Đánh Giá</option>
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
                    Danh Sách Đánh Giá
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">ID Tour</th>
                                    <th class="text-center">ID Khách Hàng</th>
                                    <th class="text-center">Nội Dung</th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_danhgia">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.id_tour }}</td>
                                    <td class="align-middle">@{{ value.id_khach_hang }}</td>
                                    <td class="align-middle">@{{ value.noi_dung }}</td>
                                    <td class="text-center text-nowrap">
                                        <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai == 1"
                                            class="btn btn-success">Đã Đánh Giá</button>
                                        <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Chưa Đánh
                                            Giá</button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary" v-on:click="edit = value " data-toggle="modal"
                                            data-target="#editModal">Cập Nhật</button>
                                        <button class="btn btn-danger" v-on:click="del = value " data-toggle="modal"
                                            data-target="#deleteModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Đánh Giá</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="edit_id" class="form-control">
                                            <div class="form-group">
                                                <label>ID Tour</label>
                                                <input type="text" v-model="edit.id_tour" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>ID Khách Hàng</label>
                                                <select v-model="edit.id_khach_hang" class="form-control">
                                                    <template v-for="(v,k) in list_khachhang">
                                                        <option v-bind:value="v.id">@{{ v.ten_khach_hang }}</option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nội Dung</label>
                                                <textarea v-model="edit.noi_dung" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng Thái</label>
                                                <select v-model="edit.trang_thai" class="form-control">
                                                    <option value="1">Đã Đánh Giá</option>
                                                    <option value="0">Chưa Đánh Giá</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <button v-on:click="capNhatDanhGia()" class="btn btn-primary"
                                                data-dismiss="modal">Cập Nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa Đánh Giá</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa đánh giá " @{{ del.noi_dung }} " này không ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <button v-on:click="xoaDanhGia()" class="btn btn-danger"
                                                data-dismiss="modal">Xóa</button>
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
                list_danhgia: [],
                list_tour: [],
                list_khachhang: [],
                add: {},
                edit: {},
                del: {},
            },
            created() {
                this.loadDanhGia();
                this.loadTour();
                this.loadKhachHang();
            },
            methods: {
                loadTour() {
                    axios
                        .get('/admin/tour/data')
                        .then((res) => {
                            this.list_tour = res.data.data;
                        });
                },
                loadDanhGia() {
                    axios
                        .get('/admin/danh-gia/data')
                        .then((res) => {
                            this.list_danhgia = res.data.data;
                        });
                },
                loadKhachHang() {
                    axios
                        .get('/admin/khach-hang/data')
                        .then((res) => {
                            this.list_khachhang = res.data.data;
                            console.log(this.list_khachhang);
                        });
                },
                themMoi() {
                    axios
                        .post('/admin/danh-gia/create', this.add)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã thêm mới tour thành công!");toastr chưa dung
                                this.loadDanhGia();
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
                        .post('/admin/danh-gia/change-status', payload)
                        .then((res) => {
                            if (res.data.status) {
                                // toastr.success('Đã thay đổi trạng thái thành công!');
                                this.loadDanhGia();
                            }

                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                capNhatDanhGia() {
                    axios
                        .post('/admin/danh-gia/update', this.edit)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã cập nhật tour thành công!");toastr chưa dung
                                this.loadDanhGia();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaDanhGia() {
                    axios
                        .post('/admin/danh-gia/delete', this.del)
                        .then((res) => {
                            if (res.data.status == true) {
                                // toastr.success("Đã xóa tour thành công!");toastr chưa dung
                                this.loadDanhGia();
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
