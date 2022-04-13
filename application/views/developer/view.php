<h2>Details</h2>
<h2><?php echo $input['no_notin']; ?></h2>
<ul>
    <li>Jenis: <?php echo $input['jenis']; ?></li>
    <li>Description: <?php echo $input['short_desc']; ?></li>
    <li>Source Aplikasi: <?php echo $input['source_aplikasi']; ?></li>
    <li>Tanggal Notin: <?php echo $input['tanggal_notin']; ?></li>
    <li>Tanggal User Request: <?php echo $input['tanggal_user_request']; ?></li>
</ul>

<h2>Manager Input</h2>
<?php if($input_manager) : ?>
	<?php foreach($input_manager as $input_manager_item) : ?>
		<div>
            <ul>
                <li>Prioritas: <?php echo $input_manager_item['prioritas']; ?></li>
                <li>Tanggal Diskusi Internal: <?php echo $input_manager_item['tanggal_diskusi_internal']; ?></li>
                <li>Tanggal Diskusi Owner: <?php echo $input_manager_item['tanggal_diskusi_owner']; ?></li>
                <li>Start Development: <?php echo $input_manager_item['start_dev']; ?></li>
                <li>Finish Development: <?php echo $input_manager_item['finish_dev']; ?></li>
                <li>PIC Developer: <?php echo $input_manager_item['pic_developer']; ?></li>
            </ul>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Manager Belum Memberi Input Lanjutan</p>
<?php endif; ?>

<h2>Developer Input</h2>
<?php if($input_developer) : ?>
	<?php foreach($input_developer as $input_developer_item) : ?>
		<div>
            <ul>
                <li>Tanggal Update: <?php echo $input_developer_item['tanggal_update']; ?></li>
                <li>Progress: <?php echo $input_developer_item['progress']; ?>%</li>
                <li>Keterangan: <?php echo $input_developer_item['keterangan']; ?></li>
                <li>Status: <?php echo $input_developer_item['status_progress']; ?></li>
                <li>Tanggal Realisasi: <?php echo $input_developer_item['tanggal_realisasi']; ?></li>
            </ul>
            <a class="btn btn-sm btn-danger" href="<?php echo site_url(); ?>/developer/delete/<?php echo $input_developer_item['id'] ?>">Delete</a>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Developer Belum Memberi Input Lanjutan</p>
<?php endif; ?>

<?php echo validation_errors(); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-developer-input">
  Create Developer Input
</button>

<!-- Modal -->
<div class="modal fade" id="create-developer-input" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Developer Input</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('developer/create/'.$input['id']); ?>
            <div class="form-group" style="max-width: 500px;">
                <label for="tanggal_update">Tanggal Update</label>
                <input  class="form-control"  type="date" name="tanggal_update" />
                <br />
                <label for="progress">Progress(%)</label>
                <input class="form-control" type="number" min='0' max='100' name="progress"></input>
                <br />
                <label for="keterangan">Keterangan</label>
                <input class="form-control" type="text" name="keterangan"></input>
                </br>
                <label for="status_progress">Status</label>
                <input class="form-control" type="text" name="status_progress"></input>
                <br />
                <label for="tanggal_realisasi">Finish Development</label>
                <input  class="form-control"  type="date" name="tanggal_realisasi" />
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Create Manager Input" />
        </form>
      </div>
    </div>
  </div>
</div>