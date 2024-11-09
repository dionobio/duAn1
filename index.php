<?php 

// Require các file cấu hình và hàm hỗ trợ chung
require_once '../commons/env.php';
require_once '../commons/function.php';

// Require Khuyen Mai 
require_once 'controllers/KhuyenMaiController.php';
require_once 'models/KhuyenMaiModel.php';



    // Route
    $act = $_GET['action'] ?? '/';

    // Match route và gọi controller tương ứng
    match ($act) {
        // User 
    'list-khuyen-mai'   => (new KhuyenMaiController())->showKmaiList(),
    'add'               => (new KhuyenMaiController())->showAddKmaiForm(),
    'add-khuyen-mai'    => (new KhuyenMaiController())->addKmai(),
    'edit-khuyen-mai'   => (new KhuyenMaiController())->showEditKmaiForm(),
    'update-khuyen-mai' => (new KhuyenMaiController())->updateKmai(),
    'delete-khuyen-mai' => (new KhuyenMaiController())->deleteKmai($_GET['id'] ?? null),
        // Tin tuc

        
        default          => (new KhuyenMaiController())->showKmaiList(),
    };