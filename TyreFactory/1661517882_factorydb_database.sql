

CREATE TABLE `tbladmin` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  PRIMARY KEY (`User_Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbladmin VALUES("1","Rajesh","rajesh9","Experience of 7 years","rajesh@gmail.com");



CREATE TABLE `tblattendence` (
  `attendence_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Id` int(11) NOT NULL,
  `AttDate` date NOT NULL,
  `AttStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`attendence_Id`),
  KEY `Emp_Id` (`Emp_Id`),
  CONSTRAINT `tblattendence_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `tblemployee` (`Emp_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblattendence VALUES("1","1","2022-08-14","ABSENT");
INSERT INTO tblattendence VALUES("2","1","2022-08-15","HOLIDAY");
INSERT INTO tblattendence VALUES("3","1","2022-08-16","PRESENT");
INSERT INTO tblattendence VALUES("4","1","2022-08-17","ABSENT");
INSERT INTO tblattendence VALUES("5","1","2022-08-21","ABSENT");
INSERT INTO tblattendence VALUES("6","1","2022-08-21","PRESENT");
INSERT INTO tblattendence VALUES("7","2","2022-08-21","ABSENT");
INSERT INTO tblattendence VALUES("8","1","2022-08-25","PRESENT");



CREATE TABLE `tblbill` (
  `bill_Id` int(11) NOT NULL AUTO_INCREMENT,
  `order_Id` int(11) NOT NULL,
  `billAmt` float NOT NULL,
  `Cust_Id` int(11) NOT NULL,
  `billDate` date NOT NULL,
  `paidDate` date NOT NULL,
  `servicec` float NOT NULL,
  `labour` float NOT NULL,
  `billStatus` varchar(10) NOT NULL,
  `remark` varchar(10) NOT NULL,
  PRIMARY KEY (`bill_Id`),
  KEY `tblbill_ibfk_1` (`order_Id`),
  KEY `tblbill_ibfk_2` (`Cust_Id`),
  CONSTRAINT `tblbill_ibfk_1` FOREIGN KEY (`order_Id`) REFERENCES `tblworkorder` (`order_Id`),
  CONSTRAINT `tblbill_ibfk_2` FOREIGN KEY (`Cust_Id`) REFERENCES `tblcustomer` (`Cust_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblbill VALUES("1","2","360","2","2022-08-18","0000-00-00","60","500","Pending","UNDONE");



CREATE TABLE `tblbilldetails` (
  `billDetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `order_Id` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `desc` varchar(40) NOT NULL,
  PRIMARY KEY (`billDetailsId`),
  KEY `order_Id` (`order_Id`),
  KEY `itemId` (`itemId`),
  CONSTRAINT `tblbilldetails_ibfk_1` FOREIGN KEY (`order_Id`) REFERENCES `tblworkorder` (`order_Id`),
  CONSTRAINT `tblbilldetails_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `tblitem` (`itemId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tblbilldetails VALUES("1","1","1","4","360","");
INSERT INTO tblbilldetails VALUES("2","2","1","4","360","");
INSERT INTO tblbilldetails VALUES("3","2","2","4","360","");



CREATE TABLE `tblbrand` (
  `company_Id` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`company_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblbrand VALUES("1","Apollo","");
INSERT INTO tblbrand VALUES("2","MRF","");



CREATE TABLE `tblcustomer` (
  `Cust_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cust_Name` varchar(30) NOT NULL,
  `Cust_Address` varchar(40) NOT NULL,
  `Cust_Phone` varchar(10) NOT NULL,
  `Cust_Email` varchar(30) NOT NULL,
  `Cust_Password` varchar(10) NOT NULL,
  `Cust_Desc` varchar(50) NOT NULL,
  `Cust_Img` varchar(200) NOT NULL,
  PRIMARY KEY (`Cust_Id`),
  UNIQUE KEY `Cust_Email` (`Cust_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblcustomer VALUES("1","Seemitha","Sullia ","9480928167","seemitha@gmail.com","seemitha","","");
INSERT INTO tblcustomer VALUES("2","Snigdha","Paichar Sullia","8976545670","snigdha@gmail.com","","","");
INSERT INTO tblcustomer VALUES("8","sdf","ssdf","2342424","ab@gmail.com","123","dsf","");
INSERT INTO tblcustomer VALUES("9","sfdds","ssdf","324534543","s@gmail.com","12","sdfs","");
INSERT INTO tblcustomer VALUES("10","","sdfs","2342424","sdf@yahoo.com","12","sdf","");
INSERT INTO tblcustomer VALUES("11","","sdf","345345","sdfsf@gmail.com","33","sdfdsf","");
INSERT INTO tblcustomer VALUES("12","ab","ddsdf","123","rr@gmail.com","1123","xcv","");
INSERT INTO tblcustomer VALUES("13","sdfds","sdfsf","32424","asdd@gmail.com","12","sdfs","");
INSERT INTO tblcustomer VALUES("14","see","ssf","234","see@gm","12","dd","");
INSERT INTO tblcustomer VALUES("15","sdf","su","353","ja@gmail.com","12","sfdf","");
INSERT INTO tblcustomer VALUES("16","sdf","sdfsf","23424","aaa@gmail.com","sdf","sdf","");
INSERT INTO tblcustomer VALUES("17","sf","sdf","2342","sgf@gmail.com","12","sdf","");



CREATE TABLE `tblemployee` (
  `Emp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(30) NOT NULL,
  `Emp_Address` varchar(40) NOT NULL,
  `Emp_Phone` varchar(10) NOT NULL,
  `Emp_Password` varchar(10) NOT NULL,
  `Emp_Desc` varchar(50) NOT NULL,
  `Emp_Email` varchar(30) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `Emp_Img` varchar(50) NOT NULL,
  PRIMARY KEY (`Emp_Id`),
  UNIQUE KEY `Emp_Email` (`Emp_Email`),
  KEY `grade_id` (`grade_id`),
  CONSTRAINT `tblemployee_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `tblgrade` (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblemployee VALUES("1","Ravi","Puttur Dakshina Kannada","9876789345","ravi","Fresher","ravi@gmail.com","2","");
INSERT INTO tblemployee VALUES("2","Suresh K","Jalsoor Sullia D.K","7685945678","suresh","Experienced and skilled","suresh@gmail.com","1","");



CREATE TABLE `tblfeedback` (
  `feedback_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cust_Id` int(11) NOT NULL,
  `bill_Id` int(11) NOT NULL,
  `feedback_Date` date NOT NULL,
  `comment` varchar(50) NOT NULL,
  PRIMARY KEY (`feedback_Id`),
  KEY `tblfeedback_ibfk_1` (`Cust_Id`),
  KEY `tblfeedback_ibfk_2` (`bill_Id`),
  CONSTRAINT `tblfeedback_ibfk_1` FOREIGN KEY (`Cust_Id`) REFERENCES `tblcustomer` (`Cust_Id`),
  CONSTRAINT `tblfeedback_ibfk_2` FOREIGN KEY (`bill_Id`) REFERENCES `tblbill` (`bill_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblfeedback VALUES("1","2","1","2022-08-18","dsdddddddddddddddddd");



CREATE TABLE `tblgrade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_grade` varchar(10) NOT NULL,
  `Emp_sal` float NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblgrade VALUES("1","Senior","900");
INSERT INTO tblgrade VALUES("2","Junior","700");



CREATE TABLE `tblinvoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoicenumber` varchar(30) NOT NULL,
  `itemId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `Sup_Id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `itemId` (`itemId`),
  KEY `Sup_Id` (`Sup_Id`),
  CONSTRAINT `tblinvoice_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `tblitem` (`itemId`),
  CONSTRAINT `tblinvoice_ibfk_2` FOREIGN KEY (`Sup_Id`) REFERENCES `tblsupplier` (`Sup_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tblinvoice VALUES("1","1001","1","40","2400","1");
INSERT INTO tblinvoice VALUES("2","1002","2","60","3000","2");
INSERT INTO tblinvoice VALUES("3","1003","3","70","5000","2");



CREATE TABLE `tblitem` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(30) NOT NULL,
  `itemDesc` varchar(70) NOT NULL,
  `itemAmt` float NOT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblitem VALUES("1","Bonding Gum","","90");
INSERT INTO tblitem VALUES("2","Cushion Gum","","90");
INSERT INTO tblitem VALUES("3","Precured Threads","","450");
INSERT INTO tblitem VALUES("4","Conventional Rubber","","500");
INSERT INTO tblitem VALUES("5","Car Disc","","50");



CREATE TABLE `tblsalary` (
  `sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `doi` date NOT NULL,
  PRIMARY KEY (`sal_id`),
  KEY `Emp_Id` (`Emp_Id`),
  CONSTRAINT `tblsalary_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `tblemployee` (`Emp_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tblsalary VALUES("1","1","2100","2022-08-18");
INSERT INTO tblsalary VALUES("2","1","2800","0000-00-00");
INSERT INTO tblsalary VALUES("3","1","2800","0000-00-00");
INSERT INTO tblsalary VALUES("4","1","2800","0000-00-00");



CREATE TABLE `tblservice` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblservice VALUES("1","Hot Resole","");
INSERT INTO tblservice VALUES("2","Disc Change","");



CREATE TABLE `tblsettings` (
  `settingsId` int(11) NOT NULL,
  `shopName` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblsettings VALUES("1","Vaibhav Tyre","Rajesh Kumar","Odabai Sullia","rajesh@gmail.com","9480928167");



CREATE TABLE `tblstock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemId` int(11) NOT NULL,
  `Quantity` int(5) NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `tblstock_ibfk_1` (`itemId`),
  CONSTRAINT `tblstock_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `tblitem` (`itemId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblstock VALUES("1","1","28");
INSERT INTO tblstock VALUES("2","2","56");
INSERT INTO tblstock VALUES("3","3","70");
INSERT INTO tblstock VALUES("4","4","0");
INSERT INTO tblstock VALUES("5","5","0");



CREATE TABLE `tblsupplier` (
  `Sup_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sup_Name` varchar(30) NOT NULL,
  `Sup_Address` varchar(40) NOT NULL,
  `Sup_Email` varchar(30) NOT NULL,
  `Sup_Phone` varchar(10) NOT NULL,
  `Sup_Desc` varchar(50) NOT NULL,
  `Sup_Img` varchar(50) NOT NULL,
  PRIMARY KEY (`Sup_Id`),
  UNIQUE KEY `Sup_Email` (`Sup_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblsupplier VALUES("1","Ganesh","Kadri Road Managlore","ganesh@gmail.com","6789045678","","");
INSERT INTO tblsupplier VALUES("2","Hemanth","BC Road Mangalore","hemanth@gmail.com","9076124568","","");



CREATE TABLE `tbltyrepattern` (
  `pattern_Id` int(11) NOT NULL AUTO_INCREMENT,
  `patternName` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`pattern_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbltyrepattern VALUES("1","R4","");
INSERT INTO tbltyrepattern VALUES("2","MTR","");



CREATE TABLE `tbltyresize` (
  `size_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  `sizeName` varchar(30) NOT NULL,
  PRIMARY KEY (`size_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbltyresize VALUES("1","","700R15");
INSERT INTO tbltyresize VALUES("2","","750-16");



CREATE TABLE `tblvehicletype` (
  `vehicletype_id` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`vehicletype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblvehicletype VALUES("1","Car","sdkfafha");
INSERT INTO tblvehicletype VALUES("2","Truck","");



CREATE TABLE `tblworkorder` (
  `order_Id` int(11) NOT NULL AUTO_INCREMENT,
  `orderDate` date NOT NULL,
  `orderExpected` date DEFAULT NULL,
  `tyreNumber` varchar(30) NOT NULL,
  `vehicleNumber` varchar(40) NOT NULL,
  `size_Id` int(11) NOT NULL,
  `company_Id` int(11) NOT NULL,
  `estimatedAmt` float DEFAULT NULL,
  `pattern_Id` int(11) NOT NULL,
  `Cust_Id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `Emp_Id` int(11) DEFAULT NULL,
  `service_type` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `vehicletype_id` int(11) NOT NULL,
  PRIMARY KEY (`order_Id`),
  KEY `tblworkorder_ibfk_6` (`service_id`),
  KEY `tblworkorder_ibfk_2` (`company_Id`),
  KEY `tblworkorder_ibfk_3` (`size_Id`),
  KEY `tblworkorder_ibfk_4` (`pattern_Id`),
  KEY `tblworkorder_ibfk_5` (`Cust_Id`),
  KEY `Emp_Id` (`Emp_Id`),
  CONSTRAINT `tblworkorder_ibfk_1` FOREIGN KEY (`size_Id`) REFERENCES `tbltyresize` (`size_Id`),
  CONSTRAINT `tblworkorder_ibfk_2` FOREIGN KEY (`company_Id`) REFERENCES `tblbrand` (`company_Id`),
  CONSTRAINT `tblworkorder_ibfk_3` FOREIGN KEY (`pattern_Id`) REFERENCES `tbltyrepattern` (`pattern_Id`),
  CONSTRAINT `tblworkorder_ibfk_4` FOREIGN KEY (`Cust_Id`) REFERENCES `tblcustomer` (`Cust_Id`),
  CONSTRAINT `tblworkorder_ibfk_5` FOREIGN KEY (`Emp_Id`) REFERENCES `tblemployee` (`Emp_Id`),
  CONSTRAINT `tblworkorder_ibfk_6` FOREIGN KEY (`service_id`) REFERENCES `tblservice` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblworkorder VALUES("1","2022-08-17","2022-08-31","2134344","KA-26326","1","1","5000","1","1","1","1","Pick & Drop","2","Pending","0");
INSERT INTO tblworkorder VALUES("2","2022-08-18","2022-08-20","456788","KA-263267777","1","1","5000","1","1","1","2","Visit & Get","4","Pending","0");
INSERT INTO tblworkorder VALUES("3","2022-08-18","2022-08-26","2467890088","KA-263264567","1","1","400","1","2","1","2","Pick & Drop","4","Pending","0");

