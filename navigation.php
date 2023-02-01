<?php include('handling/handling_navigation.php'); ?>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="dashboard.php" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block"><?php echo $_SESSION['enterprise_code']; ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="queryEnterprises" placeholder="Tìm kiếm doanh nghiệp" title="Tìm kiếm doanh nghiệp">
            <button type="submit" title="Tìm kiếm" name="search"><i class="bi bi-search"></i></button>
        </form>
    </div>
</header>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Tổng quan</span>
            </a>
        </li>
        <li class="nav-heading">Thông tin</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="financial_report.php">
                <i class="bi bi-newspaper"></i>
                <span>Báo cáo tài chính</span>
            </a>
        </li>
        <li class="nav-heading">Biểu đồ</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#"
               aria-expanded="false">
                <i class="bi bi-bar-chart"></i><span>Biểu đồ</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="charts_line.php">
                        <i class="bi bi-circle"></i><span>Biểu đồ đường</span>
                    </a>
                </li>
                <li>
                    <a href="charts_column.php">
                        <i class="bi bi-circle"></i><span>Biểu đồ cột</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="predict.php">
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
                    <a href="calculator_canslim.php">
                        <i class="bi bi-circle"></i><span>Canslim</span>
                    </a>
                </li>
                <li>
                    <a href="calculator_4m.php">
                        <i class="bi bi-circle"></i><span>4M</span>
                    </a>
                </li>
            </ul>
        </li>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link collapsed" href="pages-register.html">-->
<!--                <i class="bi bi-card-list"></i>-->
<!--                <span>Hướng dẫn sử dụng</span>-->
<!--            </a>-->
<!--        </li>-->
    </ul>
</aside>
