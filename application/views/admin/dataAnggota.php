<div class="page-header">

    <!-- Header content -->
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $breadcumb ?> </span>- <?= $bread ?></h4>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-flat">
        <div class="panel-body">
            <table id="dataAnggotaTable" class="table datatable-basic">
                <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Nama</th>
                        <th class="">Nomor Anggota</th>
                        <th class="">Bergabung</th>
                        <th class="">Status</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($anggota as $a) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a->nama_user; ?></td>
                            <td><?= $a->nomor_keanggotaan ? $a->nomor_keanggotaan : "-" ?></td>
                            <td><?= date('d F Y', strtotime($a->bergabung)); ?></td>
                            <?php if ($a->status_keanggotaan == 1) { ?>
                                <td>
                                    <span class="label label-success">AKTIF</span>
                                </td>
                            <?php } else { ?>
                                <td> <span class="label label-danger">TIDAK AKTIF</span></td>
                            <?php } ?>
                            <td>
                                <a class="label border-left-info label-striped m-5" href="<?= base_url('admin/detailAnggota/' . base64_encode($a->id_anggota)); ?>" target="_blank">Detail</a>
                                <?= $a->nomor_keanggotaan ? '<button class="label border-left-danger label-striped m-5 btn-open-modal" data-id="' . $a->id_anggota . '" data-nama="' . $a->nama_user . '" data-status="' . $a->status_keanggotaan . '">Aktif / Non - Aktifkan Anggota</button> ' : "" ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(".btn-open-modal").click(function() {
        let id = $(this).data("id")
        let status = $(this).data('status');
        let nama = $(this).data('nama');

        swal({
                title: "Anda yakin?",
                text: "Anda akan mengubah status keanggotaan " + nama,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        success: function(data) {
                            setTimeout(() => {
                                document.location.href = "<?= base_url('admin/updateAnggota/') ?>" + id + "/" + status;
                            }, 2000);
                            swal("Status Keanggotaan berhasil diubah!", "", "success");

                        }
                    });
                }
            });
    });
</script>
<style>
    .sweet-alert button.confirm {
        background-color: #2196f3 !important;
        color: #fff;
        border: 0;
        border-radius: 3px;
        padding: 7px 12px;
        margin: 10px 5px 0 5px;
        box-shadow: none !important;
    }
</style>