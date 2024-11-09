<?php
require_once 'views/edit_kmai.php';  // Truyền dữ liệu vào view nếu cần

?>

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
                                            <form action="index.php?action=update-khuyen-mai    " method="post">
                                                <input type="hidden" name="id" value="<?php echo $promotion['id']; ?>">

                                                <div class="mb-3">
                                                    <label for="ten_khuyen_mai" class="form-label">Tên Khuyến
                                                        Mãi</label>
                                                    <input type="text" class="form-control" id="ten_khuyen_mai"
                                                        name="ten_khuyen_mai"
                                                        value="<?php echo htmlspecialchars($promotion['ten_khuyen_mai']); ?>"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mo_ta" class="form-label">Mô Tả</label>
                                                    <textarea class="form-control" id="mo_ta" name="mo_ta"
                                                        required><?php echo htmlspecialchars($promotion['mo_ta']); ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="discount_value" class="form-label">Giá Trị Giảm</label>
                                                    <input type="text" class="form-control" id="discount_value"
                                                        name="discount_value"
                                                        value="<?php echo htmlspecialchars($promotion['discount_value']); ?>"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="ngay_bat_dau" class="form-label">Ngày Bắt Đầu</label>
                                                    <input type="date" class="form-control" id="ngay_bat_dau"
                                                        name="ngay_bat_dau"
                                                        value="<?php echo htmlspecialchars($promotion['ngay_bat_dau']); ?>"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="ngay_ket_thuc" class="form-label">Ngày Kết Thúc</label>
                                                    <input type="date" class="form-control" id="ngay_ket_thuc"
                                                        name="ngay_ket_thuc"
                                                        value="<?php echo htmlspecialchars($promotion['ngay_ket_thuc']); ?>"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="trang_thai" class="form-label">Trạng Thái</label>
                                                    <select name="trang_thai">
                                                        <option value="active" <?= $promotion['trang_thai'] == 'active' ? 'selected' : '' ?>>Hoạt Động</option>
                                                        <option value="expired" <?= $promotion['trang_thai'] == 'expired' ? 'selected' : '' ?>>Hết Hạn</option>
                                                        <option value="suspended" <?= $promotion['trang_thai'] == 'suspended' ? 'selected' : '' ?>>Tạm Dừng</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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