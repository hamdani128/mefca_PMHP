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
        <span style="font-size: 16px;font-weight: 700;"><u>Surat Pengantar Sampel</u></span>
    </div>
    <table style="width: 100%;font-family: 'Times New Roman', Times, serif;font-size: 14px;padding-top: 5%;">
        <tr>
            <td style="width: 80%;"></td>
            <td style="width: 40%;">
                <span>Medan, 10 Juni 2024</span><br>
                <span></span><br>
                <span>Kepada Yth,</span><br>
                <span></span>
                <span>UPT.Laboratorium Kesehatan</span><br>
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
                <p>Mohon dilakukan pengujian laboratorium untuk pengecekan <span style="font-weight: 300;">Medical Check
                        Up</span> dengan Data sbb
                    :</p>
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
                        <td style="width: 20%;">ID Permohonan </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->request_id; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Nama Lengkap </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->nama; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Alamat </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->alamat; ?></td>
                    </tr>
                </table>
                <table style="padding-top: 2%;width: 100%;">
                    <tr>
                        <td style="width: 20%;">Nomor Identitas ( KTP ) </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->nik; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">No.HP </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->telepon; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Jenis Kelamin </td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 50%;"><?= $value->jk; ?></td>
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
                <p>Pengajuan untuk pengecekan berupa :</p>
                <table id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>List Deskripsi</th>
                            <th>Harga</th>
                            <th>Time Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($detail_request) > 0) { ?>
                            <?php $sum = 0; ?>
                            <?php $no = 1; ?>
                            <?php foreach ($detail_request as $row) { ?>
                                <?php $sum = $sum + $row->harga; ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->kategori; ?></td>
                                    <td><?= $row->list; ?></td>
                                    <td><?= number_format($row->harga, 0); ?></td>
                                    <td><?= $row->created_at; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" style="font-weight: 700;">Total Harga</td>
                                <td colspan="2" style="text-align: center;">Rp.<?= number_format($sum, 0); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
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
                <span>Keterangan :</span><br>
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
                </table>
            </td>
            <td style="width: 30%;">
                <?= $qrcode; ?>
            </td>
        </tr>
    </table>
</body>

</html>