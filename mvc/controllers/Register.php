<?php

class Register extends Controller
{
    public function SayHi(){
        $this->view("aodep", [
            "Page"=>"Register",
            "color"=>"pink"
        ]);
    }
}
?>