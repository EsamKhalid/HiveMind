<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script>

    const listItems = [
        {
            id: 't45',
            name: 'Tumbler',
            price: '12.99',
            quantity: 1,
            description: "item description - Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu commodo neque. Duis ut dui non arcu mollisvehicula et nec orci",
            img: 'https://www.kurin.com/wp-content/uploads/placeholder-square-300x300.jpg'
        },
        {
            id: 'treem5',
            name: 'Phone Case',
            price: '12.00',
            quantity: 10,
            description: 'FORTNITE!',
            img: 'https://eatyourphoto.co.uk/wp-content/uploads/2023/08/fortnite-square-topper-600x600.jpg',
        },
        {
            id: 'trem7',
            name: 'Phone Case',
            price: '12.00',
            quantity: 1,
            description: 'FORTNITE!',
            img: 'https://eatyourphoto.co.uk/wp-content/uploads/2023/08/fortnite-square-topper-600x600.jpg',
        }
    ]

    document.addEventListener('DOMContentLoaded', function populateBasket() {
        for (let i of listItems) {
            if (!document.querySelector(`#quantity-input-${i.id}`)) {
                var item = document.createElement('li');
                item.className = 'bg-yellow-200 rounded-lg mb-10 p-10 flex justify-between items-center xs:p-0';
                item.id = `${i.id}`
                item.innerHTML =
                    `<span class="item-img-text-link flex text-wrap"><img class="w-[100px] h-[100px]"
                            src=${i.img} width="130px"
                            height="130px" alt="IMAGE" />
                        <div class="ml-3 max-w-[50%]"><a id='item-name'class="text-3xl text-nowrap">${i.name}</a>
                            <p id="item-description" class="text-lg leading-5 w-[100%]">${i.description}</p>
                            <p id="item-price" class="text-lg font-bold leading-9">£${i.price}</p>
                        </div>
                    </span>
                    <!-- FORM FOR QTY BUTTONS -->
                    <div class="flex">
                    <form class="max-w-xs">
                        <div class="relative flex items-center max-w-[8rem]">

                            <button type="button" onClick="loseOne(${i.id})" id="decrement-button"
                                data-input-counter-decrement="${i.id}"
                                class="w-[40px] bg-yellow-100 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-s-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-500 focus:ring-2 focus:outline-none">

                                <!-- minus icon -->
                                <svg class="w-3 h-3 text-white dark:text-grey-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            
                            <input type="text" id="quantity-input" data-input-counter
                                data-input-counter-min="1" data-input-counter-max="50"
                                aria-describedby="helper-text-explanation"
                                class="quantity-input w-[70px] bg-yellow-50 border-x-0 border-yellow-300 h-11 text-center text-white text-sm focus:ring-blue-500 focus:border-blue-500 block py-2.5 dark:bg-yellow-500 dark:border-yellow-600 dark:placeholder-yellow-400 dark:text-grey-300 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="${i.quantity}" value="1" required />

                            <!-- DATABASE REQUIRED FOR VALUE -->
                            <button type="button" onClick="addOne(${i.id})" id="increment-button"
                                data-input-counter-increment="${i.id}"
                                class="w-[40px] bg-yellow-100 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border border-yellow-300 rounded-e-lg p-3 h-11 focus:ring-yellow-100 dark:focus:ring-yellow-500 focus:ring-2 focus:outline-none">

                                <!--plus icon -->
                                <svg class="w-3 h-3 text-white dark:text-grey-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                        
                    </form>
                    <input type="checkbox" checked="true" onclick="getTotal()"
                        class="isinOrder bg-yellow-100 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:border-yellow-600 hover:bg-yellow-200 border checked:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 ml-8 mt-auto mb-auto" />
                    </div>
                    `
                document.getElementById("items").append(item);
                console.log(item)
            } else {
                console.log('WORKS!')
            }
        }
        getTotal()

    }, false);

    function addOne(id) {
        const elementname = id
        console.log(elementname)
        const quantity = elementname.querySelector('#quantity-input')
        quantity.value = parseInt(quantity.value) + 1;
        getTotal();
    }
    function loseOne(id) {
        const elementname = id
        const quantity = elementname.querySelector('#quantity-input')
        quantity.value = parseInt(quantity.value) - 1;
        if (quantity.value <= 0) {
            id.remove()
        }
        getTotal();
    }
    function getTotal() {
        const checkedElements = document.getElementsByClassName('isinOrder');
        let count = 0;
        var sum = 0;
        let itemcount = 0;
        let records = []
        for (let e of checkedElements) {
            console.log(e.parentElement);
            count += 1
            if (count == 0) {
                document.getElementById('total').innerText = "£0.00";
            } else {
                if (e.checked) {

                    var quantityText = e.parentElement.querySelector('#quantity-input').value;
                    var priceText = e.parentElement.parentElement.querySelector('#item-price').innerText;

                    let prc = parseFloat(priceText.substring(1));
                    let qty = parseInt(quantityText);
                    itemcount += qty
                    sum += prc * qty;

                    console.log(sum)
                    console.log(qty)
                    console.log(prc)
                    const iname = e.parentElement.parentElement.querySelector('#item-name').innerText;
                    const idesc = e.parentElement.parentElement.querySelector('#item-description').innerText;
                    
                    records.push({id:e.parentElement.parentElement.id, name: iname, description: idesc, price: prc, quantity: qty})
                } else {
                    count -= 1
                }
                addCheckedItemToLocalStorage(records,sum,itemcount)
                
            }
        }
        


    }
    function addCheckedItemToLocalStorage(recs,sum,itemcount,id) {
        localStorage.setItem('total-box-items', JSON.stringify(recs));
        console.log(JSON.parse(localStorage.getItem('total-box-items')))
        localStorage.setItem('basketitemcount',JSON.stringify(" " + itemcount.toString()))
        localStorage.setItem('total-price',JSON.stringify(new Intl.NumberFormat('en-GB', { style: 'currency', currency: 'GBP' }).format(sum)))
    }

</script>

<body>
    @include('layouts.navbar')


    <div class="flex flex-wrap lg:flex-nowrap" onload="populateBasket()">
        <div id="basket-items-wrapper"
            class="min-w-[700px] w-[100%] bg-yellow-50 text-3xl text-grey-300 rounded-lg p-10 m-10 mt-10 lg:w-[80%]">
            <p class="text-6xl mt-10 mb-10">Basket</p>
            <ul id="items" onload="populateBasket()">

            </ul>
        </div>
        <div
            class=" bg-yellow-50 text-3xl text-grey-300 rounded-lg  ml-5 mt-10 mr-5 mb-10 flex-wrap min-w[160px] w-[100%] lg:w-max md:flex-nowrap md:p-10 lg:relative ">
            @include('layouts.total-box-blade')
            <a href={{ route('checkout') }}><button
                    class="bg-yellow-400 hover:bg-yellow-500 rounded-lg mb-10 p-4 mr-5 ml-5 mt-10 w-full h-56 lg:h-24 text-7xl lg:text-3xl"
                    onClick="addCheckedItemsToCheckout()"> GO
                    TO
                    CHECKOUT</button>
            </a>

        </div>

    </div>

    </div>

</body>

</html>