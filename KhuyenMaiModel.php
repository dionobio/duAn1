<?php
class KhuyenMaiModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = connectDB(); // Giả sử connectDB() đã được định nghĩa ở ngoài
    }

    // Lấy tất cả khuyến mãi
    public function getAll()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM khuyen_mais"); // Đảm bảo tên bảng đúng
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý lỗi khi kết nối không thành công
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
            return false;
        }
    }

    // Lấy thông tin khuyến mãi theo ID
    public function getById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM khuyen_mais WHERE id = :id"); // Đảm bảo tên bảng đúng
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi khi lấy dữ liệu khuyến mãi: " . $e->getMessage();
            return false;
        }
    }
    
    // Thêm khuyến mãi mới
    public function add($ten_khuyen_mai, $mo_ta, $discount_value, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO khuyen_mais (ten_khuyen_mai, mo_ta, discount_value, ngay_bat_dau, ngay_ket_thuc, trang_thai) 
                                         VALUES (:ten_khuyen_mai, :mo_ta, :discount_value, :ngay_bat_dau, :ngay_ket_thuc, :trang_thai)");
            return $stmt->execute([
                'ten_khuyen_mai' => $ten_khuyen_mai,
                'mo_ta' => $mo_ta,
                'discount_value' => $discount_value,
                'ngay_bat_dau' => $ngay_bat_dau,
                'ngay_ket_thuc' => $ngay_ket_thuc,
                'trang_thai' => $trang_thai
            ]);
        } catch (PDOException $e) {
            echo "Lỗi khi thêm khuyến mãi: " . $e->getMessage();
            return false;
        }
    }

    // Cập nhật khuyến mãi theo ID
    public function update($id, $ten_khuyen_mai, $mo_ta, $discount_value, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE khuyen_mais 
                                         SET ten_khuyen_mai = :ten_khuyen_mai, mo_ta = :mo_ta, discount_value = :discount_value, 
                                             ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc, trang_thai = :trang_thai 
                                         WHERE id = :id");
            return $stmt->execute([
                'id' => $id,
                'ten_khuyen_mai' => $ten_khuyen_mai,
                'mo_ta' => $mo_ta,
                'discount_value' => $discount_value,
                'ngay_bat_dau' => $ngay_bat_dau,
                'ngay_ket_thuc' => $ngay_ket_thuc,
                'trang_thai' => $trang_thai
            ]);
        } catch (PDOException $e) {
            echo "Lỗi khi cập nhật khuyến mãi: " . $e->getMessage();
            return false;
        }
    }

    // Xóa khuyến mãi theo ID
    public function delete($id)
{
    try {
        // Bắt đầu transaction
        $this->pdo->beginTransaction();

        // Xóa bản ghi
        $stmt = $this->pdo->prepare("DELETE FROM khuyen_mais WHERE id = :id");
        $stmt->execute(['id' => $id]);

        // Cập nhật lại ID cho các bản ghi còn lại
        $stmt = $this->pdo->prepare("UPDATE khuyen_mais SET id = id - 1 WHERE id > :id");
        $stmt->execute(['id' => $id]);

        // Reset lại giá trị AUTO_INCREMENT
        $stmt = $this->pdo->query("SELECT MAX(id) AS max_id FROM khuyen_mais");
        $row = $stmt->fetch();
        $max_id = $row['max_id'];

        // Đặt lại giá trị AUTO_INCREMENT
        if ($max_id !== null) {
            $this->pdo->query("ALTER TABLE khuyen_mais AUTO_INCREMENT = " . ($max_id + 1));
        } else {
            $this->pdo->query("ALTER TABLE khuyen_mais AUTO_INCREMENT = 1");
        }

        // Commit transaction nếu mọi thứ thành công
        $this->pdo->commit();

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        // Nếu có lỗi, rollback transaction
        if ($this->pdo->inTransaction()) { // Kiểm tra nếu transaction đang mở
            $this->pdo->rollBack();
        }
        echo "Lỗi khi xóa khuyến mãi: " . $e->getMessage();
        return false;
    }
}

}

?>