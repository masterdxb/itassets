# IT Asset CRUD App

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


Requires `PHP >= 7.1`

## Setup

Clone the repository and install the dependencies

```shell
composer install
```

Create a `.env` file in the root directory of your project. 

1) Take clone of this repo
2) Run command. update composer 
3) make empty db itasstes
4) rename file .env.example to .env
5) run this command php artisan migrate --seed
6) make virtual host to run application or you can open application like http://localhost/itassets/public/admin
7) Login details
Username: admin@itassets.com
Password: admin321


## Documentation

* **URL**

  http://example_domain/itassets

* **Http Method:**

  The method currently supported is:

  `POST`

*  **FrontEnd**

    I have used A Admin Theme which have bootsrtap frontend technologies included.

*  **Backend**

<p>I have structured code in MVC approach, if i had more time i was going to use HMVC approach but time was short so i constructed models instead of going module approach.</p>

## CRUD Functionality

In this Application we can execute following functions
* List
* Insert
* Update
* Delete



## HTTP Response Codes
Each response will be returned with one of the following HTTP status codes:

* `200` `OK` The request was successful
* `400` `Bad Request` There was a problem with the request (security, malformed, data validation, etc.)
* `404` `Not found` An attempt was made to access a resource that does not exist in the API
* `405` `Method not allowed` The resource being accessed doesn't support the method specified (GET, POST, etc.).
* `500` `Server Error` An error on the server occurred
    
## License

MIT &copy; [FARHAN IHSAN](https://www.linkedin.com/in/farhan-ihsan/)
