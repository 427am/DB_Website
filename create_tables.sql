CREATE TABLE Property (
    address     VARCHAR(50)     NOT NULL,
    ownerName   VARCHAR(30)     NOT NULL, 
    price       INTEGER         NOT NULL,
    PRIMARY KEY (address)
);

CREATE TABLE House (
    bedrooms    INTEGER         NOT NULL,
    bathrooms   INTEGER         NOT NULL,
    size        INTEGER         NOT NULL,
    address     VARCHAR(50)     NOT NULL,
    PRIMARY KEY (address),
    FOREIGN KEY (address) REFERENCES Property(address)
);

CREATE TABLE BusinessProperty ( 
    type        CHAR(20)        NOT NULL,
    size        INTEGER         NOT NULL,
    address     VARCHAR(50)     NOT NULL,
    PRIMARY KEY (address),
    FOREIGN KEY (address) REFERENCES Property(address)
);

CREATE TABLE Firm (
    id      INTEGER     NOT NULL,
    name    VARCHAR(30) NOT NULL,
    address VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Agent (
    agentId     INTEGER     NOT NULL,
    name        VARCHAR(30) NOT NULL,
    phone       CHAR(12)    NOT NULL,
    firmId      INTEGER     NOT NULL,
    dateStarted DATE        NOT NULL,
    PRIMARY KEY (agentId),
    FOREGIN KEY (firmId) REFERENCES Firm(id)
);

CREATE TABLE Listing (
    mlsNumber   INTEGER     NOT NULL,
    address     VARCHAR(50) NOT NULL,
    agentId     INTEGER     NOT NULL,
    dateListed  DATE        NOT NULL,
    PRIMARY KEY (mlsNumber),
    FOREIGN KEY (address) REFERENCES Property(address),
    FOREIGN KEY (agentId) REFERENCES Agent(agentId)
);

CREATE TABLE Buyer (
    id                      INTEGER         NOT NULL,
    name                    VARCHAR(30)     NOT NULL,
    phone                   CHAR(12)        NOT NULL,
    propertyType            CHAR(20)        NOT NULL,
    bedrooms                INTEGER,
    bathrooms               INTEGER,
    businessPropertyType    CHAR(20),
    minimumPreferredPrice   INTEGER         NOT NULL,
    maximumPreferredPrice   INTEGER         NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Works_With (
    buyerId     INTEGER     NOT NULL,
    agentId     INTEGER     NOT NULL,
    PRIMARY KEY (buyerId, agentId),
    FOREIGN KEY (buyerId) REFERENCES Buyer(id),
    FOREIGN KEY (agentId) REFERENCES Agent(agentId)
);



