<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Installation

#### Requiriments  
* Apache
* PHP >= 7.0
* PostgreSQL 10.4
* Composer 1.6.5

## Usage
#### Getting Started
    
1. Create your file ```.env``` according your configuration.
1. Download the project and run ``` composer install ```.
1. Generate the application key using the command ``` php artisan key:generate ```.
1. Then use the command ``` php artisan serve ``` to run the application locally.

#### Documentation 
* [Mockup](https://marvelapp.com/49ee7cd).
* [Diagram](https://drive.google.com/file/d/1bfwqPzUe41-6qxgvk8_1538o8Q2YfH4W/view?usp=sharing).

#### Routes
   - **URL Default**  
    ``` http://ip_servidor/ ```
    
   - **Authentication**  
    ``` POST: oauth/token ```  
    ``` BODY: ```  
        ```console
            {
              "grant_type": "password",
              "client_id": "CLIENT_ID",
              "client_secret": "SECRET",
              "username": "USUÁRIO",
              "password": "SENHA",
              "scope": "*"
            } 
        ```
   - **User**  
   * List all users  
   ``` GET: api/user/ ```  
    ``` HEADERS: ```  
        ```console
            {
              "Authorization": "Bearer {{token}}",
            } 
        ```
   * Logged User  
   ``` GET: api/user/{id} ```  
    ``` HEADERS: ```  
        ```console
            {
              "Authorization": "Bearer {{token}}",
            } 
        ```
   * Create User  
   ``` POST: api/user/ ```  
    ``` HEADERS: ```  
        ```console
            {
              "Authorization": "Bearer {{token}}",
            } 
        ```
     ``` BODY: ```  
        ```console
            {
              "name": {{name}} (required),
              "cpf_cnpj": {{cpf_cnpj}} (required),
              "birthdate": {{birthdate}} (required),
              "email": {{email}} (required),
              "password": {{password}} (required),
            } 
        ```
   * Update User  
   ``` PUT: api/user/ ```  
    ``` HEADERS: ```  
        ```console
            {
              "Authorization": "Bearer {{token}}",
            } 
        ```
     ``` BODY: ```  
        ```console
            {
              "name": {{name}} (optional),
              "cpf_cnpj": {{cpf_cnpj}} (optional),
              "birthdate": {{birthdate}} (optional),
              "email": {{email}} (optional),
              "password": {{password}} (optional),
            } 
        ```
   
   * Delete User  
   ``` DELETE: api/user/{id} ```  
    ``` HEADERS: ```  
        ```console
            {
              "Authorization": "Bearer {{token}}",
            } 
        ```
   
   - **Tickets**  
   ``` coming soon... ```
   - **Payments**  
   ``` coming soon... ```

