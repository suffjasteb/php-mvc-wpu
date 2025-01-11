<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct() 
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host .  ';dbname=' . $this->db_name;

        $option = [
            // parameter dari konfigurasi database nya
            // untuk membuat detabase kita koneksi nya terjaga terus
            PDO::ATTR_PERSISTENT => true,
            // untuk mode errornya => tampilkan exception
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            // kalo error kita berhentikan progamnya kasi pesan
            die($e->getMessage());
        }
    }

    // selanjutnya kita butuh function untuk menjalankan query
    public function query($query) {
        // kita siapin 
        $this->stmt = $this->dbh->prepare($query);
    }


    public function bind($param, $value, $type = null) {
        // kalo type nya null
        if(is_null($type)) {
            // ini supaya switch nya jalan aja
            switch (true) {
                // kalo value nya integer
                case is_int($value) :
                    // otomatis kita set tipe nya jadi parameter integer
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                break;
                // SELAIN DARI ITU
                default : 
                $type = PDO::PARAM_STR;
            }
        }

        // kalo udah ketahuan disini kita tulis
        // SQL injection adalah teknik cyber crime yang melibatkan pencurian dan manipulasi database dengan melalui input kode SQL. Artikel ini menjelaskan cara kerja, dampak, dan tips mengatasinya den… Lihat lainnya Apa ITU SQL Injection? SQL injection adalah salah satu teknik pemanfaatan celah keamanan yang terdapat … Lihat lainnya Lihat lainnya Jagoan Hosting Contoh SQL Injection SQL injection adalah bentuk kecurangan dari para hacker yang melakukan eksekusi dengan melakukan manipulasi terhadap query SQL standar dengan tujuan untuk melakuk… Lihat lainnya Lihat lainnya Jagoan Hosting Cara Mengatasi SQL Injection Setelah mengetahui dampak negatif SQL injection, ternyata cukup membuat para pengguna cemas, ya? Lantas, adakah solusi untuk mencegahnya? Langsung saja, simak pe… Lihat lainnya Lihat lainnya Jagoan Hosting Jelajahi detail selengkapnya Apa itu SQL Injection dan Bagaimana Cara Mencegahnya - D… SQL injection adalah teknik penyalahgunaan celah keamanan pada lapisan database sebuah aplikasi. Artikel ini menjelaskan cara kerja, contoh, dan tips mencegah injeksi SQL dengan met… Ikon Web Global Dewaweb · https://www.dewaweb.com/blog/ap… Umpan Balik Daftar Isi Apa ITU SQL Injection? Contoh SQL Injection Cara Mengatasi SQL Injection SQL Injection adalah teknik peretasan dengan cara menyalahgunakan celah keamanan yang ada di lapisan SQL berbasis data suatu aplikasi
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() 
    {
        $this->stmt->execute();
    }


    // setelah di eksekusi hasilnya mau banyak atau cuma 1 aja datanya
    // kalau banyak
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // kalo misalkan pinginnya cuma 1
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // row count punya kita
    public function rowCount() {
        // row count punya PDO
        return $this->stmt->rowCount();
    }
}