create database db_satellite;

use db_satellite;

create table tbl_user(
    user_id int auto_increment,
    user_type varchar(20) not null,
    username varchar(70) not null,
    user_password varchar(150) not null,
    user_status varchar(20) not null,
    email varchar(70) not null,
    user_last_valid_login datetime,
    user_first_invalid_login datetime,
    user_faild_login_count int not null,
    user_create_date datetime not null,
    modified_by int not null,
    modification_date datetime not null,
    primary key(user_id)
);

create table tbl_mail(
    mail_id int auto_increment,
    from_user_id int not null,
    to_user_id int not null,
    mail_date datetime not null,
    mail_title varchar(200) not null,
    mail_content text not null,
    mail_status varchar(10) not null,
    primary key(mail_id),
    foreign key(from_user_id) references tbl_user(user_id),
    foreign key(to_user_id) references tbl_user(user_id)
);
