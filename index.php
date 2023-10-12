
<?php

require_once './MemberInfo.php';
require_once './CreateMember.php';
require_once './Register.php';
require_once './BankCliApp.php';
require_once './Storage.php';
require_once './FileStorage.php';
require_once './UserRole.php';









$cliApp = new BankCliApp();
$cliApp->run();