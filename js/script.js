var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");
//Live search pakai ajax
// keyword.addEventListener("keyup", function () {
//   var xhr = new XMLHttpRequest();

//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       container.innerHTML = xhr.responseText;
//       //   alert("ajax oke");\
//       //   alert(xhr.responseText);
//     }
//   };
//   xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
//   xhr.send();
// });

$(document).ready(function () {
  $("#tombol-cari").hide();

  $("#keyword").on("keyup", function () {
    // $(".loader").show();

    //live search pakai load
    // $("#container").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val());

    $.get("ajax/mahasiswa.php?keyword=" + $("#keyword").val(), function (data) {
      $("#container").html(data);
      // $(".loader").hide();
    });
  });
});
