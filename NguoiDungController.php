<?php
class NguoiDungController
{
    //Kết nối đến file model
    public $modelNguoiDung;

    public function __construct()
    {
        $this->modelNguoiDung = new NguoiDung();
    }
    //Hàm hiển thị danh sách
    public function index()
    {
        // Lấy ra dữ liệu người dùng
        $nguoiDungs = $this->modelNguoiDung->getAll();

        // Đưa dữ liệu ra view
        require_once './views/nguoidung/list_nguoi_dung.php';
    }
    //Hàm hiển thị form thêm
    public function create()
    {
        require_once './views/nguoidung/create_nguoi_dung.php';
    }
    //Hàm xử lý thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $trang_thai = $_POST['trang_thai'];

            // Validate
            $errors = [];
            if(empty($ten_nguoi_dung)){
                $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
            }
            if(empty($email)){
                $errors['email'] = 'Email là bắt buộc';
            }
            if(empty($so_dien_thoai)){
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc';
            }
            
            if(empty($trang_thai )){
                $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty ($errors)) {
                // Nếu không có lỗi thì thêm dữ liệu
                // Thêm vào CSDL
                $this->modelNguoiDung->postData($ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=nguoi-dungs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-nguoi-dung');
                exit();
            }
        }
    }
    //Hàm hiển thị form sửa
    public function edit() {
        //Lấy id
        $id = $_GET['nguoi_dung_id'];
        // Lấy thông tin chi tiết của người dùng
        $nguoiDung = $this->modelNguoiDung->getDetailData($id);
        
        //Đổ dữ liệu ra form
        require_once './views/nguoidung/edit_nguoi_dung.php';
    }
    //Hàm xử lý cập nhật dữ liệu vào CSDL
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $trang_thai = $_POST['trang_thai'];

            // Validate
            $errors = [];
            if(empty($ten_nguoi_dung)){
                $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
            }
            if(empty($email)){
                $errors['email'] = 'Email là bắt buộc';
            }
            if(empty($so_dien_thoai)){
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc';
            }
            if(empty($trang_thai )){
                $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty ($errors)) {
                // Nếu không có lỗi thì thêm dữ liệu
                // Thêm vào CSDL
                $this->modelNguoiDung->updateData($id, $ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=nguoi-dungs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-nguoi-dung');
                exit();
            }
        }
    }
    //Hàm xóa dữ liệu trong CSDL
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['nguoi_dung_id'];

            // Xóa người dùng 
              $this->modelNguoiDung->deleteData($id);

            header('Location: ?act=nguoi-dungs');
                exit();
        }
    }

}
