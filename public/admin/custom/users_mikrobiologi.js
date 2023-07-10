function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

var app = angular.module('UsersMikrobiologi', []);
app.controller('UsersControllerMikrobiologi', function ($scope, $http) {
    function LoadDataUsersMikrobiologi() {
        $http.get(base_url('users/mikrobio/getdata_parameter'))
            .then(function (response) {
                $scope.Parameter = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    LoadDataUsersMikrobiologi();
});