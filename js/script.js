$(function () {
  $(".btnTambahData").on("click", function () {
    $("#modalLabel").html("Form Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });
  $(".btnUbahData").on("click", function () {
    $("#modalLabel").html("Form Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc/public/mahasiswa/ubah"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/phpmvc/public/mahasiswa/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nrp").val(data.nrp);
        $("#nama").val(data.nama);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });
  });
});
