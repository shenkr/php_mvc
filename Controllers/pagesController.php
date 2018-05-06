<?php
class pagesController extends Controller
{
		function index()
    {
        $this->render("index");
    }

    function error()
    {
        $this->render("error");
    }
}
?>