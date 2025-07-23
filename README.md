# Mastermind Gadgets

Mastermind Gadgets is a modern full-stack e-commerce platform for gadgets and accessories, built with Laravel, Inertia.js, and Vue.js.

## Features
- Beautiful, responsive landing page
- Product and category management (CRUD)
- User authentication and profile management
- Shopping cart and checkout (coming soon)
- Admin dashboard (coming soon)
- Newsletter signup, testimonials, and trust badges
- Modern UI with Tailwind CSS

## Tech Stack
- **Backend:** Laravel
- **Frontend:** Vue.js (via Inertia.js)
- **Styling:** Tailwind CSS
- **Database:** MySQL (or compatible)

## Getting Started

1. **Clone the repository:**
   ```bash
   git clone <your-repo-url>
   cd <project-directory>
   ```
2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```
3. **Copy and configure your environment:**
   ```bash
   cp .env.example .env
   # Edit .env as needed
   php artisan key:generate
   ```
4. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```
5. **Start the development servers:**
   ```bash
   npm run dev
   php artisan serve
   ```
6. **Visit your app:**
   - Backend: http://localhost:8000
   - Frontend (Vite): http://localhost:5173

## Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](LICENSE)
