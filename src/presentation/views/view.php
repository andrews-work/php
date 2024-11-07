<?php

namespace framework\presentation\views;

class view
{
    protected $viewPath;
    protected $data = [];
    protected $viewBasePath;

    // Constructor
    public function __construct($viewPath, $data = [])
    {
        // set base path + data = render
        $this->viewBasePath = realpath(__DIR__ . '/../../../app/presentation/views');
        $this->viewPath = $viewPath;
        $this->data = $data;

        $this->render();
    }

    // render view
    public function render()
    {
        // extract data
        extract($this->data);
        $viewFile = $this->viewBasePath . '/' . $this->viewPath . '.php';

        // get file
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            echo "View not found: " . $viewFile;
        }
    }
}
