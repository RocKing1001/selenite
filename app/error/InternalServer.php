<?php

namespace error;

class InternalServer extends \Exception
{
    public function __construct()
    {
        parent::__construct('500: Internal server exception');
    }
}
