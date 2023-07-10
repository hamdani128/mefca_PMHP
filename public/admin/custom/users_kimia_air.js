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
    $("#jenis_bahan_uji_air_minum").val();
    $("#kemasan_air_minum").val();
    $("#merk_air_minum").val();
    $("#jumlah_air_minum").val();
}

var app1 = angular.module('UsersKimiaAirMinum', ['datatables']);
app1.controller('ControllerUsersKimiaAirMinum', function ($scope, $http) {
    function LoadDataUsersAirMinum() {
        $http.get(base_url('users/biokimia/get_data_users_air_minum'))
            .then(function (response) {
                $scope.Request = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataUsersAirMinum()

    $scope.InsertRequestAirMinum = function () {
        var jenis_bahan = $("#jenis_bahan_uji_air_minum").val();
        var kemasan = $("#kemasan_air_minum").val();
        var merk = $("#merk_air_minum").val();
        var jumlah = $("#jumlah_air_minum").val();

        var formdata = {
            jenis_bahan: jenis_bahan,
            kemasan: kemasan,
            merk: merk,
            jumlah: jumlah
        };

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
                $http.post(base_url('users/biokimia/insert_request_user_air_minum'), formdata)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            awal1()
                            LoadDataUsersAirMinum();
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
        });


    }

});

var app2 = angular.module('UsersKimiaAirBersih', ['datatables']);
var app3 = angular.module('UsersKimiaAirBadan', ['datatables']);

var app = angular.module('UsersKimiaAir', ['UsersKimiaAirMinum', 'UsersKimiaAirBersih', 'UsersKimiaAirBadan']);