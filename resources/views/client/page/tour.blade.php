<!doctype html>
<html lang="en">
  <head>
    @include('client.share.css')
  </head>
  <body>
    <nav id="mobile-menu"></nav>
    <div class="wrapper">
      @include('client.share.header')
      <main class="rooms-grid-view" id="app">
        <div class="container">
          <div class="row">
            <!-- ITEM -->
              @if(isset($tour))
                @if($tour->count() > 0)
                  @foreach($tour as $item)
                      <div class="col-lg-4 col-md-6 d-flex">
                          <div class="room-grid-item">
                            <figure class="gradient-overlay-hover link-icon">

                              <a href="/detail-tour/{{$item->id}}">
                                  <img src="{{$item->hinh_anh ?? 'tour_default.jpg'}} " class="img-fluid" alt="Image">
                                </a>
                                <div class="room-price">{{number_format($item->don_gia, 0, ',', '.') . " VNĐ"}} | {{number_format($item->don_gia_2, 0, ',', '.') . " VNĐ"}}</div>
                            </figure>

                              <div class="room-info">
                                  <h2 class="room-title">
                                      <a href="/detail-tour/{{$item->id}}">{{$item->ten_tour}}</a>
                                  </h2>
                                  <p>Tận hưởng kỳ nghỉ của bạn</p>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  @else
                  <div class="d-flex justify-center w-100" style="width:100%;flex-direction:column;align-items:center">
                            <img  style="width:300px;margin:0 auto" src="https://dpauls.com/_nuxt/img/package-not-found.1b62f33.png">
                            <h4 style="display:flex;margin-top:10px">Không có tour nào được tìm thấy !</h4>
                        </div>
                  @endif

              @else
                  <div class="col-lg-4 col-md-6 d-flex" v-for="(value, key) in list">
                      <div class="room-grid-item">
                          <figure class="gradient-overlay-hover link-icon">
                              <a v-bind:href="'/detail-tour/' + value.id">
                                  <img v-bind:src="value.hinh_anh ? value.hinh_anh : '/tour_default.jpg'" class="img-fluid" alt="Image">
                              </a>
                              <div class="room-price">@{{numberFormat(value.don_gia)}} | @{{numberFormat(value.don_gia_2)}} </div>
                          </figure>
                          <div class="room-info">
                              <h2 class="room-title">
                                  <a v-bind:href="'/detail-tour/' + value.id">@{{value.ten_tour}}</a>
                              </h2>
                              <p>Tận hưởng kỳ nghỉ của bạn</p>
                          </div>
                      </div>
                  </div>
              @endif
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
