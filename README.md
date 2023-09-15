## List of Tools used

1. PHP Framework: Laravel v10
2. PHP v8.1
3. Database: MySQL
4. CSV Library: League CSV v9.1
5. Documentation: Postman Doc

## Installation and Setup

1. Clone the repository to your local machine:

```bash
git clone https://github.com/oluwaeinstein007/employeeManagement.git
```

## Installation dependencies

1. Install composer:

```bash
composer install
```

2. Generate key:

```bash
php artisan key:generate
```

3. Check for the `.env.example` file, copy its contents, and create a new file named .env. Paste the copied contents into this new `.env` file.

4. Ensure that Apache and MySQL are running using XAMPP. Then, navigate to "http://127.0.0.1/phpmyadmin/" and create a new database named "LocalBrandX."

## Database Setup

1. Run migration:

```bash
php artisan migrate
```

## Starting the Application

1. Start the local serve:

```bash
php artisan serve
```

## Run Unit Test

1. To run the unit test I wrote for the project

```bash
php artisan test
```

## Links

1. [Link to my Postman documentation of the endpoints](https://documenter.getpostman.com/view/12625300/2s9YC7RWFv)

```bash
https://documenter.getpostman.com/view/12625300/2s9YC7RWFv
```

## Thoughts

1. Scalability
   i. If the file to be processed is exceptionally large, and considering browser time limits could cause issues with processing, it's advisable to first save the file on the backend. Then, you can queue it for processing via a background job. This way, you can promptly notify the user that their file has been successfully submitted, and they will receive an email notification when the processing is complete.
   ii. I would implement a check to validate the uniqueness of the Emp_ID to prevent the addition of the same employee multiple times.
   iii. To update employee records, I would create an endpoint that allows updates via a CSV file. This endpoint should ensure that it only updates records for existing employees and modifies relevant fields when changes are detected.
   iv. hosting the application in a cloud service to allow for automated change reflection and auto scaling of resources
   v. Utilizing Redis to cache responses from the "get all employees" and "get employee by id" endpoints for performance enhancement.

2. Security
   i. I’d implement Authentication and Authorization for Admin and Staff, then a middleware/permission group to enforce it
   ii. Running 2FA (2 factor authentication) just to protect from breach.
   iii. Storing keys and other sensitive data securely or encrypted
   iv. Using a CDN like cloudflare to protect against DDoS attack and enhanced loading time.
   viii. Running rate limiting
