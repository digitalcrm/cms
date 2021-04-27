# Installation

**Clone Repo**
  - open your terminal such as `cmd, gitbash, vscode terminal etc` which one you used
  - clone this project `git clone paste_the_url`
  - change disk project name `cd cms`

**Setup Database and Mail Credentials**
  - run command `cp .env.example .env`
  - setup and create database
  - open `.env` file and fill these value

    ```
    APP_URL=http://cms.test
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```    

  - Add Mail credential for demo purposes. Open `.env` file <a href="https://mailtrap.io/" target="_blank" rel="noopener noreferrer">Mailtrap</a> and fill these values 

    ```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_mailtrap_username
    MAIL_PASSWORD=your_mailtrap_password
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="your_mail_address"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

**Run Commands**

  - `php artisan key:generate`
  - `composer update`
  - `npm install && npm run dev`
  - `php artisan migrate`
  - `php artisan db:seed`

**Run the projects**
- run your project http://cms.test or run command `php artisan serve`

**Default Logged User**
- superadmin email: `superadmin@example.com` password: `password`
- admin email: `demoadmin@example.com` password: `password`
- user email: `demouser@example.com` password: `password`
