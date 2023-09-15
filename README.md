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

## Thoughts

### Scalability

1. **Large File Processing**: For processing exceptionally large files, I'd consider saving them on the backend and queuing them for background processing job. This approach ensures timely user notifications and email notifications upon completion.

2. **Uniqueness Validation**: I'd implement a validation check to ensure the uniqueness of employee IDs (Emp_ID) to prevent duplicate entries.

3. **Employee Record Updates**: I'd create an endpoint to update employee records via a CSV file. This endpoint should only modify existing employee data and relevant fields.

4. **Cloud Hosting**: I'd explore cloud hosting for automated scaling and resource management, enhancing performance and availability.

5. **Caching with Redis**: I'd utilize Redis to cache responses from the "get all employees" and "get employee by id" endpoints for performance enhancement by reducing database queries.

### Security

1. **Authentication and Authorization**: I’d implement Authentication and Authorization for Admin and Staff, then a middleware/permission group to enforce it

2. **Two-Factor Authentication (2FA)**: I'd enhance security with 2FA to protect against breaches.

3. **Secure Data Handling**: I'd prioritize secure storage and encryption of sensitive data.

4. **CDN for Protection**: Use a CDN like Cloudflare to safeguard against DDoS attacks and enhance loading times.

5. **Rate Limiting**: Implement rate limiting to prevent abuse and unauthorized access.
