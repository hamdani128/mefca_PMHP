function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

function cmb_kategori_register(data) {
    const optionsData = data;
    const select = document.getElementById('cmb_kategori_register');
    select.innerHTML = '';
    // Add the default "Pilih" option
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.text = 'Silahkan Pilih';
    select.appendChild(defaultOption);

    optionsData.forEach(option => {
        const newOption = document.createElement('option');
        newOption.value = option.id;
        newOption.text = option.kategori;
        select.appendChild(newOption);
    });
}

var app = angular.module('adminregister', ['datatables']);
app.controller('ControllerRegister', function ($scope, $http) {
    function LoadDataRegister() {
        $http.get(base_url('opr/register/getdata_register_instansi'))
            .then(function (response) {
                $scope.dataregister = response.data;
                console.log($scope.dataregister);
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataRegister();

    $scope.add_data = function () {
        $("#my-modal-add").modal('show');
    }

    $scope.kosongkan_form = function () {
        $("#cmb_ipi").val("");
        $("#cmb_instansi").val("");
        $("#nama").val("");
        $("#alamat").val("");
        $("#telepon").val("");
        $("#fax").val("");
        $("#email").val("");
        $("#tgl_hccp").val("");
        $("#no_hccp").val("");
        $("#product_hccp").val("");
        $("#ratting_hccp").val("");
    }

    $scope.Submit_pendaftaran_by_admin = function () {
        var cmb_ipi = $("#cmb_ipi").val();
        var cmb_instansi = $("#cmb_instansi").val();
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var telepon = $("#telepon").val();
        var fax = $("#fax").val();
        var email = $("#email").val();
        var tgl_hccp = $("#tgl_hccp").val();
        var no_hccp = $("#no_hccp").val();
        var product_hccp = $("#product_hccp").val();
        var ratting_hccp = $("#ratting_hccp").val();
        if (cmb_ipi == "" || cmb_instansi == "" || nama == "" || alamat == "" || telepon == "" || fax == "" || email == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Semua Field Wajiib Diisi !'
            });
        } else {
            var formupload = document.getElementById("form_pendaftaran_admin");
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
                    $("#my-modal-add").modal("toggle");
                    LoadDataRegister();
                }
            }).catch(error => console.error(error));
        }
    }

    $scope.ValidasiRegister = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin mengaktifkan akun ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Active',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/register/validasi_akun'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            LoadDataRegister();
                        } else if (data.status == "akun_ready") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Alert',
                                text: 'Akun Sudah Terdaftar!'
                            });
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat menyimpan data:', error);
                    });
            }
        });
    }

    $scope.ShowPassworRegister = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        $http.post(base_url('opr/register/show_password_akun'), newData)
            .then(function (response) {
                $scope.passwordshow = response.data;
                $("#my-modal-show-password").modal("show");

            }).catch(function (error) {
                console.error('Terjadi kesalahan saat menyimpan data:', error);
            });
    }

    $scope.DeleteRegister = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin Menghapus Akun  ' + $scope.data.no_register + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Delete',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/register/delete_register_instansi'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            LoadDataRegister();
                            Swal.fire({
                                icon: 'success',
                                title: 'Good Luck',
                                text: 'Data Berhasil Didaftar!'
                            });
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat menyimpan data:', error);
                    });
            }
        });
    }

    $scope.PrintRegister = function (dt) {
        document.location.href = base_url('pendaftaran/dokumen_register/' + dt.no_registrasi);
    }

    $scope.PermohononaPengujian = function (dt) {
        var formdata = {
            no_pelanggan: dt.no_registrasi,
        }
        $http.post(base_url('opr/register/getdata_antrian_permohononan'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "Ready") {
                    Swal.fire({
                        icon: 'info',
                        title: 'Notifikasi',
                        text: 'Pelanggan ini Sudah Terdaftar Dipermohonan!'
                    });
                } else {
                    document.getElementById("form_no_pelanggan").innerHTML = dt.no_registrasi;
                    document.getElementById("form_Kategori").innerHTML = dt.instansi;
                    document.getElementById("form_nama").innerHTML = dt.nama;
                    document.getElementById("form_kontak").innerHTML = dt.kontak;
                    document.getElementById("form_alamat").innerHTML = dt.alamat;
                    document.getElementById("form_kategori_uji").innerHTML = dt.kategori;
                    $("#my-modal-pengajuan").modal('show');
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat menyimpan data:', error);
            });


    }

    $scope.getKategoriParameter = function () {
        $http.get(base_url('opr/register/getdata_kategori_parameter'))
            .then(function (response) {
                cmb_kategori_register(response.data)
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.getKategoriParameter();

    $scope.Submit_Pengajuan = function () {
        var table = document.getElementById("tb_listPangambilan").getElementsByTagName("tbody")[0];
        var rows = table.getElementsByTagName("tr");
        var detail = [];
        var no_pelanggan = document.getElementById("form_no_pelanggan").innerHTML;
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var kategori = row.cells[1].innerHTML;
            var detail_parameter = row.cells[2].innerHTML;
            var metode = row.cells[3].innerHTML;
            var lambang = row.cells[4].innerHTML;
            var harga = parseFloat(row.cells[5].innerHTML);
            var rowData = {
                kategori: kategori,
                detail_parameter: detail_parameter,
                metode: metode,
                lambang: lambang,
                harga: harga
            };
            detail.push(rowData);
        }

        var formdata = {
            no_pelanggan: no_pelanggan,
            detail: detail,
        }
        $http.post(base_url('opr/register/insert_pengambilan_pengujian'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    LoadDataRegister();
                    Swal.fire({
                        icon: 'success',
                        title: 'Good Luck',
                        text: 'Data Berhasil Diajukan!'
                    });
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat menyimpan data:', error);
            });
    }
});

// Fungsi untuk mengisi tbody dengan data
function populateTable(data) {
    var tbody = document.getElementById("tbody_detail");
    // Bersihkan isi tbody sebelum mengisi ulang
    tbody.innerHTML = "";
    if (data === null) {
        tbody.innerHTML = '<tr><td colspan="7" class="text-dark" align="center"><h5>No Record Found.</h5></td></tr>'
    } else {
        var tr = '';
        var a = 1;
        // var subsm1, subsm2, subsm0, trxm1, trxm2, trxm0, revm1, revm2, revm0, MoM2_Subs, MoM_Subs, MoM2_trx, MoM_trx, MoM2_rev, MoM_rev;
        for (var i in data) {
            var tr = '';
            var x = 1;
            for (var i in data) {
                tr += `<tr>
                <td align="center">${x++}</td>
                <td style="text-align: text;">${data[i].detail_parameter}</td>
                <td style="text-align: text;">${data[i].metode}</td>
                <td style="text-align: text;">${data[i].lambang}</td>
                <td style="text-align: text;">${data[i].qty}</td>
                <td style="text-align: text;">${data[i].tarif}</td>
                <td style="text-align: text;">
                    <button class="btn btn-sm btn-info" onclick="in_check_insert('${data[i].detail_parameter}', '${data[i].metode}', '${data[i].lambang}', '${data[i].tarif}')">
                        <i class="fa fa-check"></i>
                    </button>
                </td>
            </tr>`;
            }
            tbody.innerHTML = tr;
        }
        tbody.innerHTML = tr;
    }
}


function get_detail_daftar_harga() {
    var cmb_kategori = $("#cmb_kategori_register").val();
    var kategori_instansi = $("#form_Kategori").val();
    var formdata = new FormData();
    formdata.append("kategori_id", cmb_kategori);
    formdata.append("instansi", kategori_instansi);
    fetch(base_url('opr/register/get_data_detail_parameter'), {
        method: 'POST',
        body: formdata
    }).then(response => response.json()).then(data => {
        populateTable(data);
    }).catch(error => console.error(error));
}

function in_check_insert(detail_parameters, metode, lambang, harga) {
    var cmb_kategori = document.getElementById("cmb_kategori_register");
    var cmb_kategori_text = cmb_kategori.options[cmb_kategori.selectedIndex].text;

    var table = document.getElementById("tb_listPangambilan").getElementsByTagName('tbody')[0];
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);

    cell2.innerHTML = cmb_kategori_text;
    cell3.innerHTML = detail_parameters;
    cell4.innerHTML = metode;
    cell5.innerHTML = lambang;
    cell6.innerHTML = harga;
    cell7.innerHTML = "<button class='btn btn-sm btn-danger' onclick='DeleteRowPengambilan(this)'><i class='fa fa-trash'></i></button>";
    updateNomorUrutPengambilan()
    updateSubtotalPengambilan();
}

function updateNomorUrutPengambilan() {
    var table = document.getElementById("tb_listPangambilan").getElementsByTagName('tbody')[0];
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        rows[i].getElementsByTagName("td")[0].innerHTML = i + 1;
    }
}

function DeleteRowPengambilan(button) {
    var row = button.parentNode.parentNode;
    var table = row.parentNode.parentNode;
    table.deleteRow(row.rowIndex);
    updateNomorUrutPengambilan()
    updateSubtotalPengambilan();
}

function updateSubtotalPengambilan() {
    var table = document.getElementById("tb_listPangambilan").getElementsByTagName('tbody')[0];
    var rows = table.getElementsByTagName("tr");
    var subtotal = 0;

    for (var i = 0; i < rows.length; i++) {
        var harga = parseFloat(rows[i].cells[5].innerHTML);
        subtotal += harga;
    }
    var subtotalFormatted = subtotal.toLocaleString(); // Menamba
    document.getElementById("lb_subtotal_pengambilan").innerHTML = subtotalFormatted;
}