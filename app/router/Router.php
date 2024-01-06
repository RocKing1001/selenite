<?php

namespace router;

abstract class Router
{
    abstract public function route(string $path): void;
}
