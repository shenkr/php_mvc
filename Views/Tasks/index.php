<div class="row">
  <div class="col">
    <h1>Tasks</h1>
  </div>
  <div class="col">
    <div class="d-flex justify-content-end">
      <div class="p-2">
        <h3 class="text-right">Sort by:</h3>
      </div>
      <div class="p-2">
        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-outline-secondary" href="<?php echo WEBROOT . "tasks/username"; ?>">Username</a>
          <a class="btn btn-outline-secondary" href="<?php echo WEBROOT . "tasks/email"; ?>">Email</a>
          <a class="btn btn-outline-secondary" href="<?php echo WEBROOT . "tasks/status"; ?>">Status</a>
        </div>
      </div>
    </div>
  </div>
</div>
</br>
<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <?php foreach ($tasks as $task): ?>
      <div class="col-lg-4">
        <div class="bs-component">

          <div class="card mb-3">

            <img style="width: 100%; height: 240px; display: block;" src="<?php echo WEBROOT . "uploads/" . $task['id'] . '.' . $task['image']; ?>" alt="Card image">
            <div class="card-body">
              <p class="card-text">
                <?php if(Admin::isLogged()) { echo '<div class="form-group">
            <textarea class="form-control text-'. $task['id'] .'" id="description" rows="3" name="description">'. $task['description'] .'</textarea></div><div class="form-group"><button type="button" data-id='. $task['id'] .' class="btn btn-outline-secondary description float-sm-right">Save Description</button>
          </div>'; } else { echo $task['description']; }  ?></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="d-flex align-items-center">
                  <span>
                    <h5>status</h5>
                  </span>
                  <?php echo
                  $test = null;
                  $test .= $task['status'] == 'done' ? 'btn-success' : 'btn-secondary';
                  $test .= Admin::isLogged() ? '' : ' disabled';

                  echo '<button type="button" data-id="'. $task['id'] .'" class="btn '. $test .' done ml-auto">'. $task['status'] .'</button>'
                  ?>
                  
                  
                  
                </div>
              </li>
            </ul>
            <div class="card-footer text-muted">
              added by <b><?php echo $task['username']; ?></b> <i class="text-right"><?php echo $task['email']; ?></i>
            </div>
          </div>
        </div>
      </div>
      <?php  endforeach; ?>
    </div>
  </div>
</div>
</br>
<div class="row justify-content-md-center">
  <div class="col-md-auto">
    <?php echo $pagination->get(); ?>
  </div>
</div>