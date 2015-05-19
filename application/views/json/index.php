<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST VIEW</h3>
    </div>
    <div class="box-body table-responsive">
        <form action="http://<?php echo base_url(); ?>index.php/json/1" method="post">
            <div class="form-group">
                http://<?php echo base_url(); ?>/json/{id}
            </div>
            <button type="submit" id="simpan" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <div class="box-header">
        <h3 class="box-title">ALL TODO LIST</h3>
    </div>
    <div class="box-body table-responsive">
        <form action="http://<?php echo base_url(); ?>index.php/json/all" method="post">
            <div class="form-group">
                http://<?php echo base_url(); ?>/json/all
            </div>
            <button type="submit" id="simpan" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>