<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script>
    var tab = 1;
    function checkField(input) {
        let cleanval = sanitiseStr(input.value.trim())
        if (cleanval == '') {
            input.classList.add('outline-pink-500', 'border-pink-500', 'bg-pink-100');
            input.classList.remove('bg-yellow-200', 'focus:bg-white');
        } else {
            input.classList.remove('outline-pink-500', 'border-pink-500', 'bg-pink-100');
            input.classList.add('focus:bg-white', 'bg-yellow-200');

        }
    }

    function checkForm(tabId) {
        event.preventDefault();
        let record = []
        formInputs = document.getElementsByClassName(`${tabId}-field`);
        let isValid = true
        for (const input of formInputs) {
            console.log(input)
            if (input.value.trim() == '') {
                input.classList.add('outline-pink-500', 'border-pink-500', 'bg-pink-100');
                input.classList.remove('bg-yellow-200', 'focus:bg-white');
                isValid = false
            } else {
                input.classList.remove('outline-pink-500', 'border-pink-500', 'bg-pink-100');
                input.classList.add('focus:bg-white', 'bg-yellow-200');
                record.push(sanitiseStr(input.value.trim()))
            }
        }
        if (isValid) {
            console.log('valid c:')

            let outputString = []
            for (const input of formInputs) {
                let cleanval = sanitiseStr(input.value.trim());
                if (!cleanval == "BUTTON!") {
                    outputString.push(cleanval)
                }
            }
            localStorage.setItem(tabId,JSON.stringify(record))
            tabcontrolForward(tabId);
        } else {
            console.log('invalid :c')
        }
    }

    function sanitiseStr(str) {
        return str.replace(/<[^>]*>?/gm, ""); //sanitises inputs
    }

    document.addEventListener('DOMContentLoaded', () => { tab = 1; })

    document.addEventListener('submit', function(event) {
        event.preventDefault(); 

    })


    function tabcontrolForward(tabId) {

        let currform;
        let newform;
        switch (tabId) {
            case 'delivery':
                tab = 2
                currform = document.getElementById('delivery-details-section')
                currform.classList.add('hidden')
                document.getElementById('billing-information-section').classList.remove('hidden')
                break;

            case 'billing':
                currform = document.getElementById('billing-information-section')
                currform.classList.add('hidden')
                tab = 3
                document.getElementById('confirmation-section').classList.remove('hidden')
                break;

            case 'confirm':
                document.getElementById('checkout-wrapper').classList.add('hidden')
                document.getElementById('ty-for-shopping').classList.remove('hidden')
                break;
        }
        fillIfAlready(tabId)
    }
    function tabControlBackward(tabId) {
        let currform;
        let newform;
        let newtabid;
        switch (tabId) {
            case 'billing':
                currform = document.getElementById('billing-information-section')
                currform.classList.add('hidden')
                tab = 3
                document.getElementById('delivery-details-section').classList.remove('hidden')
                newtabid = 'delivery'
                break;

            case 'confirmation':
                currform = document.getElementById('confirmation-section')
                currform.classList.add('hidden')
                tab = 3
                document.getElementById('billing-information-section').classList.remove('hidden')
                newtabid = 'billing'
                break;
                default:
                    console.log(tabId)
                    break;
        }
        fillIfAlready(newtabid)
    }
    function fillIfAlready(tabId){
        let fields = document.getElementsByClassName(`${tabId}-field`);
        let storedValues = JSON.parse(localStorage.getItem(tabId) || '[]');

        let i=0
        for(const input of fields){
            console.log(storedValues[i])
            let values = storedValues
            input.value = values[i]
            i++;
    }
}
    

</script>

<body>
    @include ("layouts.navbar")
    <Div id="checkout-wrapper"
        class="flex flex-nowrap justify-center items-center align-middle bg-yellow-100 sm:w-fit m-auto mt-5 pl-[10%] pr-[10%] pb-[10%] pt-10">
        <div class="form-with-total">
            <ol class="flex items-center w-full text-sm text-center dark:text-yellow-800 sm:text-xl">
                <li
                    class="flex md:w-full items-center text-yellow-600 dark:text-yellow-800 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-yellow-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-yellow-700">

                    <span id="stepper-title-1"
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-yellow-200 dark:after:text-yellow-500">

                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Delivery <span class="hidden sm:inline-flex sm:ms-2">Details</span>
                    </span>

                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-yellow-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-yellow-700">
                    <span id="stepper-title-2"
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-yellow-200 dark:after:text-yellow-500">
                        <span id="two-in-stepper" class="me-2">2</span>
                        Billing<span class="hidden sm:inline-flex sm:ms-2">Information</span>

                    </span>
                </li>
                <li class="flex items-center">
                    <span id="stepper-title-2" class="me-2">3</span>
                    Confirmation
                </li>
            </ol>
            <form id="three-step-form">
                <div id="delivery-details-section" onload="fillIfalready(this)" class="tab w-full max-w-lg center mt-5 ml-auto mr-auto">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                First Name
                            </label>
                            <input onfocusout="checkField(this)" class=" delivery-field appearance-none block w-full bg-yellow-200 text-yellow-700 border rounded
                            py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                type="text">

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Last Name
                            </label>
                            <input onfocusout="checkField(this)" class=" delivery-field appearance-none block w-full bg-yellow-200 text-yellow-700 border
                            border-yellow-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white
                            focus:border-yellow-500" id="grid-last-name" type="text">
                        </div>


                    </div>
                    <div class="flex flex-wrap  mb-2 w-[100%]">
                        <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                            for="grid-address">
                            Address
                        </label>
                        <input onfocusout="checkField(this)" class=" delivery-field appearance-none block w-full bg-yellow-200 text-yellow-700 border
                        border-yellow-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white
                        focus:border-yellow-500" id="grid-address" type="text" placeholder="    ">
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-city">
                                City
                            </label>
                            <input onfocusout="checkField(this)" class=" delivery-field appearance-none block w-full bg-yellow-200 text-yellow-700 border
                            border-yellow-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white
                            focus:border-yellow-500" id="grid-country" type="text" placeholder="    ">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-country">
                                Country
                            </label>
                            <input onfocusout="checkField(this)" class=" delivery-field appearance-none block w-full bg-yellow-200 text-yellow-700 border
                            border-yellow-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white
                            focus:border-yellow-500" id="grid-city" type="text" placeholder="    ">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-county">
                                County
                            </label>
                            <div class="relative">
                                <select onfocusout="checkField(this)"
                                    class="delivery-field block appearance-none w-full bg-yellow-200 border border-yellow-200 text-yellow-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-yellow-500"
                                    id="grid-county" value=" ">
                                    <option></option>
                                    <option value="bedfordshire">Bedfordshire</option>
                                    <option value="berkshire">Berkshire</option>
                                    <option value="bristol">Bristol</option>
                                    <option value="buckinghamshire">Buckinghamshire</option>
                                    <option value="cambridgeshire">Cambridgeshire</option>
                                    <option value="cheshire">Cheshire</option>
                                    <option value="cornwall">Cornwall</option>
                                    <option value="county-durham">County Durham</option>
                                    <option value="cumbria">Cumbria</option>
                                    <option value="derbyshire">Derbyshire</option>
                                    <option value="devon">Devon</option>
                                    <option value="dorset">Dorset</option>
                                    <option value="east-riding-of-yorkshire">East Riding of Yorkshire</option>
                                    <option value="east-sussex">East Sussex</option>
                                    <option value="essex">Essex</option>
                                    <option value="gloucestershire">Gloucestershire</option>
                                    <option value="greater-london">Greater London</option>
                                    <option value="greater-manchester">Greater Manchester</option>
                                    <option value="hampshire">Hampshire</option>
                                    <option value="herefordshire">Herefordshire</option>
                                    <option value="hertfordshire">Hertfordshire</option>
                                    <option value="isle-of-wight">Isle of Wight</option>
                                    <option value="kent">Kent</option>
                                    <option value="lancashire">Lancashire</option>
                                    <option value="leicestershire">Leicestershire</option>
                                    <option value="lincolnshire">Lincolnshire</option>
                                    <option value="merseyside">Merseyside</option>
                                    <option value="norfolk">Norfolk</option>
                                    <option value="north-somerset">North Somerset</option>
                                    <option value="north-yorkshire">North Yorkshire</option>
                                    <option value="northamptonshire">Northamptonshire</option>
                                    <option value="northumberland">Northumberland</option>
                                    <option value="nottinghamshire">Nottinghamshire</option>
                                    <option value="oxfordshire">Oxfordshire</option>
                                    <option value="rutland">Rutland</option>
                                    <option value="shropshire">Shropshire</option>
                                    <option value="somerset">Somerset</option>
                                    <option value="south-gloucestershire">South Gloucestershire</option>
                                    <option value="south-yorkshire">South Yorkshire</option>
                                    <option value="staffordshire">Staffordshire</option>
                                    <option value="suffolk">Suffolk</option>
                                    <option value="surrey">Surrey</option>
                                    <option value="tyne-and-wear">Tyne & Wear</option>
                                    <option value="warwickshire">Warwickshire</option>
                                    <option value="west-midlands">West Midlands</option>
                                    <option value="west-sussex">West Sussex</option>
                                    <option value="west-yorkshire">West Yorkshire</option>
                                    <option value="wiltshire">Wiltshire</option>
                                    <option value="worcestershire">Worcestershire</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-yellow-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class=" block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-postcode">
                                Postcode
                            </label>
                            <input onfocusout="checkField(this)" class=" delivery-field appearance-none block w-full bg-yellow-200 text-yellow-700 border border-yellow-200
                            rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500"
                                id="grid-zip" type="text" placeholder="A12 3BC">
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-end">

                        <button class="bg-amber rounded-lg p-3 mt-3  ml-3 pl-5 pr-5" onclick="checkForm('delivery');"
                            value="BUTTON!">Proceed</button>
                    </div>
                </div>
                <div id="billing-information-section" onload="fillIfalready(this)" class="hidden tab w-full max-w-lg center mt-5 ml-auto mr-auto">

                    <div class="flex flex-wrap  mb-2 w-[100%]">
                        <label class="block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                            for="grid-Card Num">
                            Card Number
                        </label>
                        <input onfocusout="checkField(this)" class=" billinga-field appearance-none block w-full bg-yellow-200 text-yellow-700 border
                        border-yellow-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white
                        focus:border-yellow-500" id="grid-address" type="text" placeholder="    ">
                    </div>
                    <div class="flex">
                        <div class="w-full md:w-1/3 mr-3 mb-6 md:mb-0">
                            <label class=" block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-expiry-date">
                                Expiry Date
                            </label>
                            <input onfocusout="checkField(this)" class=" billing-field appearance-none block w-full bg-yellow-200 text-yellow-700 border border-yellow-200
                            rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500"
                                id="grid-exp-date" type="date" placeholder="">

                        </div>
                        <div class="w-full md:w-1/3  mb-6 md:mb-0">
                            <label class=" block uppercase tracking-wide text-yellow-700 text-xs font-bold mb-2"
                                for="grid-cvc">
                                CVC
                            </label>
                            <input onfocusout="checkField(this)" class=" billing-field appearance-none block w-full bg-yellow-200 text-yellow-700 border border-yellow-200
                            rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500"
                                id="grid-cvn" type="" placeholder="">
                        </div>
                    </div>


                    <div class="flex flex-wrap">
                        <button class="bg-amber rounded-lg p-3 mt-3 ml-3 pl-5 pr-5"
                            onclick="tabControlBackward('billing');" value="BUTTON!">Back</button>
                        <button class="bg-amber rounded-lg p-3 mt-3 ml-auto pl-5 pr-5" onclick="checkForm('billing');"
                            value="BUTTON!">Proceed</button>

                    </div>
                </div>
                <div id="confirmation-section" onload="fillIfalready(this)"class="hidden tab w-full max-w-lg center mt-5 ml-auto mr-auto">
                    <ul id="checkout-items" class="mb-auto  text-yellow-800 text-nowrap align-top md:text-xl">
                        @include('layouts.total-box-blade')

                        <div class="flex flex-wrap">
                        <button class="bg-amber rounded-lg p-3 mt-3 ml-3 pl-5 pr-5"
                            onclick="tabControlBackward('confirmation');" value="BUTTON!">Back</button>
                        <button class="bg-amber rounded-lg p-3 mt-3 ml-auto pl-5 pr-5" onclick="checkForm('confirm');"
                            value="BUTTON!">CONFIRM</button>
                    </div>

                    </ul>
                </div>
            </form>

        </div>

    </Div>
    <div id="ty-for-shopping" class="hidden text-9xl justify-center">
        THANK YOU FOR SHOPPING
    </div>

</body>

</html>