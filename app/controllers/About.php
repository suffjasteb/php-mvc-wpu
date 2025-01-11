<?php

class About extends Controller {
    // method index
    public function index($nama = "afan", $hobi = "tidur" ) {
        // kirim data ke views index
        $data['nama'] = $nama;
        $data['hobi'] = $hobi;
        $data['judul'] = 'About';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    // method page
    public function page() {
        $data['judul'] = 'pages';
        $this->view('templaters/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}