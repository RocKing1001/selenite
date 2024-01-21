<?php

namespace controller;

abstract class Controller
{
    protected string $viewFile;

    public function __construct()
    {
        // using reflection to get the view name
        $view = strtolower(str_replace('Controller', '', trim(strrchr(get_called_class(), '\\'), '\\')));
        $this->viewFile = __DIR__.'/../view/'.$view;
    }

    public function render(): void
    {
        session_start();

        // check if body is available
        // head is hardcoded so no check needed
        if (is_file($this->viewFile.'.php')) {
            $file = $this->viewFile.'.php';
            $this->getfile($file);
        } elseif (is_file($this->viewFile.'.html')) {
            $file = $this->viewFile.'.html';
            $this->getfile($file);
        } else {
            throw new \error\NotFound();
            exit;
        }

    }

    protected function getfile(string $file): void
    {

        //session_start();

        $head = __DIR__.'/../template/head.php';

        require $head;
        require $file;

        // including bootstrap js for reactive navbar
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';
    }
}
