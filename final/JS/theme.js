const button = document.getElementById('colorScheme');


function darkMode(){
    console.log(document.getElementById('colorScheme').href);
    document.getElementById('colorScheme').href === "../Public/CSS/dark.css" ?
        document.getElementById('colorScheme').href = "../Public/CSS/white.css" :
        document.getElementById('colorScheme').href = "../Public/CSS/dark.css";

    document.getElementById('colorScheme').value === "white" ? document.getElementById('colorScheme').value = "dark" : document.getElementById('colorScheme').value = "white";
};
button.addEventListener('click', {
    handleEvent: function (event) {
        darkMode();
    }
})