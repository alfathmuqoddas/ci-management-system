<?php if($this->session->userdata('logged_in')) : ?>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('input/create'); ?>

    <div class="form-group" style="max-width:500px">
        <label for="jenis">Jenis</label>
        <input  class="form-control"  type="text" name="jenis" />
        <br />
        <label for="text">Source Aplikasi</label>
        <input class="form-control" type="text" name="source_aplikasi"></input>
        <br />
        <label for="text">No Notin</label>
        <input class="form-control" type="text" name="no_notin"></textarea>
        <br />
        <label for="text">Tanggal Notin</label>
        <input class="form-control" type="date" name="tanggal_notin"></input>
        <br />
        <label for="text">No User Request</label>
        <input class="form-control" type="text" name="no_user_request"></input>
        <br />
        <label for="text">Tanggal User Request</label>
        <input class="form-control" type="date" name="tanggal_user_request"></input>
        <br />
        <label for="text">Description</label>
        <input class="form-control" type="text" name="short_desc"></input>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Create User Input" />

</form>
<?php endif; ?>

