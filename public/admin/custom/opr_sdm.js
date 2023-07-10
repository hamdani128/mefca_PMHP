function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

var app = angular.module('AdminSDM', ['datatables']);
app.controller('AdminSDMController', function ($http, $scope) {
    $scope.LoadDataTablSDM = function () {
        $http.get(base_url('opr/master/sdm_getdata'))
            .then(function (response) {
                $scope.SDM = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.LoadDataTablSDM();
    $scope.add_sdm = function () {
        $("#my-modal").modal('show');
    }

    $scope.SimpaDataSDM = function () {
        var nama = $("#nama").val();
        var jk = $("#cmb_jk").val();
        var jabatan = $("#jabatan").val();
        var divisi = $("#divisi").val();
        var department = $("#departement").val();

        if (nama == "" || jk == "" || jabatan == "" || divisi == "" || department == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Notifications !',
                text: 'Data Wajib Terisi Semua !'
            });
        } else {
            var formdata = {
                nama: nama,
                jk: jk,
                jabatan: jabatan,
                divisi: divisi,
                department: department,
            };

            $http.post(base_url('opr/master/insert_sdm'), formdata)
                .then(function (response) {
                    var data = response.data;
                    if (data.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Tersimpan!'
                        });
                        $scope.LoadDataTablSDM();
                    }
                }).catch(function (error) {
                    console.error('Terjadi kesalahan saat proses data:', error);
                });

        }


    }

});