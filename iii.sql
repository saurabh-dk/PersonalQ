/****************************************************
 * G6_PHASE2_DDL.sql - DDL script to create 
 *                   the tables as shown in 
 *                   the relational schema diagram.
 * Group 6 , CINS370-06
 * Authors: Feras A, Saurabh K, Luis O.
 * Last modified: 12/2/2020
 ***************************************************/

/* Set default (current) database to appropriate database.
   Change falshehri to the database you want to create the tables in.*/
-- falshehri
/****************************************************
 * create tables
 ***************************************************/

CREATE TABLE County
(
  fips INT NOT NULL,
  state ENUM("Alabama", 
              "Alaska",
              "Arizona", 
              "Arkansas", 
              "California", 
              "Colorado", 
              "Connecticut",  
              "Delaware", 
              "District of Columbia", 
              "Florida", 
              "Georgia", 
              "Hawaii", 
              "Idaho", 
              "Illinois", 
              "Indiana", 
              "Iowa", 
              "Kansas", 
              "Kentucky", 
              "Louisiana", 
              "Maine", 
              "Maryland", 
              "Massachusetts",
              "Michigan", 
              "Minnesota", 
              "Mississippi", 
              "Missouri", 
              "Montana", 
              "Nebraska", 
              "Nevada", 
              "New Hampshire", 
              "New Jersey", 
              "New Mexico", 
              "New York", 
              "North Carolina", 
              "North Dakota", 
              "Northern Mariana Islands",
              "Ohio", 
              "Oklahoma", 
              "Oregon", 
              "Pennsylvania", 
              "Puerto Rico",
              "Rhode Island", 
              "South Carolina", 
              "South Dakota", 
              "Tennessee", 
              "Texas", 
              "Utah", 
              "Vermont", 
              "Virginia", 
              "Virgin Islands",
              "Washington", 
              "West Virginia", 
              "Wisconsin", 
              "Wyoming") NOT NULL,
  county_name VARCHAR(100) NOT NULL,
  PRIMARY KEY (fips)
);

CREATE TABLE Person
(
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  sex ENUM('F', 'M') NOT NULL,              -- restricted to Female or Male
  zip_code INT NOT NULL,
  county_fips INT NOT NULL,
  PRIMARY KEY (username),
  FOREIGN KEY (county_fips) REFERENCES County(fips)
);

CREATE TABLE Metrics
(
  weight FLOAT NOT NULL,                     -- in Kilograms
  height FLOAT NOT NULL,                     -- in Centimeters
  metrics_id INT NOT NULL AUTO_INCREMENT,    -- metrics_id
  age INT NOT NULL,                          -- in whole years
  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  username VARCHAR(100) NOT NULL,
  PRIMARY KEY (metrics_id),
  FOREIGN KEY (username) REFERENCES Person(username)
);

CREATE TABLE Vitals
(
  temperature FLOAT NOT NULL,             -- in celsius degrees
  heartbeat_rate INT,                     -- in beats per minutes
  oxygen_level INT,                       -- SpO2 level (percentage out of a 100)
  vitals_id INT NOT NULL AUTO_INCREMENT,
  test_type VARCHAR(30),                  -- medical test type
  test_result ENUM('P', 'N'),             -- medical test result, positive or negative
  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  username VARCHAR(100) NOT NULL,
  PRIMARY KEY (vitals_id),
  FOREIGN KEY (username) REFERENCES Person(username)
);

CREATE TABLE Hospital
(
  center_id INT NOT NULL,
  name VARCHAR(100) NOT NULL,
  capacity INT NOT NULL,
  zip_code INT NOT NULL,
  county_fips INT NOT NULL,
  PRIMARY KEY (center_id),
  FOREIGN KEY (county_fips) REFERENCES County(fips)
);

CREATE TABLE Exposure
(
  exposure_id INT NOT NULL AUTO_INCREMENT,
  location_zip INT NOT NULL,                 -- zip code of exposure location.
  time TIME,                                 -- optional, as it's only needed for a single use case.
  date DATE NOT NULL,                        -- left as a date datatype to allow the user to create 
                                             --     an entry that occured in the past or the future.
  username VARCHAR(100) NOT NULL,
  PRIMARY KEY (exposure_id),
  FOREIGN KEY (username) REFERENCES Person(username)
);

/* This table contains a list of symptoms names that are supported by
 * this application. This list is maintained by the database admin.*/
CREATE TABLE Symptoms
(
  symptom_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  PRIMARY KEY (symptom_id)
);

/* This table would link the symptoms a person shows at a given
   timestamp, and constrain the use of unsupported symptoms by user. */ 
CREATE TABLE Shows
(
  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  symptom_id INT NOT NULL,
  username VARCHAR(100) NOT NULL,
  PRIMARY KEY (timestamp),
  FOREIGN KEY (symptom_id) REFERENCES Symptoms(symptom_id),
  FOREIGN KEY (username) REFERENCES Person(username)
);

CREATE TABLE Cases
(
  reading_id INT NOT NULL AUTO_INCREMENT,
  cases_count INT NOT NULL,
  death_count INT,
  county_fips INT NOT NULL,
  PRIMARY KEY (reading_id),
  FOREIGN KEY (county_fips) REFERENCES County(fips)
);
