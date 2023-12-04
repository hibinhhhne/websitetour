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
      <div class="page-title gradient-overlay op6" style="background: url(images/breadcrumb.jpg); background-repeat: no-repeat;
    background-size: cover;">
        <div class="container">
          <div class="inner">
            <h1>TOURS</h1>
            <ol class="breadcrumb">
              <li>
                <a href="index.html">Trang Chủ</a>
              </li>
              <li>Tours</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- ========== MAIN ========== -->
      <main class="rooms-list-view">
        <div class="container">
          <!-- ITEM -->
          <div class="room-list-item">
            <div class="row">
              <div class="col-lg-4">
                <figure class="gradient-overlay-hover link-icon">
                  <a href="room.html"><img src="images/rooms/single/single1.jpg" class="img-fluid" alt="Image"></a>
                </figure>
              </div>
              <div class="col-lg-6">
                <div class="room-info">
                  <h3 class="room-title">
                    <a href="room.html">@{{detail_addres.ten_tour}}</a>
                  </h3>
                  <span class="room-rates">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <a href="room.html#room-reviews">5.00 Based on 3 Ratings</a>
                  </span>
                  <p>@{{detail_addres.mo_ta}}</p>

                </div>
              </div>
              <div class="col-lg-2">
                <div class="room-price">
                  <span class="price">@{{numberFormat(detail_addres.don_gia)}} | @{{numberFormat(value.don_gia_2)}}</span>
                  <a href="room.html" class="btn btn-sm">VIEW DETAILS</a>
                </div>
              </div>
            </div>
          </div>

          <!-- PAGINATION -->
          <nav class="pagination">
            <ul>
              <li class="prev-pagination">
                <a href="#">
                  &nbsp;<i class="fa fa-angle-left"></i>
                  Previous &nbsp;</a>
              </li>
              <li class="active">
                <a href="#">1</a>
              </li>
              <li>
                <a href="#">2</a>
              </li>
              <li>
                <a href="#">3</a>
              </li>
              <li>...</li>
              <li>
                <a href="#">7</a>
              </li>
              <li>
                <a href="#">8</a>
              </li>
              <li>
                <a href="#">9</a>
              </li>
              <li class="next_pagination">
                <a href="#">
                  &nbsp; Next
                  <i class="fa fa-angle-right"></i>
                  &nbsp;
                </a>
              </li>
            </ul>
          </nav>
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
