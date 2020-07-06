CREATE TABLE IF NOT EXISTS aqua_val( 
value_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
dateandtime datetime NULL,
temperature float NULL,
light varchar(10) NULL,
pump varchar(10) NULL,
heating varchar(10) NULL
)
