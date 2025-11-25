INSERT INTO Property (address, ownerName, price) VALUES
('123 A Street', 'John Doe', 100000),
('456 B Street', 'Jane Smtih', 200000),
('789 C Street', 'Carl White', 300000),
('321 D Street', 'Mary Brown', 400000),
('654 E Street', 'Emily Jones', 500000),
('987 F Road', 'Larry James', 600000),
('100 G Road', 'Paul Green', 700000),
('200 H Road', 'Walter Moose', 800000)
('300 I Road', 'Mickey Mouse', 900000),
('400 J Road', 'Donald Duck', 1000000);

INSERT INTO House (bedrooms, bathrooms, size, address) VALUES
(1, 1, 1000, '123 A Street'),
(2, 1, 1500, '456 B Street'),
(2, 2, 1700, '789 C Street'),
(3, 2, 1950, '321 D Street'),
(5, 2, 2200, '654 E Street');

INSERT INTO BusinessProperty (type, size, address) VALUES
('Gas Station', 3000, '987 F Road'),
('Office', 4000, '100 G Road'),
('Pharmacy', 5000, '200 H Road'),
('Clubhouse', 6000, '300 I Road'),
('Gym', 7000, '400 J Road');

INSERT INTO Firm (id, name, address) VALUES
(1, 'A Realty', '1 Firm Road'),
(2, 'B Realty', '2 Firm Road'),
(3, 'C Realty', '3 Firm Road'),
(4, 'D Realty', '4 Firm Road'),
(5, 'E Realty', '5 Firm Road');

INSERT INTO Agent (agentId, name, phone, firmId, dateStarted) VALUES
(1, 'Alice Agent', 1, '1999-01-02'),
(2, 'Benny Agent', 2, '2010-02-20'),
(3, 'Clark Agent', 3, '2019-04-13'),
(4, 'Doris Agent', 4, '2020-07-19'),
(5, 'Emma Agent', 5, '2022-07-09');

INSERT INTO Buyer (id, name, phone, propertyType, bedrooms, bathrooms, businessPropertyType, minimumPreferredPrice, maximumPreferredPrice) VALUES
(1, 'Alex Buyer', '850-123-4566', 'house', 3, 2, NULL, 100000, 200000),
(2, 'Barb Buyer', '850-396-9246', 'business', NULL, 2, 'gym', 300000, 8000000),
(3, 'Cate Buyer', '850-937-0295', 'house', 4, 5, NULL, 100000, 4000000),
(4, 'Dennis Buyer', '850-038-8543', 'house', NULL, NULL, NULL, 200000, 350000),
(5, 'Earl Buyer', '850-944-4493', 'business', NULL, 2, 'office', 150000, 5000000);

INSERT INTO Listing (mlsNumber, address, agentId, dateListed) VALUES
(1000, '123 A Street', 1, '2025-01-02'),
(1001, '456 B Street', 2, '2025-03-05'),
(1002, '789 C Street', 3, '2025-04-20'),
(1003, '321 D Street', 4, '2025-05-04'),
(1004, '654 E Street', 5, '2025-06-03'),
(1005, '987 F Road', 2, '2025-07-14'),
(1006, '100 G Road', 2, '2025-08-19'),
(1007, '200 H Road', 4, '2025-09-13'),
(1008, '300 I Road', 5, '2025-10-24'),
(1009, '400 J Road', 1, '2025-11-20');

INSERT INTO Works_With (buyerIdm agentId) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 5);
