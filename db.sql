create database secure_login;
use secure_login;
create table admin(id int not null auto_increment primary key,username varchar(255),password varchar(255));
create table security(id int not null auto_increment primary key,locked_time int,attempt int,last_login varchar(255),ip_address varchar(255));
insert into admin(username,password) values('admin','63a9f0ea7bb98050796b649e85481845');
insert into security(locked_time,attempt,last_login,ip_address) values(0,3,null,null);
