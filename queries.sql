SELECT p.address
FROM Property p
JOIN House h ON h.address = p.address 
JOIN Listing l ON l.address = p.address;

SELECT p.address, l.mlsNumber
FROM Property p 
JOIN House h ON h.address = p.address
JOIN Listing l ON l.address = p.address;

SELECT p.address
FROM Property p
JOIN House h ON h.address = p.address 
JOIN Listing l ON l.address = p.address
WHERE h.bedrooms = 3 AND h.bathrooms = 2;

SELECT p.address
FROM Property p
JOIN House h ON h.address = p.address 
JOIN Listing l ON l.address = p.address
WHERE h.bedrooms = 3
    AND h.bathrooms = 2
    AND p.price BETWEEN 100000 AND 400000
ORDER BY p.price DESC;

SELECT p.address
FROM Property p
JOIN BusinessProperty b ON b.address = p.address
JOIN Listing l ON l.address = p.address
WHERE b.type = 'Office'
ORDER BY p.price DESC;

SELECT a.agentId, a.name, a.phone, a.dateStarted, f.name AS firmName
FROM Agent A
JOIN Firm f ON a.firmId = f.id;

SELECT p.*
FROM Property p 
JOIN Listing l ON l.address = p.address
WHERE l.agentId = 1;

SELECT a.name AS agentName, b.name AS buyerName
FROM Works_With w
JOIN Agent a ON w.agentId = a.agentId
JOIN Buyer b ON w.buyerId = b.id
ORDER BY a.name, b.name;


SELECT a.agentId, a.name, COUNT(w.buyerId) AS buyers
FROM Agent a 
JOIN Works_With w ON a.agentId = w.agentId
GROUP BY a.agentId, a.name;



SELECT p.address, p.price
FROM Buyer b 
JOIN House h ON h.bedrooms = b.bedrooms AND h.bathrooms = b.bathrooms
JOIN Property p ON p.address = h.address
JOIN Listing l ON l.address = p.address
WHERE b.id = 1
    AND b.propertyType = 'house'
    AND p.price BETWEEN b.minimumPreferredPrice AND b.maximumPreferredPrice
ORDER BY p.price DESC;
