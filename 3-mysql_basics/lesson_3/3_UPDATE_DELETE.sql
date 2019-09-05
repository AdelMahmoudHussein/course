########################### Updating Data ###############################
# The basic format of an UPDATE statement is made up of three parts:
# 1- The table to be updated
# 2- The column names and their new values
# 3- The filter condition that determines which rows should be updated

UPDATE customers
SET cust_email = 'elmer@fudd.com'
WHERE cust_id = 10005;

########################### Deleting Data ###############################
#Caution
# Dont Omit the WHERE Clause , because it is all too easy to mistakenly delete every row from your table

DELETE FROM customers
WHERE cust_id = 10006;