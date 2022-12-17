<?php
$validator = new FormValidator();
$validator->addValidation("Name","req","Please fill in Name");
$validator->addValidation("Email","email",
"The input for Email should be a valid email value");
$validator->addValidation("Email","req","Please fill in Email"); 

?>