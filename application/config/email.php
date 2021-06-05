<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'sendmail', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.afishnik.com', 
    'smtp_port' => 465,
    // 'smtp_user' => 'no-reply@afishnik.com',
    // 'smtp_pass' => 'g1l8]WmsM[I9',
    'smtp_user' => 'guest@afishnik.com',
    'smtp_pass' => 'o0Di7]{{dsk_UdB.U%7*4=+n',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);