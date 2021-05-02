drop table personnelInfo;

create table personnelInfo
(No int(5) NOT NULL auto_increment,
FullName char(50),
image blob NOT NULL,
DateJoined varchar(15),
Department char(50),
ProjectInvolved char(50),
annualSalary int(5),
PRIMARY KEY(No));
