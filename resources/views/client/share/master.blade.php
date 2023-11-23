<!doctype html>
<html lang="en">

<head>
    @include('client.share.css')
</head>

<body>
    <!-- ========== MOBILE MENU ========== -->
    <nav id="mobile-menu"></nav>
    <!-- ========== WRAPPER ========== -->
    <div class="wrapper" id="app">
        <!-- ========== HEADER ========== -->
        @include('client.share.header')
        <!-- ========== REVOLUTION SLIDER ========== -->
        <div class="slider">
            <div id="rev-slider-1" class="rev_slider gradient-slider" style="display:none" data-version="5.4.5">
                <ul>
                    @foreach ($slide as $item)
                        <li data-transition="crossfade">
                            <!-- MAIN IMAGE -->
                            <img src="{{ $item }}" alt="Image" title="Image" data-bgposition="center center"
                                data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg"
                                data-no-retina="">
                            <h1 class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="320"
                                data-voffset="" data-responsive_offset="on" data-fontsize="['80','50','40','30']"
                                data-lineheight="['60','50','40','30']" data-whitespace="nowrap"
                                data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                style="z-index: 5; color: #000; font-weight: 900;">

                                <div class="tp-caption tp_m_title tp-resizeme" data-x="center" data-hoffset=""
                                    data-y="200" data-voffset="" data-responsive_offset="on"
                                    data-fontsize="['18','18','16','16']" data-lineheight="['18','18','16','16']"
                                    data-whitespace="nowrap"
                                    data-frames='[{"delay":1800,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    style="color: #101010">
                                </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <!-- ========== BOOKING FORM ========== -->
            <div class="horizontal-booking-form">
                <div class="container">
                    <div class="inner box-shadow-007">
                        <!-- ========== BOOKING NOTIFICATION ========== -->
                        <div id="booking-notification" class="notification"></div>
                        <form action="/booking-process" method="post">
                            @csrf
                            <!-- NAME -->
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tên
                                            <a href="/client/#" title="Nhập Tên" data-toggle="popover"
                                                data-placement="top" data-trigger="hover"
                                                data-content="Please type your first name and last name">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </label>
                                        <input class="form-control" name="booking-name" type="text"
                                            data-trigger="hover" placeholder="Nhập Tên">
                                    </div>
                                </div> --}}
                                <!-- EMAIL -->
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Email--}}
{{--                                            <a href="/client/#" title="Nhập Email" data-toggle="popover"--}}
{{--                                                data-placement="top" data-trigger="hover"--}}
{{--                                                data-content="Nhập địa chỉ Email">--}}
{{--                                                <i class="fa fa-info-circle"></i>--}}
{{--                                            </a>--}}
{{--                                        </label>--}}
{{--                                        <input class="form-control" name="booking-email" type="email"--}}
{{--                                            placeholder="Nhập Email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Địa Điểm
                                            <a href="/client/#" title="" data-toggle="popover"
                                                data-placement="top" data-trigger="hover"
                                                data-content="Please select tour type" data-original-title="Địa Điểm">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </label>
                                        <div class="btn-group bootstrap-select form-control">
                                            <select name="tour_location" class="form-control">
                                                @foreach($tour as $item)

                                                    <option value="{{$item->id}}">{{$item->ten_tinh_thanh}}</option>

                                                @endforeach
                                            </select>
{{--                                            <button v-on:click="callLoadAddres()" type="button"--}}
{{--                                                class="btn dropdown-toggle bs-placeholder btn-info"--}}
{{--                                                data-toggle="dropdown" role="button" title="Chọn Địa Điểm"--}}
{{--                                                aria-expanded="true">--}}
{{--                                                --}}{{-- <span class="filter-option pull-left">Chọn Địa Điểm</span> --}}

{{--                                                <span class="filter-option pull-left">@{{ option_addres.ten_tour }}</span>--}}
{{--                                                <span class="bs-caret">--}}
{{--                                                    <span class="caret"></span>--}}
{{--                                                </span>--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown-menu open" role="combobox" x-placement="bottom-start"--}}
{{--                                                style="padding-top: 0px; position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">--}}
{{--                                                <div class="popover-title">--}}
{{--                                                    <button type="button" class="close"--}}
{{--                                                        aria-hidden="true">×</button>Tour Type--}}
{{--                                                </div>--}}
{{--                                                <div class="dropdown-menu inner" role="listbox" aria-expanded="true">--}}
{{--                                                    <template v-for="(value, key) in list_dia_diem">--}}
{{--                                                        <a v-on:click="option_addres = value" tabindex="0"--}}
{{--                                                            class="dropdown-item" data-original-index="2">--}}
{{--                                                            <span class="dropdown-item-inner " data-tokens="null"--}}
{{--                                                                role="option" tabindex="0" aria-disabled="false"--}}
{{--                                                                aria-selected="false">--}}
{{--                                                                <span class="text">@{{ value.ten_tour }}</span>--}}
{{--                                                                <span class="fa fa-check check-mark"></span>--}}
{{--                                                            </span>--}}
{{--                                                        </a>--}}
{{--                                                    </template>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                <!-- DATE -->
                                {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ngày Đi
                                            <a href="/client/#" title="Check-In / Check-Out" data-toggle="popover"
                                                data-placement="top" data-trigger="hover"
                                                data-content="Please select check-in and check-out date <br>*Check In from 11:00am">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </label>
                                        <input type="date" class="datepicker form-control" name="booking-date"
                                            placeholder="Ngày " readonly="readonly">
                                    </div>
                                </div> --}}
                                <!-- GUESTS -->
                                <!-- BOOKING BUTTON -->
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-book">Tìm Kiếm</button>
                                    <div class="advanced-form-link">
                                        <a href="/client/booking-form.html">
                                            Advanced Booking Form
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== ABOUT ========== -->
        <section class="about mt100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-full">
                        <div class="section-title">
                            <h4 class="text-uppercase">Chào Mừng đến với Booking Tour</h4>
                        </div>
                        <div class="info-branding">
                            <p>Chúng tôi rất vui mừng và tự hào được chào đón bạn tại địa chỉ trực tuyến này. Tại đây,
                                chúng tôi cam kết mang đến cho bạn những trải nghiệm du lịch đáng nhớ và không gian thư
                                giãn tuyệt vời từ những chuyến đi của mình. Với đội ngũ chuyên viên chăm sóc khách hàng
                                giàu kinh nghiệm, chúng tôi sẽ hỗ trợ bạn từ việc lựa chọn tour phù hợp đến việc chuẩn
                                bị tốt nhất cho hành trình của bạn.

                                Tại website của chúng tôi, bạn sẽ có cơ hội khám phá những điểm đến hấp dẫn trên khắp
                                thế giới, từ những thành phố sôi động đến những vùng quê yên bình, từ những kỳ quan
                                thiên nhiên đến những di sản văn hóa độc đáo. Chúng tôi đã tổ chức và thiết kế các tour
                                du lịch đa dạng, đáp ứng được mọi nhu cầu và sở thích của du khách.

                                Nếu bạn đang tìm kiếm một hành trình du lịch đầy ý nghĩa và thú vị, hãy để chúng tôi là
                                người đồng hành tin cậy của bạn. Đặt tour ngay hôm nay để bắt đầu hành trình khám phá
                                thế giới và tạo ra những kỷ niệm đáng nhớ!

                                Chân thành cảm ơn bạn đã tin tưởng và lựa chọn chúng tôi. Nếu bạn có bất kỳ câu hỏi hoặc
                                yêu cầu nào, đừng ngần ngại liên hệ với chúng tôi. Chúng tôi luôn sẵn lòng hỗ trợ bạn
                                24/7.

                                Chúc bạn có một hành trình du lịch tuyệt vời và đáng nhớ cùng chúng tôi!</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== Tours ========== -->
        <section class="rooms gray">
            <div class="container">
                <div class="section-title">
                    <h4>TOURS</h4>
                    <p class="section-subtitle">Thông tin tour của chúng tôi</p>
                    <a href="/tour" class="view-all">Tất Cả</a>
                </div>
                <div class="row">
                    <!-- ITEM -->
                    <div class="col-md-4 d-flex " style="margin-bottom:20px" v-for="(value, key) in list_dia_diem">
                        <div class="room-grid-item">
                            <figure class="gradient-overlay-hover link-icon">
                                <a v-bind:href="'/detail-tour/' + value.id">
                                    <img v-bind:src="value.hinh_anh ? value.hinh_anh : '/tour_default.jpg'" class="img-fluid" alt="Image">
                                </a>
                                <div class="room-price">@{{ numberFormat(value.don_gia) }}</div>
                            </figure>
                            <div class="room-info">
                                <h2 class="room-title">
                                    <a v-bind:href="'/detail-tour/' + value.id">@{{ value.ten_tour }}</a>
                                </h2>
                                <p>@{{ value.list_dia_diem_tham_quan }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- ========== TESTIMONIALS ========== -->
        <section class="testimonials gray">
            <div class="container">
                <div class="section-title">
                    <h4>ĐÁNH GIÁ</h4>
                </div>
                <div class="owl-carousel testimonials-owl">
                    <!-- ITEM -->
                    @foreach ($danhGia as $item)
                    <div class="item">
                        <div class="testimonial-item"  style="width: 330px; margin-right: 30px;">
                            <div class="author">
                                <h4 class="name">{{ $item->ho_va_ten }}</h4>
                                <div class="location">{{ $item->ten_tour }}</div>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star voted" aria-hidden="true"></i>
                                <i class="fa fa-star voted" aria-hidden="true"></i>
                                <i class="fa fa-star voted" aria-hidden="true"></i>
                                <i class="fa fa-star voted" aria-hidden="true"></i>
                                <i class="fa fa-star voted" aria-hidden="true"></i>
                            </div>
                            <p>{{ $item->noi_dung }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!-- ========== CONTACT NOTIFICATION ========== -->
    <div id="contact-notification" class="notification fixed"></div>
    <!-- ========== BACK TO TOP ========== -->
    <div class="back-to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    @include('client.share.js')
    @include('client.share.footer')

    <script>
        var list = [];
        new Vue({
            el: "#app",
            data: {
                list_dia_diem: [],
                option_addres: {
                    "ten_tour": "Chọn địa điểm"
                },
                option_id:{
                    'id': 0
                }
            },
            created() {
                this.loadDiaDiem();
                this.LoadDanhGia();
            },
            methods: {
                loadDiaDiem() {
                    axios
                        .post('/tour/data')
                        .then((res) => {
                            this.list_dia_diem = res.data.list;
                        });
                },
                callLoadAddres() {
                    this.loadDiaDiem();
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

</html>
