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
      {{-- <div class="page-title gradient-overlay op6" style="background: url(images/breadcrumb.jpg); background-repeat: no-repeat;
    background-size: cover;">
        <div class="container">
          <div class="inner">
            <h1>Booking Form</h1>
            <ol class="breadcrumb">
              <li>
                <a href="index.html">Home</a>
              </li>
              <li>Booking Form</li>
            </ol>
          </div>
        </div> --}}
      </div>
      <!-- ========== MAIN ========== -->
      <main id="app">
        <div class="container">
          <div class="row">
            <!-- CONTENT -->
            <div class="col-lg-9 col-12">
              <div class="section-title">
                <h4>BOOK YOUR TOURs</h4>
                <p class="section-subtitle">Book your Tour Now</p>
              </div>
              <p class="mb30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia deleniti fuga recusandae perferendis modi voluptate, ad ratione saepe voluptas nam provident reiciendis velit nulla repellendus illo consequuntur amet similique hic.</p>
              <!-- BOOKING FORM -->
              <form class="booking-form-advanced" id="booking-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Your Name</label>
                      <input v-model="add.ten_nguoi_nhan" name="booking-name" type="text" class="form-control" placeholder="Your Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email Address</label>
                      <input v-model="add.email" class="form-control" name="booking-email" type="email" placeholder="Your Email Address">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input v-model="add.so_dien_thoai" name="booking-phone" type="text" class="form-control" placeholder="Your Phone Number">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" v-model="add.dia_chi" placeholder="Your Address">
                    </div>
                  </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Thanh toán trực tiếp</label>
                            <input value="1" type="radio" name="payment_type" class=""  placeholder="Your Address">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Thanh toán online</label>
                            <input value="2" type="radio" name="payment_type" class=""  placeholder="Your Address">
                        </div>
                    </div>
                  <div class="col-md-12">
                    <button v-on:click="datHang()" type="button" class="btn mt50 float-right">
                      <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                      BOOK A TOUR NOW
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- SIDEBAR -->
            <div class="col-lg-3 col-12">
              <div class="sidebar">
                <div class="contact-details">
                  <div class="section-title">
                    <h4>TOURS</h4>
                    <p class="section-subtitle">CHECK OUT OUR SPECIAL TOURS</p>
                  </div>
                  <template v-for="(value, key) in list_don_hang">
                      <div class="offer-item sm mb50">
                        <a v-bind:href="'/delete-tour/' + value.id_tour" style="position: absolute; right:-5px; top:-5px;padding:2px 9px;cursor: pointer; border-radius:50%;z-index:100;background-color:white">X</span>
                        <figure class="gradient-overlay-hover link-icon">
                          <a v-bind:href="'/detail-tour/' + value.id_tour">
                            <img v-bind:src="value.hinh_anh ?? '/tour_default.jpg'" class="img-fluid" alt="Image">
                          </a>
                        </figure>
                        <div class="offer-price uppercase">
                          @{{value.ten_tour}}
                        </div>
                      </div>
                  </template>
                  <hr>
                  <div class="row">
                    <div class="col-12">

                        <h3>TOTAL: <span class="float-right">@{{total}} vnđ </span></h3>
                        @if(isset($sale) && $sale == true)
                            <span style="float:right;display:flex;width:100%;justify-content: flex-end">Được giảm giá: 10%</span>
                            <h3>Giá cuối: <span class="float-right">@{{total * 0.9}} vnđ </span></h3>

                        @endif

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- ========== FOOTER ========== -->
      @include('client.share.footer')
    </div>
    <!-- ========== NOTIFICATION ========== -->
    <div id="booking-notification" class="notification fixed"></div>
    <!-- ========== BACK TO TOP ========== -->
    <div class="back-to-top">
      <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    @include('client.share.js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                list_don_hang   : [],
                add             : {},
                total           : 0,
            },
            created()   {
                this.loadData();
            },
            methods :   {
                loadData() {
                    axios
                        .post('/client/data-list-cart')
                        .then((res) => {
                            this.list_don_hang = res.data.data;
                            this.total         = res.data.total;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                datHang() {
                    this.add.tong_tien = this.total;
                    this.add.ds_dh     = this.list_don_hang;
                    let $type = $('input[name="payment_type"]:checked').val();
                    if($type == 1) {
                        axios
                            .post('{{ Route("datHang") }}', this.add)
                            .then((res) => {
                                if(res.data.status) {

                                toastr.success(res.data.message);
                                this.loadData();
                                this.add = {};
                                } else {
                                    toastr.error(res.data.message);
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0]);
                                });
                            });
                    } else {
                        axios
                            .post('{{ Route("payment.vnpay") }}', this.add)
                            .then((res) => {
                                document.location.href = res.data.data;
                                // if(res.data.status) {

                                // toastr.success(res.data.message);
                                // this.loadData();
                                // this.add = {};
                                // } else {
                                //     toastr.error(res.data.message);
                                // }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0]);
                                });
                            });
                    }

                }
            },
        });
    </script>
  </body>
</html>
