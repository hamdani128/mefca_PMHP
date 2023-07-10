function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}
function awal1() {
    $("#kategori").val('');
    $("#parameter").val('');
    $("#satuan").val('');
    $("#standart").val('');
    $("#metode").val('');
}

function awal2() {
    $("#kategori_air_bersih").val('');
    $("#parameter_air_bersih").val('');
    $("#satuan_air_bersih").val('');
    $("#standart_air_bersih").val('');
    $("#metode_air_bersih").val('');
}

function awal3() {
    $("#kategori_badan_air").val('');
    $("#parameter_badan_air").val('');
    $("#satuan_badan_air").val('');
    $("#kelas1").val('');
    $("#kelas2").val('');
    $("#kelas3").val('');
    $("#kelas4").val('');
    $("#metode_air_badan").val('');
}

var app1 = angular.module('ModuleKimiaAirMinum', ['datatables']);
app1.controller('ControllerKimiaAirMinum', function ($scope, $http) {
    function LoadDataAirMinum() {
        $http.get(base_url('opr/kimia/getdata_kimia_air_minum'))
            .then(function (response) {
                $scope.Parameter = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataAirMinum();

    $scope.AddAirMinum = function () {
        $("#air-minum-add").modal('show');
    }

    $scope.InsertAirMinum = function () {
        var kategori = $scope.kategori;
        var parameter = $scope.parameter;
        var satuan = $scope.satuan;
        var standart = $scope.standart;
        var metode = $scope.metode;

        if (kategori == "" || parameter == "" || satuan == "" || standart == "" || metode == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Wajib Mengisi Field - Field yang Terisi !'
            })
        } else {
            var formdata = {
                kategori: kategori,
                parameter: parameter,
                satuan: satuan,
                standart: standart,
                metode: metode,
            };
            $http.post(base_url('opr/kimia/insert_air_minum_paramater'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        LoadDataAirMinum();
                        awal1();
                        $('#air-minum-add').modal('toggle');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Diperbaharui !'
                        });
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.AirMinumShow = function (dt) {
        $scope.data = angular.copy(dt);
        $("#air-minum-edit").modal('show');
        $scope.id_update = $scope.data.id;
        $scope.kategori_update = $scope.data.kategori;
        $scope.parameter_update = $scope.data.parameter;
        $scope.satuan_update = $scope.data.satuan;
        $scope.standart_update = $scope.data.standart;
        $scope.metode_update = $scope.data.metode;
    }

    $scope.UpdateAirMinum = function () {
        var formdata = {
            id: $scope.id_update,
            kategori: $scope.kategori_update,
            parameter: $scope.parameter_update,
            satuan: $scope.satuan_update,
            standart: $scope.standart_update,
            metode: $scope.metode_update,
        };
        $http.post(base_url('opr/kimia/update_air_minum_paramater'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    LoadDataAirMinum();
                    awal1();
                    $('#air-minum-edit').modal('toggle');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diperbaharui !'
                    });
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }

    $scope.AirMinumDelete = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data parameter ' + $scope.data.parameter + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/kimia/delete_parameter_air_minum'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            LoadDataAirMinum()
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


var app2 = angular.module('ModuleKimiaAirBersih', ['datatables']);
app2.controller('ControllerKimiaAirBersih', function ($scope, $http) {
    function LoadDataAirBersih() {
        $http.get(base_url('opr/kimia/getdata_kimia_air_bersih'))
            .then(function (response) {
                $scope.Parameter = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataAirBersih();

    $scope.AddAirBersih = function () {
        $("#air-bersih-add").modal('show');
    }

    $scope.InsertAirBersih = function () {
        var kategori = $scope.kategori_air_bersih;
        var parameter = $scope.parameter_air_bersih;
        var satuan = $scope.satuan_air_bersih;
        var standart = $scope.standart_air_bersih;
        var metode = $scope.metode_air_bersih;

        if (kategori == "" || parameter == "" || satuan == "" || standart == "" || metode == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Wajib Mengisi Field - Field yang Terisi !'
            })
        } else {
            var formdata = {
                kategori: kategori,
                parameter: parameter,
                satuan: satuan,
                standart: standart,
                metode: metode,
            };
            $http.post(base_url('opr/kimia/insert_air_bersih_paramater'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        awal2()
                        LoadDataAirBersih();
                        $('#air-bersih-add').modal('toggle');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Diperbaharui !'
                        });
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.AirBersihShow = function (dt) {
        $scope.data = angular.copy(dt);
        $("#air-bersih-edit").modal('show');
        $scope.id_update_air_bersih = $scope.data.id;
        $scope.kategori_air_bersih_update = $scope.data.kategori;
        $scope.parameter_air_bersih_update = $scope.data.parameter;
        $scope.satuan_air_bersih_update = $scope.data.satuan;
        $scope.standart_air_bersih_update = $scope.data.standart;
        $scope.metode_air_bersih_update = $scope.data.metode;
    }

    $scope.UpdateAirBersih = function () {
        var formdata = {
            id: $scope.id_update_air_bersih,
            kategori: $scope.kategori_air_bersih_update,
            parameter: $scope.parameter_air_bersih_update,
            satuan: $scope.satuan_air_bersih_update,
            standart: $scope.standart_air_bersih_update,
            metode: $scope.metode_air_bersih_update,
        };
        $http.post(base_url('opr/kimia/update_air_bersih_paramater'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    LoadDataAirBersih();
                    awal2();
                    $('#air-bersih-edit').modal('toggle');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diperbaharui !'
                    });
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }

    $scope.AirBersihDelete = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data parameter ' + $scope.data.parameter + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/kimia/delete_parameter_air_bersih'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            LoadDataAirBersih()
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



var app3 = angular.module('ModuleBadanAir', ['datatables']);
app3.controller('ControllerKimiaBadanAir', function ($scope, $http) {
    function LoadDataBadanAir() {
        $http.get(base_url('opr/kimia/getdata_kimia_badan_air'))
            .then(function (response) {
                $scope.Parameter = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataBadanAir();

    $scope.AddAirBadan = function () {
        $("#air-badan-add").modal('show');
    }

    $scope.InsertAirBadan = function () {
        var kategori_badan = $("#kategori_badan_air").val();
        var parameter = $("#parameter_badan_air").val();
        var satuan = $("#satuan_badan_air").val();
        var kelas1 = $("#kelas1").val();
        var kelas2 = $("#kelas2").val();
        var kelas3 = $("#kelas3").val();
        var kelas4 = $("#kelas4").val();
        var metode = $("#metode_air_badan").val();

        if (kategori_badan == "" || parameter == "" || satuan == "" || kelas1 == "" || kelas2 == "" || kelas3 == "" || kelas4 == "" || metode === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Wajib Mengisi Field - Field yang Terisi !'
            })
        } else {
            var formdata = {
                kategori: kategori_badan,
                parameter: parameter,
                satuan: satuan,
                kelas1: kelas1,
                kelas2: kelas2,
                kelas3: kelas3,
                kelas4: kelas4,
                metode: metode,
            };

            $http.post(base_url('opr/kimia/insert_air_badan_parameter'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        awal3()
                        LoadDataBadanAir();
                        $('#air-badan-add').modal('toggle');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Disimpan !'
                        });
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.AirBadanShow = function (dt) {
        $scope.data = angular.copy(dt);
        $("#id_update_badan_air").val($scope.data.id)
        $("#kategori_badan_air_update").val($scope.data.kategori)
        $("#parameter_badan_air_update").val($scope.data.parameter)
        $("#satuan_badan_air_update").val($scope.data.satuan)
        $("#kelas1_update").val($scope.data.kelas1)
        $("#kelas2_update").val($scope.data.kelas2)
        $("#kelas3_update").val($scope.data.kelas3)
        $("#kelas4_update").val($scope.data.kelas4)
        $("#metode_air_badan_update").val($scope.data.metode)
        $("#air-badan-edit").modal('show');
    }

    $scope.UpdateAirBadan = function () {
        var formdata = {
            id: $("#id_update_badan_air").val(),
            kategori: $("#kategori_badan_air_update").val(),
            parameter: $("#parameter_badan_air_update").val(),
            satuan: $("#satuan_badan_air_update").val(),
            kelas1: $("#kelas1_update").val(),
            kelas2: $("#kelas2_update").val(),
            kelas3: $("#kelas3_update").val(),
            kelas4: $("#kelas4_update").val(),
            metode: $("#metode_air_badan_update").val(),
        };

        $http.post(base_url('opr/kimia/update_air_badan_parameter'), formdata)
            .then(function (response) {
                var data = response.data;
                if (data.status == "success") {
                    awal3()
                    LoadDataBadanAir();
                    $('#air-badan-edit').modal('toggle');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diupdate !'
                    });
                }
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat proses data:', error);
            });
    }

    $scope.AirBadanDelete = function (dt) {
        $scope.data = angular.copy(dt);
        var formdata = {
            id: $scope.data.id,
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data parameter ' + $scope.data.parameter + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/kimia/delete_air_badan_parameter'), formdata)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            LoadDataBadanAir()
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

var app = angular.module('KimiaAirMaster', ['ModuleKimiaAirMinum', 'ModuleKimiaAirBersih', 'ModuleBadanAir'])
