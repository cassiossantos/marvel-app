# marvel-app
Simple project to demo the Marvel API.

### Starting

> Steps

Clone this repository
````
$ git clone https://github.com/cassiossantos/marvel-app.git
````
Install the dependencies using Composer
````sh
$ composer install
````
To continue, you must configure the API access keys. If you still don't have it, create an account [here](https://developer.marvel.com/) and come back later

````sh
rename .env.example to .env and set your Marvel api keys
````
For example, 
````
MARVEL_PRIVATE_KEY=12345
MARVEL_PUBLIC_KEY=12345
````
Then, generate a key for your application
````
$ php artisan key:generate
````
And then run you serve,
````
$ php artisan serve
````

If everything occurred as expected you will have access to the screen with some marvel characters. 

Enjoy!










