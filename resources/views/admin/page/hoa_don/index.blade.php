@extends('admin.share.master')
@section('title')
    Quản Lý Hóa Đơn
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Hóa Đơn
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input v-model="add.id_hoa_don" type="text" class="form-control" placeholder="Nhập vào ID Hóa Đơn">
                    </div>
                    <div class="form-group">
                        <label>ID Tour</label>
                        <input v-model="add.id_tour" type="text" class="form-control" placeholder="Nhập vào ID tour">
                    </div>
                    <div class="form-group">
                        <label>ID Khách Hàng</label>
                        <input v-model="add.id_khach_hang" type="text" class="form-control" placeholder="Nhập vào ID khách hàng">
                    </div>
                    <div class="form-group">
                        <label>ID Nhân Viên</label>
                        <input v-model="add.id_nhan_vien" type="text" class="form-control" placeholder="Nhập vào ID Nhân Viên">
                    </div>
                    <div class="form-group">
                        <label>Khuyến Mãi</label>
                        <input v-model="add.khuyen_mai" type="text" class="form-control" placeholder="Nhập vào Khuyến Mãi">
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú</label>
                        <input v-model="add.ghi_chu" type="text" class="form-control" placeholder="Nhập vào Ghi Chú">
                    </div>
                    <div class="form-group">
                        <label>Ngày Bắt Đầu</label>
                        <input v-model="add.ngay_bat_dau" type="date" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label>Ngày Kết Thúc</label>
                        <input v-model="add.ngay_ket_thuc" type="date" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Số Người</label>
                        <input v-model="add.so_nguoi" type="number" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Tổng Tiền</label>
                        <input v-model="add.tong_tien" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select v-model="add.trang_thai_thanh_toan" class="form-control">
                            <option value="1">Đã Thanh Toán</option>
                            <option value="0">Chưa Thanh Toán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã Thanh Toán</label>
                        <input v-model="add.ma_thanh_toan" type="text" class="form-control" placeholder="Nhập vào Mã Thanh Toán">
                    </div>
                    <div class="form-group">
                        <label>ID Bill Thanh Toán</label>
                        <input v-model="add.id_bill_thanh_toan" type="text" class="form-control" placeholder="Nhập vào Bill Thanh Toán">
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
                    Danh Sách Hóa Đơn
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">ID Tour</th>
                                    <th class="text-center">ID Khách Hàng</th>
                                    <th class="text-center">ID Nhân Viên</th>
                                    <th class="text-center">Khuyến Mãi</th>
                                    <th class="text-center">Ghi Chú</th>
                                    <th class="text-center">Ngày Bắt Đầu</th>
                                    <th class="text-center">Ngày Kết Thúc</th>
                                    <th class="text-center">Số Người</th>
                                    <th class="text-center">Tổng Tiền</th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th class="text-center">Mã Thanh Toán</th>
                                    <th class="text-center">ID Bill Thanh Toán</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_hoadon">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="align-middle">@{{ value.id_hoa_don }}</td>
                                        <td class="align-middle">@{{ value.id_tour }}</td>
                                        <td class="align-middle">@{{ value.id_khach_hang }}</td>
                                        <td class="align-middle">@{{ value.id_nhan_vien }}</td>
                                        <td class="align-middle">@{{ value.khuyen_mai }}</td>
                                        <td class="align-middle">@{{ value.ghi_chu }}</td>
                                        <td class="align-middle">@{{ value.ngay_bat_dau }}</td>
                                        <td class="align-middle">@{{ value.ngay_ket_thuc }}</td>
                                        <td class="align-middle">@{{ value.so_nguoi }}</td>
                                        <td class="align-middle">@{{ value.tong_tien }}</td>
                                        <td class="text-center text-nowrap">
                                            <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai_thanh_toan == 1" class="btn btn-success">Đã Đặt</button>
                                            <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Chưa Đặt</button>
                                        </td>
                                        <td class="align-middle">@{{ value.ma_thanh_toan }}</td>
                                        <td class="align-middle">@{{ value.id_bill_thanh_toan }}</td>
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
                                      <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Hóa Đơn</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" v-model="edit.id" class="form-control">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input v-model="edit.id_hoa_don" type="text" class="form-control" placeholder="Nhập vào id tour">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Tour</label>
                                            <input v-model="edit.id_tour" type="text" class="form-control" placeholder="Nhập vào ID Tour">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Khách Hàng</label>
                                            <input v-model="edit.id_khach_hang" type="text" class="form-control" placeholder="Nhập vào ID Khách Hàng">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Nhân Viên</label>
                                            <input v-model="edit.id_nhan_vien" type="text" class="form-control" placeholder="Nhập vào ID Nhân Viên">
                                        </div>
                                        <div class="form-group">
                                            <label>Khuyến Mãi</label>
                                            <input v-model="edit.khuyen_mai" type="text" class="form-control" placeholder="Nhập vào Khuyễn Mãi">
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <input v-model="edit.ghi_chu" type="text" class="form-control" placeholder="Nhập vào Ghi Chú">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Bắt Đầu</label>
                                            <input v-model="edit.ngay_bat_dau" type="datetime" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Kết Thúc</label>
                                            <input v-model="edit.ngay_ket_thuc" type="datetime" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Số Người</label>
                                            <input v-model="edit.so_nguoi" type="number" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Tổng Tiền</label>
                                            <input v-model="edit.tong_tien" type="text" class="form-control" placeholder="Nhập vào Tổng Tiền">
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng Thái</label>
                                            <select v-model="edit.trang_thai_thanh_toan" class="form-control">
                                                <option value="1">Đã Thanh Toán</option>
                                                <option value="0">Chưa Thanh Toán</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã Thanh Toán</label>
                                            <input v-model="edit.ma_thanh_toan" type="text" class="form-control" placeholder="Nhập vào Mã Thanh Toán">
                                        </div>
                                        <div class="form-group">
                                            <label>ID Bill Thanh Toán</label>
                                            <input v-model="edit.id_bill_thanh_toan" type="text" class="form-control" placeholder="Nhập vào ID Bill Thanh Toán">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                      <button v-on:click="capNhatHoaDon()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Xóa Hóa Đơn</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa hóa đơn : "@{{ del.id_hoa_don }}"" này không ?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" v-on:click="xoaHoaDon()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                list_hoadon       :   [],
                add             :   {},
                edit            :   {},
                del             :   {},
            },
            created() {
                this.loadHoaDon();
            },
            methods :   {
                loadHoaDon() {
                    axios
                        .get('/admin/hoa-don/data')
                        .then((res) => {
                            this.list_hoadon = res.data.data;
                        });
                },
                themMoi()   {
                    axios
                        .post('/admin/hoa-don/create', this.add)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã thêm mới hoa-don thành công!");toastr chưa dung
                                this.loadHoaDon();
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
                        .post('/admin/hoa-don/change-status', payload )
                        .then((res) => {
                            if(res.data.status) {
                                // toastr.success('Đã thay đổi trạng thái thành công!');
                                this.loadHoaDon();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                capNhatHoaDon(){
                    axios
                        .post('/admin/hoa-don/update', this.edit)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã cập nhật hoa-don thành công!");toastr chưa dung
                                this.loadHoaDon();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                // toastr.error(v[0]);
                            });
                        });
                },
                xoaHoaDon(){
                    axios
                        .post('/admin/hoa-don/delete', this.del)
                        .then((res) => {
                            if(res.data.status == true) {
                                // toastr.success("Đã xóa hoa-don thành công!");toastr chưa dung
                                this.loadHoaDon();
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
