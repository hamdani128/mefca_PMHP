function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

function cmb_kategori(data) {
    const optionsData = data;
    const select = document.getElementById('cmb_kategori');
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

function cmb_kategoriEdit(data) {
    const optionsData = data;
    const select = document.getElementById('cmb_kategori_update');
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

var app = angular.module('HargaUjiAdmin', ['datatables'])
app.controller('HargaUjiAdminController', function ($scope, $http) {
    $scope.LoadDataDaftarUji = function () {
        $http.get(base_url('opr/master/getdata_daftar_uji'))
            .then(function (response) {
                $scope.DataDaftar = response.data.daftar_harga;
                cmb_kategori(response.data.kategori);
                cmb_kategoriEdit(response.data.kategori);
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.LoadDataDaftarUji();
    $scope.add_daftar_uji = function () {
        $("#my-modal").modal('show');
    }

    $scope.Insert_daftar_harga = function () {
        var kategori_id = $("#cmb_kategori").val();
        var detail_parameter = $("#add_detail_parameter").val();
        var metode = $("#add_metode").val();
        var lambang = $("#add_lambang").val();
        var qty = $("#add_qty").val();
        var tarif_umum = $("#add_tarif_umum").val();
        var tarif_mahasiswa = $("#add_tarif_mahasiswa").val();

        if (kategori_id == "" || detail_parameter == "" || metode == "" || lambang == "" || qty == "" || tarif_umum == "" || tarif_mahasiswa == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Semua Field Wajiib Diisi !'
            });
        } else {
            var formdata = {
                kategori_id: kategori_id,
                detail_parameter: detail_parameter,
                metode: metode,
                lambang: lambang,
                qty: qty,
                tarif_umum: tarif_umum,
                tarif_mahasiswa: tarif_mahasiswa
            };
            $http.post(base_url('opr/master/insert_daftar_uji'), formdata)
                .then(function (response) {
                    if (response.data.status == "success") {
                        $("#my-modal").modal("toggle");
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Tersimpan!'
                        });
                        $scope.LoadDataDaftarUji();
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.EditShow = function (dt) {
        $("#id_update").val(dt.id);
        $("#cmb_kategori_update").val(dt.kategori_id);
        $("#edit_detail_parameter").val(dt.detail_parameter);
        $("#edit_metode").val(dt.metode);
        $("#edit_lambang").val(dt.lambang);
        $("#edit_qty").val(dt.qty);
        $("#edit_tarif_umum").val(dt.tarif_umum);
        $("#edit_tarif_mahasiswa").val(dt.tarif_mahasiswa);
        $("#my-modal-edit").modal('show');
    }

    $scope.UpdateDataDaftarUji = function () {
        var formdata = {
            id: $("#id_update").val(),
            kategori_id: $("#cmb_kategori_update").val(),
            detail_parameter: $("#edit_detail_parameter").val(),
            metode: $("#edit_metode").val(),
            lambang: $("#edit_lambang").val(),
            qty: $("#edit_qty").val(),
            tarif_umum: $("#edit_tarif_umum").val(),
            tarif_mahasiswa: $("#edit_tarif_mahasiswa").val(),
        }
        $http.post(base_url('opr/master/update_daftar_uji'), formdata)
            .then(function (response) {
                if (response.data.status == "success") {
                    $("#my-modal-edit").modal("toggle");
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diupdate!'
                    });
                    $scope.LoadDataDaftarUji();
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }


    $scope.DeleteData = function (dt) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data Daftar Uji ' + dt.detail_parameter + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var formdata = {
                    id: dt.id,
                };
                $http.post(base_url('opr/master/delete_daftar_uji'), formdata)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            $scope.LoadDataDaftarUji();
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Terhapus!'
                            });
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat proses data:', error);
                    });
            }
        });
    }

});