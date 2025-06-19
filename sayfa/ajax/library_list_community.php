<table class="table table-striped" style="width:100%" id="tablo">



    <thead>
        <tr>


            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level Info</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Topic Title</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Extra Materials
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EN</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FR</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LIT</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NL</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RO</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SP</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TR</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>
    </thead>



    <tbody>

        <?php
        $_SESSION['id'] = $_GET['id'] ?? null;
        $id = $_SESSION['id'] ?? null;
        echo $id;

        // ID varsa filtrele, yoksa tüm verileri çek
        if (!empty($id)) {
            $id = intval($id); // Güvenlik için int'e çevir
            $db->sql = "SELECT * FROM library WHERE level_info = $id";
            $library_home = $db->select();
        } else {
            $db->sql = "SELECT * FROM library";
            $library_home = $db->select();
        }


        if ($library_home) {

            foreach ($library_home as $key => $value) { ?>

                <tr>
                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">Lesson Plans Level <?php echo $value->level_info; ?></p>
                    </td>

                    <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $value->topic_title; ?></p>
                    </td>


                    <td class="align-middle text-center">
                        <?php if (!empty($value->extra_materials)): ?>
                            <a href="<?php echo htmlspecialchars($value->extra_materials); ?>" target="_blank"
                                rel="noopener noreferrer" title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- Dosya yoksa boş ya da tire -->
                        <?php endif; ?>
                    </td>



                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_en)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_en); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>

                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_fr)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_fr); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>

                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_lit)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_lit); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>

                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_nl)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_nl); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>

                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_ro)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_ro); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>
                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_sp)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_sp); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>
                    <td class="align-middle text-center">
                        <?php if (!empty($value->lang_tr)): ?>
                            <a href="<?php echo htmlspecialchars($value->lang_tr); ?>" target="_blank" rel="noopener noreferrer"
                                title="View Document">
                                <img src="lib/temp/img/google-docs.png" alt="View" width="24" height="24">
                            </a>
                        <?php else: ?>
                            <!-- Belge yok, ikon gösterme -->
                            <p class="text-xs font-weight-bold mb-0">-</p> <!-- İstersen burayı boş bırakabilirsin -->
                        <?php endif; ?>
                    </td>


                    <td class="align-middle d-flex justify-content-center">


                        <button type="button" class="btn btn-outline-secondary  m-0" onclick="
            $('#exampleModal').modal('show');
            $('#exampleModalLabel').text('Cam Güncelleme Formu');
            $('#duzenle').load('index.php?url=ajax/library_edit&id=<?php echo $value->id; ?>');
            "> <i class="fa fa-edit"></i> </button>

                        <button type="button" class="btn btn-outline-danger m-0" onclick="
                  Swal.fire({
                      title: 'Uyarı?',
                      text: 'Kalıcı olarak silinecektir. Emin misiniz?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#d33',
                      cancelButtonColor: '#3085d6',
                      confirmButtonText: 'Evet',
                      cancelButtonText: 'Hayır'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        kaydet('id=<?php echo $value->id * (-1); ?>&tablo_adi=library');
                        $('#example').load('index.php?url=ajax/library_list_community');
                      }
                    })
              
              "> <i class="fa fa-trash"></i> </button>



                    </td>

                </tr>

            <?php }
        }

        ?>


    </tbody>
</table>

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
                    text: 'Add Library',
                    action: function () {
                        $('#duzenle').load('index.php?url=ajax/library_edit&id=0');
                        $('#exampleModalLabel').text('Add Library Form');
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