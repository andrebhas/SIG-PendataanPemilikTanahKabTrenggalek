<?php echo $map['js']; ?>
<script>
	function selectChange(val)
	{
		$('#pendudukForm').submit();
	}
</script>
<br><br><br><br><br><br>
<div class="container">

	<h2 class="demoHeaders">Cari Tanah</h2>
	<div class="col-md-5">
		<form id="pendudukForm" class="form-horizontal form-label-left" action="<?php echo base_url('home/peta2') ?>" method="post">
			<div class="input-group">
                    <select class="form-control" name="id" onChange=selectChange(this.value)>
					<?php foreach ($penduduk_data as $p): ?>
						<option value="<?php echo $p->id_penduduk ?>"><?php echo $p->nama ?> </option>
					<?php endforeach ?>
					</select>
            </div>
		</form>
	</div>
	<br><br>
    <?php echo $map['html']; ?>
    <br><br>
</div


