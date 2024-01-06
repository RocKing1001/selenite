<?php

namespace error;

class NotFound extends \Exception
{
    public function __construct()
    {
        parent::__construct('404: Page Not Found');
    }
}
