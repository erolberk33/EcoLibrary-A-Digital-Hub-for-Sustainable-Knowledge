<?php

$id = $_REQUEST['id'];

if ($id > 0) {
    $db->sql = "select * from library where id=" . $id;
    $library = $db->select(1);

    $id = $library->id;
    $level_info = $library->level_info;
    $topic_title = $library->topic_title;
    $extra_materials = $library->extra_materials;
    $lang_en = $library->lang_en;
    $lang_fr = $library->lang_fr;
    $lang_lit = $library->lang_lit;
    $lang_nl = $library->lang_nl;
    $lang_ro = $library->lang_ro;
    $lang_sp = $library->lang_sp;
    $lang_tr = $library->lang_tr;
} else {

    $id = "";
    $level_info = "";
    $topic_title = "";
    $extra_materials = "";
    $lang_en = "";
    $lang_fr = "";
    $lang_lit = "";
    $lang_nl = "";
    $lang_ro = "";
    $lang_sp = "";
    $lang_tr = "";
}

?>





<form id="form1" class="row">


    <div class="col-12">
        <span>Enter Education Level :</span>
        <div class="form-group">
            <select class="form-control" id="level_info" name="level_info" required>
                <option value="" disabled selected>Select Education Level</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo (isset($level_info) && $level_info == $i) ? 'selected' : ''; ?>>
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
    </div>



    <div class="col-12">
        <span>Enter Education Name :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="topic_title" name="topic_title"
                placeholder="Enter Education Name" value="<?php echo $topic_title; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Extra Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="extra_materials" name="extra_materials"
                placeholder="Enter Extra Materials" value="<?php echo $extra_materials; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter English Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_en" name="lang_en" placeholder="Enter English Materials"
                value="<?php echo $lang_en; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter French Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_fr" name="lang_fr" placeholder="Enter French Materials"
                value="<?php echo $lang_fr; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Lithuanian Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_lit" name="lang_lit"
                placeholder="Enter Lithuanian Materials" value="<?php echo $lang_lit; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Netherlands Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_nl" name="lang_nl"
                placeholder="Enter Netherlands Materials" value="<?php echo $lang_nl; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Romania Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_ro" name="lang_ro"
                placeholder="Enter Netherlands Materials" value="<?php echo $lang_ro; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Romania Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_ro" name="lang_ro"
                placeholder="Enter Netherlands Materials" value="<?php echo $lang_ro; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Spain Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_sp" name="lang_sp" placeholder="Enter Spain Materials"
                value="<?php echo $lang_sp; ?>">
        </div>
    </div>

    <div class="col-12">
        <span>Enter Türkiye Materials :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="lang_tr" name="lang_tr" placeholder="Enter Türkiye Materials"
                value="<?php echo $lang_sp; ?>">
        </div>
    </div>




    <input type="hidden" name="id" id="library_id" value="<?php echo $_REQUEST['id']; ?>">

    <input type="hidden" name="tablo_adi" value="library">
</form>


<div class="row">

    <div class="col-12 border mb-1"></div>

    <div class="col-12 d-flex justify-content-end">

        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

        <button type="button" class="btn bg-gradient-primary" onclick=" 
                        kaydet($('#form1').serialize(),<?php echo $id == 0 ? 1 : 0; ?>);  
                        $('#exampleModal').modal('hide');
                        $('#example').load('index.php?url=ajax/library_list_community');
                        ">Save</button>
    </div>


</div>







<script>

    function clearOtherInput(sourceId, targetId) {
        var sourceInput = document.getElementById(sourceId);
        var targetInput = document.getElementById(targetId);

        if (document.activeElement === sourceInput && sourceInput.value.trim() !== '') {
            targetInput.value = '';
        }
    }


    $("#exampleModal .modal-css").removeClass("modal-lg");
</script>