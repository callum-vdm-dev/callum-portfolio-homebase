-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 06:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `callum-portfolio-homebase`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL COMMENT 'Of the page the content belongs to',
  `title` varchar(255) NOT NULL COMMENT 'The name of the section',
  `content` text DEFAULT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(50) NOT NULL DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `slug`, `title`, `content`, `modified`, `type`) VALUES
(1, 'homepage', 'hero_title', '<p>Hey there! My name is <strong>DEFAULT DEFAULTSON</strong>, and this is my personal website</p>', '2025-07-16 00:38:31', 'text'),
(2, 'homepage', 'hero_text', 'Have a look at what I am working on and cool projects I have completed!', '2025-06-19 04:07:46', 'text'),
(3, 'homepage', 'hero_button_text', 'Check it out!', '2025-06-19 04:11:10', 'text'),
(4, 'homepage', 'about_title', 'What I am about', '2025-06-19 04:14:36', 'text'),
(5, 'homepage', 'about_text', 'A little something about myself.', '2025-06-19 04:17:59', 'text'),
(6, 'homepage', 'projects_title', 'Featured Projects', '2025-06-19 04:19:41', 'text'),
(7, 'homepage', 'projects_text', 'A glimpse at some things I\'ve built', '2025-06-19 04:22:19', 'text'),
(8, 'homepage', 'projects_1_title', 'My First Project', '2025-06-19 04:24:17', 'text'),
(9, 'homepage', 'projects_1_text', 'A brief description about my first project.', '2025-06-19 04:26:10', 'text'),
(10, 'homepage', 'projects_1_slug', 'insert slug here', '2025-06-19 04:29:45', 'text'),
(11, 'homepage', 'projects_2_title', 'My Second Project', '2025-06-19 04:31:18', 'text'),
(12, 'homepage', 'projects_2_text', 'A brief description about my second project.', '2025-06-19 04:32:36', 'text'),
(13, 'homepage', 'projects_2_slug', 'Project 2 slug here', '2025-06-19 04:34:11', 'text'),
(14, 'homepage', 'projects_button', 'View Project', '2025-06-19 04:36:31', 'text'),
(15, 'homepage', 'projects_all_button', 'View All Projects', '2025-06-19 04:38:56', 'text'),
(16, 'homepage', 'blog_title', 'Latest Blog Posts', '2025-06-19 04:40:22', 'text'),
(17, 'homepage', 'blog_text', 'Thoughts, guides, and things I\'ve been working on', '2025-06-19 04:41:32', 'text'),
(18, 'homepage', 'blog_1_title', 'My First Post', '2025-06-19 04:48:59', 'text'),
(19, 'homepage', 'blog_1_text', 'Brief description about the first post.', '2025-06-19 04:49:35', 'text'),
(20, 'homepage', 'blog_2_title', '<p>My Second Post</p>', '2025-07-16 00:36:59', 'text'),
(21, 'homepage', 'blog_2_text', 'A brief description about the second post.', '2025-06-19 04:50:35', 'text'),
(22, 'homepage', 'blog_3_title', 'My Third Post', '2025-06-19 04:52:07', 'text'),
(23, 'homepage', 'blog_3_text', 'A brief description about my third post.', '2025-06-19 04:52:27', 'text'),
(24, 'homepage', 'blog_button', 'Read More', '2025-06-19 04:54:01', 'text'),
(25, 'homepage', 'blog_all_button', 'View All Posts', '2025-06-19 04:55:15', 'text'),
(26, 'projects', 'title', 'My Projects', '2025-07-16 01:15:02', 'text'),
(27, 'projects', 'intro', 'View my ongoing and completed projects', '2025-07-15 15:18:31', 'text'),
(28, 'posts', 'title', 'My Blog', '2025-07-15 15:22:48', 'text'),
(29, 'posts', 'intro', 'Take a look at cool things I\'m working on, and interesting things I\'ve learnt!', '2025-07-15 15:23:49', 'text'),
(30, 'footer', 'GitHub', 'https://github.com', '2025-07-16 00:47:09', 'link'),
(31, 'footer', 'Email', 'example@example.com', '2025-07-16 00:49:39', 'email'),
(32, 'footer', 'copyright', '<p>Not yet set</p>', '2025-07-15 15:56:03', 'text'),
(33, 'homepage', 'about_image', 'about_me_picture.jpg', '2025-07-16 09:53:58', 'image'),
(34, 'homepage', 'project_1_image', 'project-1.jpg', '2025-07-16 10:10:33', 'image'),
(35, 'homepage', 'project_2_image', 'project-2.jpg', '2025-07-16 10:12:19', 'image'),
(36, 'global', 'background_image', 'background.jpg', '2025-07-16 10:17:57', 'image'),
(37, 'homepage', 'custom_title', 'Open to Work', '2025-07-17 19:11:00', 'text'),
(38, 'homepage', 'custom_text', 'I am skill in x, y, z. I am looking for jobs in a, b, c.', '2025-07-17 19:11:00', 'text'),
(39, 'homepage', 'resume_button_text', 'Download Resume', '2025-07-17 19:16:07', 'text'),
(40, 'homepage', 'resume_file', 'resume.pdf', '2025-07-17 19:42:09', 'file'),
(41, 'homepage', 'custom_button_text', 'LinkedIn', '2025-07-17 19:17:50', 'text'),
(42, 'homepage', 'custom_button_link', 'https://linkedin.com', '2025-07-17 09:58:47', 'link'),
(43, 'footer', 'LinkedIn', 'https://linkedin.com', '2025-07-17 19:57:41', 'link');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_photos`
--

CREATE TABLE `post_photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `overview` text DEFAULT NULL,
  `github_url` varchar(255) DEFAULT NULL,
  `live_url` varchar(255) DEFAULT NULL,
  `status` enum('in_progress','completed','archived') NOT NULL DEFAULT 'in_progress',
  `start_date` date DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_photos`
--

CREATE TABLE `project_photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','viewer') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created`, `modified`) VALUES
(2, 'Default Admin', 'default@example.com', '$2y$10$j1J6cDrZFW7WLVuIB/Q6B.gvRI3uHVOO3j1oKxgBcBjAlfwOJvqZW', 'admin', '2025-06-19 03:22:26', '2025-06-19 03:22:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `FK_post_user_id` (`user_id`),
  ADD KEY `FK_post_project_id` (`project_id`);

--
-- Indexes for table `post_photos`
--
ALTER TABLE `post_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_photo_post_id` (`post_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `FK_project_user_id` (`user_id`);

--
-- Indexes for table `project_photos`
--
ALTER TABLE `project_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_project_ id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_photos`
--
ALTER TABLE `post_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_photos`
--
ALTER TABLE `project_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_post_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_post_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `post_photos`
--
ALTER TABLE `post_photos`
  ADD CONSTRAINT `FK_photo_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `FK_project_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `project_photos`
--
ALTER TABLE `project_photos`
  ADD CONSTRAINT `FK_project_ id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
