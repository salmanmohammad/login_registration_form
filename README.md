### Creating the Database

Create database "login" and create table "users" :

```sql
CREATE DATABASE `login`;

USE DATABASE `login`;

CREATE TABLE `users` (
`id` int(4) NOT NULL auto_increment,
`username` varchar(65) NOT NULL default '',
`password` varchar(65) NOT NULL default '',
`email` varchar(65) NOT NULL default '',
`profile_image` varchar(250) default '',
PRIMARY KEY (`id`)
);
