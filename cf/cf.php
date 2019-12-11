<?php if (!defined('CUSTOM_CHECK_GLB')) { header("Location: upgrade"); die();}

define('PRODUCT_NAME', 'BinhiVu');

define('PRODUCT_DOMAIN', 'binhivu.com');

// frontend template folder
define('TEMPLATE_FOLDER', 'v1/');

// define ROOT_URL
define('ROOT_URL', HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . '/');

define('REWRITE_EXT', '.html');

// config encrypt private data
define('ENCRYPT_DATA_PRIVATE_KEY', 'GBe2Q5WtMGcpU74p');

define('PAYMENT_PRODUCT_ID', '24');
define('PAYMENT_PRODUCT_KEY', '4a7739616a644d6732365074436a7744456b42585175394535324851546d4e42');

// define text code
define('NOT_LOGIN', 'NOT_LOGIN');
define('NOT_RIGHT', 'NOT_RIGHT');
define('NOT_VALID', 'NOT_VALID');

// config max item list show on page
define('ROW_NUM_ITEM_PC', 20);
define('ROW_NUM_ITEM_MOBILE', 10);

// ON - OFF send mail system
define('MAIL_SEND', TRUE);
define('MAIL_SENDER_NAME', 'BinhiVu');
define('MAIL_SENDER_MAIL', 'binhivu@binhivu.com');