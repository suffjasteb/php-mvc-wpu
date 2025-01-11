<?php

class Mahasiswa_model {

    private $table = 'Mahasiswa';
    private $db;

    public function __construct() 
    {
        $this->db = new Database();
    }

    // private $mhs = [
    //     [
    //         "nama" => "Sandhika Galih",
    //         "nrp" => "028291829",
    //         "email" => "sandhika12@gmail.com",
    //         "jurusan" => "Kedokteran"
    //     ],
    //     [
    //         "nama" => "Shafwan junindra",
    //         "nrp" => "091827192",
    //         "email" => "shafwan21@gmail.com",
    //         "jurusan" => "Kehutanan"
    //     ],
    //     [
    //         "nama" => "Eko khanedy",
    //         "nrp" => "091682629",
    //         "email" => "ekokurniawan77@gmail.com",
    //         "jurusan" => "Informatika"
    //     ]
    //     ];

    // bikin beberapa variable untuk mengeloladatabase nya
    // cara connect ke database yang akan kita lakukan sekarang  adalah dengan driver PDO
    // PDO => PHP DATA OBJECT
    // MENGGUNAKAN PDO ini lebih fleksibel ketika kedepannya mau ganti db kalian misalnya bukan pakek mysql lagi

    // bikin variable untuk menampung koneksi PDO nya
    // private $dbh;  // database handler
    // statement buat nyimpen query nanti
    // private $stmt; 

   

    // lakukan koneksi ke dataase di dalam method construct



        // bikin method
        public function getAllMahasiswa() {
            // jalanin query nya
                // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
                // $this->stmt->execute();
                // // ambil data nya
                // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                $this->db->query('SELECT * FROM ' . $this->table);
                // kita tampilin semua datanya
                return $this->db->resultSet();
        }

        public function getMahasiswaById($id) {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        public function tambahDataMahasiswa($data) {
            $query = "INSERT INTO mahasiswa
            VALUES ('', :nama, :nrp, :email, :jurusan)";

            // kita jalanin query nya
            $this->db->query($query);
            // kita bind
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nrp', $data['nrp']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function hapusDataMahasiswa($id) {
            $query = "DELETE FROM mahasiswa WHERE id = :id";

            // jalanin query
            $this->db->query($query);

            $this->db->bind('id', $id);

            $this->db->execute();
            // cek apakah ada baris yang terpengaruh
            return $this->db->rowCount();
        }
}