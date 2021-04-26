<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//offset to GMT in Minutes at local area
$config['gmtOffset'] = 60;

//Break time per working day in minutes, will be deducted from from working time
$config['break'] = 60;

//Job start time from local 00:00, starting job prior this time will not be considered, set to 0 for free start time
$config['jobStartTime'] = 7 * 60;

//Maximum job duration per day in minutes. Break time will be deducted 
$config['maxJobDuration'] = 9 * 60;
