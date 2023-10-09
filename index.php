
<?php

require_once './MemberInfo.php';
require_once './CreateMember.php';
require_once './Register.php';
require_once './BankCliApp.php';




$cliApp = new BankCliApp();
$cliApp->run();