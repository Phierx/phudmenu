


window.onload = function debut(){
  //alert("Page is loaded");
  document.getElementById("inventory").style.display = "none";
  document.getElementById("messages").style.display = "none";
  document.getElementById("settings").style.display = "none";
}

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


function pageClick(a) {
  
  
  var a ;

  switch (a) {
      case "shop":
        document.getElementById(a).style.display = "block";
        document.getElementById("inventory").style.display = "none";
        document.getElementById("messages").style.display = "none";
        document.getElementById("settings").style.display = "none";
          break;
      case "inventory":
        document.getElementById(a).style.display = "block";
        document.getElementById("shop").style.display = "none";
        document.getElementById("messages").style.display = "none";
        document.getElementById("settings").style.display = "none";
          break;
     case "messages":
        document.getElementById(a).style.display = "block";
        document.getElementById("shop").style.display = "none";
        document.getElementById("inventory").style.display = "none";
        document.getElementById("settings").style.display = "none";
          break;
      case "settings":
        document.getElementById(a).style.display = "block";
        document.getElementById("shop").style.display = "none";
        document.getElementById("messages").style.display = "none";
        document.getElementById("inventory").style.display = "none";
          break;
      default:
          alert("default case executed");
  }
}