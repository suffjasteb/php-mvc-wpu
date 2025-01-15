$(function () {
  // ketika dokumen nya sudah siap jalankan fungsi di dalam nya

  $(".tombolTambahData").on("click", function () {
    $("#forModalLabel").html("tambah data mahasiswa");
    $(".modal-footer button[type=submit]").html("tambah data");

    // Kosongkan semua input di dalam modal
    $("#nama").val("");
    $("#nrp").val("");
    $("#email").val("");
    $("#jurusan").val("");
  });

  //   jquery tolong carikan sebuah elemen yang nama class nya tampilModalUbah
  $(".tampilModalEdit").on("click", function () {
    // cariin elemen yang id nya formModalLabel kalau udah ganti isinya
    $("#formModalLabel").html("ubah data mahasiswa");
    // jquery tolong carikan elemen yang class nya modal-footer, ambil button di dalam nya, tapi yang tipe nya submit saja
    $(".modal-footer button[type=submit]").html("ubah data");

    // pas di klik ubah data harusnya ke method edit
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/mahasiswa/edit"
    );

    // ambil id button yang di klik
    const id = $(this).data("id");
    // jalankan ajax
    $.ajax({
      // saya mau ngambil data ke url mana
      url: "http://localhost/phpmvc/public/mahasiswa/getedit",
      // id sebelah kiri adalah nama data yang di kirimkan dan id sebelah kanan itu adalah isi data nya
      data: { id: id },
      // data nya akan kita kirim dengan method POST
      method: "post",
      // tipe data json jadi nanti ajax ini dia akan mengharapkan data berupa json
      dataType: "json",
      // ketika success kita jalankan sebuah function
      success: function (data) {
        // jquery tolong carikan saya elemen yang id nya nama lalu ubah value nya ganti denga data.nama
        $("#nama").val(data.nama);
        $("#nrp").val(data.nrp);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });
  });
});
