<div class="box">
	<div class="box-body table-responsive"> 
		<?php  echo validation_errors();  ?>
		<form action="" accept-charset="utf-8" method="post">
		    <div class="form-group">
				<label for="aktivitas">Aktifitas Anda</label>
		        <input type="text" class="form-control" name="aktivitas" id="aktivitas" value="<?php echo $todo_list['aktivitas']; ?>" placeholder="Nama Aktifitas..."/>
		    </div>

		    <div class="form-group">
				<label for="deskripsi">Deskripsi</label>
				<textarea name="deskripsi" class="form-control" placeholder="Deskripsi Aktifitas..."><?php echo $todo_list['deskripsi']; ?></textarea>
		    </div>

		    <div class="form-group">
				<label for="tanggal">Batas Akhir Aktivitas</label>
		        <div class="input-group">
		            <div class="input-group-addon">
		                <i class="fa fa-calendar"></i>
		            </div>
		            <input type="text" name="tanggal" id="tanggal" value="<?php echo $todo_list['tanggal']; ?>" style="width:175px;" class="form-control"/>
		        </div><!-- /.input group -->
				<script type="text/javascript">
		            $(function() {
			           $("#tanggal").datepicker({
			              dateFormat: "yy-mm-dd",
			              changeMonth: true,
			              changeYear: true
			            });
				   });
		        </script>
		    </div>

	        <div class="box-footer">
	            <button type="button" id="simpan" class="btn btn-primary" onclick="submit()">Simpan</button>
	        </div>
		</form>
	</div>
</div>
	