
<!doctype html>
<html lang="vi" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách người dùng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý người dùng" name="description" />
    <meta content="Your Company" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
</head>

<body>

    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Quản Lý Trạng Thái Khuyến Mãi</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Khuyến Mãi</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách khuyến mãi</h4>
                                    <a href="?action=add" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i> Thêm khuyến mãi mới</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên khuyến mãi</th>
                                                <th>Mô tả</th>
                                                <th>Giá trị giảm giá</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($promotions) && count($promotions) > 0) {
                                                foreach ($promotions as $promo) {
                                                    echo "<tr>";
                                                    echo "<td>" . $promo["id"] . "</td>";
                                                    echo "<td>" . $promo["ten_khuyen_mai"] . "</td>";
                                                    echo "<td>" . $promo["mo_ta"] . "</td>";
                                                    echo "<td>" . $promo["discount_value"] . "%</td>";
                                                    echo "<td>" . $promo["ngay_bat_dau"] . "</td>";
                                                    echo "<td>" . $promo["ngay_ket_thuc"] . "</td>";
                                                    echo "<td><span class='badge bg-" . 
                                                        ($promo["trang_thai"] == 'active' ? "success" : 
                                                        ($promo["trang_thai"] == 'expired' ? "danger" : 
                                                        ($promo["trang_thai"] == 'suspended' ? "warning" : "secondary"))) . 
                                                        "'>" . ucfirst($promo["trang_thai"]) . "</span></td>";
                                    
                                                    echo "<td>";
                                                        echo "<a href='?action=edit-khuyen-mai&id=" . $promo["id"] . "' class='btn btn-warning btn-sm me-1'>Sửa</a>";
                                                        echo "<a href='?action=delete-khuyen-mai&id=" . $promo["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa khuyến mãi này không?\")'>Xóa</a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='8' class='text-center'>Không có dữ liệu</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Your Company.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Your Company
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>
</html>
