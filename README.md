By Jeremiah Freeman

## Description/Specs
  This program will list shoe stores and all the brands these stores carry.  User can update and delete stores and brands.

| Behavior | Input 1 | Output |
|----------|---------|--------|
| Brand getBrandName test | Friend | match/pass |
| Brand getBrandId test | 1 | match/pass |
| Brand save() test | save Object 1 | Object 1 passes |
| Brand getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Brand find() test | find Object 1 and Object 2 | Object 1 found |
| Brand setBrandName() test | ally | dinter|
| Brand store_id property addition | add store_id and test all construct tests | all test passing |
| Brand deleteAll function test | delete Store and Brand | all deleted |
| Store getName test | name | match/pass |
| Store getId test | id | match/pass |
| Store save() test | save Object 1 | Object 1 passes |
| Store getAll() test | get Object 1 and Object 2 | Object 1 and 2 gotten ( passes )|
| Store find() test | find Object 1 and Object 2 | Object 1 found |
| Store setName() test | Adidas | Puma = $new_name |
| Store deleteAll function test | delete Brands and Store | all deleted |


## Setup / Installation Requirements

 * MAMP is required for viewing. If you do not have MAMP please download it here 'https://www.mamp.info/en/'.  After installation please select 'start servers'.
 * Open web browser.
 * Clone this, "https://github.com/jaythinkshappiness/ShoeStore" repository.
 * Before preceding, download the two (2) database zip files in the repository named:
   - shoes.sql (1).zip
   - shoes_test.sql (1).zip
 * Next, open 'http://localhost:8888/phpmyadmin/' and select the tab 'Import'.
 * Import the two zip files you just downloaded.
 * Open Terminal.
 * If using Mac computer run this code in terminal if 'Composer' has not been previously installed.
- cd ~
-sudo mkdir -p /usr/local/bin
-sudo chown -R $USER /usr/local/
-curl -sS https://getcomposer.org/installer | php
-mv composer.phar /usr/local/bin/composer
* If running a windows computer and 'Composer' has not been previously installed:
    -please go to this address, a download will automatically install: "https://getcomposer.org/Composer-Setup.exe".
    -follow all setup and installation instructions.
* Change directory to PHP---Hair-Salon and type 'composer install'.
* Change directory to the 'web' folder and type 'php -S localhost:8000'.
* Finally enter 'localhost:8000' into your local browser and press enter.


## Known Bugs

There are no known bugs.

## Support and contact details

If you notice bugs or would like to contribute in any way please contact me at jaythinkshappiness@gmail.com

## Technologies Used

HTML
PHP
Twig
Silex
Bootstrap
Mysql



### License
GNU GENERAL PUBLIC LICENSE Version 3
Copyright (c) 2017 Epidocus, Jeremiah Freeman


//  List of all DATABASE commands used //

-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 04, 2017 at 01:53 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--
CREATE DATABASE IF NOT EXISTS `shoes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shoes`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(25, 'adadada'),
(26, 'asdasdasdd'),
(27, '22222'),
(28, '22222'),
(29, 'sadd');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`) VALUES
(27, 'NIKE'),
(28, 'adidas'),
(29, 'Puma');

-- --------------------------------------------------------

--
-- Table structure for table `stores_brands`
--

CREATE TABLE `stores_brands` (
  `id` bigint(20) unsigned NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores_brands`
--

INSERT INTO `stores_brands` (`id`, `store_id`, `brand_id`) VALUES
--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `stores_brands`
--
ALTER TABLE `stores_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stores_brands`
--
ALTER TABLE `stores_brands`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
