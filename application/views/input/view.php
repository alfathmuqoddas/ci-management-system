<!-- <div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Details</div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $input['no_notin']; ?></h5>
    <ul>
        <li>Jenis: <?php echo $input['jenis']; ?></li>
        <li>Description: <?php echo $input['short_desc']; ?></li>
        <li>Source Aplikasi: <?php echo $input['source_aplikasi']; ?></li>
        <li>Tanggal Notin: <?php echo $input['tanggal_notin']; ?></li>
        <li>Tanggal User Request: <?php echo $input['tanggal_user_request']; ?></li>
    </ul>
  </div>
</div> -->

<h2>Details</h2>
<h3 class="card-title"><?php echo $input['no_notin']; ?></h3>
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




