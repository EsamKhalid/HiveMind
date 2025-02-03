import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "media",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                "Blender-Pro-Thin": ["Blender-Pro-Thin"],
                "Blender-Pro-Medium": ["Blender-Pro-Medium"],
                "Blender-Pro-Heavy": ["Blender-Pro-Heavy"],
                "Blender-Pro-Book": ["Blender-Pro-Book"],
                Nemesys: ["nemesys"],
                Montserrat: ["montserrat"],
                gillsansmt: ["gillsansmt"],
            },
            colors: {
                "cybpnk-grey": "#21201f",
                "cybpnk-alt": "#252826",
                "cybpnk-blk": "#131212",
                "cybpnk-ylw": "#eabc49",
                "cybpnk-ylw2": "#fbbf24",
                "cybpnk-blk2": "#171619",
                "cybpnk-brdr": "#25252a",
                "jms-blue": "#14141a",
                "ghost-white": "#f8f8ff",
                amber: "#fbbf24",
                night: "#131212",
                "raisin-black": "#25252A",
                saffron: "#eabc49",
                temp: "#ffeaa2",
            },
        },
    },

    plugins: [forms],
};
