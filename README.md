## About this project
<p>This project aims to provide an example of how to work with Vue Js and Axios using the Laravel framework.</p>

## How to set up

<p>After cloning the repository follow these steps:</p>

### MySQL
<p>Create a database with any name you like (e.g. trending\repositories).</p>

### Laravel
<p>Once the database is created, proceed with the next steps:</p>

- On your terminal, navigate to the root of the project.
- Create the application key by running `php artisan key:generate`
- From there, run composer install. This will install the required dependencies for the project.
- When composer is finished installing dependencies, run `npm install`. This will download and install node dependencies.
- Copy **.env.example** file and rename it **.env.**
- Open **.env** and modify database variables accordingly so Laravel can connect to your database.
- Go back to the root folder of your project and run `php artisan migrate`. This will create the necesary schemas for the data to be saved.
- When migrations are completed, start the server by typing the command `php artisan serve` on your terminal.
- On a separate terminal window (or tab) run `npm run development`. This command will build the front end of the application on a development environment*.
- Lastly, navigate to **localhost:8000**. Here you will be able to interact with the application.

Feel free to use or modify to your best interest.

Enjoy!


### NPM Environments

<p>There are different ways to build the application front-end.</p>

- `npm run development`: Will build the application for a development environment with all dependencies needed to develop your app.
- `npm run production`: Will build the application specifically for a production environment. This will exclude development dependencies.
- `npm run watch`: Will build the front-end in a development environment, but will watch for changes in the code and update such changes live.
