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
            <h1>Giới Thiệu về Booking Tour</h1>
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
                <h4> BOOKING TOUR </h4>
                <p class="section-subtitle">Chào mừng bạn đến với Booking Tour - Trang web đặt tour du lịch hàng đầu!</p>
              </div>
              <p>Booking Tour là đối tác lý tưởng của bạn trong việc lên kế hoạch cho chuyến đi của mình. Chúng tôi cung cấp một nền tảng thuận tiện để bạn có thể dễ dàng tìm kiếm, so sánh và đặt tour du lịch trực tuyến. Với sự đa dạng về địa điểm và loại hình du lịch, chúng tôi cam kết mang đến trải nghiệm du lịch đặc sắc cho mọi người.

              <p>Dịch Vụ Chúng Tôi Cung Cấp - Đa Dạng Tour: </p>

                <p>Du lịch tự túc.</p>
                <p>Tour theo nhóm.</p>
                <p>Tour mạo hiểm và khám phá.</p>
                <p>Tour thăm quan văn hóa và lịch sử.</p>
                <p>Tìm Kiếm Linh Hoạt: Bạn có thể tìm kiếm theo địa điểm, thời gian, hoặc loại hình du lịch mong muốn.</p>


                <p>Bảo Đảm Giá Tốt Nhất: Chúng tôi cam kết cung cấp giá tour cạnh tranh và ưu đãi hấp dẫn.</p>
                <p> Đánh Giá và Nhận Xét: Đọc đánh giá từ người đi trước để có cái nhìn chân thực về tour bạn quan tâm.</p>
                <p>Hỗ Trợ 24/7: Đội ngũ hỗ trợ của chúng tôi sẵn sàng giúp đỡ bạn mọi lúc, mọi nơi.</p>
                <p>Tại Sao Chọn Booking Tour? </p>
                <p> - Đối Tác Uy Tín: Chúng tôi hợp tác với các đối tác du lịch uy tín để mang đến cho bạn trải nghiệm an toàn và đáng tin cậy.</p>
                <p> - Dễ Dàng và Nhanh Chóng: Quá trình đặt tour của chúng tôi là nhanh chóng và dễ dàng, giúp bạn tiết kiệm thời gian và công sức. </p>
                <p> - Khuyến Mãi Đặc Biệt: Chúng tôi thường xuyên cập nhật các chương trình khuyến mãi và ưu đãi đặc biệt để bạn có thêm lý do để chọn chúng tôi.</p>
              <!-- CONTACT FORM -->
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
