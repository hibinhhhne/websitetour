<header class="horizontal-header sticky-header" data-menutoggle="991">
    <div class="container">
        <!-- MOBILE MENU BUTTON -->
        <div id="toggle-menu-button" class="toggle-menu-button">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
        <!-- MAIN MENU -->
        <nav id="main-menu" class="main-menu">
            <ul class="menu">
                <li class="menu-item dropdown active">
                    <a href="/">TRANG CHỦ</a>
                </li>
                <li class="menu-item dropdown">
                    <a href="/tour">TOURS</a>
                </li>
                <li class="menu-item dropdown">
                    <a href="/gioi-thieu">GIỚI THIỆU</a>
                <li class="menu-item">
                    <a href="/contact">LIÊN HỆ</a>
                </li>
                @php
                    $user = Auth::guard('client')->check();
                    $khach_hang = Auth::guard('client')->user();
                @endphp
                @if ($user)
                <li class="menu-item dropdown">
                    <a href="#">{{$khach_hang->ho_va_ten}}</a>
                    <ul class="submenu">
                      <li class="menu-item">
                        <a href="/client/checkout">
                            Giỏ Hàng</a>
                      </li>
                      <li class="menu-item">
                        <a href="/logout">Đăng Xuất</a>
                      </li>
                    </ul>
                  </li>
                @else
                <li class="menu-item menu-btn">
                    <a href="/login-register" class="btn">
                        <i class="fa fa-calendar"></i>
                        Đăng Nhập</a>
                @endif
            </ul>
        </nav>
    </div>
</header>
