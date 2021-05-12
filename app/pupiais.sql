-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 09:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupiais`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `year`) VALUES
(1, '2018'),
(2, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `dept_code`) VALUES
(1, 'Diploma in Information Communication and Technology', 'DICT');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` mediumblob NOT NULL,
  `data_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `data_time`) VALUES
(13, '3rd event', 'asdqwezxczxc', 0x36303761366639333235306433302e35303030343236392e6a7067, '2021-04-14 11:25:05'),
(16, 'God', 'GOD MODE', 0x36303832396466396534633538312e30383438353834352e706e67, '2021-04-23 18:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `fusion`
--

CREATE TABLE `fusion` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fusion`
--

INSERT INTO `fusion` (`id`, `dept_id`, `batch_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `job_portal`
--

CREATE TABLE `job_portal` (
  `id` int(11) NOT NULL,
  `company_logo` tinyblob NOT NULL,
  `work_status` varchar(10) NOT NULL,
  `job_status` varchar(255) NOT NULL,
  `avail_pos` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `others` varchar(5000) NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_portal`
--

INSERT INTO `job_portal` (`id`, `company_logo`, `work_status`, `job_status`, `avail_pos`, `company_name`, `job_title`, `description`, `others`, `posted_on`) VALUES
(12, 0x36303761646134633538313536342e31303733363335392e706e67, 'full-time', 'active', 6, 'Pog Company', 'PogChamp', '<ul>\r\n	<li>Responsible for building strong relationships with clients</li>\r\n	<li>Responsible for driving customer satisfaction to partner schools.</li>\r\n	<li>Trains end-users on the usage of Quipper&rsquo;s eLearning platform&nbsp;&nbsp;</li>\r\n	<li>Conducting classroom observation, help desk, and technical assistance to our partner schools.</li>\r\n	<li>Supports clients&rsquo; needs through problem &amp; complaint resolution</li>\r\n	<li>Supports sales officers during sales presentations through product presentations</li>\r\n	<li>Upsells Quipper services to existing clients.&nbsp;</li>\r\n</ul>\r\n', '<p><strong>Requirements:</strong></p>\r\n\r\n<ul>\r\n	<li>At least a year of experience with solid people management background&nbsp;</li>\r\n	<li>Teaching background in regular classroom set-up is an advantage but not required&nbsp;</li>\r\n	<li>Experience in the education / eLearning industry working in the same capacity is an advantage</li>\r\n	<li>Candidate must understand basic Profit &amp; Loss</li>\r\n	<li>Must be self-driven, can work independently and as a team</li>\r\n	<li>Ability to adapt to a fast-paced environment and willing to perform various tasks</li>\r\n	<li>Excellent presentation, organizational, negotiation, and verbal and written communication skills</li>\r\n	<li>Strong computer skills, proficient in Google suite, and has the ability to learn new technology</li>\r\n	<li>Strong interpersonal, intrapersonal and analytical skills</li>\r\n</ul>\r\n\r\n<p><strong>Education:</strong></p>\r\n\r\n<ul>\r\n	<li>Candidate must possess a Bachelor&#39;s degree in Education, IT, Business Management, Marketing, or any related field. Postgraduate is an advantaged but not required</li>\r\n</ul>\r\n\r\n<p><strong>Why apply to us?</strong></p>\r\n\r\n<ul>\r\n	<li>HMO upon regularization with additional 1 dependent (fully covered by the Company)</li>\r\n	<li>Accidental Insurance</li>\r\n	<li>Monthly performance bonus</li>\r\n	<li>10 VL and 10 SL (unused SL is convertible to cash annually)</li>\r\n	<li>Company issued item (laptop, cell phone, and pocket Wi-Fi)</li>\r\n	<li>Promotion opportunities</li>\r\n	<li>Opportunity to meet and train abroad</li>\r\n	<li>Government-mandated benefits</li>\r\n	<li>Opportunity to be in a sales position</li>\r\n</ul>\r\n\r\n<p><strong>Work arrangement:</strong></p>\r\n\r\n<ul>\r\n	<li>Remote work/WFH set-up</li>\r\n	<li>Work during weekends or Philippine holidays if required</li>\r\n	<li>Field-work if required</li>\r\n	<li>Preferably with driver&#39;s license and have own means of transportation but not required.</li>\r\n	<li>Willing to work and travel within<strong>&nbsp;Surigao</strong></li>\r\n</ul>\r\n\r\n<p><strong>Work Location:</strong></p>\r\n\r\n<p><strong>Interested to apply?</strong>&nbsp;Send your application letter and CV to:</p>\r\n\r\n<p><strong>Contact Person</strong><br />\r\nElaine Co<br />\r\n8 421 1234<br />\r\ncitech.recruitment@mail.canon</p>\r\n', '2021-04-17 19:40:16'),
(13, 0x36303761643639633964623337352e39373331343238302e6a7067, 'full-time', 'active', 2, 'Jupiter Corporation', 'Stoners', '<pre>\r\nBefore a product can be built, it needs to be defined. This is the valuable role that Business Analyst &amp; Quality Engineer\r\n(BA/QE) plays. The BA/QE engages business stakeholders to define and prioritize problems, risks, and opportunities, and\r\nthen works with engineers to develop appropriate solutions to address such problems, risks and opportunities.\r\n\r\nWhat you will learn</pre>\r\n\r\n<ul>\r\n	<li>Software development best practices - e.g. Agile, DevOps</li>\r\n	<li>Various business domains</li>\r\n	<li>User Experience (UX)</li>\r\n	<li>Software technology</li>\r\n	<li>Management skills</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Speak to business stakeholders to understand and prioritize problems, risks and opportunities</li>\r\n	<li>Collaborate with engineers to create appropriate solutions</li>\r\n	<li>Test software to check if it meets agreed specifications</li>\r\n	<li>Document designs and plans</li>\r\n	<li>Advise clients on options and best practices</li>\r\n	<li>Other roles and responsibilities may be assigned as necessary</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Qualifications:</strong></p>\r\n\r\n<ul>\r\n	<li>Undergraduate or graduate of any IT-related or Business-related courses</li>\r\n	<li>0-2 years of relevant experience for junior-level positions and 3-5 years for mid-level positions</li>\r\n	<li>Excellent written and oral communication skills</li>\r\n	<li>Analytical and organizational skills</li>\r\n	<li>Can interface with people of any level or background within or outside the organization</li>\r\n	<li>Basic competence in any programming language or in SQL</li>\r\n	<li>Background in Accounting and Finance fundamentals is a plus</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<pre>\r\nSkills and Attributes</pre>\r\n\r\n<ul>\r\n	<li>Detail-oriented</li>\r\n	<li>Excellent written and oral communication skills</li>\r\n	<li>Articulate and can convey ideas very well</li>\r\n	<li>Assertive yet diplomatic</li>\r\n	<li>Analytical and organizational skills</li>\r\n	<li>Can interface with people of any level or background within or outside the organization</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Skills:</strong><br />\r\nCreative, Good Communication (listening, verbal, written), Self-Management, Critical Thinking, Computer/Technical Literacy, Interpersonal Abilities, Adaptability/Flexibility, Fast Learner</p>\r\n\r\n<p><strong>Work Location:</strong></p>\r\n\r\n<p><strong>Interested to apply?</strong>&nbsp;Send your application letter and CV to:</p>\r\n\r\n<p><strong>Contact Person</strong><br />\r\n(Undisclosed)</p>\r\n', '2021-04-17 19:42:03'),
(15, 0x36303761633966653563336661342e33303336373731332e706e67, 'part-time', 'active', 1, '7-11', 'Cashier', '<p>Apply and be part of GoRobinsons (GoR), the fast growing and first ever online store of Robinsons Retail Holdings, Inc. (RRHI) that offers one-stop shop for consumers&#39; daily needs</p>\r\n', '<p><strong>Job Responsibilities:</strong></p>\r\n\r\n<ul>\r\n	<li>Monitors performance of store pickers and packers, including compliance with store operations guidelines</li>\r\n	<li>Dispatches packed orders to third-party logistics partners and updates delivery status on app</li>\r\n	<li>Takes corrective measures as the need arises (examples: void transactions, returns/refunds)</li>\r\n	<li>Can act as reliever of picker or packer during breaks, if needed</li>\r\n	<li>Coordinates with HR regarding any concern related to the Third-Party manpower</li>\r\n	<li>Coordinates with Store Manager regarding day-to-day operations</li>\r\n	<li>Custodian of the devices and supplies used in the operations of GoRobinsons (example: tablets, scanners, receipt printer)</li>\r\n</ul>\r\n\r\n<p><strong>Job Qualifications:</strong></p>\r\n\r\n<ul>\r\n	<li>Graduate at least of any two-year / four-year course</li>\r\n	<li>With related experience in retail industry and store operations</li>\r\n	<li>With at least 1-2 years supervisory experience in a service-oriented company</li>\r\n	<li>Good knowledge and understanding of operations and business trend</li>\r\n	<li>Willing to work in Quezon City</li>\r\n</ul>\r\n\r\n<p>Join us and be part of our growing team!</p>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<p><strong>Skills:</strong><br />\r\nClerical, Creative, Teamwork, Self-Management, Critical Thinking, Computer/Technical Literacy, Interpersonal Abilities, Fast Learner</p>\r\n\r\n<p><strong>Work Location:</strong><br />\r\nEPPI office</p>\r\n\r\n<p><strong>Interested to apply?</strong>&nbsp;Send your application letter and CV to:</p>\r\n\r\n<p><strong>Contact Person</strong><br />\r\n(Undisclosed)</p>\r\n', '2021-04-17 19:43:58'),
(17, 0x36303761646164653433653762342e37353732333438352e6a7067, 'full-time', 'active', 3, 'Jupiter Corporation', 'HR ASSISTANT', '<p>The C&amp;B Specialist turns the processes and the program independently under a close supervision of the HR &amp; Admin Manager. The specialist introduces new salary benchmark, C &amp; B best practices, collects feedback about the performance of compensation processes and develops/implements the process improvements.zxczxczc</p>\r\n', '<p><strong>Qualifications:</strong></p>\r\n\r\n<ul>\r\n	<li>Education and Experience Bachelor&rsquo;s Degree in HRAM, Psychology, or other similar degree.</li>\r\n	<li>Preferred Skills and Work Experience One (1) to two (2) years previous work experience as an HR Practitioner</li>\r\n	<li>Minimum 1 year experience as HR Compensation &amp; Benefits Specialist</li>\r\n</ul>\r\n\r\n<p>Qualification</p>\r\n\r\n<ul>\r\n	<li>Person responsible for benchmarking activities of the Department</li>\r\n	<li>Prepares the compensation and benefits budget, including the regular monitoring, reporting and adjusting of the budget</li>\r\n	<li>Coordinates C&amp;B processes like the salary planning, bonus planning, new benefits introduction, etc.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Designs and develops compensation policies</li>\r\n	<li>Analyzes different components of the remuneration scheme in the organization and prepares reports about its competitiveness</li>\r\n	<li>Designs and develops different structures of Job Factorization</li>\r\n	<li>Leads and manages compensation projects for the entire organization such as but not limited to Job Levelling</li>\r\n	<li>Participates as the team member in the strategic projects and initiatives that are Compensation and Benefits related</li>\r\n	<li>Design policies to close gaps in the compensation of employees</li>\r\n	<li>Leads in the orientation of Compensation policies</li>\r\n	<li>Advices top managers in taking difficult decisions in the area of compensation, benefits and motivation of employees</li>\r\n	<li>Other duties as assigned.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Skills:</strong><br />\r\nClerical, Creative, Good Communication (listening, verbal, written), Self-Management, Interpersonal Abilities, Adaptability/Flexibility, Fast Learner</p>\r\n\r\n<p><strong>Work Location:</strong></p>\r\n\r\n<p><strong>Interested to apply?</strong>&nbsp;Send your application letter and CV to:</p>\r\n\r\n<p><strong>Contact Person</strong><br />\r\n(Undisclosed)</p>\r\n', '2021-04-17 20:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `survey_set`
--

CREATE TABLE `survey_set` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_set`
--

INSERT INTO `survey_set` (`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `date_created`) VALUES
(18, 'zxc', 'zxxzczxc', 1, '2021-05-19', '2021-05-20', '2021-05-07 15:59:31'),
(19, 'First survey', 'zxczxc', 1, '2021-05-13', '2021-05-14', '2021-05-07 16:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_control` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fusion`
--
ALTER TABLE `fusion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `job_portal`
--
ALTER TABLE `job_portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_set`
--
ALTER TABLE `survey_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fusion`
--
ALTER TABLE `fusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_portal`
--
ALTER TABLE `job_portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `survey_set`
--
ALTER TABLE `survey_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fusion`
--
ALTER TABLE `fusion`
  ADD CONSTRAINT `batch_id_id` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dept_id_id` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type_id` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
