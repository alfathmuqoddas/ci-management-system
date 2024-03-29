<h2><?php echo $title; ?></h2>

<a class="btn btn-primary" href="<?php echo site_url(); ?>/input/create">Create Input</a>

<div class="overflow-auto">
<table class="table table-sm table-hover table-striped mt-5">
    <thead>
      <tr>
        <th>id</th>
        <th>Jenis</th>
        <th>Source Applikasi</th>
        <!-- <th>No Notin</th>
        <th>Tanggal Notin</th>
        <th>No User Request</th> -->
        <th>Tanggal User Request</th>
        <th>Deskripsi</th>
        <!-- <th>Manager Response</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($input as $input_item): ?>
        <tr>
            <td><?php echo $input_item['id']; ?></td>
            <td><?php echo $input_item['jenis']; ?></td>
            <td><?php echo $input_item['source_aplikasi']; ?></td>
            <!-- <td><?php echo $input_item['no_notin']; ?></td>
            <td><?php echo $input_item['tanggal_notin']; ?></td>
            <td><?php echo $input_item['no_user_request']; ?></td> -->
            <td><?php echo $input_item['tanggal_user_request']; ?></td>
            <td><?php echo $input_item['short_desc']; ?></td>
            <!-- <td><?php echo $input_item['response']; ?></td> -->
            <td>
                <div class="btn-group">
                    <a type="button" href="<?php echo site_url(); ?>input/view/<?php echo $input_item['id']; ?>" class="btn btn-primary btn-sm">Details</a>
                    <!-- <a href="" type="button" class="btn btn-success btn-sm">Edit</a> -->
                    <?=anchor("input/delete/".$input_item['id'],"Delete",array('onclick' => "return confirm('Do you want delete this record?')", 'class' => "btn btn-danger btn-sm"))?>
                    <!-- <a type="button" href="<?php echo site_url(); ?>input/delete/<?php echo $input_item['id']; ?>" class="btn btn-danger btn-sm">Delete</a> -->
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>