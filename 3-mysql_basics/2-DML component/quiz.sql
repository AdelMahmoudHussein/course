# get the last 5 rows in customers table
SELECT * FROM customers ORDER BY cust_id DESC LIMIT 5; -- 17,16,15,14,13
-- How to get these rows with the right order 13,14,15,16,17


# get rows between 10 and 12 in customers table
SELECT * FROM customers LIMIT 10,2;

# get rows between cust_id 2 and 12  in customers table
SELECT * FROM customers WHERE cust_id > 2 AND cust_id < 12;

# get cust_state and cust_zip columns only  in customers table
SELECT cust_state, cust_zip FROM customers;

# get the unique records from cust_city in customers table
SELECT DISTINCT cust_city FROM customers;

# get all rows if quantity under 5 in order_items table and order them from big number to low number
SELECT * FROM order_items WHERE quantity < 5 ORDER BY quantity DESC;

# get all rows if product_notes.note_text COLUMN   has the "and" character
SELECT * FROM product_notes WHERE note_text LIKE '%and%';

# get all rows if orders.order_num COLUMN has not values "20005" or "20009"
SELECT * FROM orders where order_num NOT IN (20005,20009);

# get all rows from orders  where order_date greater than 2005-09-12 and order_num more than 20006
SELECT * FROM orders WHERE order_date > 2005-09-12 AND order_num > 20006;

# get all rows from order_items  where prod_id has "N" character
SELECT * FROM order_items WHERE prod_id LIKE '%N%';

# get all rows for these related columns (order_num,quantity,item_price,product name,customer name)

-- My First Solution
SELECT  orders.order_num, 
        order_items.quantity, 
        order_items.item_price, 
        products.prod_name, 
        customers.cust_name 
FROM orders 
INNER JOIN order_items ON orders.order_num = order_items.order_num
INNER JOIN customers ON orders.cust_id = customers.cust_id
INNER JOIN products ON order_items.prod_id = products.prod_id;


-- Second Solution From Eng. Ahmed Fakhr
SELECT  orders.order_num,
        oit.quantity, 
        oit.item_price,
        products.prod_name, 
        customers.cust_name
    FROM orders
    INNER JOIN order_items oit ON orders.order_num = oit.order_num
    INNER JOIN products ON oit.prod_id = products.prod_id
    INNER JOIN customers ON orders.cust_id = customers.cust_id  ;


-- My Second Solution
SELECT  orders.order_num, 
        order_items.quantity, 
        order_items.item_price, 
        products.prod_name, 
        customers.cust_name 
FROM orders 
INNER JOIN (order_items,customers,products) 
ON      orders.order_num = order_items.order_num AND
        orders.cust_id = customers.cust_id AND
        order_items.prod_id = products.prod_id;
 
# get all rows for these related columns (prod_price,prod_name,note_date,note_text) from products and product_notes
SELECT  products.prod_price, 
        products.prod_name, 
        product_notes.note_date, 
        product_notes.note_text
FROM products
INNER JOIN product_notes 
ON products.prod_id = product_notes.prod_id;

# get all  rows from products even if no notes in  product_notes
SELECT * FROM products;         -- it is tricky or miss typed

# get all  rows from product_notes even if no notes in  products
SELECT * FROM product_notes;    -- it is tricky or miss typed

# try to insert dummy data products and customers
INSERT INTO products (prod_id, vend_id, prod_name, prod_price, prod_desc) 
VALUES ('APP01', '1003', 'apple', '16.76', 'it is a nice fruit');

INSERT INTO customers(cust_name,cust_address, cust_city,cust_state,cust_zip,cust_country) 
VALUES ('Ali said', 'Egypt', 'cairo', NULL, '35476', 'EGYPT');

# try to update vendors on vend_country is USA ,put 5555 in vend_zip
UPDATE vendors 
SET vend_zip = '5555' 
WHERE vend_country = 'USA';

# try to delete only the last 2 notes from product_notes table
DELETE FROM product_notes
ORDER BY note_id DESC LIMIT 2;

# how to get the maximum and minimum price for products table GOOLE IT ?
-- MY Answer without searching
-- Maximum & Minimum but get only one result even there is two or more with the same value 
SELECT * FROM products ORDER BY prod_price DESC LIMIT 1; -- Maximum
SELECT * FROM products ORDER BY prod_price ASC LIMIT 1;  -- Minimum

-- AFTER SEARCHING https://dev.mysql.com/doc/refman/8.0/en/example-maximum-row.html
-- Maximum & Minimum that get all results NOT only ONE result
SELECT * FROM products WHERE prod_price=(SELECT MAX(prod_price) FROM products);
SELECT * FROM products WHERE prod_price=(SELECT MIN(prod_price) FROM products);

# how to get the total prices for saled items table GOOLE IT ?
SELECT SUM(item_price) AS total_sales FROM order_items; -- column header will be total_sales
SELECT SUM(item_price) FROM order_items; -- column header will be SUM(item_price)

# what is the meaning of aggregate functions  ?
-- https://www.guru99.com/aggregate-functions.html --  COUNT  SUM  AVG  MIN  MAX 
-- MySQL supports all the five (5) ISO standard aggregate functions COUNT, SUM, AVG, MIN and MAX.
-- SUM and AVG functions only work on numeric data.
-- If you want to exclude duplicate values from the aggregate function results, use the DISTINCT keyword. The ALL keyword includes even duplicates. If nothing is specified the ALL is assumed as the default.
-- Aggregate functions can be used in conjunction with other SQL clauses such as GROUP BY

SELECT SUM(DISTINCT item_price) AS total_distinct_sales FROM order_items;   # 111.95
SELECT SUM(ALL item_price) AS total_all_sales FROM order_items;             # 141.95
SELECT SUM(item_price) AS total_sales FROM order_items;                     # 141.95


-- https://dev.mysql.com/doc/refman/8.0/en/group-by-functions.html
-- NOTES
-- The SUM() and AVG() aggregate functions do not work with temporal values. 
-- (They convert the values to numbers, losing everything after the first nonnumeric character.)
-- To work around this problem, convert to numeric units, perform the aggregate operation, 
-- and convert back to a temporal value. Examples:

SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time_col))) FROM tbl_name;
SELECT FROM_DAYS(SUM(TO_DAYS(date_col))) FROM tbl_name;

