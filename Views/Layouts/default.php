<!doctype html>
<head>
<meta charset="utf-8">
<title>MVC Todo</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
<link href="starter-template.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
  body {
    padding-top: 5rem;
  }
  .starter-template {
    padding: 3rem 1.5rem;
  }
  .nav-tabs {
    margin-bottom: 25px;
  }
  .card {
    min-width: 320px;
  }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="<?php echo WEBROOT; ?>">MVC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo WEBROOT . "tasks/"; ?>">Tasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo WEBROOT . "tasks/create"; ?>">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo WEBROOT . "admin/"; ?>">Admin</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">
  <div class="starter-template">
    <?php echo $content_for_layout; ?>
  </div>
</main>

</body>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="<?php echo WEBROOT . 'script.min.js'; ?>"></script>
</html>
