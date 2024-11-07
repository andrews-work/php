<?php

namespace framework\presentation\views;

class view
{
    protected $viewPath;
    protected $data = [];
    protected $viewBasePath;

    // data
    public function __construct($viewPath, $data = [])
    {
        // base path + data
        $this->viewBasePath = realpath(__DIR__ . './../../../app/presentation/views'); 
        $this->viewPath = $viewPath;
        $this->data = $data;
    }

    // render
    public function render()
    {
        // Extract the data to variables so they can be used directly in the view
        extract($this->data);

        // Build the full path to the view file
        $viewFile = $this->viewBasePath . '/' . $this->viewPath . '.php';

        // Check if the view file exists
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            echo "View not found: " . $viewFile;
        }
    }
}
