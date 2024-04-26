-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2023 at 02:36 PM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ravidada_safemove`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `iso` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nicename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonecode` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', '4', '93'),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', '8', '355'),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', '12', '213'),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', '16', '168'),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', '24', '244'),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', '660', '126'),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, '0'),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', '28', '126'),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', '32', '54'),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', '51', '374'),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', '533', '297'),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', '36', '61'),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', '40', '43'),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', '31', '994'),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', '44', '124'),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', '48', '973'),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', '50', '880'),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', '52', '124'),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', '112', '375'),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', '56', '32'),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', '84', '501'),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', '204', '229'),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', '60', '144'),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', '64', '975'),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', '68', '591'),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', '70', '387'),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', '72', '267'),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, '0'),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', '76', '55'),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, '246'),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', '96', '673'),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', '100', '359'),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', '854', '226'),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', '108', '257'),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', '116', '855'),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', '120', '237'),
(38, 'CA', 'CANADA', 'Canada', 'CAN', '124', '1'),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', '132', '238'),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', '136', '134'),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', '140', '236'),
(42, 'TD', 'CHAD', 'Chad', 'TCD', '148', '235'),
(43, 'CL', 'CHILE', 'Chile', 'CHL', '152', '56'),
(44, 'CN', 'CHINA', 'China', 'CHN', '156', '86'),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, '61'),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, '672'),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', '170', '57'),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', '174', '269'),
(49, 'CG', 'CONGO', 'Congo', 'COG', '178', '242'),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', '180', '242'),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', '184', '682'),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', '188', '506'),
(53, 'CI', 'COTE D`IVOIRE', 'Cote D`Ivoire', 'CIV', '384', '225'),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', '191', '385'),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', '192', '53'),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', '196', '357'),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', '203', '420'),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', '208', '45'),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', '262', '253'),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', '212', '176'),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', '214', '180'),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', '218', '593'),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', '818', '20'),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', '222', '503'),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', '226', '240'),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', '232', '291'),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', '233', '372'),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', '231', '251'),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', '238', '500'),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', '234', '298'),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', '242', '679'),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', '246', '358'),
(73, 'FR', 'FRANCE', 'France', 'FRA', '250', '33'),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', '254', '594'),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', '258', '689'),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, '0'),
(77, 'GA', 'GABON', 'Gabon', 'GAB', '266', '241'),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', '270', '220'),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', '268', '995'),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', '276', '49'),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', '288', '233'),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', '292', '350'),
(83, 'GR', 'GREECE', 'Greece', 'GRC', '300', '30'),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', '304', '299'),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', '308', '147'),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', '312', '590'),
(87, 'GU', 'GUAM', 'Guam', 'GUM', '316', '167'),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', '320', '502'),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', '324', '224'),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', '624', '245'),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', '328', '592'),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', '332', '509'),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, '0'),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', '336', '39'),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', '340', '504'),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', '344', '852'),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', '348', '36'),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', '352', '354'),
(99, 'IN', 'INDIA', 'India', 'IND', '356', '91'),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', '360', '62'),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', '364', '98'),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', '368', '964'),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', '372', '353'),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', '376', '972'),
(105, 'IT', 'ITALY', 'Italy', 'ITA', '380', '39'),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', '388', '187'),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', '392', '81'),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', '400', '962'),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', '398', '7'),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', '404', '254'),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', '296', '686'),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE`S REPUBLIC OF', 'Korea, Democratic People`s Republic of', 'PRK', '408', '850'),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', '410', '82'),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', '414', '965'),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', '417', '996'),
(116, 'LA', 'LAO PEOPLE`S DEMOCRATIC REPUBLIC', 'Lao People`s Democratic Republic', 'LAO', '418', '856'),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', '428', '371'),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', '422', '961'),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', '426', '266'),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', '430', '231'),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', '434', '218'),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', '438', '423'),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', '440', '370'),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', '442', '352'),
(125, 'MO', 'MACAO', 'Macao', 'MAC', '446', '853'),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', '807', '389'),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', '450', '261'),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', '454', '265'),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', '458', '60'),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', '462', '960'),
(131, 'ML', 'MALI', 'Mali', 'MLI', '466', '223'),
(132, 'MT', 'MALTA', 'Malta', 'MLT', '470', '356'),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', '584', '692'),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', '474', '596'),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', '478', '222'),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', '480', '230'),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, '269'),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', '484', '52'),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', '583', '691'),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', '498', '373'),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', '492', '377'),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', '496', '976'),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', '500', '166'),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', '504', '212'),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', '508', '258'),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', '104', '95'),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', '516', '264'),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', '520', '674'),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', '524', '977'),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', '528', '31'),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', '530', '599'),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', '540', '687'),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', '554', '64'),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', '558', '505'),
(155, 'NE', 'NIGER', 'Niger', 'NER', '562', '227'),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', '566', '234'),
(157, 'NU', 'NIUE', 'Niue', 'NIU', '570', '683'),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', '574', '672'),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', '580', '167'),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', '578', '47'),
(161, 'OM', 'OMAN', 'Oman', 'OMN', '512', '968'),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', '586', '92'),
(163, 'PW', 'PALAU', 'Palau', 'PLW', '585', '680'),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, '970'),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', '591', '507'),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', '598', '675'),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', '600', '595'),
(168, 'PE', 'PERU', 'Peru', 'PER', '604', '51'),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', '608', '63'),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', '612', '0'),
(171, 'PL', 'POLAND', 'Poland', 'POL', '616', '48'),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', '620', '351'),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', '630', '178'),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', '634', '974'),
(175, 'RE', 'REUNION', 'Reunion', 'REU', '638', '262'),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', '642', '40'),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', '643', '70'),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', '646', '250'),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', '654', '290'),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', '659', '186'),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', '662', '175'),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', '666', '508'),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', '670', '178'),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', '882', '684'),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', '674', '378'),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', '678', '239'),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', '682', '966'),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', '686', '221'),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, '381'),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', '690', '248'),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', '694', '232'),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', '702', '65'),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', '703', '421'),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', '705', '386'),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', '90', '677'),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', '706', '252'),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', '710', '27'),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, '0'),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', '724', '34'),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', '144', '94'),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', '736', '249'),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', '740', '597'),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', '744', '47'),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', '748', '268'),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', '752', '46'),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', '756', '41'),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', '760', '963'),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', '158', '886'),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', '762', '992'),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', '834', '255'),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', '764', '66'),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, '670'),
(213, 'TG', 'TOGO', 'Togo', 'TGO', '768', '228'),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', '772', '690'),
(215, 'TO', 'TONGA', 'Tonga', 'TON', '776', '676'),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', '780', '186'),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', '788', '216'),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', '792', '90'),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', '795', '737'),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', '796', '164'),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', '798', '688'),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', '800', '256'),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', '804', '380'),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', '784', '971'),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', '826', '44'),
(226, 'US', 'UNITED STATES', 'United States', 'USA', '840', '1'),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, '1'),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', '858', '598'),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', '860', '998'),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', '548', '678'),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', '862', '58'),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', '704', '84'),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', '92', '128'),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', '850', '134'),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', '876', '681'),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', '732', '212'),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', '887', '967'),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', '894', '260'),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', '716', '263');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `foldername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `languagename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flag_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `foldername`, `languagename`, `description`, `flag_image`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'English', 'america.png', '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(22, 'bn', 'bengali', 'Bangla', '1475429828.png', '2019-03-08 09:39:57', '2019-03-08 09:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `replay_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2015_08_25_172600_create_settings_table', 1),
(3, '2015_09_19_191655_setup_countries_table', 1),
(4, '2015_10_10_170827_create_users_table', 1),
(5, '2015_10_10_170911_create_social_accounts_table', 1),
(6, '2015_10_10_171049_create_social_login_table', 1),
(7, '2015_10_10_171734_add_foreign_keys', 1),
(8, '2015_12_24_080704_entrust_setup_tables', 1),
(9, '2015_12_29_224252_create_user_activity_table', 1),
(10, '2017_11_12_000000_create_languages_table', 1),
(11, '2017_11_12_000000_create_messages_table', 1),
(12, '2019_04_05_095710_create_enquiries_table', 2),
(13, '2019_04_05_130434_create_enquiry_articals_lists_table', 3),
(14, '2019_04_06_072829_create_shifting_address_details_table', 4),
(15, '2019_04_06_083230_create_enq_shifting_details_table', 5),
(16, '2019_04_09_075248_create_enquiy_followups_table', 6),
(17, '2019_04_11_093239_create_survey_models_table', 7),
(18, '2019_04_11_093254_create_survey_costings_table', 7),
(19, '2019_04_11_093311_create_survey_pack_materials_table', 8),
(20, '2019_04_12_071056_create_confirm_job_models_table', 9),
(21, '2019_04_12_085648_create_packing_list_models_table', 10),
(22, '2019_04_13_084935_create_transport_models_table', 11),
(23, '2019_04_15_054454_create_delivery_models_table', 12),
(24, '2019_04_15_113219_create_tracking_models_table', 13),
(25, '2019_04_15_114134_create_tracking_details_models_table', 14),
(26, '2019_04_16_122302_create_invoice_models_table', 15),
(27, '2019_04_18_113646_create_schedule_survey_models_table', 16),
(28, '2019_04_19_170522_create_quotation_models_table', 17),
(29, '2019_04_20_110458_create_payment_models_table', 18),
(30, '2019_04_20_181244_create_trans_payment_models_table', 19),
(31, '2019_04_22_101248_create_sms_integration_models_table', 20),
(32, '2019_04_22_143453_create_email_tempaltes_table', 21),
(33, '2019_04_24_101818_create_email_integration_models_table', 22),
(34, '2019_04_24_112637_create_lead_status_models_table', 23),
(35, '2019_04_24_112719_create_lead_source_models_table', 23),
(36, '2019_04_24_164522_create_goods_type_models_table', 24),
(37, '2019_04_24_173916_create_artical_models_table', 25),
(38, '2019_04_26_115513_create_packing_material_models_table', 25),
(39, '2019_04_26_154825_create_transport_agent_models_table', 26),
(40, '2019_04_26_173119_create_s_m_s_template_models_table', 27),
(41, '2019_04_29_095137_create_additional_cft_models_table', 28),
(42, '2019_04_29_124925_create_kilometer_wise_charges_models_table', 29),
(43, '2019_04_29_143446_create_company_details_models_table', 29),
(44, '2019_05_04_141609_create_src_dest_expenss_models_table', 30),
(45, '2019_05_04_142829_create_source_expenss_models_table', 31),
(46, '2019_05_04_142843_create_destination_expenss_models_table', 31),
(47, '2019_05_06_114456_create_office_expenses_models_table', 32),
(48, '2019_05_06_115540_create_off_exp_catogry_models_table', 32),
(49, '2019_05_09_153746_create_feedback_models_table', 33),
(50, '2019_05_28_104359_create_vehicle_models_table', 34),
(51, '2019_05_30_155227_create_packing_image_models_table', 34),
(52, '2019_05_30_174632_create_invoice_setting_models_table', 35),
(53, '2019_05_31_111543_create_backup_databases_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_additional_cft`
--

CREATE TABLE `mst_tbl_additional_cft` (
  `cft_id` int(11) NOT NULL,
  `cft_start_range` int(11) NOT NULL,
  `cft_end_range` int(11) NOT NULL,
  `additional_cft` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_additional_cft`
--

INSERT INTO `mst_tbl_additional_cft` (`cft_id`, `cft_start_range`, `cft_end_range`, `additional_cft`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 20, 0, 1, 1, '2021-11-09 23:22:14', '2021-11-09 23:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_backup_database`
--

CREATE TABLE `mst_tbl_backup_database` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbfile_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_city_lag_alt`
--

CREATE TABLE `mst_tbl_city_lag_alt` (
  `id` int(11) NOT NULL,
  `city` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_city_lag_alt`
--

INSERT INTO `mst_tbl_city_lag_alt` (`id`, `city`, `latitude`, `longitude`, `state`) VALUES
(1, 'Port Blair', '11.67 N', '92.76 E', 'Andaman and Nicobar Islands'),
(2, 'Adilabad', '19.68 N', '78.53 E', 'Andhra Pradesh'),
(3, 'Adoni', '15.63 N', '77.28 E', 'Andhra Pradesh'),
(4, 'Alwal', '17.50 N', '78.54 E', 'Andhra Pradesh'),
(5, 'Anakapalle', '17.69 N', '83.00 E', 'Andhra Pradesh'),
(6, 'Anantapur', '14.70 N', '77.59 E', 'Andhra Pradesh'),
(7, 'Bapatla', '15.91 N', '80.47 E', 'Andhra Pradesh'),
(8, 'Belampalli', '19.06 N', '79.49 E', 'Andhra Pradesh'),
(9, 'Bhimavaram', '16.55 N', '81.53 E', 'Andhra Pradesh'),
(10, 'Bhongir', '17.52 N', '78.88 E', 'Andhra Pradesh'),
(11, 'Bobbili', '18.57 N', '83.37 E', 'Andhra Pradesh'),
(12, 'Bodhan', '18.66 N', '77.88 E', 'Andhra Pradesh'),
(13, 'Chilakalurupet', '16.10 N', '80.16 E', 'Andhra Pradesh'),
(14, 'Chinna Chawk', '14.47 N', '78.83 E', 'Andhra Pradesh'),
(15, 'Chirala', '15.84 N', '80.35 E', 'Andhra Pradesh'),
(16, 'Chittur', '13.22 N', '79.10 E', 'Andhra Pradesh'),
(17, 'Cuddapah', '14.48 N', '78.81 E', 'Andhra Pradesh'),
(18, 'Dharmavaram', '14.42 N', '77.71 E', 'Andhra Pradesh'),
(19, 'Dhone', '15.42 N', '77.88 E', 'Andhra Pradesh'),
(20, 'Eluru', '16.72 N', '81.11 E', 'Andhra Pradesh'),
(21, 'Gaddiannaram', '17.36 N', '78.52 E', 'Andhra Pradesh'),
(22, 'Gadwal', '16.23 N', '77.80 E', 'Andhra Pradesh'),
(23, 'Gajuwaka', '17.70 N', '83.21 E', 'Andhra Pradesh'),
(24, 'Gudivada', '16.44 N', '81.00 E', 'Andhra Pradesh'),
(25, 'Gudur', '14.15 N', '79.84 E', 'Andhra Pradesh'),
(26, 'Guntakal', '15.18 N', '77.37 E', 'Andhra Pradesh'),
(27, 'Guntur', '16.31 N', '80.44 E', 'Andhra Pradesh'),
(28, 'Hindupur', '13.83 N', '77.48 E', 'Andhra Pradesh'),
(29, 'Hyderabad', '17.40 N', '78.48 E', 'Andhra Pradesh'),
(30, 'Jagtial', '18.80 N', '78.91 E', 'Andhra Pradesh'),
(31, 'Kadiri', '14.12 N', '78.16 E', 'Andhra Pradesh'),
(32, 'Kagaznagar', '19.34 N', '79.48 E', 'Andhra Pradesh'),
(33, 'Kakinada', '16.96 N', '82.24 E', 'Andhra Pradesh'),
(34, 'Kallur', '15.69 N', '77.77 E', 'Andhra Pradesh'),
(35, 'Kamareddi', '18.32 N', '78.35 E', 'Andhra Pradesh'),
(36, 'Kapra', '17.37 N', '78.48 E', 'Andhra Pradesh'),
(37, 'Karimnagar', '18.45 N', '79.13 E', 'Andhra Pradesh'),
(38, 'Karnul', '15.83 N', '78.03 E', 'Andhra Pradesh'),
(39, 'Kavali', '14.92 N', '79.99 E', 'Andhra Pradesh'),
(40, 'Khammam', '17.25 N', '80.15 E', 'Andhra Pradesh'),
(41, 'Kodar', '16.98 N', '79.97 E', 'Andhra Pradesh'),
(42, 'Kondukur', '15.22 N', '79.91 E', 'Andhra Pradesh'),
(43, 'Koratla', '18.82 N', '78.72 E', 'Andhra Pradesh'),
(44, 'Kottagudem', '17.56 N', '80.64 E', 'Andhra Pradesh'),
(45, 'Kukatpalle', '17.49 N', '78.41 E', 'Andhra Pradesh'),
(46, 'Lalbahadur Nagar', '17.43 N', '78.50 E', 'Andhra Pradesh'),
(47, 'Machilipatnam', '16.19 N', '81.14 E', 'Andhra Pradesh'),
(48, 'Mahbubnagar', '16.74 N', '77.98 E', 'Andhra Pradesh'),
(49, 'Malkajgiri', '17.55 N', '78.59 E', 'Andhra Pradesh'),
(50, 'Mancheral', '18.88 N', '79.45 E', 'Andhra Pradesh'),
(51, 'Mandamarri', '18.97 N', '79.47 E', 'Andhra Pradesh'),
(52, 'Mangalagiri', '16.44 N', '80.56 E', 'Andhra Pradesh'),
(53, 'Markapur', '15.73 N', '79.28 E', 'Andhra Pradesh'),
(54, 'Miryalaguda', '16.87 N', '79.57 E', 'Andhra Pradesh'),
(55, 'Nalgonda', '17.06 N', '79.26 E', 'Andhra Pradesh'),
(56, 'Nandyal', '15.49 N', '78.48 E', 'Andhra Pradesh'),
(57, 'Narasapur', '16.45 N', '81.70 E', 'Andhra Pradesh'),
(58, 'Narasaraopet', '16.24 N', '80.04 E', 'Andhra Pradesh'),
(59, 'Nellur', '14.46 N', '79.98 E', 'Andhra Pradesh'),
(60, 'Nirmal', '19.12 N', '78.35 E', 'Andhra Pradesh'),
(61, 'Nizamabad', '18.68 N', '78.10 E', 'Andhra Pradesh'),
(62, 'Nuzvid', '16.78 N', '80.85 E', 'Andhra Pradesh'),
(63, 'Ongole', '15.50 N', '80.05 E', 'Andhra Pradesh'),
(64, 'Palakollu', '16.52 N', '81.75 E', 'Andhra Pradesh'),
(65, 'Palasa', '18.77 N', '84.42 E', 'Andhra Pradesh'),
(66, 'Palwancha', '17.60 N', '80.68 E', 'Andhra Pradesh'),
(67, 'Patancheru', '17.53 N', '78.27 E', 'Andhra Pradesh'),
(68, 'Piduguralla', '16.48 N', '79.90 E', 'Andhra Pradesh'),
(69, 'Ponnur', '16.07 N', '80.56 E', 'Andhra Pradesh'),
(70, 'Proddatur', '14.73 N', '78.55 E', 'Andhra Pradesh'),
(71, 'Qutubullapur', '17.43 N', '78.47 E', 'Andhra Pradesh'),
(72, 'Rajamahendri', '17.02 N', '81.79 E', 'Andhra Pradesh'),
(73, 'Rajampet', '14.18 N', '79.17 E', 'Andhra Pradesh'),
(74, 'Rajendranagar', '17.29 N', '78.39 E', 'Andhra Pradesh'),
(75, 'Ramachandrapuram', '17.56 N', '78.04 E', 'Andhra Pradesh'),
(76, 'Ramagundam', '18.80 N', '79.45 E', 'Andhra Pradesh'),
(77, 'Rayachoti', '14.05 N', '78.75 E', 'Andhra Pradesh'),
(78, 'Rayadrug', '14.70 N', '76.87 E', 'Andhra Pradesh'),
(79, 'Samalkot', '17.06 N', '82.18 E', 'Andhra Pradesh'),
(80, 'Sangareddi', '17.63 N', '78.08 E', 'Andhra Pradesh'),
(81, 'Sattenapalle', '16.40 N', '80.18 E', 'Andhra Pradesh'),
(82, 'Serilungampalle', '17.48 N', '78.33 E', 'Andhra Pradesh'),
(83, 'Siddipet', '18.11 N', '78.84 E', 'Andhra Pradesh'),
(84, 'Sikandarabad', '17.47 N', '78.52 E', 'Andhra Pradesh'),
(85, 'Sirsilla', '18.40 N', '78.81 E', 'Andhra Pradesh'),
(86, 'Srikakulam', '18.30 N', '83.90 E', 'Andhra Pradesh'),
(87, 'Srikalahasti', '13.76 N', '79.70 E', 'Andhra Pradesh'),
(88, 'Suriapet', '17.15 N', '79.62 E', 'Andhra Pradesh'),
(89, 'Tadepalle', '16.48 N', '80.60 E', 'Andhra Pradesh'),
(90, 'Tadepallegudem', '16.82 N', '81.52 E', 'Andhra Pradesh'),
(91, 'Tadpatri', '14.91 N', '78.00 E', 'Andhra Pradesh'),
(92, 'Tandur', '17.25 N', '77.58 E', 'Andhra Pradesh'),
(93, 'Tanuku', '16.75 N', '81.69 E', 'Andhra Pradesh'),
(94, 'Tenali', '16.24 N', '80.65 E', 'Andhra Pradesh'),
(95, 'Tirupati', '13.63 N', '79.41 E', 'Andhra Pradesh'),
(96, 'Tuni', '17.35 N', '82.55 E', 'Andhra Pradesh'),
(97, 'Uppal Kalan', '17.38 N', '78.55 E', 'Andhra Pradesh'),
(98, 'Vijayawada', '16.52 N', '80.63 E', 'Andhra Pradesh'),
(99, 'Vinukonda', '16.05 N', '79.75 E', 'Andhra Pradesh'),
(100, 'Visakhapatnam', '17.73 N', '83.30 E', 'Andhra Pradesh'),
(101, 'Vizianagaram', '18.12 N', '83.40 E', 'Andhra Pradesh'),
(102, 'Vuyyuru', '16.37 N', '80.85 E', 'Andhra Pradesh'),
(103, 'Wanparti', '16.37 N', '78.07 E', 'Andhra Pradesh'),
(104, 'Warangal', '18.01 N', '79.58 E', 'Andhra Pradesh'),
(105, 'Yemmiganur', '15.73 N', '77.48 E', 'Andhra Pradesh'),
(106, 'Itanagar', '27.14 N', '93.61 E', 'Arunachal Pradesh'),
(107, 'Barpeta', '26.32 N', '91.00 E', 'Assam'),
(108, 'Bongaigaon', '26.48 N', '90.54 E', 'Assam'),
(109, 'Dhuburi', '26.03 N', '89.97 E', 'Assam'),
(110, 'Dibrugarh', '27.49 N', '94.91 E', 'Assam'),
(111, 'Diphu', '25.84 N', '93.43 E', 'Assam'),
(112, 'Guwahati', '26.19 N', '91.75 E', 'Assam'),
(113, 'Jorhat', '26.76 N', '94.20 E', 'Assam'),
(114, 'Karimganj', '24.85 N', '92.36 E', 'Assam'),
(115, 'Lakhimpur', '27.24 N', '94.10 E', 'Assam'),
(116, 'Lanka', '25.93 N', '92.95 E', 'Assam'),
(117, 'Nagaon', '26.35 N', '92.68 E', 'Assam'),
(118, 'Sibsagar', '26.99 N', '94.63 E', 'Assam'),
(119, 'Silchar', '24.83 N', '92.77 E', 'Assam'),
(120, 'Tezpur', '26.63 N', '92.79 E', 'Assam'),
(121, 'Tinsukia', '27.50 N', '95.36 E', 'Assam'),
(122, 'Alipur Duar', '26.50 N', '89.53 E', 'West Bengal'),
(123, 'Arambagh', '22.88 N', '87.78 E', 'West Bengal'),
(124, 'Asansol', '23.69 N', '86.98 E', 'West Bengal'),
(125, 'Ashoknagar Kalyangarh', '22.84 N', '88.63 E', 'West Bengal'),
(126, 'Baharampur', '24.10 N', '88.24 E', 'West Bengal'),
(127, 'Baidyabati', '22.79 N', '88.33 E', 'West Bengal'),
(128, 'Baj Baj', '22.48 N', '88.17 E', 'West Bengal'),
(129, 'Bally', '22.65 N', '88.35 E', 'West Bengal'),
(130, 'Bally Cantonment', '22.65 N', '88.36 E', 'West Bengal'),
(131, 'Balurghat', '25.23 N', '88.77 E', 'West Bengal'),
(132, 'Bangaon', '23.05 N', '88.83 E', 'West Bengal'),
(133, 'Bankra', '22.58 N', '88.31 E', 'West Bengal'),
(134, 'Bankura', '23.24 N', '87.07 E', 'West Bengal'),
(135, 'Bansbaria', '22.95 N', '88.40 E', 'West Bengal'),
(136, 'Baranagar', '22.64 N', '88.37 E', 'West Bengal'),
(137, 'Barddhaman', '23.24 N', '87.86 E', 'West Bengal'),
(138, 'Basirhat', '22.66 N', '88.86 E', 'West Bengal'),
(139, 'Bhadreswar', '22.84 N', '88.35 E', 'West Bengal'),
(140, 'Bhatpara', '22.89 N', '88.42 E', 'West Bengal'),
(141, 'Bidhannagar', '22.57 N', '88.42 E', 'West Bengal'),
(142, 'Binnaguri', '26.74 N', '89.037 E', 'West Bengal'),
(143, 'Bishnupur', '23.08 N', '87.33 E', 'West Bengal'),
(144, 'Bolpur', '23.67 N', '87.70 E', 'West Bengal'),
(145, 'Calcutta', '22.57 N', '88.36 E', 'West Bengal'),
(146, 'Chakdaha', '22.48 N', '88.35 E', 'West Bengal'),
(147, 'Champdani', '22.81 N', '88.34 E', 'West Bengal'),
(148, 'Chandannagar', '22.89 N', '88.37 E', 'West Bengal'),
(149, 'Contai', '21.79 N', '87.75 E', 'West Bengal'),
(150, 'Dabgram', '', '', 'West Bengal'),
(151, 'Darjiling', '27.05 N', '88.26 E', 'West Bengal'),
(152, 'Dhulian', '24.68 N', '87.97 E', 'West Bengal'),
(153, 'Dinhata', '26.13 N', '89.47 E', 'West Bengal'),
(154, 'Dum Dum', '22.63 N', '88.42 E', 'West Bengal'),
(155, 'Durgapur', '23.50 N', '87.31 E', 'West Bengal'),
(156, 'Gangarampur', '25.40 N', '88.52 E', 'West Bengal'),
(157, 'Garulia', '22.83 N', '88.37 E', 'West Bengal'),
(158, 'Gayespur', '22.98 N', '88.51 E', 'West Bengal'),
(159, 'Ghatal', '22.67 N', '87.72 E', 'West Bengal'),
(160, 'Gopalpur', '', '', 'West Bengal'),
(161, 'Habra', '22.84 N', '88.62 E', 'West Bengal'),
(162, 'Halisahar', '22.95 N', '88.42 E', 'West Bengal'),
(163, 'Haora', '22.58 N', '88.33 E', 'West Bengal'),
(164, 'HugliChunchura', '22.91 N', '88.40 E', 'West Bengal'),
(165, 'Ingraj Bazar', '25.01 N', '88.14 E', 'West Bengal'),
(166, 'Islampur', '26.27 N', '88.20 E', 'West Bengal'),
(167, 'Jalpaiguri', '26.53 N', '88.71 E', 'West Bengal'),
(168, 'Jamuria', '23.70 N', '87.08 E', 'West Bengal'),
(169, 'Jangipur', '24.47 N', '88.07 E', 'West Bengal'),
(170, 'Jhargram', '22.45 N', '86.98 E', 'West Bengal'),
(171, 'Kaliyaganj', '25.63 N', '88.32 E', 'West Bengal'),
(172, 'Kalna', '23.22 N', '88.37 E', 'West Bengal'),
(173, 'Kalyani', '22.98 N', '88.48 E', 'West Bengal'),
(174, 'Kamarhati', '22.67 N', '88.37 E', 'West Bengal'),
(175, 'Kanchrapara', '22.95 N', '88.45 E', 'West Bengal'),
(176, 'Kandi', '23.95 N', '88.03 E', 'West Bengal'),
(177, 'Karsiyang', '26.88 N', '88.28 E', 'West Bengal'),
(178, 'Katwa', '23.65 N', '88.13 E', 'West Bengal'),
(179, 'Kharagpur', '22.34 N', '87.31 E', 'West Bengal'),
(180, 'Kharagpur Railway Settlement', '22.34 N', '87.26 E', 'West Bengal'),
(181, 'Khardaha', '22.73 N', '88.38 E', 'West Bengal'),
(182, 'Kharia', '', '', 'West Bengal'),
(183, 'Koch Bihar', '26.33 N', '89.46 E', 'West Bengal'),
(184, 'Konnagar', '22.70 N', '88.36 E', 'West Bengal'),
(185, 'Krishnanagar', '23.41 N', '88.51 E', 'West Bengal'),
(186, 'Kulti', '23.72 N', '86.89 E', 'West Bengal'),
(187, 'Madhyamgram', '22.70 N', '88.45 E', 'West Bengal'),
(188, 'Maheshtala', '22.51 N', '88.23 E', 'West Bengal'),
(189, 'Memari', '23.20 N', '88.12 E', 'West Bengal'),
(190, 'Midnapur', '22.33 N', '87.15 E', 'West Bengal'),
(191, 'Naihati', '22.91 N', '88.43 E', 'West Bengal'),
(192, 'Navadwip', '23.42 N', '88.37 E', 'West Bengal'),
(193, 'Ni Barakpur', '22.77 N', '88.36 E', 'West Bengal'),
(194, 'North Barakpur', '22.78 N', '88.37 E', 'West Bengal'),
(195, 'North Dum Dum', '22.64 N', '88.41 E', 'West Bengal'),
(196, 'Old Maldah', '', '', 'West Bengal'),
(197, 'Panihati', '22.69 N', '88.37 E', 'West Bengal'),
(198, 'Phulia', '23.24 N', '88.50 E', 'West Bengal'),
(199, 'Pujali', '22.47 N', '88.15 E', 'West Bengal'),
(200, 'Puruliya', '23.34 N', '86.36 E', 'West Bengal'),
(201, 'Raiganj', '25.62 N', '88.12 E', 'West Bengal'),
(202, 'Rajpur', '22.44 N', '88.44 E', 'West Bengal'),
(203, 'Rampur Hat', '24.17 N', '87.78 E', 'West Bengal'),
(204, 'Ranaghat', '23.19 N', '88.58 E', 'West Bengal'),
(205, 'Raniganj', '23.62 N', '87.11 E', 'West Bengal'),
(206, 'Rishra', '22.71 N', '88.36 E', 'West Bengal'),
(207, 'Shantipur', '23.26 N', '88.44 E', 'West Bengal'),
(208, 'Shiliguri', '26.73 N', '88.42 E', 'West Bengal'),
(209, 'Shrirampur', '22.74 N', '88.35 E', 'West Bengal'),
(210, 'Siuri', '23.91 N', '87.53 E', 'West Bengal'),
(211, 'South Dum Dum', '22.61 N', '88.41 E', 'West Bengal'),
(212, 'Titagarh', '22.74 N', '88.38 E', 'West Bengal'),
(213, 'Ulubaria', '22.47 N', '88.11 E', 'West Bengal'),
(214, 'UttarparaKotrung', '22.66 N', '88.35 E', 'West Bengal'),
(215, 'Araria', '26.15 N', '87.52 E', 'Bihar'),
(216, 'Arrah', '25.56 N', '84.66 E', 'Bihar'),
(217, 'Aurangabad', '24.75 N', '84.37 E', 'Bihar'),
(218, 'Bagaha', '27.10 N', '84.09 E', 'Bihar'),
(219, 'Begusarai', '25.42 N', '86.12 E', 'Bihar'),
(220, 'Bettiah', '26.81 N', '84.50 E', 'Bihar'),
(221, 'Bhabua', '25.05 N', '83.62 E', 'Bihar'),
(222, 'Bhagalpur', '25.26 N', '86.98 E', 'Bihar'),
(223, 'Bihar', '25.21 N', '85.52 E', 'Bihar'),
(224, 'Buxar', '25.58 N', '83.98 E', 'Bihar'),
(225, 'Chhapra', '25.78 N', '84.72 E', 'Bihar'),
(226, 'Darbhanga', '26.16 N', '85.88 E', 'Bihar'),
(227, 'Dehri', '24.91 N', '84.18 E', 'Bihar'),
(228, 'DighaMainpura', '', '', 'Bihar'),
(229, 'Dinapur', '25.64 N', '85.04 E', 'Bihar'),
(230, 'Dumraon', '25.55 N', '84.15 E', 'Bihar'),
(231, 'Gaya', '24.81 N', '85.00 E', 'Bihar'),
(232, 'Gopalganj', '26.47 N', '84.43 E', 'Bihar'),
(233, 'Goura', '', '', 'Bihar'),
(234, 'Hajipur', '', '', 'Bihar'),
(235, 'Jahanabad', '25.22 N', '84.98 E', 'Bihar'),
(236, 'Jamalpur', '25.32 N', '86.48 E', 'Bihar'),
(237, 'Jamui', '24.92 N', '86.22 E', 'Bihar'),
(238, 'Katihar', '25.55 N', '87.57 E', 'Bihar'),
(239, 'Khagaria', '25.50 N', '86.48 E', 'Bihar'),
(240, 'Khagaul', '25.58 N', '85.05 E', 'Bihar'),
(241, 'Kishanganj', '26.11 N', '87.95 E', 'Bihar'),
(242, 'Lakhisarai', '25.18 N', '86.09 E', 'Bihar'),
(243, 'Madhipura', '25.92 N', '86.78 E', 'Bihar'),
(244, 'Madhubani', '26.37 N', '86.06 E', 'Bihar'),
(245, 'Masaurhi', '25.35 N', '85.03 E', 'Bihar'),
(246, 'Mokama', '25.40 N', '85.92 E', 'Bihar'),
(247, 'Motihari', '26.66 N', '84.91 E', 'Bihar'),
(248, 'Munger', '25.39 N', '86.47 E', 'Bihar'),
(249, 'Muzaffarpur', '26.13 N', '85.38 E', 'Bihar'),
(250, 'Nawada', '24.88 N', '85.54 E', 'Bihar'),
(251, 'Patna', '25.62 N', '85.13 E', 'Bihar'),
(252, 'Phulwari', '25.60 N', '85.13 E', 'Bihar'),
(253, 'Purnia', '25.78 N', '87.47 E', 'Bihar'),
(254, 'Raxaul', '26.98 N', '84.85 E', 'Bihar'),
(255, 'Saharsa', '25.88 N', '86.59 E', 'Bihar'),
(256, 'Samastipur', '25.85 N', '85.78 E', 'Bihar'),
(257, 'Sasaram', '24.96 N', '84.01 E', 'Bihar'),
(258, 'Sitamarhi', '26.61 N', '85.48 E', 'Bihar'),
(259, 'Siwan', '26.23 N', '84.35 E', 'Bihar'),
(260, 'Supaul', '26.12 N', '86.60 E', 'Bihar'),
(261, 'Chandigarh', '30.75 N', '76.78 E', 'Chandigarh'),
(262, 'Ambikapur', '23.13 N', '83.20 E', 'Chhattisgarh'),
(263, 'Bhilai', '21.21 N', '81.38 E', 'Chhattisgarh'),
(264, 'Bilaspur', '22.09 N', '82.15 E', 'Chhattisgarh'),
(265, 'Charoda', '21.23 N', '81.50 E', 'Chhattisgarh'),
(266, 'Chirmiri', '23.21 N', '82.41 E', 'Chhattisgarh'),
(267, 'Dhamtari', '20.71 N', '81.55 E', 'Chhattisgarh'),
(268, 'Durg', '21.20 N', '81.28 E', 'Chhattisgarh'),
(269, 'Jagdalpur', '19.09 N', '82.03 E', 'Chhattisgarh'),
(270, 'Korba', '22.35 N', '82.69 E', 'Chhattisgarh'),
(271, 'Raigarh', '21.90 N', '83.39 E', 'Chhattisgarh'),
(272, 'Raipur', '21.24 N', '81.63 E', 'Chhattisgarh'),
(273, 'Rajnandgaon', '21.10 N', '81.04 E', 'Chhattisgarh'),
(274, 'Bhalswa Jahangirpur', '28.74 N', '77.17 E', 'Delhi'),
(275, 'Burari', '', '', 'Delhi'),
(276, 'Chilla Saroda Bangar', '', '', 'Delhi'),
(277, 'Dallo Pura', '', '', 'Delhi'),
(278, 'Delhi', '28.67 N', '77.21 E', 'Delhi'),
(279, 'Deoli', '28.49 N', '77.22 E', 'Delhi'),
(280, 'Dilli Cantonment', '28.57 N', '77.16 E', 'Delhi'),
(281, 'Gharoli', '', '', 'Delhi'),
(282, 'Gokalpur', '28.71 N', '77.28 E', 'Delhi'),
(283, 'Hastsal', '', '', 'Delhi'),
(284, 'Jaffrabad', '', '', 'Delhi'),
(285, 'Karawal Nagar', '', '', 'Delhi'),
(286, 'Khajuri Khas', '', '', 'Delhi'),
(287, 'Kirari Suleman Nagar', '', '', 'Delhi'),
(288, 'Mandoli', '', '', 'Delhi'),
(289, 'Mithe Pur', '', '', 'Delhi'),
(290, 'Molarband', '', '', 'Delhi'),
(291, 'Mundka', '', '', 'Delhi'),
(292, 'Mustafabad', '', '', 'Delhi'),
(293, 'Nangloi Jat', '28.68 N', '77.07 E', 'Delhi'),
(294, 'Ni Dilli', '28.60 N', '77.22 E', 'Delhi'),
(295, 'Pul Pehlad', '', '', 'Delhi'),
(296, 'Puth Kalan', '', '', 'Delhi'),
(297, 'Roshan Pura', '28.60 N', '76.99 E', 'Delhi'),
(298, 'Sadat Pur Gujran', '', '', 'Delhi'),
(299, 'Sultanpur Majra', '28.76 N', '77.06 E', 'Delhi'),
(300, 'Tajpul', '', '', 'Delhi'),
(301, 'Tigri', '28.50 N', '77.22 E', 'Delhi'),
(302, 'Ziauddin Pur', '', '', 'Delhi'),
(303, 'Madgaon', '15.28 N', '73.94 E', 'Goa'),
(304, 'Mormugao', '15.42 N', '73.78 E', 'Goa'),
(305, 'Panaji', '15.50 N', '73.81 E', 'Goa'),
(306, 'Ahmadabad', '23.03 N', '72.58 E', 'Gujarat'),
(307, 'Amreli', '21.61 N', '71.22 E', 'Gujarat'),
(308, 'Anand', '22.56 N', '72.95 E', 'Gujarat'),
(309, 'Anjar', '23.12 N', '70.02 E', 'Gujarat'),
(310, 'Bardoli', '21.12 N', '73.12 E', 'Gujarat'),
(311, 'Bharuch', '21.71 N', '72.97 E', 'Gujarat'),
(312, 'Bhavnagar', '21.79 N', '72.13 E', 'Gujarat'),
(313, 'Bhuj', '23.26 N', '69.66 E', 'Gujarat'),
(314, 'Borsad', '22.42 N', '72.90 E', 'Gujarat'),
(315, 'Botad', '22.18 N', '71.66 E', 'Gujarat'),
(316, 'Chandkheda', '23.15 N', '72.61 E', 'Gujarat'),
(317, 'Chandlodiya', '23.10 N', '72.56 E', 'Gujarat'),
(318, 'Dabhoi', '22.13 N', '73.41 E', 'Gujarat'),
(319, 'Dahod', '22.84 N', '74.25 E', 'Gujarat'),
(320, 'Dholka', '22.74 N', '72.44 E', 'Gujarat'),
(321, 'Dhoraji', '21.74 N', '70.44 E', 'Gujarat'),
(322, 'Dhrangadhra', '23.00 N', '71.46 E', 'Gujarat'),
(323, 'Disa', '24.26 N', '72.18 E', 'Gujarat'),
(324, 'Gandhidham', '23.07 N', '70.13 E', 'Gujarat'),
(325, 'Gandhinagar', '23.30 N', '72.63 E', 'Gujarat'),
(326, 'Ghatlodiya', '23.05 N', '72.55 E', 'Gujarat'),
(327, 'Godhra', '22.77 N', '73.60 E', 'Gujarat'),
(328, 'Gondal', '21.97 N', '70.80 E', 'Gujarat'),
(329, 'Himatnagar', '23.60 N', '72.96 E', 'Gujarat'),
(330, 'Jamnagar', '22.47 N', '70.07 E', 'Gujarat'),
(331, 'Jamnagar', '', '', 'Gujarat'),
(332, 'Jetpur', '21.75 N', '70.61 E', 'Gujarat'),
(333, 'Junagadh', '21.52 N', '70.45 E', 'Gujarat'),
(334, 'Kalol', '23.25 N', '72.49 E', 'Gujarat'),
(335, 'Keshod', '21.31 N', '70.23 E', 'Gujarat'),
(336, 'Khambhat', '22.32 N', '72.61 E', 'Gujarat'),
(337, 'Kundla', '21.35 N', '71.30 E', 'Gujarat'),
(338, 'Mahuva', '21.10 N', '71.75 E', 'Gujarat'),
(339, 'Mangrol', '21.12 N', '70.12 E', 'Gujarat'),
(340, 'Modasa', '23.47 N', '73.30 E', 'Gujarat'),
(341, 'Morvi', '22.82 N', '70.83 E', 'Gujarat'),
(342, 'Nadiad', '22.70 N', '72.85 E', 'Gujarat'),
(343, 'Navagam Ghed', '', '', 'Gujarat'),
(344, 'Navsari', '20.96 N', '72.92 E', 'Gujarat'),
(345, 'Palitana', '21.52 N', '71.83 E', 'Gujarat'),
(346, 'Patan', '23.86 N', '72.11 E', 'Gujarat'),
(347, 'Porbandar', '21.65 N', '69.60 E', 'Gujarat'),
(348, 'Puna', '', '', 'Gujarat'),
(349, 'Rajkot', '22.31 N', '70.79 E', 'Gujarat'),
(350, 'Ramod', '', '', 'Gujarat'),
(351, 'Ranip', '23.03 N', '72.54 E', 'Gujarat'),
(352, 'Siddhapur', '23.92 N', '72.37 E', 'Gujarat'),
(353, 'Sihor', '21.70 N', '71.97 E', 'Gujarat'),
(354, 'Surat', '21.20 N', '72.82 E', 'Gujarat'),
(355, 'Surendranagar', '22.71 N', '71.67 E', 'Gujarat'),
(356, 'Thaltej', '', '', 'Gujarat'),
(357, 'Una', '20.82 N', '71.03 E', 'Gujarat'),
(358, 'Unjha', '23.81 N', '72.38 E', 'Gujarat'),
(359, 'Upleta', '21.75 N', '70.27 E', 'Gujarat'),
(360, 'Vadodara', '22.31 N', '73.18 E', 'Gujarat'),
(361, 'Valsad', '20.62 N', '72.92 E', 'Gujarat'),
(362, 'Vapi', '20.37 N', '72.90 E', 'Gujarat'),
(363, 'Vastral', '', '', 'Gujarat'),
(364, 'Vejalpur', '', '', 'Gujarat'),
(365, 'Veraval', '20.92 N', '70.34 E', 'Gujarat'),
(366, 'Vijalpor', '', '', 'Gujarat'),
(367, 'Visnagar', '23.71 N', '72.54 E', 'Gujarat'),
(368, 'Wadhwan', '22.73 N', '71.72 E', 'Gujarat'),
(369, 'Ambala', '30.38 N', '76.77 E', 'Haryana'),
(370, 'Ambala Cantonment', '30.39 N', '76.86 E', 'Haryana'),
(371, 'Ambala Sadar', '30.35 N', '76.84 E', 'Haryana'),
(372, 'Bahadurgarh', '28.69 N', '76.92 E', 'Haryana'),
(373, 'Bhiwani', '28.81 N', '76.12 E', 'Haryana'),
(374, 'Charkhi Dadri', '28.60 N', '76.27 E', 'Haryana'),
(375, 'Dabwali', '29.95 N', '74.73 E', 'Haryana'),
(376, 'Faridabad', '28.38 N', '77.30 E', 'Haryana'),
(377, 'Gohana', '29.13 N', '76.70 E', 'Haryana'),
(378, 'Hisar', '29.17 N', '75.72 E', 'Haryana'),
(379, 'Jagadhri', '30.18 N', '77.29 E', 'Haryana'),
(380, 'Jind', '29.31 N', '76.30 E', 'Haryana'),
(381, 'Kaithal', '29.81 N', '76.40 E', 'Haryana'),
(382, 'Karnal', '29.69 N', '76.97 E', 'Haryana'),
(383, 'Narnaul', '28.04 N', '76.10 E', 'Haryana'),
(384, 'Narwana', '29.62 N', '76.12 E', 'Haryana'),
(385, 'Palwal', '28.15 N', '77.32 E', 'Haryana'),
(386, 'Panchkula', '30.70 N', '76.88 E', 'Haryana'),
(387, 'Panipat', '29.39 N', '76.96 E', 'Haryana'),
(388, 'Rewari', '28.19 N', '76.60 E', 'Haryana'),
(389, 'Rohtak', '28.90 N', '76.58 E', 'Haryana'),
(390, 'Sirsa', '29.53 N', '75.03 E', 'Haryana'),
(391, 'Sonipat', '28.99 N', '77.01 E', 'Haryana'),
(392, 'Thanesar', '29.98 N', '76.82 E', 'Haryana'),
(393, 'Tohana', '29.70 N', '75.90 E', 'Haryana'),
(394, 'Yamunanagar', '30.14 N', '77.28 E', 'Haryana'),
(395, 'Shimla', '31.11 N', '77.16 E', 'Himachal Pradesh'),
(396, 'Anantnag', '33.73 N', '75.15 E', 'Jammu and Kashmir'),
(397, 'Baramula', '34.20 N', '74.35 E', 'Jammu and Kashmir'),
(398, 'Bari Brahmana', '', '', 'Jammu and Kashmir'),
(399, 'Jammu', '32.71 N', '74.85 E', 'Jammu and Kashmir'),
(400, 'Kathua', '32.37 N', '75.52 E', 'Jammu and Kashmir'),
(401, 'Sopur', '34.30 N', '74.47 E', 'Jammu and Kashmir'),
(402, 'Srinagar', '34.09 N', '74.79 E', 'Jammu and Kashmir'),
(403, 'Udhampur', '32.93 N', '75.13 E', 'Jammu and Kashmir'),
(404, 'Adityapur', '22.80 N', '86.04 E', 'Jharkhand'),
(405, 'Bagbahra', '22.82 N', '86.20 E', 'Jharkhand'),
(406, 'Bhuli', '23.79 N', '86.38 E', 'Jharkhand'),
(407, 'Bokaro', '23.78 N', '85.96 E', 'Jharkhand'),
(408, 'Chaibasa', '22.56 N', '85.80 E', 'Jharkhand'),
(409, 'Chas', '23.65 N', '86.17 E', 'Jharkhand'),
(410, 'Daltenganj', '24.05 N', '84.06 E', 'Jharkhand'),
(411, 'Devghar', '24.49 N', '86.69 E', 'Jharkhand'),
(412, 'Dhanbad', '23.80 N', '86.42 E', 'Jharkhand'),
(413, 'Hazaribag', '24.01 N', '85.36 E', 'Jharkhand'),
(414, 'Jamshedpur', '22.79 N', '86.20 E', 'Jharkhand'),
(415, 'Jharia', '23.76 N', '86.42 E', 'Jharkhand'),
(416, 'Jhumri Tilaiya', '24.43 N', '85.52 E', 'Jharkhand'),
(417, 'Jorapokhar', '23.79 N', '86.36 E', 'Jharkhand'),
(418, 'Katras', '23.80 N', '86.28 E', 'Jharkhand'),
(419, 'Lohardaga', '23.43 N', '84.68 E', 'Jharkhand'),
(420, 'Mango', '22.85 N', '86.21 E', 'Jharkhand'),
(421, 'Phusro', '23.68 N', '85.86 E', 'Jharkhand'),
(422, 'Ramgarh', '23.63 N', '85.51 E', 'Jharkhand'),
(423, 'Ranchi', '23.36 N', '85.33 E', 'Jharkhand'),
(424, 'Sahibganj', '25.25 N', '87.62 E', 'Jharkhand'),
(425, 'Saunda', '23.64 N', '85.37 E', 'Jharkhand'),
(426, 'Sindari', '23.68 N', '86.49 E', 'Jharkhand'),
(427, 'Bagalkot', '16.19 N', '75.69 E', 'Karnataka'),
(428, 'Bangalore', '12.97 N', '77.56 E', 'Karnataka'),
(429, 'Basavakalyan', '17.87 N', '76.95 E', 'Karnataka'),
(430, 'Belgaum', '15.86 N', '74.50 E', 'Karnataka'),
(431, 'Bellary', '15.14 N', '76.91 E', 'Karnataka'),
(432, 'Bhadravati', '13.84 N', '75.69 E', 'Karnataka'),
(433, 'Bidar', '17.92 N', '77.52 E', 'Karnataka'),
(434, 'Bijapur', '16.83 N', '75.71 E', 'Karnataka'),
(435, 'Bommanahalli', '13.01 N', '77.63 E', 'Karnataka'),
(436, 'Byatarayanapura', '', '', 'Karnataka'),
(437, 'Challakere', '14.32 N', '76.65 E', 'Karnataka'),
(438, 'Chamrajnagar', '11.92 N', '76.95 E', 'Karnataka'),
(439, 'Channapatna', '12.66 N', '77.19 E', 'Karnataka'),
(440, 'Chik Ballapur', '13.47 N', '77.73 E', 'Karnataka'),
(441, 'Chikmagalur', '13.32 N', '75.76 E', 'Karnataka'),
(442, 'Chintamani', '13.40 N', '78.05 E', 'Karnataka'),
(443, 'Chitradurga', '14.23 N', '76.39 E', 'Karnataka'),
(444, 'Dasarahalli', '13.01 N', '77.49 E', 'Karnataka'),
(445, 'Davanagere', '14.46 N', '75.92 E', 'Karnataka'),
(446, 'Dod Ballapur', '13.30 N', '77.52 E', 'Karnataka'),
(447, 'Gadag', '15.44 N', '75.63 E', 'Karnataka'),
(448, 'Gangawati', '15.44 N', '76.52 E', 'Karnataka'),
(449, 'Gokak', '16.18 N', '74.81 E', 'Karnataka'),
(450, 'Gulbarga', '17.34 N', '76.82 E', 'Karnataka'),
(451, 'Harihar', '14.52 N', '75.80 E', 'Karnataka'),
(452, 'Hassan', '13.01 N', '76.08 E', 'Karnataka'),
(453, 'Haveri', '14.80 N', '75.40 E', 'Karnataka'),
(454, 'Hiriyur', '13.97 N', '76.60 E', 'Karnataka'),
(455, 'Hosakote', '', '', 'Karnataka'),
(456, 'Hospet', '15.28 N', '76.37 E', 'Karnataka'),
(457, 'Hubli', '15.36 N', '75.13 E', 'Karnataka'),
(458, 'Ilkal', '15.97 N', '76.13 E', 'Karnataka'),
(459, 'Jamkhandi', '16.51 N', '75.28 E', 'Karnataka'),
(460, 'Kanakapura', '12.54 N', '77.42 E', 'Karnataka'),
(461, 'Karwar', '14.82 N', '74.12 E', 'Karnataka'),
(462, 'Kolar', '13.14 N', '78.13 E', 'Karnataka'),
(463, 'Kollegal', '12.15 N', '77.12 E', 'Karnataka'),
(464, 'Koppal', '15.35 N', '76.15 E', 'Karnataka'),
(465, 'Krishnarajapura', '12.97 N', '77.74 E', 'Karnataka'),
(466, 'Mahadevapura', '', '', 'Karnataka'),
(467, 'Maisuru', '12.31 N', '76.65 E', 'Karnataka'),
(468, 'Mandya', '12.54 N', '76.89 E', 'Karnataka'),
(469, 'Mangaluru', '12.88 N', '74.84 E', 'Karnataka'),
(470, 'Nipani', '16.41 N', '74.38 E', 'Karnataka'),
(471, 'Pattanagere', '', '', 'Karnataka'),
(472, 'Puttur', '12.77 N', '75.22 E', 'Karnataka'),
(473, 'Rabkavi', '16.47 N', '75.11 E', 'Karnataka'),
(474, 'Raichur', '16.21 N', '77.35 E', 'Karnataka'),
(475, 'Ramanagaram', '12.72 N', '77.27 E', 'Karnataka'),
(476, 'Ranibennur', '14.62 N', '75.61 E', 'Karnataka'),
(477, 'Robertsonpet', '12.97 N', '78.28 E', 'Karnataka'),
(478, 'Sagar', '14.17 N', '75.03 E', 'Karnataka'),
(479, 'Shahabad', '17.13 N', '76.93 E', 'Karnataka'),
(480, 'Shahpur', '16.70 N', '76.83 E', 'Karnataka'),
(481, 'Shimoga', '13.93 N', '75.57 E', 'Karnataka'),
(482, 'Shorapur', '16.52 N', '76.75 E', 'Karnataka'),
(483, 'Sidlaghatta', '13.38 N', '77.87 E', 'Karnataka'),
(484, 'Sira', '13.75 N', '76.90 E', 'Karnataka'),
(485, 'Sirsi', '14.62 N', '74.85 E', 'Karnataka'),
(486, 'Tiptur', '13.27 N', '76.48 E', 'Karnataka'),
(487, 'Tumkur', '13.34 N', '77.10 E', 'Karnataka'),
(488, 'Udupi', '13.35 N', '74.75 E', 'Karnataka'),
(489, 'Ullal', '12.80 N', '74.85 E', 'Karnataka'),
(490, 'Yadgir', '16.77 N', '77.13 E', 'Karnataka'),
(491, 'Yelahanka', '13.10 N', '77.60 E', 'Karnataka'),
(492, 'Alappuzha', '9.50 N', '76.33 E', 'Kerala'),
(493, 'Beypur', '11.18 N', '75.82 E', 'Kerala'),
(494, 'Cheruvannur', '11.21 N', '75.84 E', 'Kerala'),
(495, 'Edakkara', '', '', 'Kerala'),
(496, 'Edathala', '10.03 N', '76.32 E', 'Kerala'),
(497, 'Kalamassery', '10.05 N', '76.27 E', 'Kerala'),
(498, 'Kannan Devan Hills', '', '', 'Kerala'),
(499, 'Kannangad', '12.34 N', '75.09 E', 'Kerala'),
(500, 'Kannur', '11.86 N', '75.35 E', 'Kerala'),
(501, 'Kayankulam', '9.17 N', '76.49 E', 'Kerala'),
(502, 'Kochi', '10.02 N', '76.22 E', 'Kerala'),
(503, 'Kollam', '8.89 N', '76.58 E', 'Kerala'),
(504, 'Kottayam', '9.60 N', '76.52 E', 'Kerala'),
(505, 'Koyilandi', '11.43 N', '75.70 E', 'Kerala'),
(506, 'Kozhikkod', '11.26 N', '75.78 E', 'Kerala'),
(507, 'Kunnamkulam', '10.65 N', '76.08 E', 'Kerala'),
(508, 'Malappuram', '11.07 N', '76.06 E', 'Kerala'),
(509, 'Manjeri', '11.12 N', '76.11 E', 'Kerala'),
(510, 'Nedumangad', '8.61 N', '77.00 E', 'Kerala'),
(511, 'Neyyattinkara', '8.40 N', '77.08 E', 'Kerala'),
(512, 'Palakkad', '10.78 N', '76.65 E', 'Kerala'),
(513, 'Pallichal', '', '', 'Kerala'),
(514, 'Payyannur', '12.10 N', '75.19 E', 'Kerala'),
(515, 'Ponnani', '10.78 N', '75.92 E', 'Kerala'),
(516, 'Talipparamba', '12.03 N', '75.36 E', 'Kerala'),
(517, 'Thalassery', '11.75 N', '75.49 E', 'Kerala'),
(518, 'Thiruvananthapuram', '8.51 N', '76.95 E', 'Kerala'),
(519, 'Thrippunithura', '9.94 N', '76.35 E', 'Kerala'),
(520, 'Thrissur', '10.52 N', '76.21 E', 'Kerala'),
(521, 'Tirur', '10.91 N', '75.92 E', 'Kerala'),
(522, 'Tiruvalla', '9.39 N', '76.57 E', 'Kerala'),
(523, 'Vadakara', '11.61 N', '75.58 E', 'Kerala'),
(524, 'Ashoknagar', '24.57 N', '77.72 E', 'Madhya Pradesh'),
(525, 'Balaghat', '21.80 N', '80.18 E', 'Madhya Pradesh'),
(526, 'Basoda', '23.85 N', '77.93 E', 'Madhya Pradesh'),
(527, 'Betul', '21.92 N', '77.90 E', 'Madhya Pradesh'),
(528, 'Bhind', '26.57 N', '78.77 E', 'Madhya Pradesh'),
(529, 'Bhopal', '23.24 N', '77.40 E', 'Madhya Pradesh'),
(530, 'BinaEtawa', '24.20 N', '78.20 E', 'Madhya Pradesh'),
(531, 'Burhanpur', '21.33 N', '76.22 E', 'Madhya Pradesh'),
(532, 'Chhatarpur', '24.92 N', '79.58 E', 'Madhya Pradesh'),
(533, 'Chhindwara', '22.07 N', '78.94 E', 'Madhya Pradesh'),
(534, 'Dabra', '25.90 N', '78.33 E', 'Madhya Pradesh'),
(535, 'Damoh', '23.85 N', '79.44 E', 'Madhya Pradesh'),
(536, 'Datia', '25.67 N', '78.45 E', 'Madhya Pradesh'),
(537, 'Dewas', '22.97 N', '76.05 E', 'Madhya Pradesh'),
(538, 'Dhar', '22.60 N', '75.29 E', 'Madhya Pradesh'),
(539, 'Gohad', '26.43 N', '78.45 E', 'Madhya Pradesh'),
(540, 'Guna', '24.65 N', '77.30 E', 'Madhya Pradesh'),
(541, 'Gwalior', '26.23 N', '78.17 E', 'Madhya Pradesh'),
(542, 'Harda', '22.33 N', '77.11 E', 'Madhya Pradesh'),
(543, 'Hoshangabad', '22.75 N', '77.71 E', 'Madhya Pradesh'),
(544, 'Indore', '22.72 N', '75.86 E', 'Madhya Pradesh'),
(545, 'Itarsi', '22.62 N', '77.76 E', 'Madhya Pradesh'),
(546, 'Jabalpur', '23.17 N', '79.94 E', 'Madhya Pradesh'),
(547, 'Jabalpur Cantonment', '23.16 N', '79.95 E', 'Madhya Pradesh'),
(548, 'Jaora', '23.64 N', '75.11 E', 'Madhya Pradesh'),
(549, 'Khandwa', '21.83 N', '76.35 E', 'Madhya Pradesh'),
(550, 'Khargone', '21.83 N', '75.60 E', 'Madhya Pradesh'),
(551, 'Mandidip', '23.10 N', '77.52 E', 'Madhya Pradesh'),
(552, 'Mandsaur', '24.07 N', '75.07 E', 'Madhya Pradesh'),
(553, 'Mau', '22.56 N', '75.75 E', 'Madhya Pradesh'),
(554, 'Morena', '26.51 N', '77.99 E', 'Madhya Pradesh'),
(555, 'Murwara', '23.85 N', '80.39 E', 'Madhya Pradesh'),
(556, 'Nagda', '23.46 N', '75.42 E', 'Madhya Pradesh'),
(557, 'Nimach', '24.47 N', '74.87 E', 'Madhya Pradesh'),
(558, 'Pithampur', '', '', 'Madhya Pradesh'),
(559, 'Raghogarh', '24.45 N', '77.20 E', 'Madhya Pradesh'),
(560, 'Ratlam', '23.35 N', '75.03 E', 'Madhya Pradesh'),
(561, 'Rewa', '24.53 N', '81.29 E', 'Madhya Pradesh'),
(562, 'Sagar', '23.85 N', '78.75 E', 'Madhya Pradesh'),
(563, 'Sarni', '22.04 N', '78.27 E', 'Madhya Pradesh'),
(564, 'Satna', '24.58 N', '80.83 E', 'Madhya Pradesh'),
(565, 'Sehore', '23.20 N', '77.08 E', 'Madhya Pradesh'),
(566, 'Sendhwa', '21.68 N', '75.10 E', 'Madhya Pradesh'),
(567, 'Seoni', '22.10 N', '79.55 E', 'Madhya Pradesh'),
(568, 'Shahdol', '23.30 N', '81.36 E', 'Madhya Pradesh'),
(569, 'Shajapur', '23.43 N', '76.27 E', 'Madhya Pradesh'),
(570, 'Sheopur', '25.67 N', '76.70 E', 'Madhya Pradesh'),
(571, 'Shivapuri', '25.43 N', '77.65 E', 'Madhya Pradesh'),
(572, 'Sidhi', '24.42 N', '81.88 E', 'Madhya Pradesh'),
(573, 'Singrauli', '23.84 N', '82.27 E', 'Madhya Pradesh'),
(574, 'Tikamgarh', '24.74 N', '78.83 E', 'Madhya Pradesh'),
(575, 'Ujjain', '23.19 N', '75.78 E', 'Madhya Pradesh'),
(576, 'Vidisha', '23.53 N', '77.80 E', 'Madhya Pradesh'),
(577, 'Achalpur', '21.26 N', '77.50 E', 'Maharashtra'),
(578, 'Ahmadnagar', '19.10 N', '74.74 E', 'Maharashtra'),
(579, 'Akola', '20.71 N', '77.00 E', 'Maharashtra'),
(580, 'Akot', '21.10 N', '77.05 E', 'Maharashtra'),
(581, 'Amalner', '21.05 N', '75.06 E', 'Maharashtra'),
(582, 'Ambajogai', '18.73 N', '76.38 E', 'Maharashtra'),
(583, 'Amravati', '20.95 N', '77.76 E', 'Maharashtra'),
(584, 'Anjangaon', '21.16 N', '77.31 E', 'Maharashtra'),
(585, 'Aurangabad', '19.89 N', '75.32 E', 'Maharashtra'),
(586, 'Badlapur', '19.15 N', '73.27 E', 'Maharashtra'),
(587, 'Ballarpur', '19.85 N', '79.35 E', 'Maharashtra'),
(588, 'Baramati', '18.15 N', '74.58 E', 'Maharashtra'),
(589, 'Barsi', '18.24 N', '75.69 E', 'Maharashtra'),
(590, 'Basmat', '19.32 N', '77.17 E', 'Maharashtra'),
(591, 'Bhadravati', '20.11 N', '79.12 E', 'Maharashtra'),
(592, 'Bhandara', '21.18 N', '79.65 E', 'Maharashtra'),
(593, 'Bhiwandi', '19.30 N', '73.05 E', 'Maharashtra'),
(594, 'Bhusawal', '21.05 N', '75.78 E', 'Maharashtra'),
(595, 'Bid', '18.99 N', '75.76 E', 'Maharashtra'),
(596, 'Mumbai', '18.96 N', '72.82 E', 'Maharashtra'),
(597, 'Buldana', '20.54 N', '76.18 E', 'Maharashtra'),
(598, 'Chalisgaon', '20.46 N', '74.99 E', 'Maharashtra'),
(599, 'Chandrapur', '19.96 N', '79.30 E', 'Maharashtra'),
(600, 'Chikhli', '20.35 N', '76.25 E', 'Maharashtra'),
(601, 'Chiplun', '17.53 N', '73.52 E', 'Maharashtra'),
(602, 'Chopda', '21.25 N', '75.28 E', 'Maharashtra'),
(603, 'Dahanu', '19.97 N', '72.73 E', 'Maharashtra'),
(604, 'Deolali', '19.95 N', '73.84 E', 'Maharashtra'),
(605, 'Dhule', '20.90 N', '74.77 E', 'Maharashtra'),
(606, 'Digdoh', '', '', 'Maharashtra'),
(607, 'Diglur', '18.55 N', '77.60 E', 'Maharashtra'),
(608, 'Gadchiroli', '20.17 N', '80.00 E', 'Maharashtra'),
(609, 'Gondiya', '21.47 N', '80.20 E', 'Maharashtra'),
(610, 'Hinganghat', '20.56 N', '78.83 E', 'Maharashtra'),
(611, 'Hingoli', '19.72 N', '77.14 E', 'Maharashtra'),
(612, 'Ichalkaranji', '16.69 N', '74.46 E', 'Maharashtra'),
(613, 'Jalgaon', '21.01 N', '75.56 E', 'Maharashtra'),
(614, 'Jalna', '19.85 N', '75.88 E', 'Maharashtra'),
(615, 'Kalyan', '19.25 N', '73.16 E', 'Maharashtra'),
(616, 'Kamthi', '21.23 N', '79.20 E', 'Maharashtra'),
(617, 'Karanja', '20.48 N', '77.48 E', 'Maharashtra'),
(618, 'Khadki', '18.57 N', '73.83 E', 'Maharashtra'),
(619, 'Khamgaon', '20.70 N', '76.56 E', 'Maharashtra'),
(620, 'Khopoli', '18.78 N', '73.33 E', 'Maharashtra'),
(621, 'Kolhapur', '16.70 N', '74.22 E', 'Maharashtra'),
(622, 'Kopargaon', '19.88 N', '74.48 E', 'Maharashtra'),
(623, 'Latur', '18.41 N', '76.58 E', 'Maharashtra'),
(624, 'Lonavale', '18.75 N', '73.42 E', 'Maharashtra'),
(625, 'Malegaon', '20.56 N', '74.52 E', 'Maharashtra'),
(626, 'Malkapur', '20.90 N', '76.19 E', 'Maharashtra'),
(627, 'Manmad', '20.26 N', '74.43 E', 'Maharashtra'),
(628, 'Mira Bhayandar', '19.29 N', '72.85 E', 'Maharashtra'),
(629, 'Nagpur', '21.16 N', '79.08 E', 'Maharashtra'),
(630, 'Nalasopara', '19.43 N', '72.78 E', 'Maharashtra'),
(631, 'Nanded', '19.17 N', '77.29 E', 'Maharashtra'),
(632, 'Nandurbar', '21.38 N', '74.23 E', 'Maharashtra'),
(633, 'Nashik', '20.01 N', '73.78 E', 'Maharashtra'),
(634, 'Navghar', '19.34 N', '72.90 E', 'Maharashtra'),
(635, 'Navi Mumbai', '19.11 N', '73.06 E', 'Maharashtra'),
(636, 'Navi Mumbai', '19.00 N', '73.10 E', 'Maharashtra'),
(637, 'Osmanabad', '18.17 N', '76.03 E', 'Maharashtra'),
(638, 'Palghar', '19.68 N', '72.75 E', 'Maharashtra'),
(639, 'Pandharpur', '17.68 N', '75.31 E', 'Maharashtra'),
(640, 'Parbhani', '19.27 N', '76.76 E', 'Maharashtra'),
(641, 'Phaltan', '17.98 N', '74.43 E', 'Maharashtra'),
(642, 'Pimpri', '18.62 N', '73.80 E', 'Maharashtra'),
(643, 'Pune', '18.53 N', '73.84 E', 'Maharashtra'),
(644, 'Pune Cantonment', '18.50 N', '73.88 E', 'Maharashtra'),
(645, 'Pusad', '19.91 N', '77.57 E', 'Maharashtra'),
(646, 'Ratnagiri', '17.00 N', '73.29 E', 'Maharashtra'),
(647, 'SangliMiraj', '16.86 N', '74.57 E', 'Maharashtra'),
(648, 'Satara', '17.70 N', '74.00 E', 'Maharashtra'),
(649, 'Shahada', '21.55 N', '74.47 E', 'Maharashtra'),
(650, 'Shegaon', '20.78 N', '76.68 E', 'Maharashtra'),
(651, 'Shirpur', '21.35 N', '74.88 E', 'Maharashtra'),
(652, 'Sholapur', '17.67 N', '75.89 E', 'Maharashtra'),
(653, 'Shrirampur', '19.63 N', '74.64 E', 'Maharashtra'),
(654, 'Sillod', '20.30 N', '75.65 E', 'Maharashtra'),
(655, 'Thana', '19.20 N', '72.97 E', 'Maharashtra'),
(656, 'Udgir', '18.40 N', '77.11 E', 'Maharashtra'),
(657, 'Ulhasnagar', '19.23 N', '73.15 E', 'Maharashtra'),
(658, 'Uran Islampur', '17.05 N', '74.27 E', 'Maharashtra'),
(659, 'Vasai', '19.36 N', '72.80 E', 'Maharashtra'),
(660, 'Virar', '19.47 N', '72.79 E', 'Maharashtra'),
(661, 'Wadi', '', '', 'Maharashtra'),
(662, 'Wani', '20.07 N', '78.95 E', 'Maharashtra'),
(663, 'Wardha', '20.75 N', '78.60 E', 'Maharashtra'),
(664, 'Warud', '21.47 N', '78.27 E', 'Maharashtra'),
(665, 'Washim', '20.10 N', '77.13 E', 'Maharashtra'),
(666, 'Yavatmal', '20.41 N', '78.13 E', 'Maharashtra'),
(667, 'Imphal', '24.79 N', '93.94 E', 'Manipur'),
(668, 'Shillong', '25.57 N', '91.87 E', 'Meghalaya'),
(669, 'Tura', '25.52 N', '90.22 E', 'Meghalaya'),
(670, 'Aizawl', '23.71 N', '92.71 E', 'Mizoram'),
(671, 'Lunglei', '22.88 N', '92.73 E', 'Mizoram'),
(672, 'Dimapur', '25.92 N', '93.73 E', 'Nagaland'),
(673, 'Kohima', '25.67 N', '94.11 E', 'Nagaland'),
(674, 'Wokha', '26.10 N', '94.27 E', 'Nagaland'),
(675, 'Balangir', '20.71 N', '83.50 E', 'Orissa'),
(676, 'Baleshwar', '21.49 N', '86.95 E', 'Orissa'),
(677, 'Barbil', '22.12 N', '85.40 E', 'Orissa'),
(678, 'Bargarh', '21.34 N', '83.61 E', 'Orissa'),
(679, 'Baripada', '21.95 N', '86.73 E', 'Orissa'),
(680, 'Bhadrak', '21.06 N', '86.52 E', 'Orissa'),
(681, 'Bhawanipatna', '19.91 N', '83.17 E', 'Orissa'),
(682, 'Bhubaneswar', '20.27 N', '85.84 E', 'Orissa'),
(683, 'Brahmapur', '19.32 N', '84.80 E', 'Orissa'),
(684, 'Brajrajnagar', '21.82 N', '83.91 E', 'Orissa'),
(685, 'Dhenkanal', '20.67 N', '85.60 E', 'Orissa'),
(686, 'Jaypur', '18.86 N', '82.56 E', 'Orissa'),
(687, 'Jharsuguda', '21.87 N', '84.01 E', 'Orissa'),
(688, 'Kataka', '20.47 N', '85.88 E', 'Orissa'),
(689, 'Kendujhar', '21.63 N', '85.58 E', 'Orissa'),
(690, 'Paradwip', '20.32 N', '86.62 E', 'Orissa'),
(691, 'Puri', '19.81 N', '85.83 E', 'Orissa'),
(692, 'Raurkela', '22.24 N', '84.81 E', 'Orissa'),
(693, 'Raurkela Industrial Township', '', '', 'Orissa'),
(694, 'Rayagada', '19.18 N', '83.41 E', 'Orissa'),
(695, 'Sambalpur', '21.47 N', '83.97 E', 'Orissa'),
(696, 'Sunabeda', '18.69 N', '82.86 E', 'Orissa'),
(697, 'Karaikal', '10.93 N', '79.83 E', 'Pondicherry'),
(698, 'Ozhukarai', '11.94 N', '79.77 E', 'Pondicherry'),
(699, 'Pondicherry', '11.94 N', '79.83 E', 'Pondicherry'),
(700, 'Abohar', '30.14 N', '74.20 E', 'Punjab'),
(701, 'Amritsar', '31.64 N', '74.87 E', 'Punjab'),
(702, 'Barnala', '30.39 N', '75.54 E', 'Punjab'),
(703, 'Batala', '31.82 N', '75.21 E', 'Punjab'),
(704, 'Bathinda', '30.17 N', '74.97 E', 'Punjab'),
(705, 'Dhuri', '30.37 N', '75.87 E', 'Punjab'),
(706, 'Faridkot', '30.68 N', '74.74 E', 'Punjab'),
(707, 'Fazilka', '30.41 N', '74.02 E', 'Punjab'),
(708, 'Firozpur', '30.92 N', '74.61 E', 'Punjab'),
(709, 'Firozpur Cantonment', '30.95 N', '74.60 E', 'Punjab'),
(710, 'Gobindgarh', '30.66 N', '76.31 E', 'Punjab'),
(711, 'Gurdaspur', '32.04 N', '75.40 E', 'Punjab'),
(712, 'Hoshiarpur', '31.53 N', '75.91 E', 'Punjab'),
(713, 'Jagraon', '30.78 N', '75.48 E', 'Punjab'),
(714, 'Jalandhar', '31.33 N', '75.57 E', 'Punjab'),
(715, 'Kapurthala', '31.38 N', '75.38 E', 'Punjab'),
(716, 'Khanna', '30.71 N', '76.21 E', 'Punjab'),
(717, 'Kot Kapura', '30.59 N', '74.80 E', 'Punjab'),
(718, 'Ludhiana', '30.91 N', '75.84 E', 'Punjab'),
(719, 'Malaut', '30.23 N', '74.48 E', 'Punjab'),
(720, 'Maler Kotla', '30.54 N', '75.87 E', 'Punjab'),
(721, 'Mansa', '29.98 N', '75.39 E', 'Punjab'),
(722, 'Moga', '30.82 N', '75.17 E', 'Punjab'),
(723, 'Mohali', '30.78 N', '76.69 E', 'Punjab'),
(724, 'Pathankot', '32.27 N', '75.64 E', 'Punjab'),
(725, 'Patiala', '30.32 N', '76.39 E', 'Punjab'),
(726, 'Phagwara', '31.22 N', '75.76 E', 'Punjab'),
(727, 'Rajpura', '30.48 N', '76.59 E', 'Punjab'),
(728, 'Rupnagar', '30.98 N', '76.52 E', 'Punjab'),
(729, 'Samana', '30.15 N', '76.20 E', 'Punjab'),
(730, 'Sangrur', '30.25 N', '75.84 E', 'Punjab'),
(731, 'Sirhind', '30.65 N', '76.38 E', 'Punjab'),
(732, 'Sunam', '30.13 N', '75.80 E', 'Punjab'),
(733, 'Tarn Taran', '31.45 N', '74.92 E', 'Punjab'),
(734, 'Ajmer', '26.45 N', '74.64 E', 'Rajasthan'),
(735, 'Alwar', '27.56 N', '76.60 E', 'Rajasthan'),
(736, 'Balotra', '25.83 N', '72.23 E', 'Rajasthan'),
(737, 'Banswara', '23.54 N', '74.44 E', 'Rajasthan'),
(738, 'Baran', '25.10 N', '76.51 E', 'Rajasthan'),
(739, 'Bari', '26.65 N', '77.60 E', 'Rajasthan'),
(740, 'Barmer', '25.75 N', '71.39 E', 'Rajasthan'),
(741, 'Beawar', '26.10 N', '74.30 E', 'Rajasthan'),
(742, 'Bharatpur', '27.23 N', '77.49 E', 'Rajasthan'),
(743, 'Bhilwara', '25.35 N', '74.63 E', 'Rajasthan'),
(744, 'Bhiwadi', '', '', 'Rajasthan'),
(745, 'Bikaner', '28.03 N', '73.32 E', 'Rajasthan'),
(746, 'Bundi', '25.45 N', '75.63 E', 'Rajasthan'),
(747, 'Chittaurgarh', '24.89 N', '74.63 E', 'Rajasthan'),
(748, 'Chomun', '27.17 N', '75.72 E', 'Rajasthan'),
(749, 'Churu', '28.31 N', '74.96 E', 'Rajasthan'),
(750, 'Daosa', '26.88 N', '76.33 E', 'Rajasthan'),
(751, 'Dhaulpur', '26.70 N', '77.87 E', 'Rajasthan'),
(752, 'Didwana', '27.39 N', '74.57 E', 'Rajasthan'),
(753, 'Fatehpur', '27.99 N', '74.95 E', 'Rajasthan'),
(754, 'Ganganagar', '29.93 N', '73.86 E', 'Rajasthan'),
(755, 'Gangapur', '26.47 N', '76.72 E', 'Rajasthan'),
(756, 'Hanumangarh', '29.62 N', '74.29 E', 'Rajasthan'),
(757, 'Hindaun', '26.74 N', '77.02 E', 'Rajasthan'),
(758, 'Jaipur', '26.92 N', '75.80 E', 'Rajasthan'),
(759, 'Jaisalmer', '26.92 N', '70.90 E', 'Rajasthan'),
(760, 'Jalor', '25.35 N', '72.62 E', 'Rajasthan'),
(761, 'Jhalawar', '24.60 N', '76.15 E', 'Rajasthan'),
(762, 'Jhunjhunun', '28.13 N', '75.39 E', 'Rajasthan'),
(763, 'Jodhpur', '26.29 N', '73.02 E', 'Rajasthan'),
(764, 'Karauli', '26.50 N', '77.02 E', 'Rajasthan'),
(765, 'Kishangarh', '26.58 N', '74.86 E', 'Rajasthan'),
(766, 'Kota', '25.18 N', '75.83 E', 'Rajasthan'),
(767, 'Kuchaman', '27.15 N', '74.85 E', 'Rajasthan'),
(768, 'Ladnun', '27.64 N', '74.38 E', 'Rajasthan'),
(769, 'Makrana', '27.05 N', '74.72 E', 'Rajasthan'),
(770, 'Nagaur', '27.21 N', '73.73 E', 'Rajasthan'),
(771, 'Nawalgarh', '27.85 N', '75.27 E', 'Rajasthan'),
(772, 'Nimbahera', '24.62 N', '74.68 E', 'Rajasthan'),
(773, 'Nokha', '27.60 N', '73.42 E', 'Rajasthan'),
(774, 'Pali', '25.79 N', '73.32 E', 'Rajasthan'),
(775, 'Rajsamand', '25.07 N', '73.88 E', 'Rajasthan'),
(776, 'Ratangarh', '28.09 N', '74.60 E', 'Rajasthan'),
(777, 'Sardarshahr', '28.45 N', '74.48 E', 'Rajasthan'),
(778, 'Sawai Madhopur', '26.03 N', '76.34 E', 'Rajasthan'),
(779, 'Sikar', '27.61 N', '75.13 E', 'Rajasthan'),
(780, 'Sujangarh', '27.70 N', '74.46 E', 'Rajasthan'),
(781, 'Suratgarh', '29.32 N', '73.90 E', 'Rajasthan'),
(782, 'Tonk', '26.17 N', '75.78 E', 'Rajasthan'),
(783, 'Udaipur', '24.58 N', '73.69 E', 'Rajasthan'),
(784, 'Alandur', '13.03 N', '80.23 E', 'Tamil Nadu'),
(785, 'Ambattur', '13.11 N', '80.17 E', 'Tamil Nadu'),
(786, 'Ambur', '12.80 N', '78.72 E', 'Tamil Nadu'),
(787, 'Arakonam', '13.08 N', '79.67 E', 'Tamil Nadu'),
(788, 'Arani', '12.68 N', '79.28 E', 'Tamil Nadu'),
(789, 'Aruppukkottai', '9.51 N', '78.09 E', 'Tamil Nadu'),
(790, 'Attur', '11.60 N', '78.60 E', 'Tamil Nadu'),
(791, 'Avadi', '13.12 N', '80.11 E', 'Tamil Nadu'),
(792, 'Avaniapuram', '9.86 N', '78.12 E', 'Tamil Nadu'),
(793, 'Bodinayakkanur', '10.01 N', '77.35 E', 'Tamil Nadu'),
(794, 'Chengalpattu', '12.70 N', '79.97 E', 'Tamil Nadu'),
(795, 'Dharapuram', '10.74 N', '77.52 E', 'Tamil Nadu'),
(796, 'Dharmapuri', '12.13 N', '78.16 E', 'Tamil Nadu'),
(797, 'Dindigul', '10.36 N', '77.97 E', 'Tamil Nadu'),
(798, 'Erode', '11.35 N', '77.73 E', 'Tamil Nadu'),
(799, 'Gopichettipalaiyam', '11.46 N', '77.43 E', 'Tamil Nadu'),
(800, 'Gudalur', '11.76 N', '79.75 E', 'Tamil Nadu'),
(801, 'Gudiyattam', '12.95 N', '78.86 E', 'Tamil Nadu'),
(802, 'Hosur', '12.72 N', '77.82 E', 'Tamil Nadu'),
(803, 'Idappadi', '11.58 N', '77.85 E', 'Tamil Nadu'),
(804, 'Kadayanallur', '9.08 N', '77.35 E', 'Tamil Nadu'),
(805, 'Kambam', '9.74 N', '77.28 E', 'Tamil Nadu'),
(806, 'Kanchipuram', '12.84 N', '79.70 E', 'Tamil Nadu'),
(807, 'Karur', '10.96 N', '78.07 E', 'Tamil Nadu'),
(808, 'Kavundampalaiyam', '11.05 N', '76.92 E', 'Tamil Nadu'),
(809, 'Kovilpatti', '9.19 N', '77.86 E', 'Tamil Nadu'),
(810, 'Koyampattur', '11.01 N', '76.96 E', 'Tamil Nadu'),
(811, 'Krishnagiri', '12.54 N', '78.21 E', 'Tamil Nadu'),
(812, 'Kumarapalaiyam', '11.44 N', '77.73 E', 'Tamil Nadu'),
(813, 'Kumbakonam', '10.97 N', '79.38 E', 'Tamil Nadu'),
(814, 'Kuniyamuthur', '10.98 N', '76.95 E', 'Tamil Nadu'),
(815, 'Kurichi', '10.92 N', '76.96 E', 'Tamil Nadu'),
(816, 'Madhavaram', '13.02 N', '80.26 E', 'Tamil Nadu'),
(817, 'Madras', '13.09 N', '80.27 E', 'Tamil Nadu'),
(818, 'Madurai', '9.92 N', '78.12 E', 'Tamil Nadu'),
(819, 'Maduravoyal', '', '', 'Tamil Nadu'),
(820, 'Mannargudi', '10.67 N', '79.45 E', 'Tamil Nadu'),
(821, 'Mayiladuthurai', '11.11 N', '79.65 E', 'Tamil Nadu'),
(822, 'Mettupalayam', '11.30 N', '76.94 E', 'Tamil Nadu'),
(823, 'Mettur', '11.80 N', '77.80 E', 'Tamil Nadu'),
(824, 'Nagapattinam', '10.80 N', '79.84 E', 'Tamil Nadu'),
(825, 'Nagercoil', '8.18 N', '77.43 E', 'Tamil Nadu'),
(826, 'Namakkal', '11.23 N', '78.17 E', 'Tamil Nadu'),
(827, 'Nerkunram', '13.04 N', '80.26 E', 'Tamil Nadu'),
(828, 'Neyveli', '11.62 N', '79.48 E', 'Tamil Nadu'),
(829, 'Pallavaram', '12.99 N', '80.16 E', 'Tamil Nadu'),
(830, 'Pammal', '12.97 N', '80.11 E', 'Tamil Nadu'),
(831, 'Pannuratti', '11.78 N', '79.55 E', 'Tamil Nadu'),
(832, 'Paramakkudi', '9.54 N', '78.59 E', 'Tamil Nadu'),
(833, 'Pattukkottai', '10.43 N', '79.31 E', 'Tamil Nadu'),
(834, 'Pollachi', '10.67 N', '77.00 E', 'Tamil Nadu'),
(835, 'Pudukkottai', '10.39 N', '78.82 E', 'Tamil Nadu'),
(836, 'Puliyankudi', '9.18 N', '77.40 E', 'Tamil Nadu'),
(837, 'Punamalli', '13.05 N', '80.11 E', 'Tamil Nadu'),
(838, 'Rajapalaiyam', '9.46 N', '77.55 E', 'Tamil Nadu'),
(839, 'Ramanathapuram', '9.37 N', '78.83 E', 'Tamil Nadu'),
(840, 'Salem', '11.67 N', '78.16 E', 'Tamil Nadu'),
(841, 'Sankarankoil', '9.17 N', '77.54 E', 'Tamil Nadu'),
(842, 'Sivakasi', '9.46 N', '77.79 E', 'Tamil Nadu'),
(843, 'Srivilliputtur', '9.52 N', '77.63 E', 'Tamil Nadu'),
(844, 'Tambaram', '12.93 N', '80.12 E', 'Tamil Nadu'),
(845, 'Tenkasi', '8.96 N', '77.31 E', 'Tamil Nadu'),
(846, 'Thanjavur', '10.79 N', '79.13 E', 'Tamil Nadu'),
(847, 'Theni Allinagaram', '10.02 N', '77.48 E', 'Tamil Nadu'),
(848, 'Thiruthangal', '9.48 N', '77.83 E', 'Tamil Nadu'),
(849, 'Thiruvarur', '10.78 N', '79.64 E', 'Tamil Nadu'),
(850, 'Thuthukkudi', '8.81 N', '78.14 E', 'Tamil Nadu'),
(851, 'Tindivanam', '12.24 N', '79.65 E', 'Tamil Nadu'),
(852, 'Tiruchchirappalli', '10.81 N', '78.69 E', 'Tamil Nadu'),
(853, 'Tiruchengode', '11.38 N', '77.90 E', 'Tamil Nadu'),
(854, 'Tirunelveli', '8.73 N', '77.69 E', 'Tamil Nadu'),
(855, 'Tirupathur', '12.50 N', '78.57 E', 'Tamil Nadu'),
(856, 'Tiruppur', '11.09 N', '77.35 E', 'Tamil Nadu'),
(857, 'Tiruvannamalai', '12.24 N', '79.07 E', 'Tamil Nadu'),
(858, 'Tiruvottiyur', '13.16 N', '80.29 E', 'Tamil Nadu'),
(859, 'Udagamandalam', '11.42 N', '76.69 E', 'Tamil Nadu'),
(860, 'Udumalaipettai', '10.58 N', '77.24 E', 'Tamil Nadu'),
(861, 'Valparai', '10.38 N', '76.99 E', 'Tamil Nadu'),
(862, 'Vaniyambadi', '12.69 N', '78.60 E', 'Tamil Nadu'),
(863, 'Velampalaiyam', '', '', 'Tamil Nadu'),
(864, 'Velluru', '12.92 N', '79.13 E', 'Tamil Nadu'),
(865, 'Viluppuram', '11.95 N', '79.49 E', 'Tamil Nadu'),
(866, 'Virappanchatram', '11.40 N', '77.70 E', 'Tamil Nadu'),
(867, 'Virudhachalam', '11.51 N', '79.32 E', 'Tamil Nadu'),
(868, 'Virudunagar', '9.59 N', '77.95 E', 'Tamil Nadu'),
(869, 'Agartala', '23.84 N', '91.27 E', 'Tripura'),
(870, 'Agartala MCl', '', '', 'Tripura'),
(871, 'Badharghat', '', '', 'Tripura'),
(872, 'Agra', '27.19 N', '78.01 E', 'Uttar Pradesh'),
(873, 'Aligarh', '27.89 N', '78.06 E', 'Uttar Pradesh'),
(874, 'Allahabad', '25.45 N', '81.84 E', 'Uttar Pradesh'),
(875, 'Amroha', '28.91 N', '78.46 E', 'Uttar Pradesh'),
(876, 'Aonla', '28.28 N', '79.15 E', 'Uttar Pradesh'),
(877, 'Auraiya', '26.47 N', '79.50 E', 'Uttar Pradesh'),
(878, 'Ayodhya', '26.80 N', '82.20 E', 'Uttar Pradesh'),
(879, 'Azamgarh', '26.07 N', '83.18 E', 'Uttar Pradesh'),
(880, 'Baheri', '28.78 N', '79.50 E', 'Uttar Pradesh'),
(881, 'Bahraich', '27.58 N', '81.59 E', 'Uttar Pradesh'),
(882, 'Ballia', '25.76 N', '84.15 E', 'Uttar Pradesh'),
(883, 'Balrampur', '27.43 N', '82.18 E', 'Uttar Pradesh'),
(884, 'Banda', '25.48 N', '80.33 E', 'Uttar Pradesh'),
(885, 'Baraut', '29.10 N', '77.26 E', 'Uttar Pradesh'),
(886, 'Bareli', '28.36 N', '79.41 E', 'Uttar Pradesh'),
(887, 'Basti', '26.80 N', '82.74 E', 'Uttar Pradesh'),
(888, 'Behta Hajipur', '', '', 'Uttar Pradesh'),
(889, 'Bela', '25.92 N', '81.99 E', 'Uttar Pradesh'),
(890, 'Bhadohi', '25.40 N', '82.56 E', 'Uttar Pradesh'),
(891, 'Bijnor', '29.38 N', '78.13 E', 'Uttar Pradesh'),
(892, 'Bisalpur', '28.30 N', '79.80 E', 'Uttar Pradesh'),
(893, 'Biswan', '27.50 N', '81.00 E', 'Uttar Pradesh'),
(894, 'Budaun', '28.04 N', '79.12 E', 'Uttar Pradesh'),
(895, 'Bulandshahr', '28.41 N', '77.85 E', 'Uttar Pradesh'),
(896, 'Chandausi', '28.46 N', '78.78 E', 'Uttar Pradesh'),
(897, 'Chandpur', '29.14 N', '78.27 E', 'Uttar Pradesh'),
(898, 'Chhibramau', '27.15 N', '79.52 E', 'Uttar Pradesh'),
(899, 'Chitrakut Dham', '25.20 N', '80.84 E', 'Uttar Pradesh'),
(900, 'Dadri', '28.57 N', '77.55 E', 'Uttar Pradesh'),
(901, 'Deoband', '29.70 N', '77.67 E', 'Uttar Pradesh'),
(902, 'Deoria', '26.51 N', '83.78 E', 'Uttar Pradesh'),
(903, 'Etah', '27.57 N', '78.64 E', 'Uttar Pradesh'),
(904, 'Etawah', '26.78 N', '79.01 E', 'Uttar Pradesh'),
(905, 'Faizabad', '26.78 N', '82.14 E', 'Uttar Pradesh'),
(906, 'Faridpur', '28.22 N', '79.53 E', 'Uttar Pradesh'),
(907, 'Farrukhabad', '27.40 N', '79.57 E', 'Uttar Pradesh'),
(908, 'Fatehpur', '25.93 N', '80.81 E', 'Uttar Pradesh'),
(909, 'Firozabad', '27.15 N', '78.39 E', 'Uttar Pradesh'),
(910, 'Gajraula', '28.85 N', '78.23 E', 'Uttar Pradesh'),
(911, 'Ganga Ghat', '26.52 N', '80.45 E', 'Uttar Pradesh'),
(912, 'Gangoh', '29.77 N', '77.25 E', 'Uttar Pradesh'),
(913, 'Ghaziabad', '28.66 N', '77.41 E', 'Uttar Pradesh'),
(914, 'Ghazipur', '25.59 N', '83.59 E', 'Uttar Pradesh'),
(915, 'Gola Gokarannath', '28.08 N', '80.47 E', 'Uttar Pradesh'),
(916, 'Gonda', '27.14 N', '81.95 E', 'Uttar Pradesh'),
(917, 'Gorakhpur', '26.76 N', '83.36 E', 'Uttar Pradesh'),
(918, 'Hapur', '28.73 N', '77.77 E', 'Uttar Pradesh'),
(919, 'Hardoi', '27.42 N', '80.12 E', 'Uttar Pradesh'),
(920, 'Hasanpur', '28.72 N', '78.28 E', 'Uttar Pradesh'),
(921, 'Hathras', '27.60 N', '78.04 E', 'Uttar Pradesh'),
(922, 'Jahangirabad', '28.42 N', '78.10 E', 'Uttar Pradesh'),
(923, 'Jalaun', '26.15 N', '79.35 E', 'Uttar Pradesh'),
(924, 'Jaunpur', '25.76 N', '82.69 E', 'Uttar Pradesh'),
(925, 'Jhansi', '25.45 N', '78.56 E', 'Uttar Pradesh'),
(926, 'Kadi', '23.31 N', '72.33 E', 'Uttar Pradesh'),
(927, 'Kairana', '29.40 N', '77.20 E', 'Uttar Pradesh'),
(928, 'Kannauj', '27.06 N', '79.91 E', 'Uttar Pradesh'),
(929, 'Kanpur', '26.47 N', '80.33 E', 'Uttar Pradesh'),
(930, 'Kanpur Cantonment', '26.50 N', '80.28 E', 'Uttar Pradesh'),
(931, 'Kasganj', '27.81 N', '78.63 E', 'Uttar Pradesh'),
(932, 'Khatauli', '29.28 N', '77.72 E', 'Uttar Pradesh'),
(933, 'Khora', '', '', 'Uttar Pradesh'),
(934, 'Khurja', '28.26 N', '77.85 E', 'Uttar Pradesh'),
(935, 'Kiratpur', '29.52 N', '78.20 E', 'Uttar Pradesh'),
(936, 'Kosi Kalan', '27.80 N', '77.44 E', 'Uttar Pradesh'),
(937, 'Laharpur', '27.72 N', '80.90 E', 'Uttar Pradesh'),
(938, 'Lakhimpur', '27.95 N', '80.78 E', 'Uttar Pradesh'),
(939, 'Lakhnau', '26.85 N', '80.92 E', 'Uttar Pradesh'),
(940, 'Lakhnau Cantonment', '26.81 N', '80.97 E', 'Uttar Pradesh'),
(941, 'Lalitpur', '24.70 N', '78.41 E', 'Uttar Pradesh'),
(942, 'Loni', '28.75 N', '77.28 E', 'Uttar Pradesh'),
(943, 'Mahoba', '25.30 N', '79.87 E', 'Uttar Pradesh'),
(944, 'Mainpuri', '27.24 N', '79.02 E', 'Uttar Pradesh'),
(945, 'Mathura', '27.50 N', '77.68 E', 'Uttar Pradesh'),
(946, 'Mau', '25.96 N', '83.56 E', 'Uttar Pradesh'),
(947, 'Mauranipur', '25.24 N', '79.13 E', 'Uttar Pradesh'),
(948, 'Mawana', '29.11 N', '77.91 E', 'Uttar Pradesh'),
(949, 'Mirat', '28.99 N', '77.70 E', 'Uttar Pradesh'),
(950, 'Mirat Cantonment', '29.02 N', '77.67 E', 'Uttar Pradesh'),
(951, 'Mirzapur', '25.16 N', '82.56 E', 'Uttar Pradesh'),
(952, 'Modinagar', '28.92 N', '77.62 E', 'Uttar Pradesh'),
(953, 'Moradabad', '28.84 N', '78.76 E', 'Uttar Pradesh'),
(954, 'Mubarakpur', '26.09 N', '83.28 E', 'Uttar Pradesh'),
(955, 'Mughal Sarai', '25.30 N', '83.12 E', 'Uttar Pradesh'),
(956, 'Muradnagar', '28.78 N', '77.50 E', 'Uttar Pradesh');
INSERT INTO `mst_tbl_city_lag_alt` (`id`, `city`, `latitude`, `longitude`, `state`) VALUES
(957, 'Muzaffarnagar', '29.48 N', '77.69 E', 'Uttar Pradesh'),
(958, 'Nagina', '29.45 N', '78.43 E', 'Uttar Pradesh'),
(959, 'Najibabad', '29.62 N', '78.33 E', 'Uttar Pradesh'),
(960, 'Nawabganj', '26.94 N', '81.19 E', 'Uttar Pradesh'),
(961, 'Noida', '28.58 N', '77.33 E', 'Uttar Pradesh'),
(962, 'Obra', '24.42 N', '82.98 E', 'Uttar Pradesh'),
(963, 'Orai', '25.99 N', '79.45 E', 'Uttar Pradesh'),
(964, 'Pilibhit', '28.64 N', '79.81 E', 'Uttar Pradesh'),
(965, 'Pilkhuwa', '28.72 N', '77.65 E', 'Uttar Pradesh'),
(966, 'Rae Bareli', '26.23 N', '81.23 E', 'Uttar Pradesh'),
(967, 'Ramgarh Nagla Kothi', '', '', 'Uttar Pradesh'),
(968, 'Rampur', '28.82 N', '79.02 E', 'Uttar Pradesh'),
(969, 'Rath', '25.58 N', '79.57 E', 'Uttar Pradesh'),
(970, 'Renukut', '24.20 N', '83.03 E', 'Uttar Pradesh'),
(971, 'Saharanpur', '29.97 N', '77.54 E', 'Uttar Pradesh'),
(972, 'Sahaswan', '28.08 N', '78.74 E', 'Uttar Pradesh'),
(973, 'Sambhal', '28.59 N', '78.56 E', 'Uttar Pradesh'),
(974, 'Sandila', '27.08 N', '80.52 E', 'Uttar Pradesh'),
(975, 'Shahabad', '27.65 N', '79.95 E', 'Uttar Pradesh'),
(976, 'Shahjahanpur', '27.88 N', '79.90 E', 'Uttar Pradesh'),
(977, 'Shamli', '29.46 N', '77.31 E', 'Uttar Pradesh'),
(978, 'Sherkot', '29.35 N', '78.58 E', 'Uttar Pradesh'),
(979, 'Shikohabad', '27.12 N', '78.58 E', 'Uttar Pradesh'),
(980, 'Sikandarabad', '28.44 N', '77.69 E', 'Uttar Pradesh'),
(981, 'Sitapur', '27.57 N', '80.69 E', 'Uttar Pradesh'),
(982, 'Sukhmalpur Nizamabad', '', '', 'Uttar Pradesh'),
(983, 'Sultanpur', '26.26 N', '82.06 E', 'Uttar Pradesh'),
(984, 'Tanda', '26.55 N', '82.65 E', 'Uttar Pradesh'),
(985, 'Tilhar', '27.98 N', '79.73 E', 'Uttar Pradesh'),
(986, 'Tundla', '27.20 N', '78.28 E', 'Uttar Pradesh'),
(987, 'Ujhani', '28.02 N', '79.02 E', 'Uttar Pradesh'),
(988, 'Unnao', '26.55 N', '80.49 E', 'Uttar Pradesh'),
(989, 'Varanasi', '25.32 N', '83.01 E', 'Uttar Pradesh'),
(990, 'Vrindavan', '27.58 N', '77.70 E', 'Uttar Pradesh'),
(991, 'Dehra Dun', '30.34 N', '78.05 E', 'Uttaranchal'),
(992, 'Dehra Dun Cantonment', '30.34 N', '77.97 E', 'Uttaranchal'),
(993, 'Gola Range', '', '', 'Uttaranchal'),
(994, 'Haldwani', '29.23 N', '79.52 E', 'Uttaranchal'),
(995, 'Haridwar', '29.98 N', '78.16 E', 'Uttaranchal'),
(996, 'Kashipur', '29.22 N', '78.96 E', 'Uttaranchal'),
(997, 'Pithoragarh', '29.58 N', '80.22 E', 'Uttaranchal'),
(998, 'Rishikesh', '30.12 N', '78.29 E', 'Uttaranchal'),
(999, 'Rudrapur', '', '', 'Uttaranchal'),
(1000, 'Rurki', '29.87 N', '77.89 E', 'Uttaranchal');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_home_equipment`
--

CREATE TABLE `mst_tbl_home_equipment` (
  `home_eq_id` int(11) NOT NULL,
  `eq_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eq_lenght` double(8,2) DEFAULT NULL,
  `eq_width` double(8,2) DEFAULT NULL,
  `eq_height` double(8,2) DEFAULT NULL,
  `eq_sq_feet` double(8,2) DEFAULT NULL,
  `eq_cft` double(8,2) NOT NULL,
  `eq_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_home_equipment`
--

INSERT INTO `mst_tbl_home_equipment` (`home_eq_id`, `eq_name`, `eq_lenght`, `eq_width`, `eq_height`, `eq_sq_feet`, `eq_cft`, `eq_type`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Study Table', 0.00, 0.00, 0.00, 0.00, 25.64, 'b', 1, 63, 63, '2019-11-08 07:19:50', '2019-11-08 12:49:50'),
(2, 'Small Almari', 0.00, 0.00, 0.00, 0.00, 23.66, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(3, 'Plastic Drum', 0.00, 0.00, 0.00, 0.00, 13.50, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(4, 'Rajarani Almari', 0.00, 0.00, 0.00, 0.00, 50.12, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(5, 'Shilai Machine', 3.00, 2.50, 2.41, 18.08, 18.08, 'b', 0, 63, 1, '2019-11-08 07:26:49', '2019-11-08 12:56:49'),
(6, 'Study Table', 0.00, 0.00, 0.00, 0.00, 10.84, 'b', 1, 63, 63, '2019-11-08 07:19:35', '2019-11-08 12:49:35'),
(7, 'Small Frame', 0.00, 0.00, 0.00, 0.00, 0.00, 'b', 0, 63, 1, '2019-11-08 07:35:02', '2019-11-08 13:05:02'),
(8, 'Steel Almari 2 Door', 0.00, 0.00, 0.00, 0.00, 26.25, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(9, 'Steel Almari 3 Door', 0.00, 0.00, 0.00, 0.00, 56.98, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(10, 'Wodden Almari 2 Door', 0.00, 0.00, 0.00, 0.00, 26.25, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(11, '3 Door Almari Folding', 0.00, 0.00, 0.00, 0.00, 39.48, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(12, '3 Door Almari Wooden Unfolding', 0.00, 0.00, 0.00, 0.00, 51.81, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(13, '3 Door 3 Part Almari', 0.00, 0.00, 0.00, 0.00, 52.64, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(14, '4 Door Almari Folding', 0.00, 0.00, 0.00, 0.00, 52.64, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(15, '5 Door Almari Folding', 0.00, 0.00, 0.00, 0.00, 84.35, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(16, 'Small Steel Almari', 0.00, 0.00, 0.00, 0.00, 15.75, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(17, 'Small Wooden Almari', 0.00, 0.00, 0.00, 0.00, 16.75, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(18, 'Rajarani Steel Almari', 0.00, 0.00, 0.00, 0.00, 50.12, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(19, 'Pots Small', 0.00, 0.00, 0.00, 0.00, 1.34, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(20, 'Washing Machine', 0.00, 0.00, 0.00, 0.00, 17.42, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(21, 'Exercise Cycle', 0.00, 0.00, 0.00, 0.00, 46.86, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(22, 'AC Spleet', 0.00, 0.00, 0.00, 0.00, 3.66, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(23, '3 Door Almari Wooden Not dismantle', 0.00, 0.00, 0.00, 0.00, 51.81, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(24, 'Suitcase Bag', 0.00, 0.00, 0.00, 0.00, 0.00, 'b', 0, 63, 1, '2019-11-08 07:42:06', '2019-11-08 13:12:06'),
(25, 'Mattress', 0.00, 0.00, 0.00, 0.00, 13.58, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(26, 'Double Bed Dissmental Wodden', 0.00, 0.00, 0.00, 0.00, 25.48, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(27, 'Single Bed', 0.00, 0.00, 0.00, 0.00, 15.44, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(28, 'Small Table', 0.00, 0.00, 0.00, 0.00, 18.00, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(29, 'Printer', 0.00, 0.00, 0.00, 0.00, 1.63, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(30, 'Inverter Battery', 0.00, 0.00, 0.00, 0.00, 2.50, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(31, 'Inverter', 0.00, 0.00, 0.00, 0.00, 1.28, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(32, 'Geyser', 0.00, 0.00, 0.00, 0.00, 1.16, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(33, 'Shidi Big', 0.00, 0.00, 0.00, 0.00, 3.37, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(34, 'Bike', 0.00, 0.00, 0.00, 0.00, 48.00, 'b', 1, 63, 63, '2019-11-11 11:26:50', '2019-11-11 16:56:50'),
(35, 'Cloth Stand', 0.00, 0.00, 0.00, 0.00, 3.32, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(36, 'Bucket', 0.00, 0.00, 0.00, 0.00, 3.32, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(37, 'Hand Bag', 0.00, 0.00, 0.00, 0.00, 2.33, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(38, 'Corner Piece', 0.00, 0.00, 0.00, 0.00, 1.56, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(39, 'Book Shelf Big', 0.00, 0.00, 0.00, 0.00, 32.25, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(40, 'Almari 4 Door No Dismentale', 0.00, 0.00, 0.00, 0.00, 163.00, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(41, 'Almari 5 Door No dismantle', 0.00, 0.00, 0.00, 0.00, 201.00, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(42, 'Window AC', 0.00, 0.00, 0.00, 0.00, 14.46, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(43, 'Diwan Box Bed', 0.00, 0.00, 0.00, 0.00, 30.89, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(44, 'Double Box Bed', 0.00, 0.00, 0.00, 0.00, 51.28, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(45, 'Double Folding Bed', 0.00, 0.00, 0.00, 0.00, 38.46, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(46, 'Single Box Bed', 0.00, 0.00, 0.00, 0.00, 30.89, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(47, 'Double Still Bed', 0.00, 0.00, 0.00, 0.00, 25.64, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(48, 'Diwan Folding Bed', 0.00, 0.00, 0.00, 0.00, 25.35, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(49, 'Indian Sethi', 0.00, 0.00, 0.00, 0.00, 15.66, 'b', 1, 63, 63, '2019-11-12 06:06:38', '2019-11-12 11:36:38'),
(50, 'Gadhi', 0.00, 0.00, 0.00, 0.00, 13.36, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(51, 'Cooler', 0.00, 0.00, 0.00, 0.00, 6.56, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(52, 'Computer', 0.00, 0.00, 0.00, 0.00, 9.45, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(53, 'Side Corner', 0.00, 0.00, 0.00, 0.00, 2.80, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(54, 'Been Bag', 0.00, 0.00, 0.00, 0.00, 27.00, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(55, 'Flower Pots Big', 0.00, 0.00, 0.00, 0.00, 8.00, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(56, 'AC Box', 0.00, 0.00, 0.00, 0.00, 10.19, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(57, 'Kids Bed', 0.00, 0.00, 0.00, 0.00, 30.00, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(58, 'Wheel Chair', 0.00, 0.00, 0.00, 0.00, 15.46, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(59, 'Office Table', 0.00, 0.00, 0.00, 0.00, 21.28, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(60, 'Carret Box', 0.00, 0.00, 0.00, 0.00, 3.75, 'b', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(61, 'Small Temple', 0.00, 0.00, 0.00, 0.00, 2.00, 'l', 0, 63, 63, '2019-11-04 09:55:37', '2019-11-04 04:37:41'),
(62, 'Marble Temple', 0.00, 0.00, 0.00, 0.00, 12.00, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(63, 'Plastic Chair', 0.00, 0.00, 0.00, 0.00, 12.24, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(64, 'Small Almari', 0.00, 0.00, 0.00, 0.00, 23.66, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(65, 'Center Table', 0.00, 0.00, 0.00, 0.00, 7.60, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(66, 'Study Table', 0.00, 0.00, 0.00, 0.00, 10.84, 'l', 1, 63, 63, '2019-11-08 07:20:12', '2019-11-08 12:50:12'),
(67, 'Big Temple', 0.00, 0.00, 0.00, 0.00, 13.32, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(68, 'Big Frame', 5.00, 0.50, 3.00, 7.50, 7.50, 'l', 0, 63, 1, '2019-11-08 07:37:13', '2019-11-08 13:07:13'),
(69, 'Shoe Rack', 0.00, 0.00, 0.00, 0.00, 6.86, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(70, 'T.V Table Long', 0.00, 0.00, 0.00, 0.00, 23.70, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(71, 'TV Table Small', 0.00, 0.00, 0.00, 0.00, 9.82, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(72, 'Show Case 2 Part', 0.00, 0.00, 0.00, 0.00, 46.92, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(73, 'Stul Small', 0.00, 0.00, 0.00, 0.00, 4.35, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(74, 'Fish Tank Small', 0.00, 0.00, 0.00, 0.00, 5.58, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(75, 'Pots Small', 0.00, 0.00, 0.00, 0.00, 1.34, 'l', 1, 63, 63, '2020-02-07 06:26:49', '2020-02-07 11:56:49'),
(76, 'Exercise Cycle', 0.00, 0.00, 0.00, 0.00, 46.86, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(77, 'AC Spleet', 0.00, 0.00, 0.00, 0.00, 3.66, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(78, 'TV Table Normal', 0.00, 0.00, 0.00, 0.00, 12.00, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(79, 'Flower Pots Big', 0.00, 0.00, 0.00, 0.00, 8.00, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(80, 'Flower Pots Small', 0.00, 0.00, 0.00, 0.00, 2.50, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(81, 'Fan', 0.00, 0.00, 0.00, 0.00, 2.82, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(82, 'Music System Small', 0.00, 0.00, 0.00, 0.00, 2.30, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(83, 'Zopala Not Dismantle', 5.00, 2.60, 8.00, 104.00, 104.00, 'l', 0, 63, 1, '2020-01-27 11:50:38', '2020-01-27 17:20:38'),
(84, 'Cycle', 0.00, 0.00, 0.00, 0.00, 21.84, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(85, 'Sofa cum Bed', 0.00, 0.00, 0.00, 0.00, 68.00, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(86, 'Sofa 3 Seater Wooden', 0.00, 0.00, 0.00, 0.00, 48.75, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(87, 'Sofa 1 Seater Wooden', 0.00, 0.00, 0.00, 0.00, 18.56, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(88, 'Sofa 3 Seater Kushan', 7.00, 2.60, 3.00, 54.60, 54.60, 'l', 0, 63, 1, '2020-02-07 06:19:03', '2020-02-07 11:49:03'),
(89, 'Sofa 1 Seater Kushan', 2.60, 2.60, 3.00, 20.28, 20.28, 'l', 0, 63, 1, '2020-02-07 06:20:37', '2020-02-07 11:50:37'),
(90, 'Sofa 2 Seater Kushan', 5.00, 2.66, 3.00, 39.90, 39.90, 'l', 0, 63, 1, '2020-02-07 06:18:30', '2020-02-07 11:48:30'),
(91, 'Sofa 3 Seater Leather', 0.00, 0.00, 0.00, 0.00, 66.69, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(92, 'Sofa 1 Seater Leather', 0.00, 0.00, 0.00, 0.00, 29.97, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(93, 'Sofa 2 Seater Leather', 0.00, 0.00, 0.00, 0.00, 42.75, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(94, 'Sofa 3 Seater Bambu', 0.00, 0.00, 0.00, 0.00, 25.00, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(95, 'Sofa 1 Seater Bambu', 0.00, 0.00, 0.00, 0.00, 13.18, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(96, 'Sofa 3 Seater Steel', 0.00, 0.00, 0.00, 0.00, 26.29, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(97, 'Sofa 1 Seater Steel', 0.00, 0.00, 0.00, 0.00, 13.20, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(98, 'T.V Show case 2 Part', 0.00, 0.00, 0.00, 0.00, 77.00, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(99, 'Carret Box', 0.00, 0.00, 0.00, 0.00, 3.75, 'l', 0, 63, 63, '2019-11-04 09:56:17', '2019-11-04 04:37:41'),
(100, 'Small Temple', 0.00, 0.00, 0.00, 0.00, 2.00, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(101, 'Marble Temple', 0.00, 0.00, 0.00, 0.00, 12.00, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(102, 'Water Purifier', 0.00, 0.00, 0.00, 0.00, 2.71, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(103, 'Gas Stove', 0.00, 0.00, 0.00, 0.00, 1.00, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(104, 'Plastic Drum', 0.00, 0.00, 0.00, 0.00, 13.50, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(105, 'Cylinder', 0.00, 0.00, 0.00, 0.00, 3.87, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(106, 'Kitchen Rack 1', 0.00, 0.00, 0.00, 0.00, 21.06, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(107, 'Steel Drum', 0.00, 0.00, 0.00, 0.00, 9.18, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(108, 'Steel Trunk', 0.00, 0.00, 0.00, 0.00, 3.49, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(109, 'Small Rack', 0.00, 0.00, 0.00, 0.00, 6.21, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(110, 'Single Door Fridge', 0.00, 0.00, 0.00, 0.00, 19.82, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(111, 'Steel Trunk Big', 0.00, 0.00, 0.00, 0.00, 4.42, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(112, 'Stul Small', 0.00, 0.00, 0.00, 0.00, 4.35, 'k', 1, 63, 63, '2019-11-08 07:20:00', '2019-11-08 12:50:00'),
(113, 'Washing Machine', 0.00, 0.00, 0.00, 0.00, 17.42, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(114, 'Dressing Table', 0.00, 0.00, 0.00, 0.00, 19.74, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(115, 'Chimani', 0.00, 0.00, 0.00, 0.00, 3.97, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(116, 'Double door Fridge', 0.00, 0.00, 0.00, 0.00, 22.64, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(117, 'Grinder Small', 0.00, 0.00, 0.00, 0.00, 1.16, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(118, 'Kitchen Rack Big', 0.00, 0.00, 0.00, 0.00, 27.84, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(119, 'Kitchen Almari Big', 0.00, 0.00, 0.00, 0.00, 48.24, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(120, 'Kitchen Trolley  Per drawer', 0.00, 0.00, 0.00, 0.00, 4.21, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(121, 'Indian Sethi', 0.00, 0.00, 0.00, 0.00, 25.38, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(122, 'Microwave Oven', 0.00, 0.00, 0.00, 0.00, 3.97, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(123, 'Mixer', 0.00, 0.00, 0.00, 0.00, 1.28, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(124, 'Juice Mixer', 0.00, 0.00, 0.00, 0.00, 1.28, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(125, 'Toster', 0.00, 0.00, 0.00, 0.00, 1.16, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(126, 'Dinning Table Glass', 0.00, 0.00, 0.00, 0.00, 12.91, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(127, 'Dinning Chair-1', 0.00, 0.00, 0.00, 0.00, 6.24, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(128, 'Atta Machine', 0.00, 0.00, 0.00, 0.00, 5.00, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(129, 'Fire Fox Small', 0.00, 0.00, 0.00, 0.00, 1.66, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(130, 'Kitchen Big Almari', 0.00, 0.00, 0.00, 0.00, 41.66, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(131, 'Kitchen Small Almari', 0.00, 0.00, 0.00, 0.00, 15.48, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(132, 'Kitchen Big Table Long', 0.00, 0.00, 0.00, 0.00, 22.50, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(133, 'Kitchen Small Table', 0.00, 0.00, 0.00, 0.00, 6.02, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(134, 'Carret Box', 0.00, 0.00, 0.00, 0.00, 3.75, 'k', 0, 63, 63, '2019-11-04 04:37:41', '2019-11-04 04:37:41'),
(135, 'Tv LCD 36\"', 3.00, 0.80, 1.80, 4.32, 4.32, 'l', 0, 1, 1, '2019-11-07 20:24:18', '2019-11-07 20:24:18'),
(136, 'TV LCD 38\"', 3.40, 0.80, 2.00, 5.44, 5.44, 'l', 0, 1, 1, '2019-11-07 20:25:13', '2019-11-07 20:25:13'),
(137, 'Computar Table', 4.00, 2.50, 1.83, 18.30, 18.30, 'b', 0, 1, 1, '2019-11-07 20:29:40', '2019-11-07 20:29:40'),
(138, 'show rack big ', 3.00, 1.16, 3.33, 11.59, 11.59, 'l', 0, 1, 1, '2019-11-07 20:31:17', '2019-11-07 20:31:17'),
(139, 'study table', 3.00, 1.66, 2.66, 13.25, 13.25, 'b', 0, 1, 1, '2019-11-08 07:24:36', '2019-11-08 12:54:36'),
(140, 'cids study table', 1.91, 1.66, 1.66, 5.26, 5.26, 'b', 0, 1, 1, '2019-11-08 07:34:17', '2019-11-08 13:04:17'),
(141, 'Big Pots', 3.00, 1.00, 1.50, 4.50, 4.50, 'l', 0, 1, 1, '2019-11-08 07:40:24', '2019-11-08 13:10:24'),
(142, 'carpet', 8.00, 1.00, 1.00, 8.00, 8.00, 'l', 0, 1, 1, '2019-11-08 14:00:41', '2019-11-08 19:30:41'),
(143, 'cycle small', 5.00, 1.50, 2.00, 15.00, 15.00, 'b', 0, 1, 1, '2019-11-11 16:35:49', '2019-11-11 16:35:49'),
(144, 'activa', 5.50, 2.00, 3.00, 33.00, 33.00, 'cb', 0, 1, 1, '2019-11-11 16:36:22', '2019-11-11 16:36:22'),
(145, 'bike', 7.00, 3.00, 4.00, 84.00, 84.00, 'cb', 1, 1, 1, '2019-11-11 11:25:57', '2019-11-11 16:55:57'),
(146, 'bike', 6.00, 2.00, 4.00, 48.00, 48.00, 'cb', 0, 1, 1, '2019-11-11 16:56:29', '2019-11-11 16:56:29'),
(147, 'Still Tip', 2.33, 2.33, 3.00, 16.29, 16.29, 'k', 0, 1, 1, '2019-11-12 17:12:41', '2019-11-12 17:12:41'),
(148, 'corogated box', 2.00, 1.30, 1.80, 4.68, 4.68, 'b', 0, 1, 1, '2019-11-12 11:49:25', '2019-11-12 17:19:25'),
(149, 'Tv box', 2.00, 2.00, 2.00, 8.00, 8.00, 'l', 0, 1, 1, '2019-11-12 17:21:54', '2019-11-12 17:21:54'),
(150, 'Co Rack ', 3.00, 1.00, 6.00, 18.00, 18.00, 'o', 0, 1, 1, '2019-11-13 10:46:08', '2019-11-13 10:46:08'),
(151, 'glass tabale co', 5.00, 2.00, 4.00, 40.00, 40.00, 'o', 0, 1, 1, '2019-11-13 10:46:45', '2019-11-13 10:46:45'),
(152, 'Bullet', 7.00, 2.60, 3.00, 54.60, 54.60, 'cb', 0, 1, 1, '2019-11-13 17:44:44', '2019-11-13 17:44:44'),
(153, 'ertiga', 10.00, 5.00, 4.50, 225.00, 225.00, 'cb', 0, 1, 1, '2019-11-27 16:07:08', '2019-11-27 16:07:08'),
(154, 'militery trunk small ', 2.00, 2.00, 1.50, 6.00, 6.00, 'b', 0, 1, 1, '2019-11-27 16:10:42', '2019-11-27 16:10:42'),
(155, 'militery trunk big', 3.00, 2.00, 2.00, 12.00, 12.00, 'b', 0, 1, 1, '2019-11-27 16:11:11', '2019-11-27 16:11:11'),
(156, 'extra cartoon', 2.00, 1.70, 1.90, 6.46, 6.46, 'b', 0, 1, 1, '2020-02-06 11:15:35', '2020-02-06 16:45:35'),
(157, 'All Reddy packed cartoon', 2.00, 1.70, 1.90, 6.46, 6.46, 'b', 0, 1, 1, '2019-11-27 16:47:24', '2019-11-27 16:47:24'),
(158, 'TV 54\"', 5.00, 1.00, 2.33, 11.65, 11.65, 'l', 0, 1, 1, '2019-12-26 09:00:27', '2019-12-26 14:30:27'),
(159, 'Zopala Dismentle', 3.00, 2.00, 8.00, 48.00, 48.00, 'l', 0, 1, 1, '2020-01-27 17:21:42', '2020-01-27 17:21:42'),
(160, 'Car', 12.00, 5.00, 5.00, 300.00, 300.00, 'cb', 0, 1, 1, '2020-01-31 11:59:07', '2020-01-31 11:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_kilometer`
--

CREATE TABLE `mst_tbl_kilometer` (
  `km_id` int(11) NOT NULL,
  `km_start_range` int(11) NOT NULL,
  `km_end_range` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_kilometer`
--

INSERT INTO `mst_tbl_kilometer` (`km_id`, `km_start_range`, `km_end_range`) VALUES
(1, 1, 3),
(2, 1, 8),
(3, 1, 13),
(4, 1, 18),
(5, 1, 25),
(6, 1, 35),
(7, 1, 45),
(8, 1, 60),
(9, 1, 80),
(10, 1, 100),
(11, 1, 125),
(12, 1, 150),
(13, 1, 180),
(14, 1, 210),
(15, 1, 250),
(16, 1, 300),
(17, 1, 350),
(18, 1, 400),
(19, 1, 450),
(20, 1, 500),
(21, 1, 550),
(22, 1, 600),
(23, 1, 650),
(24, 1, 700),
(25, 1, 750),
(26, 1, 800),
(27, 1, 850),
(28, 1, 900),
(29, 1, 1000),
(30, 1, 1100),
(31, 1, 1200),
(32, 1, 1300),
(33, 1, 1400),
(34, 1, 1500),
(35, 1, 1600),
(36, 1, 1700),
(37, 1, 1800),
(38, 1, 1900),
(39, 1, 2000),
(40, 1, 2100),
(41, 1, 2200),
(42, 1, 2300),
(43, 1, 2400),
(44, 1, 2500),
(45, 1, 2600),
(46, 1, 2700),
(47, 1, 2800),
(48, 1, 2900),
(49, 1, 3000),
(50, 1, 3100),
(51, 1, 3200),
(52, 1, 3300),
(53, 1, 3400),
(54, 1, 3500),
(55, 1, 3600),
(56, 1, 3700),
(57, 1, 3800),
(58, 1, 3900),
(59, 1, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_km_wise_amt`
--

CREATE TABLE `mst_tbl_km_wise_amt` (
  `km_amt_id` int(11) NOT NULL,
  `km_id` int(11) NOT NULL,
  `vehical_id` int(11) NOT NULL,
  `labour_charges` double(8,2) NOT NULL,
  `transport_charges` double(8,2) NOT NULL,
  `packing_charges` double(8,2) NOT NULL,
  `total_amt` double(8,2) NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_km_wise_amt`
--

INSERT INTO `mst_tbl_km_wise_amt` (`km_amt_id`, `km_id`, `vehical_id`, `labour_charges`, `transport_charges`, `packing_charges`, `total_amt`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1500.00, 1300.00, 2000.00, 4800.00, 0, 1, 1, '0000-00-00 00:00:00', '2019-04-29 13:04:39'),
(2, 2, 1, 1500.00, 1400.00, 2000.00, 4900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 1, 1500.00, 1400.00, 2000.00, 4900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 1, 1500.00, 1500.00, 2000.00, 5000.00, 0, 1, 1, '0000-00-00 00:00:00', '2019-07-20 17:53:02'),
(5, 5, 1, 1500.00, 1600.00, 2000.00, 5100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 1, 1500.00, 1700.00, 2000.00, 5200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 1, 1500.00, 1800.00, 2000.00, 5300.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 1, 1500.00, 2300.00, 2000.00, 5800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 1, 1800.00, 2500.00, 2000.00, 6300.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, 1, 2100.00, 3100.00, 2000.00, 7200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 11, 1, 2500.00, 4500.00, 2500.00, 9500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 12, 1, 3500.00, 5500.00, 3000.00, 12000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, 1, 3500.00, 6000.00, 3000.00, 12500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 14, 1, 3500.00, 6500.00, 3000.00, 13000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 15, 1, 3500.00, 7500.00, 3000.00, 14000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 16, 1, 4000.00, 8000.00, 3000.00, 15000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, 1, 4500.00, 10000.00, 3000.00, 17500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, 1, 4500.00, 12000.00, 3000.00, 19500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 19, 1, 4700.00, 14000.00, 3000.00, 21700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 20, 1, 5000.00, 17000.00, 3000.00, 25000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 21, 1, 5000.00, 17200.00, 3000.00, 25200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 22, 1, 5300.00, 17600.00, 3000.00, 25900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 23, 1, 5400.00, 17700.00, 3000.00, 26100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 24, 1, 5500.00, 18000.00, 3000.00, 26500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 25, 1, 5500.00, 18000.00, 3000.00, 26500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 26, 1, 5700.00, 18500.00, 3200.00, 27400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 27, 1, 5700.00, 18500.00, 3200.00, 27400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 28, 1, 6000.00, 19000.00, 3200.00, 28200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 29, 1, 6000.00, 19500.00, 3200.00, 28700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 30, 1, 6000.00, 19500.00, 3200.00, 28700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, 1, 6000.00, 20000.00, 3200.00, 29200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 32, 1, 6000.00, 20500.00, 3200.00, 29700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 33, 1, 6000.00, 21000.00, 3200.00, 30200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 34, 1, 6000.00, 21500.00, 3200.00, 30700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 35, 1, 6000.00, 22000.00, 3200.00, 31200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 36, 1, 6000.00, 22500.00, 3200.00, 31700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 37, 1, 6000.00, 23000.00, 3200.00, 32200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 38, 1, 6000.00, 23000.00, 3500.00, 32500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 39, 1, 6000.00, 23000.00, 3500.00, 32500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 40, 1, 6000.00, 23500.00, 3500.00, 33000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 41, 1, 6000.00, 24000.00, 3500.00, 33500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 42, 1, 6000.00, 24500.00, 3500.00, 34000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 43, 1, 6000.00, 25000.00, 3500.00, 34500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 44, 1, 6000.00, 25500.00, 3500.00, 35000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 45, 1, 6000.00, 26000.00, 3500.00, 35500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 46, 1, 6000.00, 26500.00, 3500.00, 36000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 47, 1, 6000.00, 27000.00, 3500.00, 36500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 48, 1, 6000.00, 27500.00, 3500.00, 37000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 49, 1, 6000.00, 28000.00, 3500.00, 37500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 50, 1, 6000.00, 28500.00, 3500.00, 38000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 51, 1, 6000.00, 29000.00, 3500.00, 38500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 52, 1, 6000.00, 29500.00, 3500.00, 39000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 53, 1, 6000.00, 30000.00, 3500.00, 39500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 54, 1, 6000.00, 30500.00, 3500.00, 40000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 55, 1, 6000.00, 31000.00, 3500.00, 40500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 56, 1, 6000.00, 31500.00, 3500.00, 41000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 57, 1, 6000.00, 32000.00, 3500.00, 41500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 58, 1, 6000.00, 32500.00, 3500.00, 42000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 59, 1, 6000.00, 33000.00, 3500.00, 42500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 1, 2, 2100.00, 2000.00, 3000.00, 7100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 2, 2, 2100.00, 2000.00, 3000.00, 7100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 3, 2, 2100.00, 2000.00, 3000.00, 7100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 4, 2, 2100.00, 2300.00, 3000.00, 7400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 5, 2, 2100.00, 2300.00, 3000.00, 7400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 6, 2, 2100.00, 2500.00, 3000.00, 7600.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 7, 2, 2100.00, 2700.00, 3000.00, 7800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 8, 2, 2100.00, 2900.00, 3000.00, 8000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 9, 2, 2100.00, 3000.00, 3000.00, 8100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 10, 2, 2100.00, 3500.00, 3000.00, 8600.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 11, 2, 2700.00, 4000.00, 3500.00, 10200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 12, 2, 4200.00, 5000.00, 3500.00, 12700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 13, 2, 4200.00, 6000.00, 3500.00, 13700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 14, 2, 4200.00, 6500.00, 3500.00, 14200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 15, 2, 4200.00, 7000.00, 3500.00, 14700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 16, 2, 4500.00, 8000.00, 3500.00, 16000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 17, 2, 4500.00, 9000.00, 4000.00, 17500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 18, 2, 4500.00, 10000.00, 4000.00, 18500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 19, 2, 5000.00, 11000.00, 4000.00, 20000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 20, 2, 5500.00, 12000.00, 4000.00, 21500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 21, 2, 5500.00, 13000.00, 4000.00, 22500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 22, 2, 5500.00, 13500.00, 4000.00, 23000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 23, 2, 5500.00, 15500.00, 4000.00, 25000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 24, 2, 5500.00, 17000.00, 4000.00, 26500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 25, 2, 5500.00, 18000.00, 4000.00, 27500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 26, 2, 5500.00, 19000.00, 4000.00, 28500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 27, 2, 5500.00, 19500.00, 4000.00, 29000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 28, 2, 5500.00, 20000.00, 4000.00, 29500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 29, 2, 5500.00, 20500.00, 4000.00, 30000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 30, 2, 6000.00, 21000.00, 4000.00, 31000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 31, 2, 6000.00, 21500.00, 4000.00, 31500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 32, 2, 6000.00, 22500.00, 4000.00, 32500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 33, 2, 6000.00, 23500.00, 4000.00, 33500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 34, 2, 6000.00, 24500.00, 4000.00, 34500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 35, 2, 6000.00, 25500.00, 4000.00, 35500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 36, 2, 6000.00, 26000.00, 4500.00, 36500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 37, 2, 6000.00, 26500.00, 4500.00, 37000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 38, 2, 6000.00, 27000.00, 4500.00, 37500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 39, 2, 6500.00, 27500.00, 4500.00, 38500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 40, 2, 6500.00, 28000.00, 4500.00, 39000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 41, 2, 6500.00, 28500.00, 4500.00, 39500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 42, 2, 6500.00, 29000.00, 4500.00, 40000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 43, 2, 6500.00, 29500.00, 4500.00, 40500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 44, 2, 6500.00, 30000.00, 4500.00, 41000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 45, 2, 6500.00, 30500.00, 4500.00, 41500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 46, 2, 6500.00, 31000.00, 4500.00, 42000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 47, 2, 6500.00, 31500.00, 4500.00, 42500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 48, 2, 6500.00, 32000.00, 4500.00, 43000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 49, 2, 6500.00, 32500.00, 4500.00, 43500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 50, 2, 6500.00, 33000.00, 4500.00, 44000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 51, 2, 6500.00, 33500.00, 4500.00, 44500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 52, 2, 6500.00, 34000.00, 4500.00, 45000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 53, 2, 6500.00, 34500.00, 4500.00, 45500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 54, 2, 6500.00, 35000.00, 4500.00, 46000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 55, 2, 6500.00, 35500.00, 4500.00, 46500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 56, 2, 6500.00, 36000.00, 4500.00, 47000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 57, 2, 6500.00, 36500.00, 4500.00, 47500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 58, 2, 6500.00, 37000.00, 4500.00, 48000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 59, 2, 6500.00, 38000.00, 4500.00, 49000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 1, 3, 2800.00, 2500.00, 4500.00, 9800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 2, 3, 2800.00, 2500.00, 4500.00, 9800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 3, 3, 2800.00, 2700.00, 4500.00, 10000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 4, 3, 2800.00, 2800.00, 4500.00, 10100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 5, 3, 2800.00, 2800.00, 4500.00, 10100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 6, 3, 2800.00, 3000.00, 4500.00, 10300.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 7, 3, 2800.00, 3300.00, 4500.00, 10600.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 8, 3, 2800.00, 3500.00, 4500.00, 10800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 9, 3, 2800.00, 4500.00, 4500.00, 11800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 10, 3, 3300.00, 5500.00, 5000.00, 13800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 11, 3, 5000.00, 6500.00, 5000.00, 16500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 12, 3, 5600.00, 7500.00, 5000.00, 18100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 13, 3, 5600.00, 8500.00, 5000.00, 19100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 14, 3, 5600.00, 9000.00, 5000.00, 19600.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 15, 3, 5600.00, 9500.00, 5000.00, 20100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 16, 3, 6000.00, 10500.00, 5500.00, 22000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 17, 3, 6000.00, 11000.00, 5500.00, 22500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 18, 3, 6000.00, 12000.00, 5500.00, 23500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 19, 3, 6000.00, 13000.00, 5500.00, 24500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 20, 3, 6500.00, 14500.00, 5500.00, 26500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 21, 3, 7000.00, 16000.00, 5500.00, 28500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 22, 3, 7000.00, 16500.00, 5500.00, 29000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 23, 3, 7000.00, 17500.00, 5500.00, 30000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 24, 3, 7000.00, 18500.00, 5500.00, 31000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 25, 3, 7000.00, 19500.00, 6000.00, 32500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 26, 3, 7000.00, 20000.00, 6000.00, 33000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 27, 3, 7000.00, 21000.00, 6000.00, 34000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 28, 3, 7000.00, 22000.00, 6000.00, 35000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 29, 3, 7500.00, 23000.00, 6000.00, 36500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 30, 3, 7500.00, 23500.00, 6000.00, 37000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 31, 3, 7500.00, 24000.00, 6000.00, 37500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 32, 3, 7500.00, 24500.00, 6000.00, 38000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 33, 3, 7500.00, 25000.00, 6000.00, 38500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 34, 3, 7500.00, 25500.00, 6000.00, 39000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 35, 3, 7500.00, 26000.00, 6000.00, 39500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 36, 3, 8000.00, 26500.00, 6500.00, 41000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 37, 3, 8000.00, 27000.00, 6500.00, 41500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 38, 3, 8000.00, 27500.00, 6500.00, 42000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 39, 3, 8000.00, 28000.00, 6500.00, 42500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 40, 3, 8000.00, 28500.00, 6500.00, 43000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 41, 3, 8000.00, 29000.00, 6500.00, 43500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 42, 3, 8000.00, 29500.00, 6500.00, 44000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 43, 3, 8000.00, 30000.00, 6500.00, 44500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 44, 3, 8000.00, 31500.00, 6500.00, 46000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 45, 3, 8000.00, 32000.00, 6500.00, 46500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 46, 3, 8000.00, 32500.00, 6500.00, 47000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 47, 3, 8000.00, 33000.00, 6500.00, 47500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 48, 3, 8000.00, 33500.00, 6500.00, 48000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 49, 3, 8000.00, 34000.00, 6500.00, 48500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 50, 3, 8000.00, 34500.00, 6500.00, 49000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 51, 3, 8000.00, 35000.00, 6500.00, 49500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 52, 3, 8000.00, 35500.00, 6500.00, 50000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 53, 3, 8000.00, 36000.00, 6500.00, 50500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 54, 3, 8000.00, 36500.00, 6500.00, 51000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 55, 3, 8000.00, 37000.00, 6500.00, 51500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 56, 3, 8000.00, 37500.00, 6500.00, 52000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 57, 3, 8000.00, 38000.00, 6500.00, 52500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 58, 3, 8000.00, 38500.00, 6500.00, 53000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 59, 3, 8000.00, 39000.00, 6500.00, 53500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 1, 4, 4200.00, 3000.00, 6001.00, 13201.00, 0, 1, 1, '0000-00-00 00:00:00', '2021-10-30 01:28:42'),
(179, 2, 4, 4200.00, 3500.00, 6000.00, 13700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 3, 4, 4200.00, 3500.00, 6000.00, 13700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 4, 4, 4200.00, 4000.00, 6000.00, 14200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 5, 4, 4200.00, 4200.00, 6000.00, 14400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 6, 4, 4200.00, 4500.00, 6000.00, 14700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 7, 4, 4200.00, 5000.00, 6000.00, 15200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 8, 4, 4200.00, 5000.00, 6000.00, 15200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 9, 4, 5000.00, 5500.00, 6000.00, 16500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 10, 4, 5500.00, 6000.00, 6500.00, 18000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 11, 4, 6500.00, 7500.00, 7000.00, 21000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 12, 4, 8400.00, 9500.00, 7500.00, 25400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 13, 4, 8400.00, 10000.00, 7500.00, 25900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 14, 4, 8400.00, 11500.00, 7500.00, 27400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 15, 4, 8400.00, 12000.00, 7500.00, 27900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 16, 4, 9000.00, 14000.00, 8000.00, 31000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 17, 4, 9000.00, 15000.00, 8000.00, 32000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 18, 4, 9000.00, 16000.00, 8000.00, 33000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 19, 4, 9000.00, 16500.00, 8000.00, 33500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 20, 4, 9000.00, 18500.00, 8000.00, 35500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 21, 4, 9500.00, 19500.00, 8000.00, 37000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 22, 4, 9500.00, 20500.00, 8000.00, 38000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 23, 4, 9500.00, 21500.00, 8000.00, 39000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 24, 4, 9500.00, 23000.00, 8000.00, 40500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 25, 4, 9500.00, 23500.00, 8000.00, 41000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 26, 4, 9500.00, 24000.00, 8000.00, 41500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 27, 4, 9500.00, 25000.00, 8000.00, 42500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 28, 4, 9500.00, 26000.00, 9000.00, 44500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 29, 4, 9500.00, 26500.00, 9000.00, 45000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 30, 4, 10000.00, 27000.00, 9000.00, 46000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 31, 4, 10000.00, 27500.00, 9000.00, 46500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 32, 4, 10000.00, 28000.00, 9000.00, 47000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 33, 4, 10000.00, 28500.00, 9000.00, 47500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 34, 4, 10000.00, 29000.00, 9000.00, 48000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 35, 4, 10000.00, 29500.00, 9000.00, 48500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 36, 4, 10000.00, 30000.00, 9500.00, 49500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 37, 4, 10000.00, 30500.00, 9500.00, 50000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 38, 4, 10000.00, 31000.00, 9500.00, 50500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 39, 4, 10000.00, 31500.00, 9500.00, 51000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 40, 4, 10000.00, 32000.00, 9500.00, 51500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 41, 4, 10000.00, 32500.00, 9500.00, 52000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 42, 4, 10000.00, 33000.00, 9500.00, 52500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 43, 4, 10500.00, 33500.00, 9500.00, 53500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 44, 4, 10500.00, 34000.00, 9500.00, 54000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 45, 4, 10500.00, 34500.00, 9500.00, 54500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 46, 4, 10500.00, 35000.00, 9500.00, 55000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 47, 4, 10500.00, 35500.00, 9500.00, 55500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 48, 4, 10500.00, 36000.00, 9500.00, 56000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 49, 4, 10500.00, 36500.00, 9500.00, 56500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 50, 4, 10500.00, 37000.00, 10000.00, 57500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 51, 4, 10500.00, 37500.00, 10000.00, 58000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 52, 4, 10500.00, 38000.00, 10000.00, 58500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 53, 4, 10500.00, 38500.00, 10000.00, 59000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 54, 4, 10500.00, 39000.00, 10000.00, 59500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 55, 4, 10500.00, 39500.00, 10000.00, 60000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 56, 4, 10500.00, 40000.00, 10000.00, 60500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 57, 4, 10500.00, 40500.00, 10000.00, 61000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 58, 4, 10500.00, 41000.00, 10000.00, 61500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 59, 4, 10500.00, 41500.00, 10000.00, 62000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 1, 5, 4200.00, 4500.00, 7000.00, 15700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 2, 5, 5000.00, 5000.00, 7000.00, 17000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 3, 5, 5000.00, 5000.00, 7000.00, 17000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 4, 5, 5000.00, 5000.00, 7000.00, 17000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 5, 5, 5000.00, 5500.00, 7000.00, 17500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 6, 5, 5000.00, 5500.00, 7000.00, 17500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 7, 5, 5500.00, 5800.00, 7000.00, 18300.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 8, 5, 5500.00, 6300.00, 7000.00, 18800.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 9, 5, 5500.00, 6500.00, 7000.00, 19000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 10, 5, 6000.00, 7500.00, 7500.00, 21000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 11, 5, 7000.00, 8500.00, 8000.00, 23500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 12, 5, 8400.00, 10000.00, 8000.00, 26400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 13, 5, 8400.00, 11500.00, 8000.00, 27900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 14, 5, 8400.00, 13500.00, 8000.00, 29900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 15, 5, 8400.00, 14000.00, 8000.00, 30400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 16, 5, 8400.00, 14500.00, 8000.00, 30900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 17, 5, 8400.00, 15000.00, 9000.00, 32400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 18, 5, 8400.00, 16000.00, 9000.00, 33400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 19, 5, 8400.00, 17000.00, 9000.00, 34400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 20, 5, 9000.00, 18500.00, 9000.00, 36500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 21, 5, 9000.00, 19500.00, 10000.00, 38500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 22, 5, 9000.00, 20500.00, 10000.00, 39500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 23, 5, 9000.00, 21500.00, 10000.00, 40500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 24, 5, 9000.00, 23000.00, 10000.00, 42000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 25, 5, 9000.00, 24500.00, 10000.00, 43500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 26, 5, 9000.00, 25500.00, 10000.00, 44500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 27, 5, 9000.00, 26500.00, 10000.00, 45500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 28, 5, 9000.00, 27500.00, 10000.00, 46500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 29, 5, 9000.00, 29000.00, 10500.00, 48500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 30, 5, 10000.00, 30000.00, 10500.00, 50500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 31, 5, 10000.00, 31000.00, 10500.00, 51500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 32, 5, 10000.00, 32000.00, 10500.00, 52500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 33, 5, 10000.00, 33000.00, 10500.00, 53500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 34, 5, 10000.00, 34000.00, 10500.00, 54500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 35, 5, 10000.00, 35000.00, 10500.00, 55500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 36, 5, 10000.00, 36000.00, 10500.00, 56500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 37, 5, 10000.00, 37000.00, 11000.00, 58000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 38, 5, 10000.00, 38000.00, 11000.00, 59000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 39, 5, 10000.00, 39000.00, 11000.00, 60000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 40, 5, 10500.00, 40000.00, 11000.00, 61500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 41, 5, 10500.00, 41000.00, 11000.00, 62500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 42, 5, 10500.00, 42000.00, 11000.00, 63500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 43, 5, 10500.00, 43000.00, 11000.00, 64500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 44, 5, 10500.00, 44000.00, 11000.00, 65500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 45, 5, 10500.00, 45000.00, 11000.00, 66500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 46, 5, 10500.00, 46000.00, 11000.00, 67500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 47, 5, 10500.00, 47000.00, 11000.00, 68500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 48, 5, 10500.00, 48000.00, 11000.00, 69500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 49, 5, 10500.00, 49000.00, 11000.00, 70500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 50, 5, 10500.00, 50000.00, 11000.00, 71500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 51, 5, 10500.00, 51000.00, 11000.00, 72500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 52, 5, 10500.00, 52000.00, 11000.00, 73500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 53, 5, 10500.00, 53000.00, 11000.00, 74500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 54, 5, 10500.00, 54000.00, 11000.00, 75500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 55, 5, 10500.00, 55000.00, 11000.00, 76500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 56, 5, 10500.00, 56000.00, 11000.00, 77500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 57, 5, 10500.00, 57000.00, 11000.00, 78500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 58, 5, 10500.00, 58000.00, 11000.00, 79500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 59, 5, 10500.00, 59000.00, 11000.00, 80500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 1, 6, 5000.00, 5000.00, 9000.00, 19000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 2, 6, 5000.00, 5500.00, 9000.00, 19500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 3, 6, 5500.00, 5500.00, 9000.00, 20000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 4, 6, 5500.00, 5800.00, 9000.00, 20300.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 5, 6, 5500.00, 6000.00, 9500.00, 21000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 6, 6, 5600.00, 6300.00, 9500.00, 21400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 7, 6, 5600.00, 6300.00, 9500.00, 21400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 8, 6, 5600.00, 6800.00, 9500.00, 21900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 9, 6, 5600.00, 7000.00, 9500.00, 22100.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 10, 6, 8400.00, 7500.00, 9500.00, 25400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 11, 6, 8400.00, 9500.00, 10500.00, 28400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 12, 6, 9500.00, 13000.00, 10500.00, 33000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 13, 6, 9500.00, 15000.00, 10500.00, 35000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 14, 6, 10500.00, 16500.00, 10500.00, 37500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 15, 6, 10500.00, 18000.00, 11500.00, 40000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 16, 6, 11000.00, 19000.00, 11500.00, 41500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 17, 6, 11000.00, 19500.00, 11500.00, 42000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 18, 6, 11000.00, 20500.00, 11500.00, 43000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 19, 6, 11000.00, 21000.00, 11500.00, 43500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 20, 6, 11000.00, 22500.00, 12500.00, 46000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 21, 6, 11000.00, 24500.00, 12500.00, 48000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 22, 6, 11000.00, 26000.00, 12500.00, 49500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 23, 6, 11000.00, 27000.00, 12500.00, 50500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 24, 6, 11000.00, 28500.00, 12500.00, 52000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 25, 6, 11000.00, 30000.00, 12500.00, 53500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 26, 6, 11000.00, 31500.00, 12500.00, 55000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 27, 6, 11000.00, 32500.00, 12500.00, 56000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 28, 6, 11000.00, 33500.00, 12500.00, 57000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 29, 6, 11000.00, 34500.00, 12500.00, 58000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 30, 6, 11000.00, 35500.00, 12500.00, 59000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 31, 6, 11000.00, 36500.00, 12500.00, 60000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 32, 6, 11000.00, 37500.00, 12500.00, 61000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 33, 6, 11000.00, 38500.00, 12500.00, 62000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 34, 6, 11000.00, 39500.00, 12500.00, 63000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 35, 6, 11000.00, 40500.00, 12500.00, 64000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 36, 6, 10500.00, 41500.00, 12500.00, 64500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 37, 6, 10500.00, 42500.00, 13500.00, 66500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 38, 6, 10500.00, 43500.00, 13500.00, 67500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 39, 6, 11500.00, 44500.00, 13500.00, 69500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 40, 6, 11500.00, 45500.00, 13500.00, 70500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 41, 6, 11500.00, 46500.00, 13500.00, 71500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 42, 6, 11500.00, 47500.00, 14500.00, 73500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 43, 6, 11500.00, 48500.00, 14500.00, 74500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 44, 6, 11500.00, 49500.00, 14500.00, 75500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 45, 6, 11500.00, 50500.00, 14500.00, 76500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 46, 6, 11500.00, 51500.00, 14500.00, 77500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 47, 6, 11500.00, 52500.00, 14500.00, 78500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 48, 6, 11500.00, 53500.00, 14500.00, 79500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 49, 6, 11500.00, 54500.00, 14500.00, 80500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 50, 6, 11500.00, 55500.00, 14500.00, 81500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 51, 6, 11500.00, 56500.00, 14500.00, 82500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 52, 6, 11500.00, 57500.00, 14500.00, 83500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 53, 6, 11500.00, 58500.00, 14500.00, 84500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 54, 6, 11500.00, 59500.00, 14500.00, 85500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 55, 6, 11500.00, 60500.00, 14500.00, 86500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 56, 6, 12500.00, 61500.00, 14500.00, 88500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 57, 6, 12500.00, 62500.00, 14500.00, 89500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 58, 6, 12500.00, 63500.00, 14500.00, 90500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 59, 6, 12500.00, 64500.00, 14500.00, 91500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 1, 7, 7000.00, 6000.00, 11500.00, 24500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 2, 7, 7000.00, 7000.00, 11500.00, 25500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 3, 7, 7000.00, 8000.00, 11500.00, 26500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 4, 7, 7500.00, 8500.00, 11750.00, 28250.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 5, 7, 7700.00, 9000.00, 12000.00, 29300.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 6, 7, 7700.00, 9600.00, 12000.00, 29900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 7, 7, 7700.00, 10200.00, 12000.00, 30900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 8, 7, 7700.00, 11200.00, 12500.00, 31900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 9, 7, 7700.00, 11700.00, 12500.00, 32200.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 10, 7, 8400.00, 12000.00, 14500.00, 37900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 11, 7, 8400.00, 15000.00, 14500.00, 40900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 12, 7, 8400.00, 18000.00, 14500.00, 42700.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 13, 7, 8400.00, 19800.00, 14500.00, 46000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 14, 7, 8400.00, 23100.00, 14500.00, 50400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 15, 7, 8400.00, 27500.00, 15500.00, 56900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 16, 7, 8400.00, 33000.00, 16500.00, 63400.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 17, 7, 8400.00, 38500.00, 16500.00, 64900.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 18, 7, 9000.00, 40000.00, 16500.00, 68500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 19, 7, 9000.00, 43000.00, 16500.00, 70500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 20, 7, 9000.00, 45000.00, 17500.00, 73500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 21, 7, 10000.00, 47000.00, 17500.00, 76500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 22, 7, 10000.00, 49000.00, 18000.00, 79000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 23, 7, 10000.00, 51000.00, 18000.00, 81000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 24, 7, 10000.00, 53000.00, 18000.00, 83000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 25, 7, 11000.00, 55000.00, 18000.00, 86000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 26, 7, 11000.00, 57000.00, 18000.00, 88000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 27, 7, 11000.00, 59000.00, 18000.00, 90000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 28, 7, 11000.00, 61000.00, 18000.00, 92000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 29, 7, 11000.00, 63000.00, 19000.00, 96000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 30, 7, 11000.00, 66000.00, 19000.00, 99000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 31, 7, 11500.00, 69000.00, 19000.00, 99500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 32, 7, 11500.00, 72000.00, 19000.00, 102500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 33, 7, 11500.00, 75000.00, 19000.00, 105500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 34, 7, 12000.00, 78000.00, 19000.00, 108500.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 35, 7, 12000.00, 81000.00, 19000.00, 112000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 36, 7, 12000.00, 84000.00, 19000.00, 115000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 37, 7, 12000.00, 86000.00, 20000.00, 117000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 38, 7, 13000.00, 88000.00, 20000.00, 120000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 39, 7, 14000.00, 90000.00, 20000.00, 123000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 40, 7, 14000.00, 92000.00, 20000.00, 126000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 41, 7, 14000.00, 94000.00, 20000.00, 128000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 42, 7, 14000.00, 96000.00, 20000.00, 130000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 43, 7, 14000.00, 98000.00, 20000.00, 132000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 44, 7, 14000.00, 100000.00, 20000.00, 134000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 45, 7, 14000.00, 102000.00, 20000.00, 136000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 46, 7, 14000.00, 104000.00, 20000.00, 138000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 47, 7, 15000.00, 106000.00, 20000.00, 140000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 48, 7, 15000.00, 108000.00, 20000.00, 143000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 49, 7, 15000.00, 110000.00, 20000.00, 145000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 50, 7, 15000.00, 112000.00, 20000.00, 147000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 51, 7, 15000.00, 115000.00, 20000.00, 150000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 52, 7, 15000.00, 118000.00, 20000.00, 153000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 53, 7, 15000.00, 121000.00, 20000.00, 156000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 54, 7, 15000.00, 124000.00, 20000.00, 159000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 55, 7, 15000.00, 127000.00, 20000.00, 162000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 56, 7, 15000.00, 130000.00, 20000.00, 165000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 57, 7, 15000.00, 133000.00, 20000.00, 168000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 58, 7, 15000.00, 136000.00, 20000.00, 171000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 59, 7, 15000.00, 139000.00, 20000.00, 174000.00, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_vehical_details`
--

CREATE TABLE `mst_tbl_vehical_details` (
  `vehical_id` int(11) NOT NULL,
  `vehical_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vehical_dimension` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cft_start_range` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cft_end_range` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `labour_required` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_vehical_details`
--

INSERT INTO `mst_tbl_vehical_details` (`vehical_id`, `vehical_name`, `vehical_dimension`, `cft_start_range`, `cft_end_range`, `labour_required`, `created_at`, `updated_at`) VALUES
(1, '8 feet', '8*5*7', '1', '280', 3, '0000-00-00 00:00:00', '2019-05-28 11:21:51'),
(2, '407(10 feet)', '10*5.5*7.2', '281', '387', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '407(14 feet)', '13.5*6.9*7.2', '388', '648', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '909(17 feet)', '17*5.5*7.2', '649', '821', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '1109(19 feet)', '19*7.6*7.2', '822', '1020', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '22 feet', '22*8*7.6', '1021', '1320', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '32 feet', '32*8.6*8.6', '1321', '2312', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Tata Ace', '7*4.9*6.8', '2313', '2410', 16, '2020-02-21 18:25:42', '2020-02-21 18:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tbl_vehicle_company`
--

CREATE TABLE `mst_tbl_vehicle_company` (
  `vehicle_id` int(11) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_tbl_vehicle_company`
--

INSERT INTO `mst_tbl_vehicle_company` (`vehicle_id`, `company_name`, `vehicle_type`) VALUES
(1, 'Hero', 'two wheeler'),
(2, 'Honda', 'two wheeler');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@safemove.in', '$2y$10$7A0I4fN42zgYqSwAuIoibOEBlB6HYB.uGbTrCqgMMXydpbB9rDXjm', '2021-11-12 04:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `removable`, `created_at`, `updated_at`) VALUES
(1, 'users.manage', 'Manage Users', 'Manage users and their sessions.', 1, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(2, 'users.activity', 'View System Activity Log', 'View activity log for all system users.', 1, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(3, 'roles.manage', 'Manage Roles', 'Manage system roles.', 1, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(4, 'permissions.manage', 'Manage Permissions', 'Manage role permissions.', 1, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(5, 'settings.general', 'Update General System Settings', '', 1, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(6, 'languages.languages', 'Language manage', 'View languages.', 1, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(7, 'dashboard.calender', 'Calender', 'Calender', 1, '2019-04-03 13:18:14', '2019-04-03 13:18:14'),
(8, 'manage_enquiry', 'Manage Enquiry', '', 1, '2019-05-09 11:14:35', '2019-05-09 11:14:35'),
(9, 'manage_survey', 'Manage Survey', '', 1, '2019-05-09 11:15:16', '2019-05-09 11:15:16'),
(10, 'own_survey', 'Own Survey', '', 1, '2019-05-09 11:15:45', '2019-05-09 11:15:45'),
(11, 'survey_schedule', 'Survey Schedule', '', 1, '2019-05-09 11:16:34', '2019-05-09 11:16:34'),
(12, 'manage_sales', 'Manage Sales', '', 1, '2019-05-09 11:17:07', '2019-05-09 11:17:07'),
(13, 'manage_confirm_job', 'Manage Confirm Job', '', 1, '2019-05-09 11:17:50', '2019-05-09 11:17:50'),
(14, 'manage_packing_list', 'Manage Packing List', '', 1, '2019-05-09 11:18:19', '2019-05-09 11:18:19'),
(15, 'manage_transport_enquiry', 'Manage Transport Enquiry', '', 1, '2019-05-09 11:19:29', '2019-05-09 11:19:29'),
(16, 'manage_delivery_details', 'Manage Delivery Details', '', 1, '2019-05-09 11:20:23', '2019-05-09 11:20:23'),
(17, 'manage_feedback', 'Manage Feedback', '', 1, '2019-05-09 11:20:55', '2019-05-09 11:20:55'),
(18, 'manage_tracking', 'Manage Tracking', '', 1, '2019-05-09 11:56:56', '2019-05-09 11:56:56'),
(19, 'manage_report', 'Manage Report', '', 1, '2019-05-09 11:57:25', '2019-05-09 11:57:25'),
(20, 'manage_setting', 'Manage Setting', '', 1, '2019-05-09 11:57:55', '2019-05-09 11:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 5),
(7, 1),
(7, 2),
(7, 4),
(7, 5),
(7, 6),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 6),
(14, 1),
(14, 2),
(14, 6),
(15, 1),
(15, 2),
(15, 6),
(16, 1),
(16, 2),
(16, 6),
(17, 1),
(17, 2),
(17, 6),
(18, 1),
(18, 2),
(18, 6),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `removable`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'System administrator.', 0, '2019-03-08 09:39:57', '2019-03-08 09:39:57'),
(2, 'Sales & Marketing', 'Sales & Marketing', 'sales only marketing Default system user.', 0, '2019-03-08 09:39:57', '2019-05-17 16:16:33'),
(4, 'Survey Manager', 'Survey Manager', 'Survey Manager team can use this login', 1, '2019-05-17 16:19:11', '2019-05-17 16:19:11'),
(5, 'Marketing', 'Marketing', '', 1, '2019-10-18 11:55:57', '2019-10-18 11:55:57'),
(6, 'safemovesagar', 'Opretion', '', 1, '2019-10-18 12:17:14', '2019-10-18 12:18:49'),
(7, 'Test', 'Testing', 'This is for testing Purpose.', 1, '2021-02-05 19:14:08', '2021-02-05 19:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 5),
(4, 1),
(4, 5),
(5, 6),
(6, 2),
(11, 2),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_me` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forget_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notify_signup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `re_capcha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `app_title`, `app_email`, `phone`, `mobile`, `currency`, `remember_me`, `forget_password`, `notify_signup`, `re_capcha`, `logo`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Safemove', 'safemove', 'contact@puretechnology.in', '020-27270103', '020-27270103', 'Rs.', 'ON', 'ON', 'OFF', 'OFF', '1637126635.jpg', 'Pune', '2019-03-08 09:39:57', '2021-11-17 00:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE `social_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_Details`
--

CREATE TABLE `tbl_company_Details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `legal_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_line2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gst_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_company_Details`
--

INSERT INTO `tbl_company_Details` (`id`, `name`, `legal_name`, `contact_person`, `contact_email`, `contact`, `alt_contact`, `add_line1`, `add_line2`, `city`, `pincode`, `state`, `country`, `website`, `gst_no`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Safemove', 'Safemove Packers And Transport', 'Ravi Kumar', 'contact@safemove.in', '91194 91199', '', '1st Floor Dhananjay Building', 'Above Bank of India Transport Nagar Nigdi', 'Pune', '411044', 'Maharashtra', 'India', 'www.safemove.in', '27AAYPE4087H1Z6', 0, 1, 1, '2019-04-29 00:00:00', '2021-11-24 06:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_confirm_job`
--

CREATE TABLE `tbl_confirm_job` (
  `cj_id` int(10) UNSIGNED NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `moving_date` date NOT NULL,
  `moving_time` time NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_confirm_job`
--

INSERT INTO `tbl_confirm_job` (`cj_id`, `cn_no`, `survey_id`, `moving_date`, `moving_time`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `isdelete`) VALUES
(1, '202110261', NULL, '2021-11-02', '12:00:00', 'Confirm', '2021-10-30 01:11:25', '2021-10-30 01:37:02', 1, 2, 0),
(2, '202111092', NULL, '2021-11-18', '10:00:00', 'Confirm', '2021-11-12 04:37:53', '2021-11-12 04:37:53', 1, 1, 0),
(3, '202111171', NULL, '2021-11-30', '08:00:00', 'Confirm', '2021-11-19 02:34:40', '2021-11-19 02:34:40', 1, 1, 0),
(4, '202112271', NULL, '2021-12-30', '11:00:00', 'Confirm', '2021-12-27 09:25:41', '2021-12-27 09:25:41', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery`
--

CREATE TABLE `tbl_delivery` (
  `del_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `truck_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_packages` int(11) NOT NULL,
  `value_of_goods` double(8,2) DEFAULT NULL,
  `type_of_packing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mode_of_dispatch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `risk_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `private_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_delivery`
--

INSERT INTO `tbl_delivery` (`del_id`, `cn_no`, `truck_no`, `no_of_packages`, `value_of_goods`, `type_of_packing`, `mode_of_dispatch`, `risk_type`, `private_mark`, `created_by`, `updated_by`, `created_at`, `updated_at`, `isdelete`) VALUES
(10, 202110261, 'MH-20 AB 1245', 5, 15000.00, 'Box', NULL, 'Owner Risk', NULL, 1, 1, '2021-11-12 05:28:36', '2021-11-12 05:36:02', 1),
(11, 202110261, 'MH-20 AB 1245', 6, 15000.00, 'Box', NULL, 'Carrier\'s Risk', NULL, 1, 1, '2021-11-12 05:29:42', '2021-11-12 05:44:41', 1),
(12, 202110261, 'MH-20 AB 1245', 6, 15000.00, 'Box', NULL, 'Carrier\'s Risk', NULL, 1, 1, '2021-11-12 05:35:30', '2021-11-12 05:48:57', 1),
(13, 202111171, 'MH 12 AB 2022', 10, -1000.00, NULL, NULL, NULL, NULL, 1, 1, '2021-11-19 03:19:04', '2021-11-30 04:35:27', 1),
(14, 202111171, 'MH 12 AB 2022', 10, -1000.00, 'Case', NULL, 'Owner Risk', NULL, 1, 1, '2021-11-30 04:37:37', '2021-11-30 04:37:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destination_expenss`
--

CREATE TABLE `tbl_destination_expenss` (
  `id` int(10) UNSIGNED NOT NULL,
  `sd_exp_id` int(11) NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_destination_expenss`
--

INSERT INTO `tbl_destination_expenss` (`id`, `sd_exp_id`, `cn_no`, `expense_cat`, `cost`, `payment_mode`, `narration`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 5, '202110223', 'Destination Expense', 100.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24'),
(6, 5, '202110223', 'Unloading Costing', 800.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24'),
(7, 5, '202110223', 'Local Transportation', 100.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24'),
(8, 5, '202110223', 'Conveyence', 100.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24'),
(9, 5, '202110223', 'Naka', 500.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24'),
(10, 5, '202110223', 'Fooding', 300.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24'),
(11, 5, '202110223', 'Miscellaneous', 100.00, 'Cash', 'no', 1, 1, '2021-10-25 01:55:24', '2021-10-25 01:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_integration`
--

CREATE TABLE `tbl_email_integration` (
  `id` int(10) UNSIGNED NOT NULL,
  `host_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_email_integration`
--

INSERT INTO `tbl_email_integration` (`id`, `host_name`, `port_no`, `user_name`, `password`, `encryption`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'mail.safemove.co.in', '465', 'contact@safemove.co.in', 'Safemove@123', 'ssl', '1', '2019-04-24 11:14:17', '2021-11-19 02:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_tempaltes`
--

CREATE TABLE `tbl_email_tempaltes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_email_tempaltes`
--

INSERT INTO `tbl_email_tempaltes` (`id`, `email_for`, `email_body`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'add enquiry ', '<p>Dear $name,</p>\r\n<p>Thank you for contacting us.</p>\r\n<p>Your enquiry number is $cn_no</p>\r\n<p>Please call us at&nbsp; 91194 91199&nbsp; in case you have any</p>\r\n<p>queries.</p>\r\n<p>Safemove</p>\r\n<p>Move your Home Remove Your Stress!</p>', 1, 1, '2019-04-22 14:45:46', '2020-02-12 12:44:07'),
(2, 'schedule survey', '<p><strong>Dear Sir/Madam</strong>,</p>\r\n<p>We have schedule survey of goods On Date : $surveyDate , at $surveyTime.</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you &amp; Regards,</p>\r\n<p>Safemove packer &amp; movers.&nbsp;</p>', 1, 1, '2019-04-23 10:50:14', '2020-02-12 12:44:21'),
(3, 'assinged survey', '<p><strong>Dear Employee,</strong></p>\r\n<p>We have assinged you survey schedule for</p>\r\n<p>CN NO - <strong>$cn_no</strong></p>\r\n<p>Date - <strong>$surveyDate</strong></p>\r\n<p>Time - <strong>$surveyTime</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Warm ', 1, 1, '2019-04-24 18:49:22', '2019-04-24 18:53:46'),
(4, 'survey complete to creator', '<p><strong>Dear Sir/Madam</strong></p>\r\n<p>Survey Complete for CN No - $cnno</p>\r\n<p>&nbsp;</p>\r\n<p>Warms &amp; Regards</p>\r\n<p>Safemove packers and movers.</p>', 1, 1, '2019-04-26 16:44:41', '2019-04-26 16:44:41'),
(5, 'Send quotation', '<p>Dear Sir/Madam,</p>\r\n<p>&nbsp; &nbsp; Please find attached here our best quotation for your service.<strong>CN NO $cn_no</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Warms &amp; Regards,</p>\r\n<p><strong>Safemove packers &amp; movers</strong></p>', 1, 1, '2019-04-30 18:52:44', '2019-04-30 18:52:44'),
(6, 'Send Invoice', '<p>Dear Sir/Madam,</p>\r\n<p>&nbsp; &nbsp; Please find attached here our invoice for your service.<strong>CN NO $cn_no</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Warms &amp; Regards,</p>\r\n<p><strong>Safemove packers &amp; movers</strong></p>', 1, 1, '2019-05-03 11:17:51', '2019-05-03 11:17:51'),
(7, 'Payment Receipt', '<p>Dear Sir/Madam,</p>\r\n<p>&nbsp; &nbsp; Please find attached here our payment receipt for your service.<strong>CN NO $cn_no</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Warms &amp; Regards,</p>\r\n<p><strong>Safemove packers &amp; movers</strong></p>', 1, 1, '2019-05-03 11:18:45', '2019-05-03 11:18:45'),
(8, 'Transport Payment Receipt', '<p>Dear Sir/Madam,</p>\r\n<p>&nbsp; &nbsp; Please find attached here our transport payment reciept for your service.<strong>CN NO $cn_no</strong>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Warms &amp; Regards,</p>\r\n<p><strong>Safemove packers &amp; movers</strong></p>', 1, 1, '2019-05-03 11:19:33', '2019-05-03 11:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `enq_id` int(10) UNSIGNED NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enquiry_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cust_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cust_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cust_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cust_alt_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exp_shifting_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enquiry_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_number` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `follow_up` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `follow_up_convr` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `enq_status` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`enq_id`, `cn_no`, `enquiry_date`, `cust_name`, `cust_email`, `cust_contact`, `cust_alt_contact`, `source`, `destination`, `exp_shifting_date`, `enquiry_type`, `reference`, `reference_status`, `reference_name`, `reference_number`, `follow_up`, `follow_up_convr`, `follow_up_date`, `enq_status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '202110201', '', 'aakash', 'aakash@puretechnology.in', '8830705470', '8830705454', 'pune', 'nashik', '2021-10-26', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, '', 'sample', '2021-10-25', 'Follow Up', 1, 1, 1, '2021-10-20 05:20:09', '2021-11-09 08:11:37'),
(3, '202110202', '', 'ravi', 'ravi@gmail.com', '9970506265', '9970506265', 'pune', 'mumbai', '2021-10-30', 'Medical Equipment', 'Advertisement', 'With In Pune', NULL, NULL, '', 'sample', '2021-10-23', 'Follow Up', 1, 1, 1, '2021-10-20 06:14:38', '2021-11-09 08:11:43'),
(4, '202110221', '', 'sky', 'sky1@gmail.com', '8830707070', '8830705454', 'hadpsar', 'hinjewadi', '2021-10-31', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, '', 'this is for testing', '2021-10-28', 'Follow Up', 1, 1, 1, '2021-10-22 00:12:45', '2021-10-26 01:55:12'),
(5, '202110222', '', 'Anuj bajaj', 'ANUJ@PURETECHNOLOGY.IN', '9970111283', '7385455380', 'Wakad', 'Viman nagar', '2021-10-31', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, '', 'call me after 3pm for VC call for survey', '2021-10-23', 'Assinged', 1, 1, 1, '2021-10-22 00:27:36', '2021-11-09 08:11:51'),
(6, '202110223', '', 'nilesh', 'nilesh@gmail.com', '9970506265', '9970506265', 'pune', 'mumbail', '2021-10-28', 'Factory Products', 'Facebook', 'With In Pune', NULL, NULL, '', 'sample2', '2021-10-24', 'Assinged', 1, 1, 1, '2021-10-22 05:03:12', '2021-11-09 08:11:57'),
(7, '202110251', '', 'rajesh', 'rajesh@pureech.com', '7385455380', '0000000000', 'hinjewadi', 'wakad', '2021-10-31', 'IT Goods', 'Just Dial', 'With In Pune', NULL, NULL, '', 'ns', '2021-10-26', 'New', 1, 1, 2, '2021-10-25 07:53:55', '2021-10-30 02:31:43'),
(8, '202110261', '', 'Avinash', 'avi@gmail.com', '7789562389', '7896584512', 'bavdhan', 'kothrud', '2021-10-30', 'Household Goods', 'referance', 'With In Pune', NULL, NULL, NULL, 'NA', '2021-10-27', 'Assinged', 1, 1, 1, '2021-10-26 03:41:40', '2021-11-09 08:18:41'),
(9, '202110301', '', 'Archana kulkarni', 'ak@gmail.com', '9834082726', '7876757389', 'chichwad', 'wakad', '2021-11-24', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '1970-01-12', 'Follow Up', 1, 2, 1, '2021-10-30 01:41:21', '2021-11-12 00:38:46'),
(10, '202110302', '', 'Ansh Kothule', 'ansh@mail.com', '8830707070', '8830707070', 'nashik', 'pune', '2021-11-06', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '1970-01-01', 'New', 1, 1, 2, '2021-10-30 01:43:44', '2021-10-30 02:26:40'),
(11, '202110303', '', 'Ansh Kothule', 'ansh@mail.com', '8830707070', '8830707070', 'nashik', 'pune', '2021-11-06', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '1970-01-01', 'New', 1, 1, 2, '2021-10-30 01:44:23', '2021-10-30 02:26:34'),
(12, '202111091', '', 'Apurv', 'apurv@gmail.com', '8909675434', '9096936738', 'aurangabad', 'Latur', '2021-11-14', 'Office Goods', 'Existing Customer', 'With In India', NULL, NULL, NULL, NULL, '2021-11-13', 'Assinged', 1, 1, 1, '2021-11-09 01:17:49', '2021-11-12 00:39:07'),
(13, '202111092', '', 'Sky Kothule', 'sky@gmail.com', '8830707070', '8830707072', 'hinjewadin', 'hadpsar', '2021-11-18', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '2021-11-14', 'Assinged', 1, 1, 1, '2021-11-09 04:46:14', '2021-11-26 01:56:24'),
(17, '202111093', '', 'Pavan Kumar1', 'pavan@gmail.com', '9930705478', '8956124889', 'Nashik1', 'Pune', '2021-11-27', 'Factory Products', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '2021-11-22', 'Assinged', 0, 1, 1, '2021-11-09 08:27:07', '2021-11-17 00:14:25'),
(18, '202111171', '', 'Nilesh Gandhi', 'nsg1@gmail.com', '9970292028', NULL, 'chinchwad', 'bavdhan', '2021-11-30', 'IT Goods', 'YellowPages', 'With In Pune', NULL, NULL, NULL, NULL, '2021-11-27', 'Assinged', 0, 1, 1, '2021-11-17 00:34:23', '2021-11-26 01:58:50'),
(19, '202111191', '', 'Aakash Kothule', 'aakash@puretechnology.in', '8830705470', NULL, 'Hinjewadi', 'hadpsar', '2021-11-27', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '2021-11-23', 'New', 1, 1, 1, '2021-11-19 02:04:48', '2021-11-19 02:21:32'),
(20, '202111192', '', 'Aakash Kothule', 'aakash@puretechnology.in', '8830705470', NULL, 'hinjewadi', 'hadpsar', '2021-11-30', 'IT Goods', 'Contract', 'With In Pune', NULL, NULL, NULL, NULL, '2021-11-22', 'New', 1, 1, 1, '2021-11-19 02:22:13', '2021-11-19 02:27:05'),
(21, '202111193', '', 'Vaibhav', 'vaibhav@puretechnology.in', '9665456654', '9665456654', 'Wakad', 'Bhosari', '2021-11-30', 'Household Goods', 'Website', 'With In Pune', NULL, NULL, NULL, NULL, '1970-01-01', 'Follow Up', 0, 1, 1, '2021-11-19 02:50:03', '2021-11-26 01:55:38'),
(22, '202112271', '', 'ANUJ BAJAJ', 'ANUJ@PURETECHNOLOGY.IN', '9970111283', '7385455380', 'Pune', 'Mumbai', '2021-12-31', 'Medical Equipment', 'Website', 'With In Pune', NULL, NULL, NULL, 'call me at 10', '2021-12-28', 'Follow Up', 0, 1, 1, '2021-12-27 09:11:18', '2021-12-27 09:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry_articals_list`
--

CREATE TABLE `tbl_enquiry_articals_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `enq_id` int(11) NOT NULL,
  `artical_id` int(11) NOT NULL,
  `artical_count` int(11) NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_segment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enquiry_articals_list`
--

INSERT INTO `tbl_enquiry_articals_list` (`id`, `enq_id`, `artical_id`, `artical_count`, `vehicle_type`, `vehicle_segment`, `vehicle_name`, `created_at`, `updated_at`) VALUES
(4717, 3, 141, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4718, 3, 136, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4719, 3, 84, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4720, 3, 88, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4721, 3, 77, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4722, 3, 76, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4723, 3, 61, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4724, 3, 61, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4725, 3, 61, 1, '', '', '', '2021-10-20 07:10:53', '2021-10-20 07:10:53'),
(4726, 5, 151, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4727, 5, 111, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4728, 5, 110, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4729, 5, 109, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4730, 5, 108, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4731, 5, 105, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4732, 5, 106, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4733, 5, 104, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4734, 5, 101, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4735, 5, 5, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4736, 5, 4, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4737, 5, 3, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4738, 5, 1, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4739, 5, 81, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4740, 5, 81, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4741, 5, 81, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4742, 5, 80, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4743, 5, 76, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4744, 5, 74, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4745, 5, 72, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4746, 5, 70, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4747, 5, 69, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4748, 5, 67, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4749, 5, 66, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4750, 5, 64, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4751, 5, 63, 1, '', '', '', '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(4763, 6, 145, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4764, 6, 100, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4765, 6, 105, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4766, 6, 104, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4767, 6, 150, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4768, 6, 1, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4769, 6, 6, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4770, 6, 3, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4771, 6, 64, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4772, 6, 62, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4773, 6, 61, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4774, 6, 1, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4775, 6, 19, 1, '', '', '', '2021-10-25 07:16:59', '2021-10-25 07:16:59'),
(4776, 7, 151, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4777, 7, 150, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4778, 7, 103, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4779, 7, 102, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4780, 7, 101, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4781, 7, 4, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4782, 7, 2, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4783, 7, 3, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4784, 7, 1, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4785, 7, 68, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4786, 7, 67, 1, '', '', '', '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(4801, 8, 1, 0, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4802, 8, 5, 0, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4803, 8, 2, 0, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4804, 8, 3, 1, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4805, 8, 61, 1, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4806, 8, 62, 1, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4807, 8, 7, 0, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4808, 8, 7, 0, '', '', '', '2021-10-27 01:31:44', '2021-10-27 01:31:44'),
(4809, 12, 151, 1, '', '', '', '2021-11-09 02:00:27', '2021-11-09 02:00:27'),
(4810, 12, 64, 1, '', '', '', '2021-11-09 02:00:27', '2021-11-09 02:00:27'),
(4811, 12, 61, 1, '', '', '', '2021-11-09 02:00:27', '2021-11-09 02:00:27'),
(4812, 13, 11, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4813, 13, 101, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4814, 13, 2, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4815, 13, 74, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4816, 13, 66, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4817, 13, 65, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4818, 13, 63, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4819, 13, 62, 1, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4820, 13, 61, 0, '', '', '', '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(4887, 17, 150, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4888, 17, 103, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4889, 17, 100, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4890, 17, 6, 3, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4891, 17, 2, 2, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4892, 17, 65, 2, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4893, 17, 64, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4894, 17, 63, 2, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4895, 17, 62, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4896, 17, 61, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4897, 17, 11, 1, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4898, 17, 8, 2, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4899, 17, 16, 5, '', '', '', '2021-11-12 00:44:51', '2021-11-12 00:44:51'),
(4900, 18, 87, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4901, 18, 88, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4902, 18, 89, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4903, 18, 80, 5, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4904, 18, 71, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4905, 18, 72, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4906, 18, 72, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4907, 18, 62, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4908, 18, 61, 1, '', '', '', '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(4929, 21, 79, 1, '', '', '', '2021-11-29 03:58:27', '2021-11-29 03:58:27'),
(4930, 21, 77, 1, '', '', '', '2021-11-29 03:58:27', '2021-11-29 03:58:27'),
(4931, 21, 63, 1, '', '', '', '2021-11-29 03:58:27', '2021-11-29 03:58:27'),
(4932, 21, 61, 1, '', '', '', '2021-11-29 03:58:27', '2021-11-29 03:58:27'),
(4933, 21, 1, 1, '', '', '', '2021-11-29 03:58:27', '2021-11-29 03:58:27'),
(4958, 22, 150, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4959, 22, 104, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4960, 22, 103, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4961, 22, 102, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4962, 22, 101, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4963, 22, 100, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4964, 22, 95, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4965, 22, 94, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4966, 22, 93, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4967, 22, 63, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4968, 22, 62, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4969, 22, 61, 1, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15'),
(4970, 22, 14, 2, '', '', '', '2021-12-27 09:20:15', '2021-12-27 09:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry_customer_details`
--

CREATE TABLE `tbl_enquiry_customer_details` (
  `enq_cust_id` int(10) UNSIGNED NOT NULL,
  `enq_id` int(11) NOT NULL,
  `src_prop_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_floor_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `src_packing_req` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_loading_req` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_elavator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_prop_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_floor_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_unpacking_req` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_unloading_req` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_elavator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_add_line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_add_line2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_add_line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_add_line2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dest_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enquiry_customer_details`
--

INSERT INTO `tbl_enquiry_customer_details` (`enq_cust_id`, `enq_id`, `src_prop_type`, `src_floor_no`, `src_packing_req`, `src_loading_req`, `src_elavator`, `dest_prop_type`, `dest_floor_no`, `dest_unpacking_req`, `dest_unloading_req`, `dest_elavator`, `src_add_line1`, `src_add_line2`, `src_city`, `src_pincode`, `src_state`, `src_country`, `dest_add_line1`, `dest_add_line2`, `dest_city`, `dest_pincode`, `dest_state`, `dest_country`, `created_at`, `updated_at`) VALUES
(235, 3, 'Apartment', '1', 'Y', 'Y', 'Y', 'Apartment', '1', 'Y', 'Y', 'Y', 'ABC', '', '', '', '', '', 'xyz', '', '', '', '', '', '2021-10-20 06:47:43', '2021-10-20 07:03:51'),
(236, 5, 'Apartment', '3', 'Y', 'Y', 'Y', 'Apartment', '8', 'Y', 'Y', 'N', 'A304, Verve Residency, Bhumkar chowk,\r\nnear CCD', '', '', '', '', '', 'A304, vishal Residency', '', '', '', '', '', '2021-10-22 00:29:19', '2021-10-25 07:49:52'),
(237, 6, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '3', 'Y', 'Y', 'Y', 'abc', '', '', '', '', '', 'xyz', '', '', '', '', '', '2021-10-22 05:05:53', '2021-10-24 23:21:54'),
(238, 7, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '8', 'Y', 'Y', 'N', 'Near Eco City, Talegaon, Varale,', '', '', '', '', '', 'near CCD', '', '', '', '', '', '2021-10-25 07:55:09', '2021-10-25 07:56:59'),
(239, 8, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '6', 'Y', 'Y', 'N', 'abc', '', '', '', '', '', 'xyz', '', '', '', '', '', '2021-10-26 04:11:45', '2021-10-26 05:04:00'),
(240, 9, '', NULL, '', '', '', '', NULL, '', '', '', 'tata motors', '', '', '', '', '', 'bhumkar chowk', '', '', '', '', '', '2021-10-30 02:28:19', '2021-10-30 02:28:19'),
(241, 12, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '12', 'Y', 'Y', 'N', 'Cidco', '', '', '', '', '', 'Vidya Nagar', '', '', '', '', '', '2021-11-09 01:28:20', '2021-11-09 02:01:03'),
(242, 13, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '3', 'Y', 'Y', 'Y', 'Bhujbal chowk, hinjewadi,pune', '', '', '', '', '', 'Bhujbal chowk, hadpsar,pune', '', '', '', '', '', '2021-11-09 04:50:01', '2021-11-09 04:52:27'),
(243, 17, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '1', 'Y', 'Y', 'Y', 'Nashik', '', '', '', '', '', 'Pune', '', '', '', '', '', '2021-11-09 08:46:43', '2021-11-09 09:10:01'),
(244, 18, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '6', 'Y', 'Y', 'N', 'chinchwad tata Motors', '', '', '', '', '', 'sunwinds bavdhan', '', '', '', '', '', '2021-11-17 01:10:06', '2021-11-17 04:02:04'),
(245, 21, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '1', 'Y', 'Y', 'Y', 'ABC', '', '', '', '', '', 'XYZ', '', '', '', '', '', '2021-11-29 03:45:10', '2021-11-29 03:51:04'),
(246, 22, 'Apartment', '2', 'Y', 'Y', 'Y', 'Apartment', '4', 'Y', 'Y', 'Y', 'A 304, Verve Residency, near bhumkar chowk, next lean of CCD, Wakad', '', '', '', '', '', 'near train station', '', '', '', '', '', '2021-12-27 09:15:15', '2021-12-27 09:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry_followup`
--

CREATE TABLE `tbl_enquiry_followup` (
  `followup_id` int(10) UNSIGNED NOT NULL,
  `enq_id` int(11) NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `followup_date` date NOT NULL,
  `conversation` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enquiry_followup`
--

INSERT INTO `tbl_enquiry_followup` (`followup_id`, `enq_id`, `cn_no`, `followup_date`, `conversation`, `rating`, `created_at`, `updated_at`) VALUES
(321, 1, '202110201', '2021-10-25', 'sample', 0, '2021-10-20 05:16:23', '2021-10-20 05:16:23'),
(322, 2, '202110201', '2021-10-25', 'sample', 0, '2021-10-20 05:20:09', '2021-10-20 05:20:09'),
(323, 3, '202110202', '2021-10-23', 'sample', 0, '2021-10-20 06:14:38', '2021-10-20 06:14:38'),
(324, 3, '202110202', '2021-10-20', 'sample', 4, '2021-10-20 06:33:16', '2021-10-20 06:33:16'),
(325, 3, '202110202', '2021-10-20', 'sampl2', 5, '2021-10-20 06:39:49', '2021-10-20 06:39:49'),
(326, 3, '202110202', '2021-10-20', 'sample', 4, '2021-10-20 06:59:58', '2021-10-20 06:59:58'),
(327, 2, '202110201', '2021-10-20', '123', 2, '2021-10-20 07:47:46', '2021-10-20 07:47:46'),
(328, 4, '202110221', '2021-10-28', 'this is for testing', 0, '2021-10-22 00:12:45', '2021-10-22 00:12:45'),
(329, 4, '202110221', '2021-10-22', 'this is first followup', 4, '2021-10-22 00:13:10', '2021-10-22 00:13:10'),
(330, 5, '202110222', '2021-10-23', 'call me after 3pm for VC call for survey', 0, '2021-10-22 00:27:36', '2021-10-22 00:27:36'),
(331, 6, '202110223', '2021-10-24', 'sample2', 0, '2021-10-22 05:03:12', '2021-10-22 05:03:12'),
(332, 6, '202110223', '2021-10-22', 'sample222', 2, '2021-10-22 05:04:01', '2021-10-22 05:04:01'),
(333, 7, '202110251', '2021-10-26', 'ns', 0, '2021-10-25 07:53:55', '2021-10-25 07:53:55'),
(334, 4, '202110221', '2021-10-26', 'NA', 5, '2021-10-26 01:48:07', '2021-10-26 01:48:07'),
(335, 8, '202110261', '2021-10-27', 'NA', NULL, '2021-10-26 03:41:40', '2021-10-26 03:41:40'),
(336, 11, '202110302', '1970-01-01', NULL, NULL, '2021-10-30 01:44:23', '2021-10-30 01:44:23'),
(337, 9, '202110301', '2021-10-30', 'NA', NULL, '2021-10-30 02:26:11', '2021-10-30 02:26:11'),
(338, 9, '202110301', '2021-11-09', 'jjgkjgk', 3, '2021-11-09 00:44:41', '2021-11-09 00:44:41'),
(339, 9, '202110301', '2021-11-17', 'kjk', 4, '2021-11-09 00:46:25', '2021-11-09 00:46:25'),
(340, 12, '202111091', '2021-11-13', NULL, NULL, '2021-11-09 01:17:49', '2021-11-09 01:17:49'),
(341, 9, '202110301', '2021-11-13', 'NA', NULL, '2021-11-09 01:19:16', '2021-11-09 01:19:16'),
(342, 12, '202111091', '2021-11-09', 'NA', NULL, '2021-11-09 01:20:57', '2021-11-09 01:20:57'),
(343, 13, '202111092', '2021-11-14', NULL, NULL, '2021-11-09 04:46:14', '2021-11-09 04:46:14'),
(344, 13, '202111092', '2021-11-09', 'This is for testing', 2, '2021-11-09 04:48:11', '2021-11-09 04:48:11'),
(345, 14, '202111093', '1970-01-01', NULL, NULL, '2021-11-09 08:19:29', '2021-11-09 08:19:29'),
(346, 15, '202111093', '1970-01-01', NULL, NULL, '2021-11-09 08:20:56', '2021-11-09 08:20:56'),
(347, 16, '202111093', '1970-01-01', NULL, NULL, '2021-11-09 08:22:49', '2021-11-09 08:22:49'),
(348, 17, '202111093', '2021-11-22', NULL, NULL, '2021-11-09 08:27:07', '2021-11-09 08:27:07'),
(349, 18, '202111171', '2021-11-27', NULL, NULL, '2021-11-17 00:34:23', '2021-11-17 00:34:23'),
(350, 18, '202111171', '2021-11-17', 'NA', NULL, '2021-11-17 00:34:56', '2021-11-17 00:34:56'),
(351, 18, '202111171', '2021-11-17', 'N', NULL, '2021-11-17 00:53:20', '2021-11-17 00:53:20'),
(352, 19, '202111191', '2021-11-23', NULL, NULL, '2021-11-19 02:04:48', '2021-11-19 02:04:48'),
(353, 20, '202111192', '2021-11-22', NULL, NULL, '2021-11-19 02:22:13', '2021-11-19 02:22:13'),
(354, 21, '202111193', '1970-01-01', NULL, NULL, '2021-11-19 02:50:03', '2021-11-19 02:50:03'),
(355, 21, '202111193', '2021-11-30', 'NA', NULL, '2021-11-26 01:55:38', '2021-11-26 01:55:38'),
(356, 22, '202112271', '2021-12-28', 'call me at 10', NULL, '2021-12-27 09:11:18', '2021-12-27 09:11:18'),
(357, 22, '202112271', '2021-12-27', 'cost high', 4, '2021-12-27 09:12:25', '2021-12-27 09:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry_shiping_details`
--

CREATE TABLE `tbl_enquiry_shiping_details` (
  `shipping_details_id` int(10) UNSIGNED NOT NULL,
  `last_eq_id` int(11) NOT NULL,
  `total_cft` double(8,2) NOT NULL,
  `kilometer` double(8,2) NOT NULL,
  `exp_vehical` int(11) NOT NULL,
  `exp_no_of_lab_req` int(11) NOT NULL,
  `labour_charges` double(8,2) NOT NULL,
  `transport_charges` double(8,2) NOT NULL,
  `packing_charges` double(8,2) NOT NULL,
  `total_amt` double(8,2) NOT NULL,
  `goods_value` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_enquiry_shiping_details`
--

INSERT INTO `tbl_enquiry_shiping_details` (`shipping_details_id`, `last_eq_id`, `total_cft`, `kilometer`, `exp_vehical`, `exp_no_of_lab_req`, `labour_charges`, `transport_charges`, `packing_charges`, `total_amt`, `goods_value`, `created_at`, `updated_at`) VALUES
(235, 3, 142.90, 15.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 50000.00, '2021-10-20 06:50:27', '2021-10-20 07:10:53'),
(236, 3, 142.90, 15.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 5000.00, '2021-10-20 07:01:33', '2021-10-20 07:10:53'),
(237, 3, 142.90, 15.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 40000.00, '2021-10-20 07:03:18', '2021-10-20 07:10:53'),
(238, 5, 432.65, 27.00, 3, 5, 2800.00, 3000.00, 4500.00, 10300.00, 150000.00, '2021-10-22 00:32:35', '2021-10-22 00:32:35'),
(239, 6, 235.99, 20.00, 1, 3, 1500.00, 1600.00, 2000.00, 5100.00, 150000.00, '2021-10-24 23:21:43', '2021-10-25 07:16:59'),
(240, 7, 207.45, 7.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 120000.00, '2021-10-25 07:55:57', '2021-10-25 07:55:57'),
(241, 8, 27.50, 5.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 15000.00, '2021-10-26 05:03:22', '2021-10-27 01:31:44'),
(242, 12, 65.66, 3.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 8000.00, '2021-11-09 02:00:27', '2021-11-09 02:00:27'),
(243, 13, 123.40, 30.00, 9, 3, 0.00, 0.00, 0.00, 0.00, 500000.00, '2021-11-09 04:52:12', '2021-11-09 04:52:12'),
(244, 17, 348.91, 200.00, 2, 4, 4200.00, 6500.00, 3500.00, 14200.00, 500000.00, '2021-11-09 09:05:36', '2021-11-12 00:44:51'),
(245, 18, 223.60, 15.00, 1, 3, 1500.00, 1500.00, 2000.00, 5000.00, -1000.00, '2021-11-17 03:58:35', '2021-11-17 03:58:35'),
(246, 21, 71.54, 5.00, 1, 3, 1500.00, 1400.00, 2000.00, 4900.00, 10000.00, '2021-11-29 03:49:27', '2021-11-29 03:58:27'),
(247, 22, 261.66, 170.00, 1, 3, 3500.00, 6000.00, 3000.00, 12500.00, 50000.00, '2021-12-27 09:17:05', '2021-12-27 09:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_delivery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `breakage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_start` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `labour_commit` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct_vehical` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `working_company` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suggestion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `cn_no`, `skill`, `quality`, `attributes`, `experience`, `time_delivery`, `breakage`, `work_start`, `labour_commit`, `correct_vehical`, `dob`, `working_company`, `rating`, `suggestion`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, '202111171', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, '2', NULL, 0, 1, 1, '2021-11-30 04:39:43', '2021-11-30 04:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback_status`
--

CREATE TABLE `tbl_feedback_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isdelete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_feedback_status`
--

INSERT INTO `tbl_feedback_status` (`id`, `status_name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `isdelete`) VALUES
(1, 'Excellent', '1', '1', '2019-09-14 05:51:49', '0000-00-00 00:00:00', 0),
(2, 'Good', '1', '1', '2019-09-14 05:51:49', '0000-00-00 00:00:00', 0),
(3, 'Fair', '1', '1', '2019-09-14 05:51:49', '0000-00-00 00:00:00', 0),
(4, 'Poor', '1', '1', '2019-09-14 05:51:49', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goods_type`
--

CREATE TABLE `tbl_goods_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_goods_type`
--

INSERT INTO `tbl_goods_type` (`id`, `goods_type`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Household Goods', 0, 1, 1, NULL, '2019-05-08 09:58:01'),
(2, 'Vehicle', 0, 1, 1, NULL, '2019-04-24 17:18:35'),
(3, 'Factory Products', 0, 1, 1, '2019-05-08 09:56:03', '2019-05-08 09:56:03'),
(4, 'IT Goods', 0, 1, 1, '2019-05-08 09:56:16', '2019-05-08 09:56:16'),
(5, 'Medical Equipment', 0, 1, 1, '2019-05-08 09:56:31', '2019-05-08 09:56:31'),
(6, 'Office Goods', 0, 1, 1, '2019-05-08 09:56:54', '2019-05-08 09:56:54'),
(7, 'Entertainment Centre Goods', 0, 1, 1, '2019-05-08 09:57:15', '2019-05-08 09:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_no` int(11) NOT NULL,
  `cn_no` int(11) NOT NULL,
  `pur_order_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pur_order_date` date DEFAULT NULL,
  `invoice_amount` double(8,2) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_status` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `bill_no`, `cn_no`, `pur_order_no`, `pur_order_date`, `invoice_amount`, `payment_mode`, `invoice_status`, `created_by`, `updated_by`, `isdelete`, `created_at`, `updated_at`) VALUES
(1, 0, 202110222, '2', '2021-10-25', 8020.00, 'Cash', 'Generated', 1, 1, 1, '2021-10-22 04:38:33', '2021-11-18 01:38:46'),
(2, 0, 202110222, '2', '2021-10-29', 8020.00, 'Cash', 'Generated', 1, 1, 1, '2021-10-22 04:44:14', '2021-10-28 03:59:05'),
(3, 0, 202110223, '2', '2021-10-26', 999999.00, 'Cash', 'Generated', 1, 1, 0, '2021-10-25 00:07:45', '2021-10-25 00:07:45'),
(4, 0, 202110222, '00', '2021-10-25', 13964.00, 'Cash', 'Generated', 1, 1, 0, '2021-10-25 07:22:53', '2021-10-25 07:22:53'),
(5, 0, 202110261, '56', '2021-10-29', 2096.00, 'Online Payment', 'Generated', 1, 1, 1, '2021-10-27 04:59:19', '2021-10-28 04:01:27'),
(6, 0, 202111091, '101', '2021-11-11', 808.00, 'Cash', 'Generated', 1, 1, 1, '2021-11-09 04:38:42', '2021-11-12 01:05:04'),
(7, 0, 202110222, '1234', '2021-11-10', 13964.00, 'Cash', 'Generated', 1, 1, 1, '2021-11-09 05:11:59', '2021-11-12 03:35:26'),
(8, 0, 202111171, '101', '2021-11-25', 6000.00, 'Cash', 'Generated', 1, 1, 0, '2021-11-18 04:50:55', '2021-11-18 04:50:55'),
(9, 0, 202112271, NULL, '1970-01-01', 19200.00, 'Cash', 'Generated', 1, 1, 0, '2021-12-27 09:27:32', '2021-12-27 09:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_setting`
--

CREATE TABLE `tbl_invoice_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quot_prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_tax_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pan_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_invoice_setting`
--

INSERT INTO `tbl_invoice_setting` (`id`, `invoice_prefix`, `quot_prefix`, `service_tax_no`, `pan_no`, `invoice_currency`, `payment_currency`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'INV', 'QUOT', 'TAX123', 'PAN123', 'INR', 'INR', 0, 1, 1, NULL, '2019-05-30 18:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead_source`
--

CREATE TABLE `tbl_lead_source` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lead_source`
--

INSERT INTO `tbl_lead_source` (`id`, `lead_source`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Website', 0, 1, 1, '2019-04-24 12:20:44', '2019-04-26 16:24:31'),
(2, 'referance', 0, 1, 1, '2019-04-25 14:03:57', '2019-04-25 14:03:57'),
(3, 'Contract', 0, 1, 1, '2019-05-08 10:22:10', '2019-05-08 10:22:10'),
(4, 'Existing Customer', 0, 1, 1, '2019-05-08 10:22:14', '2019-05-08 10:22:14'),
(5, 'Just Dial', 0, 1, 1, '2019-05-08 10:22:25', '2019-05-08 10:22:25'),
(6, 'Facebook', 0, 1, 1, '2019-05-08 10:22:33', '2019-05-08 10:22:33'),
(7, 'Google', 0, 1, 1, '2019-05-08 10:22:40', '2019-05-08 10:22:40'),
(8, 'YellowPages', 0, 1, 1, '2019-05-08 10:22:48', '2019-05-08 10:22:48'),
(9, 'International Portal Site', 0, 1, 1, '2019-05-08 10:22:59', '2019-05-08 10:22:59'),
(10, 'Project Movement', 0, 1, 1, '2019-05-08 10:23:08', '2019-05-08 10:23:08'),
(11, 'Advertisement', 0, 1, 1, '2019-05-08 10:23:16', '2019-05-08 10:23:16'),
(12, 'Urban clap', 0, 1, 1, '2020-01-25 10:57:44', '2020-01-25 10:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead_status`
--

CREATE TABLE `tbl_lead_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lead_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderno` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lead_status`
--

INSERT INTO `tbl_lead_status` (`id`, `lead_status`, `lead_type`, `orderno`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'With In India', 'Open', 0, 1, 1, '2019-04-24 12:03:24', '2019-09-25 18:49:49'),
(2, 'With In Pune', 'Open', 1, 1, 1, '2019-09-25 18:50:11', '2019-09-25 18:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mode_of_dispatched`
--

CREATE TABLE `tbl_mode_of_dispatched` (
  `id` int(11) NOT NULL,
  `type_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mode_of_dispatched`
--

INSERT INTO `tbl_mode_of_dispatched` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'By Road', '2019-05-07 10:49:46', '0000-00-00 00:00:00'),
(2, 'By Air', '2019-05-07 10:50:20', '0000-00-00 00:00:00'),
(3, 'By Sea', '2019-05-07 10:50:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_office_expenses`
--

CREATE TABLE `tbl_office_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expenes_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offexp_date` date DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_office_expenses`
--

INSERT INTO `tbl_office_expenses` (`id`, `expenes_by`, `payment_mode`, `amount`, `narration`, `bank_name`, `category`, `vehicle_name`, `offexp_date`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ganesh', 'Cash', 2000.00, 'NA', '', '5', 'Honda 125 cc', '2021-10-25', 0, 1, 1, '2021-10-25 06:00:41', '2021-10-25 06:00:41'),
(2, 'anuj', 'Cash', 1000.00, 'q', '', '5', 'Honda 125 cc', '2021-10-25', 0, 1, 1, '2021-10-25 07:39:05', '2021-10-25 07:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_off_exp_category`
--

CREATE TABLE `tbl_off_exp_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_off_exp_category`
--

INSERT INTO `tbl_off_exp_category` (`id`, `category_name`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Salary Account', 0, 1, 1, '2019-05-06 15:21:17', '2019-05-06 16:07:09'),
(2, 'convenience Account', 0, 1, 1, '2019-05-08 10:00:45', '2019-05-08 10:00:45'),
(3, 'Director Meeting Allowance', 0, 1, 1, '2019-05-08 10:00:56', '2019-05-08 10:00:56'),
(4, 'Mess Account.', 0, 1, 1, '2019-05-08 10:01:07', '2019-05-08 10:01:07'),
(5, 'Vehicle Maintenance Account', 0, 1, 1, '2019-05-08 10:01:33', '2019-05-08 10:01:33'),
(6, 'Computer Maintenance Account', 0, 1, 1, '2019-05-08 10:01:41', '2019-05-08 10:01:41'),
(7, 'Corporate Account', 0, 1, 1, '2019-05-08 10:01:50', '2019-05-08 10:01:50'),
(8, 'Local Transport Account', 0, 1, 1, '2019-05-08 10:02:01', '2019-05-08 10:02:01'),
(9, 'Staff Welfare/Pantry Account', 0, 1, 1, '2019-05-08 10:02:10', '2019-05-08 10:02:10'),
(10, 'Packing Material Account', 0, 1, 1, '2019-05-08 10:02:27', '2019-05-08 10:02:27'),
(11, 'Petrol/Diesel Account', 0, 1, 1, '2019-05-08 10:02:38', '2019-05-08 10:02:38'),
(12, 'Drawing Account', 0, 1, 1, '2019-05-08 10:02:51', '2019-05-08 10:02:51'),
(13, 'Printing/Stationary Account', 0, 1, 1, '2019-05-08 10:03:06', '2019-05-08 10:03:06'),
(14, 'Miscellaneous Charges', 0, 1, 1, '2019-05-08 10:03:14', '2019-05-08 10:03:14'),
(15, 'Telephone Expenses Account', 0, 1, 1, '2019-05-08 10:03:23', '2019-05-08 10:03:23'),
(16, 'Office Rent / Godown Rent', 0, 1, 1, '2019-05-08 10:03:33', '2019-05-08 10:03:33'),
(17, 'Office Renovation Ac.', 0, 1, 1, '2019-05-08 10:03:43', '2019-05-08 10:03:43'),
(18, 'Audit Fees', 0, 1, 1, '2019-05-08 10:03:58', '2019-05-08 10:03:58'),
(19, 'website Maintenance', 0, 1, 1, '2019-05-08 10:04:12', '2019-05-08 10:04:12'),
(20, 'Electricity Bill Expense', 0, 1, 1, '2019-05-08 10:04:27', '2019-05-08 10:04:27'),
(21, 'Postage & Courier Expense A/c', 0, 1, 1, '2019-05-08 10:04:35', '2019-05-08 10:04:35'),
(22, 'Advertisement Exps', 0, 1, 1, '2019-05-08 10:04:44', '2019-05-08 10:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packing_list`
--

CREATE TABLE `tbl_packing_list` (
  `pl_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `supervisor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `packer_name1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packer_name2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packer_name3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packer_name4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packer_name5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packer_name6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_packing_list`
--

INSERT INTO `tbl_packing_list` (`pl_id`, `cn_no`, `supervisor_name`, `packer_name1`, `packer_name2`, `packer_name3`, `packer_name4`, `packer_name5`, `packer_name6`, `upload_image`, `goods_value`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 202110223, 'hh', 'a', 'w', 'b', 'r', 'c', 'i', '', '150000', 1, 1, 1, '2021-10-25 06:14:27', '2021-10-29 05:10:14'),
(14, 202110222, 'baban', 'ab', 'na', 'b', 'na', 'na', 'n', '', '150000', 0, 1, 0, '2021-10-25 07:28:47', '2021-10-25 07:28:47'),
(15, 202110261, 'Ravi', 'a', 'b', 'c', 'd', 'e', 'f', '', '15000', 0, 1, 0, '2021-10-29 05:09:59', '2021-10-29 05:09:59'),
(16, 202111171, 'Ravi', 'a', 'b', NULL, NULL, NULL, NULL, NULL, '-1000', 0, 1, 0, '2021-11-30 04:31:24', '2021-11-30 04:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packing_list_image`
--

CREATE TABLE `tbl_packing_list_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_packing_list_image`
--

INSERT INTO `tbl_packing_list_image` (`id`, `cn_no`, `upload_image`, `isdelete`, `created_at`, `updated_at`) VALUES
(7, '202110223', '1787142522_202110223.png', 0, '2021-10-25 06:14:27', '2021-10-25 06:14:27'),
(8, '202110261', '1763560797_202110261.png', 0, '2021-10-29 05:09:59', '2021-10-29 05:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packing_material`
--

CREATE TABLE `tbl_packing_material` (
  `id` int(10) UNSIGNED NOT NULL,
  `material_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_packing_material`
--

INSERT INTO `tbl_packing_material` (`id`, `material_type`, `rate`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Roll', 32, 0, 0, 1, NULL, '2019-05-24 11:14:16'),
(2, 'Boxes', 45, 0, 0, 1, NULL, '2019-05-24 11:14:49'),
(3, 'Tap', 38, 0, 0, 1, NULL, '2019-05-24 11:15:03'),
(4, 'Air Bubble', 7, 0, 0, 1, NULL, '2019-05-24 11:16:03'),
(5, 'Thermacol', 20, 0, 0, 1, NULL, '2019-05-24 11:16:09'),
(6, 'News Paper', 15, 0, 0, 1, NULL, '2019-05-24 11:15:46'),
(7, 'Stretch Film', 180, 0, 0, 1, NULL, '2019-05-24 11:16:23'),
(8, 'Foam Sheet', 500, 0, 0, 1, NULL, '2019-05-24 11:16:34'),
(9, 'Other', 0, 0, 0, 1, NULL, '2019-05-24 11:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_mode`
--

CREATE TABLE `tbl_payment_mode` (
  `id` int(11) NOT NULL,
  `mode_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payment_mode`
--

INSERT INTO `tbl_payment_mode` (`id`, `mode_name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 0, 0),
(2, 'Cheque', 0, 0),
(3, 'Online Payment', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_recp`
--

CREATE TABLE `tbl_payment_recp` (
  `rcp_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `invoice_amt` double(8,2) DEFAULT NULL,
  `paid_amt` double(8,2) DEFAULT NULL,
  `bal_amt` double(8,2) DEFAULT NULL,
  `previous_tds` double(8,2) DEFAULT NULL,
  `cur_paid_amt` double(8,2) DEFAULT NULL,
  `cur_tds` double(8,2) DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrations` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payment_recp`
--

INSERT INTO `tbl_payment_recp` (`rcp_id`, `cn_no`, `invoice_no`, `invoice_amt`, `paid_amt`, `bal_amt`, `previous_tds`, `cur_paid_amt`, `cur_tds`, `payment_mode`, `bank_name`, `narrations`, `payment_status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(29, 202110223, 3, 999999.00, 50000.00, 949998.00, 0.00, 50000.00, 1.00, 'Cash', NULL, NULL, '', 0, 1, 1, '2021-10-25 01:22:51', '2021-10-25 01:22:51'),
(34, 202112271, 9, 19200.00, 10000.00, 9200.00, 0.00, 10000.00, NULL, 'Cash', NULL, 'cc', NULL, 0, 1, 1, '2021-12-27 09:28:57', '2021-12-27 09:28:57'),
(32, 202110261, 5, 2096.00, 200.00, 1884.00, 0.00, 200.00, 12.00, 'Cash', NULL, 'NA', '', 0, 1, 1, '2021-10-27 05:08:04', '2021-10-27 05:08:04'),
(33, 202111171, 8, 6000.00, 500.00, 5500.00, 0.00, 500.00, NULL, 'Cash', NULL, NULL, NULL, 0, 1, 1, '2021-11-18 04:52:10', '2021-11-18 04:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `quot_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `transport_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `goods_value` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `other` double(8,2) DEFAULT NULL,
  `time_req_for_packing` int(11) DEFAULT NULL,
  `prior_notice` int(11) DEFAULT NULL,
  `transist_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `net_amount` double(8,2) DEFAULT NULL,
  `cost_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost_in_freight_val` double(8,2) NOT NULL,
  `cost_in_service_tax` double(8,2) NOT NULL,
  `cost_ex_ins_val` double(8,2) NOT NULL,
  `cost_ex_service_tax` double(8,2) NOT NULL,
  `quot_status` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `after_service_tax` double(8,2) NOT NULL,
  `after_insurance_amnt` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`quot_id`, `cn_no`, `transport_by`, `km`, `amount`, `goods_value`, `discount`, `other`, `time_req_for_packing`, `prior_notice`, `transist_time`, `payment_terms`, `net_amount`, `cost_type`, `cost_in_freight_val`, `cost_in_service_tax`, `cost_ex_ins_val`, `cost_ex_service_tax`, `quot_status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`, `after_service_tax`, `after_insurance_amnt`) VALUES
(1, 202110222, 'Road Transport', 27.00, 8020.00, 150000.00, 0.00, 0.00, 2, 1, '2', '2000', 13964.00, 'cost_exclude2', 3.00, 18.00, 3.00, 18.00, 'Generated', 0, 1, 1, '2021-10-22 04:33:45', '2021-10-25 07:13:19', 1444.00, 4500.00),
(4, 202110261, 'Road Transport', 5.00, 2008.00, 15000.00, 100.00, 0.00, 5, 2, '5', '1000', 2396.00, 'cost_exclude2', 3.00, 18.00, 3.00, 2.00, 'Generated', 0, 1, 1, '2021-10-27 04:55:32', '2021-10-28 01:56:22', 38.00, 450.00),
(5, 202111091, 'Road Transport', 3.00, 549.00, 8000.00, 0.00, NULL, 12, 1, '1', '100', 808.00, 'cost_exclude2', 0.00, 0.00, 2.00, 18.00, 'Generated', 0, 1, 1, '2021-11-09 04:34:07', '2021-11-09 04:34:07', 99.00, 160.00),
(6, 202111092, 'Road Transport', 30.00, 1794.00, 500000.00, 0.00, 0.00, 1, 2, '2', '1000', 1794.00, 'cost_include1', 3.00, 18.00, 0.00, 0.00, 'Generated', 0, 1, 1, '2021-11-09 05:06:48', '2021-11-11 00:47:46', 0.00, 0.00),
(7, 202111171, 'Road Transport', 15.00, 6000.00, -1000.00, 0.00, 0.00, 4, 1, '2', '1000', 6000.00, 'cost_include1', 3.00, 18.00, 0.00, 0.00, 'Generated', 0, 1, 1, '2021-11-18 01:08:47', '2021-11-18 01:21:34', 0.00, 0.00),
(8, 202111193, 'Road Transport', 5.00, 5880.00, 10000.00, 0.00, NULL, NULL, NULL, NULL, NULL, 5880.00, 'cost_include1', 3.00, 18.00, 0.00, 0.00, 'Generated', 0, 1, 1, '2021-11-29 04:04:21', '2021-11-29 04:04:21', 0.00, 0.00),
(9, 202112271, 'Road Transport', 170.00, 15000.00, 50000.00, 0.00, NULL, 1, 3, '2', '40', 19200.00, 'cost_exclude2', 0.00, 0.00, 3.00, 18.00, 'Generated', 0, 1, 1, '2021-12-27 09:22:16', '2021-12-27 09:22:16', 2700.00, 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_terms_condn`
--

CREATE TABLE `tbl_quotation_terms_condn` (
  `id` int(11) NOT NULL,
  `quot_id` int(11) NOT NULL,
  `terms_cond` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_quotation_terms_condn`
--

INSERT INTO `tbl_quotation_terms_condn` (`id`, `quot_id`, `terms_cond`, `created_at`, `updated_at`) VALUES
(351, 1, 'no', '2021-10-22 04:33:45', '2021-10-22 04:33:45'),
(352, 1, NULL, '2021-10-22 04:48:09', '2021-10-22 04:48:09'),
(353, 2, NULL, '2021-10-24 23:32:32', '2021-10-24 23:32:32'),
(354, 2, NULL, '2021-10-24 23:33:48', '2021-10-24 23:33:48'),
(355, 2, NULL, '2021-10-24 23:34:13', '2021-10-24 23:34:13'),
(356, 2, NULL, '2021-10-24 23:37:48', '2021-10-24 23:37:48'),
(357, 2, NULL, '2021-10-24 23:38:03', '2021-10-24 23:38:03'),
(358, 2, NULL, '2021-10-24 23:40:08', '2021-10-24 23:40:08'),
(359, 3, NULL, '2021-10-25 01:20:56', '2021-10-25 01:20:56'),
(360, 1, NULL, '2021-10-25 07:13:19', '2021-10-25 07:13:19'),
(361, 3, NULL, '2021-10-26 02:33:26', '2021-10-26 02:33:26'),
(362, 4, 'NA', '2021-10-27 04:55:32', '2021-10-27 04:55:32'),
(363, 4, NULL, '2021-10-28 01:56:10', '2021-10-28 01:56:10'),
(364, 4, NULL, '2021-10-28 01:56:22', '2021-10-28 01:56:22'),
(365, 5, 'NA', '2021-11-09 04:34:07', '2021-11-09 04:34:07'),
(366, 6, NULL, '2021-11-09 05:06:48', '2021-11-09 05:06:48'),
(367, 6, NULL, '2021-11-09 05:06:48', '2021-11-09 05:06:48'),
(368, 6, NULL, '2021-11-11 00:47:46', '2021-11-11 00:47:46'),
(369, 7, NULL, '2021-11-18 01:08:47', '2021-11-18 01:08:47'),
(370, 7, NULL, '2021-11-18 01:21:34', '2021-11-18 01:21:34'),
(371, 8, NULL, '2021-11-29 04:04:21', '2021-11-29 04:04:21'),
(372, 9, 'tcs', '2021-12-27 09:22:16', '2021-12-27 09:22:16'),
(373, 9, NULL, '2021-12-27 09:22:16', '2021-12-27 09:22:16'),
(374, 9, NULL, '2021-12-27 09:22:16', '2021-12-27 09:22:16'),
(375, 9, NULL, '2021-12-27 09:22:16', '2021-12-27 09:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_survey`
--

CREATE TABLE `tbl_schedule_survey` (
  `sch_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` time NOT NULL,
  `assing_emp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schedule_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_schedule_survey`
--

INSERT INTO `tbl_schedule_survey` (`sch_id`, `cn_no`, `schedule_date`, `schedule_time`, `assing_emp`, `schedule_status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 202110202, '2021-10-20', '12:02:00', '1', 'Complete', 1, 1, 1, '2021-10-20 07:02:43', '2021-11-18 01:17:46'),
(5, 202110222, '2021-10-24', '15:00:00', '1', 'Complete', 1, 1, 1, '2021-10-22 00:29:19', '2021-11-18 01:22:08'),
(6, 202110223, '2021-10-24', '13:00:00', '1', 'Complete', 0, 1, 1, '2021-10-22 05:05:53', '2021-11-18 01:13:26'),
(8, 202110251, '2021-10-25', '12:55:00', '1', 'Complete', 0, 1, 1, '2021-10-25 07:55:09', '2021-10-25 07:56:59'),
(9, 202110261, '2021-10-28', '07:00:00', '1', 'Complete', 1, 1, 1, '2021-10-26 04:11:45', '2021-11-17 01:22:28'),
(10, 202110301, '2021-10-30', '07:28:00', '2', 'Complete', 0, 2, 0, '2021-10-30 02:28:19', '2021-10-30 02:28:19'),
(11, 202111091, '2021-11-11', '09:00:00', '2', 'Complete', 0, 1, 1, '2021-11-09 01:28:20', '2021-11-09 02:01:03'),
(12, 202111092, '2021-11-15', '01:02:00', '3', 'Complete', 0, 1, 1, '2021-11-09 04:50:01', '2021-11-09 04:52:27'),
(13, 202111093, '2021-11-10', '12:00:00', '3', 'Complete', 0, 1, 1, '2021-11-09 08:46:43', '2021-11-09 09:10:01'),
(14, 202111093, '2021-11-24', '12:00:00', '3', 'Complete', 0, 1, 1, '2021-11-09 08:47:57', '2021-11-09 09:10:01'),
(15, 202111171, '2021-11-27', '10:00:00', '2', 'Complete', 0, 1, 1, '2021-11-17 01:10:06', '2021-11-17 04:02:04'),
(16, 202111193, '2021-11-29', '08:45:00', '2', 'Complete', 0, 1, 1, '2021-11-29 03:45:10', '2021-11-29 03:58:57'),
(17, 202112271, '2021-12-27', '14:15:00', '1', 'Complete', 0, 1, 1, '2021-12-27 09:15:15', '2021-12-27 09:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_integration`
--

CREATE TABLE `tbl_sms_integration` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_integration`
--

INSERT INTO `tbl_sms_integration` (`id`, `sender_id`, `user_name`, `password`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'CMISPUNE', 'puretech', 'Jayhanuman@8657', '1', '2019-04-24 11:17:15', '2021-10-30 01:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_template`
--

CREATE TABLE `tbl_sms_template` (
  `id` int(10) UNSIGNED NOT NULL,
  `sms_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sms_body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_template`
--

INSERT INTO `tbl_sms_template` (`id`, `sms_for`, `sms_body`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Add enquiry to customer', 'Thanks for contacting Safemove Packers & Movers. Your enquiry no is $co_no . We have sent you an email with some useful links. Please call us at 073-7771-7771 if you have any queries.', 0, 0, 1, '2019-04-26 17:43:13', '2021-11-24 06:17:07'),
(2, 'Survey schedule to customer', 'Dear Sir/Madam, We have scheduled for the survey of goods on dated : $schedule_date at :$schedule_time.', 0, 1, 1, '2019-04-26 18:08:37', '2021-11-24 06:18:08'),
(3, 'Survey schedule to employee', 'Dear Employee, We have assigned survey schedule for CN NO - $cnno on dated : $schedule_date at :$schedule_time .', 0, 1, 1, '2019-04-26 18:10:23', '2020-02-12 12:40:49'),
(4, 'Survey Complete to creator', 'Dear Sir/Madam, Survey complete for CN No - $cn_no', 0, 1, 1, '2019-04-26 18:28:20', '2019-04-26 18:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_source_expenss`
--

CREATE TABLE `tbl_source_expenss` (
  `id` int(10) UNSIGNED NOT NULL,
  `sd_exp_id` int(11) NOT NULL,
  `cn_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_source_expenss`
--

INSERT INTO `tbl_source_expenss` (`id`, `sd_exp_id`, `cn_no`, `expense_cat`, `cost`, `payment_mode`, `narration`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '201906283', 'Packaging Material', 2000.00, 'Cash', '', 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:26:59'),
(2, 1, '201906283', 'Goods Transportation', 2000.00, 'Cash', '', 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:26:59'),
(3, 1, '201906283', 'Loading Costing', 1500.00, 'Cash', '', 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:26:59'),
(4, 1, '201906283', 'Labour Charge', 500.00, 'Cash', '', 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:26:59'),
(5, 1, '201906283', 'Naka', 200.00, 'Cash', '', 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:26:59'),
(6, 1, '201906283', 'Fooding', 100.00, 'Cash', '', 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:26:59'),
(7, 2, '202102033', 'Packaging Material', 6733.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(8, 2, '202102033', 'Goods Transportation', 1600.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(9, 2, '202102033', 'Insurance', 50000.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(10, 2, '202102033', 'Service Tax', 241.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(11, 2, '202102033', 'Loading Costing', 1500.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(12, 2, '202102033', 'Labour Charge', 500.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(13, 2, '202102033', 'Naka', 200.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(14, 2, '202102033', 'Fooding', 100.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(15, 2, '202102033', 'Miscellaneous', 197.00, 'Cash', '', 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(16, 3, '202102033', 'Packaging Material', 6733.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(17, 3, '202102033', 'Goods Transportation', 1600.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(18, 3, '202102033', 'Insurance', 50000.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(19, 3, '202102033', 'Service Tax', 241.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(20, 3, '202102033', 'Loading Costing', 1500.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(21, 3, '202102033', 'Labour Charge', 500.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(22, 3, '202102033', 'Naka', 500.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(23, 3, '202102033', 'Fooding', 1000.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(24, 3, '202102033', 'Miscellaneous', 100.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(25, 3, '202102033', 'Other 1', 100.00, 'Cash', '', 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(26, 4, '202102041', 'Packaging Material', 1000.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(27, 4, '202102041', 'Goods Transportation', 4000.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(28, 4, '202102041', 'Vehical Transportation', 5000.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(29, 4, '202102041', 'Insurance', 3000.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(30, 4, '202102041', 'Service Tax', 49.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(31, 4, '202102041', 'Local Transportation', 2500.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(32, 4, '202102041', 'Loading Costing', 600.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(33, 4, '202102041', 'Labour Charge', 600.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(34, 4, '202102041', 'Naka', 1000.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(35, 4, '202102041', 'Fooding', 2000.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(36, 4, '202102041', 'Miscellaneous', 300.00, 'Cash', '', 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(37, 7, '202111092', 'Packaging Material', 1495.00, 'Cash', NULL, 1, 1, '2021-11-12 01:05:42', '2021-11-12 01:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_src_dest_expenss`
--

CREATE TABLE `tbl_src_dest_expenss` (
  `id` int(10) UNSIGNED NOT NULL,
  `cn_no` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `source_total` double(8,2) NOT NULL,
  `dest_total` double(8,2) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `isdelete` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_src_dest_expenss`
--

INSERT INTO `tbl_src_dest_expenss` (`id`, `cn_no`, `source_total`, `dest_total`, `total`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '201906283', 6300.00, 2700.00, 32500.00, 0, 1, 1, '2019-06-28 16:26:59', '2019-06-28 16:27:36'),
(2, '202102033', 60830.00, 1000.00, 60830.00, 0, 1, 1, '2021-02-04 17:05:44', '2021-02-04 17:05:44'),
(3, '202102033', 62033.00, 50000.00, 62033.00, 0, 1, 1, '2021-02-04 17:14:14', '2021-02-04 17:14:14'),
(4, '202102041', 20000.00, 4500.00, 20000.00, 0, 1, 1, '2021-02-05 16:42:18', '2021-02-05 16:42:18'),
(5, '202110223', 999999.99, 2000.00, 999999.99, 0, 1, 1, '2021-10-25 01:52:19', '2021-10-25 01:55:24'),
(6, '202111092', 1495.00, 0.00, 2990.00, 0, 1, 1, '2021-11-12 01:00:12', '2021-11-12 01:04:53'),
(7, '202111092', 1495.00, NULL, 1495.00, 0, 1, 1, '2021-11-12 01:05:42', '2021-11-12 01:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `survey_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `survey_date` date NOT NULL,
  `laboure_req` int(11) NOT NULL,
  `total_costing_amt` double(8,2) NOT NULL,
  `total_pack_mat_amt` double(8,2) NOT NULL,
  `margin` double(8,2) NOT NULL,
  `total_quot_amt` double(8,2) NOT NULL,
  `goods_value` double(8,2) NOT NULL,
  `survey_status` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `survey_remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_survey`
--

INSERT INTO `tbl_survey` (`survey_id`, `cn_no`, `survey_date`, `laboure_req`, `total_costing_amt`, `total_pack_mat_amt`, `margin`, `total_quot_amt`, `goods_value`, `survey_status`, `survey_remark`, `created_at`, `updated_at`, `created_by`, `updated_by`, `isdelete`) VALUES
(1, 202110222, '2021-10-22', 5, 6000.00, 1292.00, 20.00, 8750.00, 150000.00, 'Complete', 'NA', '2021-10-22 04:30:25', '2021-11-19 02:37:01', 1, 1, 1),
(2, 202110223, '2021-10-25', 3, 1100.00, 6200.00, 20.00, 6900.00, 150000.00, 'Complete', NULL, '2021-10-24 23:23:35', '2021-11-29 03:39:16', 1, 1, 1),
(3, 202110261, '2021-10-27', 3, 0.00, 1674.00, 20.00, 2008.80, 15000.00, 'Complete', NULL, '2021-10-27 01:50:19', '2021-11-19 02:37:09', 1, 1, 1),
(4, 202111091, '2021-11-09', 3, 0.00, 611.00, 20.00, 549.65, 8000.00, 'Complete', NULL, '2021-11-09 02:03:44', '2021-11-09 02:03:44', 1, 0, 0),
(5, 202111092, '2021-11-09', 3, 0.00, 1495.00, 20.00, 1794.00, 500000.00, 'Complete', NULL, '2021-11-09 05:02:59', '2021-11-09 05:02:59', 1, 0, 0),
(6, 202111171, '2021-11-18', 3, 3000.00, 2000.00, 20.00, 6000.00, -1000.00, 'Complete', NULL, '2021-11-18 00:10:40', '2021-11-18 00:10:40', 1, 0, 0),
(7, 202111193, '2021-11-29', 3, 2900.00, 2000.00, 20.00, 5880.00, 10000.00, 'Complete', NULL, '2021-11-29 04:01:52', '2021-11-29 04:01:52', 1, 0, 0),
(8, 202112271, '2021-12-27', 3, 9500.00, 3000.00, 20.00, 15000.00, 50000.00, 'Complete', NULL, '2021-12-27 09:19:01', '2021-12-27 09:19:01', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_costing`
--

CREATE TABLE `tbl_survey_costing` (
  `costing_id` int(10) UNSIGNED NOT NULL,
  `survey_id` int(11) NOT NULL,
  `loading_chrg` double(8,2) NOT NULL,
  `local_transp` double(8,2) NOT NULL,
  `transportation_chrg` double(8,2) NOT NULL,
  `unloading_chrg` double(8,2) NOT NULL,
  `delivery_chrg` double(8,2) NOT NULL,
  `car_transp_chrg` double(8,2) NOT NULL,
  `other_chrg` double(8,2) NOT NULL,
  `total_costing` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_survey_costing`
--

INSERT INTO `tbl_survey_costing` (`costing_id`, `survey_id`, `loading_chrg`, `local_transp`, `transportation_chrg`, `unloading_chrg`, `delivery_chrg`, `car_transp_chrg`, `other_chrg`, `total_costing`, `created_at`, `updated_at`) VALUES
(201, 1, 2800.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 200.00, 6000.00, '2021-10-22 04:30:25', '2021-10-25 07:07:56'),
(202, 2, 100.00, 0.00, 500.00, 0.00, 500.00, 0.00, 0.00, 1100.00, '2021-10-24 23:23:35', '2021-10-24 23:28:40'),
(203, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2021-10-27 01:50:19', '2021-10-27 01:50:19'),
(204, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2021-11-09 02:03:44', '2021-11-09 02:03:44'),
(205, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2021-11-09 05:02:59', '2021-11-09 05:02:59'),
(206, 6, 1500.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 0.00, 3000.00, '2021-11-18 00:10:40', '2021-11-18 00:10:40'),
(207, 7, 1500.00, 0.00, 1400.00, 0.00, 0.00, 0.00, 0.00, 2900.00, '2021-11-29 04:01:52', '2021-11-29 04:01:52'),
(208, 8, 3500.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 9500.00, '2021-12-27 09:19:01', '2021-12-27 09:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_packing_mate`
--

CREATE TABLE `tbl_survey_packing_mate` (
  `pack_id` int(10) UNSIGNED NOT NULL,
  `survey_id` int(11) NOT NULL,
  `roll_qty` int(11) DEFAULT NULL,
  `roll_price` double(8,2) NOT NULL,
  `roll_total_amt` double(8,2) NOT NULL,
  `tap_qty` int(11) NOT NULL,
  `tap_price` double(8,2) NOT NULL,
  `tap_total_amt` double(8,2) NOT NULL,
  `boxes_qty` int(11) NOT NULL,
  `boxes_price` double(8,2) NOT NULL,
  `boxes_total_amt` double(8,2) NOT NULL,
  `airbubble_qty` int(11) NOT NULL,
  `airbubble_price` double(8,2) NOT NULL,
  `airbubble_total_amt` double(8,2) NOT NULL,
  `thermacol_qty` int(11) NOT NULL,
  `thermacol_price` double(8,2) NOT NULL,
  `thermacol_total_amt` double(8,2) NOT NULL,
  `newspaper_qty` int(11) NOT NULL,
  `newpaper_price` double(8,2) NOT NULL,
  `newspaper_total_amt` double(8,2) NOT NULL,
  `strfilm_qty` int(11) NOT NULL,
  `strfilm_price` double(8,2) NOT NULL,
  `strfilm_total_amt` double(8,2) NOT NULL,
  `foamsheet_qty` int(11) NOT NULL,
  `foamsheet_price` double(8,2) NOT NULL,
  `foamsheet_total_amt` double(8,2) NOT NULL,
  `other_qty` int(11) DEFAULT NULL,
  `other_price` double(8,2) NOT NULL,
  `other_total_amt` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_survey_packing_mate`
--

INSERT INTO `tbl_survey_packing_mate` (`pack_id`, `survey_id`, `roll_qty`, `roll_price`, `roll_total_amt`, `tap_qty`, `tap_price`, `tap_total_amt`, `boxes_qty`, `boxes_price`, `boxes_total_amt`, `airbubble_qty`, `airbubble_price`, `airbubble_total_amt`, `thermacol_qty`, `thermacol_price`, `thermacol_total_amt`, `newspaper_qty`, `newpaper_price`, `newspaper_total_amt`, `strfilm_qty`, `strfilm_price`, `strfilm_total_amt`, `foamsheet_qty`, `foamsheet_price`, `foamsheet_total_amt`, `other_qty`, `other_price`, `other_total_amt`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 32.00, 32.00, 101, 38.00, 380.00, 11, 45.00, 45.00, 6, 20.00, 120.00, 1, 20.00, 20.00, 1, 15.00, 15.00, 11, 180.00, 180.00, 1, 500.00, 500.00, 0, 0.00, 0.00, '2021-10-22 04:30:25', '2021-10-25 07:07:56'),
(2, 3, 2, 32.00, 64.00, 2, 38.00, 76.00, 2, 45.00, 90.00, 2, 7.00, 14.00, 2, 20.00, 40.00, 2, 15.00, 30.00, 2, 180.00, 360.00, 2, 500.00, 1000.00, 2, 0.00, 0.00, '2021-10-27 01:50:19', '2021-10-27 01:50:19'),
(3, 4, 1, 32.00, 32.00, 2, 38.00, 76.00, 5, 45.00, 225.00, 4, 7.00, 28.00, 2, 20.00, 40.00, 2, 15.00, 30.00, 1, 180.00, 180.00, 0, 500.00, 0.00, 0, 0.00, 0.00, '2021-11-09 02:03:44', '2021-11-09 02:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking`
--

CREATE TABLE `tbl_tracking` (
  `tr_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `cn_no` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `transist_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tracking`
--

INSERT INTO `tbl_tracking` (`tr_id`, `invoice_no`, `cn_no`, `start_date`, `end_date`, `transist_day`, `created_by`, `updated_by`, `isdelete`, `created_at`, `updated_at`) VALUES
(1, 1, 201905311, '2019-06-08', '2019-06-09', '1', 1, 0, 0, '2019-05-31 17:55:24', '2019-05-31 17:55:24'),
(2, 0, 201906283, '2019-06-30', '2019-07-02', '', 1, 1, 1, '2019-06-28 16:20:27', '2019-09-14 17:10:46'),
(3, 25156, 202001016, '2020-01-01', '2020-01-02', '', 7, 7, 0, '2020-01-01 14:41:49', '2020-01-01 14:42:23'),
(4, 41, 202102011, '2021-02-11', '2021-02-16', '', 1, 0, 0, '2021-02-03 18:09:59', '2021-02-03 18:09:59'),
(5, 42, 202102033, '2021-02-11', '2021-02-13', '', 1, 0, 0, '2021-02-04 18:57:32', '2021-02-04 18:57:32'),
(6, 43, 202102041, '2021-02-18', '2021-02-19', '', 1, 0, 0, '2021-02-05 16:58:46', '2021-02-05 16:58:46'),
(7, 3, 202110223, '2021-10-26', '2021-10-27', '2', 1, 1, 1, '2021-10-25 06:10:46', '2021-11-19 02:28:40'),
(8, 5, 202110261, '2021-10-30', '2021-10-31', '2', 1, 1, 1, '2021-10-30 00:27:51', '2021-11-30 04:54:02'),
(9, 8, 202111171, '2021-11-26', '2021-11-30', '1', 1, 0, 0, '2021-11-24 05:32:39', '2021-11-24 05:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking_details`
--

CREATE TABLE `tbl_tracking_details` (
  `trd_id` int(10) UNSIGNED NOT NULL,
  `tr_id` int(11) NOT NULL,
  `cn_no` int(11) NOT NULL,
  `tracking_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tracking_date` date NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tracking_details`
--

INSERT INTO `tbl_tracking_details` (`trd_id`, `tr_id`, `cn_no`, `tracking_status`, `tracking_date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 201905311, 'Delivered', '2019-06-09', 'at destination', '2019-05-31 17:55:24', '2019-05-31 17:55:24'),
(2, 1, 201905311, 'Pick Up', '2019-06-08', 'at source', '2019-05-31 18:25:28', '2019-05-31 18:25:28'),
(3, 2, 201906283, 'Pick Up', '2019-06-30', 'pick up', '2019-06-28 16:20:27', '2019-06-28 16:20:27'),
(4, 2, 201906283, 'In Transit', '2019-06-01', 'in transit', '2019-06-28 16:20:27', '2019-06-28 16:20:27'),
(5, 2, 201906283, 'Delay', '2019-06-02', 'due rain', '2019-06-28 16:20:27', '2019-06-28 16:20:27'),
(6, 2, 201906283, 'Delivered', '2019-06-03', 'at destination', '2019-06-28 16:20:27', '2019-06-28 16:20:27'),
(7, 1, 201905311, 'Pick Up', '2019-12-21', 'lonawla', '2019-12-21 20:13:43', '2019-12-21 20:13:43'),
(8, 1, 201905311, 'In Transit', '2019-12-21', 'lonawla', '2019-12-21 20:13:43', '2019-12-21 20:13:43'),
(9, 3, 202001016, 'Pick Up', '2020-01-01', 'pune picup in wakas', '2020-01-01 14:41:49', '2020-01-01 14:42:23'),
(10, 4, 202102011, 'In Transit', '2021-02-15', 'on the way', '2021-02-03 18:09:59', '2021-02-03 18:09:59'),
(11, 4, 202102011, 'Delivered', '2021-02-16', '', '2021-02-03 18:09:59', '2021-02-03 18:09:59'),
(12, 5, 202102033, 'Pick Up', '2021-02-11', '', '2021-02-04 18:57:32', '2021-02-04 18:57:32'),
(13, 6, 202102041, 'Pick Up', '2021-02-18', '', '2021-02-05 16:58:46', '2021-02-05 16:58:46'),
(14, 7, 202110223, 'Pick Up', '2021-02-22', 'na', '2021-10-25 06:10:46', '2021-10-25 06:10:46'),
(15, 8, 202110261, 'Delay', '2021-05-05', 'NA', '2021-10-30 00:27:51', '2021-11-12 04:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport_agent`
--

CREATE TABLE `tbl_transport_agent` (
  `id` int(10) UNSIGNED NOT NULL,
  `trans_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `trans_agent_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no2` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no3` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_transport_agent`
--

INSERT INTO `tbl_transport_agent` (`id`, `trans_name`, `trans_agent_name`, `contact_no`, `contact_no2`, `contact_no3`, `contact_email`, `address`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 'ABC Transport service', '9403586512', NULL, NULL, 'harshad@puretechnology.in', 'wakad', 1, 1, 1, '2019-04-26 16:06:51', '2019-09-25 19:00:54'),
(2, '', 'pune to mumbai (shree ganesh rodline)', '9326997094', NULL, NULL, 'shreeganeshrodline@gmail.com', 'nigdi transportnagar pune', 0, 1, 1, '2019-09-25 19:00:44', '2019-09-25 19:04:47'),
(3, '', 'poona gujrat road carrier', '9021035852', '8999897361', '8600511994', 'kdparmars@gmail.com', 'Transport nagar , nigdi.', 0, 1, 1, '2019-12-21 13:26:38', '2019-12-21 13:26:38'),
(4, 'South Andhra Roadlines', 'Juber Shaikh', '9422311200', '9326758555', '', 'contact@safemove.in', 'plot no.64,c/o kohinoor compound,nigdi,pune.', 0, 1, 1, '2020-03-13 12:07:12', '2020-03-13 12:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport_enq`
--

CREATE TABLE `tbl_transport_enq` (
  `id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `good_trans_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehi_trans_agent` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `good_amount` double(8,2) DEFAULT NULL,
  `gud_transist_time` int(11) DEFAULT NULL,
  `vehical_amount` float(8,2) DEFAULT NULL,
  `veh_tansist_time` int(11) DEFAULT NULL,
  `good_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `narration` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_transport_enq`
--

INSERT INTO `tbl_transport_enq` (`id`, `cn_no`, `good_trans_agent`, `vehi_trans_agent`, `good_amount`, `gud_transist_time`, `vehical_amount`, `veh_tansist_time`, `good_type`, `narration`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 201909182, 'poona gujrat road carrier', 'poona gujrat road carrier', 45000.00, 2, 20000.00, 2, 'IT Goods', 'fast  gg', 1, '1', '1', '2019-12-21 19:19:21', '2021-02-08 07:55:42'),
(2, 201909211, ' pune to mumbai (shree ganesh rodline)', '', 10000.00, 3, 0.00, 0, 'Household Goods', '', 1, '1', '1', '2019-12-23 20:21:58', '2021-10-20 07:36:34'),
(3, 201905313, ' pune to mumbai (shree ganesh rodline)', '', 3000.00, 2, 0.00, 0, 'Entertainment Centre Goods', 'abc', 1, '1', '1', '2020-01-23 11:39:49', '2021-10-28 01:19:44'),
(4, 202003131, '', '', 0.00, 0, 0.00, 0, 'Household Goods', '', 1, '1', '1', '2020-03-13 16:56:25', '2021-10-28 01:19:52'),
(5, 202102011, ' pune to mumbai (shree ganesh rodline)', 'poona gujrat road carrier', 2700.00, 3, 2700.00, 5, 'Household Goods', '', 1, '1', '1', '2021-02-03 18:00:44', '2021-11-19 02:28:58'),
(6, 202102033, 'poona gujrat road carrier', 'poona gujrat road carrier', 1000.00, 5, 6000.00, 5, 'IT Goods', '', 0, '1', '', '2021-02-04 18:44:13', '2021-02-04 18:44:13'),
(7, 202102041, 'poona gujrat road carrier', 'poona gujrat road carrier', 2000.00, 5, 20000.00, 5, 'IT Goods', '', 0, '1', '', '2021-02-05 16:32:36', '2021-02-05 16:32:36'),
(8, 202102072, ' pune to mumbai (shree ganesh rodline)', '', 2700.00, 3, 0.00, 0, 'Household Goods', '', 0, '1', '', '2021-02-08 07:25:39', '2021-02-08 07:25:39'),
(9, 202110202, '', '', 5000.00, 1, 5000.00, 1, 'Medical Equipment', 'hdjkh', 1, '1', '1', '2021-10-20 07:36:13', '2021-10-20 07:43:26'),
(10, 202110223, 'pune to mumbai (shree ganesh rodline)', 'pune to mumbai (shree ganesh rodline)', 2700.00, 10000, 5000.00, 12, 'Factory Products', NULL, 0, '1', '', '2021-10-25 05:46:40', '2021-10-25 05:46:40'),
(11, 202110223, 'pune to mumbai (shree ganesh rodline)', 'pune to mumbai (shree ganesh rodline)', 5000.00, 1, 4000.00, 1, 'Factory Products', 'no', 0, '1', '', '2021-10-25 05:57:09', '2021-10-25 05:57:09'),
(12, 202110261, 'pune to mumbai (shree ganesh rodline)', 'pune to mumbai (shree ganesh rodline)', 2000.00, 1, 1000.00, 2, 'Household Goods', 'NA', 0, '1', '', '2021-10-27 23:31:20', '2021-10-27 23:31:20'),
(13, 202110261, 'poona gujrat road carrier', 'poona gujrat road carrier', 2000.00, 1, 1000.00, 2, 'Household Goods', 'NA', 0, '1', '', '2021-10-28 04:21:38', '2021-10-28 04:21:38'),
(14, 202111091, NULL, NULL, NULL, NULL, NULL, NULL, 'Office Goods', NULL, 1, '1', '1', '2021-11-09 06:16:00', '2021-11-11 01:04:58'),
(15, 202111092, NULL, NULL, NULL, NULL, NULL, NULL, 'Household Goods', NULL, 1, '1', '1', '2021-11-11 01:04:43', '2021-11-11 01:05:11'),
(16, 202111092, NULL, NULL, NULL, NULL, NULL, NULL, 'Household Goods', NULL, 1, '1', '1', '2021-11-11 01:07:28', '2021-11-12 00:57:16'),
(17, 202111093, NULL, NULL, NULL, NULL, NULL, NULL, 'Household Goods', NULL, 1, '1', '1', '2021-11-12 00:57:58', '2021-11-12 00:58:29'),
(18, 202111171, NULL, NULL, NULL, NULL, NULL, NULL, 'IT Goods', NULL, 0, '1', '', '2021-11-18 04:53:06', '2021-11-18 04:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport_payment`
--

CREATE TABLE `tbl_transport_payment` (
  `trp_id` int(10) UNSIGNED NOT NULL,
  `cn_no` int(11) NOT NULL,
  `payment_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_be_paid_at` double(8,2) NOT NULL,
  `trans_amt` double(8,2) NOT NULL,
  `paid_amt` double(8,2) NOT NULL,
  `bal_amt` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `trans_type` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `narrations` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdelete` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_transport_payment`
--

INSERT INTO `tbl_transport_payment` (`trp_id`, `cn_no`, `payment_to`, `payment_mode`, `bank_name`, `to_be_paid_at`, `trans_amt`, `paid_amt`, `bal_amt`, `amount`, `trans_type`, `narrations`, `trans_status`, `isdelete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 201909211, ' pune to mumbai (shree ganesh rodline)', 'Cash', '', 0.00, 10000.00, 5000.00, 5000.00, 5000.00, '', '', 'Payment Paid', 0, 1, 1, '2020-01-03 14:23:30', '2020-01-03 14:23:30'),
(2, 201905313, 'poona gujrat road carrier', 'Cash', '', 0.00, 3000.00, 3000.00, 0.00, 3000.00, '', '', 'Payment Paid', 0, 1, 1, '2020-01-23 11:41:22', '2020-01-23 11:41:22'),
(3, 201905313, 'poona gujrat road carrier', 'Cash', '', 0.00, 3000.00, 3000.00, 0.00, 3000.00, '', '', 'Payment Paid', 0, 1, 1, '2020-01-23 11:42:28', '2020-01-23 11:42:28'),
(10, 202110261, 'pune to mumbai (shree ganesh rodline)', 'Cash', NULL, 0.00, 2000.00, 0.00, 800.00, 1200.00, 'By Road', 'NA', 'Payment Paid', 0, 1, 1, '2021-10-28 06:59:42', '2021-10-28 06:59:42'),
(11, 202111171, 'pune to mumbai (shree ganesh rodline)', 'Cash', NULL, 0.00, 2000.00, 0.00, 1500.00, 500.00, 'By Road', NULL, 'Payment Paid', 0, 1, 1, '2021-11-18 04:55:13', '2021-11-19 02:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_of_packing`
--

CREATE TABLE `tbl_type_of_packing` (
  `id` int(11) NOT NULL,
  `type_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_type_of_packing`
--

INSERT INTO `tbl_type_of_packing` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Case', '2019-05-07 10:44:52', '0000-00-00 00:00:00'),
(2, 'Box', '2019-05-07 10:44:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_of_risk`
--

CREATE TABLE `tbl_type_of_risk` (
  `id` int(11) NOT NULL,
  `risk_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_type_of_risk`
--

INSERT INTO `tbl_type_of_risk` (`id`, `risk_name`, `created_at`, `updated_at`) VALUES
(1, 'Owner Risk', '2019-05-07 10:48:48', '0000-00-00 00:00:00'),
(2, 'Carrier\'s Risk', '2019-05-07 10:48:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_category`
--

CREATE TABLE `tbl_vehicle_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicle_category`
--

INSERT INTO `tbl_vehicle_category` (`id`, `name`) VALUES
(1, 'Esteem'),
(2, '800cc'),
(3, 'Honda Yuga'),
(4, 'Honda 125 cc'),
(5, 'Dost'),
(6, 'BENZ'),
(7, 'Bullet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dribbble` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `address`, `phone`, `country`, `date_of_birth`, `role`, `status`, `gender`, `image`, `google`, `facebook`, `twitter`, `linkedin`, `skype`, `dribbble`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shruti', 'Mirajkar', 'admin123', 'admin@safemove.in', '$2y$10$am0kwOHcpgtM/X/Y7gtFFu./qh2XWleTAeuBTrpm8g8HKYfRdCczm', 'Pune', '9970111283', 'India', '02/06/1989', 'Admin', 'Active', 'Female', '1636710335.png', NULL, NULL, NULL, NULL, NULL, NULL, 'bHrVarhzy64jbc9RQAthitnrhd5OwV01eaTOm3YwtgqbiqgGxirn1I8srMhB', '2019-03-08 09:39:57', '2021-11-12 04:45:35'),
(2, 'Ravi', 'Deshpande', 'ravi@gmail.com', 'abc@gmail.com', '$2y$10$FnnHOl0VbZo3c/qs1rHxIedPf9mhICasOqxM680BccQsuewPKaXi6', 'highway', '9078902121', 'India', '11/01/1990', 'Admin', 'Active', 'Male', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-30 01:03:09', '2021-10-30 01:03:09'),
(3, 'Aakash', 'Kothule', 'sample@gmail.com', 'Sample@gmail.com', '$2y$10$YOcRjXGxVqpkeiNhpFw1sOXmVrNJI4N1x1lmS/WKDmwyrw2OHcEYq', 'pune', '8830705470', 'India', '11/24/2021', 'Marketing', 'Active', 'Male', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 04:42:58', '2021-11-09 04:42:58'),
(4, 'aakash', 'Kothule', 'admin@safemove.in', 'aakash@puretechnology.in', '$2y$10$VzYvglmMuscFwoxPn/K1AODif0gEyYQ2zlIOrFs/Ds9XOeViOsdiu', 'Office No-603, White Square, Hinjewadi-Wakad Road Near Wakad Bridge, Hinjewadi phase 1', '8830707070', 'India', '11/03/2021', 'Admin', 'Active', 'Male', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-19 02:52:15', '2021-11-30 06:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longtude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `description`, `user_id`, `ip_address`, `latitude`, `longtude`, `user_agent`, `created_at`) VALUES
(1, 'Roles wise permission Update', 1, '58.146.116.106', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '2019-03-08 12:46:16'),
(2, 'Roles wise permission Update', 1, '58.146.116.106', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '2019-03-08 12:46:21'),
(3, 'User Updated.', 1, '49.35.91.203', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '2019-03-09 06:22:42'),
(4, 'User Updated.', 1, '49.35.91.203', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '2019-03-09 06:23:22'),
(5, 'User Updated.', 1, '49.35.91.203', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '2019-03-09 06:23:35'),
(6, 'User Updated.', 1, '58.146.116.99', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '2019-03-26 08:52:27'),
(7, 'Permission Updated', 1, '58.146.116.154', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '2019-04-03 13:18:14'),
(8, 'Roles wise permission Update', 1, '58.146.116.154', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '2019-04-03 13:18:26'),
(9, 'Role Added', 1, '58.146.116.154', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '2019-04-04 11:39:38'),
(10, 'Role Updated.', 1, '58.146.116.154', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '2019-04-04 11:39:56'),
(11, 'User Updated.', 1, '45.114.193.77', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '2019-04-25 10:37:50'),
(12, 'Role Delete.', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:36:41'),
(13, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:44:35'),
(14, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:45:16'),
(15, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:45:45'),
(16, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:46:34'),
(17, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:47:07'),
(18, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:47:50'),
(19, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:48:19'),
(20, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:49:29'),
(21, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:50:23'),
(22, 'Permission Updated', 1, '103.26.58.53', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 05:50:55'),
(23, 'Permission Updated', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:26:56'),
(24, 'Permission Updated', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:27:25'),
(25, 'Permission Updated', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:27:55'),
(26, 'Roles wise permission Update', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:29:25'),
(27, 'Roles wise permission Update', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:35:41'),
(28, 'Roles wise permission Update', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:35:50'),
(29, 'Roles wise permission Update', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:37:53'),
(30, 'Roles wise permission Update', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:38:01'),
(31, 'User Updated.', 1, '103.137.152.56', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 06:43:26'),
(32, 'User Updated.', 1, '45.114.193.77', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-09 15:07:44'),
(33, 'Roles wise permission Update', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-11 10:35:30'),
(34, 'Roles wise permission Update', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-11 10:35:41'),
(35, 'User Added', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-17 10:44:22'),
(36, 'Role Updated.', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-17 10:46:33'),
(37, 'Role Added', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-17 10:49:11'),
(38, 'Roles wise permission Update', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '2019-05-17 13:04:31'),
(39, 'Roles wise permission Update', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', '2019-05-18 06:18:27'),
(40, 'Roles wise permission Update', 1, '103.230.148.251', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', '2019-05-18 06:18:41'),
(41, 'User Updated.', 1, '49.35.78.231', '', '', 'Mozilla/5.0 (iPad; CPU OS 12_3_1 like Mac OS X) AppleWebKit/607.2.6.0.1 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1', '2019-08-06 06:00:21'),
(42, 'Role Added', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:25:57'),
(43, 'User Added', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:32:51'),
(44, 'Roles wise permission Update', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:39:21'),
(45, 'Role Added', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:47:14'),
(46, 'Role Updated.', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:48:49'),
(47, 'Roles wise permission Update', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:51:15'),
(48, 'Roles wise permission Update', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 06:53:54'),
(49, 'User Added', 1, '103.51.95.136', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 07:04:39'),
(50, 'User Updated.', 6, '157.33.35.9', '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.62 Safari/537.36', '2019-10-31 16:32:53'),
(51, 'User Added', 1, '103.54.16.210', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-01 06:56:01'),
(52, 'User Updated.', 1, '103.54.16.210', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-01 08:09:45'),
(53, 'User Updated.', 1, '103.54.16.210', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-01 08:11:03'),
(54, 'User Delete.', 1, '103.51.95.150', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '2020-03-21 05:30:29'),
(55, 'User Updated.', 1, '103.51.95.150', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '2020-03-21 05:32:02'),
(56, 'User Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:32:09'),
(57, 'User Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:38:26'),
(58, 'User Delete.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:43:17'),
(59, 'User Delete.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:43:26'),
(60, 'User Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:49:09'),
(61, 'User Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:51:38'),
(62, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:58:27'),
(63, 'User Delete.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 08:59:02'),
(64, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:00:04'),
(65, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:00:15'),
(66, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:00:29'),
(67, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:03:00'),
(68, 'User Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:09:01'),
(69, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:36:22'),
(70, 'User Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:39:11'),
(71, 'User Updated.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:48:13'),
(72, 'User Delete.', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36', '2021-02-03 09:48:34'),
(73, 'Role Added', 1, '120.138.125.36', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', '2021-02-05 08:44:08'),
(74, 'User Added', 1, '103.133.229.78', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', '2021-10-30 06:03:09'),
(75, 'User Added', 1, '157.33.35.213', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', '2021-10-30 06:12:51'),
(76, 'User Delete.', 1, '157.33.35.213', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', '2021-10-30 06:13:02'),
(77, 'User Added', 1, '152.57.15.141', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', '2021-11-09 09:42:58'),
(78, 'User Updated.', 1, '103.208.69.6', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '2021-11-12 09:44:20'),
(79, 'Change Photo.', 1, '103.208.69.6', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '2021-11-12 09:45:33'),
(80, 'Change Photo.', 1, '103.208.69.6', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '2021-11-12 09:45:35'),
(81, 'User Updated.', 1, '103.252.53.192', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', '2021-11-17 05:23:55'),
(82, 'User Added', 1, '103.252.53.196', '', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '2021-11-19 07:52:15'),
(83, 'Role Added', 1, '103.59.74.135', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '2021-11-30 11:06:52'),
(84, 'Role Updated.', 1, '103.59.74.135', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '2021-11-30 11:07:18'),
(85, 'Role Delete.', 1, '103.59.74.135', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '2021-11-30 11:07:30'),
(86, 'Permission Updated', 1, '103.59.74.135', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '2021-11-30 11:08:37'),
(87, 'Permission Delete.', 1, '103.59.74.135', '', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', '2021-11-30 11:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_tbl_additional_cft`
--
ALTER TABLE `mst_tbl_additional_cft`
  ADD PRIMARY KEY (`cft_id`);

--
-- Indexes for table `mst_tbl_backup_database`
--
ALTER TABLE `mst_tbl_backup_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_tbl_city_lag_alt`
--
ALTER TABLE `mst_tbl_city_lag_alt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_tbl_home_equipment`
--
ALTER TABLE `mst_tbl_home_equipment`
  ADD PRIMARY KEY (`home_eq_id`);

--
-- Indexes for table `mst_tbl_kilometer`
--
ALTER TABLE `mst_tbl_kilometer`
  ADD PRIMARY KEY (`km_id`);

--
-- Indexes for table `mst_tbl_km_wise_amt`
--
ALTER TABLE `mst_tbl_km_wise_amt`
  ADD PRIMARY KEY (`km_amt_id`);

--
-- Indexes for table `mst_tbl_vehical_details`
--
ALTER TABLE `mst_tbl_vehical_details`
  ADD PRIMARY KEY (`vehical_id`);

--
-- Indexes for table `mst_tbl_vehicle_company`
--
ALTER TABLE `mst_tbl_vehicle_company`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `tbl_company_Details`
--
ALTER TABLE `tbl_company_Details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_confirm_job`
--
ALTER TABLE `tbl_confirm_job`
  ADD PRIMARY KEY (`cj_id`);

--
-- Indexes for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `tbl_destination_expenss`
--
ALTER TABLE `tbl_destination_expenss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_integration`
--
ALTER TABLE `tbl_email_integration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_tempaltes`
--
ALTER TABLE `tbl_email_tempaltes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `tbl_enquiry_articals_list`
--
ALTER TABLE `tbl_enquiry_articals_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enquiry_customer_details`
--
ALTER TABLE `tbl_enquiry_customer_details`
  ADD PRIMARY KEY (`enq_cust_id`);

--
-- Indexes for table `tbl_enquiry_followup`
--
ALTER TABLE `tbl_enquiry_followup`
  ADD PRIMARY KEY (`followup_id`);

--
-- Indexes for table `tbl_enquiry_shiping_details`
--
ALTER TABLE `tbl_enquiry_shiping_details`
  ADD PRIMARY KEY (`shipping_details_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback_status`
--
ALTER TABLE `tbl_feedback_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_goods_type`
--
ALTER TABLE `tbl_goods_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice_setting`
--
ALTER TABLE `tbl_invoice_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead_source`
--
ALTER TABLE `tbl_lead_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead_status`
--
ALTER TABLE `tbl_lead_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mode_of_dispatched`
--
ALTER TABLE `tbl_mode_of_dispatched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_office_expenses`
--
ALTER TABLE `tbl_office_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_off_exp_category`
--
ALTER TABLE `tbl_off_exp_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packing_list`
--
ALTER TABLE `tbl_packing_list`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `tbl_packing_list_image`
--
ALTER TABLE `tbl_packing_list_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packing_material`
--
ALTER TABLE `tbl_packing_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_recp`
--
ALTER TABLE `tbl_payment_recp`
  ADD PRIMARY KEY (`rcp_id`);

--
-- Indexes for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`quot_id`);

--
-- Indexes for table `tbl_quotation_terms_condn`
--
ALTER TABLE `tbl_quotation_terms_condn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule_survey`
--
ALTER TABLE `tbl_schedule_survey`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `tbl_sms_integration`
--
ALTER TABLE `tbl_sms_integration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_template`
--
ALTER TABLE `tbl_sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_source_expenss`
--
ALTER TABLE `tbl_source_expenss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_src_dest_expenss`
--
ALTER TABLE `tbl_src_dest_expenss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `tbl_survey_costing`
--
ALTER TABLE `tbl_survey_costing`
  ADD PRIMARY KEY (`costing_id`);

--
-- Indexes for table `tbl_survey_packing_mate`
--
ALTER TABLE `tbl_survey_packing_mate`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `tbl_tracking_details`
--
ALTER TABLE `tbl_tracking_details`
  ADD PRIMARY KEY (`trd_id`);

--
-- Indexes for table `tbl_transport_agent`
--
ALTER TABLE `tbl_transport_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transport_enq`
--
ALTER TABLE `tbl_transport_enq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transport_payment`
--
ALTER TABLE `tbl_transport_payment`
  ADD PRIMARY KEY (`trp_id`);

--
-- Indexes for table `tbl_type_of_packing`
--
ALTER TABLE `tbl_type_of_packing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type_of_risk`
--
ALTER TABLE `tbl_type_of_risk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_category`
--
ALTER TABLE `tbl_vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activity_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `mst_tbl_additional_cft`
--
ALTER TABLE `mst_tbl_additional_cft`
  MODIFY `cft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_tbl_backup_database`
--
ALTER TABLE `mst_tbl_backup_database`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_tbl_city_lag_alt`
--
ALTER TABLE `mst_tbl_city_lag_alt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `mst_tbl_home_equipment`
--
ALTER TABLE `mst_tbl_home_equipment`
  MODIFY `home_eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `mst_tbl_kilometer`
--
ALTER TABLE `mst_tbl_kilometer`
  MODIFY `km_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `mst_tbl_km_wise_amt`
--
ALTER TABLE `mst_tbl_km_wise_amt`
  MODIFY `km_amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT for table `mst_tbl_vehical_details`
--
ALTER TABLE `mst_tbl_vehical_details`
  MODIFY `vehical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mst_tbl_vehicle_company`
--
ALTER TABLE `mst_tbl_vehicle_company`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_logins`
--
ALTER TABLE `social_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_Details`
--
ALTER TABLE `tbl_company_Details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_confirm_job`
--
ALTER TABLE `tbl_confirm_job`
  MODIFY `cj_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_delivery`
--
ALTER TABLE `tbl_delivery`
  MODIFY `del_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_destination_expenss`
--
ALTER TABLE `tbl_destination_expenss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_email_integration`
--
ALTER TABLE `tbl_email_integration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_email_tempaltes`
--
ALTER TABLE `tbl_email_tempaltes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `enq_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_enquiry_articals_list`
--
ALTER TABLE `tbl_enquiry_articals_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4971;

--
-- AUTO_INCREMENT for table `tbl_enquiry_customer_details`
--
ALTER TABLE `tbl_enquiry_customer_details`
  MODIFY `enq_cust_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tbl_enquiry_followup`
--
ALTER TABLE `tbl_enquiry_followup`
  MODIFY `followup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `tbl_enquiry_shiping_details`
--
ALTER TABLE `tbl_enquiry_shiping_details`
  MODIFY `shipping_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_feedback_status`
--
ALTER TABLE `tbl_feedback_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_goods_type`
--
ALTER TABLE `tbl_goods_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_invoice_setting`
--
ALTER TABLE `tbl_invoice_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lead_source`
--
ALTER TABLE `tbl_lead_source`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_lead_status`
--
ALTER TABLE `tbl_lead_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mode_of_dispatched`
--
ALTER TABLE `tbl_mode_of_dispatched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_office_expenses`
--
ALTER TABLE `tbl_office_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_off_exp_category`
--
ALTER TABLE `tbl_off_exp_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_packing_list`
--
ALTER TABLE `tbl_packing_list`
  MODIFY `pl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_packing_list_image`
--
ALTER TABLE `tbl_packing_list_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_packing_material`
--
ALTER TABLE `tbl_packing_material`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_payment_mode`
--
ALTER TABLE `tbl_payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment_recp`
--
ALTER TABLE `tbl_payment_recp`
  MODIFY `rcp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `quot_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_quotation_terms_condn`
--
ALTER TABLE `tbl_quotation_terms_condn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `tbl_schedule_survey`
--
ALTER TABLE `tbl_schedule_survey`
  MODIFY `sch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_sms_integration`
--
ALTER TABLE `tbl_sms_integration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sms_template`
--
ALTER TABLE `tbl_sms_template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_source_expenss`
--
ALTER TABLE `tbl_source_expenss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_src_dest_expenss`
--
ALTER TABLE `tbl_src_dest_expenss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `survey_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_survey_costing`
--
ALTER TABLE `tbl_survey_costing`
  MODIFY `costing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `tbl_survey_packing_mate`
--
ALTER TABLE `tbl_survey_packing_mate`
  MODIFY `pack_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  MODIFY `tr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tracking_details`
--
ALTER TABLE `tbl_tracking_details`
  MODIFY `trd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_transport_agent`
--
ALTER TABLE `tbl_transport_agent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transport_enq`
--
ALTER TABLE `tbl_transport_enq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_transport_payment`
--
ALTER TABLE `tbl_transport_payment`
  MODIFY `trp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_type_of_packing`
--
ALTER TABLE `tbl_type_of_packing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_type_of_risk`
--
ALTER TABLE `tbl_type_of_risk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vehicle_category`
--
ALTER TABLE `tbl_vehicle_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
