######################################### Filtering Data  ######################################
# When using both ORDER BY and WHERE clauses
# review Logical Operators

SELECT prod_name, prod_price
FROM products
WHERE prod_price = 2.50;

# Using the AND Operator
# AND instructs the DBMS to return only rows that meet all the conditions specified.
# If a product is made by vendor 1003 but it costs more than 10, it is not retrieved.
SELECT prod_id, prod_price, prod_name
FROM products
WHERE vend_id = 1003 AND prod_price <= 10;

# Using the OR Operator
# The OR operator is exactly the opposite of AND.
# The OR operator instructs MySQL to retrieve rows that match either condition.
SELECT prod_name, prod_price
FROM products
WHERE vend_id = 1002 OR vend_id = 1003;

# Understanding Order of Evaluation (operator precedence )
# Two of the rows returned have prices less than 10
# SQL (like most languages) processes AND operators before OR operators
SELECT prod_name, prod_price
FROM products
WHERE vend_id = 1002 OR vend_id = 1003 AND prod_price >= 10;

# Using the IN Operator
SELECT prod_name, prod_price
FROM products
WHERE vend_id IN (1002,1003)
ORDER BY prod_name;
