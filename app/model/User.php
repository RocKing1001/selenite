<?php

namespace model;

class User
{
    // These are public as I need to set all of these
    // when constructing \model\Guide
    public int $user_id;

    public string $email;

    public string $pass;

    public string $username;

    public string $pfp;
}
