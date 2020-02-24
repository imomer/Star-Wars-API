<p align="center"><img src="https://imomer.com/star-wars-api.png"></p>

## About Star Wars API

This is a simple REST API to get the following information about Star Wars Universe.

- Film with longest crawl.
- Most appeared character in film.
- Most appeared species in films.
- Planets with largest number of pilots.

## Installation

#### 1. Clone Repo

```sh
# 1. Clone the repo
$ git clone https://github.com/imomer/Star-Wars-API.git

# 2. Move into the repo
$ cd Star-Wars-API

# 3. Install it with composer
$ composer install
```

#### 2. Setup .env
Make a copy of `.env.example` file on the root directory and rename it to `.env`

## Usage

### ❯ Run the API

```sh
$ php artisan serve
```
After running the above command you will get the serve URL:
```
http://<url>
```
Now we are good to make some HTTP Requests to the API

## HTTP Requests


```
# 1. Longest opening crawl film
GET http://<url>/api/longest-opening-crawl-film

# 2. Most appeared charaters in film
GET http://<url>/api/most-appeared-character

# 3. Most appeared species in films
GET http://<url>/api/most-appeared-species

# 4. Longest opening crawl film
GET http://<url>/api/planets-with-pilots
```