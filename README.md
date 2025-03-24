# HiveMind

HiveMind is a collaborative E-commerce website developed as part of the CS2_TP module. The website is centered around a company that provides bee-friendly products for its users. The website is divided into three separate views: one for guests without an account, one for logged-in users, and one for admins to manage inventory and stock. The design of the website is minimalistic, making it easier for users to navigate through pages while following a specific color scheme.

Visit the HiveMind website by clicking on the link: [HiveMind Website](https://cs2team29.cs2410-web01pvm.aston.ac.uk/public/)

**NOTE:** HiveMind is a website developed solely by students from Team 29 for the module assessment of CS2_TP.

## Features

### Guest View
- Browse products
- View product details
- Add products to the wishlist
- Register for an account

### User View
- Log in to the website
- Browse and purchase products
- Manage wishlist
- View order history
- Update profile information

### Admin View
- Manage inventory and stock
- View and process user orders
- Handle user enquiries
- Generate and view reports
- Manage user accounts

## Technologies Used
- Laravel: PHP framework for web development
- Tailwind CSS: Utility-first CSS framework for styling
- Font Awesome: Icon library for adding icons
- MySQL: Database for storing user and product information

## Getting Started

To get started with contributing to the project, follow the project structure and style guidelines.

### Project Structure
1. **Website Contents:** HTML/PHP logic is located inside the `resources/views` folder.
2. **Routing:** Website routing is handled through the `routes` folder, followed by the access modifier of the designated routing required.
3. **Accessing Pages:** Access your web page based on the name of the file.

### Prerequisites
- PHP 8.x
- Composer
- Node.js and npm

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/EsamKhalid/HiveMind.git
   cd HiveMind
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. Set up the environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure the `.env` file with your database credentials.

5. Run database migrations:
   ```bash
   php artisan migrate:fresh --seed
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

## Acknowledgements

HiveMind is a project developed by Team 29 for the CS2_TP module assessment.

## Developing:

See the [Rules](https://github.com/EsamKhalid/HiveMind/blob/main/RULES.md) to learn more about commits, contributions and the such.

To get started with contributing towards the project, there is a seamless project structure and style to adhere towards.

This project encompasses Laravel as the means of providing more nuance and ease of use for development.
The basic structure goes as follows:

```
1. Website contents, and or otherwise, your HTML/PHP logic will be inside of the resources/views folder

2. Website routing is handled through the routes folder, followed by the access modifier of the designated routing required.

3. From there, access your web page based off of the name of the file
```
