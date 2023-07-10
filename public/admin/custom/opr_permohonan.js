function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}


var app = angular.module('ListPermohonanApp', ['datatables']);
app.controller('ListPermohonanAppController', function ($scope, $http) {
    $scope.awal = function () {
        $("#asal_produk").val("");
        $("#perincian_produk").val("");
        $("#pengujian_mutu").val("");
    }

    $scope.LoadDataRequest = function () {
        $http.get(base_url('opr/transaksi/permohonan_getdata'))
            .then(function (response) {
                $scope.Transaksi = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.LoadDataRequest();





});