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
