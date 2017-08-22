@echo off

 @set input1=""

:begin

E:\xampp\mysql\bin\mysql -uroot hibuy < hb_color.sql

E:\xampp\mysql\bin\mysql -uroot hibuy < hb_dress.sql

E:\xampp\mysql\bin\mysql -uroot hibuy < hb_popular_category.sql

E:\xampp\mysql\bin\mysql -uroot hibuy < hb_product_category.sql

E:\xampp\mysql\bin\mysql -uroot hibuy < hb_size.sql