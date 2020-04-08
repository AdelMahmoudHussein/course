<?php
/**
 * Created by PhpStorm.
 * User: Ahmed.Fakhr
 * Date: 2019-08-27
 * Time: 4:47 PM
 */


# Step 1 : implement pagination on this list with 10 rows per pages
/**
 * Done
 * 1.create $page then make it be 1 if not set                                  #done
 * 2.create $limit to be 10                                                     #done
 * 3.create footer of table                                                     #done    
 * 4.create php code for 3 pages before and after                               #done
 * 5.create php code for (First, Prev, Next, Last)                              #done
 * 6. Still remain edit pagination with search results                          #????    
 *      A.may be by make string variable $search_string = "" (beginning of functions.php)#done
 *      B.concatenate it to pagination bar buttons                              #done
 *      C.add attribute to it when use search filter                            #done
 *      D.make search filter functionality run with $_REQUEST not only $_POST   #done
 *      E.change search form from POST to GET to avoid parameters conflict      #done
 */


# Step 2 : save employee images locally and get image from the database
/**
 * Done
 * 1.create images directory                                                    #done
 * 2.add images to folder                                                       #done
 * 3.add column to db as image_name                                             #done
 * 4.change source of images to be locally                                      #done
 */


# Step 3 : add delete edit options to the list
/**
 * 1.create new column to table with the name option                            #done
 * 2.create two links delete, edit                                              #done
 * 3.create functions page                                                      #done
 * 4.create delete function                                                     #done
 * 5.create edit function that get id and redirect to edit.php                  #done
 * 6.create edit.php                                                            #done
 * 7.show employee information to edit on edit.php                              #done
 * 8.create update function that take the new data and call db to save it       #done
 * 9.then redirect to index.php                                                 #done
 * 10.still need to create function to upload image (that mean move from folder to folder)#????
 */


# Step 4 : create an "add" button on the top of the list to add employees
/**
 * 1.add <a> as button that action add.php                                      #done
 * 2.create add function in functions.php                                       #done
 * 3.create add.php to add data                                                 #done
 * 4.still need to create function to upload image (that mean move from folder to folder)#????
 * 5.still need to solve gender required but can be empty                       #done
 *      A. After hours the simple way is to make placeholder value empty not "0"#done
 *      B.<option value="" disabled selected >--Select Gender--</option>        #done                            #????
 * 6.then redirect                                                              #done
 */


# Step 5 : add gender as another filter to the search
/**
 * 1.create label and select for gender (may be options with male,female,both)  #done
 * 2.add it to select query                                                     #done
 */


# MORE READABILITY & FUNCTIONALITY
/**
 * 1.add Cancel button on edit page                                             #done
 * 2.add Cancel button on add page                                              #done
 * 3.add Add Another button on add page to add another employee                 #done
 * 4.make it possible to filter by only one of start_date or end_date or gender #done
 * 5.move search logic from index.php to functions.php                          #done
 * 6.move pagination bar to separate file                                       #done
 * 7.add new drop down menu(select) with limit 5,10,15,20,25 with display button#done
 * 8.Use $_SESSION with limit to save my choice                                 #done
 * 9.make separate file for every block of codes(php or html)                   #done
 * 10.make separate file for large functions outside functions.php              #????
 * 11.
 * 12.
 */

