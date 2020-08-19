<?php

define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST', $_SERVER['REQUEST_METHOD']);

define('REQUEST_TYPE', isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : null);

define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_METHOD', 'Index');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('FOLDER_PATH', '/exam_php_s2team');
define('PATH_CORE', 'app/core/');
define('PATH_CONTROLLER', 'app/controllers/');
define('PATH_VIEW', 'app/views/');
define('PATH_MODEL', 'app/models/');

define('DSN', 'mysql:host=localhost;dbname=exam_s2_team');
define('USER', 's2_team');
define('PASSWORD', "/*S2_Team*/");