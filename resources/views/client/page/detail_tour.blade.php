<!doctype html>
<html lang="en">

<head>
    @include('client.share.css')
    <style>
        .detail-info-key{
            list-style-type: none;
        }
        .detail-info-key li{
            color: #333;
        }
        .detail-info-key li i{
            color: #6500de;
            font-size:20px;
            margin-right: 4px;
            width: 25px;
        }

    </style>
</head>

<body>
    <!-- ========== MOBILE MENU ========== -->
    <nav id="mobile-menu"></nav>
    <!-- ========== WRAPPER ========== -->
    <div class="wrapper">
        <!-- ========== HEADER ========== -->
        @include('client.share.header')
        <!-- ========== MAIN ========== -->
        <main class="shop-page" id="app">
            <div class="container">
                <div class="shop-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-slider">
                                    <div class="owl-carousel big-images image-gallery">
                                        <!-- ITEM -->
                                        <div class="item">
                                            <figure class="color-overlay-hover image-icon">
                                                <a>
                                                    <img v-bind:src="detail_addres.hinh_anh ? detail_addres.hinh_anh : '/tour_default.jpg' " class="img-fluid" alt="Image">
                                                </a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="shop-item-details">
                                    <div class="product-inner">
                                        <h2 class="product-title">
                                            <a href="product-details.html">@{{detail_addres.ten_tour}}</a>
                                        </h2>

                                        <div>
                                            <span class="product-price">Giá vé Người Lớn : @{{numberFormat(detail_addres.don_gia)}} </span>
                                        </div>
                                        <div>
                                            <span class="product-price"> Giá vé Trẻ Em : @{{numberFormat(detail_addres.don_gia_2)}}</span>
                                        </div>
                                        <div class="product-price">
                                            <span class="product-price">Ngày Khởi Hành :  @{{detail_addres.format_day}}</span>
                                        </div>

                                        <div class="share product-share mt30">
                                            <div class="social-media">
                                                <a class="facebook" href="#" data-toggle="tooltip"
                                                    data-original-title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                                <a class="twitter" href="#" data-toggle="tooltip"
                                                    data-original-title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a class="googleplus" href="#" data-toggle="tooltip"
                                                    data-original-title="Google Plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                                <a class="pinterest" href="#" data-toggle="tooltip"
                                                    data-original-title="Pinterest">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-cart mt50 w-100">

                                        </div>
                                        <div class="product-cart mt50 d-flex flex-column">
                                             <div class="input-group spinner product-quantity">
                                                <label class="">Số lượng vé người lớn:</label>
                                                <input type="text" name="quality1" class="form-control" value="0" min="0"
                                                    max="10">
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="input-group spinner product-quantity">
                                                <label class="">Số lượng vé trẻ em:</label>
                                                <input type="text" name="quality2" class="form-control" value="0" min="0"
                                                       max="10">
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <button v-on:click="addToCart()" class="btn add-to-cart">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="product-tabs mt80">
                        <ul class="nav nav-tabs" id="product-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab"
                                    href="#description" role="tab" aria-controls="description"
                                    aria-selected="true">Mô Tả Chi Tiết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews"
                                    role="tab" aria-controls="reviews" aria-selected="false">Thông tin chi tiết</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="product-tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p>@{{detail_addres.mo_ta}}</p>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="footer-widget">
                                            <div class="inner">
                                                <ul class="contact-details detail-info-key">
                                                    <li>
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        Thời gian:
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        Ngày khởi hành:
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                        Giá vé:
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                        Địa điểm tham quan:
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-car" aria-hidden="true"></i>
                                                        Phương tiện:
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                                        Khách sạn:
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-ticket" aria-hidden="true"></i>

                                                        Khuyến mãi:</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="footer-widget">
                                            <div class="inner">
                                                <ul style="list-style-type: none" class="contact-details detail-info-item">
                                                    <li>
                                                         @{{detail_addres.so_ngay}} ngày - @{{detail_addres.so_dem}} đêm
                                                    </li>
                                                    <li>
                                                         @{{detail_addres.format_day}}
                                                    </li>
                                                    <li>
                                                        Người lớn: @{{numberFormat(detail_addres.don_gia)}} |
                                                        Trẻ em: @{{numberFormat(detail_addres.don_gia_2)}}
                                                    </li>
                                                    <li>
                                                         @{{detail_addres.list_dia_diem_tham_quan}}

                                                    </li>
                                                    <li>

                                                    </li>
                                                    <li>
                                                         @{{detail_addres.phuong_tien}}
                                                    </li>
                                                    <li>
                                                         @{{detail_addres.khach_san}}
                                                    </li>
                                                    <li>
                                                         10% cho khách hàng quen
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- RELATED PRODUCTS -->
                        <div class="section-title sm mt50">
                            <h4>Các Tours Khác</h4>
                        </div>
                        <div class="row">
                            <!-- ITEM -->
                            <template v-for="(value, key) in list_dia_diem" v-if="key <= 6">
                                <div class="col-md-3">
                                    <div class="shop-item">
                                        <figure class="color-overlay-hover">
                                            <a>
                                                <img v-bind:src="value.hinh_anh ? value.hinh_anh : '/tour_default.jpg'" class="img-fluid" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a v-bind:href="'/detail-tour/'+ value.id">@{{value.ten_tour}}</a>
                                            </h4>
                                            <div class="product-price">@{{numberFormat(value.don_gia)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
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
    @include('client.share.js')
</body>
<script>
    var list = [];
    new Vue({
        el: "#app",
        data: {
            list_dia_diem: [],
            option_addres: {
                "ten_tour": "Chọn địa điểm"
            },
            id_tour     : 0,
            detail_addres : {},
        },
        created() {
            var currentURL  = window.location.href;
            var parts       = currentURL.split('/');
            this.id_tour    = parts[parts.length - 1];
            this.loadDiaDiem();
            this.getDataChiTietTour();
        },
        methods: {
            loadDiaDiem() {
                axios
                    .post('/tour/data')
                    .then((res) => {
                        this.list_dia_diem = res.data.list;
                    });
            },
            getDataChiTietTour() {
                var payload = {
                    'id'    : this.id_tour
                };
                axios
                    .post('/detail-tour/data', payload)
                    .then((res) => {
                        if(res.data.status) {
                            this.detail_addres = res.data.data;
                        } else {
                            toastr.error(res.data.message);
                            window.location.href = '/';
                        }
                    });
            },
            callLoadAddres() {
                this.loadDiaDiem();
            },
            numberFormat(number) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number).replace("₫", "VNĐ")
            },
            addToCart() {
                this.detail_addres.so_luong_mua_1 = $("input[name='quality1']").val();
                this.detail_addres.so_luong_mua_2 = $("input[name='quality2']").val();
                // this.detail_addres.start_date = $("input[name='start_date']").val();
                axios
                    .post('/client/add-card-tour', this.detail_addres)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                        } else {
                            toastr.error(res.data.message);
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            }
        },
    });
</script>
</html>
