Установка:

0. cp .env.example .env
1. cd docker
2. docker-compose up --b -d
3. docker exec -it test_work_fpm bash
4. composer install
5. php artisan migrate
6. php artisan db:seed --class=BalanceHistorySeeder
7. http://localhost:28592/user/histories
8. http://localhost:28592/user/balance/{id} id от 1 до 5


