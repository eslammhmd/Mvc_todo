<?php


class HomeController extends Controller
{
    public function index(){
        // pass params to view
        $data = ["title"=>"Home"];
        $this->View('home',$data);
 
    }
    
}
