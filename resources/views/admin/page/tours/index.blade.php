@extends('admin.share.master')
@section('title')
    Quản Lý Tours
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2{
            width: 100% !important;
        }
    </style>
    <div id="app" class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Thêm Mới Tours
            </div>
            <div class="card-body">
                <form id="form_create">
                    <div class="form-group">
                        <label>Tên Tour</label>
                        <input v-model="add.ten_tour" type="text" class="form-control" placeholder="Nhập vào Tên Tour">
                    </div>
                    <div class="form-group">
                        <label>Slug Tour</label>
                        <input v-model="add.slug" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea v-model="add.mo_ta" class="form-control" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label>ID Khách Sạn</label>
                        <select v-model="add.id_khach_san" class="form-control">
                            @foreach($hotel as $item)
                                <option value="{{$item->id}}">{{$item->ten_khach_san}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>List Địa Điểm Tham Quan</label>
                        <select class="select2"  multiple="multiple"  v-model="add.list_dia_diem_tham_quan" class="form-control">
                            @foreach($place as $item)
                                <option value="{{$item->ten_dia_diem}}">{{$item->ten_dia_diem}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ID Phương Tiện</label>
                        <select   v-model="add.id_phuong_tien" class="form-control">
                            @foreach($vehicle as $item)
                                <option value="{{$item->id}}">{{$item->ten_phuong_tien}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ID Tỉnh Thành</label>
                        <select v-model="add.id_tinh_thanh" class="form-control">
                            <template v-for="(v,k) in list_tt">
                                <option v-bind:value="v.id">@{{v.ten_tinh_thanh}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày khởi hành</label>
                        <input v-model="add.ngay_khoi_hanh" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Ngày</label>
                        <input v-model="add.so_ngay" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Đêm</label>
                        <input v-model="add.so_dem" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số Người</label>
                        <input v-model="add.so_nguoi" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú</label>
                        <input v-model="add.ghi_chu" type="text" class="form-control" placeholder="Nhập vào Ghi Chú">
                    </div>
                    <div class="form-group">
                        <label>Đơn Giá Người Lớn</label>
                        <input v-model="add.don_gia" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Đơn Giá Trẻ Em</label>
                        <input v-model="add.don_gia_2" type="number" class="form-control">
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
                    <div id="holder" style="height: 100%;"></div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select v-model="add.trang_thai" class="form-control">
                            <option value="1">Còn Chỗ</option>
                            <option value="0">Hết Chỗ </option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-footer text-right">
                <button v-on:click="themMoi()" type="button" class="btn btn-primary">Thêm Mới</button>
            </div>
        </div>
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Tours
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                                <tr class="text-center text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Slug Tour</th>
                                    <th class="text-center">Tên Tour</th>
                                    <th class="text-center">Mô Tả</th>
                                    <th class="text-center">ID Khách Sạn</th>
                                    <th class="text-center">Địa Điểm</th>
                                    <th class="text-center">ID Phương Tiện</th>
                                    <th class="text-center">ID Tỉnh Thành</th>
                                    <th class="text-center">Số Ngày</th>
                                    <th class="text-center">Ngày khởi hành</th>
                                    <th class="text-center">Số Đêm</th>
                                    <th class="text-center">Số Người</th>
                                    <th class="text-center">Ghi Chú</th>
                                    <th class="text-center">Đơn Giá Người Lớn</th>
                                    <th class="text-center">Đơn Giá Trẻ Em</th>
                                    <th class="text-center">Hình Ảnh</th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="align-middle">@{{ value.ten_tour }}</td>
                                        <td class="align-middle">@{{ value.slug }}</td>
                                        <td class="align-middle">@{{ value.mo_ta }}</td>
                                        <td class="align-middle">@{{ value.id_khach_san }}</td>
                                        <td class="align-middle">@{{ value.list_dia_diem_tham_quan }}</td>
                                        <td class="align-middle">@{{ value.id_phuong_tien }}</td>
                                        <td class="align-middle">@{{ value.id_tinh_thanh }}</td>
                                        <td class="align-middle">@{{ value.so_ngay}}</td>
                                        <td class="align-middle">@{{ value.ngay_khoi_hanh}}</td>
                                        <td class="align-middle">@{{ value.so_dem}}</td>
                                        <td class="align-middle">@{{ value.so_nguoi}}</td>
                                        <td class="align-middle">@{{ value.ghi_chu}}</td>
                                        <td class="align-middle">@{{ value.don_gia}}</td>
                                        <td class="align-middle">@{{ value.don_gia_2}}</td>

                                    <td class="text-center">
                                            <img v-bind:src="value.hinh_anh" class="img-thumbnail" style="height: 100%">
                                        </td>
                                        <td class="text-center text-nowrap">
                                            <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai == 1" class="btn btn-success">Còn Chỗ</button>
                                            <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Hết Chỗ</button>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button v-on:click="edit = value " data-toggle="modal" data-target="#editModal" class="btn btn-primary">Cập Nhật</button>
                                            <button v-on:click="del = value " data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Xóa</button>
                                        </td>
                                    </th>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Tour</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" v-model="edit.id" class="form-control">
                                            <div class="form-group">
                                                <label>Tên Tour</label>
                                                <input v-model="edit.ten_tour" type="text" class="form-control" placeholder="Nhập vào Tên Tour">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug Tour</label>
                                                <input v-model="edit.slug" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô Tả</label>
                                                <textarea v-model="edit.mo_ta" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>ID Khách Sạn</label>
                                                <input v-model="edit.id_khach_san" type="text" class="form-control" placeholder="Nhập vào ID Khách Sạn" >
                                            </div>
                                            <div class="form-group">
                                                <label>List Địa Điểm Tham Quan</label>
                                                <select class="select2"  multiple="multiple"  v-model="edit.list_dia_diem_tham_quan" class="form-control">
                                                    @foreach($place as $item)
                                                        <option value="{{$item->ten_dia_diem}}">{{$item->ten_dia_diem}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>ID Phương Tiện</label>
                                                <select   v-model="edit.id_phuong_tien" class="form-control">
                                                    @foreach($vehicle as $item)
                                                        <option value="{{$item->id}}">{{$item->ten_phuong_tien}}</option>
                                                    @endforeach
                                                </select>
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
                                                <label>Ngày khởi hành</label>
                                                <input v-model="edit.ngay_khoi_hanh" type="date" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Số Ngày</label>
                                                <input v-model="edit.so_ngay" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Số Đêm</label>
                                                <input v-model="edit.so_dem" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Số Người</label>
                                                <input v-model="edit.so_nguoi" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ghi Chú</label>
                                                <input v-model="edit.ghi_chu" type="text" class="form-control" placeholder="Nhập vào Ghi Chú">
                                            </div>
                                            <div class="form-group">
                                                <label>Đơn Giá Người Lớn</label>
                                                <input v-model="edit.don_gia" type="number" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Đơn Giá Trẻ Em</label>
                                                <input v-model="edit.don_gia_2" type="number" class="form-control">
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
                                            <div id="edit_holder" style="height: 100%;"></div>
                                            <div class="form-group">
                                                <label>Trạng Thái</label>
                                                <select v-model="edit.trang_thai" class="form-control">
                                                    <option value="1">Còn Chỗ</option>
                                                    <option value="0">Hết Chỗ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                          <button v-on:click="capNhatTour()" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Tour</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa tour " @{{ del.ten_tour }} " này hay không ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button v-on:click="xoaTour()" class="btn btn-danger" data-dismiss="modal">Xóa</button>
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
                list            :   [],
                add             :   {
                    id_tinh_thanh: 0
                },
                edit            :   {},
                del             :   {},
                list_tt         : [],
            },
            created() {
                this.loadTour();
                this.loadTinhThanh();

            },
            methods :   {
                click_edit(value) {
                    this.edit = value;
                    $("#edit_hinh_anh").val(value.hinh_anh);
                    $("#edit_holder").html('<img src="' + value.hinh_anh +'" style="height: 100%;">');
                },
                loadTour() {
                    axios
                        .get('/admin/tour/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                loadTinhThanh() {
                    axios
                        .get('/admin/tinh-thanh/data')
                        .then((res) => {
                            this.list_tt = res.data.data;
                        });
                },
                themMoi()   {
                    this.add.hinh_anh = $("#hinh_anh").val();
                    let $value = $('.selection .select2-selection__choice');
                    let $text = [];
                    $.each($value, function(k, v) {
                        $text.push(v.title);
                    });
                    this.add.list_dia_diem_tham_quan = $text.join(',');
                    axios
                        .post('/admin/tour/create', this.add)
                        .then((res) => {
                            this.loadTour();
                            if(res.data.status) {
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
                doiTrangThai(payload){
                    axios
                        .post('/admin/tour/change-status', payload )
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadTour();
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
                capNhatTour(){
                    this.edit.hinh_anh = $("#edit_hinh_anh").val();
                    axios
                        .post('/admin/tour/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                this.loadTour();
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
                xoaTour(){
                    axios
                        .post('/admin/tour/delete', this.del)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                this.loadTour();
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
     <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
         $('.select2').select2();
         $('#lfm').filemanager('image', { prefix: '/laravel-filemanager' });
     </script>

@endsection

