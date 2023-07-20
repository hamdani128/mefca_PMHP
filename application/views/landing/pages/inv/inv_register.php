<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: rgb(7, 54, 79);
        color: white;
        font-size: 12px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <span style="font-size: 16px;font-weight: 700;"><u>SURAT PERMOHONAN</u></span>
    </div>
    <table style="width: 100%;font-family: 'Times New Roman', Times, serif;font-size: 14px;padding-top: 5%;">
        <tr>
            <td style="width: 80%;"></td>
            <td style="width: 40%;">
                <span>Medan, <?= date("d F Y", strtotime($value->created_at)); ?></span><br>
                <span></span><br>
                <span>Kepada Yth,</span><br>
                <span></span>
                <span>UPTD Pengendalian dan Pengujian Mutu Hasil Perikanan (PMHP)</span><br>
                <span>Provinsi Sumatera Utara</span>
            </td>
        </tr>
    </table>

    <table style="width: 100%;padding-top: 5%;">
        <tr>
            <td style="width: 10%;"></td>
            <td style="font-weight: 600;">
                <p>Dengan hormat,</p>
            </td>
            <td style="width: 10%;"></td>
        </tr>
    </table>

    <table style="width: 100%;padding-top: 0%;">
        <tr>
            <td style="width: 10%;"></td>
            <td>
                <p>Dengan ini menyatakan bahwasanya telah terdaftar dengan data :
                </p>
            </td>
            <td style="width: 5%;"></td>
        </tr>
    </table>
    <table style="width: 100%;padding-top: 0%;">
        <tr>
            <td style="width: 10%;"></td>
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 20%;">No.Registrasi</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->no_registrasi; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Jenis Pengujian</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->kategori; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Kategori Pemohon</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->instansi; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Nama / Instansi</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->nama; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Alamat</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->alamat; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">No.Kontak/HP</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->tlp; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Fax</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->fax; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">E-mail</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->email; ?></td>
                    </tr>
                </table>
            </td>
            <td style="width: 5%;"></td>
        </tr>
    </table>
    <table style="width: 100%;padding-top: 0%;">
        <tr>
            <td style="width: 10%;"></td>
            <td>
                <p>
                    Demikian kami sampaikan, atas perhatiannya diucapkan terima kasih,
                </p>
            </td>
            <td style="width: 5%;"></td>
        </tr>
    </table>
    <table style="width: 100%;padding-top: 5%;">
        <tr>
            <td style="width: 10%;"></td>
            <td style="width: 70%;"></td>
            <td>
                <span>Hormat Kami,</span>
                <br>
                <br>
                <br>
                <br>
                <span>...................</span>
            </td>
        </tr>
    </table>

    <table style="width: 100%;padding-top: 2%;">
        <tr>
            <td style="width: 10%;"></td>
            <td style="width: 60%;">
                <!-- <span>Keterangan :</span><br>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 30%;">Petugas Sampling </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 48%;">.........</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;">No.Hp</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 48%;">.........</td>
                    </tr>
                </table> -->
            </td>
            <td style="width: 30%;">
                <?= $qrcode; ?>
            </td>
        </tr>
    </table>
</body>

</html>