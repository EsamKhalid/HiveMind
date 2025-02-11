<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <script>
            window.listItems = @json($basketItems);
        </script>
    </head>

    <body>
        @include('layouts.navbar')

        <div class="flex flex-wrap lg:flex-nowrap" onload="populateBasket()">
            <div
                id="basket-items-wrapper"
                class="min-w-[700px] w-[100%] bg-yellow-50 text-3xl text-grey-300 rounded-lg p-10 m-10 mt-10 lg:w-[80%]"
            >
                <p class="text-6xl mt-10 mb-10">Basket</p>
                <ul id="items" onload="populateBasket()"></ul>
            </div>

            <div
                class="bg-yellow-50 text-3xl text-grey-300 rounded-lg ml-5 mt-10 mr-5 mb-10 flex-wrap min-w[160px] w-[100%] lg:w-max md:flex-nowrap md:p-10 lg:relative"
            >
                <div class="ml-5 mt-10">
                    <p>Items in basket:<span id="count"> </span></p>
                    <p>Total:</p>
                    <span id="total"></span>
                </div>
                <button
                    class="bg-yellow-400 hover:bg-yellow-500 rounded-lg mb-10 p-4 mr-5 ml-5 mt-10 w-full h-56 lg:h-24 text-7xl lg:text-3xl"
                    onClick="addCheckedItemsToCheckout()"
                >
                    GO TO CHECKOUT
                </button>
            </div>
        </div>

        <script>
            document.addEventListener(
                "DOMContentLoaded",
                function populateBasket() {
                    const listItems = window.listItems;

                    for (let i of listItems) {
                        const productID = i.product_id;

                        if (
                            !document.querySelector(
                                `#quantity-input-${productID}`
                            )
                        ) {
                            var item = document.createElement("li");
                            item.className =
                                "bg-yellow-200 rounded-lg mb-10 p-10 flex justify-between items-center xs:p-0";
                            item.id = `${productID}`;

                            item.innerHTML = `
                        <span class="item-img-text-link flex text-wrap">
                            <img class="w-[100px] h-[100px]" src="https://via.placeholder.com/130" width="130px" height="130px" alt="IMAGE" />
                            <div class="ml-3 max-w-[50%]">
                                <a class="text-3xl text-nowrap">${i.product_name}</a>
                                <p id="item-description" class="text-lg leading-5 w-[100%]">${i.description}</p>
                                <p id="item-price" class="text-lg font-bold leading-9">£${i.price}</p>
                            </div>
                        </span>
                        <div class="flex">
                            <form class="max-w-xs">
                                <div class="relative flex items-center max-w-[8rem]">
                                    <button type="button" onClick="loseOne(${productID})"
                                        class="w-[40px] bg-yellow-100 hover:bg-yellow-200 border rounded-s-lg p-3 h-11">-</button>
                                    <input type="text" id="quantity-input-${productID}" value="${i.quantity}"
                                        class="w-[70px] text-center" readonly />
                                    <button type="button" onClick="addOne(${productID})"
                                        class="w-[40px] bg-yellow-100 hover:bg-yellow-200 border rounded-e-lg p-3 h-11">+</button>
                                </div>
                            </form>
                            <input type="checkbox" checked="true" onclick="getTotal()"
                                class="isinOrder bg-yellow-100 border ml-8 mt-auto mb-auto" />
                        </div>
                    `;
                            document.getElementById("items").append(item);
                        }
                    }
                    getTotal();
                }
            );

            function addOne(id) {
                const input = document.getElementById(`quantity-input-${id}`);
                let value = parseInt(input.value);
                input.value = value + 1;
                getTotal();
            }

            function loseOne(id) {
                const input = document.getElementById(`quantity-input-${id}`);
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
                getTotal();
            }

            function getTotal() {
                const checkedElements =
                    document.querySelectorAll(".isinOrder:checked");
                let sum = 0;
                let itemcount = 0;

                checkedElements.forEach((e) => {
                    const parent = e.closest("li");
                    const price = parseFloat(
                        parent
                            .querySelector("#item-price")
                            .innerText.substring(1)
                    );
                    const quantity = parseInt(
                        parent.querySelector('[id^="quantity-input"]').value
                    );
                    itemcount += quantity;
                    sum += price * quantity;
                });

                document.getElementById("total").innerText =
                    new Intl.NumberFormat("en-GB", {
                        style: "currency",
                        currency: "GBP",
                    }).format(sum);
                document.getElementById("count").innerText = " " + itemcount;
            }

            function addCheckedItemsToCheckout() {
                const checkedElements =
                    document.querySelectorAll(".isinOrder:checked");
                let elements = [];
                checkedElements.forEach((e) => elements.push(e.closest("li")));
                console.log(elements);
            }
        </script>
    </body>
</html>
