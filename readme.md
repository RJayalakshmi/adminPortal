## Task
Here is the tasks of the test:
(1) Task No. 1:
Description :
Setup admin panel on localhost

(2) Task 2:
Pages: clients.php, addClient.php, editClient.php
Description :
Create a page clients.php, addClient.php and editClient.php. On clients.php, add the list of client (create a table in db with id, firstname, lastname, numberphone). On addClient.php make sure we can add a client with all info (label and input) and editClient page make sure we can edit a client added with all info (label and input) . Make sure that we can delete client (like users.php).

(3) Task 3:
Pages: customers.php
Description :
When you are on clients.php page, add an interval of 5 seconds that check if there is any add, updates or delete in clients without refreshing the page. If there is any new client, updates or deleted client show a modal on top right with a text that says "A client has been updated", with a button that says "Refresh the page" on click on it it should reload the page. Also in front of "Refresh page" show another button that says "Cancel" that closing the modal.

## Installation
STEP 1: Find "db_dump.sql" file and import the db.
STEP 2: Update your DB credentials(host, DB username, DB password, DB name) on "public_html/config.php"
STEP 3: Upload the files into your localhost and open the path in browser LOCALHOST_PATH_TILL_ROOT_FOLDER/public_html
STEP 4: You can now see login page of admin portal. Give the mentioned credentials(user@gmail.com/Test1234) and click on login button.
STEP 5: Upon successful login, you are redirected to clients dashboard. where you can add new client by clicking on "Add New Client"
STEP 6: To test the TASK 3, open client dashboard in another tab and add/update/delete client and that will be notified on old client dashboard page.

let me know if you have any questions.
