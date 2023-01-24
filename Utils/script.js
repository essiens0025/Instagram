var inputs = document.getElementsByClassName("myInput");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].onfocus = function () {
        this.value = "";
    }
}




//document.getElementById("myInput").onfocus = function () {
   // this.value = "";
//}
//
// let nameInput = document.getElementById("myInput");
// nameInput.addEventListener('focus', () => {
//     nameInput.value = "";
// })