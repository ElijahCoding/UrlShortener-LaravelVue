# Getting started

## Installation

Clone the repository

    git clone git@github.com:ElijahCoding/UrlShortener-LaravelVue.git

Switch to the repo folder

    cd UrlShortener-LaravelVue

Install all the dependencies using composer

    composer install
    
Install all the dependencies using npm
    `npm install`

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate new Passport client tokens, install Horizon

    php artisan passport:install && php artisan horizon:install

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run npm dev
    `npm run dev` 

`IF ENV=production`
    `npm run build`

Start the local development server

    php artisan serve
    
Open a new terminal and run Horizon Queue
    `php artisan horizon`

You can now access the server at `http://localhost:8000`

Supervisor file

`[program:laravel_horizon]
 process_name=%(program_name)s_%(process_num)02d
 command=php /home/ubuntu/your-project-folder/artisan horizon
 autostart=true
 autorestart=true
 redirect_stderr=true
 user=www-data
 stdout_logfile=/home/ubuntu/your-project-folder/storage/horizon.log
 stdout_logfile_maxbytes=10MB
 logfile_backups=10`
