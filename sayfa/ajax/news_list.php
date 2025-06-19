<table class="table table-striped" style="width:100%" id="tablo">



    <thead>
        <tr>


            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Content</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tags</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>
    </thead>



    <tbody>

        <?php

        $db->sql = "SELECT * 
    FROM news
    ORDER BY id DESC";
        $news = $db->select();


        if ($news) {

            foreach ($news as $key => $value) { ?>

                <tr>



                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $value->category; ?></p>
                    </td>

                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $value->title; ?></p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"> <?php echo mb_strimwidth($value->content_1, 0, 15, '...'); ?>
                        </p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $value->author; ?></p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $value->tags; ?></p>
                    </td>

                    <td class="align-middle d-flex justify-content-center">


                        <button type="button" class="btn btn-outline-secondary  m-0" onclick="
            $('#exampleModal').modal('show');
            $('#exampleModalLabel').text('Glass Update Form');
            $('#duzenle').load('index.php?url=ajax/news_edit&id=<?php echo $value->id; ?>');
            "> <i class="fa fa-edit"></i> </button>

                        <button type="button" class="btn btn-outline-danger m-0"
                            onclick="deleteNews(<?php echo $value->id; ?>)">
                            <i class="fa fa-trash"></i>
                        </button>








                    </td>

                </tr>

            <?php }
        }

        ?>


    </tbody>
</table>
<script>
    async function deleteNews(id) {
        const result = await Swal.fire({
            title: 'Warning!',
            text: 'This will be permanently deleted. Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        });

        if (result.isConfirmed) {
            // 1. Haber kaydını sil
            kaydet(`id=${-1 * id}&tablo_adi=news`);

            // 2. Dosya kayıtlarını sil
            $.post('index.php?url=tools/delete_related_files', { id: id }, function (response) {
                try {
                    const res = JSON.parse(response);
                    if (res.success) {
                        console.log(`Dosya tablosundan ${res.deleted_count} kayıt silindi.`);
                    } else {
                        console.error('Dosya silinemedi:', res.message);
                    }
                } catch (e) {
                    console.error('Beklenmeyen cevap:', response);
                }

                // 3. Sayfayı güvenle yenile
                location.reload();
            }).fail(function () {
                // Eğer post başarısızsa bile sayfa yenile
                location.reload();
            });
        }
    }
</script>
<script>
    $(document).ready(function () {
        var table = $('#tablo').DataTable({
            lengthChange: false,
            responsive: true,
            dom: 'Bfrtip', // Butonlar için gerekli
            language: {
                paginate: {
                    previous: "Prev",
                    next: "Next"
                },
                lengthMenu: "Show _MENU_ entries",
                search: "Search:",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "(filtered from _MAX_ total entries)",
                zeroRecords: "No matching records found",
                loadingRecords: "Loading...",
                processing: "Processing..."
            },
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 Rows', '25 Rows', '50 Rows', 'All']
            ],
            initComplete: function (settings, json) {
                $('#loading').hide();
            },
            buttons: [
                {
                    text: 'Add News',
                    action: function () {
                        $('#duzenle').load('index.php?url=ajax/news_edit&id=0');
                        $('#exampleModalLabel').text('Add News Form');
                        $('#exampleModal').modal('show');
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('col', sheet).attr('width', 30);
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    customize: function (doc) {
                        doc.styles.tableHeader.alignment = 'center';
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                        doc.content[1].table.widths = ['33%', '33%', '34%'];
                    }
                }
            ]
        });
    });
</script>