## Topics
- [Requirements](#requirements)
- [Installation & Configuration](#installation--configuration)
- [Features](#features)
- [Technology](#technology)

# Requirements
  - SERVER: Apache 2 or NGINX.
  - RAM: 4 GB or higher.
  - PHP: 7.4.x or higher.
  - For MySQL users: 5.7.23 or higher.
  - For MariaDB users: 10.2.7 or Higher.
  - Node: 8.11.3 LTS or higher.
  - Composer: 1.6.5 or higher
# Installation & Configuration


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

**Queue worker**
- In CMS for newsletter part add/run this command for running the queue `php artisan queue:work --stop-when-empty`

# Features

- **User management:** 3 level user hierarchy `superadmin`, `admin`, `user` by default you can register as user. superadmin will give the roles and permission to the user.

- **Role management:** `superadmin` has all roles to access the application but he can gives roles and permission to the `admin` and `user`.
  
- **CMS module:** you have a ability to `create/edit/show/delete` the `post/category/subcategory/media/tags`.
  
- **Page:** This app provide you `create/edit/show/delete` page option also.

- **Theming:** This app has currently two theme option `company-theme`,`blog-theme`. You can switch between theme and customize the data as according to you. Both theme have there own customization.

- **Menu:** You can create your own menu link button.

- **Extra:** This app provide some extra module like `appointment`,`newsletter`,`calendar` options. 
  - For appointment section you can create an appointment.  
  - Newsletter: In company theme there is a form added in footer section for subscribe newsletter. If user subscribe newsletter you can send him a newsletter to subscibed user. `Note` For sending the newsletter don't forgot to run queue command `php artisan queue:work --stop-when-empty`.
  - calendar: this app provide a calendar options where you can see the appointment added in your calendar.

- **Reports/Dashboard**
  - Reports: This app provide some reports section for your module.
  - Dashboard: Thia app provide you to some Dashboard section also with some charts design.

- **Settings**
  - Superadmin can change some setting for module such as `appointment`, `cms`, `general setting`.

# Technology
> This app is made on PHP Laravel Framework and uses the laravel 8.x version.

**Additional Tech Stack** 
- `Blade-template` used for frontend page.
- `laravel-livewire`
- `alpineJs`
- `jquery`
- `bootstrap 4.x`
- `admint-lte` for backend dashboard section.