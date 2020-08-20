## How to set up

### MySQL
Create a database with any name you like (e.g. trending\repositories).

### Laravel
After cloning the repository follow these steps:
- On your terminal, navigate to the root of the project.
- From there, run composer install. This will install the required dependencies for the project.
- When composer is finished installing dependencies, run npm install. This will download and install node dependencies.
- Copy .env.example file and rename it .env.
- Open .env and modify database variables accordingly so Laravel can connect to your database.
- Go back to the root folder of your project and run php artisan migrate. This will create the necesary schemas for the data to be saved.
- When migrations are completed, start the server with php artisan serve.
- On a separate terminal window (or tab) run npm start. This command will build the front end of the application.
- Lastly, navigate to localhost:8000. Here you will be able to interact with the application.

