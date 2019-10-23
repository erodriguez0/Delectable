# Delectable

An interactive restaurant management and reservation system. The purpose of this web app is to facilitate the integration of a reservation system, restaurant management, or both. This web app offers an administration side for the website owners to manage the restaurants that sign up for this service. It creates an all-in-one environment for restaurant owners to manage their staff, reservations, and orders. They can see how well their business is running. The restaurant customers are welcomed with an easy way to reserve their tables at the restaurant of their choice and place orders ahead of time to skip the wait. They'll be presented with an intuitive design to navigate restaurants and their menus with optional filters.

## Getting Started

### Prerequisites

* MySQL 8.0.17

* PHP 7.3.10

### Deployment

#### Run the database scripts

##### Option 1 - MySQL Prompt

```
mysql -u <user> -p
source crt_first.sql
use <database>
source crt_second.sql
```

#### Option 2 - Command Line

```
mysql -u <user> -p < crt_first.sql
mysql -u <user> -p <database> < crt_second.sql
```

### Built With

* [Laravel](https://laravel.com/) - PHP Framework

### Authors

* **Esteban Rodriguez** - *Database, Admin Front-End, Reservation System* - [erodriguez0705](https://github.com/erodriguez0705)
