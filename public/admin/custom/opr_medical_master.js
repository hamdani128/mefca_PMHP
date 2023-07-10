function base_url(string_url) {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + string_url; // http://localhost/myproject/
    } else {
        var url = location.origin + '/' + string_url; // http://stackoverflow.com
    }
    return url;
}

var app = angular.module('admin_mdical_master', ['datatables']);
app.controller('ControllerMedical', function ($scope, $http) {
    function LoadDataMedicalMaster() {
        $http.get(base_url('opr/medical/getdata_master'))
            .then(function (response) {
                $scope.MedicalMaster = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }

    LoadDataMedicalMaster()

    function LoadDataKategoriMedical() {
        $http.get(base_url('opr/medical/getdata_kategori_master'))
            .then(function (response) {
                $scope.MedicalKategori = response.data;
            })
            .catch(function (error) {
                console.error('Terjadi kesalahan:', error);
            });
    }

    LoadDataKategoriMedical()

    $scope.InsertKategoriMedical = function () {
        var NewData = {
            kategori: $scope.kategori,
        };
        $http.post(base_url('opr/medical/insert_kategori'), NewData)
            .then(function (response) {
                LoadDataKategoriMedical()
                cmb_kategori_medical_insert()
                cmb_kategori_medical_update()
                $("#kategori").val('');
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat menyimpan data:', error);
            });
    };

    $scope.DeleteKategoriMedocal = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id,
        };
        $http.post(base_url('opr/medical/delete_kategori'), newData)
            .then(function (response) {
                LoadDataKategoriMedical()
                cmb_kategori_medical_insert()
                cmb_kategori_medical_update()
            }).catch(function (error) {
                console.error('Terjadi kesalahan saat menyimpan data:', error);
            });
    }


    $scope.ShowMasterMedical = function (dt) {
        $scope.data = angular.copy(dt);
        $("#my-modal-edit").modal('show');
        $("#id_update").val($scope.data.id);
        $("#cmb_kategori_medical_update").val($scope.data.kategori_id);
        $("#list_update").val($scope.data.detail)
        $("#harga_update").val($scope.data.harga)
    }

    $scope.DeleteMasterMedical = function (dt) {
        $scope.data = angular.copy(dt);
        var newData = {
            id: $scope.data.id
        };
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data List ' + $scope.data.detail + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Delete',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $http.post(base_url('opr/medical/delete_medical_harga'), newData)
                    .then(function (response) {
                        var data = response.data;
                        if (data.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data Berhasil Terhapus!'
                            });
                            document.location.reload();
                        }
                    }).catch(function (error) {
                        console.error('Terjadi kesalahan saat proses data:', error);
                    });
            }
        });
    }

});

function cmb_kategori_medical_insert() {
    fetch(base_url('opr/medical/getdata_kategori_master'))
        .then(response => response.json())
        .then(data => {
            const optionsData = data;
            const select = document.getElementById('cmb_kategori_medical');
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
        })
        .catch(error => console.error(error));
}

function cmb_kategori_medical_update() {
    fetch(base_url('opr/medical/getdata_kategori_master'))
        .then(response => response.json())
        .then(data => {
            const optionsData = data;
            const select = document.getElementById('cmb_kategori_medical_update');
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
        })
        .catch(error => console.error(error));
}

cmb_kategori_medical_insert();
cmb_kategori_medical_update();

function insert_medical_harga() {
    var form = document.getElementById('form_insert_medical');
    var formdata = new FormData(form);
    fetch(base_url('opr/medical/insert_medical_harga'), {
        method: 'POST',
        body: formdata
    })
        .then(response => response.json())
        .then(data => {
            if (data.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Disimpan !'
                });
                document.location.reload();
            }
        })
        .catch(error => console.error(error));

}


function add_data_medical_master() {
    $("#my-modal-add").modal('show');
}

function show_kategori_medic() {
    $("#my-modal-kategori").modal("show");
}


function update_medical_harga() {
    var form = document.getElementById('form_update_medical');
    var formdata = new FormData(form);
    fetch(base_url('opr/medical/update_medical_harga'), {
        method: 'POST',
        body: formdata
    })
        .then(response => response.json())
        .then(data => {
            if (data.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Dirubah !'
                });
                document.location.reload();
            }
        })
        .catch(error => console.error(error));
}

