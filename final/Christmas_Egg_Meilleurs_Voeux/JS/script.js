const input = document.getElementById('nom');
const log = document.getElementById('nom1');

input.addEventListener("input", updateValue);

function updateValue(e) {
    log.innerHTML = input.value;

}

const input2 = document.getElementById('pre');
const log2 = document.getElementById('prenom');

input2.addEventListener("input", updateValue2);

function updateValue2(e) {
    log2.innerHTML = input2.value;


}

const input3 = document.getElementById('mess');
const log3 = document.getElementById('message');

input3.addEventListener("input", updateValue3);

function updateValue3(e) {
    log3.innerHTML = input3.value;

}




const konamiCode = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "a", "b"];
let userCode = [];

let chill = new Audio("../noelChill.mp3");
let drill = new Audio("../noelDrill.mp3");


document.onkeydown = e => {
    if (e.key !== konamiCode[userCode.length]) return userCode = [];

    userCode.push(e.key)

    if (konamiCode.length === userCode.length)
        playMusic();
}

document.addEventListener("click", () => {
    console.log("fsdfsd")
    chill.volume = 1;
    chill.play();
    drill.volume = 0;
    drill.play();

})

function playMusic() {
    console.log("bite")
    chill.volume = 0;
    drill.volume = 1;
}