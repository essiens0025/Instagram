var inputs = document.getElementsByClassName("myInput");
for (var i = 0; i < inputs.length; i++) {
  inputs[i].onfocus = function () {
    this.value = "";
  }
}



let formVisible = false;

function showform() {
  if (formVisible) {
    document.getElementById("modif").style.display = "none";
    formVisible = false;
  } else {
    document.getElementById("modif").style.display = "block";
    formVisible = true;
  }
}




let isChanged = false;

function changeTheme() {

  if (!isChanged) {

    document.querySelector("#nav").style.backgroundColor = "#9b9090";


    document.querySelector("#nav").style.color = '#000000';

    // document.getElementById("nav").style.color = "black";

    isChanged = true;
  } else {

    document.querySelector("#nav").style.backgroundColor = '#424141';

    document.querySelector("#nav").style.color = "white";

    // document.getElementById("profil").style.backgroundColor = "";
    // document.getElementById("nav").style.backgroundColor = "";

    // document.getElementById("nav").style.color = "";

    isChanged = false;
  }
}

function changeTheme1() {
  console.log("Change theme");
  if (!isChanged) {

    document.querySelector("#ppgb").style.backgroundColor = "#9b9090";


    document.querySelector("#ppbg").style.color = '#000000';

    // document.getElementById("nav").style.color = "black";

    isChanged = true;
  } else {

    document.querySelector("#ppbg").style.backgroundColor = '#424141';

    document.querySelector("#ppbg").style.color = "white";

    // document.getElementById("profil").style.backgroundColor = "";
    // document.getElementById("nav").style.backgroundColor = "";

    // document.getElementById("nav").style.color = "";

    isChanged = false;
  }
}