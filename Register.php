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

        // printf(count($this->registeredMembers));

        // if(count($this->registeredMembers) === 0){

        //     $this->registeredMembers[] = $newMember;
        //     $this->saveData();
        //     var_dump($this->registeredMembers);
        // }

        // elseif(count($this->registeredMembers) > 0) {

        // $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL );

        // if(isEmail)

        $existingMember = $this->existMemberCheck($email);

        if ($existingMember) {
            // var_dump($this->registeredMembers);
            printf('this user exist');
        }
        $this->registeredMembers[] = $newMember;
        $this->saveData();
        printf('congratulation');
    }

    private function existMemberCheck($email): ? CreateMember
    {
        foreach ($this->registeredMembers as $member) {
            if ($member->getEmail() == $email) {
                return $member;
            }
        }
        return null;
    }

    public function saveData(): void
    {
        // var_dump($this->registeredMembers);

        $this->storage->save(MemberInfo::getModelName(), $this->registeredMembers);
    }
}
