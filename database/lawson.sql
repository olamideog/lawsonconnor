
--
-- Database: `lawson`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` text COLLATE utf8_unicode_ci,
  `admin_remember_token` text COLLATE utf8_unicode_ci,
  `admin_lastlogin` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_email`, `admin_password`, `admin_remember_token`, `admin_lastlogin`, `created_at`, `updated_at`) VALUES
(1, 'Ola', 'Og', 'olamide', 'ola@g.com', '', NULL, '2017-12-11 06:52:04', '2017-12-10 00:02:44', '2017-12-11 06:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_type`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, '1512919434_Project Descriptions.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2017-12-10 11:18:08', '2017-12-10 15:23:54'),
(2, '1512929634_Complaints.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2017-12-10 18:13:54', '2017-12-10 18:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_25_101256_create_admins_table', 1),
(4, '2017_12_09_165859_create_files_table', 1),
(5, '2017_12_09_173447_create_viewed_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_name`, `user_password`, `user_lastlogin`, `created_at`, `updated_at`) VALUES
(1, 'Matthew', 'Sargent', 'msargent@yahoo.com', 'msargent', '$2y$10$J6ZWHhJjWpEuWLTUvkliKuI7MTvOmhclTaHzzAOjpmMAP64NVHd6S', '2017-12-10 13:55:17', '2017-12-10 09:52:57', '2017-12-10 13:55:17'),
(2, 'Matilda', 'Murry', 'matilda@yahoo.com', 'matilda', '$2y$10$0s5tL5PJ0.MY3ZIFf6MJn.MQM1ijHLWAaJijvOd8kT/H9V4kc4qR6', '2017-12-11 06:55:34', '2017-12-10 14:40:28', '2017-12-11 06:55:34'),
(3, 'Matthew', 'Murry', 'murry@gmail.co.uk', 'matthew', '$2y$10$VhTTTPASA5E2HtO7UVyw2.NsBH2ajS33OZQQnICpTjzNqSZGgfdyi', NULL, '2017-12-10 14:41:13', '2017-12-10 14:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `viewed_files`
--

CREATE TABLE `viewed_files` (
  `view_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `viewed_on` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `viewed_files`
--

INSERT INTO `viewed_files` (`view_id`, `user_id`, `file_id`, `status`, `created_at`, `updated_at`, `viewed_on`) VALUES
(4, 3, 1, '0', '2017-12-10 15:23:54', '2017-12-10 15:23:54', NULL),
(3, 1, 1, '1', '2017-12-10 15:23:54', '2017-12-10 19:13:24', '2017-12-10 19:13:24'),
(5, 1, 2, '1', '2017-12-10 18:13:54', '2017-12-10 19:13:18', '2017-12-10 19:13:18'),
(6, 2, 2, '0', '2017-12-10 18:13:54', '2017-12-10 18:13:54', NULL),
(7, 3, 2, '0', '2017-12-10 18:13:54', '2017-12-10 18:13:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_admin_username_unique` (`admin_username`),
  ADD UNIQUE KEY `admin_admin_email_unique` (`admin_email`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`);

--
-- Indexes for table `viewed_files`
--
ALTER TABLE `viewed_files`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `viewed_files`
--
ALTER TABLE `viewed_files`
  MODIFY `view_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
