<!doctype html>
<html lang="en">
  <head>
    @include('client.share.css')
</head>
  <body>
    <!-- ========== MOBILE MENU ========== -->
    <nav id="mobile-menu"></nav>
    <!-- ========== WRAPPER ========== -->
    <div class="wrapper">
     @include('client.share.header')
      <!-- ========== PAGE TITLE ========== -->
      <div class="page-title gradient-overlay op6" style="background: url(images/breadcrumb.jpg); background-repeat: no-repeat;
    background-size: cover;">
        <div class="container">
          <div class="inner">
            <h1>Đăng Nhập & Đăng Ký</h1>
            <ol class="breadcrumb">
              <li>
                <a href="/">Trang Chủ</a>
              </li>
            </ol>
          </div>
        </div>
      </div>
      <!-- ========== MAIN ========== -->
      <main class="contact-page" id="app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Đăng Nhập
                        </div>
                        <div class="card-body">
                            <label for="">Email</label>
                            <input class="form-control" v-model="login.email" type="email">
                            <label for="">Mật Khẩu</label>
                            <input class="form-control" v-model="login.password" type="password">
                        </div>
                        <div class="card-footer text-right"><button type="button" class="btn btn-primary" v-on:click="loginClient()">Đăng Nhập</button></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Đăng Ký
                        </div>
                        <div class="card-body">
                            <label for="">Họ Và Tên</label>
                            <input class="form-control" v-model="create_kh.ho_va_ten" type="email">
                            <label for="">Email</label>
                            <input class="form-control" v-model="create_kh.email" type="email">
                            <label for="">Mật Khẩu</label>
                            <input class="form-control" v-model="create_kh.password" type="password">
                            <label for="">Địa Chỉ</label>
                            <input class="form-control" v-model="create_kh.dia_chi" type="email">
                            <label for="">Ngày Sinh</label>
                            <input class="form-control" v-model="create_kh.ngay_sinh" type="date">
                            <label for="">Quốc Tịch</label>
                            <input class="form-control" v-model="create_kh.quoc_tich" type="text">
                            <label for="">Số Điện Thoại</label>
                            <input class="form-control" v-model="create_kh.so_dien_thoai" type="text">
                            <label for="">Giới Tính</label>
                            <select name="" v-model="create_kh.gioi_tinh">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                                <option value="2">Khác</option>
                            </select>
                        </div>
                        <div class="card-footer text-right"><button type="button" class="btn btn-primary" v-on:click="themMoi()">Đăng Ký</button></div>
                    </div>
                </div>
            </div>
        </div>
      </main>
      @include('client.share.footer')
    </div>
    <!-- ========== CONTACT NOTIFICATION ========== -->
    <div id="contact-notification" class="notification fixed"></div>
    <!-- ========== BACK TO TOP ========== -->
    <div class="back-to-top">
      <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    @include('client.share.js')
  </body>
  <script>
    new Vue({
        el : "#app",
        data : {
            login : {},
            create_kh : {'gioi_tinh' : 1},
            list_quoc_tich : [],
        },
        created() {
            this.getQuocTich();
        },
        methods : {
            getQuocTich() {
                axios
                    .get('/client/get-data-quoc-tich')
                    .then((res) => {
                        this.list_quoc_tich = res.data.data
                    });
            },
            themMoi() {
                axios
                    .post('/client/register', this.create_kh)
                    .then((res) => {


                    });
            },
            loginClient() {
                axios
                    .post('/client/login', this.login)
                    .then((res) => {
                        if(res.data.status == 1) {
                            toastr.success(res.data.message);
                            setTimeout(() => {
                                window.location.href = '/'
                            }, 1000);
                        } else {
                            toastr.error(res.data.massage);
                            setTimeout(() => {
                                window.location.href = '/login-register'
                            }, 1000);
                        }
                    });
            }
        }
    });
  </script>
</html>
