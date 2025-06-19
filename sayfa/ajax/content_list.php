<table class="table table-striped" style="width:100%" id="tablo">



    <thead>
        <tr>

            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Content Primary
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Content
                Secondary</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rol</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>
    </thead>



    <tbody>

        <?php

        $db->sql = "SELECT 
    community_contents.*, 
    community_topics.title ,
    users.username
FROM community_contents 
LEFT JOIN community_topics ON community_contents.topic_id = community_topics.id
LEFT JOIN users ON community_contents.user_id = users.id
    ORDER BY id DESC";
        $content = $db->select();


        if ($content) {

            foreach ($content as $key => $value) { ?>

                <tr>



                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $value->title; ?></p>
                    </td>

                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">
                            <?php echo mb_strimwidth($value->content_primary, 0, 40, '...'); ?>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">
                            <?php echo mb_strimwidth($value->content_secondary, 0, 40, '...'); ?>
                        </p>
                    </td>
                    <td class="align-middle text-center">

                        <?php
                        $badgeClass = ($value->username === 'admin') ? 'bg-gradient-success' : 'bg-gradient-info';
                        ?>
                        <p class="badge badge-sm font-weight-bold mb-0 <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($value->username); ?>
                        </p>

                    </td>
                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo date($value->created_at); ?></p>
                    </td>

                    <td class="align-middle d-flex justify-content-center">


                        <button type="button" class="btn btn-outline-secondary  m-0" onclick="
            $('#exampleModal').modal('show');
            $('#exampleModalLabel').text('Content Update Form');
            $('#duzenle').load('index.php?url=ajax/content_edit&id=<?php echo $value->id; ?>');
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
            kaydet(`id=${-1 * id}&tablo_adi=community_contents`);
            location.reload();

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
                    text: 'Add Content',
                    action: function () {
                        $('#duzenle').load('index.php?url=ajax/content_edit&id=0');
                        $('#exampleModalLabel').text('Add Content Form');
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