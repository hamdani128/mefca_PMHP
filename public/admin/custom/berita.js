function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

$(function () {
    'use strict';
    $('#tbl_berita').DataTable();
    $('#summernote2').summernote();
});

function add_berita() {
    $("#my-modal").modal('show');
    $('#summernote').summernote();

}


function simpan_data_berita() {
    if ($("#container").children().length > 0) {
        $("#container").children().each(function () {
            var imgInput = $(this).find('input[type="file"]');
            var img = imgInput[0].files[0];
            var keterangan = $(this).find('textarea').val();
            var formData = new FormData();
            formData.append('file_img', img);
            formData.append('keterangan', keterangan);
            $.ajax({
                url: base_url('usr/berita/insert_berita_detail'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                },
            });
        });
        insert_berita();
    } else {
        insert_berita();
    }
}


function insert_berita() {
    var formupload = document.getElementById("form_berita");
    var formData = new FormData(formupload);
    $.ajax({
        url: base_url("usr/berita/insert"),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Di Simpan !'
                });
                document.location.reload();
            }
        },
    });
}



function tambah_baris_gambar() {
    var container = document.getElementById("container");
    var newRow = document.createElement("div");
    newRow.className = "pt-4";

    var newImage = document.createElement("input");
    newImage.type = "file";
    newImage.className = "form-control";
    newImage.name = "image[]";
    var newText = document.createElement("textarea");
    newText.className = "form-control pt-2";
    newText.name = "text[]";
    newText.placeholder = "Masukkan Text Content Tambahan";
    var newButton = document.createElement("button");
    newButton.type = "button";
    newButton.className = "btn btn-danger mt-3";
    newButton.innerHTML = "Hapus Baris";
    newButton.addEventListener("click", function () {
        container.removeChild(newRow);
    });
    newRow.appendChild(newImage);
    newRow.appendChild(newText);
    newRow.appendChild(newButton);
    container.appendChild(newRow);
}



function delete_input_gmbr(button) {
    // dapatkan row dari button yang diklik
    var row = button.parentNode.parentNode;
    // hapus row dari tabel
    row.parentNode.removeChild(row);
}

function delete_berita_admin(judul, id) {
    Swal.fire({
        title: 'Apakah Anda ingin Menghapus Data Berita Dengan Judul ' + judul + '  ?',
        text: "Data yang telah terhapus tidak bisa dikembalikan !",
        type: 'warning',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus !',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: base_url('usr/berita/delete_berita'),
                type: 'POST',
                data: {
                    id: id,
                },
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success') {
                        Swal.fire(
                            'Good Luck !',
                            'Data Berhasil Terhapus !',
                            'success'
                        )
                        window.location.reload();
                    }
                }
            });
        }
    });
}
