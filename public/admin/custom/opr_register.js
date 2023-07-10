function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

var app = angular.module('adminregister', ['datatables']);
app.controller('ControllerRegister', function ($scope, $http) {
    function LoadDataRegister() {
        $http.get(base_url('opr/register/getdata'))
            .then(function (response) {
                $scope.dataregister = response.data;
                console.log($scope.dataregister);
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataRegister();

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
                $http.post(base_url('opr/register/delete_akun'), newData)
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

});