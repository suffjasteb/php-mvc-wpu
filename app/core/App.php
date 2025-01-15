<?php

class App {
    // bikin properti
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = []; // params => parameter
    public function __construct()
    {
        // url akan berisi apapun yang kita ketikan di url
        $url = $this->parseURL();

        // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            // supaya kita bisa ngambil parameternya
            unset($url[0]);
        }
        // misal app/controllers/Home.php
        require_once '../app/controllers/' . $this->controller . '.php';
        // kita instansiasi
        $this->controller = new $this->controller;

        // kita bikin untuk method nya
        // jika url index ke 1 di set
        if (isset($url[1])) {
            // cek method nya ada ga di dalam controller nya
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        // kalo $url params ga kosong
        if (!empty($url)) {
            // ambil parameter nya masukin ke params
            $this->params = array_values($url);
        }

        // Jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }
                             //controller about | method page | parameter 10/20
    // http://localhost/phpmvc/public/about/page/10/20

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/"); // hilangin tanda / di akhir jadi cuma butuh string string nya
            $url = filter_var($url, FILTER_SANITIZE_URL); // filter url yang ngaco atau url url yang memungkinkan url kita di hack
            $url =  explode("/", $url); // url nya kita pecah berdasarkan tanda slash /
            return $url;
        }
    }
}
// file htAccsess ini adalah file yang bisa kita gunakan untuk memodifikasi konfigurasi dari server apache kita 
// .htacsess => mengeblok akses 

// sembunyikan warning
error_reporting(E_ALL & ~E_WARNING);
