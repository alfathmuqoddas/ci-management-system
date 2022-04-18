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
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Developer Belum Memberi Input Lanjutan</p>
<?php endif; ?>

<h2>Amgr Input</h2>
<?php if($input_amgr) : ?>
    <?php foreach($input_amgr as $input_amgr_item) : ?>
        <h3>UAT Internal</h3>
        <div>
            <ul>
                <li>No Dokumen UAT Internal: <?php echo $input_amgr_item['no_dok_uat_int']; ?></li>
                <li>Tanggal UAT: <?php echo $input_amgr_item['tanggal_uat_int']; ?></li>
                <li>Hasil UAT: <?php echo $input_amgr_item['hasil_uat_int']; ?></li>
                <li>Status Revisi: <?php echo $input_amgr_item['status_revisi_int']; ?></li>
                <li>List Revisi: <?php echo $input_amgr_item['list_revisi_int']; ?></li>
            </ul>
		</div>

        <h3>UAT User</h3>
        <div>
            <ul>
                <li>No Dokumen UAT User: <?php echo $input_amgr_item['no_dok_uat_usr']; ?></li>
                <li>Tanggal UAT: <?php echo $input_amgr_item['tanggal_uat_usr']; ?></li>
                <li>Hasil UAT: <?php echo $input_amgr_item['hasil_uat_usr']; ?></li>
                <li>Status Revisi: <?php echo $input_amgr_item['status_revisi_usr']; ?></li>
                <li>List Revisi: <?php echo $input_amgr_item['list_revisi_usr']; ?></li>
            </ul>
		</div>
        <a class="btn btn-sm btn-danger" href="<?php echo site_url(); ?>/amgr/delete/<?php echo $input_amgr_item['id'] ?>">Delete</a>
    <?php endforeach; ?>
<?php else : ?>
    <p>Amgr Belum Memberi Input Lanjutan</p>
<?php endif; ?>

<?php echo validation_errors(); ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-amgr-input-modal">
Create Amgr Input
</button>
<!-- Modal -->
<div class="modal fade" id="create-amgr-input-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Amgr Input</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h3>Create Amgr Input</h3>
        <?php echo form_open('amgr/create/'.$input['id']); ?>
            <div class="form-group" style="max-width: 500px;">
                <h3>UAT Internal</h3>
                <label for="no_dok_uat_int">No Dokumen UAT Internal</label>
                <input  class="form-control"  type="text" name="no_dok_uat_int" />
                <br />
                <label for="tanggal_uat_int">Tanggal UAT</label>
                <input class="form-control" type="date" name="tanggal_uat_int"></input>
                <br />
                <label for="hasil_uat_int">Hasil UAT</label>
                <input class="form-control" type="text" name="hasil_uat_int"></input>
                </br>
                <label for="status_revisi_int">Status Revisi</label>
                <input class="form-control" type="text" name="status_revisi_int"></input>
                <br />
                <label for="list_revisi_int">List Revisi</label>
                <input  class="form-control"  type="text" name="list_revisi_int" />
            </div>
            <div class="form-group" style="max-width: 500px;">
                <h3>UAT User</h3>
                <label for="no_dok_uat_usr">No Dokumen UAT User</label>
                <input  class="form-control"  type="text" name="no_dok_uat_usr" />
                <br />
                <label for="tanggal_uat_usr">Tanggal UAT</label>
                <input class="form-control" type="date" name="tanggal_uat_usr"></input>
                <br />
                <label for="hasil_uat_usr">Hasil UAT</label>
                <input class="form-control" type="text" name="hasil_uat_usr"></input>
                </br>
                <label for="status_revisi_usr">Status Revisi</label>
                <input class="form-control" type="text" name="status_revisi_usr"></input>
                <br />
                <label for="list_revisi_usr">List Revisi</label>
                <input  class="form-control"  type="text" name="list_revisi_usr" />
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Create Amgr Input" />
        </form>
      </div>
    </div>
  </div>
</div>