# Callum Portfolio Homebase

Callum Portfolio Homebase is a CakePHP-based web application designed to showcase your portfolio and blog about your projects. It includes a built-in Content Management System (CMS) to easily manage and update your content.

## Features
- **Portfolio Showcase**: Display your projects with detailed descriptions and images.
- **Blogging Platform**: Share your thoughts and updates through a blog.
- **Content Management System (CMS)**: Easily manage and update your portfolio and blog content, as well as the public viewable pages.
- **Responsive Design**: Optimized for both desktop and mobile devices.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/callum-vdm-dev/callum-portfolio-homebase.git
   ```
2. Navigate to the project directory:
   ```bash
   cd callum-portfolio-homebase
   ```
3. Install dependencies using Composer:
   ```bash
   composer install
   ```
4. Set up the database:
   - Create a new database.
   - Import the `schema.sql` file located in the root directory.
5. Configure the application:
   - Copy `config/app_local.example.php` to `config/app_local.php`.
   - Update the database credentials and other settings in `app_local.php`.
6. Start the development server:
   ```bash
   bin/cake server
   ```
7. Access the application in your browser at where the server was started.

## Setting up an Admin User

1. Go to the following: `http://[project root]/login`.
2. Login with the default admin credentials:
   - **Email**: `default@example.com`
   - **Password**: `MyNewPortfolio123!`
3. Navigate to "View Users" in the sidebar and create a new admin account with your credentials.
4. **DELETE** the **default admin** account to secure your application.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the MIT License. See the `LICENSE.txt` file for details.

## Acknowledgments

This project uses several third-party libraries and assets. For a full list of credits, see the `CREDITS.txt` file.
