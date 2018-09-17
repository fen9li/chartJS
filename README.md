# chartJS
Combine mariaDB, PHP &amp; chartJS

## Prepare a lamp stack 

* ensure mariaDB is up and running
* ensure httpd web server is up and running
* ensure php is installed properly

```
[fli@lamp_testing ~]$ uname -a
Linux lamp_testing 3.10.0-862.11.6.el7.x86_64 #1 SMP Tue Aug 14 21:49:04 UTC 2018 x86_64 x86_64 x86_64 GNU/Linux
[fli@lamp_testing ~]$
[fli@lamp_testing ~]$ sudo systemctl is-active mariadb
active
[fli@lamp_testing ~]$ sudo systemctl is-active httpd
active
[fli@lamp_testing ~]$ php --version
PHP 7.1.21 (cli) (built: Aug 15 2018 17:56:55) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.1.21, Copyright (c) 1999-2018, by Zend Technologies
[fli@lamp_testing ~]$
```

## prepare drawing data

* create database flitest
* create database user
* create table chartjs
* insert charting data

```
CREATE DATABASE flitest;
CREATE USER 'fli'@'localhost' IDENTIFIED BY 'flipassword';
CREATE USER 'fli'@'%' IDENTIFIED BY 'flipassword';
GRANT ALL ON flitest.* TO 'fli'@'localhost';
GRANT ALL ON flitest.* TO 'fli'@'%';

MariaDB [(none)]> use flitest
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [flitest]> DESCRIBE chartjs;
+----------------------+--------------+------+-----+---------+-------+
| Field                | Type         | Null | Key | Default | Extra |
+----------------------+--------------+------+-----+---------+-------+
| chartid              | int(11)      | NO   |     | NULL    |       |
| charttype            | varchar(200) | NO   |     | NULL    |       |
| chartdata            | varchar(200) | NO   |     | NULL    |       |
| chartlabel           | varchar(200) | NO   |     | NULL    |       |
| chartbackgroundcolor | varchar(200) | NO   |     | NULL    |       |
| chartbordercolor     | varchar(200) | NO   |     | NULL    |       |
+----------------------+--------------+------+-----+---------+-------+
6 rows in set (0.05 sec)

MariaDB [flitest]>

MariaDB [flitest]> SELECT * FROM chartjs;
+---------+-----------+--------------------+------------------+----------------------+------------------+
| chartid | charttype | chartdata          | chartlabel       | chartbackgroundcolor | chartbordercolor |
+---------+-----------+--------------------+------------------+----------------------+------------------+
|       1 | line      | 60,10,5,2,20,30,45 | fli chartjs test | blue                 | green            |
+---------+-----------+--------------------+------------------+----------------------+------------------+
1 row in set (0.00 sec)

MariaDB [flitest]>
```

## clone this repo into /var/www/html

* note: must empty folder /var/www/html before clone this repo

```
[fli@lamp_testing ~]$ cd /var/www/html/
[fli@lamp_testing html]$
[fli@lamp_testing html]$ pwd
/var/www/html
[fli@lamp_testing html]$
[fli@lamp_testing html]$ git clone -b develop git@github.com:fen9li/chartJS.git .
Cloning into '.'...
remote: Counting objects: 9, done.
remote: Compressing objects: 100% (7/7), done.
remote: Total 9 (delta 0), reused 5 (delta 0), pack-reused 0
Receiving objects: 100% (9/9), 6.02 KiB | 0 bytes/s, done.
[fli@lamp_testing html]$
```

## test http://<hostname or host ip address>/index.php

![Alt 'Screenshot of testing chart'](chartjs.png?raw=true "The testing chart")

## Comments

All comments are welcomed ...
