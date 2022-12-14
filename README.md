

## Welcome to BooksVille

It's quite easy getting started with this application. Follow the steps below to get started:

- Clone the project by running ```git clone [project_git_url]```
- After cloning the project, run ```composer install``` to install all dependencies
- Next, you would need to configure some environmental variables.
- Open your ```.env``` file and supply a database name and password you have created
- After setting up the database configurations, run ```php artisan migrate --seed``` to create all database tables and seed default Librarian
- Seeding will also create 10 books without image, the admin can edit them and add images

- after seeding the application, a default admin user is created with email: ```librarian@gmail.com``` and password: ```secret```
- Run '''php artisan storage:link``` to link your images and make them visible
- Run ```php artisan serve``` to start the application


## Setting Up Notificaions

For notifications to work, you need to supply the following ```.env``` variables

- ```MAIL_MAILER=smtp```
- ```MAIL_HOST=smtp.gmail.com```
- ```MAIL_PORT=465```
- ```MAIL_USERNAME=```
- ```MAIL_PASSWORD=```
- ```MAIL_ENCRYPTION=ssl```
- ```MAIL_FROM_ADDRESS=```
- ```MAIL_FROM_NAME=```

- when you have supplied all the necessary variables, run ``` php artisan schedule:work``` to monitor and send email notifications

And that's it. Enjoy your app.


