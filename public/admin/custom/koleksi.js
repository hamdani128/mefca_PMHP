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
    $('#tbl_koleksi').DataTable();
    $('#summernote').summernote();
});

function add_koleksi() {
    $("#my-modal").modal('show');
}

function simpan_data_koleksi() {
    var cmb_kategori = document.getElementById("cmb_kategori");
    var cmb_kategori_value = cmb_kategori.options[cmb_kategori.selectedIndex].value;
    var file_img = document.getElementById("file_img").isDefaultNamespace.length;
    var judul = $("#judul").val();
    var sumber = $("#sumber").val();
    var penulis = $("#penulis").val();
    var tanggal = $("#tanggal").val();
    var formupload = document.getElementById("form_koleksi");
    var summernoteValue = $('#summernote').summernote('code');

    if (cmb_kategori_value == "" || judul == "" || sumber == "" || penulis == "" || tanggal == "") {
        Swal.fire({
            icon: 'warning',
            title: 'Alert',
            text: 'Wajib Mengisi Field - Field Yang Sudah Tersedia !'
        });
    } else if (file_img == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Alert',
            text: 'Wajib Mengupload File !'
        });
    } else {
        $('.button-prevent').attr('disabled', 'true');
        $('.spinner').show();
        $('.hide-text').hide();
        var formdata = new FormData(formupload);
        formdata.append('summernoteValue', summernoteValue);
        $.ajax({
            url: base_url("usr/koleksi/insert"),
            method: "POST",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Disimpan !'
                    });
                    document.location.reload();
                }
            }
        });
    }
}