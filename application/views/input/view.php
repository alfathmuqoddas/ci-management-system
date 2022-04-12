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
                <li>Tanggal Update: <?php echo $input_developer_item['prioritas']; ?></li>
                <li>Progress: <?php echo $input_developer_item['tanggal_diskusi_internal']; ?></li>
                <li>Keterangan: <?php echo $input_developer_item['tanggal_diskusi_owner']; ?></li>
                <li>Status: <?php echo $input_developer_item['start_dev']; ?></li>
                <li>Tanggal Realisasi: <?php echo $input_developer_item['finish_dev']; ?></li>
            </ul>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Developer Belum Memberi Input Lanjutan</p>
<?php endif; ?>




