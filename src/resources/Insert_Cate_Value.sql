-- Insert Brand table
INSERT INTO brand(Id, Name, Logo, Description) VALUES 
(0, 'Gucci', 'LogoImage', 'Đây là thương hiệu của Gucci'), 
(0, 'Louis Vuitton', 'LogoImage', 'Đây là thương hiệu của Louis Vuitton'),
(0, 'Chanel', 'LogoImage', 'Đây là thương hiệu của Chanel'), 
(0, 'Dior', 'LogoImage', 'Đây là thương hiệu của Dior'), 
(0, 'Hermes', 'LogoImage', 'Đây là thương hiệu của Hermes');


-- Insert Category table
INSERT INTO category(Id, Name, Image, Description, ParentCategory, Count) VALUES 
(0, 'Áo thun', 'Image', 'Đây là áo thun', NULL, 0),
(0, 'Áo thun tay ngắn', 'Image', 'Đây là áo thun tay ngắn', NULL, 0),
(0, 'Áo thun tay dài', 'Image', 'Đây là áo thun tay dài', NULL, 0),
(0, 'Áo sơ mi', 'Image', 'Đây là áo sơ mi', NULL, 0),
(0, 'Áo sơ mi tay ngắn', 'Image', 'Đây là sơ mi tay ngắn', NULL, 0),
(0, 'Áo sơ mi tay dài', 'Image', 'Đây là áo sơ mi tay dài', NULL, 0);


-- Insert Attribute table
INSERT INTO attribute(Id, Size, Color) VALUES 
(0, 'S', 'Đen'), (0, 'M', 'Đen'), (0, 'L', 'Đen'), (0, 'XL', 'Đen'),
(0, 'S', 'Trắng'), (0, 'M', 'Trắng'), (0, 'L', 'Trắng'), (0, 'XL', 'Trắng'),
(0, 'S', 'Đỏ'), (0, 'M', 'Đỏ'), (0, 'L', 'Đỏ'), (0, 'XL', 'Đỏ'),
(0, 'S', 'Xanh dương'), (0, 'M', 'Xanh dương'), (0, 'L', 'Xanh dương'), (0, 'XL', 'Xanh dương'),
(0, 'S', 'Vàng'), (0, 'M', 'Vàng'), (0, 'L', 'Vàng'), (0, 'XL', 'Vàng'),
(0, 'S', 'Cam'), (0, 'M', 'Cam'), (0, 'L', 'Cam'), (0, 'XL', 'Cam'),
(0, 'S', 'Xám'), (0, 'M', 'Xám'), (0, 'L', 'Xám'), (0, 'XL', 'Xám'),
(0, 'S', 'Xanh lá cây'), (0, 'M', 'Xanh lá cây'), (0, 'L', 'Xanh lá cây'), (0, 'XL', 'Xanh lá cây');
