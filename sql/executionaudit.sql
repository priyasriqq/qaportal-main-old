CREATE TABLE `executionaudit` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `Project` varchar(200) NOT NULL,
 `Environment` varchar(200) NOT NULL,
 `TestingType` varchar(200) NOT NULL,
 `DeviceType` varchar(50) NOT NULL,
 `Browser` varchar(50) DEFAULT NULL,
 `Devices` varchar(100) DEFAULT NULL,
 `ScheduledAt` timestamp NOT NULL,
 `Machine` varchar(100) NOT NULL,
 `BuildURL` varchar(300) DEFAULT NULL,
 `ExecutionStatus` varchar(50) NOT NULL,
 `TriggeredBy` varchar(100) NOT NULL,
 `Emails` varchar(600) NOT NULL,
 `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `LastModifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4
