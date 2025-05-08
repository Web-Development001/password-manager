USE password_manager;

CREATE TABLE User_Sec_Info(
	Name VARCHAR(30),
	Ip_addr VARCHAR(16),
    User_agant TEXT,
    Country VARCHAR(30),
    City VARCHAR(30),
    ISP VARCHAR(30),
    ISP_organization VARCHAR(60),
    Latitude VARCHAR(30),
    Longitude VARCHAR(30),
    Mobile VARCHAR(10),
    Proxy VARCHAR(10),
    Date date,
    Time time
);

SELECT * FROM User_Sec_Info;
    
    
    