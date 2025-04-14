# RideHub - Car Management System

RideHub is a modern web application built with Laravel and Tailwind CSS that helps manage car inventories for different brands (Mercedes-Benz, Kia, and Honda). It provides an intuitive interface for viewing, adding, and managing cars with brand-specific layouts and responsive design.

## Features

-   **Brand-Specific Car Management**

    -   Dedicated pages for Mercedes-Benz, Kia, and Honda
    -   Unique styling and branding for each manufacturer
    -   Responsive grid layouts for car displays

-   **Car Management**

    -   Add new cars with detailed information
    -   Image upload support for car photos
    -   View car details with images
    -   Delete cars with confirmation
    -   Real-time updates using AJAX

-   **User Interface**
    -   Modern, responsive design
    -   Dark mode support
    -   Mobile-friendly navigation
    -   Interactive modals for actions
    -   Real-time notifications

## Prerequisites

-   PHP >= 8.0
-   Composer
-   Node.js and NPM
-   MySQL or compatible database
-   Web server (Apache/Nginx)

## Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd ridehub
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Set up environment file**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure database**

    - Open `.env` file and update database credentials:
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=ridehub
        DB_USERNAME=your_username
        DB_PASSWORD=your_password
        ```

5. **Set up storage link**

    ```bash
    php artisan storage:link
    ```

6. **Run migrations and seeders**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

## Running the Application

1. **Start the development server**

    ```bash
    php artisan serve
    ```

2. **Access the application**
    - Open your browser and navigate to `http://localhost:8000`
    - Login with your credentials or register a new account

## Testing the Features

### 1. Car Management

#### Adding a New Car

1. Navigate to any brand page (Mercedes-Benz, Kia, or Honda)
2. Click "Add New Car" button
3. Fill in the required information:
    - Model name
    - Import date
    - Selling price
    - Description (optional)
    - Upload car image (supported formats: JPG, PNG, WebP; max size: 2MB)
4. Click "Save Car" to add the vehicle

#### Viewing Cars

-   All cars are displayed in a responsive grid layout
-   Each car card shows:
    -   id
    -   Car model
    -   Selling price
    -   Import date
    -   Image (if provided)

#### Deleting Cars

1. Find the car you want to delete
2. Click the "Delete" button
3. Confirm deletion in the modal prompt

### 2. Navigation

-   Use the sidebar to switch between different brand pages
-   On mobile:
    -   Click the menu icon to open/close the sidebar
    -   Use the responsive navigation menu

### 3. Dark Mode

-   UI automatically adjusts based on your system settings

## Troubleshooting

### Common Issues

1. **Database Connection Error**

    - Verify database credentials in `.env`
    - Ensure MySQL service is running
    - Check database exists and is accessible

2. **Page Not Found Errors**

    - Run `php artisan route:clear`
    - Run `php artisan cache:clear`

3. **Changes Not Reflecting**
    - Clear application cache:
        ```bash
        php artisan cache:clear
        php artisan view:clear
        php artisan config:clear
        ```

### Support

For additional support or to report issues:

1. Check the Laravel documentation
2. Review the error logs in `storage/logs`
3. Contact the development team

## Security

-   Ensure proper permissions are set on storage and cache directories
-   Regularly update dependencies
-   Keep your Laravel installation up to date
-   Use HTTPS in production
-   Implement proper authentication mechanisms

## License

This project is licensed under the MIT License - see the LICENSE file for details.
