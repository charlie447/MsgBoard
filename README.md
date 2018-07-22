# MsgBoard
A message board with PHP and MySQL


## MySQL DB

### Create Tables
`T_USER_LOGIN`:用户注册表(For User Register)
```sql
CREATE TABLE T_USER_LOGIN( uuid INTEGER(4) ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(20) NOT NULL, password VARCHAR(128) NOT NULL, ip_reg VARCHAR(128) NOT NULL, time_reg INT NOT NULL, permission TINYINT(1) UNSIGNED NOT NULL DEFAULT 2 )engine='innodb' charset=utf8;

```
`T_USER_MESSAGE`:用户留言表(Comment)
```sql
CREATE TABLE T_USER_MESSAGE( message_id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, ip_user_post VARCHAR(128) NOT NULL, name_user_post VARCHAR(20) NOT NULL, content LONGTEXT BINARY NOT NULL, time_post INT NOT NULL,  lock_message TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 )engine='innodb' charset=utf8;
```

### Insert data

```sql
INSERT INTO T_USER_MESSAGE (ip_user_post, name_user_post, content, time_post, lock_message)
VALUES
("localhost", "user9527", "It's been so long.", 1532225788, 1)
```
