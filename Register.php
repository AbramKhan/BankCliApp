<?php

declare(strict_types=1);


class Register
{

    private Storage $storage;

    public array $registeredMembers;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;

        $this->registeredMembers = $this->storage->load(MemberInfo::getModelName());
    }

    public function addMember(string $name, string $email, string $pass): void
    {

        $newMember = new CreateMember();
        $newMember->setName($name);
        $newMember->setEmail($email);
        $newMember->setPass($pass);
        $newMember->setRole(UserRole::CUSTOMER);



        $validEmail = $this->checkValidEmail($email);

        print_r($validEmail);

        
    }

    private function checkValidEmail($email): ? CreateMember
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $email;
            } else {
                echo 'The email address is invalid.';
            }
            return null;
        }

        // $emailExist = $this->uniqueEmailCheck($email);

        // if ($emailExist) {
        //     // var_dump($this->registeredMembers);
        //     printf('this user exist');

        //     //close the accelarion
        //     return;

        // }
        // $this->registeredMembers[] = $newMember;
        // $this->saveData();
        // printf('congratulation');
    

    // private function uniqueEmailCheck($email): ? CreateMember
    // {
    //     foreach ($this->registeredMembers as $member) {
    //         if ($member->getEmail() == $email) {
    //             return $member;
    //         }
    //     }
    //     return null;
    // }

  
    // public function saveData(): void
    // {
    //     // var_dump($this->registeredMembers);

    //     $this->storage->save(MemberInfo::getModelName(), $this->registeredMembers);
    // }

    }