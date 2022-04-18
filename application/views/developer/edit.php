<?php echo form_open('developer/edit') ?>
    <div class="form-group" style="max-width: 500px;">
        <label for="tanggal_update">Tanggal Update</label>
        <input  class="form-control"  type="date" name="tanggal_update" value="<?php echo $input_developer['tanggal_update']; ?>">
        <br />
        <label for="progress">Progress(%)</label>
        <input class="form-control" type="number" min='0' max='100' name="progress" value="<?php echo $input_developer['progress']; ?>">
        <br />
        <label for="keterangan">Keterangan</label>
        <input class="form-control" type="text" name="keterangan" value="<?php echo $input_developer['keterangan']; ?>">
        </br>
        <label for="status_progress">Status</label>
        <input class="form-control" type="text" name="status_progress" value="<?php echo $input_developer['status_progress']; ?>">
        <br />
        <label for="tanggal_realisasi">Finish Development</label>
        <input  class="form-control"  type="date" name="tanggal_realisasi"  value="<?php echo $input_developer['tanggal_realisasi']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Update Developer Input">
</form>