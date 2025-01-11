<?php

// kita bikin class Home sebagai Child dari Controller
class Home extends Controller{
    // kita bikin method
    // jadi kita ketika kita gak menulis apapun di url nya maka method inilah yang akan di panggil
    public function index() {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}