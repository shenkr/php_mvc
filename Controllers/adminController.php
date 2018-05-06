<?php
class adminController extends Controller
{
    function index()
    {
        if(isset($_POST['submit']))
        {
            if($_POST['submit'] == "login")
            {
                if($_POST['username'] == 'admin' && $_POST['password'] == '123')
                {
                    Admin::login();
                }
                
            }
            if($_POST['submit'] == "logout")
            {
                Admin::logout();
            }
            //Admin::logout();

            header("Location: " . WEBROOT . "admin");
        }

        $this->render("index");
    }
}
?>