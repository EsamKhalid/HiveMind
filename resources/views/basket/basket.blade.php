<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script>

    function addOne(id) {
        const quantity = document.getElementById(`quantity-input-${id}`)
        quantity.value = parseInt(quantity.value) + 1;
        getTotal();
    }
    function loseOne(id) {
        const quantity = document.getElementById(`quantity-input-${id}`)
        quantity.value = Math.max(0, parseInt(quantity.value) - 1);
        getTotal();
    }
    function getTotal() {
        const checkedElements = document.getElementsByClassName('isinOrder');
        let count = 0;
        var sum = 0;
        let itemcount = 0;
        for (let e of checkedElements) {
            
            count += 1
            if (count == 0) {
                document.getElementById('total').innerText = "£0.00";
            } else {
                if (e.checked) {
                    var priceText = e.parentElement.querySelector('#item-price').innerText;
                    var quantityText = e.parentElement.querySelector('.quantity-input').value;

                    let price = parseFloat(priceText.substring(1));
                    let quantity = parseInt(quantityText);
                    itemcount += quantity
                    sum += price * quantity;
                    document.getElementById('total').innerText = new Intl.NumberFormat('en-GB', { style: 'currency', currency: 'GBP' }).format(sum);
                    document.getElementById('count').innerText = " " + itemcount.toString()
                    console.log(sum)
                    console.log(quantity)
                    console.log(price)
                }else{
                    count -=1
                }
            }
        }

    }
</script>

<body onload="getTotal()">
    @include('layouts.navbar')



    <div class="flex flex-wrap lg:flex-nowrap">
        <div id="basket-items-wrapper"
            class="min-w-[700px] w-[100%] bg-yellow-300 text-3xl text-white rounded-lg p-10 m-10 mt-10 lg:w-[80%]">
            <p class="text-6xl mt-10 mb-10">Basket</p>
            <ul id="items" >
                <li class="bg-amber rounded-lg mb-10 p-10 flex justify-between">
                    <div class="item-img-text-link"><a><img />item</a></div>
                    <!-- FORM FOR QTY BUTTONS -->
                    <form class="max-w-xs">
                        <div class="relative flex items-center max-w-[8rem]">

                            <button type="button" onClick="loseOne()" id="decrement-button"
                                data-input-counter-decrement="quantity-input"
                                class="bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-s-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-700 focus:ring-2 focus:outline-none">

                                <!-- minus icon -->
                                <svg class="w-3 h-3 text-yellow-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>

                            </button>
                            <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="50" aria-describedby="helper-text-explanation"
                                class="bg-yellow-50 border-x-0 border-yellow-300 h-11 text-center text-yellow-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-yellow-700 dark:border-yellow-600 dark:placeholder-yellow-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1" value="1" required />

                            <!-- DATABASE REQUIRED FOR VALUE -->
                            <button type="button" onClick="addOne()" id="increment-button"
                                data-input-counter-increment="quantity-input"
                                class="bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-e-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-700 focus:ring-2 focus:outline-none">

                                <!--plus icon -->
                                <svg class="w-3 h-3 text-yellow-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </li>
                <li class="bg-amber rounded-lg mb-10 p-10 flex justify-between items-center xs:p-0">
                    <span class="item-img-text-link flex text-wrap mr-10"><img class="w-[100px] h-[100px]"
                            src="https://www.kurin.com/wp-content/uploads/placeholder-square-300x300.jpg" width="130px"
                            height="130px" alt="IMAGE" />
                        <div class="ml-3 max-w-[50%]"><a class="text-2xl">ItemNamePlaceHolder</a>
                            <p id="item-description" class="text-base leading-5">item description - Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit. In eu commodo neque. Duis ut dui non arcu mollis
                                vehicula et nec orci.</p>
                            <p id="item-price" class="text-base font-bold leading-9">£12.99</p>
                        </div>
                    </span>
                    <!-- FORM FOR QTY BUTTONS -->
                    <form class="max-w-xs">
                        <div class="relative flex items-center max-w-[8rem]">

                            <button type="button" onClick="loseOne('basket-item-1')" id="decrement-button"
                                data-input-counter-decrement="basket-item-1"
                                class="w-[40px] bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-s-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-700 focus:ring-2 focus:outline-none">

                                <!-- minus icon -->
                                <svg class="w-3 h-3 text-yellow-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>

                            </button>
                            <input type="text" id="quantity-input-basket-item-1" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="50" aria-describedby="helper-text-explanation"
                                class="quantity-input w-[70px] bg-yellow-50 border-x-0 border-yellow-300 h-11 text-center text-yellow-900 text-sm focus:ring-blue-500 focus:border-blue-500 block py-2.5 dark:bg-yellow-700 dark:border-yellow-600 dark:placeholder-yellow-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1" value="1" required />

                            <!-- DATABASE REQUIRED FOR VALUE -->
                            <button type="button" onClick="addOne('basket-item-1') " id="increment-button"
                                data-input-counter-increment="basket-item-1"
                                class="w-[40px] bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-e-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-700 focus:ring-2 focus:outline-none">

                                <!--plus icon -->
                                <svg class="w-3 h-3 text-yellow-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <input type="checkbox" checked="true" onclick="getTotal()"
                        class="isinOrder bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border checked:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-700 ml-8" />
                </li>
                <li class="bg-amber rounded-lg mb-10 p-10 flex justify-between items-center xs:p-0">
                    <span class="item-img-text-link flex text-wrap"><img class="w-[100px] h-[100px]"
                            src="https://www.kurin.com/wp-content/uploads/placeholder-square-300x300.jpg" width="130px"
                            height="130px" alt="IMAGE" />
                        <div class="ml-3 max-w-[50%]"><a class="text-2xl">ItemNamePlaceHolder</a>
                            <p id="item-description" class="text-base leading-5">item description - Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit. In eu commodo neque. Duis ut dui non arcu mollis
                                vehicula et nec orci.</p>
                            <p id="item-price" class="text-base font-bold leading-9">£33.33</p>
                        </div>
                    </span>
                    <!-- FORM FOR QTY BUTTONS -->
                    <form class="max-w-xs">
                        <div class="relative flex items-center max-w-[8rem]">

                            <button type="button" onClick="loseOne('basket-item-2')" id="decrement-button"
                                data-input-counter-decrement="basket-item-2"
                                class="w-[40px] bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-s-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-700 focus:ring-2 focus:outline-none">

                                <!-- minus icon -->
                                <svg class="w-3 h-3 text-yellow-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>

                            </button>
                            <input type="text" id="quantity-input-basket-item-2" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="50" aria-describedby="helper-text-explanation"
                                class="quantity-input w-[70px] bg-yellow-50 border-x-0 border-yellow-300 h-11 text-center text-yellow-900 text-sm focus:ring-blue-500 focus:border-blue-500 block py-2.5 dark:bg-yellow-700 dark:border-yellow-600 dark:placeholder-yellow-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1" value="1" required />

                            <!-- DATABASE REQUIRED FOR VALUE -->
                            <button type="button" onClick="addOne('basket-item-2')" id="increment-button"
                                data-input-counter-increment="basket-item-2"
                                class="w-[40px] bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-e-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-700 focus:ring-2 focus:outline-none">

                                <!--plus icon -->
                                <svg class="w-3 h-3 text-yellow-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <input type="checkbox" checked="true" onclick="getTotal()"
                        class="isinOrder bg-yellow-100 dark:bg-yellow-700 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border checked:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-700 ml-8" />
                </li>
            </ul>
        </div>
        <div
            class=" bg-yellow-300 text-3xl text-white rounded-lg  ml-5 mt-10 mr-5 mb-10 flex-wrap min-w[160px] w-[100%] lg:w-max md:flex-nowrap md:p-10 lg:relative ">
            <div class="ml-5 mt-10">
                <p>Items in basket:<span id="count"> </span></p>
                <p>Total:</p>
                <span id="total"></span>
            </div>

            <button class="bg-amber rounded-lg mb-10 p-4 mr-5 ml-5 mt-10 w-full h-56 lg:h-24 text-7xl lg:text-3xl "> GO TO
                CHECKOUT</button>

        </div>
    </div>

    </div>

</body>

</html>