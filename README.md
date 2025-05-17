# 📚 Livewire Bookmark App

A simple Bookmark Management Application built with **Laravel 12**, **PHP 8.4**, and **Livewire 3**.  
This project demonstrates a complete CRUD + Search functionality for managing bookmarks using Laravel’s powerful backend and Livewire’s reactive components.

---

## 🧾 Features

- ✅ Create, Read, Update, Delete (CRUD) bookmarks
- 🔍 Live search functionality using Livewire 3
- ⚡ Reactive UI without custom JavaScript
- 🎨 Clean Blade component design
- 🛠 Built with Laravel 12 & PHP 8.4

---

## 🧰 Tech Stack

- **Laravel 12**
- **PHP 8.4**
- **Livewire 3**
- **Alpine.js** (for UI interactivity)
- **Tailwind CSS** (optional, but included for styling)
- **MySQL** or any supported DB

---

## 🚀 Installation

Follow these steps to get the project running locally:

### 1. Clone the Repository

```bash
git clone https://github.com/naderelsayedd/livewire-bookmark.git
cd livewire-bookmark
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Copy and Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit your `.env` file and set up your database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Install Frontend Dependencies

```bash
npm install
npm run dev
```

### 6. Serve the Application

```bash
php artisan serve
```

Then open your browser and visit: [http://localhost:8000](http://localhost:8000)

---

## 🧪 Usage

You can:

- Add new bookmarks (title, URL, description, etc.)
- View all saved bookmarks in a table
- Edit bookmark details
- Delete unwanted bookmarks
- Use the search bar to filter bookmarks in real-time (Livewire-powered)

---

## 🗂 Project Structure Overview

```text
app/
├── Http/
│   ├── Controllers/
│   └── Livewire/        # Livewire components for bookmarks
resources/
├── views/
│   ├── livewire/        # Blade views for each component
│   └── layouts/         # Layout files
routes/
├── web.php              # Route definitions
```

---

## 🧠 Useful Commands

```bash
# Create a Livewire component
php artisan make:livewire Bookmark

# Clear caches
php artisan optimize:clear

# Run unit tests
php artisan test
```

---

## 📚 Learn More

- [Laravel 12 Docs](https://laravel.com/docs/12.x)
- [Livewire 3 Docs](https://livewire.laravel.com/docs/3.x)
- [PHP 8.4 Changelog](https://www.php.net/releases/8.4/)

---

## 🙌 Author

**[Nader El Sayed](https://github.com/naderelsayedd)**  
GitHub: [@naderelsayedd](https://github.com/naderelsayedd)

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).
