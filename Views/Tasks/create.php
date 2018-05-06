<div class="row">
  <div class="col-md-4 offset-md-4">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active show" data-toggle="tab" href="#create">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#preview">Preview</a>
      </li>
    </ul>
    <div id="tabs" class="tab-content">
      <div class="tab-pane fade active show" id="create">
        <?php if(isset($errors) && is_array($errors)): ?>
        <ul>
          <?php foreach ($errors as $error): ?>
          <li>  <?php echo $error; ?> </li>
          <?php endforeach; ?>
          
        </ul>
      <?php endif; ?>
        <h2>Create task</h2></br>
        <form method='post' enctype="multipart/form-data">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter a username" name="username">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Enter a email" name="email">
          </div>
          <div class="form-group">
            <label for="file">Image</label>
            <input type="file" class="form-control-file" id="file" aria-describedby="fileHelp" name="file">
            <small id="fileHelp" class="form-text text-muted">formats JPG/GIF/PNG, no less than 320х240 pixels</small>
          </div>
          <div class="form-group">
            <label for="description">Enter a description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
      <div class="tab-pane fade" id="preview">
        <h2>Preview task</h2></br>
        <div class="card mb-3">
          <img style="height: 200px; width: 100%; display: block;" class="file-preview" src="../../img.svg" alt="Card image">
          <div class="card-body">
            <p class="card-text">
              <span class="description-preview">{description}</span>
            </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="d-flex align-items-center">
                <span>
                  <h5>status</h5>
                </span>
                <button type="button" class="btn btn-secondary ml-auto">Not Done</button>
              </div>
            </li>
          </ul>
          <div class="card-footer text-muted">
            added by <b><span class="username-preview">{username}</span></b> <i class="text-right">
              <span class="email-preview">{mail}</span></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var img = new Image();
      img.src = e.target.result;

      document.body.append(img);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file").click(function() {
  readURL(this);
});
</script>