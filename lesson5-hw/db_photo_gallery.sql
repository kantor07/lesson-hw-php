CREATE DATABASE db_photo_gallery;
USE db_photo_gallery;

DROP TABLE IF EXISTS photos;
CREATE TABLE photos(
	id SERIAL PRIMARY KEY,
    media_type VARCHAR(10) NOT NULL,
    filename VARCHAR(25) NOT NULL,
    `size` INT,
	address_photo VARCHAR(255) NOT NULL,
	created_at DATETIME DEFAULT NOW() NOT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    view_count VARCHAR(10)
);


DELETE FROM photos;
INSERT INTO photos (id,media_type,filename,`size`,address_photo, created_at) VALUES 
(1,'Photo','3.jpg',559,'/images/3.jpg','2021-11-23 10:27:51'),
(2,'Photo','7.jpg',323,'/images/7.jpg','2021-11-23 10:27:51'),
(3,'Photo','8.jpg',679,'/images/8.jpg','2021-11-23 10:27:51'),
(4,'Photo','11.jpg',343,'/images/11.jpg','2021-11-23 10:27:51'),
(5,'Photo','16.jpg',223,'/images/16.jpg','2021-11-23 10:27:51'),
(6,'Photo','17.jpg',390,'/images/17.jpg','2021-11-23 10:27:51'),
(7,'Photo','24.jpg',518,'/images/24.jpg','2021-11-23 10:27:51'),
(8,'Photo','25.jpg',313,'/images/25.jpg','2021-11-23 10:27:51'),
(9,'Photo','27.jpg',343,'/images/27.jpg','2021-11-23 10:27:51'),
(10,'Photo','29.jpg',742,'/images/29.jpg','2021-11-23 10:27:51'),
(11,'Photo','32.jpg',356,'/images/32.jpg','2021-11-23 10:27:51')
;

