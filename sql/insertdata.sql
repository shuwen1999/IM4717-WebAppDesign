use f32ee;

insert into product_menu values
	(1, "Chicken Chop", "main", 5),
	(2, "Fish and Chips","main", 6),
	(3, "Rib Eye Steak","main", 10),
	(4, "Pork Ribs","main", 8),
	(5, "Carbonara","main", 5),
    (6, "Fries","sides", 2),
    (7, "Onion Rings","sides", 2.5),
    (8, "Salad","sides", 4),
    (9, "Chicken Wing","sides", 3),
    (10, "Cream of Mushroom","side", 3),
    (11, "Coke","drinks", 1),
    (12, "Coffee","drinks", 1),
    (13, "Tea","drinks", 1),
    (14, "Tiramisu","dessert", 2.5),
    (15, "Cheesecake","dessert", 2.5),
    (16, "Ice Cream","dessert", 2),
    (17, "Chicken Chop + Ice Cream","promo", 6),
    (18, "Fish and Chips + Cheesecake","promo", 8),
    (19, "Carbonara + Soup","promo", 7);
    


insert into product_order values
	(1, 3, 2, 20),
	(2, 7, 1, 2.5),
	(3, 1, 4, 20),
	(4, 15, 1, 2.5),
	(5, 19, 3, 21),
	(6, 17, 5, 30),
	(7, 3, 1, 10);

insert into cust_details values
    (1, "Mary", 98765432, "Hougang Blk 333 #01-02", 530333, "mary@gmail.com", 98765432, "Hougang Blk 333 #01-02", 530333, 3),
    (2, "Tom", 97532468, "Ang Mo Kio Blk 3 #02-01", 546003, "tom2@gmail.com", 97532468, "Ang Mo Kio Blk 3 #02-01", 546003, 5),
    (3, "Jane", 91929394, "Jurong Blk 78 #10-29", 345078, "janejane@gmail.com", 91929394, "Jurong Blk 78 #10-29", 345078, 6),
    (4, "John", 85769403, "Tampines Blk 154 #10-30", 528154, "johnnyenglish@gmail.com", 85769403, "Tampines Blk 154 #10-30", 528154, 1);

insert into payment values
    (1, 1, "Mary", 5433345567899876, 0523, 123),
    (2, 2, "Tom", 58674930281723857, 1222, 873),
    (3, 3, "Jane", 2938475039494928, 1025, 952),
    (4, 4, "John", 5433345567899876, 0523, 123);
    
insert into product_image values{
    (1, 1, "chickenchop", "C:\Users\hatsu\Documents\GitHub\IM4717-WebAppDesign\assets");
}