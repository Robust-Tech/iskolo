-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2017 at 03:42 PM
-- Server version: 5.6.33
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datavuqd_myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_timer`
--

CREATE TABLE IF NOT EXISTS `academicyear` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `yearTitle` varchar(250) NOT NULL,
  `isDefault` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE IF NOT EXISTS `account_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `position` varchar(150) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `mobile` varchar(32) DEFAULT NULL,
    `avatar` mediumtext COLLATE utf8_unicode_ci,
  `use_gravatar` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `department` varchar(200) DEFAULT NULL,
  `allowed_modules` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `studentacademicyears` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `studentId` int(250) NOT NULL,
  `academicYearId` int(250) NOT NULL,
  `gradeId` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(255) DEFAULT NULL,
  `description` text,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `color` varchar(32) DEFAULT '#38354a',
  `visible` enum('yes','no') DEFAULT 'no',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `visible` enum('yes','no') DEFAULT 'no',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `api_access`
--

CREATE TABLE IF NOT EXISTS `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `api_key` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `api_limits`
--

CREATE TABLE IF NOT EXISTS `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE IF NOT EXISTS `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `params` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `api_key` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` tinyint(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE IF NOT EXISTS `assessments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(32) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `type_id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `total_mark` int(11) DEFAULT '0',
  `submitted` enum('yes','no') DEFAULT 'no',
  `visible` enum('yes','no') DEFAULT 'no',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_results`
--

CREATE TABLE IF NOT EXISTS `assessment_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `mark` double DEFAULT NULL,
  `comment` text,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_types`
--

CREATE TABLE IF NOT EXISTS `assessment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assessment_types`
--

INSERT INTO `assessment_types` (`id`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Assignment', 'Assignment', NULL, '2017-09-29 04:54:50', NULL, NULL),
(2, 'Exam', 'Exam', NULL, '2017-09-29 04:54:51', NULL, NULL),
(3, 'Project', 'Project', NULL, '2017-09-29 04:54:51', NULL, NULL),
(4, 'Test', 'Test', NULL, '2017-09-29 04:54:51', NULL, NULL);

-- --------------------------------------------------------

CREATE TABLE `assign_grade` (
  `id` int(11) UNSIGNED NOT NULL,
  `assigned_teacher` int(11) NOT NULL,
  `class_assigned` int(11) NOT NULL,
  `grade_assigned` int(11) NOT NULL,
  `subject_assigned` int(11) NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT '0',
  `word` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE IF NOT EXISTS `class_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` enum('non','mon','tues','wed','thu','fri','sat','sun') NOT NULL DEFAULT 'non',
  `occurrence` enum('once','daily','weekly','monthly') NOT NULL DEFAULT 'once',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `config_key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`config_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_key`, `value`) VALUES

('allowed_files', 'gif|png|jpeg|jpg|pdf|doc|txt|docx|xls|zip|rar|xls|mp4'),
('auto_backup_db', 'TRUE'),
('auto_close_ticket', '30'),
('beta_updates', 'FALSE'),
('build', '0'),
('button_color', 'success'),
('captcha_login', 'FALSE'),
('chart_color', '#11A7DB'),
('school_address', '4146 Golden Woods'),
('school_city', 'Sydney'),
('school_country', 'Australia'),
('school_domain', 'http://datavisuals.co.za/mylms/'),
('school_email', 'lesley@datavisuals.co.za'),
('school_fax', ''),
('school_legal_name', 'My School Demo'),
('school_logo', 'logo.png'),
('school_mobile', '(123) 456 00000'),
('school_name', 'My School Demo'),
('school_phone', '(123) 456 78900'),
('school_phone_2', ''),
('school_registration', ''),
('school_state', 'Sample State'),
('school_vat', ''),
('school_zip_code', '20300'),
('contact_person', 'Lesley M Mphahlele'),
('cron_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('currency_decimals', '2'),
('currency_position', 'before'),
('date_format', '%d-%m-%Y'),
('date_php_format', 'd-m-Y'),
('date_picker_format', 'dd-mm-yyyy'),
('decimal_separator', '.'),
('demo_mode', 'FALSE'),
('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg=='),
('disable_emails', 'FALSE'),
('email_account_details', 'TRUE'),
('email_piping', 'TRUE'),
('email_staff_tickets', 'TRUE'),
('enable_languages', 'TRUE'),
,
('file_max_size', '80000'),
('gcal_api_key', ''),
('gcal_id', ''),
('hide_branding', 'FALSE'),
('hide_sidebar', 'FALSE'),
('languages', ''),
('last_check', '1472718040'),
('last_seen_activities', '1469792851'),
('locale', 'en_US'),
('login_bg', 'bg_login.jpg'),
('login_title', 'Project Management'),
('logo_or_icon', 'logo_title'),
('mailbox', 'INBOX'),
('mail_encryption', 'tls'),
('mail_flags', '/novalidate-cert'),
('mail_imap', 'TRUE'),
('mail_imap_host', 'imap.gmail.com'),
('mail_password', ''),
('mail_port', '993'),
('mail_search', 'UNSEEN'),
('mail_ssl', 'TRUE'),
('mail_username', 'lesleyMr'),
('pdf_engine', 'mpdf'),
('postmark_api_key', ''),
('postmark_from_address', 'lesley@datavisuals.co.za'),
('project_prefix', 'PRO'),
('protocol', 'mail'),
('remote_login_expires', '72'),
('reset_key', '34WI2L12L87I1A65M90M9A42N41D08A26I'),
('rows_per_table', '25'),
('settings', 'email'),
('show_login_image', 'TRUE'),
('show_only_logo', 'FALSE'),
('show_time_ago', 'TRUE'),
('sidebar_theme', 'dark'),
('site_appleicon', 'logo_favicon.png'),
('site_author', 'Lesley M.'),
('site_desc', 'iSkolo LMS is a Web based PHP learner management system for middle schools and colleges + universities'),
('site_favicon', 'icon.png'),
('site_icon', 'fa-flask'),
('slack_channel', ''),
('slack_notification', 'FALSE'),
('slack_username', ''),
('slack_webhook', ''),
('smtp_encryption', ''),
('smtp_host', 'in-v3.mailjet.com'),
('smtp_pass', ''),
('smtp_port', '587'),
('smtp_user', 'lesley@datavisuals.co.za'),
('stop_timer_logout', 'FALSE'),
('stripe_private_key', ''),
('stripe_public_key', ''),
('support_email', 'lesley@datavisuals.co.za'),
('support_email_name', 'My School Demo Support'),
('swap_to_from', 'TRUE'),
('system_font', 'roboto'),
('tax_decimals', '2'),
('theme_color', 'dark'),
('thousand_separator', ','),
('ticket_default_department', '1'),
('ticket_start_no', '1'),
('timezone', 'Europe/Moscow'),
('top_bar_color', 'dark'),
('two_checkout_live', 'TRUE'),
('updates', '1'),
('update_xrates', 'TRUE'),
('use_alternate_emails', 'TRUE'),
('use_gravatar', 'TRUE'),
('use_postmark', 'FALSE'),
('use_recaptcha', 'TRUE'),
('valid_license', 'TRUE'),
('website_name', 'My School Demo'),
('xrates_app_id', ''),
('xrates_check', '2016-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `value` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_group` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `template_body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(255) DEFAULT NULL,
  `description` text,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hooks`
--

CREATE TABLE IF NOT EXISTS `hooks` (
  `module` varchar(128) NOT NULL,
  `parent` varchar(128) DEFAULT NULL,
  `hook` varchar(128) NOT NULL DEFAULT '0',
  `icon` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `access` int(2) NOT NULL,
  `core` int(2) DEFAULT NULL,
  `visible` int(2) DEFAULT '1',
  `permission` varchar(255) DEFAULT NULL,
  `enabled` int(2) NOT NULL DEFAULT '1',
  `last_run` datetime DEFAULT NULL,
  PRIMARY KEY (`module`,`hook`,`access`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`code`, `name`, `icon`, `active`) VALUES
('cs', 'czech', 'cs', 1),
('de', 'german', 'de', 1),
('el', 'greek', 'gr', 1),
('en', 'english', 'us', 1),
('es', 'spanish', 'es', 1),
('fr', 'french', 'fr', 1),
('hr', 'croatian', 'hr', 0),
('it', 'italian', 'it', 1),
('nl', 'dutch', 'nl', 1),
('no', 'norwegian', 'no', 1),
('pl', 'polish', 'pl', 1),
('pt', 'portuguese', 'pt', 1),
('pt-br', 'portuguese-brazilian', 'pt', 1),
('ro', 'romanian', 'ro', 1),
('ru', 'russian', 'ru', 1),
('sr', 'serbian', 'sr', 0),
('tr', 'turkish', 'tr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `ext` varchar(100) DEFAULT NULL,
  `size` int(10) DEFAULT NULL,
  `is_image` int(2) DEFAULT NULL,
  `image_width` int(5) DEFAULT NULL,
  `image_height` int(5) DEFAULT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE IF NOT EXISTS `locales` (
  `locale` varchar(10) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`locale`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`locale`, `code`, `language`, `name`) VALUES
('aa_DJ', 'aa', 'afar', 'Afar (Djibouti)'),
('aa_ER', 'aa', 'afar', 'Afar (Eritrea)'),
('aa_ET', 'aa', 'afar', 'Afar (Ethiopia)'),
('af_ZA', 'af', 'afrikaans', 'Afrikaans (South Africa)'),
('am_ET', 'am', 'amharic', 'Amharic (Ethiopia)'),
('an_ES', 'an', 'aragonese', 'Aragonese (Spain)'),
('ar_AE', 'ar', 'arabic', 'Arabic (United Arab Emirates)'),
('ar_BH', 'ar', 'arabic', 'Arabic (Bahrain)'),
('ar_DZ', 'ar', 'arabic', 'Arabic (Algeria)'),
('ar_EG', 'ar', 'arabic', 'Arabic (Egypt)'),
('ar_IN', 'ar', 'arabic', 'Arabic (India)'),
('ar_IQ', 'ar', 'arabic', 'Arabic (Iraq)'),
('ar_JO', 'ar', 'arabic', 'Arabic (Jordan)'),
('ar_KW', 'ar', 'arabic', 'Arabic (Kuwait)'),
('ar_LB', 'ar', 'arabic', 'Arabic (Lebanon)'),
('ar_LY', 'ar', 'arabic', 'Arabic (Libya)'),
('ar_MA', 'ar', 'arabic', 'Arabic (Morocco)'),
('ar_OM', 'ar', 'arabic', 'Arabic (Oman)'),
('ar_QA', 'ar', 'arabic', 'Arabic (Qatar)'),
('ar_SA', 'ar', 'arabic', 'Arabic (Saudi Arabia)'),
('ar_SD', 'ar', 'arabic', 'Arabic (Sudan)'),
('ar_SY', 'ar', 'arabic', 'Arabic (Syria)'),
('ar_TN', 'ar', 'arabic', 'Arabic (Tunisia)'),
('ar_YE', 'ar', 'arabic', 'Arabic (Yemen)'),
('ast_ES', 'ast', 'asturian', 'Asturian (Spain)'),
('as_IN', 'as', 'assamese', 'Assamese (India)'),
('az_AZ', 'az', 'azerbaijani', 'Azerbaijani (Azerbaijan)'),
('az_TR', 'az', 'azerbaijani', 'Azerbaijani (Turkey)'),
('bem_ZM', 'bem', 'bemba', 'Bemba (Zambia)'),
('ber_DZ', 'ber', 'berber', 'Berber (Algeria)'),
('ber_MA', 'ber', 'berber', 'Berber (Morocco)'),
('be_BY', 'be', 'belarusian', 'Belarusian (Belarus)'),
('bg_BG', 'bg', 'bulgarian', 'Bulgarian (Bulgaria)'),
('bn_BD', 'bn', 'bengali', 'Bengali (Bangladesh)'),
('bn_IN', 'bn', 'bengali', 'Bengali (India)'),
('bo_CN', 'bo', 'tibetan', 'Tibetan (China)'),
('bo_IN', 'bo', 'tibetan', 'Tibetan (India)'),
('br_FR', 'br', 'breton', 'Breton (France)'),
('bs_BA', 'bs', 'bosnian', 'Bosnian (Bosnia and Herzegovina)'),
('byn_ER', 'byn', 'blin', 'Blin (Eritrea)'),
('ca_AD', 'ca', 'catalan', 'Catalan (Andorra)'),
('ca_ES', 'ca', 'catalan', 'Catalan (Spain)'),
('ca_FR', 'ca', 'catalan', 'Catalan (France)'),
('ca_IT', 'ca', 'catalan', 'Catalan (Italy)'),
('crh_UA', 'crh', 'crimean turkish', 'Crimean Turkish (Ukraine)'),
('csb_PL', 'csb', 'kashubian', 'Kashubian (Poland)'),
('cs_CZ', 'cs', 'czech', 'Czech (Czech Republic)'),
('cv_RU', 'cv', 'chuvash', 'Chuvash (Russia)'),
('cy_GB', 'cy', 'welsh', 'Welsh (United Kingdom)'),
('da_DK', 'da', 'danish', 'Danish (Denmark)'),
('de_AT', 'de', 'german', 'German (Austria)'),
('de_BE', 'de', 'german', 'German (Belgium)'),
('de_CH', 'de', 'german', 'German (Switzerland)'),
('de_DE', 'de', 'german', 'German (Germany)'),
('de_LI', 'de', 'german', 'German (Liechtenstein)'),
('de_LU', 'de', 'german', 'German (Luxembourg)'),
('dv_MV', 'dv', 'divehi', 'Divehi (Maldives)'),
('dz_BT', 'dz', 'dzongkha', 'Dzongkha (Bhutan)'),
('ee_GH', 'ee', 'ewe', 'Ewe (Ghana)'),
('el_CY', 'el', 'greek', 'Greek (Cyprus)'),
('el_GR', 'el', 'greek', 'Greek (Greece)'),
('en_AG', 'en', 'english', 'English (Antigua and Barbuda)'),
('en_AS', 'en', 'english', 'English (American Samoa)'),
('en_AU', 'en', 'english', 'English (Australia)'),
('en_BW', 'en', 'english', 'English (Botswana)'),
('en_CA', 'en', 'english', 'English (Canada)'),
('en_DK', 'en', 'english', 'English (Denmark)'),
('en_GB', 'en', 'english', 'English (United Kingdom)'),
('en_GU', 'en', 'english', 'English (Guam)'),
('en_HK', 'en', 'english', 'English (Hong Kong SAR China)'),
('en_IE', 'en', 'english', 'English (Ireland)'),
('en_IN', 'en', 'english', 'English (India)'),
('en_JM', 'en', 'english', 'English (Jamaica)'),
('en_MH', 'en', 'english', 'English (Marshall Islands)'),
('en_MP', 'en', 'english', 'English (Northern Mariana Islands)'),
('en_MU', 'en', 'english', 'English (Mauritius)'),
('en_NG', 'en', 'english', 'English (Nigeria)'),
('en_NZ', 'en', 'english', 'English (New Zealand)'),
('en_PH', 'en', 'english', 'English (Philippines)'),
('en_SG', 'en', 'english', 'English (Singapore)'),
('en_TT', 'en', 'english', 'English (Trinidad and Tobago)'),
('en_US', 'en', 'english', 'English (United States)'),
('en_VI', 'en', 'english', 'English (Virgin Islands)'),
('en_ZA', 'en', 'english', 'English (South Africa)'),
('en_ZM', 'en', 'english', 'English (Zambia)'),
('en_ZW', 'en', 'english', 'English (Zimbabwe)'),
('eo', 'eo', 'esperanto', 'Esperanto'),
('es_AR', 'es', 'spanish', 'Spanish (Argentina)'),
('es_BO', 'es', 'spanish', 'Spanish (Bolivia)'),
('es_CL', 'es', 'spanish', 'Spanish (Chile)'),
('es_CO', 'es', 'spanish', 'Spanish (Colombia)'),
('es_CR', 'es', 'spanish', 'Spanish (Costa Rica)'),
('es_DO', 'es', 'spanish', 'Spanish (Dominican Republic)'),
('es_EC', 'es', 'spanish', 'Spanish (Ecuador)'),
('es_ES', 'es', 'spanish', 'Spanish (Spain)'),
('es_GT', 'es', 'spanish', 'Spanish (Guatemala)'),
('es_HN', 'es', 'spanish', 'Spanish (Honduras)'),
('es_MX', 'es', 'spanish', 'Spanish (Mexico)'),
('es_NI', 'es', 'spanish', 'Spanish (Nicaragua)'),
('es_PA', 'es', 'spanish', 'Spanish (Panama)'),
('es_PE', 'es', 'spanish', 'Spanish (Peru)'),
('es_PR', 'es', 'spanish', 'Spanish (Puerto Rico)'),
('es_PY', 'es', 'spanish', 'Spanish (Paraguay)'),
('es_SV', 'es', 'spanish', 'Spanish (El Salvador)'),
('es_US', 'es', 'spanish', 'Spanish (United States)'),
('es_UY', 'es', 'spanish', 'Spanish (Uruguay)'),
('es_VE', 'es', 'spanish', 'Spanish (Venezuela)'),
('et_EE', 'et', 'estonian', 'Estonian (Estonia)'),
('eu_ES', 'eu', 'basque', 'Basque (Spain)'),
('eu_FR', 'eu', 'basque', 'Basque (France)'),
('fa_AF', 'fa', 'persian', 'Persian (Afghanistan)'),
('fa_IR', 'fa', 'persian', 'Persian (Iran)'),
('ff_SN', 'ff', 'fulah', 'Fulah (Senegal)'),
('fil_PH', 'fil', 'filipino', 'Filipino (Philippines)'),
('fi_FI', 'fi', 'finnish', 'Finnish (Finland)'),
('fo_FO', 'fo', 'faroese', 'Faroese (Faroe Islands)'),
('fr_BE', 'fr', 'french', 'French (Belgium)'),
('fr_BF', 'fr', 'french', 'French (Burkina Faso)'),
('fr_BI', 'fr', 'french', 'French (Burundi)'),
('fr_BJ', 'fr', 'french', 'French (Benin)'),
('fr_CA', 'fr', 'french', 'French (Canada)'),
('fr_CF', 'fr', 'french', 'French (Central African Republic)'),
('fr_CG', 'fr', 'french', 'French (Congo)'),
('fr_CH', 'fr', 'french', 'French (Switzerland)'),
('fr_CM', 'fr', 'french', 'French (Cameroon)'),
('fr_FR', 'fr', 'french', 'French (France)'),
('fr_GA', 'fr', 'french', 'French (Gabon)'),
('fr_GN', 'fr', 'french', 'French (Guinea)'),
('fr_GP', 'fr', 'french', 'French (Guadeloupe)'),
('fr_GQ', 'fr', 'french', 'French (Equatorial Guinea)'),
('fr_KM', 'fr', 'french', 'French (Comoros)'),
('fr_LU', 'fr', 'french', 'French (Luxembourg)'),
('fr_MC', 'fr', 'french', 'French (Monaco)'),
('fr_MG', 'fr', 'french', 'French (Madagascar)'),
('fr_ML', 'fr', 'french', 'French (Mali)'),
('fr_MQ', 'fr', 'french', 'French (Martinique)'),
('fr_NE', 'fr', 'french', 'French (Niger)'),
('fr_SN', 'fr', 'french', 'French (Senegal)'),
('fr_TD', 'fr', 'french', 'French (Chad)'),
('fr_TG', 'fr', 'french', 'French (Togo)'),
('fur_IT', 'fur', 'friulian', 'Friulian (Italy)'),
('fy_DE', 'fy', 'western frisian', 'Western Frisian (Germany)'),
('fy_NL', 'fy', 'western frisian', 'Western Frisian (Netherlands)'),
('ga_IE', 'ga', 'irish', 'Irish (Ireland)'),
('gd_GB', 'gd', 'scottish gaelic', 'Scottish Gaelic (United Kingdom)'),
('gez_ER', 'gez', 'geez', 'Geez (Eritrea)'),
('gez_ET', 'gez', 'geez', 'Geez (Ethiopia)'),
('gl_ES', 'gl', 'galician', 'Galician (Spain)'),
('gu_IN', 'gu', 'gujarati', 'Gujarati (India)'),
('gv_GB', 'gv', 'manx', 'Manx (United Kingdom)'),
('ha_NG', 'ha', 'hausa', 'Hausa (Nigeria)'),
('he_IL', 'he', 'hebrew', 'Hebrew (Israel)'),
('hi_IN', 'hi', 'hindi', 'Hindi (India)'),
('hr_HR', 'hr', 'croatian', 'Croatian (Croatia)'),
('hsb_DE', 'hsb', 'upper sorbian', 'Upper Sorbian (Germany)'),
('ht_HT', 'ht', 'haitian', 'Haitian (Haiti)'),
('hu_HU', 'hu', 'hungarian', 'Hungarian (Hungary)'),
('hy_AM', 'hy', 'armenian', 'Armenian (Armenia)'),
('ia', 'ia', 'interlingua', 'Interlingua'),
('id_ID', 'id', 'indonesian', 'Indonesian (Indonesia)'),
('ig_NG', 'ig', 'igbo', 'Igbo (Nigeria)'),
('ik_CA', 'ik', 'inupiaq', 'Inupiaq (Canada)'),
('is_IS', 'is', 'icelandic', 'Icelandic (Iceland)'),
('it_CH', 'it', 'italian', 'Italian (Switzerland)'),
('it_IT', 'it', 'italian', 'Italian (Italy)'),
('iu_CA', 'iu', 'inuktitut', 'Inuktitut (Canada)'),
('ja_JP', 'ja', 'japanese', 'Japanese (Japan)'),
('ka_GE', 'ka', 'georgian', 'Georgian (Georgia)'),
('kk_KZ', 'kk', 'kazakh', 'Kazakh (Kazakhstan)'),
('kl_GL', 'kl', 'kalaallisut', 'Kalaallisut (Greenland)'),
('km_KH', 'km', 'khmer', 'Khmer (Cambodia)'),
('kn_IN', 'kn', 'kannada', 'Kannada (India)'),
('kok_IN', 'kok', 'konkani', 'Konkani (India)'),
('ko_KR', 'ko', 'korean', 'Korean (South Korea)'),
('ks_IN', 'ks', 'kashmiri', 'Kashmiri (India)'),
('ku_TR', 'ku', 'kurdish', 'Kurdish (Turkey)'),
('kw_GB', 'kw', 'cornish', 'Cornish (United Kingdom)'),
('ky_KG', 'ky', 'kirghiz', 'Kirghiz (Kyrgyzstan)'),
('lg_UG', 'lg', 'ganda', 'Ganda (Uganda)'),
('li_BE', 'li', 'limburgish', 'Limburgish (Belgium)'),
('li_NL', 'li', 'limburgish', 'Limburgish (Netherlands)'),
('lo_LA', 'lo', 'lao', 'Lao (Laos)'),
('lt_LT', 'lt', 'lithuanian', 'Lithuanian (Lithuania)'),
('lv_LV', 'lv', 'latvian', 'Latvian (Latvia)'),
('mai_IN', 'mai', 'maithili', 'Maithili (India)'),
('mg_MG', 'mg', 'malagasy', 'Malagasy (Madagascar)'),
('mi_NZ', 'mi', 'maori', 'Maori (New Zealand)'),
('mk_MK', 'mk', 'macedonian', 'Macedonian (Macedonia)'),
('ml_IN', 'ml', 'malayalam', 'Malayalam (India)'),
('mn_MN', 'mn', 'mongolian', 'Mongolian (Mongolia)'),
('mr_IN', 'mr', 'marathi', 'Marathi (India)'),
('ms_BN', 'ms', 'malay', 'Malay (Brunei)'),
('ms_MY', 'ms', 'malay', 'Malay (Malaysia)'),
('mt_MT', 'mt', 'maltese', 'Maltese (Malta)'),
('my_MM', 'my', 'burmese', 'Burmese (Myanmar)'),
('naq_NA', 'naq', 'namibia', 'Namibia'),
('nb_NO', 'nb', 'norwegian bokmål', 'Norwegian Bokmål (Norway)'),
('nds_DE', 'nds', 'low german', 'Low German (Germany)'),
('nds_NL', 'nds', 'low german', 'Low German (Netherlands)'),
('ne_NP', 'ne', 'nepali', 'Nepali (Nepal)'),
('nl_AW', 'nl', 'dutch', 'Dutch (Aruba)'),
('nl_BE', 'nl', 'dutch', 'Dutch (Belgium)'),
('nl_NL', 'nl', 'dutch', 'Dutch (Netherlands)'),
('nn_NO', 'nn', 'norwegian nynorsk', 'Norwegian Nynorsk (Norway)'),
('no_NO', 'no', 'norwegian', 'Norwegian (Norway)'),
('nr_ZA', 'nr', 'south ndebele', 'South Ndebele (South Africa)'),
('nso_ZA', 'nso', 'northern sotho', 'Northern Sotho (South Africa)'),
('oc_FR', 'oc', 'occitan', 'Occitan (France)'),
('om_ET', 'om', 'oromo', 'Oromo (Ethiopia)'),
('om_KE', 'om', 'oromo', 'Oromo (Kenya)'),
('or_IN', 'or', 'oriya', 'Oriya (India)'),
('os_RU', 'os', 'ossetic', 'Ossetic (Russia)'),
('pap_AN', 'pap', 'papiamento', 'Papiamento (Netherlands Antilles)'),
('pa_IN', 'pa', 'punjabi', 'Punjabi (India)'),
('pa_PK', 'pa', 'punjabi', 'Punjabi (Pakistan)'),
('pl_PL', 'pl', 'polish', 'Polish (Poland)'),
('ps_AF', 'ps', 'pashto', 'Pashto (Afghanistan)'),
('pt_BR', 'pt', 'portuguese', 'Portuguese (Brazil)'),
('pt_GW', 'pt', 'portuguese', 'Portuguese (Guinea-Bissau)'),
('pt_PT', 'pt', 'portuguese', 'Portuguese (Portugal)'),
('ro_MD', 'ro', 'romanian', 'Romanian (Moldova)'),
('ro_RO', 'ro', 'romanian', 'Romanian (Romania)'),
('ru_RU', 'ru', 'russian', 'Russian (Russia)'),
('ru_UA', 'ru', 'russian', 'Russian (Ukraine)'),
('rw_RW', 'rw', 'kinyarwanda', 'Kinyarwanda (Rwanda)'),
('sa_IN', 'sa', 'sanskrit', 'Sanskrit (India)'),
('sc_IT', 'sc', 'sardinian', 'Sardinian (Italy)'),
('sd_IN', 'sd', 'sindhi', 'Sindhi (India)'),
('seh_MZ', 'seh', 'sena', 'Sena (Mozambique)'),
('se_NO', 'se', 'northern sami', 'Northern Sami (Norway)'),
('sid_ET', 'sid', 'sidamo', 'Sidamo (Ethiopia)'),
('si_LK', 'si', 'sinhala', 'Sinhala (Sri Lanka)'),
('sk_SK', 'sk', 'slovak', 'Slovak (Slovakia)'),
('sl_SI', 'sl', 'slovenian', 'Slovenian (Slovenia)'),
('sn_ZW', 'sn', 'shona', 'Shona (Zimbabwe)'),
('so_DJ', 'so', 'somali', 'Somali (Djibouti)'),
('so_ET', 'so', 'somali', 'Somali (Ethiopia)'),
('so_KE', 'so', 'somali', 'Somali (Kenya)'),
('so_SO', 'so', 'somali', 'Somali (Somalia)'),
('sq_AL', 'sq', 'albanian', 'Albanian (Albania)'),
('sq_MK', 'sq', 'albanian', 'Albanian (Macedonia)'),
('sr_BA', 'sr', 'serbian', 'Serbian (Bosnia and Herzegovina)'),
('sr_ME', 'sr', 'serbian', 'Serbian (Montenegro)'),
('sr_RS', 'sr', 'serbian', 'Serbian (Serbia)'),
('ss_ZA', 'ss', 'swati', 'Swati (South Africa)'),
('st_ZA', 'st', 'southern sotho', 'Southern Sotho (South Africa)'),
('sv_FI', 'sv', 'swedish', 'Swedish (Finland)'),
('sv_SE', 'sv', 'swedish', 'Swedish (Sweden)'),
('sw_KE', 'sw', 'swahili', 'Swahili (Kenya)'),
('sw_TZ', 'sw', 'swahili', 'Swahili (Tanzania)'),
('ta_IN', 'ta', 'tamil', 'Tamil (India)'),
('teo_UG', 'teo', 'teso', 'Teso (Uganda)'),
('te_IN', 'te', 'telugu', 'Telugu (India)'),
('tg_TJ', 'tg', 'tajik', 'Tajik (Tajikistan)'),
('th_TH', 'th', 'thai', 'Thai (Thailand)'),
('tig_ER', 'tig', 'tigre', 'Tigre (Eritrea)'),
('ti_ER', 'ti', 'tigrinya', 'Tigrinya (Eritrea)'),
('ti_ET', 'ti', 'tigrinya', 'Tigrinya (Ethiopia)'),
('tk_TM', 'tk', 'turkmen', 'Turkmen (Turkmenistan)'),
('tl_PH', 'tl', 'tagalog', 'Tagalog (Philippines)'),
('tn_ZA', 'tn', 'tswana', 'Tswana (South Africa)'),
('to_TO', 'to', 'tongan', 'Tongan (Tonga)'),
('tr_CY', 'tr', 'turkish', 'Turkish (Cyprus)'),
('tr_TR', 'tr', 'turkish', 'Turkish (Turkey)'),
('ts_ZA', 'ts', 'tsonga', 'Tsonga (South Africa)'),
('tt_RU', 'tt', 'tatar', 'Tatar (Russia)'),
('ug_CN', 'ug', 'uighur', 'Uighur (China)'),
('uk_UA', 'uk', 'ukrainian', 'Ukrainian (Ukraine)'),
('ur_PK', 'ur', 'urdu', 'Urdu (Pakistan)'),
('uz_UZ', 'uz', 'uzbek', 'Uzbek (Uzbekistan)'),
('ve_ZA', 've', 'venda', 'Venda (South Africa)'),
('vi_VN', 'vi', 'vietnamese', 'Vietnamese (Vietnam)'),
('wa_BE', 'wa', 'walloon', 'Walloon (Belgium)'),
('wo_SN', 'wo', 'wolof', 'Wolof (Senegal)'),
('xh_ZA', 'xh', 'xhosa', 'Xhosa (South Africa)'),
('yi_US', 'yi', 'yiddish', 'Yiddish (United States)'),
('yo_NG', 'yo', 'yoruba', 'Yoruba (Nigeria)'),
('zh_CN', 'zh', 'chinese', 'Chinese (China)'),
('zh_HK', 'zh', 'chinese', 'Chinese (Hong Kong SAR China)'),
('zh_SG', 'zh', 'chinese', 'Chinese (Singapore)'),
('zh_TW', 'zh', 'chinese', 'Chinese (Taiwan)'),
('zu_ZA', 'zu', 'zulu', 'Zulu (South Africa)');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` int(11) DEFAULT NULL,
  `user_from` int(11) DEFAULT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` enum('read','unread') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unread',
  `attached_file` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `favourite` int(11) DEFAULT '0',
  `deleted` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `project` int(11) DEFAULT NULL,
  `start_date` varchar(32) DEFAULT NULL,
  `due_date` varchar(64) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` longtext,
  `date` bigint(13) DEFAULT '0',
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_emails`
--

CREATE TABLE IF NOT EXISTS `outgoing_emails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sent_to` varchar(64) DEFAULT NULL,
  `sent_from` varchar(64) DEFAULT NULL,
  `subject` text,
  `message` longtext,
  `date_sent` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delivered` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent_details`
--

CREATE TABLE IF NOT EXISTS `parent_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `marital_status` varchar(150) NOT NULL,
  `passport` varchar(150) NOT NULL,
  `id_number` varchar(150) NOT NULL,
  `passport_number` varchar(150) NOT NULL,
  `home_address` text NOT NULL,
  `postal_address` text,
  `work_address` text,
`avatar` mediumtext COLLATE utf8_unicode_ci,
  `use_gravatar` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `occupation` varchar(150) DEFAULT NULL,
  `work_tel` varchar(150) DEFAULT NULL,
  `work_fax` varchar(150) DEFAULT NULL,
  `home_tel` varchar(150) DEFAULT NULL,
  `employer` varchar(150) DEFAULT NULL,
  `cell_number` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent_to_students`
--

CREATE TABLE IF NOT EXISTS `parent_to_students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portal_settings`
--

CREATE TABLE IF NOT EXISTS `portal_settings` (
  `co_id` int(11) unsigned NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `primary_contact` varchar(32) DEFAULT NULL,
  `school_email` varchar(64) DEFAULT NULL,
  `school_website` varchar(255) DEFAULT NULL,
  `school_phone` varchar(64) DEFAULT NULL,
  `school_mobile` varchar(64) DEFAULT NULL,
  `school_fax` varchar(64) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `emisno` varchar(64) DEFAULT NULL,
  `type` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zip` varchar(20) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `notes` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portal_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `priority` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`priority`) VALUES
('Low'),
('Medium'),
('High'),
('Urgent');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(64) NOT NULL,
  `default` int(11) NOT NULL,
  `description` text,
  `permissions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `default`, `description`, `permissions`) VALUES
(1, 'admin', 1, NULL, ''),
(2, 'teacher', 2, NULL, ''),
(3, 'parent', 3, NULL, ''),
(4, 'student', 4, NULL,'{\"settings\":\"permissions\",\"role\":\"student\"}');


-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
`avatar` mediumtext COLLATE utf8_unicode_ci,
  `use_gravatar` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `home_language` varchar(150) NOT NULL,
  `dob` varchar(150) NOT NULL,
  `id_number` varchar(150) NOT NULL,
  `passport_number` varchar(150) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `previous_school` varchar(150) NOT NULL,
  `prev_school_tel` varchar(150) NOT NULL,
  `prev_school_address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE IF NOT EXISTS `student_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text,
  `grade_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `un_sessions`
--

CREATE TABLE IF NOT EXISTS `un_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `avatar` mediumtext,
  `use_gravatar` enum('yes','no') DEFAULT 'yes',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) DEFAULT NULL,
  `new_password_key` varchar(50) DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) DEFAULT NULL,
  `new_email_key` varchar(50) DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` int(11) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `avatar`, `use_gravatar`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created_by`, `created`, `modified`, `modified_date`) VALUES
(1, 'lesleymm', '$2a$08$j3yx4yu8PRB35SO2loGsTewn1ELgarXsEW9OGB9ChJ0fqMIca.DIe', 'lesley@tinyeleti.com', 0, NULL, 'yes', 1, 0, NULL, NULL, NULL, NULL, NULL, '41.160.190.48', '2017-09-29 11:02:13', NULL, '2017-09-24 20:19:26', 2017, '2017-09-29 08:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expires` timestamp NULL DEFAULT NULL,
  `remote` int(2) DEFAULT '0',
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
