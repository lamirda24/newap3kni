<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-md-offset-4">
                        <div class="thumbnail">
                            <div class="thumb text-center">
                                <img style="width:50%;;margin-top:15px;" src="http://ap3kni.or.id/wp-content/uploads/2016/08/Logo_Ap3kni.png" alt="">
                                <h3 style="color:#000" class="text-center">Validasi Anggota </br>Asosiasi Profesi Pendidikan Pancasila dan Kewarganegaraan Indonesia</h3>
                            </div>
                            <hr>
                            <div class="caption">

                                <h6 style="text-align:justify;">
                                    Dokumen digital dan atau cetak ini dapat dijadikan sebagai alat bukti yang sah, format dan isi telah disesuaikan dengan kententuan yang berlaku sejak disahkan, dan secara otomatis terdaftar dan terdokumentasi dalam Asosiasi Profesi Pendidikan Pancasila dan Kewarganegaraan Indonesia.
                                </h6>
                                <h6>
                                    Detail data anggota sebagai berkut:
                                </h6>
                                <table style="width: 100%; margin:" cellspacing="1">
                                    <tr>
                                        <td style="line-height:35px">Nama Lengkap </td>
                                        <td> : </td>
                                        <td> <?= $anggota['nama_user'] ?></td>
                                    </tr>
                                    <TR s>
                                        <td style="line-height:35px">Nomor Anggota</td>
                                        <td> :</td>
                                        <td> <?= $anggota['nomor_keanggotaan'] ?> </td>
                                    </TR>
                                    <tr>
                                        <td style="line-height:35px">Asal Instansi</td>
                                        <td>: </td>
                                        <td> <?= $anggota['instansi_anggota'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td style="line-height:35px">Wilayah</td>
                                        <td>:</td>
                                        <td> <?= $anggota['nama_wilayah'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td style="line-height:35px">Bergabung</td>
                                        <td>:</td>
                                        <td> <?= date('d F Y', strtotime($anggota['bergabung'])) ?> </td>
                                    </tr>

                                    <tr>
                                        <td style="line-height:35px">Status Keanggotaan</td>
                                        <td>:</td>
                                        <td><?= $status ?> </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>