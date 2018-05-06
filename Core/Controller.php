<?php
    class Controller
    {
        var $vars = [];
        var $layout = "default";

        function set($data)
        {
            $this->vars = array_merge($this->vars, $data);
        }

        function render($filename)
        {
            extract($this->vars);
            
            ob_start();
            require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();

            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }

        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }

    }
?>