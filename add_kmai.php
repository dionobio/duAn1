<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm Khuyến Mãi Mới</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản Lý Khuyến Mãi</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Khuyến Mãi</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <!-- Striped Rows -->
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Khuyến Mãi Mới</h4>
                                        <div class="flex-shrink-0">
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="index.php?action=add-khuyen-mai" method="post" enctype="multipart/form-data">
                                                <h2 class="mb-4">Thêm Khuyến Mãi Mới</h2>
                                                
                                                <div class="mb-3">
                                                    <label for="ten_khuyen_mai" class="form-label">Tên Khuyến Mãi</label>
                                                    <input type="text" class="form-control" id="ten_khuyen_mai" name="ten_khuyen_mai" required>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="mo_ta" class="form-label">Mô Tả</label>
                                                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" required></textarea>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="discount_value" class="form-label">Giá Trị Giảm Giá (%)</label>
                                                    <input type="number" class="form-control" id="discount_value" name="discount_value" step="0.01" min="0" max="100" required>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="ngay_bat_dau" class="form-label">Ngày Bắt Đầu</label>
                                                    <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau" required>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="ngay_ket_thuc" class="form-label">Ngày Kết Thúc</label>
                                                    <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="trang_thai" class="form-label">Trạng Thái</label>
                                                    <select class="form-control" id="trang_thai" name="trang_thai" required>
                                                        <option value="active">Đang Hoạt Động</option>
                                                        <option value="expired">Hết Hạn</option>
                                                        <option value="suspended">Tạm Ngừng</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Lưu Khuyến Mãi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div>

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
                data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?php
        require_once "views/layouts/libs_js.php";
        ?>

</body>

</html>
