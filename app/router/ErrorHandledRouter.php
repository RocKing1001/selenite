<?php

namespace router;

abstract class ErrorHandledRouter extends Router
{
    protected function handleError(int $code): void
    {
        $methodName = 'handle_'.$code;

        if (method_exists($this, $methodName)) {
            $this->$methodName();
        } else {
            $this->default_handler($code);
        }

        exit;
    }

    private function head(): void
    {
        echo '<!DOCTYPE html>';
        echo '
        <style>
        body {
            background-color:black;
            color:white;
            display:flex;
            align-items:center;
            flex-direction:column;
        }
        </style>';
    }

    private function handle_404(): void
    {
        header('HTTP/1.1 404 Not Found');
        $this->head();
        //echo '<h1>404: page not found</h1>';
        echo '<img src="https://http.cat/404" alt="404: Not Found">';
    }

    private function handle_500(): void
    {
        header('HTTP/1.1 500 Internal Server Error');
        $this->head();
        //echo '<h1>500: Internal Server Error</h1>';
        echo '<img src="https://http.cat/500" alt="500: Internal Server Error">';
    }

    private function default_handler(int $code): void
    {
        header('HTTP/1.1'.$code.'UNHANDELED_ERROR');
        $this->head();
        echo '<h1>ERROR: '.$code.'</h1>';
        echo '<img src="https://http.cat/'.$code.'">';
    }
}
