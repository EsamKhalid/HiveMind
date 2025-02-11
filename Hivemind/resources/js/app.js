import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

function stychange() {
    if (button.value == "off") {
        button.value = "on";
        document.getElementById("searchbar").style.visibility(visible);
    } else {
        button.value = "off";
    }
}
