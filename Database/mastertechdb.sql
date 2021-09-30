-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `mastertech`;
CREATE DATABASE `mastertech` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mastertech`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `Address1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PostCode` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Address1`,`Address2`,`City`,`userID`),
  KEY `userID` (`userID`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_D` int(11) NOT NULL,
  `status` enum('added to cart','confirmed') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cart_items` (`id`, `user_id`, `item_id`, `quantity_D`, `status`) VALUES
(1,	'0000000101',	4,	3,	'added to cart'),
(2,	'0000000101',	2,	3,	'added to cart'),
(3,	'0000000101',	5,	3,	'added to cart'),
(4,	'0000000000',	1,	1,	'added to cart'),
(5,	'0000000000',	6,	1,	'added to cart'),
(6,	'0000000000',	6,	1,	'added to cart'),
(7,	'0000000000',	2,	1,	'added to cart'),
(8,	'0000000000',	2,	1,	'added to cart'),
(9,	'0000000000',	2,	1,	'added to cart'),
(10,	'0000000000',	1,	1,	'added to cart'),
(11,	'0000000000',	1,	1,	'added to cart'),
(12,	'0000000000',	1,	1,	'added to cart'),
(13,	'0000000000',	1,	1,	'added to cart'),
(14,	'',	2,	1,	'added to cart'),
(15,	'',	2,	1,	'added to cart'),
(16,	'',	1,	1,	'added to cart'),
(17,	'',	2,	1,	'added to cart'),
(18,	'',	2,	7,	'added to cart'),
(19,	'',	6,	1,	'added to cart');

DROP TABLE IF EXISTS `ordertb`;
CREATE TABLE `ordertb` (
  `OrderID` varchar(15) NOT NULL,
  `Status` enum('Confirmed','ontheway','delivered','completed','Canceled') NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `OrderDate` varchar(11) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `Address` (`Address`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ordertb` (`OrderID`, `Status`, `UserID`, `Address`, `OrderDate`) VALUES
('0000000001\r\n',	'Confirmed',	'0000000101',	'Abdullah  Ramees,/n83,maligawatha place,\n Colombo,\n 01000',	'2021-09-29');

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `Qty` int(11) NOT NULL,
  `OrderID` varchar(15) NOT NULL,
  `ProductID` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `order_product` (`Qty`, `OrderID`, `ProductID`, `id`) VALUES
(5,	'0000000001\r\n',	'0000000001',	1),
(3,	'0000000001\r\n',	'0000000002',	2),
(5,	'0000000001\r\n',	'0000000003',	3),
(1,	'0000000001\r\n',	'0000000004',	4),
(3,	'0000000001\r\n',	'0000000005',	5);

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `payment_options`;
CREATE TABLE `payment_options` (
  `Cardnumber` varchar(16) NOT NULL,
  `Expiry` varchar(6) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Ccv` varchar(3) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  PRIMARY KEY (`Cardnumber`,`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `ProductID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Catagory` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `NumInStock` int(11) NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Brand` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Warranty` int(11) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product` (`ProductID`, `Product_Name`, `Catagory`, `Price`, `NumInStock`, `Description`, `Brand`, `Warranty`) VALUES
('0000000001',	'ASUS ROG ZEPHYRUS DUO 15',	'gaming laptop ',	845600,	5,	'WO SCREENS. ZERO LIMITS.With its innovative ROG ScreenPad Plus secondary display, the Zephyrus Duo 15 SE takes Windows 10 gaming to new dimensions. Cutting-edge cooling empowers the latest AMD Ryzen™ 9 5900HX  CPU and NVIDIA® GeForce RTX 3080 16GB GDDR6 GPU. A ultrafast 300Hz/3ms gaming panel lets you tailor your system for pro-level esports or content creation. Elevate your entire experience with premium audio delivered by quad speakers and immersive Dolby Atmos surround sound.\r\n',	'ASUS',	36),
('0000000002',	'APPLE MACBOOK AIR 13',	'laptop ',	299000,	12,	':thinnest, lightest notebook, completely transformed by the Apple M1 chip. CPU speeds up to 3.5x faster. GPU speeds up to 5x faster. Our most advanced Neural Engine for up to 9x faster machine learning. The longest battery life ever in a MacBook Air. And a silent, fanless design. This much power has never been this ready to go.Available Colour : Rose Gold.\r\n',	'Apple',	24),
('0000000003',	'NANOX DIRECTOR PRO',	'desktop Workstation',	345000,	6,	'AMD RYZEN™ 7 3700X (up to 4.4Ghz 8-cores 16-threads) 35M Cache\r\nB550 Motherboard\r\nPNY Nvidia Quadro P2200 5GB GDDR5X\r\n32GB 3200Mhz Performance Ram\r\n2TB 5400RPM Hard Drive\r\nSamsung 980 NVME 500GB\r\n650W Bronze Certified PSU\r\nAntec p7\r\n120mm Liquid cooler',	'NANOX',	64),
('0000000004',	' NANO FLAME ULTRA',	'Gaming desktop',	856990,	6,	'Asus ROG STRIX B550-F GAMING (WI-FI) - MotherBoard\r\nAMD Ryzen™ 9 3900X - Processors\r\nASUS ROG STRIX GAMING GEFORCE RTX™ 3080 10GB - Graphic Card\r\nGAMING RGB 16GB (2 x 8GB) 3600Mhz - Memory (RAM)\r\nASUS ROG Strix Helios RGB - CASINGS\r\nASUS ROG-THOR-12000P 1200W 80+ PLATINUM FULL MODULAR - POWER SUPPLY\r\n1TB SSD / 2TB - STORAGE',	'Pre-Build',	24),
('0000000005',	'ASUS PN40 ULTRACOMPACT',	'budget desktop',	35990,	20,	'Extremely quiet, fanless design with the latest Intel® Celeron® processor\r\nUltracompact size with 115 x 115 x 49mm dimensions and 0.62-liter volume\r\nSliding chassis design for easy, two-step component upgrades\r\nDual storage design with a 2.5-inch HDD or SSD and a M.2 SSD* or eMMC for the balance of speed and capacity to fit your needs\r\nComprehensive I/O connectivity with HDMI 2.0, Mini DisplayPort, USB 3.1 Gen 1 Type-C and a VGA or COM port\r\n24/7 reliability: Extensively tested to ensure long-term reliability\r\n',	'ASUS',	12),
('0000000006',	'Armaggeddon SMK-2C Psychfalconet Blue Switch Mecha',	'Keyboard',	7500,	100,	'Product details of Armaggeddon SMK-2C Psychfalconet Blue Switch Mechanical Keyboard 87 Key Low-Profile 9 Backlight Effects\r\n\r\n    Specification\r\n    Kevlartech Contoured Keycaps\r\n    Low-Profile Mechanical Gaming Keyboard\r\n    9 BackLight Effects\r\n    Total Travel: 3.00mm\r\n    Work Travel : 1.30 +- 0.5mm\r\n    WorkForce : 60 +- 10g\r\n    LifeSpan : 50 Million Cycle\r\n    Extra-Reactive Low-Profile Tractile Modular Switch\r\n    Outemu Blue Switch with Distinct Tactile Feedback and Click Sound\r\n    87 X Multicolour LED Outemu Blue Mechanical Switch with Full N-Key Rollover\r\n    Hotswaptech Hyper-Reactive Keyboard For Faster Response In and Out of Game\r\n    9 Backlight Effects And 2 PRE Determined Gaming Zone Lightning\r\n    Consistent Quality Outemu Switch With Less Than 10G Variance In Work/Tactile Force, Compared To 15G In Most Other Brands\r\n    50 Million Tunes Of Cycle LifeSpan Switch\r\n    Switch Type\r\n    Outemu Short Switch Blue (Clicky and Heavy)Total Travel: 3.00mm\r\n    Work Travel : 1.30 +- 0.5mm\r\n    Work Force : 60 +- 10g\r\n    LifeSpan : 50 Million Cycles\r\n    System Requirement\r\n    5V from USB port\r\n    Plug & Play\r\n    Works on WinXp/Vista/Win7/Win8/Win10',	'Armaggeddon',	6),
('0000000007',	'Access Point TP-Link EAP110 W/L',	'Access Point',	19000,	50,	'Features 	 \r\n2.4 GHz 	 Yes\r\nMaximum data transfer rate 	300 Mbit/s\r\nWi-Fi data rate (max) 	300 Mbit/s\r\nEthernet LAN data rates 	10,100 Mbit/s\r\nFrequency band 	2.4 - 2.4835 GHz\r\nNetworking standards 	IEEE 802.11b,IEEE 802.11g,IEEE 802.11n\r\nWi-Fi Multimedia (WMM)/(WME) 	 Yes\r\nVLAN support 	 Yes\r\nRate limiting 	 Yes\r\nQuality of Service (QoS) support 	 Yes\r\n  	 \r\nSecurity 	 \r\nSecurity algorithms 	128-bit WEP,152-bit WEP,64-bit WEP,WPA,WPA-PSK,WPA2,WPA2-PSK\r\nMAC address filtering 	 Yes\r\nNumber of SSID supported 	8\r\nProtocols 	 \r\nManagement protocols 	SNMP, Telnet, HTTP, HTTPS\r\nPorts & interfaces 	 \r\nEthernet LAN (RJ-45) ports 	1\r\nWAN connection 	Ethernet (RJ-45)\r\nDC-in jack 	 Yes\r\nPower 	 \r\nPower over Ethernet (PoE) 	 Yes\r\nInput voltage 	24 V\r\nInput current 	1 A\r\nPower consumption (typical) 	7.7 W\r\nDesign 	 \r\nPlacement 	Ceiling,Wall\r\nProduct colour 	White\r\nCable lock slot 	 Yes\r\nCable lock slot type 	Kensington\r\nReset button 	 Yes\r\nLED indicators 	 Yes\r\nCertification 	CE, FCC, RoHS\r\nInternal 	 No\r\nAntenna 	 \r\nAntenna direction type 	Omni-directional\r\nAntenna features 	Integrated antenna\r\nAntennas quantity 	2\r\nAntenna gain level (max) 	3 dBi\r\nPerformance 	 \r\nCompatible operating systems 	Microsoft Windows 8, 7, Vista, XP\r\nOperational conditions 	 \r\nOperating relative humidity (H-H) 	10 - 90%\r\nOperating temperature (T-T) 	0 - 40 ┬░C\r\nStorage temperature (T-T) 	-40 - 70 ┬░C\r\nStorage relative humidity (H-H) 	5 - 90%\r\nWeight & dimensions 	 \r\nWidth 	180 mm\r\nDepth 	180 mm\r\nHeight 	47.5 mm\r\nPackaging data 	 Yes\r\nMounting kit',	'TP-Link',	24),
('0000000008',	'Laptop Asus F512J i3/4G/128SSD/Win10H',	'Laptop',	128150,	10,	'\r\nProcessor	Intel Core i3-1005G1 1.20 GHz up to 3.40 GHz\r\nMemory	4GB DDR4 2666 MHz\r\nHard drive size	128GB SSD\r\nOperating system	Windows 10 in S mode, 64-bit\r\nScreen size	15.6 in Full HD LED touchscreen (1920 x 1080), 10-finger multi-touch support\r\nOptical drive	None\r\nMedia drive	MicroSD card reader\r\nAudio	Sonic Master\r\nVideo	Intel UHD Graphics\r\nPorts	1 USB 3.2 Gen 1 Type-C \r\nÔÇó 1 USB 3.2 Gen 1 \r\nÔÇó 2 USB 2.0 \r\nÔÇó 1 HDMI \r\nÔÇó 1 headphone/microphone combo jack\r\nBattery	37Whr lithium-ion (up to 4.5 hours battery life)*\r\nCamera	720p HD webcam\r\nWireless	802.11ac\r\nBluetooth	Yes\r\nDimensions	14.10 x 9.10 x 0.80 in (358.14 x 231.14 x 20.32 mm)\r\nWeight	3.70 lbs (1.68 kg)\r\nColor	Slate gray',	'Asus',	1),
('0000000009',	'Converter Display port to Vga/F (1M)',	'Cable & Converter',	1600,	16,	'Item Code: CNV0001\r\nWeight: 95.00GM\r\nBrands: N/Brand\r\nWarranty: One Month ( 25 Days Carry in Warranty*)\r\nStock: Yes\r\nModel: CONVERTER\r\nCategories:  Converter',	'N/Brand',	1),
('0000000010',	'Casing Asus GT301 TUF Gaming ARGB ',	'Casing',	16900,	6,	'SPECIFICATIONS\r\nCase Size\r\nMid Tower\r\nMotherboard Support\r\nATX\r\nDrive Bays\r\n4 x 2.5\" Bay\r\n2 x 2.5\"/3.5\" Combo Bay\r\nExpansion Slots\r\n7\r\nFront I/O Port\r\n1 x Headphone\r\n1 x Microphone\r\n2 x USB 3.1 Gen1\r\nLED Control Button\r\nReset Button\r\nTempered Glass\r\nLeft Side\r\nRadiator Support (Front)\r\n120 mm\r\n140 mm\r\n240 mm\r\n280 mm\r\n360 mm\r\nRadiator Support (Rear)\r\n120 mm\r\nCooling Support (Front)\r\n3 x 120 mm\r\n2 x 140 mm\r\nCooling Support (Top)\r\n2 x 120 mm\r\nCooling Support (Rear)\r\n1 x 120 mm\r\nPre-installed Fans (Front)\r\n3 x 120 mm\r\nARGB\r\nPre-installed Fans (Rear)\r\n1 x 120 mm\r\nMaximum CPU Cooler Height\r\n160 mm\r\nMaximum GPU Length\r\n320 mm\r\nMaximum PSU Length\r\n160 mm\r\nRemovable Dust Filters\r\nFront\r\nTop\r\nBottom\r\nMaximum Cable Management Space\r\n30 mm\r\nDimensions\r\n426 x 214 x 482 mm (L x W x H)',	'Asus',	2),
('0000000011',	'Power Supply Asus ROG THOR 850W',	'Power Supply',	67950,	6,	'Intel Specification - ATX12V\r\n\r\nDimensions\r\n6.3 \" x 5.9 \" x 3.38 \" Inch\r\n16 x 15 x8.6 Centimeter\r\n\r\nEfficiency\r\n80Plus Platinum\r\nProtection Features\r\nOPP/OVP/SCP/OCP/OTP\r\n\r\nAC Input Range\r\n100-240Vac\r\nDC Output Voltage\r\n+3.3V +5V +12V -12V +5Vsb\r\n\r\nMaximum Load\r\n20A 20A 71A 0.3A 3A\r\n\r\nTotal Output\r\n850W\r\n\r\nConnectors\r\nMB 24/20-pin x 1\r\nCPU 8/4-pin x 2\r\nPCI-E 8/6-pin x 4\r\nSATA x 12\r\nPeripheral 4-pin x 5\r\nFloppy x 1\r\nPackage Contents\r\nPower Cord x 1\r\nMotherboard Power Cable (24-pin) x 1 (610mm)\r\nCPU Cable (4+4-pin) x 2 (650mm)\r\nPCI-E Cable (6+2-pin) x 3 (675mm)\r\nSATA Cable x 3 (760mm/570mm)\r\nPeripheral x 2 (690mm/470mm)\r\nSATA to Peripheral Cable x 1 (300mm)\r\nFloppy Cable x 1 (101mm)\r\nAddressable RGB Cables x 2 (950mm)\r\nROG Sticker x 1\r\nROG Cable Tie x 4\r\nSleeved Cable Combs (6-pin) x 2\r\nSleeved Cable Combs (8-pin) x 6\r\nSleeved Cable Combs (24-pin) x 2\r\nChassis Screws Package x 1\r\nCable Tie x 10\r\nUser Manual x 1\r\nROG Cable Tie x4\r\nCable Tie x8\r\nScrews Package x1',	'Asus',	24),
('0000000012',	'Barebone CPU Intel NUC8i3 i3/4/1T/W10H',	'Barebone CPU',	73800,	2,	'CPU Supported\r\nCPU Type\r\nIntel Core i3-8109U processor (3.0 GHz - 3.6 GHz, Dual-Core, 4MB Cache, 28W TDP)\r\n\r\nMemory Supported\r\nMemory installed\r\n4GB DDR4 RAM \r\nMemory slot\r\n2 x 260Pin SO-DIMM\r\nMemory Type Supported\r\nDDR4 2400\r\nMax Memory Supported\r\n32GB\r\n\r\nStorage\r\nHard Drive Installed\r\n1 TB SATA3 HDD + 16 GB Optane Memory\r\nSerial ATA\r\n1 x SATA 6.0Gb/s\r\n\r\nGraphics\r\nOnboard Video\r\nIntel Iris Plus Graphics 655\r\n\r\nAudio\r\nChannel\r\n7.1 Channel\r\n\r\nCommunications\r\nMax LAN Speed\r\n10/100/1000Mbps\r\nWireless LAN\r\nIntel Dual Band Wireless-AC 9560 (802.11 ac), 2x2, up to 1.73Gbps\r\nBluetooth\r\nDual Mode Bluetooth 5.0\r\n\r\nExtension Bays\r\n2.5\" Internal Bays\r\nOne SATA3 port for connection to 2.5\" HDD or SSD (up to 9.5mm thickness)\r\n\r\nFront Panel Ports\r\nFront USB\r\n2 x USB 3.1 ports\r\nFront Audio Ports\r\n1 jacks\r\nCard Reader\r\nMicro SDXC slot with UHS-I support on the side\r\nOther Front Ports\r\nTwo additional USB 2.0 ports via internal header\r\n\r\nBack Panel Ports\r\nHDMI\r\nHDMI 2.0a port with 4K at 60 Hz\r\nRear USB\r\n2 x USB 3.1 ports\r\nRJ45\r\n1\r\nOther Rear Ports\r\nThunderbolt 3 with data transfer up to 40Gbps\r\n\r\nPower Supply\r\nPower Supply\r\n19V, 90W power brick\r\n\r\nPhysical SPEC\r\nDimensions\r\n2.01\" x 4.40\" x 4.60\"',	'Intel',	36),
('0000000013',	'Desktop Dell Vostro3888 i5/8G/1TB/DOS',	'Branded Desktops',	136350,	8,	'Processor\r\n10th Gen Intel┬« CoreÔäó i5-10400 processor (6-Core, 12M Cache, 2.90GHz to 4.3GHz)\r\n\r\n\r\nMemory\r\n8GB DDR 4 Ram\r\n\r\n\r\nOperating System\r\nFree DOS\r\n\r\n\r\nGraphics\r\nIntel┬« UHD Graphics 630 with shared graphics memory\r\n\r\n\r\nHard Drive\r\n1TB 7200RPM 3.5\" SATA HDD\r\n\r\n\r\nPorts\r\n1 RJ-45 port 10/100/1000 Mbps\r\n2 USB 2.0 Gen 1 ports (front)\r\n2 USB 3.2 Gen 1 Type-A port (front)\r\n1 SD card (optional)\r\n2 USB 2.0 Gen 1 ports (rear)\r\n2 USB 3.2 Gen 1 Type-A ports (rear)\r\n1 HDMI 1.4b port\r\n1 VGA Port\r\n\r\n\r\nOptical Drive\r\nTray load DVD Drive (Reads and Writes to DVD/CD)\r\n\r\nKeyboard Mouse Included\r\n\r\nWireless\r\n802.11ac 1x1 WiFi and Bluetooth\r\n\r\n\r\nPower\r\n260W Bronze',	'Dell',	36),
('0000000014',	'Asus G3 Gaming PC',	'Megabox Computers',	345000,	2,	'Select options; the kit price is automatically updated with the new price\r\nITEM NAME	OPTIONS	PRICE	QTY\r\nIntel CPU\r\n\r\nCPU Intel 2.6Ghz Core i5-11400 12MB(3Y)	LKR \r\n48150.00\r\n1\r\nIntel Motherboard\r\n\r\nMotherboard Asus TUF Z590-PLUS DDR4 (2Y)	LKR \r\n52750.00\r\n1\r\nDesktop RAM\r\n\r\nRam Corsair Vengeance16G 3200Mhz DDR4(3Y	LKR \r\n22500.00\r\n1\r\nSSD\r\n\r\nSSD Kingston 960GB A400 Sata (2Y)	LKR \r\n23600.00\r\n1\r\nDesktop Hard Disk\r\n\r\nHard Disk Seagate 1TB Barracuda (2Y)	LKR \r\n8450.00\r\n1\r\nVGA Card\r\n\r\nVGA Card Asus Geforce GTX1050Ti 4GB D5(2	LKR \r\n43600.00\r\n1\r\nPower Supply\r\n\r\nPower Supply Asus TUF GAMING 650W (2Y)	LKR \r\n21800.00\r\n1\r\nCasing\r\n\r\nCasing Cooler Master MasterBox TD500(N/W	LKR \r\n16350.00\r\n1\r\nKeyboards\r\n\r\nKeyboard Asus TUF Gaming K3 RGB (1Y)	LKR \r\n14600.00\r\n1\r\nMouse\r\n\r\nMouse Asus P506 ROG Strix IMPACT II (1Y)	LKR \r\n6200.00\r\n1\r\nMonitors\r\n\r\nMonitor Asus TUF GAMING 27\" VG27AQ (2Y)	LKR \r\n87000.00\r\n1',	'Asus',	24),
('0000000015',	'Server Rack 19\" 10U',	'Server Accessories',	14900,	5,	'Model: Server\r\nCategories:  Server Accessories',	'N/Brand',	12),
('0000000016',	'Server HPE MicroSvr Gen10+ E-2224 1P',	'Servers',	130000,	4,	'MicroSvr Gen10+ E-2224 1P\r\n \r\n\r\nSupports Intel┬« Xeon┬« 2200 processor series and Pentium┬« G processors, providing both compute power and affordable cost.\r\n\r\n \r\n\r\n \r\n\r\nHPE iLO 5 provides both Silicon Root of Trust and remote management to the server2 supporting iLO 5 standard and essential features, you can also upgrade to HPE iLO 5 Advanced.\r\n\r\n \r\n\r\n \r\n\r\nFour onboard NIC ports provide enhanced networking capability versus previous generations.\r\n\r\n \r\n\r\n \r\n\r\nExpansion slot for more flexible usage - one x16 bandwidth connector.\r\n\r\n \r\n\r\n \r\n\r\nThe most compact design of a microserver ever!1 Half the height compared to the previous generation, it can be placed horizontally or vertically.',	'HP',	36),
('0000000017',	'CD-R-Sony Bulk- Spindle 50Pack',	'Blank CDs',	100,	100,	'Model: CD&DVD\r\nCategories:  Blank CDs',	'SONY',	1),
('0000000018',	'DVD-R-Sony 4.7GB 16X Bulk',	'Blank DVDs',	50,	200,	'Product Information:\r\n\r\nSony 50DMR47BSP DVD-R. Pack of DVD-R with 16x-speed, supplied in 50-spindle box. Ideal for fast\r\ndata recording and convenient bulk storage. 4.7 GB capacity. Compatible for playback with most\r\nexisting DVD Video players and DVD-Rom PC drives.',	'SONY',	1),
('0000000019',	'Hard Disk Seagate 4TB Barracuda ',	'Desktop Hard Disk',	25999,	10,	'Interface Options : SATA 6Gb/s\r\nPerformance\r\nCache (MB) : 64\r\nTransfer Rate, Max Ext (MB/s) : 600\r\nSustained Data Rate OD : 180\r\nAverage Latency (ms) : 5.10',	'Seagate',	24),
('0000000022',	'Ext Hard WD 1TB Ext My Passport ',	'External Hard Disk',	12500,	50,	'Product Specifications\r\nInterface - USB 3.0 and USB 2.0\r\nData Encryption Support - Yes\r\nPerformance Specifications\r\nSerial Transfer Rate\r\nUSB 3.0\r\nSerial Bus Transfer Rate (USB 3.0)- 5 Gb/s (Max)\r\nPhysical Specifications\r\nCapacity- 1 TB\r\nPhysical Dimensions\r\n\r\nHeight- 15.4 mm\r\nDepth- 110.5 mm\r\nWidth- 82.0 mm\r\nWeight- 0.16 kg\r\nEnvironmental Specifications\r\nTemperature\r\nOperating- 5´┐¢ C to 35´┐¢ C\r\nNon-operating- -20´┐¢ C to 65´┐¢ C\r\nCompatibility\r\nOperating System\r\nCompatibility- Windows/Mac',	'Western Digital',	24),
('0000000023',	'SSD Samsung 1TB T7 Touch External',	'External SSD',	45999,	45,	'Type\r\n\r\nProduct Type\r\nPortable SSD\r\n\r\nStorage Type\r\nExternal\r\n\r\nInterface\r\nUSB 3.2 (Gen2, 10Gbps) Backwards Compatible\r\n\r\nRead/Write Speeds\r\nup to 1,050/1,000 MB/s\r\n\r\nUsage Application\r\nStore large files (document/games/movies) with speed and security on the go\r\n\r\nSeries\r\nPortable SSD T7\r\n\r\nStorage\r\n\r\nCapacity\r\n1TB\r\n\r\nKey Features\r\n\r\nMemory Speed\r\nRead/write speeds of up to 1,050/1,000 MB/s\r\n\r\nCompatibility\r\nWindows 7 or higher\r\nMac OS X 10.10 or higher\r\nAndroid Lollipop or higher\r\n\r\nAES Encryption\r\nAES 256-bit hardware encryption\r\n\r\nSecurity\r\nFingerprint security\r\nPassword protection (optional)\r\n\r\nUASP Mode\r\nSupport\r\n\r\nCertification\r\nCE, BSMI, KC, VCCI, C-tick, FCC, IC, UL, TUV, CB\r\n\r\nRoHS Compliance\r\nRoHS2\r\n\r\nDimensions (W x H x D)\r\n\r\nProduct\r\n3.4\" x 2.2\" x 0.3\"',	'Samsung',	24),
('0000000024',	'H/D Asus ROG SSD M.2 \"NVMe Encloser (6M)',	'Hard Disk Accessorie',	9999,	25,	'Asus ROG Strix Arion Lite SSD Enclosure\r\nÔÇó USB-CÔäó3.2 Gen 2 for speeds of up to 10 Gbps\r\nÔÇó Supports M.2 PCIe NVM Express┬« SSD with 2230/2242/2260/2280 form factor\r\nÔÇó Innovative, easy-to-use screwdriver-free installation\r\nÔÇó Aluminum alloy case and thermal pads deliver aggressive heat dissipation\r\nÔÇó Futuristic design features ASUS Aura Sync lighting effects\r\n\r\n \r\n\r\nColor\r\nBlack\r\nInterface\r\nUSB3.2 Gen 2X1\r\nSpeed\r\n10Gbps\r\nCapacity\r\n0TB\r\nOS Compatility\r\nWindows┬« 7\r\nWindows┬« 8 / 8.1\r\nWindows┬« 10\r\nMac OS┬« X 10.6 and above\r\nAndroid devices supported OTG function\r\nSSD Compatility\r\nM.2 PCI Express 2280\r\nM.2 PCI Express 2260\r\nM.2 PCI Express 2242\r\nM.2 PCI Express 2230\r\n*Micron P5 SSD is currently not supported on ROG Strix Arion\r\nAura System Requirement\r\nWindows┬« 8 / 8.1 64bit\r\nWindows┬« 10 64bit\r\nDimension\r\n124.5 x 47.7mm x 10.9 mm (L/W/H)',	'Asus',	6),
('0000000025',	'Hard Seagate 2TB Laptop Sata',	'Laptop Hard Disk',	19999,	25,	'Seagate 2TB BarraCuda 5400 RPM 128MB Cache SATA 6.0Gb/s 2.5\" Laptop Internal Hard Drive\r\n\r\n- Broadest 2.5-inch hard drive portfolio with up to 5TB capacity and both 7mm and 15mm form factors suitable for a variety of compute applications.\r\n\r\n- Thinnest and lightest 2.5-inch hard drive with up to 2TB storage in a 7mm z-height, providing seamless upgrades of thin and light laptops and smaller form factor systems.\r\n\r\n- Fast data rates of up to 140MB/s enables superior PC end-user experience and snappier file transfers.\r\n\r\n\r\nModel\r\nBrand\r\nSeagate\r\nSeries\r\nBarraCuda\r\nModel\r\nST2000LM015\r\nPackaging\r\nBare Drive\r\n\r\nPerformance\r\nInterface\r\nSATA 6.0Gb/s\r\nCapacity\r\n2TB\r\nCache\r\n128MB\r\nRPM\r\n5400 RPM',	'Seagate',	24),
('0000000026',	'Micro SD Kingston 256GB Class-10',	'Memory Card',	9999,	50,	'Key Features\r\n\r\n- 256GB Capacity\r\n- UHS-I / U1 / Class 10\r\n- Max Read Speed: 80 MB/s\r\n- Min Write Speed: 10 MB/s\r\n\r\nDesigned for reliability, the 256GB Canvas Select UHS-I microSDXC Memory Card from Kingston features a storage capacity of 256GB and takes advantage of the UHS-I bus to support read speeds of up to 80 MB/s. This card has also been designed with the U1 and Class 10 standards, each of which which guarantees minimum write speeds of at least 10',	'Kingston',	12),
('0000000027',	'Pen Drive Kingston 256GB DTX USB 3.2',	'pen drive',	8999,	75,	'Kingston 256GB DataTraveler Exodia Flash Drive\r\nOverview\r\n\r\nEasy access and quick transfers everyday\r\n\r\nKingstons DataTraveler Exodia features USB 3.2 Gen 1 performance for easy access to laptops, desktop PCs, monitors and other digital devices. DT Exodia allows quick transfers and convenient storage of documents, music, videos and more. Its practical design and fashionable colors make it ideal for everyday use at work, home, school or wherever you need to take your data. DT Exodia is available in capacities up to 256GB1 and is backed by a five-year warranty, free technical support and legendary Kingston reliability.\r\n\r\nLarge loop easily attaches to key rings\r\nPractical cap protects the USB plug\r\nMultiple color options by capacity\r\nFEATURES / BENEFITS\r\n\r\nUltimate portability DT Exodia features a large, colorful loop that easily attaches to key rings, enabling you to have extra storage on the go.\r\nCap protection Practical cap protects the USB plug and your data. The cap also fits onto the back loop, so you wont miss it.\r\nRange of capacities1 Multiple color options by capacity.\r\nBackward Compatibility Compatible with existing USB 2.0 ports, allowing 2.0 users to migrate to 3.0 in the future without replacing their drives.',	'Kingston',	36),
('0000000028',	'SSD Kingston 1TB M.2 NVMe A2000',	'SSD',	30999,	60,	'Model: SA2000M8/1000G\r\nCategories:  SSD',	'Kingston',	24),
('0000000029',	'Keyboard Asus TUF Gaming K3 RGB ',	'Keyboards',	17499,	15,	'ASUS TUF Gaming K3 RGB mechanical keyboard with N-key rollover, combination media keys, USB 2.0 passthrough, aluminum-alloy top cover, wrist rest, eight programmable macro keys and Aura Sync lighting\r\nMechanical RGB keyboard with 50-million-keystroke lifespan for long-lasting performance\r\n100% anti-ghosting with N-key rollover (NKRO) technology for responsive, reliable performance with clicky, tactile or linear switches\r\nEasy-to-use combo keys for instant control of media functions\r\nUSB 2.0 passthrough for quick connection everyday devices, such as a mouse or flash drive, or for charging smartphone or tablets\r\nDurable aluminum-alloy top cover for long-term use\r\nEight fully programmable keys to map macros on the fly, and store profiles on the onboard memory\r\nIndividually-backlit keys with Aura Sync RGB LED technology for unlimited personalization options',	'Asus',	12),
('0000000030',	'Mouse A4 Tech W/L G3-200NS USB',	'Mouse',	1999,	65,	'Add a touch of sporty look to your computer peripherals with the Vivid Collection. The bright & rich colors will bring a delightful look to your desktop or notebook computer.\r\n\r\nSilent Clicks\r\nKeeps you focused on the task at hand and eliminates worry of bothering others around you.\r\n\r\n\r\nConsistent Wireless Stability\r\nAdvanced 2.4GHz powerful wireless connection with distance up to 10-15m. Auto-Channel stablizing Plug and leave-in nano receiver provides essentially no delays or connection conflicts.\r\n\r\n\r\nSmart Wireless SOC Technology\r\nProfessional chip ensures longer distance and stabler connection.\r\n\r\n\r\nAdjustable Power Saving\r\nAdjustable 4-level power saving. It will be in sleep mode in 0.2s of inactivity.\r\n\r\n\r\n16-in-One\r\n16 gestures to perform selectable hotkey commands.\r\n\r\n \r\n\r\nSPECIFICATIONS\r\nModel:G3-200NS\r\nName: Energy-saving Wireless Mouse\r\nType: Wireless\r\nConnection: 2.4G Hz\r\nErgonomic Design: Symmetric\r\nSensor: Optical\r\nResolution: 1000 DPI\r\nReport Rate: 125Hz\r\nButtons No.: 3\r\nReceiver: Nano USB Receiver\r\nPower Source: 1AA Alkaline Battery\r\nSystem Requirements: Windows XP / Vista / 7 / 8 / 8.1 / 10',	'A4 Tech',	12),
('0000000031',	'Mouse Pad A4 Tech X7-XP-50NH RGB Gam ',	'Mouse Pad',	2999,	100,	'Rainbow Lighting Effects\r\nThe mouse pad lights up with neon colors creats more passionate during the game session.\r\n\r\nHard Surface\r\nFeatures a hard, high precise micro-textured surface that ensures accuracy and effortless speed.\r\n\r\nNon-Slip Rubber Base\r\nAnti-slip rubber base keeps the mouse pad stable.\r\n\r\nPRODUCT DIMENSION\r\n256mm x 358mm\r\n\r\n\r\nSPECIFICATION\r\nModel: XP-50NH\r\n6 LED Components\r\nHard Surface\r\nNon-Slip Rubber Base\r\nNeon Lighting Effects',	'A4 Tech',	1),
('0000000032',	'Laptop Dell Ins 7400 i5/8/512G/W10H',	'Laptop',	245999,	5,	'Processor\r\nIntel(R) Core(TM) i5-1135G7 Processor (8MB Cache, up to 4.2GHz)\r\n\r\nRam\r\n8GB, LPDDR4x, 4267MHz\r\n\r\nHard Drive\r\n512 NVMe SSD\r\n\r\nGraphics\r\nIntel HD Graphics\r\n\r\nDisplay\r\n14.5-inch 16:10 QHD+ (2560 x 1600) IPS AG Non-Touch, 300nits, 100% sRGB\r\n\r\nOperating System\r\nWindows 10 Home\r\n\r\nKeyboard\r\nEnglish International Backlit Keyboard - Silver\r\n\r\nWireless\r\nIntel┬« Wi-Fi 6 2x2 (Gig+) and Bluetooth\r\n\r\nAdapter\r\n65 Watt AC adapter',	'Dell',	12),
('0000000033',	'Laptop Adapter Apple MagSafe 45W',	'Laptop Adapter',	8999,	20,	'Overview\r\n\r\nThe 45-Watt MagSafe Power Adapter for MacBook Air features a magnetic DC connector that ensures your power cable will disconnect if it experiences undue strain and helps prevent fraying or weakening of the cables over time. In addition, the magnetic DC helps guide the plug into the system for a quick and secure connection.\r\n\r\nWhen the connection is secure, an LED located at the head of the DC connector will light; an amber light lets you know that your portable is charging, while a green light tells you that you have a full charge. An AC cord is provided with the adapter for maximum cord length, while the AC wall adapter (also provided) gives users an even easier and more compact way to travel.\r\n\r\nRedesigned specifically for MacBook Air, the adapter is the perfect traveling companion. It has a clever design which allows the DC cable to be wound neatly around itself for easy cable storage.\r\n\r\nThis power adapter recharges the lithium polymer battery while the system is off, on, or in sleep mode. It also powers the system if you choose to operate without a battery.\r\n\r\nCompatible only with MacBook Air with MagSafe Power Port.',	'Apple',	6),
('0000000034',	'Bag EBox ENL96215B 15\"6 Back pack',	'Laptop Bag',	6499,	5,	'Model: ENL96215B\r\nCategories:  Laptop Bag',	'E-Box',	1),
('0000000035',	'Laptop Battery TT Acer 4741',	'Laptop Battery',	7599,	10,	'Model: LAPTOP BATTERY\r\nCategories:  Laptop Battery',	'Acer',	6),
('0000000036',	'Laptop Cooler Fan HP Elitebook 8540',	'Laptop Cooler Fan',	4595,	20,	'Model: LAPTOP COOLER FAN\r\nCategories:  Laptop Cooler Fan',	'HP',	3),
('0000000037',	'Display Panel MTLED 15.6 30/FHD',	'Laptop Display Panel',	24599,	3,	'Model: LAPTOP DISPLAY\r\nCategories:  Laptop Display Panel',	'N/Brand',	6),
('0000000038',	'DVD Writer Internal Sata/Slim',	'Laptop DVD Writer',	4999,	40,	'Model: LAPTOP DVD WRITER\r\nCategories:  Laptop DVD Writer',	'HP',	3),
('0000000039',	'Laptop Keyboard MT Dell 3542',	'Laptop Keyboard',	4599,	30,	'Model: LAPTOP KEYBOARD\r\nCategories:  Laptop Keyboard',	'Dell',	3),
('0000000040',	'Laptop Lock Data Flex With Key',	'Laptop Lock',	1199,	10,	'Outstanding Features :\r\n\r\n-  Steel cable in dark smoke coating gives elegant look\r\n-  Padded adaptor securely connects lock to\r\n   notebook/projector/LCD monitor security slot\r\n-  High Security Lock Mechanism (Tabular Key) prevents\r\n   easy opening of lock by thieves\r\n-  Free velcro strap for easy storage\r\n-  Rubberised Grip on the lock body allows easy holding,\r\n   locking and unlocking\r\n-  Available in Key Different, Key Alike and Master-Keyed\r\n-  Also available in twin and triple lock',	'Targus',	1),
('0000000041',	'Ram Kingston 16GB DDR4 KVR2666',	'Laptop Ram',	21999,	15,	'Brand	Kingston\r\nMemory Capacity	16GB\r\nSpeed	2666MHz (PC4-21300)\r\nError Check	Non-ECC\r\nModel/Series/Type	ValueRAM\r\nModule Type	SODIMM\r\nCAS Latency	CL19\r\nForm Factor	DDR4\r\nRank	2R (Dual Rank)\r\nPins	260 Pin\r\nOperating Temperature	0┬░C to 85┬░C\r\nMemory Voltage	1.2v\r\nMemory Depth	2G\r\nProduct Condition	New\r\nProduct Type/Family	RAM\r\nData Width	X64\r\nChip Organization	x8',	'Kingston',	36),
('0000000042',	'Monitor Asus 21.5\" VT229H IPS Touch',	'Monitors',	73599,	2,	'ASUS VT229H Touch Monitor - 21.5\" FHD (1920x1080), 10-point Touch, IPS, 178┬░ Wide Viewing Angle, Frameless, Flicker free, Low Blue Light, HDMI, 7H Hardness\r\n\r\n- 21.5ÔÇØ Full HD IPS technology with stunningly wide 178┬░ viewing angles\r\n- 10-point multi-touch capacity featuring 7H hardness screen delivers smooth and durable touch experience.\r\n- Windows 10 compliance\r\n- Its frameless design makes it perfect for almost-seamless multi-display setups\r\n- ASUS Eye Care monitors feature T├£V Rheinland-certified Flicker-free and Low Blue Light technologies to ensure a comfortable viewing experience',	'Asus',	24),
('0000000043',	'CPU AMD RYZEN 9-3900X 3.8 GHz',	'AMD CPU',	125999,	2,	'AMD RyzenÔäó 9 3900X\r\n\r\nSpecifications\r\n\r\nCPU Cores - 12\r\n\r\nThreads - 24\r\n\r\nBase Clock - 3.8GHz\r\n\r\nMax Boost Clock  - Up to 4.6GHz\r\n\r\nTotal L1 Cache - 768KB\r\n\r\nTotal L2 Cache - 6MB\r\n\r\nTotal L3 Cache - 64MB\r\n\r\nUnlocked  - Yes\r\n\r\nCMOS - TSMC 7nm FinFET\r\n\r\nPackage - AM4\r\n\r\nPCI Express┬« Version - PCIe 4.0 x16\r\n\r\nThermal Solution (PIB) - Wraith Prism with RGB LED\r\n\r\nThermal Solution (MPK) - Wraith PRISM\r\n\r\nDefault TDP / TDP - 105W\r\n\r\nMax Temps - 95┬░C\r\n\r\nSystem Memory\r\n\r\nSystem Memory Specification - 3200MHz\r\n\r\nSystem Memory Type - DDR4\r\n\r\nMemory Channels - 2\r\n\r\nFoundation\r\n\r\nProduct Family\r\n\r\nAMD RyzenÔäó Processors\r\n\r\nProduct Line\r\n\r\nAMD RyzenÔäó 9 Desktop Processors\r\n\r\nPlatform\r\n\r\nDesktop\r\n\r\nOPN Tray\r\n\r\n100-000000023\r\n\r\nOPN PIB\r\n\r\n100-100000023BOX\r\n\r\nOPN MPK\r\n\r\n100-100000023MPK\r\n\r\nLaunch Date - 7/7/2019',	'RYZEN',	36),
('0000000044',	'Motherboard Asus TUF X570-PLUS Wifi',	'AMD Motherboard',	65999,	5,	'ASUS AM4 TUF Gaming X570-Plus (Wi-Fi) ATX Motherboard\r\n\r\n- AMD AM4 socket: Ready for 2nd and 3rd Gen AMD Ryzen processors to maximize connectivity and speed with up to two M.2 Drives, USB 3.2 Gen2 and AMD StoreMI\r\n- Enhanced Power Solution: Military-grade TUF components, ProCool socket and Digi+ VRM for maximum durability\r\n- Comprehensive Cooling: Active PCH heatsink, VRM heatsink, M.2 heatsink, hybrid fan headers and Fan Xpert 4\r\n- Next-Gen Connectivity: Dual PCIe 4.0 M.2 and USB 3.2 Gen 2 Type-A / Type-C\r\n- Gaming Networking: Exclusive Realtek L8200A Gigabit Ethernet, Intel 2x2 802.11 ac Wi-Fi with MU-MIMO support, Bluetooth 5.0, TUF LANGuard and TurboLAN technology\r\n- Realtek S1200A Codec: Features an unprecedented 108dB signal-to-noise ratio for the stereo line-out and a 103dB SNR for the line-in, providing pristine audio quality\r\n- Aura Sync RGB: Synchronize LED lighting with a vast portfolio of compatible PC gear, including addressable RGB strips',	'Asus',	24),
('0000000045',	'Cooler Asus ROG Strix LC 360 RGB ',	'CPU Cooler & Heat si',	49999,	5,	'Model: ROGSTRIXLC360RGB\r\nCategories:  CPU Cooler & Heat sink',	'Asus',	24),
('0000000046',	'Ram Corsair Vengeance 8GB 3200Mhz RGB',	'Desktop RAM',	16599,	35,	'Fan Included\r\n \r\nNo.\r\nMemory Series\r\n \r\nVENGEANCE RGB PRO\r\nMemory Type\r\n \r\nDDR4\r\nMemory Size\r\n \r\n8GB Kit (1 x 8GB)\r\nTested Latency\r\n \r\n16-20-20-38\r\nTested Voltage\r\n \r\n1.35V\r\nTested Speed\r\n \r\n3200MHz\r\n \r\n\r\nMemory Color\r\n \r\nBLACK\r\nLED Lighting\r\n \r\nRGB\r\nSingle Zone / Multi-Zone Lighting\r\n \r\nIndividually Addressable\r\nSPD Latency\r\n \r\n15-15-15-36\r\nSPD Speed\r\n \r\n2133MHz\r\nSPD Voltage\r\n \r\n1.2V\r\nSpeed ??Rating\r\n \r\nPC4-25600 (3200MHz)\r\nCompatibility\r\n \r\nIntel 200 Series, Intel 300 Series, Intel X299, AMD 300 Series, AMD 400 Series, AMD X570\r\nHeat Spreader\r\n \r\nAnodized Aluminum\r\nMemory Format Package\r\n \r\nDIMM\r\nPerformance Profile\r\n \r\nXMP 2.0\r\nMemory Pin Package\r\n \r\n288',	'Corsair',	36),
('0000000047',	'CPU Intel 2.5GHz Core i9-11900 16MB',	'Intel CPU',	120999,	4,	'Intel 11th Gen Core i5-11400 Rocket Lake CPU\r\n- Base clock speed: 2.6 GHz\r\n- Intel┬« Turbo Boost Technology 2.0\r\n- Intel┬« Smart Cache: 12M\r\n- Motherboard compatibility: 400 and 500 series*\r\n- PCIe Gen 4 Lanes: 20\r\n- Memory Speed: DDR4-3200, DDR4-2933\r\n\r\n*400 series compatibility available on select motherboards only. Not all features present on all motherboards. Check with your motherboard manufacturer.',	'Intel',	36),
('0000000048',	'Motherboard Asus ROG Strix Z490-G DDR4',	'Intel Motherboard',	55999,	7,	'ASUS ROG STRIX Z490-G GAMING (WiFi 6) LGA 1200 Intel Z490 Intel Motherboard (12+2 Power Stages, Intel 2.5Gb Ethernet, Bluetooth v5.1 and AURA Sync)\r\n \r\n\r\nIntel LGA 1200 socket: Designed to unleash the maximum performance of 10th Gen Intel Core processors\r\nRobust Power Solution: 12+2 power stages with ProCool II power connector, high-quality alloy chokes and durable capacitors to provide reliable power when pushing CPU performance to the limit\r\nOptimized Thermal Design: VRM heatsink, PCH fanless heatsink, M.2 heatsink, hybrid fan headers and Fan Xpert 4 utility\r\nHigh-performance Gaming Networking: On-board Intel 2.5Gb Ethernet with ASUS LANGuard\r\nBest Gaming Connectivity: Supports HDMI 1.4 and DisplayPort 1.4 output, and featuring dual M.2, front panel USB 3.2 Gen 2 Type-C connector\r\nIndustry-leading Gaming Audio: High fidelity audio with the SupremeFX S1220A codec, DTS Sound Unbound and Sonic Studio III draws you deeper into the game action\r\nUnmatched Personalization: Micro ATX small form factor, ASUS-exclusive Aura Sync RGB lighting, including RGB headers and Gen 2 addressable headers',	'Asus',	24),
('0000000049',	'Card Reader Kingston USB3.0 FCR-HS4',	'Card Reader',	4499,	50,	'FEATURES\r\n\r\n> Ultra-portable -- small size makes it an easy and convenient travel accessory\r\n\r\n> Versatile -- supports major types of memory cards and the latest speed standards (UHS-I and UHS-II)\r\n\r\n> Fast -- USB 3.0 performance for efficient and effortless data transfer\r\n\r\n> Compliant -- with USB 3.0 specifications, backwards compatible with USB 2.0\r\n\r\n> Built-in LED indicator\r\n\r\n> USB 3.0 cable included',	'Kingston',	6),
('0000000050',	'DVD Writer Asus BluRay 6X SBW-06D2X-U',	'DVD Writers',	21599,	15,	'Windows 8 Compatible\r\nBDXL format support\r\nExtreme 6X Blu-ray writing speed\r\n2011 iF Design Award\r\n2012 Taiwan Excellence Award\r\nBlu-ray 3D support, 2D to 3D DVD conversion, DVD upscaling to HD 1080p (optional)\r\nDolby EX and DTS-HD (5.1 channels)(optional)',	'Asus',	12),
('0000000051',	'Head Phone A4 Tech HU-50 USB',	'Head phone',	3999,	12,	'Model: HU-50\r\nCategories:  Head phone',	'A4 Tech',	6),
('0000000052',	'Power Bank MI 20000 Mah',	'Power Bank',	4499,	15,	' \r\n\r\n20000mah lithium polymer battery\r\n\r\n18w fast charging\r\n\r\ntriple port output\r\n\r\ndual input port (micro-usb/usb-c\r\n\r\npower delivery advanced 12 layer chip protection\r\n\r\nsmart power management',	'MI',	6),
('0000000053',	' Sound Card USB Single Jack',	'Sound Card',	2199,	5,	'Model: Sound Card\r\nCategories:  Sound Card',	'N/Brand',	1),
('0000000054',	'Speaker JBL XTREME 3 Bluetooth',	'Speaker',	55000,	5,	'Portable waterproof speaker\r\nPoolside. Picnics. Just hanging out. Music makes the party. The JBL Xtreme 3 portable Bluetooth speaker effortlessly delivers massive JBL Original Pro Sound. With four drivers and two pumping JBL Bass Radiators, the powerful sound draws everybody in, and with PartyBoost, you can connect multiple JBL PartyBoost-enabled speakers to take things to the next level. A little rain might spoil your fun, but the waterproof and dustproof Xtreme 3 wonÔÇÖt mind at all, and the convenient carrying strap with built-in bottle opener makes it a breeze to move the party indoors. The JBL Xtreme 3 makes a big splash wherever you go.',	'JBL',	3),
('0000000055',	'HUB Vcom USB-C To 3Port USB 3.0+RJ45',	'USB HUB',	4250,	10,	'Side 1: USB 3.1 type C Male\r\n\r\nSide 2: USB3.0*3+RJ45\r\n\r\nUSB: Up to 5Gbps, USB ports for data syncing\r\n\r\nRJ45: Up to 1000Mbps network',	'VCOM',	6),
('0000000056',	'Voice Recorder Sony ICD-PX470 4Gb',	'Voice Recorder',	13999,	15,	'SPECIFICATIONS\r\n\r\nÔÇó 4GB internal memory, expandable to 32GB with micro SD\r\n\r\n4GB internal memory, expandable to 32GB with micro SD\r\nÔÇó S-microphone system records distant or quiet sounds clearly\r\n\r\nÔÇó Focus and Wide-Stereo recording captures the voices you want to hear\r\n\r\nÔÇó Auto voice recording reduces background noise\r\n\r\nÔÇó Built-in USB connector makes transferring files easy\r\n\r\nÔÇó BUILT-IN MEMORY\r\n4GB\r\n\r\nÔÇó MAX. RECORDING TIME MP3 128KBPS\r\n59 Hrs 35 Min\r\n\r\nÔÇó BATTERY LIFE FOR RECORDING MP3 128KBPS\r\n57 Hrs\r\n\r\nÔÇó INPUT AND OUTPUT TERMINALS\r\n- [PC I/F] Hi-Speed USB\r\n- [Input] Stereo Mic-in jack\r\n- [Output] Stereo Earphone jack',	'SONY',	6),
('0000000057',	'Router TP-Link ADSLW/L 300M TD-W8961N',	'ADSL, DSL Router',	7000,	25,	'High speed DSL modem, NAT router and wireless access point in one device providing a one-stop networking solution\r\nWireless N speed up to 300Mbps makes it ideal for heavy bandwidth consuming or interruption sensitive applications like online gaming, Internet calls and even the HD video streaming\r\nEasy Setup Assistant with multi-language support provides a quick & hassle free installation\r\nSPI and NAT firewall protects end-user devices from potential attacks from the Internet\r\nWPA-PSK/WPA2-PSK encryptions provide user networks with active defense against security threats\r\nEasy one-touch WPA wireless security encryption with the WPS button\r\nWi-Fi On/Off Button allows users to simply turn their wireless radio on or off\r\nQoS enables smooth IPTV streaming and lag-free online gaming\r\nPort VLAN binds specific LAN ports and PVCs for differential services\r\nAnnex M doubles the upstream data rate\r\nAuto-reconnect keeps user online indefinitely\r\nBackward compatible with 802.11b/g products',	'TP-LINK',	24),
('0000000058',	'HSDPA Wifi Hotspot Prolink 4G PRT7011L',	'Mobile Broadband',	12299,	20,	'The PROLiNK PRT7011L is an ideal portable 4G WiFi device for frequent travelers who need a fast-speed, compact and light-weight device to be used and carried anywhere.\r\n\r\nÔÇó Data speed up to 150Mbps*\r\nÔÇó High speed Wi-Fi hotspot up to 300Mbps*\r\nÔÇó Support up to 11 users simultaneously\r\nÔÇó Rechargeable battery for up to 10 hours\r\nÔÇó Manage and monitor usage/connected devices via PROLiNK mWiFi app\r\nÔÇó Compact and Light-Weight\r\n',	'ProLink',	12),
('0000000059',	'Cable Zip ',	'Network Accessories',	999,	500,	'Model: Cable Zip\r\nCategories:  Network Accessories',	'N/Brand',	1),
('0000000060',	'Adapter Tp-Link W/LUSB TL-WN821N 300M',	'Network Card & Adapt',	2400,	12,	'300Mbps wireless data rates ideal for video streaming, online gaming and Internet calling\r\nMIMO technology with stronger signal penetration strength, wider wireless coverage, providing better performance and stability\r\nSupports WPA/WPA2 mechanisms as well as WEP 64/128/152 bit encryption\r\nSupports Infrastructure and Ad-Hoc modes\r\nSupports Windows 2000/XP/Vista/7\r\nFully compatible with all IEEE 802.11b/g/n products\r\nSupports Sony PSP X-link for online gaming for Windows XP\r\nBundled CD provides easy and hassle-free installation and configuration\r\nEasily establish a highly secured link at a push of QSS button\r\n',	'TP-LINK',	12),
('0000000061',	'Switch TP Link 10Port/8PoE SG2210M',	'Network Switch',	40499,	18,	'150 W PoE Budget: 8├ù 802.3at/af-compliant PoE+ ports with a total power supply of 150 W*.\r\nFull Gigabit Ports: 8├ù gigabit PoE+ ports and 2├ù gigabit SFP Slots provide high-speed connections.\r\nIntegrated into Omada SDN: Zero-Touch Provisioning (ZTP)**, Centralized Cloud Management, and Intelligent Monitoring.\r\nCentralized Management: Cloud access and Omada app for ultra convenience and easy management.\r\nRobust Security Strategies: IP-MAC-Port Binding, ACL, Port Security, DoS Defend, Storm Control, DHCP Snooping, 802.1X, Radius Authentication, and more.\r\nOptimize Voice and Video Applications: L2/L3/L4 QoS and IGMP snooping.',	'TP-LINK',	24),
('0000000062',	'Battery GP GREENCELL Recharge 2100 AA',	'Battery - Alkaline ',	1250,	100,	'Model: Battery\r\nCategories:  Battery - Alkaline',	'GREENCELL',	1),
('0000000063',	'Battery CMOS CR 2032 ',	'Battery - CMOS',	150,	1000,	'Model: BATTERY\r\nCategories:  Battery - CMOS',	'Philips',	1),
('0000000064',	'UPS Battery Prolink 12V/8.2A',	'Battery - UPS',	3500,	15,	'12V 8.2Ahours\r\n\r\nStandby use:13.5-13.8\r\n\r\nCycle use :14.4 -15.0\r\n\r\nInitial current : >2.1A',	'ProLink',	6),
('0000000065',	'Blower Okem BL2301 600W',	'Blower',	4999,	15,	'Blower Okem BL2301 600W\r\nType\r\nLeaf Blower\r\n\r\n \r\n\r\nBrand\r\nOkem\r\n\r\n \r\n\r\nRated Power\r\n600 Watts\r\n\r\n \r\n\r\nVoltage\r\n220V\r\n\r\n \r\n\r\nFrequency\r\n50-60Hz',	'Okeme',	6),
('0000000066',	'Cleaner 3M Office & Desk',	'Cleaner',	1499,	100,	'Safely clean your screen and keyboard. Applicator has brush on one side and wipe on the other.',	'3M',	1),
('0000000067',	'Tool Kit Sprotek 145Pcs STK-28145',	'Computer Toolkit',	10599,	25,	'ÔÇó 5\" Wire Cutter/Stripper\r\nÔÇó 8\" Crimping Tool\r\nÔÇó Brush\r\nÔÇó Soldering Iron\r\nÔÇó Solder Wick\r\nÔÇó Solder Reel\r\nÔÇó Mini Hammer\r\nÔÇó 9Pcs Allen Wrenches\r\nÔÇó Vacuum Cleaner Set with Attachments\r\nÔÇó Cable Ties\r\nÔÇó Magnetic Telescoping Pick Up Tool\r\nÔÇó Electronic Voltage Tester\r\nÔÇó 33Pcs Security Bit Group:\r\n   9Pcs Hollow Star :T8H, T10H, T15H, T20H, T25H, T27H, T30H, T35H, T40H\r\n   6Pcs Hex Key : 5/64\", 3/32\", 7/64\", 1/8\", 9/64\", 5/32\"\r\n   6Pcs Hex : 2, 2.5, 3, 4, 5, 6mm\r\n   4Pcs Tri-ing : 1, 2, 3, 4\r\n   4Pcs Spanner : 4, 6, 8, 10 mm\r\n   3Pcs Torq : 6, 8, 10mm\r\n   1Pc 60mm Magnetic Bit Holder\r\nÔÇó 7Pcs Assorted Bits: \r\n   4Pcs Star : T10, T15, T20, T25\r\n   2Pcs Slotted:SL4, SL6mm\r\n   1Pc Philip : PH1\r\nÔÇó 7Pcs Assorted Bits:\r\n   4Pcs Square : S0, S1, S2, S3\r\n   1Pc Star : T8\r\n   1Pc Pozi:PZ1\r\n   1Pc Adaptor Bit for Socket\r\nÔÇó 5Pcs Sockets: 3/16\"-1/4\"-5/16\"-11/32\"-3/8\"\r\nÔÇó 5Pcs Sockets:6-7-8-9-10mm\r\nÔÇó Reversible Ratchet Handle\r\nÔÇó 42Pcs Terminals\r\nÔÇó Pen Knife\r\nÔÇó Tweezers Serrated Inside Point\r\nÔÇó 5\" Long Nose Pliers\r\nÔÇó 4-1/2\" Side Cutter\r\nÔÇó 6Pcs Precision Screwdriver Set\r\nÔÇó IC Extractor\r\nÔÇó 3-Claw Parts Retriever\r\nÔÇó Mini Flashlight\r\nÔÇó Insulated Tape\r\nÔÇó 2Pcs Batteries',	'Sprotek',	1),
('0000000068',	'PCI Express 2Serial 1Parallel',	'Controler Card',	3150,	12,	'odel : HX-411\r\nName: 2-Port Serial 1-Port Parallel PCI-Express Card\r\nSpecification & Features:\r\n1-Lane (x1) PCI-Express with transfer rate 2.5Gb/s full duplex channel\r\n2-Serial port with transfer rate up to 1.0Mbyte/s\r\n1-Parallel port with transfer rate up to 1.5Mbyte/s\r\nCompliant with PCI-Express Revision 1.0a\r\nCompatible with Standard 16C550 UART with 16-Byte Transmit-Receive FIFO\r\nSupport Plug and Play SPP, PS2, EPP, ECP Compatible IEEE 1284 Printer Port\r\nBuilt-in 16 Byte FIFO\r\nConnectors: 2 x 9-pin external Serial Ports - DB9 male,1 x 25-pin external Parallel Ports - DB25\r\nfemale\r\nSupports Windows 95, 98, ME, 2000, NT 4.0, XP, Vista, Linux and DOS operating system',	'N/Brand',	1),
('0000000069',	'KVM Switch Vcom 2 Port HDMI DD221',	'KVM Switch',	10250,	25,	'HDMI KVM Switch\r\n2x1 HDMI KVM Manual Switch built in HDMI cable\r\nVersion: HDMI 1.4\r\n\r\nType: Desktop\r\n\r\nSwitching mode: External button\r\n\r\nInput: (HDMI+USB) 2+USB(mouse)+USB(keyboard)+Button\r\n\r\nOutput: HDMI\r\n\r\nResolution: 1080P@60Hz\r\n\r\nInput cable distance: Self-contained cable 1.2m\r\n\r\nOutput cable distance: <15m AWG24 HDMI standard cable\r\n\r\nPower: No additional power required\r\n\r\nProduct Size: 80*110*25mm product Net weight: 0.30kg',	'VCOM',	6),
('0000000070',	'BlueTooth USB Dongle 5.0',	'Other Accessories',	1750,	45,	'Wireless USB Bluetooth 5.0 Receiver and Transmitter\r\nBluetooth version: V5.0\r\n\r\nReceiving / launching distance: Ôëñ 20 meters\r\n\r\nCompatible systems: for windows 7.8.10/XP/Vista/Mac OS\r\n\r\nUSB standard: USB 3.0\r\n\r\nProduct material: ABS\r\n\r\nApplicable products: Bluetooth mouse, keyboard, speaker, earphone, printer, gamepad, etc.',	'N/Brand',	1),
('0000000071',	'Telephone Prolink HCD-130 CLI Phone ',	'Telephone',	3999,	12,	'PRODUCT FEATURES\r\n\r\n- 8 Ring Tones\r\n- FSK/DTMF system compatible\r\n- FSK auto adjust real time\r\n- Record 38 incoming and 5 outgoing numbers\r\n- Calculator function\r\n- Alarm clock\r\n- Handsfree dialing and talking',	'ProLink',	12),
('0000000072',	'Vga Splitter Vcom 1-8 350Mhz DD138 ',	'VGA Splitter',	3999,	15,	'VGA, SVGA, XGA, Multisync signal supported;Video input: 1Vp-p impedance:75O\r\nvideo gain: 0db = DG = 1db Maximum resolution:1920 X1440; input max:8M;output max:15M;\r\nVoltage range: AC185V-250V 50/60Hz',	'VCOM',	1),
('0000000073',	'Cartridge Canon 2700 Black',	'Printers & Cartridge',	6499,	50,	'Model: 2700B\r\nCategories:  Canon Cartridges',	'Canon',	1);

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE `products_images` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `products_images_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products_images` (`ID`, `ProductID`, `Filename`) VALUES
(1,	'0000000001',	'1532-20210424000421-ROG Zephyrus Duo 15 SE_GX551_Product Photos_Lighting_03.png'),
(2,	'0000000002',	'2019-20210831130108-mac.png'),
(3,	'0000000003',	'1146-20210527132213-1894-20210407065919-p7-silent_pdt01.png'),
(4,	'0000000004',	'1604-1482-1604-1482-1604-1482-20200817103121-ROG STRIX HELIOS RGB.png'),
(5,	'0000000005',	'1926-20210428084520-PN40.png'),
(6,	'0000000001',	'1-71.webp'),
(7,	'0000000006',	'Screenshot 2021-09-25 at 16-52-25 https www daraz lk.png'),
(8,	'0000000006',	'Screenshot 2021-09-25 at 16-51-41 https www daraz lk.png'),
(9,	'0000000007',	'61533c5a52f19.png'),
(10,	'0000000007',	'61533c5a5cfb3.png'),
(11,	'0000000008',	'61533f7552b72.jpg'),
(12,	'0000000009',	'61534c72f2e61.jpg'),
(13,	'0000000010',	'615351e1037df.jpeg'),
(14,	'0000000011',	'615352d435197.jpeg'),
(15,	'0000000012',	'615355b0b47d2.jpeg'),
(16,	'0000000013',	'615356489887b.jpeg'),
(17,	'0000000014',	'615357628bedb.jpeg'),
(18,	'0000000015',	'61540f8f5f4d2.jpg'),
(19,	'0000000016',	'615410e6d77a9.jpeg'),
(20,	'0000000017',	'615411e43b75a.jpeg'),
(21,	'0000000018',	'61541556491ed.jpg'),
(22,	'0000000019',	'615419430fdc9.jpg'),
(25,	'0000000022',	'61541a4d75ff6.jpeg'),
(26,	'0000000023',	'61541b2bd530b.jpeg'),
(27,	'0000000024',	'61541c38e332b.jpg'),
(28,	'0000000025',	'61541d5ece37b.jpeg'),
(29,	'0000000026',	'61541de6e7115.jpeg'),
(30,	'0000000027',	'61541e7e046ef.jpeg'),
(31,	'0000000028',	'61541f191d1b7.png'),
(32,	'0000000029',	'61541fc6df901.jpeg'),
(33,	'0000000030',	'6154203f37c56.jpeg'),
(34,	'0000000031',	'615420d6c973c.jpeg'),
(35,	'0000000032',	'6154215e9926a.jpeg'),
(36,	'0000000033',	'615422614bf3a.jpeg'),
(37,	'0000000034',	'615422ffb012b.jpeg'),
(38,	'0000000035',	'615428b9ca3f9.jpeg'),
(39,	'0000000036',	'615429b23b354.jpg'),
(40,	'0000000037',	'61542a35803ba.jpeg'),
(41,	'0000000038',	'61542aabd2380.jpeg'),
(42,	'0000000039',	'61542b2366bc4.jpg'),
(43,	'0000000040',	'61542b979d007.jpeg'),
(44,	'0000000041',	'61542c2498a5e.jpeg'),
(45,	'0000000042',	'61542c8a850e8.jpeg'),
(46,	'0000000043',	'61542d00eb066.jpeg'),
(47,	'0000000044',	'61542d646f82a.jpeg'),
(48,	'0000000045',	'61542dd260b05.jpeg'),
(49,	'0000000046',	'61542eea2f544.jpeg'),
(50,	'0000000047',	'61542f5a22f53.jpeg'),
(51,	'0000000048',	'61542fcf5d5cd.jpeg'),
(52,	'0000000049',	'6154310a4c5b2.jpeg'),
(53,	'0000000050',	'615431929b2de.jpeg'),
(54,	'0000000051',	'6154325a02125.jpeg'),
(55,	'0000000052',	'615433b8d345d.jpeg'),
(56,	'0000000053',	'6154341b96a91.jpeg'),
(57,	'0000000054',	'6154349c6ecf3.jpeg'),
(58,	'0000000055',	'6154350dd2bd4.jpeg'),
(59,	'0000000056',	'6154358223490.jpg'),
(60,	'0000000057',	'6154362203951.jpeg'),
(61,	'0000000058',	'615436c7cb9e5.jpeg'),
(62,	'0000000059',	'6154378b47191.jpeg'),
(63,	'0000000060',	'615437fe6c1c8.jpeg'),
(64,	'0000000061',	'6154389a01a3d.jpeg'),
(65,	'0000000062',	'6154390aea41c.jpeg'),
(66,	'0000000063',	'615439c6d53eb.jpeg'),
(67,	'0000000064',	'61543a2057f15.jpeg'),
(68,	'0000000065',	'61543a995dfbd.jpg'),
(69,	'0000000066',	'61543b06ba5d6.jpeg'),
(70,	'0000000067',	'61543b8a8816d.jpeg'),
(71,	'0000000068',	'61543c776d3a6.jpeg'),
(72,	'0000000069',	'61543d07ba448.jpeg'),
(73,	'0000000070',	'61543ddf31660.jpg'),
(74,	'0000000071',	'61543f0c595c1.jpeg'),
(75,	'0000000072',	'61543f8ac609b.jpg'),
(76,	'0000000073',	'615440b9be80c.jpeg');

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `Rating` int(11) NOT NULL,
  `Review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ProductID`,`UserID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `review` (`Rating`, `Review`, `ProductID`, `UserID`) VALUES
(3,	'Good Quality ! fast Shipping !! All function keys are Working !!! 100% Quality Item !!! Recommended for anyone !!!! ❤️❤️❤️',	'0000000001',	'0000000100'),
(5,	'Perfect Product. Would buy from you again.',	'0000000001',	'0000000101'),
(5,	'Looks good, feels good, and arrived here 3 days before the estimated day, I am super satisfied with the product. Highly recommended. The only problem for me is that it needs a mouse pad on my desk to work, but it\'s not a big deal. Super cool.',	'0000000001',	'0000000102'),
(5,	'Really good Product. Worth my money',	'0000000003',	'0000000101');

DROP TABLE IF EXISTS `shippingaddress`;
CREATE TABLE `shippingaddress` (
  `id` int(11) NOT NULL,
  `shp_Address` varchar(50) NOT NULL,
  `shp_City` varchar(50) NOT NULL,
  `shp_Province` varchar(50) NOT NULL,
  `shp_Pincode` varchar(50) NOT NULL,
  `User_ID` varchar(10) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Biling address';

INSERT INTO `shippingaddress` (`id`, `shp_Address`, `shp_City`, `shp_Province`, `shp_Pincode`, `User_ID`, `First_Name`, `lastName`) VALUES
(1,	'83,maligawatha place',	'Colombo',	'Western province',	'01000',	'0000000101',	'Abdullah',	'Ramees'),
(2,	'83,HAJARA',	'Colombo',	'fasdf',	'01000',	'0000000101',	'Mohamed Ramees',	'Abdullah');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UserID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`UserID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Mobile`, `Gender`, `Type`, `Status`) VALUES
('0000000000',	'Admin',	'1',	'admin1@mastertech.com',	'8f7792843c076e2bcff7ef368a817dbb',	'+94774396812',	'Other',	'Admin',	'Active'),
('0000000100',	'Mahela',	'Dissanayake',	'maheladissanayake@gmail.com',	'e1aa512c96b6eb0678c5483c481e463f',	'0774396812',	'Male',	'User',	'Active'),
('0000000101',	'Nirmal',	'Samod',	'Nirmal123@gmail.com',	'c24551c36bb9ee0d31b1030877cfbb4d',	'+94775685956',	'Male',	'User',	'Active'),
('0000000102',	'Isuruni',	'Divyanjalee',	'Isuruni123@gmail.com',	'ddab0c2335e4fb28e66dcac64f9c4b1b',	'+94775632875',	'Female',	'User',	'Active'),
('0000000103',	'Kasun',	'Dananjaya',	'KasunD@abc.com',	'30473a6ef17613c493e677b60fb8da11',	'0774396888',	'Male',	'User',	'Unverified'),
('0000000104',	'Sachin',	'Tharaka',	'tharakasachin98@gmail.com',	'ad89208a654f7b21487739192e1f9776',	'0716289146',	'Male',	'User',	'Unverified'),
('0000000105',	'Abdullah',	'Ramees',	'abdullahteachofficial@gmail.com',	'136b91f391a9b2d6a4ef83a6508c2c3d',	'+94701171990',	'Male',	'User',	'Unverified'),
('0000000106',	'Shehan',	'Dissanayake',	'mahela100@gmail.com',	'673b0b860f85009a2deab62647f7c238',	'0778596852',	'Male',	'User',	'Unverified'),
('0000000107',	'Mohamed Ramees',	'Abdullah',	'm.abdullah.ramees0916@gmail.com',	'136b91f391a9b2d6a4ef83a6508c2c3d',	'+94701171990',	'Male',	'User',	'Unverified'),
('0000000108',	'Sasuke',	'Uchiha',	'kurukavatar69@gmail.com',	'32036005d1f6ed59803ba3e13c80993e',	'0774896572',	'Male',	'User',	'Active');

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `UserID` varchar(10) NOT NULL,
  `ProductID` varchar(10) NOT NULL,
  PRIMARY KEY (`UserID`,`ProductID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `wishlist` (`UserID`, `ProductID`) VALUES
('0000000101',	'0000000001'),
('0000000101',	'0000000002'),
('0000000101',	'0000000003'),
('0000000101',	'0000000004'),
('0000000101',	'0000000005'),
('0000000101',	'0000000006');

-- 2021-09-30 05:58:20
