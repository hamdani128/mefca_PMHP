function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

var app = angular.module('PermohonanApp', ['datatables']);
app.controller('PermohonanAppController', function ($scope, $http) {
    $scope.awal = function () {
        $("#asal_produk").val("");
        $("#perincian_produk").val("");
        $("#pengujian_mutu").val("");
    }

    $scope.LoadDataRequest = function () {
        $http.get(base_url('users/permohonan/users_permohonan_getdata'))
            .then(function (response) {
                $scope.Transaksi = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.LoadDataRequest();

    $scope.simpan_request_permohonan = function () {
        var asal_produk = $scope.asal_produk;
        var perincian_produk = $scope.perincian_produk;
        var pengujian_mutu = $scope.pengujian_mutu;

        if (asal_produk === undefined || perincian_produk === undefined || pengujian_mutu === undefined) {
            Swal.fire({
                icon: 'warning',
                title: 'Notification',
                text: 'Semua Field Wajiib Diisi !'
            });
        } else {
            var formdata = {
                asal_produk: asal_produk,
                perincian_produk: perincian_produk,
                pengujian_mutu: pengujian_mutu
            };
            $http.post(base_url('users/permohonan/insert_users_permohonan'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Disimpan !'
                        });
                        $scope.LoadDataRequest();
                        $scope.awal();
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });
        }
    }

    $scope.DeleteRequestPermohonan = function (dt) {
        $scope.data = angular.copy(dt);
        var formdata = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data permohonan dengan No.Request ID ' + $scope.data.request_id + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('users/permohonan/delete_users_request_permohonan'), formdata)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Terhapus!'
                            });
                            $scope.LoadDataRequest();
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat proses data:', error);
                    });
            }
        });
    }



});
