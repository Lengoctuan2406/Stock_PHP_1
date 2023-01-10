<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Doanh nghiệp</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Tìm kiếm doanh nghiệp" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
</header>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Tổng quan</span>
            </a>
        </li>
        <li class="nav-heading">Thông tin</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#information-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-plus"></i><span>Thông tin chung</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="information-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="information_see_all.php">
                        <i class="bi bi-circle"></i><span>Xem</span>
                    </a>
                </li>
                <li>
                    <a href="information_update.php">
                        <i class="bi bi-circle"></i><span>Sửa đổi</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#financial-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i><span>Báo cáo tài chính</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="financial-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="financial.html">
                        <i class="bi bi-circle"></i><span>Xem</span>
                    </a>
                </li>
                <li>
                    <a href="financial-update.html">
                        <i class="bi bi-circle"></i><span>Sửa đổi</span>
                    </a>
                </li>
                <li>
                    <a href="financial-add.html">
                        <i class="bi bi-circle"></i><span>Thêm mới</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-heading">Biểu đồ</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#"
               aria-expanded="false">
                <i class="bi bi-bar-chart"></i><span>Biểu đồ</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="charts-line.html">
                        <i class="bi bi-circle"></i><span>Biểu đồ đường</span>
                    </a>
                </li>
                <li>
                    <a href="charts-line.html">
                        <i class="bi bi-circle"></i><span>Biểu đồ cột</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-graph-up"></i>
                <span>Dự đoán</span>
            </a>
        </li>
        <li class="nav-heading">Khác</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ml-nav" data-bs-toggle="collapse" href="#"
               aria-expanded="false">
                <i class="bi bi-journal-check"></i><span>Khuyến nghị</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ml-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Canslim</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>4M</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Hướng dẫn sử dụng</span>
            </a>
        </li>
    </ul>
</aside>
