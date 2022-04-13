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
            <?php if($this->session->userdata('logged_in')) : ?><a class="btn btn-sm btn-danger" href="<?php echo site_url(); ?>/manager/delete/<?php echo $input_manager_item['id'] ?>">Delete</a><?php endif; ?>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Manager Belum Memberi Input Lanjutan</p>
<?php endif; ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-manager-input-modal">
  Create Manager Input
</button>

<div class="modal fade" id="create-manager-input-modal" tabindex="-1" aria-labelledby="#create-manager-input-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Manager Input</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('manager/create/'.$input['id']); ?>
            <div class="form-group" style="max-width: 500px;">
                <label for="prioritas">Prioritas</label>
                <input  class="form-control"  type="text" name="prioritas" />
                <br />
                <label for="tanggal_diskusi_internal">Tanggal Diskusi Internal</label>
                <input class="form-control" type="date" name="tanggal_diskusi_internal"></input>
                <br />
                <label for="tanggal_diskusi_owner">Tanggal Diskusi Owner</label>
                <input class="form-control" type="date" name="tanggal_diskusi_owner"></input>
                </br>
                <label for="start_dev">Start Development</label>
                <input class="form-control" type="date" name="start_dev"></input>
                <br />
                <label for="finish_dev">Finish Development</label>
                <input  class="form-control"  type="date" name="finish_dev" />
                <br />
                <label for="pic_developer">PIC Developer</label>
                <input class="form-control" type="text" name="pic_developer"></input>
                <br />
                <label for="keterangan">Keterangan</label>
                <input class="form-control" type="text" name="keterangan"></input>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Create Manager Input" />
        </form>
      </div>
    </div>
  </div>
</div>