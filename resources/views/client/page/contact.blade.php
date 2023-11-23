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
            <h1>Thông Tin Liên Hệ</h1>
            <ol class="breadcrumb">
              <li>
                <a href="/">Home</a>
              </li>
            </ol>
          </div>
        </div>
      </div>
      <!-- ========== MAIN ========== -->
      <main class="contact-page">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="section-title">
                <h4>Liên HỆ</h4>
                <p class="section-subtitle">Liên hệ cho chúng tôi</p>
              </div>
              <p>Hãy để Booking Tour trở thành người bạn đồng hành đáng tin cậy trên mọi chuyến đi của bạn. Bắt đầu kế hoạch du lịch của bạn ngay hôm nay!</p>
              <!-- CONTACT FORM -->
            </div>
            <div class="col-md-4">
              <div class="sidebar">

                <div class="contact-details mt75">
                  <div class="contact-info">
                    <ul>
                      <li>
                        <a href="#">
                          <i class="fa fa-map-marker"></i>Hải Châu, Đà Nẵng</a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-envelope"></i>contact@bookingtour.com</a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-phone"></i>+1 888 123 4567</a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-fax"></i>+1 888 123 4567</a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-globe"></i>www.bookingtour.com</a>
                      </li>
                    </ul>
                  </div>
                  <div class="social-media mt50">
                    <a class="facebook" data-original-title="Facebook" data-toggle="tooltip" href="#">
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a class="twitter" data-original-title="Twitter" data-toggle="tooltip" href="#">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a class="googleplus" data-original-title="Google Plus" data-toggle="tooltip" href="#">
                      <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="pinterest" data-original-title="Pinterest" data-toggle="tooltip" href="#">
                      <i class="fa fa-pinterest"></i>
                    </a>
                    <a class="linkedin" data-original-title="Linkedin" data-toggle="tooltip" href="#">
                      <i class="fa fa-linkedin"></i>
                    </a>
                    <a class="youtube" data-original-title="Youtube" data-toggle="tooltip" href="#">
                      <i class="fa fa-youtube"></i>
                    </a>
                    <a class="tripadvisor" data-original-title="Tripadvisor" data-toggle="tooltip" href="#">
                      <i class="fa fa-tripadvisor"></i>
                    </a>
                  </div>
                </div>
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
</html>
