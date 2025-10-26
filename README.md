# Ti-Moto

**Project Type:** Laravel + React Native / React.js
**Target Market:** Haiti
**Description:**
Ti-Moto is a motorcycle ride-hailing application designed for Haiti, connecting passengers with nearby drivers for fast, safe, and convenient transportation. The backend is built with **Laravel**, while the frontend includes **React Native mobile apps** for drivers and passengers, plus a **React.js admin dashboard**.

---

## Table of Contents
1. [Features](#features)
2. [Tech Stack](#tech-stack)
3. [Setup & Installation](#setup--installation)
4. [Environment Variables](#environment-variables)
5. [Database](#database)
6. [API Endpoints](#api-endpoints)
7. [Frontend](#frontend)
8. [Testing](#testing)
9. [Deployment](#deployment)
10. [Future Enhancements](#future-enhancements)
11. [Branding](#branding)
12. [License](#license)

---

## Features
- User authentication (passengers & drivers)
- Driver registration & verification
- Ride request & acceptance system
- Real-time driver & passenger location tracking
- Fare calculation & payments (Stripe / PayPal)
- Ride history & reviews
- Push notifications (FCM)
- Admin panel for managing drivers, rides, and payments

---

## Tech Stack
- **Backend:** Laravel (PHP 11+), Sanctum / Passport for API auth
- **Database:** MySQL / PostgreSQL
- **Real-Time:** Laravel WebSockets / Pusher
- **Frontend:** React Native (Driver & Passenger Apps), React.js (Admin Panel)
- **Maps & Routing:** Google Maps API / Mapbox
- **Payments:** Stripe / PayPal
- **Notifications:** Firebase Cloud Messaging (FCM)

---

## Setup & Installation

1. Clone the Repository
git clone https://github.com/yourusername/ti-moto.git
cd ti-moto


2. Install PHP Dependencies
composer install

3. Install Node Dependencies
npm install

4. Environment Variables

Copy .env.example to .env and update your credentials:

APP_NAME=Ti-Moto
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ti_moto
DB_USERNAME=root
DB_PASSWORD=
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret

5. Generate App Key
php artisan key:generate

6. Run Migrations
php artisan migrate

7. Seed Initial Data (optional)
php artisan db:seed

8. Start the Laravel Server
php artisan serve

Run PHPUnit tests for backend:
php artisan test