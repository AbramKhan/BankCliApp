<?php

declare(strict_types=1);

class CreateMember extends MemberInfo
{

    public function __construct(string $name, string $email, string $pass)
    {
        $this->name = $name;
        $this->name = $email;
        $this->name = $pass;
    }
}
