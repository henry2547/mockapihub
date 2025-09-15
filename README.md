
# MockAPIHub

MockAPIHub is a **mock RESTful API service** that provides ready-to-use endpoints for developers to **learn, test, and prototype** without worrying about backend setup.  

With MockAPIHub, you can quickly simulate real-world scenarios such as e-commerce platforms, library systems, or user management dashboards — all powered by mock data that follows REST standards.

---

## 🚀 Features

- ✅ **Ready-to-use REST endpoints** (Products, Books, Users, Orders, etc.)  
- ✅ **CRUD support** (Create, Read, Update, Delete) where applicable  
- ✅ **JSON responses** for easy integration  
- ✅ **No authentication required** – start testing instantly  
- ✅ **Perfect for learning, prototyping, and demos**  

---

## 📌 Base URL

All API requests are made to:  

```

[https://mockapihub.com/](https://mockapihub.com/)

````

---

## 📂 Available Endpoints

| Resource   | Method | Endpoint         | Description                               |
|------------|--------|------------------|-------------------------------------------|
| Products   | GET    | `/api/products`  | Retrieve all products or a single product |
| Books      | GET    | `/api/books`     | Retrieve all books or details of one      |
| Users      | POST   | `/api/users`     | Create or manage users                    |
| Orders     | PUT    | `/api/orders`    | Create, update, or manage orders          |

---

## 🔑 Authentication

Most endpoints are public and require **no authentication**.  
If using an API key, pass it in the request header:  

```http
Authorization: Bearer YOUR_API_KEY
````

---

## 📖 Getting Started

1. Clone the repository:

   ```bash
   git clone https://github.com/henry2547/mockapihub.git
   cd mockapihub
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Set up your `.env` file and run migrations:

   ```bash
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   ```

4. Start the development server:

   ```bash
   php artisan serve
   ```

Now you can visit [http://localhost:8000](http://localhost:8000) to explore the docs UI.

---

## 🎯 Why Use MockAPIHub?

* 🔹 Learn **API integration** without backend complexity
* 🔹 Prototype ideas quickly with **realistic endpoints**
* 🔹 Test applications that require API calls
* 🔹 Great for **students, frontend developers, and demos**

---

## 🛠️ Tech Stack

* [Laravel](https://laravel.com/) – backend framework
* [Blade](https://laravel.com/docs/blade) – templating engine
* [Tailwind CSS](https://tailwindcss.com/) – modern UI styling
* RESTful API design principles

---

## 🤝 Contributing

Contributions are welcome! If you’d like to fix a bug or suggest a feature:

1. Fork the repo
2. Create a new branch (`git checkout -b feature-branch`)
3. Commit your changes
4. Push and open a Pull Request

---

## 📜 License

This project is licensed under the **MIT License** – free to use and modify.

---

💡 Built with ❤️ for developers who want to move fast without backend friction.

```

---


