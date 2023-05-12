# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Install any needed packages
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Set the ownership of the application files to the Apache user
RUN chown -R www-data:www-data /var/www/html

# Set the permissions of the storage and bootstrap cache folders
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 to the Docker host
EXPOSE 80

# Start the Apache server in the foreground
CMD ["apache2-foreground"]