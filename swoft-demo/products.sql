CREATE TABLE IF NOT EXISTS `products`(
   `prod_id` INT UNSIGNED AUTO_INCREMENT,
   `prod_name` VARCHAR(100) NOT NULL,
   `prod_price` int(10) NOT NULL,
   PRIMARY KEY ( `prod_id` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


php bin/swoft entity:create --table=products,products_class --pool=db.pool --path=@app/Models

composer require swoft/devtool