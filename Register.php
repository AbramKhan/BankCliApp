<?php 
declare(strict_types=1);

class Register{

public array $registeredMembers;

public function addMember(string $name, string $email, string $pass): void
{
    print_r($name,$email, $pass);

}

}