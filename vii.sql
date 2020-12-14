/****************************************************
 * G6_PHASE3_DML_Queries.sql - SQL script to display test data 
 *                   of the tables, the purpose is to simulates the 
 *                   functionality of the database.
 *
 * Group 6 , CINS370-06
 * Authors: Feras A, Saurabh K, Luis O.
 * Last modified: 12/2/2020
 ***************************************************/

/* Display all columns of all tables. */
SELECT * FROM person;
SELECT * FROM metrics;
SELECT * FROM vitals;
SELECT * FROM hospital;
SELECT * FROM exposure;
SELECT * FROM symptoms;
SELECT * FROM shows;
SELECT * FROM cases;
SELECT * FROM county;

/* Display the average age of users in a given zipcode. */
SET @zipcode = 89995;

SELECT p.zip_code, AVG(m.age)
FROM person AS p, metrics AS m
WHERE m.username = p.username
GROUP BY p.zip_code
HAVING p.zip_code=@zipcode;


/* Display metrics of a user for a given time range */
SET @username = "xyz";
SET @fromDateTime = '2020-12-10';
SET @toDateTime = '2020-12-14';

SELECT *
FROM metrics AS m
WHERE m.username=@username
AND m.timestamp BETWEEN @fromDateTime AND @toDateTime;


/* Get county name and county fips ID to populate the dropdown */
SELECT county_name, fips FROM County;


/* Check if the user entered username is already registered. */
SELECT username FROM Person where username="username";


/* Login the user using given credentials */
SELECT * FROM Person where username="username" AND binary password="password";


/* Show Vitals history for the given user. */
SELECT * FROM Vitals where username="username" ORDER BY timestamp DESC;


/* Get all symptoms to populate the dropdown */
SELECT * FROM Symptoms;