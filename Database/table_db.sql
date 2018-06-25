CREATE TABLE reply (
	reply_id int not null PRIMARY KEY AUTO_INCREMENT,
    ques_id int not null,
    user_id varchar(128) not null,
    date datetime not null,
    message TEXT not null);

CREATE TABLE question ( 
	ques_id int NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	user_id varchar(128) not null,
	date datetime not null,
	message TEXT NOT NULL );