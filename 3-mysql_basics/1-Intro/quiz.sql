
# What is the best data type and size to save your name ?
-- VARCHAR(50)

# What is the best data type and size to save your mobile phone number ?
-- VARCHAR(15)

# What is the best data type and size to save your tablet price ?
-- DECIMAL(8,2)

# What is the best data type and size to save (yes,no) answer ?
-- may be BOOLEAN(1) --> which is TINYINT(1)
-- or use VARCHAR(3)

# What is the best data type and size to save your birth date ?
-- DATE() (what is the size?)

# What is the best data type and size to save product serial number ?
-- SERIAL() --> which is  by default (unsigned BIGINT(20), Auto Increment, Primary KEY)
-- OR unsigned BIGINT(20)

# What is the best data type and size to save your email address ?
-- VARCHAR(255) --> most people do that , but for me it is 150 (what is better? why?)

# What is the best data type and size to save your Article Content ?
-- TEXT() it is fixed size 65535
-- BUT VARCHAR(65535) is better

# is it applicable to save interview date and time into varchar  ?
-- NO The Best is to save as DATETIME()
-- but I think we can save it in varchar but is a bad practice

