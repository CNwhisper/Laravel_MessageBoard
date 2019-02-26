# **Laravel_MessageBoard**

## *How to download this project*
----
1. Open command line or git-bash
```
#git clone https://github.com/CNwhisper/Laravel_MessageBoard.git
#cd Laravel_MessageBoard
```
2. Install dependencies
```
#composer install
```
3. copy .env
```
#cp .env.example .env

#vim .env
Then set DB_DATABASE, DB_USERNAME, DB_PASSWORD
inorder to connect to the DB you have.
```
4. create database table and migrate
```
#php artisan migrate
```
5. Generate application key
```
#php artisan key:generate
```
6. start server
```
#php artisan serve
```
