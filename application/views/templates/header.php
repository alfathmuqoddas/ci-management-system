<html>
	<head>
		<title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    <!-- <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    *{
      font-family: 'Poppins', sans-serif;
    }
    </style> -->
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Project Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
          <?php if(!$this->ion_auth->logged_in()): ?>
            <li class="nav-item"><a class="nav-link btn btn-primary btn-sm mr-2" href="<?php echo base_url(); ?>auth">Login</a></li>
            <li class="nav-item"><a class="nav-link btn btn-success btn-sm" href="<?php echo base_url(); ?>users/register">Register</a></li>
          <?php elseif($this->ion_auth->is_admin()): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>input">User Input</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>manager">Manager Input</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>developer">Developer Input</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>amgr">Amgr Input</a></li>
          <?php elseif($this->ion_auth->in_group('user_biasa')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>input">User Input</a></li>
          <?php elseif($this->ion_auth->in_group('manager')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>manager">Manager Input</a></li>
          <?php elseif($this->ion_auth->in_group('developer')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>developer">Developer Input</a></li>
          <?php elseif($this->ion_auth->in_group('amgr')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>amgr">Amgr Input</a></li>
          <?php endif; ?>
          <?php $user = $this->ion_auth->user()->row(); if($user) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                echo $user->email;
                ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Logout</a>
              </div>
            </li>
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="py-3">
    <div class="container">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>

      <?php elseif($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>

      <?php elseif($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>

      <?php elseif($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>

      <?php elseif($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>

      <?php elseif($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>

      <?php elseif($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>

       <?php elseif($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>

      <?php elseif($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>