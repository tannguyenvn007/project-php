CREATE DATABASE perfume;
USE perfume;

CREATE TABLE admin(
	id INT(11) NOT NULL,
    user_name VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    passwords VARCHAR(225) collate utf8_unicode_ci NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO admin
	VALUES
    (1,'admin','admin');

CREATE TABLE image_slide(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    link_img VARCHAR(225) collate utf8_unicode_ci NOT NULL
);
INSERT INTO image_slide(id, link_img)
	VALUES
        (4,'./Hinhanh/slide4.jpg'),
        (5,'./Hinhanh/slide5.jpg'),
        (6,'./Hinhanh/slide6.jpg'),
        (7,'./Hinhanh/slide7.jpg'),
        (8,'./Hinhanh/slide8.jpg'),
        (9,'./Hinhanh/slide9.jpg');
        
        
CREATE TABLE brands (
  id int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  brand_title text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	INSERT INTO brands 
	VALUES(DEFAULT,'Avon');
    INSERT INTO brands 
	VALUES(DEFAULT,'Chanel');
    INSERT INTO brands 
	VALUES(DEFAULT,'Adidas');
    INSERT INTO brands 
	VALUES(DEFAULT,'Versace');
    INSERT INTO brands 
	VALUES(DEFAULT,'Gucci');
    INSERT INTO brands 
	VALUES(DEFAULT,'Calvin Klein');
    
	
CREATE TABLE category(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name_category VARCHAR(225) collate utf8_unicode_ci NOT NULL
);

	

CREATE TABLE products(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_pro VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    price FLOAT NOT NULL,
    created DATE,
    status_pro INT(11), 
    category_id INT(11),
    quantity INT,
    label VARCHAR(255),
    origin VARCHAR(255),
    style VARCHAR(255),
    incense VARCHAR(255),
    capacity VARCHAR(255),
    keyword varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
    description text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO products(name_pro, price, created, status_pro, category_id, quantity, label, origin, style, incense, capacity, keyword, description)
	VALUES
		('Tommy Hilfiger',1235000,'2017-01-20',0,1,90,'Hermes','Pháp','Thoải mái, nam tính và tràn đầy sức sống','Hương gỗ đàn','90ml',NULL,'Sự ấm áp đến từ gỗ và phong cách phương Đông, thêm vào đó các phiên bản mới kết hợp màu hổ phách, xạ hương và tầng hương gỗ đàn hương tạo. Dòng nước hoa mới này có hương thơm mạnh mẽ, mãnh liệt hơn phiên bản trước bởi thành phần gỗ guaiac, tonka và nhựa cánh kiến ​​trắng.'),
        ('Issey Miyake',1240000,'2017-1-2',0,2,100,'Bvlgari','Hoa kỳ','Giản dị nhưng đầy quyến rũ','Hương hoa hồng','80ml',NULL,'Issey Miyake ra đời vào năm 2005, đây là điểm đến thứ hai trong tạp chí du lịch ấn tượng này. được sản xuất bởi Jean - Claude Ellena'),
		('Mont Blanc',2035000,'2017-10-20',0,3,50,'Dunhill','Pháp','Nam tính, lịch lãm, khỏe khoắn','Hương xạ hương','90ml',NULL,'Mont Blanc là sản phẩm đầu tiên nằm trong bộ sưu tập mới Icon của thương hiệu Dunhill. Chai nước hoa được miêu tả là một mùi hương nam tính và hấp dẫn, đã đem đến một nguồn ánh sáng mới từ những nốt hương đặc trưng được tạo bởi bậc thầy nước hoa Carlos Benaim đã tạo nên sự tương phản giữa cam chanh và da thuộc với các hương gia vị được làm ngọt để mang lại cảm giác gợi cảm, và cực kỳ nam tính.'),
		('John Varvatos',1980000,'2017-12-20',0,1,110,'Ralph Lauren','Ý','Thể thao, năng động, tươi mát','Hương cây hứng quế','90ml',NULL,'John Varvatos vẫn hướng đến những chàng trai trẻ ưa vận động, tự tin, yêu tự do và luôn tràn đầy năng lượng sống. Một hương thơm lí tưởng cho mùa hè và những lúc bạn cần “lên dây cót” cho tinh thần mình. Khởi đầu với hương cam Bergamot, bạch đậu khấu và hương nước biển mát không ngờ, John Varvatos tiếp tục làm bạn phấn chấn hơn với tầng hương giữa gồm hoa diên vĩ, húng quế và cỏ đuôi ngựa thể hiện sự nam tính, cuối cùng là tầng hương ấm của gỗ thơm, và hoắc hương hòa quyện cùng hương da lộn đặc trưng. '),
		('Artisan Acqua',2500.000,'2017-2-20',0,3,100,'Burberry','Pháp','Sang trọng, thanh lịch, sành điệu','Hương hoa phong lữ','90ml',NULL,'Artisan Acqua lưu giữ trọn vẹn hương thơm của một khu vườn sau cơn mưa. Tầng hương đầu là hoa đậu ngọt và cam belgamot hòa quyện với hoa phong lữ trắng, quả mộc qua chín mọng ánh vàng kim và hoa diên vỹ fressia ngào ngạt, trên nền hương cuối của đất, gỗ ẩm ướt sau cơn mưa từ lá hoắc hương và hai loại hoa hồng trắng: damask tươi mát và centifolia dịu ngọt như mật ong. Artisan Acqua sẽ là sự lựa chọn hoàn hảo cho bất cứ dịp nào và bất cứ nơi đâu bạn đi đến, bạn sẽ luôn nổi bật và thu hút. '),
		('Obsessed',1280000,'2018-1-13',0,2,60,'Nina Ricci','Thổ Nhĩ Kì','Nữ tính, gợi cảm, quyến rũ','Hương hoa cỏ trái cây','90ml',NULL,'Hương thơm bắt đầu với hương hồ tiêu hồng lôi cuốn, tương phản với vị chua của quả lý chua đen. Hương thơm sau đó dần biến đổi và chuyền sang một phong cách sang trọng nhưng giản dị của hoa hồng Thổ Nhĩ Kỳ hòa trộn với hoa đậu và nốt hương hoa lay-ơn mới mẻ và khác lạ. Cuối cùng, vị ngọt nhẹ nhàng của kẹo hạnh nhân được bao bọc trong sô-cô-la kết hợp với sự ấm áp mà hổ phách mang lại để giúp thêm phần gợi cảm và lãng mạn vào bầu không khí về đêm.'),
		('Le Male',3950000,'2017-2-2',0,3,120,'Chanel','Pháp','Hiện đại, gợi cảm','Hương hoa cỏ trái cây','80ml',NULL,'Lớp hương đầu của Le Male là sự kết hợp của hương trái cam Sicily, cam bergamot Calabria và hương trái bưởi Sicily. Lớp hương giữa là hương hoa cỏ được tạo ra bởi thành phần tinh chất hương hoa hồng tinh khiết kết hợp với tinh chất hương hoa nhài, kèm theo với hương trái vải mọng nước, ngon ngọt. Trong khi đó, lớp hương nền là sự kết hợp của thành phần hoắc hương Indonesia, cỏ lau Haity, vani Bourdon và xạ hương trắng. Dòng nước hoa này dành riêng cho những người phụ nữ hiện đại, gan dạ, yêu thích sự thanh lịch và sang trọng.'),
		('Eternity',3000000,'2017-2-13',0,2,100,'Lacoste','Pháp','Nữ tính, gợi cảm, quyến rũ','Hương xạ hương','90ml',NULL,'Hương thơm bắt đầu với hương hồ tiêu hồng lôi cuốn, tương phản với vị chua của quả lý chua đen. Hương thơm sau đó dần biến đổi và chuyền sang một phong cách sang trọng nhưng giản dị của hoa hồng Thổ Nhĩ Kỳ hòa trộn với hoa đậu và nốt hương hoa lay-ơn mới mẻ và khác lạ. Cuối cùng, vị ngọt nhẹ nhàng của kẹo hạnh nhân được bao bọc trong sô-cô-la kết hợp với sự ấm áp mà hổ phách mang lại để giúp thêm phần gợi cảm và lãng mạn vào bầu không khí về đêm.'),
		('Carolina Herrera',192800,'2017-12-24',0,1,67,'Hermes','Pháp','Thể thao, năng động, tươi mát','Hương gỗ phách','90ml',NULL,'Sản phẩm được đựng trong thiết kế chai thủy tinh đục màu hồng, và trang trí bằng một chiếc khăn lụa satin. Thử mặc một ít nước hoa cho buổi hẹn hò đầu tiên để các nàng có thể cảm nhận được sự hiệu quả của nó nhé.'),
		('Champions Edition',1620000,'2017-1-26',0,3,98,'Juicy Couture','Mỹ','Trẻ trung',' Hương vanilla','90ml',NULL,'Tông hương ngập tràn mùi hương thơm ngát, tươi mới với hương thơm của hoa chanh, cam, lan Nam Phi, hoa hồng, hoa nhài, hoa huệ và violet . Cam và hoa chanh là lớp hương mở đầu, lớp hương giữa là sự hòa quyện của lan Nam Phi, hoa hồng, violet và hoa nhài. Cuối cùng là lớp hương cuối ấm áp và dễ chịu của hoa vòi voi, gỗ đàn hương và quế.'),
		('Terre Dhermes',2456000,'2017-1-1',0,1,100,'Calvin Klein','Mỹ','Cuốn hút, nồng nàn, nam tính','Hương gỗ đàn','90ml',NULL,'Đối với phiên bản dành cho nam, mùi hương được biến đổi thành tông mùi gồm hỗn hợp hương thơm đến từ dương xỉ, cam quýt, oải hương và gỗ tạo nên một ấn tượng mới đậm đà. Đặc biệt, phiên bản nam còn đem tới cảm giác thú vị bởi sự thu hút và thèm khát được chạm vào hỗn dương xỉ Phương Đông đầy đam mê này.'),
		('Allure',1726000,'2017-12-1',0,3,78,'Bvlgari','Hoa kỳ','Hiện đại, gợi cảm','Hương hoa linh lan','90ml',NULL,'Nước hoa được phân loại thuộc nhóm hương thơm hoa cỏ với hương thơm sinh động và vui tươi là một sự kết hợp tinh tế của các loài hoa, cam chanh, hoa quả và gỗ mang lại một luồng khí trong lành và tinh tế.'),
		('Exclusive',1324.000,'2017-2-28',0,3,102,'Calvin Klein','Anh Quốc','Sang trọng, thanh lịch, sành điệu.','Hương Hoa Cỏ - Floral','90ml',NULL,'Exclusive lưu giữ trọn vẹn hương thơm của một khu vườn Luân Đôn sau cơn mưa. Tầng hương đầu là hoa đậu ngọt và cam belgamot hòa quyện với hoa phong lữ trắng, quả mộc qua chín mọng ánh vàng kim và hoa diên vỹ fressia ngào ngạt, trên nền hương cuối của đất, gỗ ẩm ướt sau cơn mưa từ lá hoắc hương và hai loại hoa hồng trắng: damask tươi mát và centifolia dịu ngọt như mật ong. Exclusive sẽ là sự lựa chọn hoàn hảo cho bất cứ dịp nào và bất cứ nơi đâu bạn đi đến, bạn sẽ luôn nổi bật và thu hút. '),
		('Dunhill',300000,'2017-12-20',0,2,95,'Dunhill','Pháp','Nữ tính, gợi cảm, quyến rũ','Hương hoa hồng','90ml',NULL,'Dunhill là chai nước hoa thuộc nhóm hương thơm biển tươi mát, mang hình tượng của viên đá đen kết hợp cùng ngọn sóng biển, tạo sự lan tỏa mạnh mẽ. Dựa theo hình tượng đó, chai được thiết kế chắc chắn, mạnh mẽ, phủ lên lớp sơn màu đen cứng cáp, bao phủ bên trong là dung dịch nước hoa ai vô cùng tuyệt vời.'),
		('Polo Blue',1789000,'2018-1-28',0,3,32,'Burberry','Pháp','Sành điệu','Hương Quả quýt hồng','90ml',NULL,'Mở đầu với một mùi hương nhẹ nhàng và tươi mát với các nốt hương quýt, cam bergamot, vải và đào, tiếp đến là các nốt hoa lài, hoa linh lan và hoa loa kèn trắng kết hợp hài hòa với một ít mùi quả mận tạo nên một cảm giác dịu dàng và thư thả, cuối cùng là các nốt hương chính dạng bột gỗ như rễ cỏ hương bài, hổ phách, xạ hương và vani. Burberry sử dụng mùi hương đào và vải nhân tạo, với mùi vani giữ vai trò chủ đạo xuyên suốt, và khi kết hợp với mùi hương của các loại hoa quả đem lại một cảm giác ngọt ngào, sau đó nó lại trở nên sang trọng và chững chạc khi các mùi này phai dần. '),
		('D&G The One',1280000,'2018-1-3',0,1,105,'Paco Rabanne','Tây Ban Nha','Lịch lãm, trẻ trung, năng động.','Hương gỗ biển - Woody Aquatic','90ml',NULL,'Hương thơm phù hợp cho những người đàn ông mạnh mẽ, bản lĩnh và năng động. Luôn phấn đấu và chinh phục những mục tiêu mình nhắm đến. Những nốt hương cuối từ gỗ guaiac sẽ mơn man làn da như tôn thêm vẻ "đàn ông" và sự lịch lãm của cánh mày râu.'),
		('L Eau Bleue',1920000,'2018-12-20',0,1,100,'Giorgio Armani','Ý','Nam tính, lịch lãm, mát mẻ.','Hương gỗ đàn','90ml',NULL,'Mở đầu L Eau Bleue là hương thơm ngọt ngào của cam bergamot và hương tươi mát của nước biển. Tầng hương giữa là sự kết hợp giữa hương thơm ngát của hoa phong lữ, cây hương thảo và một chút hương đặc trưng của cây xô thơm. Cuối cùng lưu lại trên da là hương thơm của cây hoắc hương và một chút hương cay nồng của nhang.'),
		('Bleu Astral',722000,'2018-1-18',0,3,50,'Lancôme','Pháp','Cá tính, hấp dẫn','Hương hoa cỏ trái cây','90ml',NULL,'Hương đầu là sự hòa quyện tuyệt diệu của hương vani ngọt ngào mềm mại hòa huyện với hương thơm dào dạt của những đóa hoa lộng lẫy và rực rỡ mang đến cảm giác đầy khiêu gợi, mịn màng và bồng bềnh. Tại tầng hương giữa mùi hương không có sự thay đổi lớn, mà điểm xuyến hương cỏ hương bài thoang thoảng nhẹ bắt đầu xuất hiện, thêm vào nước hoa một chút cá tính, thoạt ngửi hương thơm này có chút gì đó giống hương thơm của xà phòng nhưng rất nhẹ. '),
		('Hugo Iced',322000,'2018-8-20',0,1,120,'Ralph Lauren','Ý','Nam tính, gợi cảm, thu hút.','Hương thơm Dương xỉ - Aromatic Fougere','90ml',NULL,'Hugo Iced thể hiện sự mạnh mẽ nam tính thông qua sự kết hợp tinh tế của hương lá bạc hà tươi, vỏ chanh và táo xanh. Hương giữa gây nghiện bởi sự pha trộn của một số thành phần hương hoa phương Đông hấp dẫn như đậu tonka, hổ phách, hoa phong lữ , vani cùng với một chút thành phần hương đặc trưng của hương gỗ như gỗ tuyết tùng từ Atlas và Virginia. Trong khi ở lớp hương cuối hương hoa cỏ lau và rêu sồi làm tăng thêm sự quyến rũ, tinh tế và đam mê cho phái mạnh.'),
		('Eternity Now',428000,'2018-2-14',0,2,60,'Bvlgari','Ý','Huyền bí, thanh lịch, tinh tế','Hương cây hứng quế','90ml',NULL,'Mùi hương xanh mát, giòn giả và hơi chua ở tầng hương đầu, Eternity Now mang hương mềm mại và tràn đầy năng lượng của cây hướng nhựt quỳ mở đầu cho tầng hương. Nốt hương giữa mang đến cảm giác mềm mại của Iris kết hợp với Mimosa cộng thêm sự tương tác nhẹ nhàng với Violet và mật ong giúp cho mùi hương bừng sáng như một bó hoa quý giá. Cuối cùng mơn mang trên làn da là một mùi hương nhẹ nhàng, êm dịu và ấm áp được bao bọc và khuếch trương bởi sự mềm mại của gỗ đàn hương và cỏ Vetiver.'),
		('Versace',1622000,'2018-6-20',0,3,100,'Diesel','Ý','Mạnh mẽ, hấp dẫn.','Hương gỗ phương đông - Oriental Woody','90ml',NULL,'Mùi hương mở ra với mùi thơm nam tính và mạnh mẽ của da thuộc, rất gần gũi với hình ảnh của thương hiệu. Hương thơm của chanh, các mùi hương của sự tươi mới, cộng với hương hổ phách và gỗ cùng với tuyết tùng mang lại cảm giác khoan khoái cho người dùng. Hỗn hợp mùi hương mang đến sự hoà quyện hài hoà giữa các hương gỗ đông phương để lại ấn tượng khó phai. Sự tương phản giữa những hương thơm tươi mới của chanh và quýt cùng với hoa tím, tuyết tùng và cây rau mùi mang đến sự hoà hợp ấm áp của hổ phách cùng với các sắc hương của da thuộc và nhựa an tức hương tại tầng cuối của nước hoa.'),
		('Nautica Voyage',560000,'2018-9-20',0,1,29,'Nina Ricci','Thổ Nhĩ Kì','Phóng khoáng, nam tính, sâu lắng','Hương Thơm biển - Aromatic Aquatic','90ml',NULL,'Nước hoa Nautica Voyage là một mẫu nước hoa thuộc nhóm hương thơm biển, được ra mắt vào năm 2005 mang đến cảm giác tràn đầy hứng khởi và tươi mát. Hương thơm tinh khiết của quýt và tinh dầu lá chanh hòa quyện với hương hổ phách khơi dậy hương thơm trong lành tươi mới mang hơi thở cùa vùng Địa Trung Hải thanh lịch, thích hợp cho các quý ông có tinh thần mạnh mẽ, phóng khoáng và ưa thích sự mới mẻ.'),
		('Invictus Aqua',632000,'2018-5-20',0,2,58,'Chanel','Pháp','Sang trọng, quý phái, thanh tao','Hương hoa hồng','90ml',NULL,'Mở ra trong hơi thở anh đào chua bỏng rát càng được khuếch trương bởi hương trái cây mọng đỏ, sự pha trộn khéo léo giữa hương thơm hạnh nhân tinh tế và tinh chất quả mọng ngon ngọt càng tạo nên hiệu ứng lan tỏa mạnh mẽ. Hương giữa ẩn hiện chớp nhoáng như nháy mắt khi hoa hồng lộng lẫy lướt nhẹ trên ánh đèn sân khấu trên nền vũ khúc cay nồng cháy bỏng của hồi và cam thảo rồi nhường chỗ cho giây phút trầm tĩnh lắng đọng của chất vani ngọt ngào và đậu tonka mềm mại. Trong lớp hương cuối cùng, những cám dỗ trong bóng đen mê hoặc của khói trà chưa bao giờ gợi cảm và quyến rũ khó cưỡng đến thế. '),
		('CK Free',778000,'2018-4-20',0,2,73,'Lacoste','Pháp','Nữ tính, hấp dẫn, lôi cuốn','Hương hoa hồng','90ml',NULL,'Mùi hương được sáng tạo bởi nhà chế tác tài ba Fabrice Pellgrin làm cho hương thơm của Luna Blossom thật ngọt ngào đầy tinh tế. Mở đầu tông mùi hương đầu tiên là sự sảng khoái, tươi mới sẽ ngập tràn trong tâm trí của bạn nhờ sự kết hợp của cam Bergamot và quả lê chín mọng. Tiếp đến, mùi hương sẽ dẫn dắt người sử dụng đến với khu vườn hoa nhẹ nhàng e ấp của hương thơm ngát từ khu vườn thiên nhiên được hòa quyện từ những hương hoa trắng của nhài, mẫu đơn và mộc lan. Nốt hương cuối sẽ mơn man trên làn da của bạn làm nên một mùi hương vương vấn, quyến luyến của xạ hương và gỗ tuyết tùng.');

CREATE TABLE image(
	id_img INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    image_link VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    pro_id INT(11),
    FOREIGN KEY (pro_id) REFERENCES products(id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO image(image_link, pro_id)
	VALUES
		('./Hinhanh/nuoc_hoa1.jpg',1),
        ('./Hinhanh/nuoc_hoa2.jpg',2),
        ('./Hinhanh/nuoc_hoa3.jpg',6),
        ('./Hinhanh/nuoc_hoa4.jpg',7),
        ('./Hinhanh/nuoc_hoa5.jpg',8),
        ('./Hinhanh/nuoc_hoa7.jpg',4),
        ('./Hinhanh/nuoc_hoa42.jpg',13),
        ('./Hinhanh/nuoc_hoa44.jpg',24),
        ('./Hinhanh/nuoc_hoa41.jpg',14),
        ('./Hinhanh/nuoc_hoa24.jpg',15),
        ('./Hinhanh/nuoc_hoa31.jpg',16),
        ('./Hinhanh/nuoc_hoa13.jpg',20),
        ('./Hinhanh/nuoc_hoa43.jpg',17),
        ('./Hinhanh/nuoc_hoa15.jpg',21),
        ('./Hinhanh/nuoc_hoa16.jpg',22),
        ('./Hinhanh/nuoc_hoa17.jpg',23),
        ('./Hinhanh/nuoc_hoa21.jpg',18),
        ('./Hinhanh/nuoc_hoa25.jpg',19),
        ('./Hinhanh/nuoc_hoa20.jpg',9),
        ('./Hinhanh/nuoc_hoa33.jpg',12),
        ('./Hinhanh/nuoc_hoa32.jpg',11),
        ('./Hinhanh/nuoc_hoa39.jpg',3),
        ('./Hinhanh/nuoc_hoa40.jpg',5),
        ('./Hinhanh/nuoc_hoa45.jpg',10);
        
        
CREATE TABLE users(
	id INT(11) NOT NULL AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
	last_name varchar(100) NOT NULL,
    email VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    phone INT(11),
    address VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    address_Detail VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    passwords VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE orders(
	id_Order INT(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) NOT NULL,
    product_id int(11) NOT NULL,
    qty int(11) NOT NULL,
    trx_id varchar(255) NOT NULL,
	p_status varchar(20) NOT NULL DEFAULT '0',
	date_Order DATE,
    PRIMARY KEY  (id_Order),
    FOREIGN KEY (product_id) REFERENCES products(id)
);



CREATE TABLE contact(
	id INT(11) NOT NULL AUTO_INCREMENT,
    name_cus VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    mail VARCHAR(225) collate utf8_unicode_ci NOT NULL,
    content TEXT collate utf8_unicode_ci NOT NULL,
    pro_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (pro_id) REFERENCES products(id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;



CREATE TABLE cart (
  id_cart int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  p_id int(10) NOT NULL,
  ip_add varchar(250) NOT NULL,
  user_id int(10) DEFAULT NULL,
  qty int(10) NOT NULL,
  FOREIGN KEY (p_id) REFERENCES products (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

