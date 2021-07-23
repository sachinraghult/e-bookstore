E-BOOK STORE 
E-Book Store, a web application that has collection of e-books where you will buy to have a life time access. The books are categorized and the customer can search a book that he needs and can buy that particular e-book, so that he/she gets access to it. The customer can purchase, read, comment and request the books and further the customer can add the books to the cart he wishes and can buy it in future. Also, he/she can manage her account and profile.
The admin console is available for the admin to manage the e-books. The console is designed so that the admin can add a new category he wants and also the new books to the website. Also, he can view the customer details and their transaction history.

PROJECT AIMS AND OBJECTIVES

	Online book reading.
	Customer login and registration page.
	Customer Profile page to view and edit.
	A search column to search availability of books and sort books based on name, author, categories, etc.
	Facility to purchase the required book.
	Cart facility is available for multiple purchases or for future payments.
	Transaction history available to the user.
	Facility to request for a book which is not available.
	Comment section available for each book for the users to view and comment.
	An Admin login for admin console.
	A Dashboard is available, so that admin can ensure the overall site activity.
	Admin can add books and can view comments and book requests of the customers etc.,
	Also, Admin can manage the customer details and can edit his login credentials.


SOFTWARE USED 

OPERATING SYSTEM	WINDOWS 10

FRONT-END LANGUAGE	HTML, CSS, JAVASCRIPT

BACK-END LANGUAGE	PHP, SQL

DATABASE SERVER	MYSQL
DATABASE TOOL	PHPMYADMIN


INNOVATIONS
	Integration of secure payment gateway using Paytm.
	Recommendation module based on user’s activity.
	Added cart feature to ease the purchase of multiple products.

ER – DIAGRAM: 
RELATIONAL SCHEMA:
 
TABLES USED AND THEIR ATTRIBUTES:

 	 admin (aid, aname, apass)

 	 customer (cus_id, cus_name, cus_image, cus_mail, cus_pass)

 	 book (bid, bname, author, bimage, bfile, keywords)

 	 category (cat_id, cat_name, cat_image, cat_image1, bid) 

 	 request (rid, cus_id, bname, request, logs)

 	 comment (com_id, cus_id, bid, comment, logs)

 	 cart (itm_no, cus_id, bid)

 	 payments (bill_id, txn_id, cus_id, bid, logs) 

 	 temp_payments (bill_id, txn_id, cus_id, bid)

Bold & underlined – Primary Key
Italic & underlined – Foreign Key


All attributes in all the above tables are non-transitively determined by the Primary key (Super key) of the respective tables. Hence the tables in this relation are in BOYCE-CODD NORMAL FORM (BCNF).

