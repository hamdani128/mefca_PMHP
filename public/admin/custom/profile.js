
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
    $('#tbl_profile').DataTable();
    $('#summernote_update').summernote();
});


function add_profile() {
    $("#my-modal").modal('show');
    $('#summernote').summernote();

}

function simpan_data_profile_baru() {
    var formupload = document.getElementById("form_profile");
    var formData = new FormData(formupload);
    var summernoteValue = $('#summernote').summernote('code');
    formData.append('summernoteValue', summernoteValue);
    $.ajax({
        url: base_url("usr/profile/insert"),
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
                    text: 'Pengecekkan Telah Berhasil Silahkan Cek Hasilnya !'
                });
                document.location.reload();
            }
        },
    });
}


function EditShowProfile(id) {
    var formdata = new FormData();
    formdata.append('id', id);
    fetch(base_url('usr/profile/show_edit'), {
        method: 'POST',
        body: formdata
    }).then(response => response.json()).then(data => {
        $("#id_update").val(data.id);
        document.getElementById("img_edit").src = base_url('public/upload/profile/' + data.file_img);
        $('#summernote_update').summernote('code', data.description);
        $("#my-modal-edit").modal('show');
    }).catch(error => console.error(error));
}


function UpdateDataProfile() {
    var formupload = document.getElementById("form_profile_update");
    var formdata = new FormData(formupload);
    var summernoteValue = $('#summernote_update').summernote('code');
    formdata.append('deskripsi', summernoteValue);
    fetch(base_url('usr/profile/update_berita'), {
        method: 'POST',
        body: formdata
    }).then(response => response.json()).then(data => {
        if (data.status == 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Berhasil diperbaharui !'
            });
            document.location.reload();
        }
    }).catch(error => console.error(error));
}


function DeleteProfile(id) {
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Anda yakin ingin Menghapus Data ini ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Delete',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            var formdata = new FormData();
            formdata.append('id', id);
            fetch(base_url('usr/profile/delete_profile'), {
                method: 'POST',
                body: formdata
            }).then(response => response.json()).then(data => {
                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Terhapus !'
                    });
                    document.location.reload();
                }
            }).catch(error => console.error(error));
        }
    });
}