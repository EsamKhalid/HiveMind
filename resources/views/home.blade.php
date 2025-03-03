<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="transition-all ease-in-out duration-1000 transform bg-yellow-50 dark:bg-stone-700 dark:text-white">
        @include('layouts.navbar')

        <main>
            <!-- added a backdrop -->
            <section
                class="bg-white py-40 bg-cover bg-center"
                style="background-image: url('{{
                    asset('../Images/hd bee backdrop lols.jpeg')
                }}');"
            >
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-4xl font-bold text-white mb-4">
                        Welcome to HiveMind
                    </h1>
                    <p class="text-white text-lg mb-8">
                        Bee a part of a kinder world with one click
                    </p>
                    <button
                        class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700"
                    >
                        <a href="{{ route('products') }}">Shop Now</a>
                    </button>
                    <button
                        class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700"
                    >
                        <a href="{{ route('about') }}">Learn More About Us</a>
                    </button>
                </div>
            </section>

            <section class="border-blue-100 py-20 text-center">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold mb-5">
                        Help our mission to save the bees
                    </h2>
                    <p class="text-lg mb-3">
                        100% natural ingredients, cruelty-free and sweet like
                        honey.
                    </p>
                    <p class="text-lg mb-3">
                        With your contribution, our bees can continue to keep
                        the world spinning.
                    </p>
                    <p class="text-lg mb-6">
                        Browse our wide range of products below and be(e) a
                        star.
                    </p>
                </div>
            </section>

            <section class="py-12">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl font-bold mb-6">
                        Shop our products by category
                    </h2>
                    <!-- 5 columns to display 5 categories -->
                    <!-- when user clicks on category, it leads to a filtered products page for respective category // yet to be implemented -->
                    <form action="{{ route('products') }}" method="get">
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3"
                        >
                            <button
                                value="Health"
                                name="categoryButton"
                                class="category"
                            >
                                <div class="bg-white rounded-lg shadow-md">
                                    <img
                                        src="{{
                                            asset('../Images/categories/healthcare.png')

                                        }}"
                                        alt="Health"
                                        class="w-full h-64 object-cover rounded-t-lg"
                                    />
                                    <div class="p-4">
                                        <h3
                                            class="text-lg font-medium text-gray-900"
                                        >
                                            Health
                                        </h3>
                                    </div>
                                </div>
                            </button>

                            <button
                                value="Skincare"
                                name="categoryButton"
                                class="category"
                            >
                                <div class="bg-white rounded-lg shadow-md">
                                    <img
                                        src="{{
                                            asset('../Images/categories/skincare.png')
                                        }}"
                                        alt="Skincare"
                                        class="w-full h-64 object-cover rounded-t-lg"
                                    />
                                    <div class="p-4">
                                        <h3
                                            class="text-lg font-medium text-gray-900"
                                        >
                                            Skincare
                                        </h3>
                                    </div>
                                </div>
                            </button>

                            <button
                                value="Beauty"
                                name="categoryButton"
                                class="category"
                            >
                                <div class="bg-white rounded-lg shadow-md">
                                    <img
                                        src="{{
                                            asset('../Images/categories/beauty.png')
                                        }}"
                                        alt="Beauty"
                                        class="w-full h-64 object-cover rounded-t-lg"
                                    />
                                    <div class="p-4">
                                        <h3
                                            class="text-lg font-medium text-gray-900"
                                        >
                                            Beauty
                                        </h3>
                                    </div>
                                </div>
                            </button>

                            <button
                                value="Haircare"
                                name="categoryButton"
                                class="category"
                            >
                                <div class="bg-white rounded-lg shadow-md">
                                    <img
                                        src="{{
                                            asset('../Images/categories/haircare.png')

                                        }}"
                                        alt="Haircare"
                                        class="w-full h-64 object-cover rounded-t-lg"
                                    />
                                    <div class="p-4">
                                        <h3
                                            class="text-lg font-medium text-gray-900"
                                        >
                                            Haircare
                                        </h3>
                                    </div>
                                </div>
                            </button>

                            <button
                                value="Merchandise"
                                name="categoryButton"
                                class="category"
                            >
                                <div class="bg-white rounded-lg shadow-md">
                                    <img
                                        src="{{
                                            asset('../Images/categories/hivemind logo.png')

                                        }}"
                                        alt="Merchandise"
                                        class="w-full h-64 object-cover rounded-t-lg"
                                    />
                                    <div class="p-4">
                                        <h3
                                            class="text-lg font-medium text-gray-900"
                                        >
                                            Merchandise
                                        </h3>
                                    </div>
                                </div>
                            </button>
                            
                        </div>
                    </form>
                </div>
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>
