function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

function register_akun() {
    $("#my-modal").modal("show");
    // $("#my-modal-success").modal("show");
}


function awal() {
    $("#instansi").val("");
    $("#nik").val("");
    $("#nama").val("");
    $("#email").val("");
    $("#hp").val("");
    $("#alamat").val("");
}

function pendaftaran() {
    var cmb_ipi = $("#cmb_ipi").val();
    var status = $("#cmb_instansi").val();
    var nama_perusahaan = $("#nama").val();
    var alamat = $("#alamat").val();
    var telepon = $("#telepon").val();
    var fax = $("#fax").val();
    var email = $("#email").val();
    if (cmb_ipi == "" || status == "" || nama_perusahaan == "" || alamat == "" || telepon == "" || fax == "" || email == "") {
        Swal.fire({
            icon: 'warning',
            title: 'Notification',
            text: 'Semua Field Wajiib Diisi !'
        });
    } else {
        var formupload = document.getElementById("form_pendaftaran");
        var formdata = new FormData(formupload);
        fetch(base_url('pendaftaran/insert_pendaftaran'), {
            method: 'POST',
            body: formdata
        }).then(response => response.json()).then(data => {
            if (data.status == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Good Jobs',
                    text: 'Anda Berhasil Register!'
                });
                $("#my-modal").modal("toggle");
                document.getElementById("no_dokumen").innerHTML = data.no_register;
                $("#my-modal-success").modal("show");
            }
        }).catch(error => console.error(error));
    }
}


function Download_Dokumen_Register() {
    var no_register = document.getElementById("no_dokumen").innerHTML;
    document.location.href = base_url('pendaftaran/dokumen_register/' + no_register);
}

