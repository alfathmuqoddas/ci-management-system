<?php if($this->session->userdata('logged_in')) : ?>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('input/update'); ?>
    <div class="form-group" style="max-width:500px">
        <label for="jenis">Jenis</label>
        <input  class="form-control"  type="text" name="jenis" value="<?php echo $input['jenis']; ?>"/>
        <br />
        <label for="source_aplikasi">Source Aplikasi</label>
        <input class="form-control" type="text" name="source_aplikasi" value="<?php echo $input['source_aplikasi']; ?>"></input>
        <br />
        <label for="no_notin">No Notin</label>
        <input class="form-control" type="text" name="no_notin" value="<?php echo $input['no_notin']; ?>"></textarea>
        <br />
        <label for="tanggal_notin">Tanggal Notin</label>
        <input class="form-control" type="date" name="tanggal_notin" value="<?php echo $input['tanggal_notin']; ?>"></input>
        <br />
        <label for="no_user_request">No User Request</label>
        <input class="form-control" type="text" name="no_user_request" value="<?php echo $input['no_user_request']; ?>"></input>
        <br />
        <label for="short_desc">Description</label>
        <input class="form-control" type="text" name="short_desc" value="<?php echo $input['short_desc']; ?>"></input>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Update User Input" />

</form>
<?php endif; ?>

