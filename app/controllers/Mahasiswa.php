<?php 

class Mahasiswa extends Controller{
    public function index() {
        $data['judul'] = 'Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            // redirect
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            // redirect
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function delete($id) {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil','dihapus', 'success');
            // redirect
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            // redirect
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    

// saat saya jalankan ajax nya saya jalankan method ini lalu saya minta data nya ke model
public function getedit() {
    // json_encode => The json_encode() function is used to encode a value to JSON format.
   echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
}

public function edit() {
    if ($this->model('Mahasiswa_model')->editDataMahasiswa($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diedit', 'success');
        // redirect
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
    else {
        Flasher::setFlash('gagal', 'diedit', 'danger');
        // redirect
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
}

}