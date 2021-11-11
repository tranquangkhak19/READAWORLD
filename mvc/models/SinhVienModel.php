<?php
class SinhVienModel extends DB
{
    public function GetSV()
    {
        return "Nguyen Van Teo";
    }

    public function Tong($n, $m)
    {
        return $n + $m;
    }

    public function SinhVien()
    {
        $sql = "SELECT * FROM cars";
        return mysqli_query($this->conn, $sql);
    }
}
?>