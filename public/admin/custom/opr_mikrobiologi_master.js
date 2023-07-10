function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

function add_data_mikrobiologi_master() {
    $('#my-modal-add').modal('show');
}

var app = angular.module('admin_microbiologi_master', ['datatables']);
app.controller('ControllerMicrobiologi', function ($scope, $http) {
    function LoadDataParameterMikrobiologi() {
        $http.get(base_url('opr/mikrobiologi/getdata_master'))
            .then(function (response) {
                $scope.MikroMaster = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataParameterMikrobiologi();

    $scope.ShowMasterMikro = function (dt) {
        $scope.data = angular.copy(dt);
        $("#id_update").val($scope.data.id);
        $("#parameter_update").val($scope.data.parameter);
        $("#satuan_update").val($scope.data.satuan);
        $("#metode_update").val($scope.data.metode);
        $("#my-modal-edit").modal('show');
    }

    $scope.UpdateDataMikro = function () {
        var id = $("#id_update").val();
        var parameter = $("#parameter_update").val();
        var satuan = $("#satuan_update").val();
        var metode = $("#metode_update").val();

        var newData = {
            id: id,
            parameter: parameter,
            satuan: satuan,
            metode: metode,
        };
        $http.post(base_url('opr/mikrobiologi/update_master'), newData)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diperbaharui !'
                    });
                    LoadDataParameterMikrobiologi();
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }

    $scope.DeleteMasterMikro = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data parameter ' + $scope.data.parameter + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Delete',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/mikrobiologi/delete_parameter'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Terhapus!'
                            });
                            LoadDataParameterMikrobiologi()
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat proses data:', error);
                    });
            }
        });
    }


});

function SimpanMasterMikrobiologi() {
    var parameter = $("#parameter").val();
    var satuan = $("#satuan").val();
    var metode = $("#metode").val();

    if (parameter == "" || satuan == "" || metode == "") {
        Swal.fire({
            icon: 'warning',
            title: 'Notification',
            text: 'Wajib Mengisi Field - Field yang Terisi !'
        });
    } else {
        var formdata = new FormData();
        formdata.append('parameter', parameter);
        formdata.append('satuan', satuan);
        formdata.append('metode', metode);
        fetch(base_url('opr/mikrobiologi/insert_parameter'), {
            method: 'POST',
            body: formdata
        }).then(response => response.json()).then(data => {
            if (data.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Good Job',
                    text: 'Data Berhasil Disimpan !'
                });
                document.location.reload();
            }
        }).catch(error => console.error(error));
    }
}