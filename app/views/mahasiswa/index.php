<div class="container mt-3">

<!-- tampilin message flash di atas button tambah data -->

<div class="row">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <!-- modal itu elemen yang akan muncul ketika kita triger menggunakan tombol biasanya -->
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
  Tambah data Mahasiswa
</button>
<br><br>
        <h3>Daftar Mahasiswa</h3>
        <ul class="list-group">
        <?php foreach($data['mhs'] as $mhs) : ?>
  <li class="list-group-item"><?= $mhs['nama'] ?> 
  <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge text-bg-primary float-end">detail</a>
  <a href="<?= BASEURL ?>/mahasiswa/delete/<?= $mhs['id'] ?>" class="badge text-bg-danger float-right float-end me-2" onclick="return confirm(' <?= $mhs['nama'] ?> akan di hapus ?')">delete</a></li>
  <?php endforeach; ?>
</ul>
    </div>
</div>
        </div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <!-- nama -->
       <div class="mb-3">
       <label for="nama" class="form-label">Nama</label>
       <input type="text" id="nama" name="nama" class="form-control">
       </div>
      
      <!-- nrp -->
      <div class="mb-3">
       <label for="nrp" class="form-label">nrp</label>
       <input type="number" id="nrp" name="nrp" class="form-control">
       </div>

       <!-- email -->
      <div class="mb-3">
       <label for="email" class="form-label">email</label>
       <input type="email" id="email" name="email" class="form-control">
       </div>

       <!-- jurusan -->
 <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
  <option selected>Jurusan</option>
  <option value="teknik informatika">Teknik Informatika</option>
  <option value="hukum">hukum</option>
  <option value="pertanian">pertanian</option>
  <option value="rpl">rekayasa perangkat lunak</option>
  <option value="teknik logistik">teknik logistik</option>
</select>

       </div> 
      <!-- btn -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>