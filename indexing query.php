

-- to check double index 
SELECT COUNT(column_name),table_name,index_name,column_name
FROM information_schema.STATISTICS
WHERE table_schema='punctual_embassy_oxygen_towerB'
AND table_name='pun_work_order'
GROUP BY column_name;

-- to check number of tables in db
SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA ='punctual_embassy_hcl_sterlingtech' 51


-- to check record key not autoincrement
SELECT * FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA ='punctual_cbre_exl_c44'
-- TABLE_NAME = '".$tablename."'
AND COLUMN_NAME IN('Record_Key')
AND DATA_TYPE = 'int'
AND EXTRA NOT LIKE '%auto_increment%'






-- query to check complete indexing of table in db
SELECT TABLE_NAME,COLUMN_NAME,
COUNT(1) index_count,GROUP_CONCAT(DISTINCT(index_name) SEPARATOR ',\n ') INDEXES
FROM INFORMATION_SCHEMA.STATISTICS
WHERE TABLE_SCHEMA = 'punctual_embassy_hcl_sterlingtech'
GROUP BY TABLE_NAME
ORDER BY COUNT(1)


-- this query is to check whether in whch table primary key is not present
    SELECT tab.table_schema,tab.table_name
	FROM information_schema.tables tab
	LEFT JOIN information_schema.table_constraints tco
	ON  tab.table_schema = tco.table_schema
	AND tab.table_name = tco.table_name  
	AND tco.constraint_type = 'PRIMARY KEY'
	WHERE tco.constraint_type IS NULL
	AND tab.table_schema = '".$db_name."'
	ORDER BY tab.table_schema,tab.table_name

	TO CHANGE ENGINE

SELECT CONCAT('ALTER TABLE`',TABLE_SCHEMA,'`.`',TABLE_NAME,'ENGINE=InnoDB;')
FROM INFORMATION_SCHEMA.TABLES 
WHERE ENGINE <>'InnoDB' AND TABLE_SCHEMA LIKE 'punctual_%'
AND TABLE_TYPE='BASE TABLE'

SELECT Auto_Id,COUNT(Auto_Id) from table_name
group by Auto_Id
having COUNT(Auto_Id)>1



SHOW FULL FIELDS FROM `punctual_csmia_zone9`.`ker_address`;

SHOW KEYS FROM `punctual_csmia_zone9`.`ker_address`; 

SHOW INDEX FROM `punctual_csmia_zone9`.`ker_address`; 

ALTER TABLE `punctual_csmia_zone9`.`ker_address` DROP INDEX `Record_Status`, ADD KEY `Record_Status` (`Record_Status`);