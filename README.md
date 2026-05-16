# DeChamps Tours & Travel 🌍

A full-stack travel and tourism management platform built with Laravel.  
It includes a public website for users and a powerful admin CMS for managing destinations, blogs, bookings, and more.

---

## 🚀 Features

### Public Website
- Browse travel destinations
- View detailed destination pages
- Blog system with articles and travel guides
- Booking inquiry system
- Featured content highlights

### Admin Dashboard
- Manage destinations (Create, Edit, Delete)
- Manage blog posts with approval workflow
- Approve/reject user-submitted blogs
- Manage bookings
- Upload images and media
- Feature/unfeature content

### Blog System (CMS Flow)
- Users can submit blog posts
- Admin reviews submissions
- Only approved blogs are published
- Featured blogs highlighted on homepage
- Slug-based blog routing

---

## 🛠 Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Blade Templates
- Bootstrap / Custom CSS
- File Storage (Laravel Storage system)

---

## 🗂 Database Overview

### Blogs Table
- title
- slug
- excerpt
- content
- image
- author
- status (pending, approved, rejected)
- featured
- timestamps

### Destinations Table
- name
- location
- price
- image
- featured
- timestamps

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/dechamps-tours.git
cd dechamps-tours
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
