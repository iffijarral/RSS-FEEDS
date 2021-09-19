<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require APP_ROOT.'app/backend/core/Database.php';
require APP_ROOT.'app/backend/auth/config.php';
require APP_ROOT.'app/backend/core/Helpers.php';


require BACKEND_BASE.'models/News.php';
require BACKEND_BASE.'models/Resource.php';

require BACKEND_BASE.'business/NewsOperations.php';
require BACKEND_BASE.'business/ResourceOperations.php';
