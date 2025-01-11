<?php 
 
 class Flasher {
    public static function setFlash($pesan, $aksi, $tipe) {
       $_SESSION['flash'] = [
         'pesan' => $pesan,
         'aksi' => $aksi,
         'tipe' => $tipe
       ];
    }

    public static function  flash() {
      // kita cek di sebuah halaman itu ada session nya ga
      if (isset($_SESSION['flash'])) {
         echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
         Data Mahasiswa : <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       // kalo halaman di refresh/pindah halaman nanti session nya udah ga bisa dipakai lagi
       unset($_SESSION['flash']);
      }
    }
 }