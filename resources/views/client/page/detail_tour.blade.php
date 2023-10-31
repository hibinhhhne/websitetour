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
        <!-- ========== HEADER ========== -->
        @include('client.share.header')
        <!-- ========== PAGE TITLE ========== -->
        {{-- <div class="page-title gradient-overlay op6"
            style="background: url(/client/images/breadcrumb.jpg); background-repeat: no-repeat;
    background-size: cover;">
            <div class="container">
                <div class="inner">
                    <h1>SHOP</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Shop</li>
                    </ol>
                </div>
            </div>
        </div> --}}
        <!-- ========== MAIN ========== -->
        <main class="shop-page" id="app">
            <div class="container">
                <div class="shop-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-slider">
                                    <!-- PRODUCT SLIDER -->
                                    <div class="owl-carousel big-images image-gallery">
                                        <!-- ITEM -->
                                        <div class="item">
                                            <figure class="color-overlay-hover image-icon">
                                                <a>
                                                    <img v-bind:src="detail_addres.hinh_anh" class="img-fluid" alt="Image">
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
                                        <div class="product-price">
                                            <span class="product-price">@{{numberFormat(detail_addres.don_gia)}}</span>
                                        </div>
                                        <div class="product-description">
                                            <span class="product-description">@{{detail_addres.mo_ta}}</span>
                                        </div>


                                        <div class="product-rating mt30">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                            <span>4.5 average based on 4 ratings.</span>
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
                                        <div class="product-cart mt50">
                                            {{-- <div class="input-group spinner product-quantity">
                                                <label class="">Quantity:</label>
                                                <input type="text" class="form-control" value="1" min="1"
                                                    max="10">
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            <button class="btn add-to-cart">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="product-tabs mt80">
                        <ul class="nav nav-tabs" id="product-tab" role="tablist">
                            <!-- TAB -->
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab"
                                    href="#description" role="tab" aria-controls="description"
                                    aria-selected="true">Mô Tả Chi Tiết</a>
                            </li>
                            <!-- TAB -->

                            <!-- TAB -->
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews"
                                    role="tab" aria-controls="reviews" aria-selected="false">Đánh Giá</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="product-tab-content">
                            <!-- TAB -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p>@{{detail_addres.mo_ta}}</p>
                            </div>
                            <!-- TAB -->

                            <!-- TAB -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <!-- ITEM -->
                                <div class="review mt20 mb20">
                                    <div class="reviewer-avatar">
                                        <img src="/client/images/users/user1.jpg" class="img-fluid" alt="Image">
                                    </div>
                                    <h4 class="review-title">Review by Jane Doe</h4>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                    <p class="review-details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat.</p>
                                </div>
                                <!-- ITEM -->
                                <div class="review mt20 mb20">
                                    <div class="reviewer-avatar">
                                        <img src="/client/images/users/user2.jpg" class="img-fluid" alt="Image">
                                    </div>
                                    <h4 class="review-title">Review by Ina Aldrich</h4>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <p class="review-details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat.</p>
                                </div>
                                <!-- ITEM -->
                                <div class="review mt20 mb20">
                                    <div class="reviewer-avatar">
                                        <img src="/client/images/users/user3.jpg" class="img-fluid" alt="Image">
                                    </div>
                                    <h4 class="review-title">Review by Jane Doe</h4>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                    <p class="review-details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat.</p>
                                </div>
                                <!-- ITEM -->
                                <div class="review mt20 mb20">
                                    <div class="reviewer-avatar">
                                        <img src="/client/images/users/user4.jpg" class="img-fluid" alt="Image">
                                    </div>
                                    <h4 class="review-title">Review by Penny Widget</h4>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                    <p class="review-details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat.</p>
                                </div>
                                <h4 class="mt80">Write a Review</h4>
                                <form class="mt30">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Your Name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Your Email">
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="message" placeholder="Your Review..."></textarea>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="user-rating">
                                                <span>Your Rating:</span>
                                                <label>
                                                    <input type="radio" name="rating" value="5"
                                                        title="5 stars">
                                                    5
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="4"
                                                        title="4 stars">
                                                    4
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="3"
                                                        title="3 stars">
                                                    3
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="2"
                                                        title="2 stars">
                                                    2
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="1"
                                                        title="1 star">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <button class="btn pull-right mt20 mb20">Post Your Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- RELATED PRODUCTS -->
                        <div class="section-title sm mt50">
                            <h4>Related Products</h4>
                        </div>
                        <div class="row">
                            <!-- ITEM -->
                            <template v-for="(value, key) in list_dia_diem" v-if="key <= 4">
                                <div class="col-md-3">
                                    <div class="shop-item">
                                        <figure class="color-overlay-hover">
                                            <a>
                                                <img v-bind:src="value.hinh_anh" class="img-fluid" alt="Image">
                                            </a>
                                            {{-- <button class="btn btn-sm add-to-cart">Add to Cart</button> --}}
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
            }
        },
    });
</script>
</html>
