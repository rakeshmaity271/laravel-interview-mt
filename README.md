


![Logo](https://codebuddy.co/assets/img/Logo.svg)
# Laravel Interview

Task 1

    1) Create basic authentication using laravel auth module
    2) There will be 2 types of users. i.e. user and admin
    3) There will be 2 dashboards. i) for Admin and ii) for User.
    4) Admin can go to user's dashboard but user can not.
    5) Create a CRUD functionality for Category. Admin will create n-level of categories. You have to plan db design and execute the features.
    6) In Dashboard admin will see nested Categories in a Tree view
        Example:
            Category 1
                Category 1-1
                Category 1-2
            Category 2
                Category 2-1
                Category 2-2

NOte: Please run composer install and npm install commands before run the project.

http://127.0.0.1:8000/admin-dashboard/category/add
admin credentials
username: admin@admin.com
password: password

user credentials
username: user@user.com
password: password

OR
---

Task 2


    write a function to validate and book tickets while adhering to the following specifications.

    Specifications
    ---------------
    1. There are initially 200 seats available across 20 columns (columns A to T) and 10 rows (row 1 to 10). So the first seat will be represented as A1 , and last seat as T10 in both input and output operations.
    2. The function will accept the input of 1 seat of user's choice, and the number of tickets they want to book (maximum 5). Ex: "bookSeats('A15', 4);"
    3. The function will need to check for available adjacent seats (both left or right of the supplied seat) including the seat of user's choice matching the number of tickets supplied.
    4. If the seats are available, the function will need to book them in database and return a confirmation with the list of seats booked.
    5. If the seats are not available, the function needs to return a message indicating a booking failure, and a set of alternate suggested seats depending on availability.





Coding Guidelines
----------
    1) Everything has to be in a Github public repository
    2) Every feature will be committed
    3) Will have to maintain proper migration files.
    4) Will have to write seeder classes to seed data,sharing any .sql file is not appreciated.
    5) Minimum laravel version is 7.x
    6) Mention the user and admin credentials in readme.md file in the github repo.

Time:
-----
    2 hrs (if you need more time please let us know, it can be arranged)




Happy Coding ! 😀
