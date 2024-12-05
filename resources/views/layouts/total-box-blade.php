<!DOCTYPE html>
<html lang="en">
<script>

    function totalBox() {
        let list = document.getElementById("total-box-list")
        let records = JSON.parse(localStorage.getItem('total-box-items'))
        
        
        for (let r of records) {
            if(!list.querySelector("#"+r.id)){
            var item = document.createElement('li');
            item.innerHTML = r.name + " " + new Intl.NumberFormat('en-GB', { style: 'currency', currency: 'GBP' }).format(r.price) + " x" + r.quantity
            list.append(item)
            console.log('aaaaaa' + list)
        }
        document.querySelector('#total').innerHTML = JSON.parse(localStorage.getItem('total-price'))
        document.querySelector('#itemcount').innerHTML = JSON.parse(localStorage.getItem('basketitemcount'))
    }
    }

    
    document.addEventListener('DOMContentLoaded', totalBox);

</script>
<div id="total-box" class="ml-5 mt-10">
    <p>Total:</p><span id="total"></span>
    <p>Items in basket:<span id="itemcount"> </span></p>
    <ul id="total-box-list">
    </ul>


</div>

</html>