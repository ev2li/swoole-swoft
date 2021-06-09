# swoole-swoft
swoole&amp;swoft

swoftcli run -c http:start -b bin/swoft 

swoftcli gen:http-middleware controller

CREATE TABLE IF NOT EXISTS `products`(
   `prod_id` INT UNSIGNED AUTO_INCREMENT,
   `prod_name` VARCHAR(100) NOT NULL,
   `prod_price` int(10) NOT NULL,
   PRIMARY KEY ( `prod_id` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 insert into products(prod_name, prod_price) values("php", 20),("java",40),("golang",50);
