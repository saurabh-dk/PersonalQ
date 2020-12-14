/****************************************************
 * G6_PHASE3_DropTables.sql - SQL script to drop 
 *                   the tables as shown in 
 *                   the relational schema diagram.
 * Group 6 , CINS370-06
 * Authors: Feras A, Saurabh K, and Luis O.
  * Last modified: 12/11/2020
 ***************************************************/

/****************************************************
 * Check for all tables in database
 ***************************************************/
/* Use the following statement to generate a table with the needed statements to drop 
   all tables in selected database. Change falshehri to your database first.
   Source: https://mariadb.com/kb/en/drop-table/#dropping-all-tables-in-a-database */

-- /* Change this local variable value to the name of your database first.*/
-- SET @dbName ='falshehri';

-- SELECT CONCAT('DROP TABLE IF EXISTS `', TABLE_SCHEMA, '`.`', TABLE_NAME, '`;')
-- FROM information_schema.TABLES 
-- WHERE TABLE_SCHEMA = @dbName;

/****************************************************
 * Drop tables in database
 ***************************************************/

/* Disable referential integrity checks */
SET FOREIGN_KEY_CHECKS = 0;

/* For the purposes of clearing the tables in this project as defined in phase 2, 
   change falshehri to your database name first, then execute the following statements.*/

DROP TABLE IF EXISTS `falshehri`.`Cases`;
DROP TABLE IF EXISTS `falshehri`.`County`;
DROP TABLE IF EXISTS `falshehri`.`Exposure`;
DROP TABLE IF EXISTS `falshehri`.`Hospital`;
DROP TABLE IF EXISTS `falshehri`.`Metrics`;
DROP TABLE IF EXISTS `falshehri`.`Person`;
DROP TABLE IF EXISTS `falshehri`.`Shows`;
DROP TABLE IF EXISTS `falshehri`.`Symptoms`;
DROP TABLE IF EXISTS `falshehri`.`Vitals`;

/* Enable referential integrity checks */
SET FOREIGN_KEY_CHECKS = 1;