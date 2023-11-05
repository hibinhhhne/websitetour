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
      <!-- ========== TOP MENU ========== -->
      @include('client.share.header')
      <!-- ========== PAGE TITLE ========== -->
      {{-- <div class="page-title gradient-overlay op6" style="background: url(images/breadcrumb.jpg); background-repeat: no-repeat;
      background-size: cover;">
        <div class="container">
          <div class="inner">
            <h1>ROOMS</h1>
            <ol class="breadcrumb">
              <li>
                <a href="index.html">Home</a>
              </li>
              <li>Rooms</li>
            </ol>
          </div>
        </div>
      </div> --}}
      <!-- ========== MAIN ========== -->
      <main class="rooms-grid-view" id="app">
        <div class="container">
          <div class="row">
            <!-- ITEM -->
                <div class="col-lg-4 col-md-6 d-flex" v-for="(value, key) in list">
                  <div class="room-grid-item">
                    <figure class="gradient-overlay-hover link-icon">
                      <a v-bind:href="'/detail-tour/' + value.id">
                        <img v-bind:src="value.hinh_anh" class="img-fluid" alt="Image">
                      </a>
                      <div class="room-price">@{{numberFormat(value.don_gia)}}</div>
                    </figure>
                    <div class="room-info">
                      <h2 class="room-title">
                        <a v-bind:href="'/detail-tour/' + value.id">@{{value.ten_tour}}</a>
                      </h2>
                      <p>Enjoy our single room</p>
                    </div>
                  </div>
                </div>
            <!-- ITEM -->
          </div>
        </div>
      </main>
      <!-- ========== FOOTER ========== -->
      @include('client.share.footer')
    </div>
    <div class="notification"></div>
    <!-- ========== BACK TO TOP ========== -->
    <div class="back-to-top">
      <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <!-- ========== JAVASCRIPT ========== -->
    @include('client.share.js')
    <script>
        new Vue({
            el      :   '#app',
            data    :   {
                list      : [],
            },
            created()   {
                this.loadData();
            },
            methods :   {
                loadData() {
                    axios
                        .post('/tour/data')
                        .then((res) => {
                            this.list = res.data.list;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                numberFormat(number) {
                    return new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(number).replace("₫", "VNĐ")
                },
            },
        });
    </script>
  </body>
</html>
