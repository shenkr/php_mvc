<?php
if(Admin::isLogged())
{
    echo '<form method="POST">
  <fieldset>
    <legend>Logout</legend>
    <button type="submit" name="submit" value="logout" class="btn btn-primary">Submit</button>
  </fieldset>
</form>';
}
else
{
    echo '<form method="POST">
  <fieldset>
    <legend>Login</legend>
        <div class="form-group">
      <label for="exampleInputUsername">Username</label>
      <input type="username" name="username" class="form-control" id="exampleInputUsername" placeholder="admin">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="123">
    </div>
    <button type="submit" name="submit" value="login" class="btn btn-primary">Submit</button>
  </fieldset>
</form>';
}
?>
