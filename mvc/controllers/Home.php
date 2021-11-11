<?php
class Home extends Controller
{
    public function SayHi(){
        $teo = $this->model("SinhVienModel");
        echo $teo->GetSV();

        //View
    }

    public function Show($a, $b)
    {
        $tong = $this->model("SinhVienModel");
        echo $tong->Tong($a, $b);
        $this->view("aoxau", [
            "Page"=>"News",
            "Number"=>$tong, 
            "color"=>"red",
            "sv" => $tong->SinhVien()
        ]);
    }
}

?>