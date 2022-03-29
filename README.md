<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://user-images.githubusercontent.com/22714561/160553050-0e1cd559-8679-4022-a742-17bf4e913f65.png" width="400"></a></p>

## About NFTNO
This is a NFT marketplace with amazing features.

NFTNO allows users to connect their wallets, mint, sell, buy and complete manage their NFTs.

This project is under construction using <a href="https://github.com/ProjectOpenSea">OpenSea</a> SDKs.


## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:nftno/marketplace.git

Switch to the repo folder

    cd marketplace

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Contributing

Contributing guide will be available soon.

