
# Create a new database with the name "quizzes"
CREATE DATABASE quizzes;

# Create a new table with the name "students" into the database "quizzes" with these columns :
# id - first_name - last_name - user_name - student_email - scores - serial_number - created
-- go inside database then run next code 
-- (is there any way to change current working on database by coding?) => USE quizzes; True?
CREATE TABLE students
(
    id              INT, 
    first_name      VARCHAR(50) NOT NULL,
    last_name       VARCHAR(50) NOT NULL,
    user_name       VARCHAR(50) NOT NULL,
    student_email   VARCHAR(100)    NOT NULL,
    scores          INT,
    serial_number   INT NOT NULL,
    created         BOOLEAN
)ENGINE=INNODB;

# CHANGE id to be primary and add auto increment:
ALTER TABLE students
    MODIFY id INT(20) NOT NULL AUTO_INCREMENT,
    ADD PRIMARY KEY(id);

# Add a new column "phone_number" AFTER user_name column
ALTER TABLE students
    ADD phone_number VARCHAR(15) AFTER user_name;

# modify "student_email" column to be "email"
ALTER TABLE students
    CHANGE COLUMN student_email email VARCHAR(100) NOT NULL;

# modify "scores" column to be tinyint(4) , not accept any null values and set a default value to 0
ALTER TABLE students
    MODIFY scores TINYINT(4) NOT NULL DEFAULT 0;

# remove "first_name" and "last_name" columns from students table
ALTER TABLE students
    DROP COLUMN first_name,
    DROP COLUMN last_name;

# ADD comment to phone_number column ?
ALTER TABLE students
    MODIFY phone_number  VARCHAR(15) NOT NULL COMMENT 'this is phone number';
    -- (is there any other way?)

# add created_at and updated_at column with timestamp and make update_at auto updated  ?
ALTER TABLE students
    ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ADD updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

