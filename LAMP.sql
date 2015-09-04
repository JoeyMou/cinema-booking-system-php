use mlhu5y21_201311;
CREATE TABLE 12222_Movie
(
	Movie_ID int AUTO_INCREMENT PRIMARY KEY,
	Movie_Name varchar(50) NOT NULL,
	Director varchar(30) NOT NULL,
	Actors varchar(200) NOT NULL,
	Production_Year char(5) NOT NULL,
	Movie_Type varchar(40) NOT NULL,
	Movie_Desc varchar(6000) NOT NUll 
);

CREATE TABLE 12222_Hall
(
	Hall_ID int PRIMARY KEY,
	Rows_Count int NOT NULL,
	Columns_Count int NOT NULL,
	Total_Seats int NOT NULL 
);

CREATE TABLE 12222_Running_Movie
(
	Running_Movie_ID int AUTO_INCREMENT PRIMARY KEY,
	Movie_ID int NOT NULL,
	Hall_ID int NOT NUll,
	Showtime datetime NOT NULL,
	Price decimal NOT NULL,
	
	FOREIGN KEY (Movie_ID) REFERENCES 12222_Movie(Movie_ID),
	FOREIGN KEY (Hall_ID) REFERENCES 12222_Hall(Hall_ID)
);

CREATE TABLE 12222_Seat_On_Sale
(
	Seat_ID int AUTO_INCREMENT PRIMARY KEY,
	Running_Movie_ID int NOT NULL,
	Row_Num int NOT NUll,
	Column_Num int NOT NULL,
	Is_Reserved tinyint NOT NULL DEFAULT 0,

	FOREIGN KEY (Running_Movie_ID) REFERENCES 12222_Running_Movie(Running_Movie_ID)
);

CREATE TABLE 12222_Customer
(
	Customer_ID int AUTO_INCREMENT PRIMARY KEY,
	Pwd varchar(40) NOT NULL,
	Nickname varchar(20) NOT NULL,
	Tel char(12) NOT NUll,
	Email varchar(30) NOT NULL,
	Sex tinyint,

	UNIQUE KEY (Nickname)
);

CREATE TABLE 12222_Orders
(
	Order_ID int AUTO_INCREMENT PRIMARY KEY,
	Customer_ID int NOT NULL,
	Seat_ID int NOT NULL,
	Order_Date datetime NOT NULL,
	Total_Price decimal NOT NULL,
	Is_Commented tinyint NOT NULL DEFAULT 0,
	FOREIGN KEY (Customer_ID) REFERENCES 12222_Customer(Customer_ID),
	FOREIGN KEY (Seat_ID) REFERENCES 12222_Seat_On_Sale(Seat_ID)
);

CREATE TABLE 12222_Movie_Comment
(
	Comment_ID int AUTO_INCREMENT PRIMARY KEY,
	Movie_ID int NOT NULL,
	Order_ID int NOT NULL,
	Comment_Date datetime NOT NULL,
	Comment varchar(500) NOT NULL,
	FOREIGN KEY (Movie_ID) REFERENCES 12222_Movie(Movie_ID),
	FOREIGN KEY (Order_ID) REFERENCES 12222_Orders(Order_ID)
);

CREATE TABLE 12222_Movie_Picture
(
	Pic_ID int AUTO_INCREMENT PRIMARY KEY,
	Movie_ID int NOT NULL,
	pic blob NOT NULL,
	FOREIGN KEY (Movie_ID) REFERENCES 12222_Movie(Movie_ID)
);
use mlhu5y21_201311;
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('肖申克的救赎','弗兰克·德拉邦特','蒂姆·罗宾斯 / 摩根·弗里曼 / 鲍勃·冈顿 / 威廉姆·赛德勒 / 克兰西·布朗','1994','剧情 / 犯罪','希望让人自由。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('这个杀手不太冷','吕克·贝松','让·雷诺 / 娜塔莉·波特曼 / 加里·奥德曼 / 丹尼·爱罗 / 麦温·勒·贝斯柯','1994','剧情 / 惊悚 / 犯罪','怪蜀黍和小萝莉不得不说的故事。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('阿甘正传','罗伯特·泽米吉斯','汤姆·汉克斯 / 罗宾·怀特 / 加里·西尼斯 / 麦凯尔泰·威廉逊 / 莎莉·菲尔德 / Michael Conner Humphreys / 海利·乔·奥斯蒙','1994','剧情 / 爱情','一部美国近现代史。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('海上钢琴师','朱塞佩·托纳多雷','蒂姆·罗斯 / 普路特·泰勒·文斯 / 比尔·努恩 / 梅兰尼·蒂埃里 / 阿尔贝托·巴斯克斯','1998','剧情 / 爱情 / 音乐','每个人都要走一条自己坚定了的路，就算是粉身碎骨。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('辛德勒的名单','史蒂文·斯皮尔伯格','连姆·尼森 / 本·金斯利 / 拉尔夫·费因斯 / 卡罗琳·古多尔 / Jonathan Sagall','1993','剧情 / 历史 / 战争','拯救一个人，就是拯救整个世界。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('放牛班的春天','克里斯托夫·巴拉蒂','杰拉尔·朱诺 / 弗朗西斯·贝尔兰德 / 凯德·麦拉德 / Jean-Paul Bonnaire / 玛丽·布奈尔 / 尚-巴堤·莫里耶 / 马科森斯·珀林','2004','剧情 / 音乐','天籁一般的童声，是最接近上帝的存在。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('龙猫','宫崎骏','日高法子 / 坂本千夏 / 岛本须美 / 北林谷荣 / 高木均','1988','动画 / 家庭 / 奇幻 / 冒险','人人心中都有个龙猫，童年就永远不会消失。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('泰坦尼克号','詹姆斯·卡梅隆','莱昂纳多·迪卡普里奥 / 凯特·温丝莱特 / 比利·赞恩 / 凯西·贝茨 / 弗兰西丝·费舍 / 格劳瑞亚·斯图尔特 / 苏茜·爱米斯 / 比尔·帕克斯顿 / 伯纳德·希尔 / 维克多·加博 / 伊万·斯图尔特 / 詹姆斯·卡梅隆','1997','剧情 / 爱情 / 历史 / 冒险 / 灾难','失去的才是永恒的。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('教父','弗朗西斯·福特·科波拉',' 马龙·白兰度 / 阿尔·帕西诺 / 詹姆斯·凯恩 / 罗伯特·杜瓦尔 / 黛安·基顿','1972','剧情 / 惊悚 / 犯罪','千万不要记恨你的对手，这样会让你失去理智。');
insert into 12222_Movie(Movie_Name,Director,Actors,Production_Year,Movie_Type,Movie_Desc)
	values ('楚门的世界','彼得·威尔','金·凯瑞 / 劳拉·琳妮 / 艾德·哈里斯 / 诺亚·艾默里奇 / 娜塔莎· 麦克艾霍恩','1998','剧情 / 科幻','如果再也不能见到你，祝你早安，午安，晚安。');use mlhu5y21_201311;
INSERT INTO 12222_Hall(Hall_ID,Rows_Count,Columns_Count,Total_Seats)
	values(1,12,12,144);
INSERT INTO 12222_Hall(Hall_ID,Rows_Count,Columns_Count,Total_Seats)
	values(2,12,12,144);
INSERT INTO 12222_Hall(Hall_ID,Rows_Count,Columns_Count,Total_Seats)
	values(3,12,12,144);
INSERT INTO 12222_Hall(Hall_ID,Rows_Count,Columns_Count,Total_Seats)
	values(4,12,12,144);
INSERT INTO 12222_Hall(Hall_ID,Rows_Count,Columns_Count,Total_Seats)
	values(5,12,12,144);