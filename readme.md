## Y-lab test project

Steps to install project:
1. Clone the repository with command ```git clone https://github.com/Uki7991/ylab-test.git```
2. Open the project directory ```cd ylab-project```
3. Copy .env.example file ```cp .env.example .env```
4. Install composer dependencies ```composer install```
5. Import database dump in project directory ylab.sql
6. Run command ```php artisan key:generate```
7. To start project type command ```php artisan serve```
8. In browser type `http://localhost:8000`