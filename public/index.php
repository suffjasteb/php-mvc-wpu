<?php 

// kalo gaada session
if (!session_id()) {
    // jalankan session start
    session_start();
}

require_once "../app/init.php"; // init ini yang nantinya akan memanggil semua file yang kita butuhin. teknik ini kita sebut bootstraping

$app = new App();