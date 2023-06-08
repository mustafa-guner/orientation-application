## Reservation Application

# Introduction
The Reservation Application is a web-based platform designed to facilitate reservations for restaurants and cafes located in Cyprus. It aims to provide users with a seamless and convenient way to book tables at their preferred dining establishments. This application is built using the Laravel framework and incorporates various features such as personalized feedback, restaurant filtering based on user's location, user-created restaurant sharing, and reservation management by restaurant owners.

# Key Features
- User Registration and Authentication: Users can create accounts and log in to the application to access its features.
- Personalized Feedback: Upon logging in, users are greeted with personalized feedback, enhancing their overall experience.
- Restaurant Filtering: The application automatically filters and displays restaurants based on the user's selected city during registration. For example, if the user selects Nicosia as their city, only restaurants located in Nicosia will be shown.
- User-Created Restaurants: Users have the ability to create and share restaurant details with other users, expanding the application's database of available dining options.
- Reservation Management: Users can make reservations for their desired restaurants, while restaurant owners have the authority to approve or reject these requests, providing seamless coordination between customers and establishments.


# Installation and Setup
To run the Reservation Application locally, follow these steps:

- Clone the repository from GitHub: git clone https://github.com/slex1one-Musdy/orientation-application.git.
- Navigate to the project directory: cd reservation-application.
- Install the required dependencies using Composer: ```composer install```.
- Create a copy of the ```.env.example``` file and rename it to ```.env```.
- Generate an application key: ```php artisan key:generate```.
- Install required npm packages for bootstrap: ```npm install```
- Run the vite: ```npm run build```
- Configure your database settings in the .env file.
- Do not forget to add your mailtrap credentials into your .env file. (https://mailtrap.io/signin)
- Run the database migrations: ```php artisan migrate```.
- Seed the database: ```php artisan db:seed```
- Start the application server: ```php artisan serve```.

# UML Diagram
![RESERVATION_APP_DB_MODEL](https://github.com/slex1one-Musdy/orientation-application/assets/60453650/39f3d367-1a09-45d6-be15-bd2be3f0d30a)

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

