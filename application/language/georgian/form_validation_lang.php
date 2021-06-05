<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files ("Software"), to deal
 * in Software without restriction, including without limitation rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of Software, and to permit persons to whom Software is
 * furnished to do so, subject to following conditions:
 *
 * above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of Software.
 *
 * SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH SOFTWARE OR USE OR OTHER DEALINGS IN
 * SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= '{field} ველი აუცილებელია.';
$lang['form_validation_isset']			= '{field} ველs უნდა ქონდეს მნიშვნელობა.';
$lang['form_validation_valid_email']		= '{field} ველი უნდა შეიცავდეს სწორ email-ს.';
$lang['form_validation_valid_emails']		= '{field} ველი უნდა შეიცავდეს სწორ email მისამართებს.';
$lang['form_validation_valid_url']		= '{field} ველი mუნდა შეიცავდეს სწორ URL.';
$lang['form_validation_valid_ip']		= '{field} ველი უნდა შეიცავდეს სწორ IP მისამართს.';
$lang['form_validation_valid_base64']		= '{field} ველი უნდა შეიცავდეს სწორ Base64 ტექსტს.';
$lang['form_validation_min_length']		= '{field} ველი უნდა შეიცავდეს მინიმუმ {param} სიმბოლოს.';
$lang['form_validation_max_length']		= '{field} ველი არ უნდა იყოს {param} სიმბოლოზე მეტი.';
$lang['form_validation_exact_length']		= '{field} ველი უნდა იყოს {param} სიმბოლო.';
$lang['form_validation_alpha']			= '{field} ველი შეიძლება შეიცავდეს მხოლოდ ალფავიტის ასოებს.';
$lang['form_validation_alpha_numeric']		= '{field} ველი შეიძლება შეიცავდეს მხოლოდ ასოებს და ციფრებს.';
$lang['form_validation_alpha_numeric_spaces']	= '{field} ველი შეიძლება შეიცავდეს ასოებს, ციფრებს და ჰარს.';
$lang['form_validation_alpha_dash']		= '{field} ველი may only contain alpha-numeric characters, underscores, and dashes.';
$lang['form_validation_numeric']		= '{field} ველი უნდა შეიცავდეს მხოლოდ რიცხვს.';
$lang['form_validation_is_numeric']		= '{field} ველი უნდა შეიცავდეს მხოლოდ ციფრებს.';
$lang['form_validation_integer']		= '{field} ველი უნდა იყოს მთელი რიცხვი.';
$lang['form_validation_regex_match']		= '{field} ველი არ არის სწორ ფორმატში.';
$lang['form_validation_matches']		= '{field} ველი არ ემთხვევა {param} ველს.';
$lang['form_validation_differs']		= '{field} ველი უნდა განსხვავდებოდეს {param} ველისგან.';
$lang['form_validation_is_unique'] 		= '{field} ველი უნდა შეიცავდეს უნიკალურ მნიშვნელობას.';
$lang['form_validation_is_natural']		= '{field} ველი უნდა შეიცავდეს მხოლოდ ციფრებს.';
$lang['form_validation_is_natural_no_zero']	= '{field} ველი უნდა შეიცავდეს მხოლოდ ციფრებს და იყოს ნულზე მეტი.';
$lang['form_validation_decimal']		= '{field} ველი უნდა შეიცავდეს მეათედებს.';
$lang['form_validation_less_than']		= '{field} ველი უნდა იყოს ნაკლები ვიდრე {param}.';
$lang['form_validation_less_than_equal_to']	= '{field} ველი უნდა იყოს ნაკლები ან ტოლი ვიდრე {param}.';
$lang['form_validation_greater_than']		= '{field} ველი უნდა იყოს მეტი ვიდრე {param}.';
$lang['form_validation_greater_than_equal_to']	= '{field} ველი უნდა იყოს მეტი ან ტოლი ვიდრე {param}.';
$lang['form_validation_error_message_not_set']	= 'ვერ მოიძებნა {field} ველის შესაბამისი შეცდომა.';
$lang['form_validation_in_list']		= '{field} ველი უნდა იყოს ერთ-ერთი: {param}.';
$lang['form_validation_xss_clean']		= '{field} ველი შეიცავს არასწორ სიმბოლოებს.';
$lang['upload_invalid_filetype'] = "არასწორი ფაილის ტიპი";