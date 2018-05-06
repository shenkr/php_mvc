<?php
class tasksController extends Controller
{
    function index($page=null)
    {
        if($page == null)
        {
            header("Location: " . WEBROOT . "tasks/index/1");
        }
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();
        $pagination = new Pagination($tasks->count(), $page, 3);

        $data['tasks'] = $tasks->showByOrderAndLimit(($page - 1) * 3, 3);
        $data['pagination'] = $pagination;

        $this->set($data);
        $this->render("index");
    }

    function username($page=null)
    {
        if($page == null)
        {
            header("Location: " . WEBROOT . "tasks/username/1");
        }
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();

        $pagination = new Pagination($tasks->count(), $page, 3);

        $data['tasks'] = $tasks->showByOrderAndLimit(($page - 1) * 3, 3, "username");
        $data['page'] = $page;

        $data['pagination'] = $pagination;
        $this->set($data);
        $this->render("username");
    }

    function email($page=null)
    {
        if($page == null)
        {
            header("Location: " . WEBROOT . "tasks/email/1");
        }
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();

        $pagination = new Pagination($tasks->count(), $page, 3);

        $data['tasks'] = $tasks->showByOrderAndLimit(($page - 1) * 3, 3, "email");
        $data['page'] = $page;

        $data['pagination'] = $pagination;
        $this->set($data);
        $this->render("email");
    }

    function status($page=null)
    {
        if($page == null)
        {
            header("Location: " . WEBROOT . "tasks/status/1");
        }
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();

        $pagination = new Pagination($tasks->count(), $page, 3);

        $data['tasks'] = $tasks->showByOrderAndLimit(($page - 1) * 3, 3, "status");
        $data['page'] = $page;

        $data['pagination'] = $pagination;
        $this->set($data);
        $this->render("status");
    }

    function create()
    {
        if (isset($_POST["submit"]))
        {
            require(ROOT . 'Models/Task.php');

            $errors = false;

            $picture = ROOT . "uploads/" . basename($_FILES["file"]["name"]);

            $picture_type = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["file"]["tmp_name"]);

            if(!$check)
            {
               $errors[] = "no image file";
            }

            $types = ["jpg", "png", "gif"];
            if(!in_array($picture_type, $types))
            {
                $errors[] = "type error";
            }

            if (!$errors)
            {
                $task = new Task();
                $id = $task->create($_POST["username"], $_POST['email'], $_POST["description"], $picture_type, 'not done');
                // Проверим, загружалось ли через форму изображение
                if(is_uploaded_file($_FILES["file"]["tmp_name"]))
                {
                    $picture_name = ROOT . "uploads/" . $id . "." . $picture_type;
                    move_uploaded_file($_FILES["file"]["tmp_name"], $picture_name);

                    if (true !== ($pic_error = Resize::image_resize($picture_name, $picture_name, 320, 240, 1))) {
                        echo $pic_error;
                        unlink($picture_name);
                    }
                    else
                    {
                        header("Location: " . WEBROOT . "tasks/index");
                    }
                }


                
            }

        }

        $data["errors"] = $errors;
        $this->set($data);

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/Task.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        // AJAX
        if(isset($_POST["action"]))
        {
            if($_POST["action"] == "status")
            {
                $task->toggleStatus($id);
            }
            if($_POST["action"] == "description")
            {
                $task->edit($id, $_POST["action"], $_POST["data"]);
            }
            
        }
        else {


        $this->set($d);
        $this->render("edit");
    }
    }

    function delete($id)
    {
        require(ROOT . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>