## Introduction
Under construction

## Requirements
- PHP ^7.3
- Composer

## Initial Setup
- Run ```composer install```
- Set ```.env``` values to your local environment

## Database Setup
- Run ```php artisan migrate:fresh``` to create empty tables (WARNING - This will drop tables in target database before creating them)
- If you require seed data run ```php artisan db:seed``` (Should be run right after creating empty tables)
- Seeded users are ```admin@gmail.com``` (admin), ```owner@gmail.com``` (warehouse owner), and ```customer@gmail.com``` (customer), all with password of ```123456```

## Coding Standard
- Use snake_case for table and column names
- Use camelCase for the rest

## To-dos 
* [x] Seed data for warehouse, item, inventory, and inventory logs
* [x] Slice shared layout for all 3 roles
* [x] Make views for admin role (user list, warehouse list, item list, inventory list, inventory logs)
* [x] Make views for owner role (warehouse list, warehouse inventory)
* [x] Make views for borrower role (item list, warehouse inventory)
* [x] Change warehouse borrower to customer and warehouse owner to owner
* [x] Merge sharable views (e.g. sidebar) and use conditions to show/hide menu
* [ ] Work on Delivery Order Inbound and Delivery Order Outbound
* [ ] Make sure each item, inventory, warehouse, etc can only be seen/edited by their own admin / owner / customer
