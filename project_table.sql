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

-- insert into storebenefit values(NULL, 'Newport News Deco. Inc.', '12850.50','9750.25','37333.43','54321.26');
-- insert into storebenefit values(NULL, 'Yorktown Deco. Inc.', '22567.25','7853.28','750.45','12700.33');
-- insert into storebenefit values(NULL, 'Poquoson Deco. Inc.', '917.95','3250.00','17800.77','4892.26');
-- insert into storebenefit values(NULL, 'Hampton Deco. Inc.', '77892.82','2287.46','8841.43','44673.26');