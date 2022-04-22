# Book Rental System (BRS)

## Setup
Please run the following commands to start up your application.
```
composer install
npm install
npm run prod
php artisan migrate:fresh
php artisan db:seed
php artisan serve
```

## Functionalities

There are functions which are open for anonymous users. They can
* Search for books by author or title,
* List books by genre,
* View the data sheet of a selected book.

There are two types of users in this BRS: **Readers and Librarians**. 

A registered and authenticated (logged in) reader can
* Borrow a book,
* View his/her active book rentals, and
* View the details of a selected book rental.

A librarian can
* Add, edit or delete a book,
* Add, edit or delete a genre,
* List book rentals,
* View the details of a book rental,
* Change some status on a book rental, like status, deadline, note.

## Application Images
![homepage](https://user-images.githubusercontent.com/38450659/164799481-83e443e0-015f-4710-a742-d71d5a24e433.JPG)

![borrowscreen](https://user-images.githubusercontent.com/38450659/164800225-5b581a7a-46a3-4af2-9e72-4ab8a39620f5.JPG)

![rentallistscreen](https://user-images.githubusercontent.com/38450659/164800511-2e8615bb-49c2-47d3-867f-d01c5b61d566.JPG)

![approval](https://user-images.githubusercontent.com/38450659/164800596-8b2dabce-0386-41ae-8eca-873a2a56a6a7.JPG)

