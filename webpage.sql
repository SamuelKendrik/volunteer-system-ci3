-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2026 at 08:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpage`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `max_quota` int(11) NOT NULL,
  `available_slots` int(11) NOT NULL,
  `hours_reward` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `event_date`, `max_quota`, `available_slots`, `hours_reward`, `created_by`, `created_at`) VALUES
(24, 'Beach Cleanup Day', 'Help clean the beach and protect marine life.', 'Ancol Beach', '2026-09-12 08:00:00', 20, 30, 5, 6, '2026-05-26 01:32:03'),
(25, 'Food Donation Drive', 'Distribute food packages to families in need.', 'Central Jakarta', '2026-09-18 10:00:00', 20, 20, 4, 6, '2026-05-26 01:32:03'),
(26, 'Teaching Kids English', 'Volunteer to teach basic English to children.', 'Binus Kemanggisan', '2026-10-02 13:00:00', 15, 15, 6, 1, '2026-05-26 01:32:03'),
(27, 'Tree Planting Campaign', 'Plant trees to support environmental sustainability.', 'Bandung City Park', '2026-10-10 07:30:00', 25, 25, 5, 1, '2026-05-26 01:32:03'),
(28, 'Blood Donation Event', 'Assist medical staff during the blood donation event.', 'Jakarta Hospital', '2026-11-05 09:00:00', 18, 18, 3, 1, '2026-05-26 01:32:03'),
(29, 'Animal Shelter Support', 'Help feed and care for rescued animals.', 'Bogor Animal Shelter', '2026-11-15 11:00:00', 12, 12, 4, 1, '2026-05-26 01:32:03'),
(30, 'Community Library Setup', 'Organize books and prepare a reading space for children.', 'Depok Community Center', '2026-11-22 14:00:00', 10, 10, 5, 1, '2026-05-26 01:32:03'),
(31, 'Flood Relief Volunteer', 'Help distribute emergency supplies to flood victims.', 'Bekasi', '2026-12-03 06:00:00', 40, 40, 8, 1, '2026-05-26 01:32:03'),
(32, 'BINUS Teaching Volunteer', 'Help junior students learn basic programming and English.', 'BINUS Kemanggisan', '2026-09-15 09:00:00', 25, 25, 5, 1, '2026-05-26 01:36:08'),
(33, 'Campus Charity Event', 'Distribute food and daily supplies to nearby communities.', 'BINUS Anggrek', '2026-09-20 10:00:00', 20, 20, 4, 1, '2026-05-26 01:36:08'),
(34, 'Environmental Awareness Campaign', 'Educate students about sustainability and recycling.', 'BINUS Alam Sutera', '2026-10-01 08:30:00', 30, 30, 6, 1, '2026-05-26 01:36:08'),
(35, 'Coding For Kids', 'Teach children simple coding concepts using games.', 'BINUS Syahdan', '2026-10-08 13:00:00', 15, 15, 5, 1, '2026-05-26 01:36:08'),
(36, 'Blood Donation Volunteer', 'Assist participants and medical teams during blood donation.', 'BINUS Bekasi', '2026-10-18 09:00:00', 18, 18, 3, 1, '2026-05-26 01:36:08'),
(37, 'Library Organization Day', 'Help organize books and study areas for students.', 'BINUS Kijang', '2026-11-02 11:00:00', 12, 12, 4, 1, '2026-05-26 01:36:08'),
(38, 'Mental Health Support Event', 'Support wellness activities and student discussions.', 'BINUS FX Sudirman', '2026-11-12 14:00:00', 20, 20, 5, 1, '2026-05-26 01:36:08'),
(39, 'Tech Workshop Assistant', 'Assist speakers and participants during tech workshops.', 'BINUS @Malang', '2026-11-25 08:00:00', 22, 22, 6, 1, '2026-05-26 01:36:08'),
(44, 'Test', 'Test', 'Test', '2026-05-06 13:38:00', 2, 0, 2, 11, '2026-05-26 06:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `attendance` enum('absent','present') DEFAULT 'absent',
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `event_id`, `status`, `attendance`, `registered_at`) VALUES
(1, 1, 25, 'accepted', 'present', '2026-05-26 02:07:23'),
(2, 2, 25, 'accepted', 'present', '2026-05-26 07:27:46'),
(3, 3, 25, 'rejected', 'absent', '2026-05-26 07:27:46'),
(4, 4, 25, 'accepted', 'present', '2026-05-26 07:27:46'),
(5, 5, 25, 'pending', 'absent', '2026-05-26 07:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `event_id`, `rating`, `comment`, `created_at`) VALUES
(1, 3, 1, 5, 'Honestly one of the best volunteer events I have joined so far. The organizers were super friendly and the activities were actually fun instead of feeling forced. I met a lot of new people and learned many things while helping the community.', '2026-05-17 13:50:10'),
(2, 4, 1, 4, 'Pretty good experience overall. The event was organized well and everything started on time. Would definitely recommend this to Binusians looking for community service hours while still enjoying the activities.', '2026-05-17 13:50:10'),
(3, 5, 1, 5, 'Loved it so much. I thought volunteering would be boring but this event completely changed my perspective. The atmosphere was welcoming and everyone was really supportive.', '2026-05-17 13:50:10'),
(4, 6, 1, 3, 'It was okay in my opinion. Some parts were enjoyable but there were moments where the schedule felt a bit messy. Still appreciated the effort from the organizers though.', '2026-05-17 13:50:10'),
(5, 7, 1, 4, 'Nice organization and friendly people. Registration process was simple and the location was easy to access. Looking forward to joining another event soon.', '2026-05-17 13:50:10'),
(6, 8, 1, 5, 'Appnya keren banget, yang mau hunting comserv wajib coba sih. Informasinya lengkap dan gampang dipahami. Jadi lebih semangat ikut kegiatan sosial setelah pakai website ini.', '2026-05-17 13:50:10'),
(7, 9, 1, 5, 'Semenjak download aplikasi ini saya jadi jauh lebih aktif ikut volunteer. Biasanya susah cari info event, sekarang tinggal buka website langsung banyak pilihan kegiatan.', '2026-05-17 13:50:10'),
(8, 10, 1, 4, 'The UI looks really clean and modern. I also like how easy it is to explore different volunteer places. Would be even better with a dark mode feature.', '2026-05-17 13:50:10'),
(9, 11, 1, 5, 'Great platform for students who need community service hours. The review section also helped me choose which event to join because the feedback felt genuine.', '2026-05-17 13:50:10'),
(10, 12, 1, 5, 'I joined a tree planting event from this website and it was honestly an amazing experience. The community was wholesome and the organizers guided us really well.', '2026-05-17 13:50:10'),
(11, 13, 1, 4, 'Praktis banget dipakai. Design websitenya simple tapi enak dilihat dan ga bikin bingung pas cari event. Cocok buat mahasiswa yang sibuk.', '2026-05-17 13:50:10'),
(12, 14, 1, 5, 'This website made volunteering feel more accessible and less intimidating. Before this I never really participated in community activities, but now I actually enjoy it.', '2026-05-17 13:50:10'),
(13, 15, 1, 4, 'Really helpful for finding verified volunteer opportunities around campus. I also appreciate the smooth navigation and fast loading pages.', '2026-05-17 13:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','organizer','user') NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `profile_pic`) VALUES
(1, 'admin', 'admin123', 'admin', 'admin.email@gmail.com', 'https://i.pravatar.cc/100?img=1'),
(2, 'samuelk', '12345678', 'user', 'samuelk@gmail.com', 'https://i.pravatar.cc/100?img=2'),
(3, 'alexdev', '12345678', 'user', 'alexdev@gmail.com', 'https://i.pravatar.cc/100?img=3'),
(4, 'michael21', '12345678', 'user', 'michael21@gmail.com', 'https://i.pravatar.cc/100?img=4'),
(5, 'lunaheart', '12345678', 'user', 'lunaheart@gmail.com', 'https://i.pravatar.cc/100?img=5'),
(6, 'skywalker', '12345678', 'organizer', 'skywalker@gmail.com', 'https://i.pravatar.cc/100?img=6'),
(7, 'jenniee', '12345678', 'user', 'jenniee@gmail.com', 'https://i.pravatar.cc/100?img=7'),
(8, 'ryzenlord', '12345678', 'organizer', 'ryzenlord@gmail.com', 'https://i.pravatar.cc/100?img=8'),
(9, 'fionagray', '12345678', 'user', 'fionagray@gmail.com', 'https://i.pravatar.cc/100?img=9'),
(10, 'antonio', '12345678', 'user', 'antonio@gmail.com', 'https://i.pravatar.cc/100?img=10'),
(11, 'pixelhero', '12345678', 'organizer', 'pixelhero@gmail.com', 'https://i.pravatar.cc/100?img=11'),
(12, 'presleyw', '12345678', 'user', 'presleyw@gmail.com', 'https://i.pravatar.cc/100?img=12'),
(13, 'nathanx', '12345678', 'user', 'nathanx@gmail.com', 'https://i.pravatar.cc/100?img=13'),
(14, 'gracemoon', '12345678', 'organizer', 'gracemoon@gmail.com', 'https://i.pravatar.cc/100?img=14'),
(15, 'zeroknight', '12345678', 'user', 'zeroknight@gmail.com', 'https://i.pravatar.cc/100?img=15'),
(16, 'florence', '12345678', 'user', 'florence@gmail.com', 'https://i.pravatar.cc/100?img=16'),
(17, 'blazefury', '12345678', 'organizer', 'blazefury@gmail.com', 'https://i.pravatar.cc/100?img=17'),
(18, 'kevinartz', '12345678', 'user', 'kevinartz@gmail.com', 'https://i.pravatar.cc/100?img=18'),
(19, 'reinaaa', '12345678', 'user', 'reinaaa@gmail.com', 'https://i.pravatar.cc/100?img=19'),
(20, 'darknova', '12345678', 'organizer', 'darknova@gmail.com', 'https://i.pravatar.cc/100?img=20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
