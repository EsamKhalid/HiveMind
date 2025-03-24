<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Inventory Product</title>
        <link rel="icon" href="/favicon.ico" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    </head>

    <body class="transition-none bg-stone-200 dark:bg-stone-900 w-full">
        @include('layouts.sidebar')
        <header
            class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none"
        >
            <div class="max-w-7xl mx-auto text-center">
                <h1
                    class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000"
                >
                    <i class="fa-solid fa-edit text-yellow-500 text-4xl"></i>
                    Edit Product
                </h1>
                <p
                    class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000"
                >
                    Update product details in the inventory.
                </p>
            </div>
        </header>

        <div class="container mx-auto p-6">
            <div class="bg-white dark:bg-stone-700 p-6 rounded-lg shadow-md">
                <form
                    action="{{ route('admin.inventory.update', $product->id) }}"
                    method="POST"
                >
                    @csrf @method('PATCH')

                    <div class="mb-4">
                        <label
                            for="product_name"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Product Name</label
                        >
                        <input
                            type="text"
                            name="product_name"
                            id="product_name"
                            value="{{ $product->product_name }}"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="price"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Price (£)</label
                        >
                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="{{ $product->price }}"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="stock_level"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Stock Level</label
                        >
                        <input
                            type="number"
                            name="stock_level"
                            id="stock_level"
                            value="{{ $product->stock_level }}"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="product_type"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Product Type</label
                        >
                        <select
                            name="product_type"
                            id="product_type"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                        >
                            <option value="beauty" {{ $product->
                                product_type == 'beauty' ? 'selected' : ''
                                }}>Beauty
                            </option>
                            <option value="health" {{ $product->
                                product_type == 'health' ? 'selected' : ''
                                }}>Health
                            </option>
                            <option value="haircare" {{ $product->
                                product_type == 'haircare' ? 'selected' : ''
                                }}>Haircare
                            </option>
                            <option value="skincare" {{ $product->
                                product_type == 'skincare' ? 'selected' : ''
                                }}>Skincare
                            </option>
                            <option value="body" {{ $product->
                                product_type == 'body' ? 'selected' : '' }}>Body
                            </option>
                            <option value="merchandise" {{ $product->
                                product_type == 'merchandise' ? 'selected' : ''
                                }}>Merchandise
                            </option>
                            <option value="home" {{ $product->
                                product_type == 'home' ? 'selected' : '' }}>Home
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label
                            for="description"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Description</label
                        >
                        <textarea
                            name="description"
                            id="description"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                            >{{ $product->description }}</textarea
                        >
                    </div>

                    <div class="mb-4">
                        <label
                            for="ingredients"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Ingredients</label
                        >
                        <textarea
                            name="ingredients"
                            id="ingredients"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                            >{{ $product->ingredients }}</textarea
                        >
                    </div>

                    <div class="mb-4">
                        <label
                            for="recipes"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Recipes</label
                        >
                        <textarea
                            name="recipes"
                            id="recipes"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                            >{{ $product->recipes }}</textarea
                        >
                    </div>

                    <div class="mb-4">
                        <label
                            for="directions"
                            class="block text-stone-700 dark:text-yellow-200"
                            >Directions</label
                        >
                        <textarea
                            name="directions"
                            id="directions"
                            class="w-full p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-stone-900 dark:text-yellow-200"
                            >{{ $product->directions }}</textarea
                        >
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-400"
                        >
                            Update Product
                        </button>
                    </div>
                </form>
                <form
                    action="{{ route('admin.inventory.delete', $product->id) }}"
                    method="POST"
                >
                    @csrf @method('DELETE')
                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-400"
                    >
                        Delete Product
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
