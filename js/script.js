// ambil elemen
let keyword = document.getElementById("keyword");
let cari = document.getElementById("cari");
let content = document.getElementById("content");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // buat object ajax
  let ajax = new XMLHttpRequest();

  // cek kesiapan ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      content.innerHTML = ajax.responseText;
    }
  };

  // eksekusi ajax
  ajax.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
  ajax.send();
});
