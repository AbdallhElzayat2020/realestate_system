# Bazigha — Corporate & Real Estate Website

A modern, bilingual (English & Arabic) Laravel website with a full admin dashboard. Built for **Bazigha**, a Saudi real estate and development company based in Riyadh.

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat-square&logo=bootstrap)

---

## Features

### Public website (frontend)
- **Bilingual**: Full Arabic (RTL) and English with locale switching
- **Pages**: Home, About Us, Services, Projects, Blogs, Contact
- **Services**: List and detail pages with thumbnails/banners
- **Projects**: Gallery, map integration, image lightbox
- **Blogs**: List, single post, related articles
- **Contact**: Contact form and info (phone, email, address from config)
- **Testimonials**: Customer reviews slider on homepage
- **Partners**: Success partners section
- **Unified design**: Consistent inner-page headers and section styling
- **Responsive**: Mobile-friendly layout

### Admin dashboard
- **Auth**: Login / logout (no registration)
- **Contacts**: View and delete contact messages
- **Services**: CRUD with thumbnail & banner, slug, EN/AR content
- **Projects**: CRUD with gallery images, map, category, status
- **Blogs**: CRUD with featured image, EN/AR content
- **Partners**: CRUD with logo and link
- **Testimonials**: CRUD with name, role, content, image, order
- **Categories**: For projects (optional)
- **Products**: CRUD (optional in menu)
- **Quotes / FAQs / Job applications**: Available via routes; sidebar links can be shown or hidden from code
- **Profile**: Edit admin profile
- **UI**: English-only interface; form placeholders indicate (Arabic) where relevant

### Technical
- **Translations**: Spatie Translatable (EN/AR) for services, projects, blogs, etc.
- **Localization**: `mcamara/laravel-localization` for URLs and locale
- **Site config**: Centralized phone, email in `config/site.php`
- **Assets**: Custom CSS, Bootstrap 5, Font Awesome, Summernote (WYSIWYG in dashboard)

---

## Requirements

- PHP 8.2+
- Composer
- MySQL 8.x or MariaDB
- Node.js 18+ (optional, for Vite if you use it)

---

## Installation

### 1. Clone and install PHP dependencies

```bash
git clone <repository-url> bazigha
cd bazigha
composer install
```

### 2. Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set at least:

- `APP_NAME`, `APP_URL`
- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- Optional: `SITE_PHONE`, `SITE_PHONE_TEL`, `SITE_EMAIL` (or use defaults in `config/site.php`)

### 3. Database

```bash
php artisan migrate
```

Optional: seed admin user if you have a seeder:

```bash
php artisan db:seed
```

### 4. Storage link

```bash
php artisan storage:link
```

### 5. Run the app

```bash
php artisan serve
```

- **Website**: [http://localhost:8000](http://localhost:8000)  
- **Dashboard**: [http://localhost:8000/admin](http://localhost:8000/admin) (login required)

---

## Project structure (main parts)

```
app/
├── Http/Controllers/
│   ├── Dashboard/          # Admin: Contacts, Services, Projects, Blogs, etc.
│   └── Website/           # Front: Home, About, Services, Projects, Blogs, Contact
├── Models/                # Contact, Service, Project, Blog, Partner, Testimonial, Category, Product, etc.
config/
├── site.php               # Site phone, email (single source for footer/header/contact)
lang/
├── ar/                    # Arabic translations (header, footer, home, about, etc.)
└── en/                    # English translations
resources/views/
├── website/               # Public layout, pages (home, about, services, projects, blogs, contact)
└── dashboard/             # Admin layout, sidebar, CRUD views
routes/
├── web.php                # Website routes (localized)
└── dashboard.php          # Admin routes (auth middleware)
public/
└── assets/website/        # CSS, images
```

---

## Configuration

| Key | Purpose |
|-----|--------|
| `config/site.php` | `phone`, `phone_tel`, `email` — used in header, footer, contact pages |
| `APP_LOCALE` | Default locale (`en` or `ar`) |
| Supported locales | Defined in `config/laravellocalization.php` (e.g. `en`, `ar`) |

---

## Dashboard sidebar

Visible by default:

- Dashboard (home)
- Contacts
- Services
- Projects
- Blogs
- Partners
- Testimonials

Categories and Products can be shown/hidden by uncommenting/commenting their blocks in `resources/views/dashboard/layouts/sidebar.blade.php`.  
Quotes, FAQs, and Job Applications are commented out in the sidebar but routes remain available (e.g. `/admin/quotes`, `/admin/faqs`, `/admin/job-applications`) if you need them.

---

## License

Proprietary / All rights reserved.

---

## Credits

- **Laravel** — [laravel.com](https://laravel.com)
- **Bootstrap** — [getbootstrap.com](https://getbootstrap.com)
- **Spatie Translatable** — [github.com/spatie/laravel-translatable](https://github.com/spatie/laravel-translatable)
- **Mcamara Laravel Localization** — [github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)
