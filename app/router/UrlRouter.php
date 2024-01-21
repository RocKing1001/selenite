<?php

namespace router;

class UrlRouter extends ErrorHandledRouter
{
    public function route(string $path): void
    {

        if ($this->isPathApi($path)) {
            $this->handleApiRoute(parse_url($path)['path']);
        } else {
            $this->handleRoute(parse_url($path)['path']);
        }
    }

    private function isPathApi(string $path): bool
    {
        return str_starts_with($path, 'api');
    }

    private function isIndex(string $path): bool
    {
        return $path == '' || $path == 'api';
    }

    private function handleApiRoute(string $path): void
    {
        if ($this->isIndex($path)) {
            $path = 'api/index';
        }

        // get the required controller
        $controllerName = ucfirst(str_replace('api/', '', $path)).'Controller';
        $controllerFile = __DIR__.'/../api/controller/'.$controllerName.'.php';

        if (file_exists($controllerFile)) {
            $controllerName = '\\api\\controller\\'.$controllerName;

            try {
                $controller = new $controllerName();
            } catch (\error\NotFound $e) {
                $this->handleError(404);
            } catch (\error\InternalServer $e) {
                $this->handleError(500);
            }
        } else {
            $this->handleError(404);
        }
    }

    private function handleRoute(string $path): void
    {
        if ($this->isIndex($path)) {
            $path = 'index';
        }

        // get the required controller
        $controllerName = ucfirst($path).'Controller';
        $controllerFile = __DIR__.'/../controller/'.$controllerName.'.php';

        $viewFile = __DIR__.'/../view/'.$path.'.php';

        if (file_exists($controllerFile)) {
            $controllerName = '\\controller\\'.$controllerName;

            try {
                $controller = new $controllerName();
            } catch (\error\NotFound $e) {
                $this->handleError(404);
            } catch (\error\InternalServer $e) {
                $this->handleError(500);
            }

        } elseif (file_exists($viewFile)) {
            require __DIR__.'/../template/head.php';
            require $viewFile;
        } else {
            $this->handleError(404);
        }
    }
}
