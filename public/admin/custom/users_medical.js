function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

var app = angular.module('UsersMedical', ['datatables']);
app.controller('UsersMedicalController', function ($scope, $http) {
    function LoadDataRequest() {
        $http.get(base_url('users/labmdc/get_data_request_users'))
            .then(function (response) {
                $scope.LoadData = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataRequest();

    $scope.DeleteRequestMedical = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            request_id: $scope.data.request_id,
        }
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin Menghapus Request ID  ' + $scope.data.request_id + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Delete',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('users/labmdc/delete_request'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Good Luck',
                                text: 'Data Berhasil Delete!'
                            });
                            LoadDataRequest();
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat menyimpan data:', error);
                    });
            }
        });
    }



});

function cmb_kategori_users_medical() {
    fetch(base_url('opr/medical/getdata_kategori_master'))
        .then(response => response.json())
        .then(data => {
            const optionsData = data;
            const select = document.getElementById('cmb_pengujian');
            select.innerHTML = '';
            // Add the default "Pilih" option
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = 'Pilih';
            select.appendChild(defaultOption);

            optionsData.forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option.id;
                newOption.text = option.kategori;
                select.appendChild(newOption);
            });
        })
        .catch(error => console.error(error));
}
cmb_kategori_users_medical();

function get_list_pengujian() {
    var kategori_id = document.getElementById("cmb_pengujian").value;
    var formData = new FormData();
    formData.append('kategori_id', kategori_id);
    fetch(base_url('users/labmdc/get_list_pengujian'), {
        method: 'POST',
        body: formData,
    }).then(response => response.json()).then(data => {
        const optionsData = data;
        const select = document.getElementById('cmb_list');
        select.innerHTML = '';
        // Add the default "Pilih" option
        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Pilih';
        select.appendChild(defaultOption);

        optionsData.forEach(option => {
            const newOption = document.createElement('option');
            newOption.value = option.id;
            newOption.text = option.detail;
            select.appendChild(newOption);
        });
    }).catch(error => console.error(error));
}

function updateNomorUrut() {
    var table = document.getElementById("tb_listMedical").getElementsByTagName('tbody')[0];
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        rows[i].getElementsByTagName("td")[0].innerHTML = i + 1;
    }
}

function TambahBarisMedical() {
    var cmb_kategori = document.getElementById("cmb_pengujian");
    var cmb_kategori_text = cmb_kategori.options[cmb_kategori.selectedIndex].text;
    var cmb_list = document.getElementById("cmb_list");
    var cmb_list_value = cmb_list.options[cmb_list.selectedIndex].value;
    var cmb_list_text = cmb_list.options[cmb_list.selectedIndex].text;
    var formData = new FormData();
    formData.append('id', cmb_list_value);
    fetch(base_url('users/labmdc/get_list_harga'), {
        method: 'POST',
        body: formData,
    }).then(response => response.json()).then(data => {
        AddRowMedical(cmb_kategori_text, cmb_list_text, data.harga)
    }).catch(error => console.error(error));
}

function AddRowMedical(kategori, list, harga) {
    var table = document.getElementById("tb_listMedical").getElementsByTagName('tbody')[0];
    var row = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    cell2.innerHTML = kategori;
    cell3.innerHTML = list;
    cell4.innerHTML = harga;
    cell5.innerHTML = "<button class='btn btn-sm btn-danger' onclick='DeleteRowMedical(this)'><i class='fa fa-trash'></i></button>";
    updateNomorUrut()
    updateSubtotalMedical();
}

function DeleteRowMedical(button) {
    var row = button.parentNode.parentNode;
    var table = row.parentNode.parentNode;
    table.deleteRow(row.rowIndex);
    updateNomorUrut()
    updateSubtotalMedical();
}

function updateSubtotalMedical() {
    var table = document.getElementById("tb_listMedical").getElementsByTagName('tbody')[0];
    var rows = table.getElementsByTagName("tr");
    var subtotal = 0;

    for (var i = 0; i < rows.length; i++) {
        var harga = parseFloat(rows[i].cells[3].innerHTML);
        subtotal += harga;
    }
    var subtotalFormatted = subtotal.toLocaleString(); // Menamba
    document.getElementById("lb_subtotal").innerHTML = subtotalFormatted;
}


function simpan_data_request_medical() {
    var nik = $("#nik").val();
    var nama = $("#nama").val();
    var jk = $("#cmb_jk").val();
    var no_kontak = $("#no_kontak").val();
    var alamat = $("#alamat").val();
    var table = document.getElementById("tb_listMedical").getElementsByTagName('tbody')[0];

    if (nik == "" || nama == "" || jk == "" || no_kontak == "" || alamat == "") {
        Swal.fire({
            icon: 'info',
            title: 'Alert',
            text: 'Harap Wajib Mengisi Field - Field Terisi !'
        });
    } else if (table.rows.length === 0) {
        Swal.fire({
            icon: 'info',
            title: 'Alert',
            text: 'List Pengujian Yang Diambil Wajib Terisi !'
        });
    } else {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin Menyiman data  ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, save',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                SimpanData();
            }
        });
    }
}



function SimpanData() {
    var table = document.getElementById("tb_listMedical").getElementsByTagName("tbody")[0];
    var rows = table.getElementsByTagName("tr");
    var nik = $("#nik").val();
    var nama = $("#nama").val();
    var jk = $("#cmb_jk").val();
    var no_kontak = $("#no_kontak").val();
    var alamat = $("#alamat").val();
    var detail = [];

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var kategori = row.cells[1].innerHTML;
        var list = row.cells[2].innerHTML;
        var harga = parseFloat(row.cells[3].innerHTML);
        var rowData = {
            kategori: kategori,
            list: list,
            harga: harga
        };
        detail.push(rowData);
    }
    var data2 = {
        nik: nik,
        nama: nama,
        jk: jk,
        no_kontak: no_kontak,
        alamat: alamat,
        detail: detail,
    };
    fetch(base_url('users/labmdc/users_insert_request'), {
        method: 'POST',
        body: JSON.stringify(data2),
    }).then(response => response.json()).then(data => {
        if (data.status === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Good Luck',
                text: 'Data Berhasil Didaftar!'
            });
            document.location.reload();
        }
    }).catch(error => console.error(error));

}

