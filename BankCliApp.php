<?php

declare(strict_types=1);

class BankCliApp
{
    private Register $register;

    private const Login = 1;
    private const Registration = 2;
    private const EXIT_APP = 3;



    private array $options = [
        self::Login => 'Login',
        self::Registration => 'registration',
        self::EXIT_APP => 'Exit'
    ];

 



    public function run(): void
    {


        while (true) {
            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::Login:
                    $email    = readline("Enter your email: ");
                    $password = readline("Enter your password: ");


                    break;
                case self::Registration:
                    $name     = readline("Enter your name: ");
                    $email    = readline("Enter your email: ");
                    $pass     = readline("Enter your password: ");
                    $this->register->addMember($name, $email, $pass);
                    break;

                case self::EXIT_APP:
                    return;
                default:
                    echo "Invalid option.\n";
            }
        }
    }
}
