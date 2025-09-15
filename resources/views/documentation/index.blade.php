<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MockAPIHub Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4361ee',
                        secondary: '#3f37c9',
                        accent: '#4895ef',
                        dark: '#1e1e2c',
                        light: '#f8f9fa'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-10">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="bg-primary p-2 rounded-lg mr-3">
                    <i class="fas fa-code text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-dark">MockAPIHub</h1>
            </div>

            <div class="hidden md:flex space-x-4">
                <a href="{{ route('welcome') }}" class="px-3 py-2 text-gray-600 hover:text-primary">Home</a>
                <a href="{{ route('products.index') }}" class="px-3 py-2 text-gray-600 hover:text-primary">Products</a>
                <a href="{{ route('books.index') }}" class="px-3 py-2 text-gray-600 hover:text-primary">Books</a>
                <a href="{{ route('users.index') }}" class="px-3 py-2 text-gray-600 hover:text-primary">Users</a>
            </div>

            <button class="md:hidden text-gray-600">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-primary to-secondary text-white rounded-xl p-8 mb-12 shadow-lg">
            <div class="max-w-2xl">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">API Documentation</h2>
                <p class="text-lg opacity-90">Explore our dummy API endpoints for testing and development purposes. All endpoints support CORS and are completely free to use.</p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-plug mr-2"></i> RESTful API
                    </div>
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-database mr-2"></i> JSON Responses
                    </div>
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full text-sm">
                        <i class="fas fa-lock-open mr-2"></i> No API Key Required
                    </div>
                </div>
            </div>
        </section>

        <!-- Products API -->
        <section id="products" class="mb-12 scroll-mt-16">
            <div class="flex items-center mb-6">
                <div class="bg-primary w-12 h-12 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-box-open text-white text-xl"></i>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-dark">Products API</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Get all products -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-primary">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get all products</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/products</code>
                    <p class="text-gray-600 mt-3">Retrieve a list of all available products with optional pagination and filtering.</p>
                </div>

                <!-- Get single product -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-primary">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get single product</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/products/&#123;id&#125;</code>
                    <p class="text-gray-600 mt-3">Retrieve detailed information about a specific product by its ID.</p>
                </div>

                <!-- Get by category -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-primary">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get products by category</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/products/category/&#123;category&#125;</code>
                    <p class="text-gray-600 mt-3">Filter products by a specific category name.</p>
                </div>

                <!-- Query parameters -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-accent md:col-span-2">
                    <h3 class="text-lg font-semibold mb-4">Query Parameters</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100 text-left">
                                <tr>
                                    <th class="p-3">Parameter</th>
                                    <th class="p-3">Description</th>
                                    <th class="p-3">Default</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">page</td>
                                    <td class="p-3">Page number for pagination</td>
                                    <td class="p-3">1</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">per_page</td>
                                    <td class="p-3">Items per page</td>
                                    <td class="p-3">15</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">category</td>
                                    <td class="p-3">Filter by category</td>
                                    <td class="p-3">-</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-mono">sort_by</td>
                                    <td class="p-3">Field to sort by</td>
                                    <td class="p-3">id</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-mono">sort_order</td>
                                    <td class="p-3">Sort order (asc/desc)</td>
                                    <td class="p-3">asc</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Books API -->
        <section id="books" class="mb-12 scroll-mt-16">
            <div class="flex items-center mb-6">
                <div class="bg-purple-500 w-12 h-12 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-book text-white text-xl"></i>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-dark">Books API</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Get all books -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get all books</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/books</code>
                    <p class="text-gray-600 mt-3">Retrieve a list of all available books with details.</p>
                </div>

                <!-- Get single book -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get single book</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/books/&#123;id&#125;</code>
                    <p class="text-gray-600 mt-3">Retrieve detailed information about a specific book by its ID.</p>
                </div>

                <!-- Get by author -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 md:col-span-2">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get books by author</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/books/author/&#123;author&#125;</code>
                    <p class="text-gray-600 mt-3">Filter books by a specific author name.</p>
                </div>
            </div>
        </section>

        <!-- Users API -->
        <section id="users" class="mb-12 scroll-mt-16">
            <div class="flex items-center mb-6">
                <div class="bg-pink-500 w-12 h-12 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-dark">Users API</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Get all users -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-500">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get all users</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/json/users</code>
                    <p class="text-gray-600 mt-3">Retrieve a list of all users with basic information.</p>
                </div>

                <!-- Get single user -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-500">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold">Get single user</h3>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">GET</span>
                    </div>
                    <code class="bg-gray-100 text-gray-800 p-2 rounded-md text-sm w-full block">/api/json/users/&#123;id&#125;</code>
                    <p class="text-gray-600 mt-3">Retrieve detailed information about a specific user by their ID.</p>
                </div>
            </div>
        </section>

        <!-- Example Response -->
        <section class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-dark mb-6">Example Response</h2>
            <div class="bg-gray-900 text-gray-200 p-5 rounded-xl overflow-x-auto">
                <pre><code class="text-sm">
{
  "data": [
    {
      "id": 1,
      "name": "Product One",
      "category": "electronics",
      "price": 99.99,
      "inStock": true
    },
    {
      "id": 2,
      "name": "Product Two",
      "category": "books",
      "price": 19.99,
      "inStock": false
    }
  ],
  "meta": {
    "page": 1,
    "per_page": 15,
    "total_pages": 4,
    "total_items": 52
  }
}
                </code></pre>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold">MockAPIHub</h3>
                    <p class="text-gray-400">For testing and development purposes</p>
                </div>
                <div class="flex space-x-4">
                    <a href="https://github.com/henry2547" class="text-gray-400 hover:text-white">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                    <a href="https://twitter.com/njue_unruly" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="mailto:henrynjue255@gmail.com" class="text-gray-400 hover:text-white">
                        <i class="fas fa-envelope text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400 text-sm">
                <p>© <?php echo date("Y"); ?> MockAPIHub. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
