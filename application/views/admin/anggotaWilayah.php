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
        <div class="panel-heading">
            <h4 class="panel-title">Data Wilayah</h4>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <table id="data" class="table datatable-basic">
                <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Wilayah</th>
                        <th class="">Jumlah Anggota</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($jumlahWilayah as $row) : ?>
                        <tr>
                            <td class=""><?= $i++; ?></td>
                            <td><?= $row->nama_wilayah; ?></td>
                            <td><?= $row->total_anggota; ?></td>
                            <td class=""><a class="label border-left-info label-striped" href="<?= base_url('admin/dataAnggotaDaerah/' . $row->id) ?>">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(".btn-open-modal").click(function() {
        var id = $(this).data("id")
        swal({
                title: "Are you sure?" + id,
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '<?= base_url() ?>' + "admin/test/" + id,
                        error: function() {
                            alert('Something is wrong');
                        },
                        success: function(data) {
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            console.log("asd");
                            $('#dataAnggotaTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "", "error");
                }
            });
    });
</script>