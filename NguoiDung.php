<?php 
class NguoiDung {
public $conn;

// Kết nối CSDL
public function __construct()
{
    $this->conn = connectDB(); 
}
// Danh sách người dùng
public function getAll(){
    try{
$sql = 'SELECT * FROM nguoi_dungs';

$stmt = $this->conn->prepare($sql);

$stmt->execute();

return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
}
// Thêm dữ liệu vào CSDL
public function postData($ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai){
    try{
$sql = 'INSERT INTO nguoi_dungs (ten_nguoi_dung, email, so_dien_thoai, trang_thai)
VALUES (:ten_nguoi_dung, :email, :so_dien_thoai, :trang_thai)';

$stmt = $this->conn->prepare($sql);

// Gán giá trị vào các tham số
$stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
$stmt->bindParam(':trang_thai', $trang_thai);

$stmt->execute();

return true;
    } catch (PDOException $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
}
// Lấy thông tin chi tiết
public function getDetailData($id){
    try{
$sql = 'SELECT * FROM nguoi_dungs WHERE id = :id';

$stmt = $this->conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

return $stmt->fetch();
    } catch (PDOException $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
}

// Cập nhật dữ liệu vào CSDL
public function updateData($id, $ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai){
    try{
$sql = 'UPDATE nguoi_dungs SET ten_nguoi_dung = :ten_nguoi_dung, email = :email, so_dien_thoai = :so_dien_thoai, trang_thai = :trang_thai WHERE id = :id';
$stmt = $this->conn->prepare($sql);

// Gán giá trị vào các tham số
$stmt->bindParam(':id', $id);

$stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
$stmt->bindParam(':trang_thai', $trang_thai);

$stmt->execute();

return true;
    } catch (PDOException $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
}
// Xóa dữ liệu trong CSDL
public function deleteData($id){
    try{
$sql = 'DELETE FROM nguoi_dungs WHERE id = :id';

$stmt = $this->conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

return true;
    } catch (PDOException $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
}
// Hủy kết nối CSDL 
public function __destruct()
{
    $this->conn = null; 
}
}