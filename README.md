# TaskFlow - Simple Todo Management System

A clean, modern Laravel application for managing tasks with categories, user authentication, and activity logging.

## 🎯 Features

- **User Authentication** using Laravel's built-in authentication system
- **Task Management (CRUD)** - Create, Read, Update, Delete tasks
- **Task Categories** - Organize tasks with custom color-coded categories
- **Activity Logging** - Track all task changes with user information
- **Search & Filter** - Find tasks by keyword or category
- **Task Status Toggle** - Mark tasks as pending or done
- **Responsive UI** - Tailwind CSS with mobile-friendly design
- **Flash Messages** - User-friendly feedback on all actions
- **Input Validation** - Comprehensive validation with helpful error messages

## 📊 Database Structure

The application uses 5 tables for optimal organization:

1. **users** - User authentication data
2. **tasks** - Task information with user relationship
3. **categories** - Task categories with custom colors
4. **task_category** - Pivot table for many-to-many relationship
5. **activity_logs** - Track all task changes

## 🚀 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL or SQLite
- Node.js & npm (optional, for frontend development)

### Setup Steps

1. **Clone/Extract the project**
   ```bash
   cd LaravelFinalProject
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   Edit `.env` file and set:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=taskflow
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   Visit `http://localhost:8000` in your browser

## 📝 Usage

### Register & Login
- Create a new account at the registration page
- Login with your credentials
- You'll be redirected to the dashboard

### Tasks
- **Create Task**: Click "New Task" and fill in details
- **Edit Task**: Click "Edit" on any task
- **Delete Task**: Click "Delete" to remove a task
- **Toggle Status**: Click the status button to mark as done/pending
- **Search**: Use the search bar to find tasks by title or description
- **Filter by Category**: Use the category dropdown to filter tasks

### Categories
- Navigate to "Categories" in the sidebar
- Create new categories with custom colors
- Edit or delete existing categories
- Assign categories to tasks when creating/editing

### Dashboard
- View statistics: Total tasks, completed, pending, and overdue
- See recently created tasks
- View upcoming tasks with due dates

## 🔒 Security Features

- **Authentication Middleware** - Protect all routes that require login
- **Authorization Policy** - Only users can edit/delete their own tasks
- **CSRF Protection** - Built-in Laravel CSRF token protection
- **Input Validation** - All user inputs are validated
- **Password Hashing** - Passwords are securely hashed with bcrypt

## 📅 Date Constraints

All dates in this application are limited to **April - December 2026** for demonstration purposes.

## 🎨 UI/UX

- Modern, clean design with Tailwind CSS
- Fully responsive (desktop, tablet, mobile)
- Intuitive navigation
- Color-coded status indicators
- Hover effects and smooth transitions
- Flash messages for user feedback

## 📋 Validation Rules

### Tasks
- Title: Required, max 255 characters
- Description: Required, minimum 10 characters
- Due Date: Required, must be today or in future

### Categories
- Name: Required, max 255 characters, must be unique
- Color: Required, must be valid hex color (e.g., #3B82F6)

## 🔄 Activity Logging

All task changes are logged in the `activity_logs` table:
- **created** - When a task is created
- **updated** - When a task is modified
- **deleted** - When a task is deleted

Each log record includes:
- User who performed the action
- Task that was affected
- Action type
- Timestamp

## 💡 Tips

- Use categories to organize different types of tasks
- Set due dates to keep track of deadlines
- Use the search feature for quick access to specific tasks
- Check the dashboard for quick overview of your tasks
- Toggle task status with a single click

## 🛠️ Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Blade Templates
- **Styling**: Tailwind CSS
- **Database**: MySQL/SQLite
- **Authentication**: Laravel's built-in auth system
- **Server**: PHP 8.1+

## 📄 License

MIT License - Free to use and modify

## ✨ Bonus Features (Implemented)

✅ Task status toggle
✅ Filter by category
✅ Search tasks
✅ Dashboard statistics
✅ Activity logging
✅ Responsive design
✅ Flash messages
✅ Comprehensive validation
