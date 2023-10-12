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

        printf(count($this->registeredMembers));
        
        if(count($this->registeredMembers) == 0){
            
            $this->registeredMembers[] = $newMember;
            $this->saveData();
            var_dump($this->registeredMembers);
        }

        elseif(count($this->registeredMembers) > 0) {

            
            $validateMember = $this->validateEmail($email);

            if($validateMember){
                $this->saveData();
                var_dump($this->registeredMembers);
                printf('congratulation');
            }

        }

       
    }

    private function validateEmail($email): string
    {
        foreach($this->registeredMembers as $member){
            if($member->getEmail() !== $email){
                return $email;
            }
            return 'email has taken';
            
        }
        
        
    }

    public function saveData(): void
    {
        // var_dump($this->registeredMembers);

        $this->storage->save(MemberInfo::getModelName(), $this->registeredMembers);
    }
}
