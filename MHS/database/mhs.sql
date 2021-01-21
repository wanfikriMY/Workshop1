-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 06:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(255) NOT NULL,
  `patient_id` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `date` date NOT NULL,
  `session` varchar(255) NOT NULL,
  `doc_id` int(100) NOT NULL,
  `remark` text NOT NULL,
  `status` varchar(12) NOT NULL,
  `ticket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_id`, `date`, `session`, `doc_id`, `remark`, `status`, `ticket`) VALUES
(6, '630616087633', '2021-01-06', 'evening', 3, 'no remark', 'completed', ''),
(7, '960603085997', '2021-01-23', 'morning', 4, 'no remarks', 'pending', ''),
(8, '650716082776', '2021-01-27', 'evening', 3, 'no remark', 'pending', ''),
(9, '650716082776', '2021-01-29', 'evening', 2, 'no remark', 'pending', '65071608277622021-01-29eveningno remark'),
(10, '960603085997', '2021-01-28', 'morning', 2, 'no remark', 'pending', '96060308599722021-01-28morningno remark');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `chatbot_id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`chatbot_id`, `queries`, `replies`) VALUES
(1, 'hi|hello|hey|hola', 'Hello there! How may I help you?'),
(2, 'what is COVID-19?|what is covid19?|what is covid?', 'COVID-19 is the associated name given for the new coronavirus, Severe Acute Respiratory Syndrome Coronavirus-2 (SARS-CoV-2).'),
(3, 'where did coronavirus originate from?|Where did covid originate from?', 'Bats are considered to be the natural hosts of the virus as well as several other species of animals. For instance, MERS-CoV was transmitted from camels while SARS-CoV-1 was transmitted from civet cats.'),
(4, 'what are the symptoms of COVID-19?|what are the symptoms of covid?', 'Most common symptoms include fever, dry cough and fatigue. However, other lesser known and less common symptoms are loss of taste or smell, sore throat, headache, diarrhea, nausea and vomiting. Symptoms that are related to severe COVID-19 are shortness of breath, loss of appetite, confusion, persist'),
(5, 'how does the virus spread?', 'It spreads through respiratory droplets or small particles, such as those in aerosols, produced when an infected person coughs, sneezes, sings, talks, or breathes.'),
(6, 'who is at most risk from COVID-19? |who is at most risk of severe illness from covid?', 'People aged 60 years and over, and those with underlying medical problems like high blood pressure, heart and lung problems, diabetes, obesity or cancer, are at higher risk of developing serious illness. However, anyone can get sick with COVID-19 and become seriously ill or die at any age.'),
(7, 'when is a person infectious? ', 'The infectious period may begin around two days before the symptoms appear, but people are most infectious during the symptomatic period, even if symptoms are mild and non-specific. The infectious period is estimated to last for eight to 10 days in moderate cases, and up to two weeks on average in s'),
(8, 'If I use a facemask or N95, does it help to reduce COVID-19 transmission?|If I use a facemask or N95, does it help to reduce covid transmission?', 'N95 masks is not recommended because it is more restrictive and may cause the wearer to feel difficult to breathe. It is best used by healthcare professionals who handle patients in health facilities. The use of face masks and surgical masks or 3- ply face masks is recommended as it helps reduce the'),
(9, 'are there long term effects of COVID-19?|are there long term effects of covid?', 'Some people who have had COVID-19, whether they have needed hospitalization or not, continue to experience symptoms, including fatigue, respiratory and neurological symptoms.'),
(10, 'how can we protect others and ourselves if we don’t know who is infected? ', 'Stay safe by taking some simple precautions, such as physical distancing, wearing a mask, especially when distancing cannot be maintained, keeping rooms well ventilated, avoiding crowds and close contact, regularly cleaning your hands, and coughing into a bent elbow or tissue. Check local advice whe'),
(11, 'when should I get a test for COVID-19?|when should I get a test for covid?', 'Anyone with symptoms should be tested, wherever possible. People who do not have symptoms but have had close contact with someone who is, or may be, infected may also consider testing – contact your local health guidelines and follow their guidance.'),
(12, 'what is the treatment for COVID-19 infection?|what is the treatment for covid infection?', 'To date, there have been no specific treatments or antiviral for COVID-19 infection. Treatment is given only to relieve the symptoms of the patient.'),
(13, 'Is there a vaccine for COVID-19?', 'Yes. There are three COVID-19 vaccines for which certain national regulatory authorities have authorized the use. None have yet received WHO EUL/PQ authorization.'),
(14, 'is it possible to have flu and COVID-19 at the same time?|is it possible to have flu and covid at the same time?', 'Yes. It is possible to test positive for flu (as well as other respiratory infections) and COVID-19 at the same time. Because some of the symptoms of flu and COVID-19 are similar, it may be hard to tell the difference between them based on symptoms alone. Testing may be needed to help confirm a diag'),
(15, 'should I wear a mask while exercising?', 'Even when you’re in an area of COVID-19 transmission, masks should not be worn during vigorous physical activity because of the risk of reducing your breathing capacity. No matter how intensely you exercise, keep at least 1 metre away from others, and if you’re indoors, make sure there is adequate v'),
(16, 'why should people wear masks?', 'Masks are a key measure to suppress transmission and save lives. Masks should be used as part of a comprehensive ‘Do it all!’ approach including physical distancing, avoiding crowded, closed and close-contact settings, good ventilation, cleaning hands, covering sneezes and coughs, and more. Dependin'),
(17, 'what is the difference between asymptomatic and pre-symptomatic?', 'Both terms refer to people who do not have symptoms. The difference is that ‘asymptomatic’ refers to people who are infected but never develop any symptoms, while ‘pre-symptomatic’ refers to infected people who have not yet developed symptoms but go on to develop symptoms later.'),
(18, 'what are the symptoms of COVID-19?|what are the symptoms of covid?', 'Most common symptoms include fever, dry cough and fatigue. However, other lesser known and less common symptoms are loss of taste or smell, sore throat, headache, diarrhea, nausea and vomiting. Symptoms that are related to severe COVID-19 are shortness of breath, loss of appetite, confusion, persist'),
(19, 'how does the virus spread?', 'It spreads through respiratory droplets or small particles, such as those in aerosols, produced when an infected person coughs, sneezes, sings, talks, or breathes.'),
(20, 'who is at most risk from COVID-19? |who is at most risk of severe illness from covid?', 'People aged 60 years and over, and those with underlying medical problems like high blood pressure, heart and lung problems, diabetes, obesity or cancer, are at higher risk of developing serious illness. However, anyone can get sick with COVID-19 and become seriously ill or die at any age.'),
(21, 'when is a person infectious? ', 'The infectious period may begin around two days before the symptoms appear, but people are most infectious during the symptomatic period, even if symptoms are mild and non-specific. The infectious period is estimated to last for eight to 10 days in moderate cases, and up to two weeks on average in s'),
(22, 'if I use a facemask or N95, does it help to reduce COVID-19 transmission?|If I use a facemask or N95, does it help to reduce covid transmission?', 'N95 masks is not recommended because it is more restrictive and may cause the wearer to feel difficult to breathe. It is best used by healthcare professionals who handle patients in health facilities. The use of face masks and surgical masks or 3- ply face masks is recommended as it helps reduce the'),
(23, 'are there long term effects of COVID-19?|are there long term effects of covid?', 'Some people who have had COVID-19, whether they have needed hospitalization or not, continue to experience symptoms, including fatigue, respiratory and neurological symptoms.'),
(24, 'how can we protect others and ourselves if we don’t know who is infected? ', 'Stay safe by taking some simple precautions, such as physical distancing, wearing a mask, especially when distancing cannot be maintained, keeping rooms well ventilated, avoiding crowds and close contact, regularly cleaning your hands, and coughing into a bent elbow or tissue. Check local advice whe'),
(25, 'when should I get a test for COVID-19?|when should I get a test for covid?', 'Anyone with symptoms should be tested, wherever possible. People who do not have symptoms but have had close contact with someone who is, or may be, infected may also consider testing – contact your local health guidelines and follow their guidance.'),
(26, 'what is the treatment for COVID-19 infection?|what is the treatment for covid infection?', 'To date, there have been no specific treatments or antiviral for COVID-19 infection. Treatment is given only to relieve the symptoms of the patient.'),
(27, 'Is there a vaccine for COVID-19?', 'Yes. There are three COVID-19 vaccines for which certain national regulatory authorities have authorized the use. None have yet received WHO EUL/PQ authorization.'),
(28, 'is it possible to have flu and COVID-19 at the same time?|is it possible to have flu and covid at the same time?', 'Yes. It is possible to test positive for flu (as well as other respiratory infections) and COVID-19 at the same time. Because some of the symptoms of flu and COVID-19 are similar, it may be hard to tell the difference between them based on symptoms alone. Testing may be needed to help confirm a diag'),
(29, 'should I wear a mask while exercising?', 'Even when you’re in an area of COVID-19 transmission, masks should not be worn during vigorous physical activity because of the risk of reducing your breathing capacity. No matter how intensely you exercise, keep at least 1 metre away from others, and if you’re indoors, make sure there is adequate v'),
(30, 'Why should people wear masks?', 'Masks are a key measure to suppress transmission and save lives. Masks should be used as part of a comprehensive ‘Do it all!’ approach including physical distancing, avoiding crowded, closed and close-contact settings, good ventilation, cleaning hands, covering sneezes and coughs, and more. Dependin'),
(31, 'What is the difference between asymptomatic and pre-symptomatic?', 'Both terms refer to people who do not have symptoms. The difference is that ‘asymptomatic’ refers to people who are infected but never develop any symptoms, while ‘pre-symptomatic’ refers to infected people who have not yet developed symptoms but go on to develop symptoms later.'),
(32, 'will vitamin D save my life?|is vitamin D good for my health?', 'A growing body of evidence strongly suggests that vitamin D in high doses not only helps keep bones strong but also reduces the risk of colon, ovarian, and breast cancers, and diseases such as diabetes and multiple sclerosis. And many of us don\'t get enough because of a lack of exposure to sunlight '),
(33, 'can I trust my tap water?|is tap water good for health?', 'Sure. Unless you\'re on a private well, tap water comes from municipal treatment plants that are carefully monitored and better regulated than bottled water. (Some popular brands like Aquafina and Dasani are just that: tap water.) Very strict federal rules now require extensive filtering of the water'),
(34, 'will vitamin D save my life?|is vitamin D good for my health?', 'A growing body of evidence strongly suggests that vitamin D in high doses not only helps keep bones strong but also reduces the risk of colon, ovarian, and breast cancers, and diseases such as diabetes and multiple sclerosis. And many of us don\'t get enough because of a lack of exposure to sunlight '),
(35, 'can I trust my tap water?|is tap water good for health?', 'Sure. Unless you\'re on a private well, tap water comes from municipal treatment plants that are carefully monitored and better regulated than bottled water. (Some popular brands like Aquafina and Dasani are just that: tap water.) Very strict federal rules now require extensive filtering of the water'),
(36, 'is my microwave giving me cancer?|does microwave can give cancer?', 'No. Microwaving doesn\'t alter food in any way that could make you sick. All a microwave does is spur the water molecules in your food to move, and the friction of those molecules heats up your meal. The ovens do generate a tiny magnetic field, but there\'s very little evidence that such a field poses'),
(37, 'what is cancer?', 'Cancer is the uncontrolled growth of abnormal cells anywhere in a body. These abnormal cells are termed cancer cells, malignant cells, or tumor cells. These cells can infiltrate normal body tissues. Many cancers and the abnormal cells that compose the cancer tissue are further identified by the name'),
(38, 'what are the symptoms of heart attack?', 'Signs of a heart attack include pain, pressure, squeezing, or feeling of fullness in the center of the chest that lasts more than a few minutes; pain or discomfort in other areas of the upper body; shortness of breath; cold sweat; nausea; or lightheadedness.'),
(39, 'what are the symptoms of stroke?', 'Signs of a stroke include facial drooping, arm weakness, difficulty with speech, rapidly developing dizziness or balance, sudden numbness or weakness, loss of vision, confusion, or severe headache.'),
(40, 'i\'m having suicidal thoughts and hallucinations', 'You are maybe suffering from emotional stress. If you find your level of emotional stress interfering with your daily activities or threatening your well-being in other ways, you may consider seeing a therapist for help working through emotional issues. Whatever the cause of your emotional stress, y'),
(41, 'is my microwave giving me cancer?|does microwave can give cancer?', 'No. Microwaving doesn\'t alter food in any way that could make you sick. All a microwave does is spur the water molecules in your food to move, and the friction of those molecules heats up your meal. The ovens do generate a tiny magnetic field, but there\'s very little evidence that such a field poses'),
(42, 'what is cancer?', 'Cancer is the uncontrolled growth of abnormal cells anywhere in a body. These abnormal cells are termed cancer cells, malignant cells, or tumor cells. These cells can infiltrate normal body tissues. Many cancers and the abnormal cells that compose the cancer tissue are further identified by the name'),
(43, 'what are the symptoms of heart attack?', 'Signs of a heart attack include pain, pressure, squeezing, or feeling of fullness in the center of the chest that lasts more than a few minutes; pain or discomfort in other areas of the upper body; shortness of breath; cold sweat; nausea; or lightheadedness.'),
(44, 'what are the symptoms of stroke?', 'Signs of a stroke include facial drooping, arm weakness, difficulty with speech, rapidly developing dizziness or balance, sudden numbness or weakness, loss of vision, confusion, or severe headache.'),
(45, 'i\'m having suicidal thoughts and hallucinations', 'You are maybe suffering from emotional stress. If you find your level of emotional stress interfering with your daily activities or threatening your well-being in other ways, you may consider seeing a therapist for help working through emotional issues. Whatever the cause of your emotional stress, y');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `roomNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `name`, `email`, `phone`, `roomNo`) VALUES
(1, 'Doctor Sabri', 'sabri@mhs.com', '013-4693540', 2),
(2, 'Doctor Kumar', 'kumar@mhs.com', '012-7756456', 1),
(3, 'Doctor Ang', 'ang@mhs.com', '012-5186254', 3),
(4, 'Doctor Yunus', 'yunus@mhs.com', '013-4693541', 4),
(5, 'Doctor Azhar', 'azhar@mhs.com', '012-5567540', 5),
(6, 'Doctor Anbu', 'anbu@mhs.com', '012-2776346', 6);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` varchar(12) NOT NULL,
  `name` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `age` int(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `gender`, `age`, `email`, `phone`, `address`, `password`) VALUES
('630616087633', 'Hisham', 'Male', 59, 'hisham@gmail.com', '0127653897', 'No.273 Taman Orkid', 'hisham01'),
('650716082776', 'Letchumi', 'Female', 56, 'letchumi@gmail.com', '01276542222', 'No.6, Taman Sentosa', 'letchumi123'),
('872566827656', 'Simran', 'Female', 64, 'simran@gmail.com', '012-8756457', 'No.45, Taman Klebang', '123456'),
('950501086533', 'Sood', 'Male', 26, 'b031810056@student.utem.edu.my', '0134693541', 'Universiti Teknikal Malaysia Melaka, Hang Tuah Jaya, 76100 Durian Tunggal, Melaka', 'sood95'),
('960603085997', 'Ahmad', 'Male', 58, 'ahmad@gmail.com', '012-8756456', 'No.15,kajang', 'ahmad11');

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(12) NOT NULL,
  `medical_history` text NOT NULL,
  `date` date NOT NULL,
  `test` text NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`id`, `patient_id`, `medical_history`, `date`, `test`, `result`) VALUES
(1, '960603085997', 'high blood pressure', '2020-12-09', 'covid', 'negative'),
(2, '630616087633', 'diabetes, asthma', '2021-01-02', 'covid', 'positive'),
(4, '630616087633', 'diabetes', '2021-01-11', 'glucose tolerance', 'normal'),
(5, '650716082776', 'pneumonia', '2021-01-13', 'covid', 'positive'),
(6, '630616087633', 'Diabetes', '2021-01-21', 'covid', 'negative');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `password`) VALUES
(1, 'previna', 'previna99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`chatbot_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `chatbot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patientdata`
--
ALTER TABLE `patientdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`);

--
-- Constraints for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD CONSTRAINT `patientdata_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
