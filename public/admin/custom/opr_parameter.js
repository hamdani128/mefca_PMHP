function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

function cmb_insert_kategori(data) {
    const optionsData = data;
    const select = document.getElementById('cmb_kategori');
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
}

function cmb_update_kategori(data) {
    const optionsData = data;
    const select = document.getElementById('cmb_kategori_update');
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
}

var app = angular.module('ParameterMasterAdmin', ['datatables'])
app.controller('ParameterMasterAdminController', function ($scope, $http) {
    $scope.show_kategori_parameter = function () {
        $("#my-modal-kategori").modal('show');
    }
    $scope.LoadDataKategoriParameter = function () {
        $http.get(base_url('opr/master/getdata_kategori_parameter_uji'))
            .then(function (response) {
                $scope.post = response.data;
                // cmb data
                cmb_insert_kategori(response.data);
                cmb_update_kategori(response.data);
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.LoadDataKategoriParameter();

    $scope.insert_parameter_uji = function () {
        if ($scope.parameter_uji === undefined) {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Semua Field Wajiib Diisi !'
            });
        } else {
            var formdata = {
                kategori: $scope.parameter_uji,
            };
            $http.post(base_url('opr/master/insert_parameter_kategori'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Tersimpan!'
                        });
                        $scope.LoadDataKategoriParameter();
                        $("#parameter_uji").val("");
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.DeleteKategriParameter = function (dt) {
        var formdata = {
            id: dt.id,
        };
        $http.post(base_url('opr/master/delete_parameter_kategori'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    $scope.LoadDataKategoriParameter();
                    $("#parameter_uji").val("");
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }

    $scope.add_parameter_add = function () {
        $("#my-modal-add").modal('show');
    }



    $scope.LoadDataParameter = function () {
        $http.get(base_url('opr/master/getdata_parameter_uji'))
            .then(function (response) {
                $scope.postData = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }

    $scope.LoadDataParameter();

    $scope.Insert_list_parameter = function () {
        var kategori = $("#cmb_kategori").val();
        var list_detail = $("#list_detail").val();

        if (kategori == "" || list_detail == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Semua Field Wajiib Diisi !'
            });
        } else {
            var formdata = {
                kategori_id: $("#cmb_kategori").val(),
                list_detail: $("#list_detail").val(),
            };
            $http.post(base_url('opr/master/insert_parameter'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        $("#cmb_kategori").val("");
                        $("#list_detail").val("");
                        $("#my-modal-add").modal("toggle");
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Tersimpan!'
                        });
                        $scope.LoadDataParameter();
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.EditParameterUji = function (dt) {
        $("#id_update").val(dt.id);
        $("#cmb_kategori_update").val(dt.kategori_id);
        $("#list_detail_update").val(dt.parameter);
        $("#my-modal-show-edit").modal('show');
    }

    $scope.Update_list_parameter = function () {
        var formdata = {
            id: $("#id_update").val(),
            kategori_id: $("#cmb_kategori_update").val(),
            list_detail: $("#list_detail_update").val(),
        };
        $http.post(base_url('opr/master/update_parameter'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    $("#my-modal-show-edit").modal("toggle");
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Terupdate!'
                    });
                    $scope.LoadDataParameter();
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }

    $scope.DeleteParameterUji = function (dt) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data parameter ' + dt.parameter + ' ?',
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
                $http.post(base_url('opr/master/delete_parameter'), formdata)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            $scope.LoadDataParameter();
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
