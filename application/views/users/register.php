<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Name</label>
				<div class="form-row">
					<div class="col">
					<input type="text" class="form-control" name="firstname" placeholder="First name">
					</div>
					<div class="col">
					<input type="text" class="form-control" name="lastname" placeholder="Last name">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>User Type</label>
				<select name="group" class="form-control" id="group">
					<option value="3">User Biasa</option>
					<option value="4">Manager</option>
					<option value="5">Developer</option>
					<option value="6">Amgr</option>
				</select>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>
