
## About This project
This project is a demo for room reservation system


## How to run and oporate
- Clone this project.
- make a database named "rooms_reservations_system".
- Change the `.env.example` to `.env`.
- Change the needed data inide the .env file like the <b>database info</b> accoredingly.
- run `composer install`.
- run `npm install`.
- run `php artisan migrate --seed`.
- delete `/public/storage` folder if existed and run `php artisan storage:link`.
- move everying in `/database/testImages` to `/public/storage`.
- run `php artisan serve`.
- run `npm run dev`.



## Fueatures
- Users Management
- Buldings Management
- Rooms Management
- Seasons Management
- AddOns Management
- Reservations Management
- Interactive and realtime User Reservation layout 


### 1- Admin
- Open the url `/dashboard/login`
- Login with the following credentials
    - Email: `admin@admin.com`
    - Password: `123456`

### 2- Reservation Manager
- Open the url `/dashboard/login`
- Login with the following credentials
    - Email: `manager@admin.com`
    - Password: `123456`

### 3- A user
- Open the url `/`
- Start following the steps to make a reservation
- In the end you shoud get a thank you message



