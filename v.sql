/****************************************************
 * G6_PHASE3_DML.sql - SQL script to Insert test data 
 *                   into the tables as shown in 
 *                   the relational schema diagram,
 *                   The purpose is to simulates the 
 *                   functionality of the database.
 *
 * Group 6 , CINS370-06
 * Authors: Feras A, Saurabh K, Luis O.
 * Last modified: 12/2/2020
 ***************************************************/

/****************************************************
 * Populate tables
 ***************************************************/
/* first, we always need to check that this table is populated.
   If it's not, we need to populate it via an API call within 
   the PHP code. Here's a sample, actual list is much longer
   to cover all counties in the US. */
INSERT INTO County (fips, state, county_name)
VALUES 
(11111, "Utah", "Sandy"),
(11222, "Colorado", "paso"),
(12121, "Virginia", "Richmond"),
(12141, "Virginia", "Fairfax"),
(12222, "Colorado", "Larimer"),
(22222, "Montana", "carbon"),
(33322, "Arizona", "Tucson"),
(33333, "Kansas", "wichita"),
(33366, "Utah", "Provo"),
(33555, "Arizona", "Phoenix"),
(44333, "New Mexico", "Torrance"),
(44441, "New Mexico", "Cibola"),
(53333, "Nevada", "Reeno"),
(55441, "Texas", "Dallas"),
(55551, "Texas", "Tarrant"),
(77777, "Alaska", "yakutat"),
(83333, "California", "Napa"),
(87878, "California", "orange"),
(88888, "California", "riverside"),
(99999, "Wyoming", "noMansLand");

/* simulate populating users profiles */
INSERT INTO Person (username, password, name, sex, zip_code, county_fips)
VALUES
("aar", "fd", "andrea", "F", 73882, 12141),
("aav", "yy", "Shelby", "F", 77445, 44441),
("aax", "ap", "clark", "M", 1225, 88888),
("axx", "ii", "Seu", "M", 73245, 53333),
("eex", "fi", "elon", "M", 89995, 55551),
("elk", "kk", "steve", "M", 99995, 83333),
("llx", "ei", "om/ar", "M", 88895, 55441),
("ma", "mm", "rose", "F", 99995, 87878),
("ssr", "fs", "jose", "M", 79992, 12222),
("trr", "xl", "Hugo", "M", 89995, 12121),
("wwe", "eg", "vince", "M", 83333, 33322),
("wwr", "gg", "Boi", "M", 88892, 22222),
("www", "rk", "micheale", "M", 22223, 33366),
("xav", "qq", "king", "M", 22222, 44333),
("xcv", "gk", "mice", "M", 22211, 33555),
("xtx", "fp", "Dawn", "F", 11115, 33333),
("xxx", "wp", "Vu", "M", 55555, 22222),
("xyz", "pw", "zack", "M", 77777, 99999),
("xzx", "op", "Misa", "F", 11225, 77777),
("yrr", "rw", "maria", "F", 73322, 11222),
("ysr", "rr", "ana", "F", 73332, 12121),
("yyy", "aw", "lucas", "M", 72222, 11111);

/* simulate populating a Person's measured metrics and vitals */
INSERT INTO Metrics (weight, height, metrics_id, age, username)
VALUES
(150, 142, 1, 19, "xyz"),
(130, 143, 3, 25, "aax"),
(150, 143, 4, 20, "xtx"),
(130, 145, 5, 25, "xxx"),
(140, 140, 6, 25, "xzx"),
(130, 145, 7, 30, "aar"),
(120, 145, 8, 20, "aav"),
(130, 144, 9, 21, "aax"),
(160, 144, 10, 22, "axx"),
(165, 147, 11, 22, "eex"),
(200, 144, 12, 25, "elk"),
(230, 143, 13, 28, "llx"),
(130, 143, 14, 28, "ma"),
(205, 146, 15, 30, "ssr"),
(105, 146, 16, 32, "wwe"),
(135, 146, 17, 30, "wwr"),
(145, 146, 18, 30, "www"),
(225, 145, 19, 33, "xav"),
(125, 145, 20, 20, "xcv"),
(125, 145, 21, 25, "yrr"),
(205, 145, 22, 24, "ysr"),
(105, 145, 23, 24, "yyy"),
(130, 145, 24, 25, "trr");


/* This DML insertion statement would take place in the php code, or manually by admin.
   This is just a sample of an external dataset regarding to show this. */
INSERT INTO Hospital (center_id, name, capacity, zip_code, county_fips)
VALUES
(1,  "Phoenix VA Health Care System (AKA Carl T Hayden VA Medical Center)", 129, 85012, 11111),
(2,  "Southern Arizona VA Health Care System", 295, 85723, 11111),
(3,  "VA Central California Health Care System", 57, 93703, 11111),
(4,  "VA Connecticut Healthcare System - West Haven Campus (AKA West Haven VA Medical Center)", 216, 6516, 11111),
(5,  "Wilmington VA Medical Center", 60, 19805, 11111),
(6,  "Washington DC VA Medical Center", 164, 20422, 11111),
(7,  "North Florida/South Georgia Veterans Health System - Malcom Randall VA Medical Center", 432, 32608, 11111),
(8,  "Boise VA Medical Center", 46, 83702, 11111),
(9,  "Overton Brooks VA Medical Center", 111, 71101, 11111),
(10, "Merit Health River Oaks (FKA River Oaks Hospital - Jackson)", 160, 39232, 11111),
(11, "Harry S Truman Memorial Veterans Hospital", 126, 65201, 11111),
(12, "New Mexico VA Health Care System - Raymond G Murphy VA Medical Center", 184, 87108, 11111),
(13, "Albany Stratton VA Medical Center", 156, 12208, 11111),
(14, "James J Peters VA Medical Center", 311, 10468, 11111),
(15, "Fargo VA Health Care System", 37, 58102, 11111),
(16, "Roseburg VA Health Care System", 0, 97471, 11111),
(17, "VA Pittsburgh Healthcare System - University Drive", 146, 15219, 11111),
(18, "Prattville Baptist Hospital", 85, 36067, 11111),
(19, "Thomas Hospital", 150, 36532, 11111),
(20, "North Baldwin Infirmary", 58, 36507, 11111),
(21, "Medical Center Barbour", 74, 36027, 11111);

/* an example of an admin adding support for 3 new symptoms by the application. */
INSERT INTO Symptoms (name)
VALUES
("Dry throat"),
("Fever"),
("Cough");

/* insert dummy data into the cases table */
INSERT INTO cases(reading_id, cases_count, death_count, county_fips) 
VALUES
(415, 12000, 840, 87878),
(445, 220, 80, 83333),
(655, 3010, 110, 77777),
(192, 300, 20, 55551),
(197, 3000, 200, 55441),
(117, 57, 30, 53333),
(677, 507, 100, 44441),
(637, 127, 3, 44333),
(627, 177, 3, 33555),
(127, 110, 2, 33366),
(122, 1110, 1000, 33333),
(175, 1500, 300, 33322);

/* Add a vitals tuple for the given user. */
INSERT INTO Vitals (temperature, heartbeat_rate, oxygen_level, test_type, test_result, username) 
VALUES (99,140,90,"COVID-19","N", "xyz");