<?php
// config.php
return [
  'db_input' => [
    'host' => '127.0.0.1', 'dbname' => 'studentdetails', 'user' => 'root', 'pass' => ''
  ],
  'db_output' => [
    'host' => '127.0.0.1', 'dbname' => 'output_db', 'user' => 'root', 'pass' => ''
  ],
  'mail' => [
    'from_email' => 'youremail@gmail.com',
    'from_name' => 'Exam Office',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_user' => 'youremail@gmail.com',
    'smtp_pass' => 'your_app_password',
    'smtp_port' => 587
  ],
  'rooms' => ['room_201','room_202','room_203','room_204','room_205'] // add as needed
];
