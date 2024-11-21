# 🌱 Outback Nursery Management Project


## Overview
   The Outback Nursery Management project is designed to streamline the operations of a nursery. It provides features for managing inventory, customer 
   data, and order tracking, facilitating smooth and efficient nursery management.

## 🚀 Main Features
### 🛠️ Admin Panel
- **CRUD Operations**: 
  - Add, edit, view, and delete products, categories, and plant inventory.
- **Admin Authentication**: 
  - Secure login ensures that only authorized admins can access the dashboard.
- **Add New Admin**:
    Admins can add new admin accounts by entering a username and password in the admin management file (add-admin.php).
    * **Default Admin Credentials:**
      * Username: admin
      * Password: admin123

### 👥 User Panel
- **User Authentication**: 
  - Sign-up and login functionality for users to create personalized accounts.
- **View Products**: 
  - Users can browse plants and categories added by the admin.
- **Favorites**: 
  - Users can add products to their favorites for quick access and better organization.


 ## 📂 Project Structure
   ```bash
  Outback_Nursery_Management/
  ├── add_admin.php          # Add a new admin user
  ├── adminhome.php          # Admin dashboard
  ├── add_plant.php          # Add new plants
  ├── add_stock.php          # Add stock items
  ├── category.php           # Manage categories
  ├── contact.php            # Contact page for users
  ├── config.php             # Global configuration file
  ├── db.php                 # Database connection file
  ├── delete_category.php    # Delete a category
  ├── delete_plant.php       # Delete a plant
  ├── delete_stock.php       # Delete a stock item
  ├── edit_category.php      # Edit category details
  ├── edit_plant.php         # Edit plant details
  ├── edit_stock.php         # Edit stock details
  ├── favorites.php          # User favorites page
  ├── index.php              # Landing page
  ├── login.php              # User and admin login
  ├── logout.php             # Logout functionality
  ├── product.php            # Display list of products
  ├── product_detail.php     # Product details page
  ├── profile.php            # User profile page
  ├── signup.php             # User registration
  ├── style.css              # Styling for the website
  ├── subscribe.php          # Subscription functionality
  ├── toggle_favorite.php    # Add/remove favorites
  ├── uploads/               # Directory for uploaded files
  │   └── [Uploaded Images]
  ├── Image/                 # Static image assets
  │   └── [Site Images]
  ├── view_categories.php    # View all categories
  ├── view_plants.php        # View all plants
  ├── view_stock.php         # View stock items

   ```

## ⚙️ Setup Instructions
   ### 1. **Clone the repository**:
   ```bash
   git clone [https://github.com/Bhoomi3637/outback-nursery-management.git](https://github.com/Bhoomi3637/outback-nursery-management.git)
   ```
### 2. **Navigate to the project directory**:
  ```bash
   cd outback-nursery-management
```

### 3. **Set Up the Environment**:
   Install [XAMPP](https://www.apachefriends.org/) or [MAMP](https://www.mamp.info/) for a local PHP server.
   Ensure PHP and MySQL are installed and configured.

### 4. **Import the Database**
   * Open phpMyAdmin (or any database manager).
   * Create a new database named outlook_nursery.
   * Import the outlook_nursery.sql file into this database.

### 5. **Configure the Database Connection**
   Edit the db.php file with your local database credentials:
```bash
     $host = 'localhost';`
     $db = 'outlook_nursery';`
     $user = 'root';
     $password = '';
```

### 6. **Run the Application**
   Start your server (Apache & MySQL) using XAMPP/MAMP, then access the application in your browser:

    ```bash
    **Access the project** by navigating to php- S localhost:8000
    ```

   `http://localhost/outlook-nursery-management`

### 5. **Login to Website**   
  * User Panel:
     * Users can register on the website by creating an account and logging in with their unique username and password.
  * Admin Panel:
    * The admin panel is pre-configured with default credentials for secure access:
        * Username: admin
        * Password: admin123
           
  
## 🌟 Usage
     
 * **🛒 User Panel**
      * Register or log in as a user.
      * Browse plants and categories added by the admin.
      * Add favorite items to the "Favorites" list for future reference.

* **👩‍💻 Admin Panel**
     *  Login to the admin dashboard using admin credentials.
     *  Manage:
          * Plants (add, edit, view, delete)
          * Categories (add, edit, view, delete)
          * Stock (add, edit, view, delete)
 ## Functionality:
   * **🛠️ Admin Panel**
        * The admin panel allows admins to manage the website's data (products, categories, and inventory) through a user-friendly interface.
   * **🔄 CRUD Operations:**
          
           
     * Create: Admin can add new products, categories, and plant inventory.
     * Read: Admin can view existing products, categories, and inventory in the dashboard.
     * Update: Admin can edit details about products, categories, and inventory.
     * Delete: Admin can remove products, categories, and inventory from the system.
         
   * **🔐 Admin Authentication:**
      *  Admins need to enter a secure username and password to access the admin dashboard, ensuring that only authorized personnel can make changes.
   * **🖥️ User Panel:**
     * The user panel allows users to navigate the site, browse through products, and manage their own account settings.
          
   * **🔑 User Authentication**:
      *  Users can sign up by providing necessary details (such as email, password), then log in with those credentials to access their personalized account.
 

 ## 💻 Technologies Used
  * **PHP**: Backend logic and server-side scripting.
  * **MySQL**: Database for storing application data.
  * **HTML**: Structuring web pages.
  * **CSS**: Styling for a responsive and user-friendly interface.

## * 🚧 Future Enhancements
   - Advanced analytics for admin reporting.
   - Email notifications for user and admin activities.
   - UI improvements with modern frameworks (e.g., Bootstrap, Tailwind CSS).
   - Integration of a payment gateway for extended e-commerce functionality.

    Happy gardening with tech! 🌻

