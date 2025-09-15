<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MockAPIHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }

        .api-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .api-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.15);
        }

        .code-block {
            font-family: monospace;
            font-size: 0.85rem;
        }
    </style>
</head>

<body x-data="{ darkMode: false }" :class="{ 'dark': darkMode }"
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#FDFDFC] min-h-screen transition-colors duration-300">

    <!-- Dark Mode Toggle -->
    <button @click="darkMode = !darkMode"
        class="fixed top-5 right-5 px-3 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-lg shadow hover:scale-105 transition">
        <span x-show="!darkMode">🌙</span>
        <span x-show="darkMode">☀️</span>
    </button>

    <div class="container mx-auto px-4 py-10 max-w-6xl">
        <!-- Header -->
        <header class="mb-14 text-center">
            <h1 class="text-5xl font-extrabold mb-3 tracking-tight">🚀 MockAPIHub</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Comprehensive API documentation designed to help developers build faster with RESTful endpoints.
            </p>
        </header>

        <!-- Introduction Section -->
        <section class="mb-14 bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold mb-4">📖 Introduction</h2>
            <p class="mb-4 leading-relaxed">
                Welcome to the <strong>MockAPIHub</strong>. This platform offers a collection of
                ready-to-use,
                <span class="font-semibold">RESTful API endpoints</span> designed for learning, testing, and
                prototyping.
                Whether you’re building front-end applications, experimenting with API integrations, or validating your
                backend workflows, MockAPIHub provides consistent, reliable data without the need for authentication or
                private keys.
            </p>



            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <p class="font-medium">Base URL:</p>
                <code
                    class="code-block bg-gray-100 dark:bg-gray-600 p-2 rounded mt-2 inline-block">https://mockapihub.com/v1/</code>
            </div>
        </section>

        <!-- API Endpoints Section -->
        <section class="mb-14">
            <h2 class="text-2xl font-semibold mb-8 text-center">🔗 API Endpoints</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Products Endpoint -->
                <div
                    class="api-card bg-white/80 dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold">Products</h3>
                        <span
                            class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-sm font-medium">GET</span>
                    </div>
                    <p class="mb-4 text-gray-600 dark:text-gray-400">Retrieve a list of products or details of a
                        specific product.</p>
                    <div class="code-block bg-gray-100 dark:bg-gray-700 p-3 rounded-lg mb-4">
                        <span class="text-blue-600 dark:text-blue-400">GET</span> /api/products
                    </div>
                    <a href="{{ route('products.index') }}"
                        class="w-full block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        View Products
                    </a>
                </div>

                <!-- Books Endpoint -->
                <div
                    class="api-card bg-white/80 dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold">Books</h3>
                        <span
                            class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-sm font-medium">GET</span>
                    </div>
                    <p class="mb-4 text-gray-600 dark:text-gray-400">Access information about books in the collection.
                    </p>
                    <div class="code-block bg-gray-100 dark:bg-gray-700 p-3 rounded-lg mb-4">
                        <span class="text-blue-600 dark:text-blue-400">GET</span> /api/books
                    </div>
                    <a href="{{ route('books.index') }}"
                        class="w-full block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        View Books
                    </a>
                </div>

                <!-- Users Endpoint -->
                <div
                    class="api-card bg-white/80 dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold">Users</h3>
                        <span
                            class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-medium">POST</span>
                    </div>
                    <p class="mb-4 text-gray-600 dark:text-gray-400">Create a new user account or manage existing users.
                    </p>
                    <div class="code-block bg-gray-100 dark:bg-gray-700 p-3 rounded-lg mb-4">
                        <span class="text-green-600 dark:text-green-400">POST</span> /api/users
                    </div>
                    <a href="/api/users"
                        class="w-full block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        Manage Users
                    </a>
                </div>

                <!-- Orders Endpoint -->
                <div
                    class="api-card bg-white/80 dark:bg-gray-800/80 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold">Orders</h3>
                        <span
                            class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full text-sm font-medium">PUT</span>
                    </div>
                    <p class="mb-4 text-gray-600 dark:text-gray-400">Create, view, and manage customer orders.</p>
                    <div class="code-block bg-gray-100 dark:bg-gray-700 p-3 rounded-lg mb-4">
                        <span class="text-yellow-600 dark:text-yellow-400">PUT</span> /api/orders
                    </div>
                    <a href="/api/orders"
                        class="w-full block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        View Orders
                    </a>
                </div>
            </div>
        </section>

        <!-- Getting Started Section -->
        <section class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold mb-4">⚡ Getting Started</h2>
            <p class="mb-4">To use our API, you'll need to include your API key in the header of each request:</p>
            <div class="code-block bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto mb-4">
                <pre>Authorization: Bearer YOUR_API_KEY</pre>
            </div>
            <p>For more detailed documentation, check our <a href="/documentation"
                    class="text-blue-600 dark:text-blue-400 hover:underline">API Guide</a>.</p>
        </section>

        <!-- About Section -->
        <section class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl shadow-lg p-8 mt-4 mb-4">
            <h2 class="text-2xl font-semibold mb-4">ℹ️ About MockAPIHub</h2>
            <p class="mb-4 leading-relaxed">
                MockAPIHub is developed and maintained by a dedicated team of developers passionate about making API
                integration easier for everyone. Our goal is to provide a reliable, easy-to-use platform for developers
                to test and prototype their applications without the hassle of setting up their own backend.
            </p>
            <p class="leading-relaxed">
                We welcome contributions and feedback from the community. If you have suggestions or want to report an
                issue, please visit our <a href="https://github.com/henry2547/mockapihub"
                    class="text-blue-600 dark:text-blue-400 hover:underline">GitHub
                    repository</a>.
            </p>
            <p class="mb-4 leading-relaxed">
                -> With resources like <strong>Products</strong>, <strong>Books</strong>, <strong>Users</strong>, and
                <strong>Orders</strong>,
                developers can simulate real-world scenarios such as e-commerce platforms, library systems, or user
                management
                dashboards. Each endpoint supports <span class="font-semibold">CRUD operations</span> (Create, Read,
                Update, Delete)
                where applicable, and responses are returned in clean, developer-friendly <strong>JSON</strong> format.
            </p>

            <p class="mb-4 leading-relaxed">
                -> The main goal of MockAPIHub is to help you <span class="font-semibold">develop faster</span> without
                worrying about
                server setup, database seeding, or authentication barriers. You can focus on building your UI, testing
                API calls,
                or demonstrating project concepts, while relying on a stable mock backend that mimics real-world API
                behavior.
                It’s lightweight, free to use, and accessible to developers of all skill levels.
            </p>

            <p class="mb-4 leading-relaxed">
                -> Use MockAPIHub to <span class="font-semibold">prototype ideas quickly</span>,
                <span class="font-semibold">test API clients</span>,
                <span class="font-semibold">learn REST principles</span>,
                or <span class="font-semibold">showcase projects</span> without the complexity of managing a live
                backend.
            </p>
            <p class="mb-4 leading-relaxed">
                -> We hope MockAPIHub becomes a valuable tool in your development toolkit, enabling you to build and
                iterate
                faster than ever before. Happy coding!
            </p>
        </section>

        <section class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold mb-4">💡 Tips for Effective API Usage</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-400">
                <li><strong>Rate Limiting:</strong> Be mindful of our rate limits to avoid temporary bans. Check the
                    headers of API responses for your current usage.</li>
                <li><strong>Error Handling:</strong> Always implement error handling in your API calls to manage
                    unexpected responses gracefully.</li>
                <li><strong>Data Caching:</strong> Cache responses where appropriate to reduce latency and improve
                    performance.</li>
                <li><strong>Stay Updated:</strong> Follow our <a href="/changelog"
                        class="text-blue-600 dark:text-blue-400 hover:underline">changelog</a> for the latest updates
                    and
                    new features.</li>
            </ul>
        </section>
    </div>

    <!-- Footer -->
    <footer class="mt-14 py-6 text-center text-gray-600 dark:text-gray-400 text-sm">
        <p>© <?php echo date('Y'); ?> MockAPIHub. All rights reserved.</p>
    </footer>

</body>

</html>
