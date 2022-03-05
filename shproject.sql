-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 09:59 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `attendance` int NOT NULL COMMENT '1=present, 2=absent, 3=delayed',
  `attend_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `course_id`, `attendance`, `attend_date`, `created_at`, `updated_at`) VALUES
(5, 1, 13, 1, '2022-02-20', '2022-02-23 05:10:09', '2022-02-23 05:10:09'),
(6, 1, 13, 2, '2022-02-21', '2022-02-23 05:56:01', '2022-02-23 05:56:01'),
(7, 1, 13, 2, '2022-02-22', '2022-02-23 05:56:04', '2022-02-23 05:56:04'),
(11, 9, 14, 2, '2022-02-23', '2022-02-23 06:00:32', '2022-02-23 06:00:32'),
(12, 8, 14, 1, '2022-02-23', '2022-02-23 06:00:33', '2022-02-23 06:00:33'),
(13, 2, 14, 1, '2022-02-23', '2022-02-23 06:01:53', '2022-02-23 06:06:48'),
(14, 1, 13, 2, '2022-02-23', '2022-02-23 06:02:49', '2022-02-23 06:02:49'),
(15, 6, 14, 1, '2022-02-23', '2022-02-23 06:25:49', '2022-02-23 06:25:49'),
(16, 2, 14, 1, '2022-02-25', '2022-02-26 02:59:50', '2022-02-26 02:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientcourses`
--

CREATE TABLE `clientcourses` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preassignment_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postassignment_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `workshop_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `infosheet_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `calender_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `evolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_of_facilates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_of_material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientcourses`
--

INSERT INTO `clientcourses` (`id`, `client_id`, `name`, `courseid`, `consultant_id`, `preassignment_link`, `postassignment_link`, `registration_link`, `workshop_link`, `infosheet_link`, `calender_link`, `evolution`, `start_date`, `start_time`, `end_date`, `end_time`, `city`, `country`, `training_type`, `notice`, `language_of_facilates`, `language_of_material`, `created_at`, `updated_at`) VALUES
(13, 1, 'ghfdhfdhdfhfdhfdh', 'fdhfdghddgfh', '17', 'dhdfhdfhdffd', 'dhfdfhdfhdf', '', '', '', '', 'hfdhdfhfdh', '2022-02-17', '15:11:00', '2022-02-23', '15:12:00', 'ghfghfg', 'hgfhj', 'virtual', 'hfggfj', 'arabic,english', 'arabic,english', '2022-02-19 04:07:22', '2022-02-19 04:07:22'),
(14, 1, 'Economic', 'ECO-20', '17', 'https://www.google.com', 'https://www.google.com', '', '', '', '', 'EconomicsFactors', '2022-02-23', '14:13:00', '2022-02-25', '16:17:00', 'Dubai', 'UAE', 'virtual', 'Pay Attention', 'arabic,english', 'arabic,english', '2022-02-23 01:13:56', '2022-02-23 01:13:56'),
(15, 10, 'Geographics', 'Geo1', '17', 'https://preassignmentlinke.com', 'https://postassignmentlinke.com', '', '', '', '', 'This is my evolution.', '2022-03-02', '15:37:00', '2022-03-09', '19:37:00', 'Delhi', 'India', 'virtual', 'This is Notifce', 'arabic,english', 'arabic,english', '2022-02-26 10:08:20', '2022-02-26 10:08:20'),
(16, 1, 'sdgfdgsgf', 'dgfdgfdgd', '17', 'fgfdgdgfg', 'fdsgg', '', '', '', '', 'fgfdgddg', '2022-02-07', '18:01:00', '2022-02-15', '20:03:00', 'Bubhai', 'UAE', 'virtual', 'THi sis ns', 'arabic,english', 'arabic,english', '2022-02-28 11:30:39', '2022-02-28 11:30:39'),
(17, 1, 'sdgfdgsgf', 'dgfdgfdgd', '17', 'fgfdgdgfg', 'fdsgg', 'gfdgfdgd', 'fdggfdg', 'fdsgfdsx', 'fdsfgdsxgf', 'fgfdgddg', '2022-03-07', '18:01:00', '2022-03-15', '20:03:00', 'Bubhai', 'UAE', 'virtual', 'THi sis ns', 'arabic,english', 'arabic,english', '2022-02-28 11:32:14', '2022-02-28 11:32:14'),
(18, 13, 'ghdfhfgd', 'hfhdghfh', '17', 'https://www.ashom.app', 'https://www.ashom.app', 'https://www.ashom.app', 'https://www.ashom.app', 'https://www.ashom.app', 'https://www.ashom.app', 'KJhfjidbj', '2022-03-02', '18:33:00', '2022-03-10', '23:28:00', 'Dubai', 'UAE', 'classroom', 'This is Notrifce', 'arabic,english', 'arabic,english', '2022-02-28 12:53:59', '2022-02-28 12:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `other`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'Abhishek', 'example@example.com', 'Reporter', 'C:\\xampp\\tmp\\php40D0.tmp', NULL, NULL),
(10, 'My Client', 'meto@exampe.coo', 'Othewr', 'C:\\xampp\\tmp\\php9F2C.tmp', '2022-02-23 00:49:48', '2022-02-23 00:49:48'),
(13, 'dfsfs', 'fdsfdsf@fg.fdghfh', 'dfdsfdsf', 'https://www.kindpng.com/picc/m/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png', '2022-02-28 12:52:03', '2022-02-28 12:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `coursecronjobs`
--

CREATE TABLE `coursecronjobs` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` int DEFAULT '0',
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_employees` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_cc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_bcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coursecronjobs`
--

INSERT INTO `coursecronjobs` (`id`, `course_id`, `email_subject`, `email_employees`, `email_cc`, `email_bcc`, `email_body`, `schedule_time`, `created_at`, `updated_at`) VALUES
(1, 17, 'sdsf', '10,11', 'gfdgdgdg', 'fgfdgd', '<div>Dear __EMPLOYEENAME__,</div><div>I hope my email finds you well!</div><div>Virginia Institute of Finance is inviting you to a scheduled “Geographics” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div>', '2022-02-22 15:48:00', NULL, NULL),
(2, 17, 'dsgs', '10,11', 'dfdsfsd', 'fsfsfdsf', '<div>Dear __EMPLOYEENAME__,</div><div>I hope my email finds you well!</div><div>Virginia Institute of Finance is inviting you to a scheduled “Geographics” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div>', '2022-02-24 15:49:00', NULL, NULL),
(3, 17, 'gfdgdg', '10,11', 'gfdgfd', 'gfdgfdgfdgfd', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>Dear __EMPLOYEENAME__</div><div>I hope my email finds you well!</div><div>Institute&nbsp; is inviting you to a scheduled “Geographics” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div><br></div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div><div>Course Info :</div><div><ol><li style=\"text-align: justify;\">1. Course Duration : 7 days</li><li style=\"text-align: justify;\">2. Start Date : 02 Mar, 2022</li><li style=\"text-align: justify;\">3. End Date : 09 Mar, 2022</li><li style=\"text-align: justify;\">4. Timing : 03:37 pm - 07:37 pm</li><li style=\"text-align: justify;\">5. Instructor Consuil lkfjhds</li><li style=\"text-align: justify;\">6. Language of Material : arabic,english</li><li style=\"text-align: justify;\">7. Language of Facilitation : arabic,english</li><li style=\"text-align: justify;\">8. Type : virtual</li><li style=\"text-align: justify;\">9. Location : Delhi</li><li style=\"text-align: justify;\">10. Have high speed internet&nbsp;</li><li style=\"text-align: justify;\">11. Your laptop and any other smart devices.</li><li style=\"text-align: justify;\">12. Windows Operating system and Microsoft Office of 2016+.</li><li style=\"text-align: justify;\">13.Delegate contribution in the class discussion, excise, and workshops are integral to the success of course.</li><li style=\"text-align: justify;\">14. Please find an attachment&nbsp; the Course intro</li><li style=\"text-align: justify;\">15. Download the workshop&nbsp; exercise files before joining the meeting using this link __WORKSHOPLINK__</li><li style=\"text-align: justify;\">16. Fill the info sheet and submit&nbsp; it to receive your course certificate&nbsp; using this link __INFOSHEETLINK__</li><li style=\"text-align: justify;\">17. Please download and import the following iCalender (.jcs) file to your outlook calender __CALENDERLINK__</li></ol></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">', '2022-02-23 19:54:00', NULL, NULL),
(4, 17, 'gfdgdg', '10,11', 'gfdgfd', 'gfdgfdgfdgfd', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>Dear __EMPLOYEENAME__</div><div>I hope my email finds you well!</div><div>Institute&nbsp; is inviting you to a scheduled “Geographics” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div><br></div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div><div>Course Info :</div><div><ol><li style=\"text-align: justify;\">1. Course Duration : 7 days</li><li style=\"text-align: justify;\">2. Start Date : 02 Mar, 2022</li><li style=\"text-align: justify;\">3. End Date : 09 Mar, 2022</li><li style=\"text-align: justify;\">4. Timing : 03:37 pm - 07:37 pm</li><li style=\"text-align: justify;\">5. Instructor Consuil lkfjhds</li><li style=\"text-align: justify;\">6. Language of Material : arabic,english</li><li style=\"text-align: justify;\">7. Language of Facilitation : arabic,english</li><li style=\"text-align: justify;\">8. Type : virtual</li><li style=\"text-align: justify;\">9. Location : Delhi</li><li style=\"text-align: justify;\">10. Have high speed internet&nbsp;</li><li style=\"text-align: justify;\">11. Your laptop and any other smart devices.</li><li style=\"text-align: justify;\">12. Windows Operating system and Microsoft Office of 2016+.</li><li style=\"text-align: justify;\">13.Delegate contribution in the class discussion, excise, and workshops are integral to the success of course.</li><li style=\"text-align: justify;\">14. Please find an attachment&nbsp; the Course intro</li><li style=\"text-align: justify;\">15. Download the workshop&nbsp; exercise files before joining the meeting using this link __WORKSHOPLINK__</li><li style=\"text-align: justify;\">16. Fill the info sheet and submit&nbsp; it to receive your course certificate&nbsp; using this link __INFOSHEETLINK__</li><li style=\"text-align: justify;\">17. Please download and import the following iCalender (.jcs) file to your outlook calender __CALENDERLINK__</li></ol></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">', '2022-02-23 19:54:00', NULL, NULL),
(5, 17, 'dfdsf', '10,11', 'dfsf', 'sfdsf', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>Dear __EMPLOYEENAME__</div><div>I hope my email finds you well!</div><div>Institute&nbsp; is inviting you to a scheduled “Geographics” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div><br></div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div><div>Course Info :</div><div><ol><li style=\"text-align: justify;\">1. Course Duration : 7 days</li><li style=\"text-align: justify;\">2. Start Date : 02 Mar, 2022</li><li style=\"text-align: justify;\">3. End Date : 09 Mar, 2022</li><li style=\"text-align: justify;\">4. Timing : 03:37 pm - 07:37 pm</li><li style=\"text-align: justify;\">5. Instructor Consuil lkfjhds</li><li style=\"text-align: justify;\">6. Language of Material : arabic,english</li><li style=\"text-align: justify;\">7. Language of Facilitation : arabic,english</li><li style=\"text-align: justify;\">8. Type : virtual</li><li style=\"text-align: justify;\">9. Location : Delhi</li><li style=\"text-align: justify;\">10. Have high speed internet&nbsp;</li><li style=\"text-align: justify;\">11. Your laptop and any other smart devices.</li><li style=\"text-align: justify;\">12. Windows Operating system and Microsoft Office of 2016+.</li><li style=\"text-align: justify;\">13.Delegate contribution in the class discussion, excise, and workshops are integral to the success of course.</li><li style=\"text-align: justify;\">14. Please find an attachment&nbsp; the Course intro</li><li style=\"text-align: justify;\">15. Download the workshop&nbsp; exercise files before joining the meeting using this link __WORKSHOPLINK__</li><li style=\"text-align: justify;\">16. Fill the info sheet and submit&nbsp; it to receive your course certificate&nbsp; using this link __INFOSHEETLINK__</li><li style=\"text-align: justify;\">17. Please download and import the following iCalender (.jcs) file to your outlook calender __CALENDERLINK__</li></ol></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">', '2022-02-15 20:58:00', NULL, NULL),
(6, 17, 'Subjectr', 'Emalfjfj', 'sdjhgdhjfg', 'dhfdsgjkhdf', 'dhdhdghd', '2021-02-03 05:20:00', NULL, NULL),
(8, 17, 'jhjhgjhgj', '12', 'fghfh@hfgj.fgjn', 'fghfh@hfgj.fgjn', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>Dear __EMPLOYEENAME__</div><div>I hope my email finds you well!</div><div>Institute&nbsp; is inviting you to a scheduled “sdgfdgsgf” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div><br></div><div>Registration link:&nbsp; <a hrerf=\"fdsfgdsxgf\">gfdgfdgd</a></div><div><br></div><div>Course Info :</div><div><ol><li style=\"text-align: justify;\">1. Course Duration : 8 days</li><li style=\"text-align: justify;\">2. Start Date : 07 Mar, 2022</li><li style=\"text-align: justify;\">3. End Date : 15 Mar, 2022</li><li style=\"text-align: justify;\">4. Timing : 06:01 pm - 08:03 pm</li><li style=\"text-align: justify;\">5. Instructor Consuil lkfjhds</li><li style=\"text-align: justify;\">6. Language of Material : arabic,english</li><li style=\"text-align: justify;\">7. Language of Facilitation : arabic,english</li><li style=\"text-align: justify;\">8. Type : virtual</li><li style=\"text-align: justify;\">9. Location : Bubhai</li><li style=\"text-align: justify;\">10. Have high speed internet&nbsp;</li><li style=\"text-align: justify;\">11. Your laptop and any other smart devices.</li><li style=\"text-align: justify;\">12. Windows Operating system and Microsoft Office of 2016+.</li><li style=\"text-align: justify;\">13.Delegate contribution in the class discussion, excise, and workshops are integral to the success of course.</li><li style=\"text-align: justify;\">14. Please find an attachment&nbsp; the Course intro</li><li style=\"text-align: justify;\">15. Download the workshop&nbsp; exercise files before joining the meeting using this link <a hrerf=\"fdsfgdsxgf\">fdggfdg</a></li><li style=\"text-align: justify;\">16. Fill the info sheet and submit&nbsp; it to receive your course certificate&nbsp; using this link <a hrerf=\"fdsfgdsxgf\">fdsgfdsx</a></li><li style=\"text-align: justify;\">17. Please download and import the following iCalender (.jcs) file to your outlook calender <a hrerf=\"fdsfgdsxgf\">fdsfgdsxgf</a></li></ol></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">', '2022-02-21 17:52:00', NULL, NULL),
(9, 17, 'jhjhgjhgj', '12', 'fghfh@hfgj.fgjn', 'fghfh@hfgj.fgjn', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>Dear __EMPLOYEENAME__</div><div>I hope my email finds you well!</div><div>Institute&nbsp; is inviting you to a scheduled “sdgfdgsgf” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div><br></div><div>Registration link:&nbsp; <a hrerf=\"fdsfgdsxgf\">gfdgfdgd</a></div><div><br></div><div>Course Info :</div><div><ol><li style=\"text-align: justify;\">1. Course Duration : 8 days</li><li style=\"text-align: justify;\">2. Start Date : 07 Mar, 2022</li><li style=\"text-align: justify;\">3. End Date : 15 Mar, 2022</li><li style=\"text-align: justify;\">4. Timing : 06:01 pm - 08:03 pm</li><li style=\"text-align: justify;\">5. Instructor Consuil lkfjhds</li><li style=\"text-align: justify;\">6. Language of Material : arabic,english</li><li style=\"text-align: justify;\">7. Language of Facilitation : arabic,english</li><li style=\"text-align: justify;\">8. Type : virtual</li><li style=\"text-align: justify;\">9. Location : Bubhai</li><li style=\"text-align: justify;\">10. Have high speed internet&nbsp;</li><li style=\"text-align: justify;\">11. Your laptop and any other smart devices.</li><li style=\"text-align: justify;\">12. Windows Operating system and Microsoft Office of 2016+.</li><li style=\"text-align: justify;\">13.Delegate contribution in the class discussion, excise, and workshops are integral to the success of course.</li><li style=\"text-align: justify;\">14. Please find an attachment&nbsp; the Course intro</li><li style=\"text-align: justify;\">15. Download the workshop&nbsp; exercise files before joining the meeting using this link <a hrerf=\"fdsfgdsxgf\">fdggfdg</a></li><li style=\"text-align: justify;\">16. Fill the info sheet and submit&nbsp; it to receive your course certificate&nbsp; using this link <a hrerf=\"fdsfgdsxgf\">fdsgfdsx</a></li><li style=\"text-align: justify;\">17. Please download and import the following iCalender (.jcs) file to your outlook calender <a hrerf=\"fdsfgdsxgf\">fdsfgdsxgf</a></li></ol></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">', '2022-02-21 17:52:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `courseName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `courseId`, `created_at`, `updated_at`) VALUES
(2, 'Financial Market', 'fn', NULL, NULL),
(3, 'Marketing', 'mrk', NULL, NULL),
(5, 'sdsdfdsfds', 'fddsf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `client_id`, `name`, `email`, `mobile`, `designation`, `created_at`, `updated_at`) VALUES
(1, '7', 'f', 'f', 'f', 'f', NULL, NULL),
(2, '8', 'Destion Name', 'email', '45455554565', 'dfkdshgfjhdsafhdsavf', NULL, NULL),
(3, '9', 'Destion Name', 'email', '45455554565', 'dfkdshgfjhdsafhdsavf', NULL, NULL),
(4, '10', 'ajaba', 'aje@jd.dffdf', '7797545959', 'sfdsf', NULL, NULL),
(5, '12', 'MAkeopve', 'fertan@gmail.com', '546565446994', 'Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `client_id`, `course_id`, `firstname`, `lastname`, `email`, `mobile`, `gender`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'employess', 'khan', 'employee@employee.el', '7894561230', 'M', NULL, NULL),
(2, 1, 14, 'Femail', 'Youser', 'youser@user.com', '12345679', 'F', NULL, NULL),
(6, 9, 14, 'sdasffas', 'safdsfsdf', 'sfdsfsdf@dfgfd.fghygf', '54545454554', 'M', NULL, NULL),
(7, 10, 14, 'sdasffas', 'safdsfsdf', 'sfdsfsdf@dfgfd.fghygf', '54545454554', 'M', NULL, NULL),
(8, 14, 14, 'Aamai', 'Lama', 'amai@gmail.com', '196955554564', 'M', NULL, NULL),
(9, 14, 14, 'Dalis', 'King', 'kingdalis@gmail.com', '63154545454', 'M', NULL, NULL),
(10, 10, 15, 'Mohan', 'singh', 'dbvertexbackend@gmail.com', '69798498489', 'M', NULL, NULL),
(11, 10, 15, 'Monika', 'rawat', 'monika@gmail.com', '654584856', 'F', NULL, NULL),
(12, 1, 17, 'Me Employee', 'Tolls', 'dbvertexbackend@gmail.com', '654556454565', 'M', NULL, NULL),
(13, 13, 18, 'hghgfg', 'gfhh', 'dbvertexbackend@gmail.com', '65456455455', 'M', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint NOT NULL,
  `consulatant_id` bigint NOT NULL,
  `client_id` bigint NOT NULL,
  `employees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `course_id`, `consulatant_id`, `client_id`, `employees`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'My Event', 2, 1, 1, '2', '2022-02-09 16:36:00', '2022-02-17 19:38:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_employees`
--

CREATE TABLE `event_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint NOT NULL,
  `employee_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailtemplates`
--

CREATE TABLE `mailtemplates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailtemplates`
--

INSERT INTO `mailtemplates` (`id`, `name`, `template`, `created_at`, `updated_at`) VALUES
(1, 'invites', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>Dear __EMPLOYEENAME__</div><div>I hope my email finds you well!</div><div>Institute&nbsp; is inviting you to a scheduled “__COURSENAME__” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div><br></div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div><div>Course Info :</div><div><ol><li style=\"text-align: justify;\">1. Course Duration : __COURSEDURATION__</li><li style=\"text-align: justify;\">2. Start Date : __STARTDATE_</li><li style=\"text-align: justify;\">3. End Date : __ENDDATE__</li><li style=\"text-align: justify;\">4. Timing : __TIMING__</li><li style=\"text-align: justify;\">5. Instructor __INSTRUCTOR__</li><li style=\"text-align: justify;\">6. Language of Material : __LANGUAGEOFMATERIAL__</li><li style=\"text-align: justify;\">7. Language of Facilitation : __LANGUAGEOFFACILITATION_</li><li style=\"text-align: justify;\">8. Type : __TYPEOFCLASS__</li><li style=\"text-align: justify;\">9. Location : __LOCATION__</li><li style=\"text-align: justify;\">10. Have high speed internet&nbsp;</li><li style=\"text-align: justify;\">11. Your laptop and any other smart devices.</li><li style=\"text-align: justify;\">12. Windows Operating system and Microsoft Office of 2016+.</li><li style=\"text-align: justify;\">13.Delegate contribution in the class discussion, excise, and workshops are integral to the success of course.</li><li style=\"text-align: justify;\">14. Please find an attachment&nbsp; the Course intro</li><li style=\"text-align: justify;\">15. Download the workshop&nbsp; exercise files before joining the meeting using this link __WORKSHOPLINK__</li><li style=\"text-align: justify;\">16. Fill the info sheet and submit&nbsp; it to receive your course certificate&nbsp; using this link __INFOSHEETLINK__</li><li style=\"text-align: justify;\">17. Please download and import the following iCalender (.jcs) file to your outlook calender __CALENDERLINK__</li></ol></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">', '2022-02-26 12:20:47', '2022-02-28 07:06:15'),
(2, 'Reminder', '<div>Dear __EMPLOYEENAME__,</div><div>I hope my email finds you well!</div><div>Virginia Institute of Finance is inviting you to a scheduled “__COURSENAME__” Virtual-Live Course</div><div>Please follow the below joining instructions:</div><div>Registration link:&nbsp; __REGISTRATIONLINK__</div><div><br></div>', '2022-02-28 07:34:07', '2022-02-28 08:11:11'),
(3, 'ThanksYou', '<div>Dear Attendees,</div><div>It has been a pleasure working with such fine professionals during our</div><div>“__COURSENAME__” held in<span style=\"text-align: justify;\">__LOCATION__</span>&nbsp;during&nbsp;<span style=\"text-align: justify;\">__STARTDATE_ to&nbsp;&nbsp;</span><span style=\"text-align: justify;\">__ENDDATE__&nbsp;&nbsp;</span><span style=\"text-align: justify;\">&nbsp;</span><span style=\"text-align: justify;\">__TIMING__</span>.</div><div>We applaud the level of responsibility, commitment, and keenness to</div><div>learning. You have exhibited a very high-level of professionalism.</div><div>We thank you for choosing Virginia Institute of Finance. Your business is</div><div>greatly appreciated, and we thank you for allowing us to be of service to you.</div><div>We would love to get your feedback on your experience with us, feel free to</div><div>share your testimonial.</div><div>If you have any questions, comments, or concerns, please email/call us</div><div>at courses@viftraining.com / Tel:&nbsp;</div><div>We look forward to working with you again.</div>', '2022-02-28 07:34:10', '2022-02-28 08:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `detail` varchar(5000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `name`, `detail`) VALUES
(1, 'invite', '<htmllang=\"en\"><metacharset=\"utf-8\"><metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"><metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"><divclass=\"row\"><divclass=\"col-md-4\"><spanstyle=\"white-space:pre;\"><divclass=\"row\"><divclass=\"col-md-12\"><div>I hope my email finds you well!</div><div><br></div><div>&nbsp;</div><div><br></div><div>Institute&nbsp; is inviting you to a scheduled “Course Name” Virtual-Live Course</div><div><br></div><div>&nbsp;</div><div><br></div><div>Please follow the below joining instructions:</div><div><br></div><div>&nbsp;</div><div><br></div><div>Registration link:&nbsp; https://us02web.zoom.us/meeting/register/tZ0vdOGhqzwiGtbJJuuP1rdwhwaw3Un3zn7f</div><div><br></div></divclass=\"col-md-12\"></divclass=\"row\"></spanstyle=\"white-space:pre;\"></divclass=\"col-md-4\"></divclass=\"row\"></metaname=\"viewport\"content=\"width=device-width,initial-scale=1.0\"></metahttp-equiv=\"x-ua-compatible\"content=\"ie=edge\"></metacharset=\"utf-8\"></htmllang=\"en\">');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_02_04_094209_create_users_table', 2),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(9, '2022_02_04_094209_create_user_table', 4),
(11, '2022_02_04_111227_create_attendances_table', 5),
(12, '2022_02_04_111324_create_certificates_table', 5),
(13, '2016_06_01_000004_create_oauth_clients_table', 6),
(16, '2022_02_04_110947_create_clients_table', 7),
(17, '2022_02_04_111213_create_courses_table', 7),
(20, '2022_02_09_075800_create_event_employees_table', 9),
(21, '2022_02_09_074939_create_events_table', 10),
(22, '2022_02_09_090221_create_employees_table', 11),
(23, '2022_02_19_052556_create_designations_table', 12),
(24, '2022_02_19_061724_create_clientcourses_table', 13),
(25, '2022_02_23_052930_create_sidebars_table', 14),
(26, '2022_02_26_174835_create_mailtemplates_table', 15),
(27, '2022_02_28_143528_create_coursecronjobs_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-02-04 04:50:20', '2022-02-04 04:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sidebars`
--

CREATE TABLE `sidebars` (
  `id` bigint UNSIGNED NOT NULL,
  `tabname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tablink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebars`
--

INSERT INTO `sidebars` (`id`, `tabname`, `tablink`, `tabicon`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'dashboard', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '0=admin, 1=normal, 2=consultant',
  `module_user` tinyint(1) NOT NULL,
  `accessTabs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `module_user`, `accessTabs`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'user', 'admin@admin.com', '$2y$10$UlEvcuvULaGTQiBd8f7pkuYGo0Nvao8WIvYkjl/dh6WDi9QtS0f.2', 0, 0, '', NULL, NULL),
(14, 'dfdszffds', 'fgfdxxghdf', 'email@email.com', '$2y$10$5890.uv6UrsroWHbBk1WtuiADG2vaKuR3xRsKD4f1xPKAdrpUNAEC', 1, 1, 'users,courses,attendances', '2022-02-22 23:46:48', '2022-02-22 23:46:48'),
(15, 'sfdgklsjdhfj', 'kjgfdbdjhs', 'emd@emd.com', '$2y$10$LA6ewqEXG7iSr9y.caGbfuDUBOa5D3Xr2cFOOclVI0ewgGjd0p1rq', 1, 1, 'users,courses,attendances', '2022-02-22 23:48:46', '2022-02-22 23:48:46'),
(16, 'dfgsg', 'dsgvsdgvs', 'fds@fv.cd', '$2y$10$vtTdPgNxm2OEsGFLrPalCu/aBqm.qukn7Twn6L2Lsgn0.r0dFGT2K', 1, 1, 'users,clients', '2022-02-22 23:49:59', '2022-02-22 23:49:59'),
(17, 'Consuil', 'lkfjhds', 'cons@cons.com', '$2y$10$eTbiJRqGWXwNpGPRghproO82jxkJrdKe4lakY1DWoGG2gLGwqYycW', 2, 2, 'attendances', '2022-02-23 06:14:07', '2022-02-23 06:14:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `attendances_ibfk_1` (`user_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientcourses`
--
ALTER TABLE `clientcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursecronjobs`
--
ALTER TABLE `coursecronjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_employees`
--
ALTER TABLE `event_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailtemplates`
--
ALTER TABLE `mailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sidebars`
--
ALTER TABLE `sidebars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientcourses`
--
ALTER TABLE `clientcourses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coursecronjobs`
--
ALTER TABLE `coursecronjobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_employees`
--
ALTER TABLE `event_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailtemplates`
--
ALTER TABLE `mailtemplates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sidebars`
--
ALTER TABLE `sidebars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `clientcourses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
