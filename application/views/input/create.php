<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('input/create'); ?>
    <div class="form-group" style="max-width:500px">
        <label for="jenis">Jenis</label>
        <input  class="form-control"  type="text" name="jenis" />
        <br />
        <label for="source_aplikasi">Source Aplikasi</label>
        <input class="form-control" type="text" name="source_aplikasi"></input>
        <br />
        <label for="no_notin">No Notin</label>
        <input class="form-control" type="text" name="no_notin"></textarea>
        <br />
        <label for="tanggal_notin">Tanggal Notin</label>
        <input class="form-control" type="date" name="tanggal_notin"></input>
        <br />
        <label for="no_user_request">No User Request</label>
        <input class="form-control" type="text" name="no_user_request"></input>
        <br />
        <label for="short_desc">Description</label>
        <input class="form-control" type="text" name="short_desc"></input>
        <br />
        <label for="userfile">File Upload</label>
        <input class="form-control" type="file" name="userfile"></input>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Create User Input" />

</form>
