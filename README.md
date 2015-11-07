## Raft API

Raft is a online raffle site.

## Official Documentation

### Installation

#####Clone the repository
  "git clone https://github.com/badleyy/rtapi.git"

#####Install dependencies 
  "composer update"* at the root directory

#####Generate a site key and update the .env file
  "php artisan key:generate"</br>
  ./.env file - APP_KEY={generate key}

#####Update the laravel service providers and aliases to include jwt authenciation
  ./config/app.php - Add "Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class" in the providers array</br>
  ./config/app.php - Add to the aliases array</br>
  'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,</br>
  'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class
  
#####Update the framework to include jwt-auth
  "php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\JWTAuthServiceProvider"

#####Generate a jwt key for authentication
  "php artisan jwt:generate"</br>
  ./config/jwt.php - Update the changeme string in the secret object with the new key
  
#####Configure Apache
  Apache - change the web root to be the public folder of the directory structure "./public"
  
#####Update the database settings
  ./config/database.php - update the proper host, database, username and password settings under the correct database driver.
  
#####Run the databse migrations and seed the database with data
  "php artisan migrate:refresh --seed"
  
## API Routes and Business Information

In a seperate shared document

  
