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
    const select = document.getElementById('cmb_kategori_parameter');
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

function cmb_kategori_detail(data) {
    const optionsData = data;
    const select = document.getElementById('cmb_kategori_detail');
    select.innerHTML = '';
    // Add the default "Pilih" option
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.text = 'Silahkan Pilih';
    select.appendChild(defaultOption);

    optionsData.forEach(option => {
        const newOption = document.createElement('option');
        newOption.value = option.id;
        newOption.text = option.parameter;
        select.appendChild(newOption);
    });
}

var app = angular.module('MetodeUjiAdmin', ['datatables'])
app.controller('MetodeUjiAdminController', function ($scope, $http) {
    $scope.DataMetodeUji = "";
    $scope.LoadDataKategoriParameter = function () {
        $http.get(base_url('opr/master/getdata_kategori_parameter_uji'))
            .then(function (response) {
                $scope.post = response.data;
                cmb_kategori(response.data);
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }
    $scope.LoadDataKategoriParameter();

    $scope.FilterDataMetodeUji = function () {

    }
    $scope.AddMetodeUji = function () {
        var cmb_kategori = $("#cmb_kategori_parameter").val();
        var cmb_kategori_detail = $("#cmb_kategori_detail").val();
        if (cmb_kategori == "" || cmb_kategori_detail == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Alert',
                text: 'Jika Ingin Menambahkan Data Metode Uji ini, Anda Harus Memilih Kategori dan Detail Kategori!'
            });
        } else {
            document.getElementById("lb_cmb_kategori").innerHTML = cmb_kategori;
            document.getElementById("lb_cmb_kategori_detail").innerHTML = cmb_kategori_detail;
            $("#my-modal").modal("show");
        }

    }


});

function OnchangeKategori() {
    var selectedValue = "";
    selectedValue = document.getElementById("cmb_kategori_parameter").value;
    var formData = new FormData();
    formData.append('kategori_id', selectedValue);
    fetch(base_url('opr/master/get_data_detail_list_parameter'), {
        method: 'POST',
        body: formData,
    }).then(response => response.json()).then(data => {
        cmb_kategori_detail(data)
    }).catch(error => console.error(error));
}
