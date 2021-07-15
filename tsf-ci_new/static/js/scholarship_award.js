$(document).ready(function (e) {
    var hashParam = getUrlParameter("tab");
    if (hashParam != -1) {
        $("#side-menu-"+hashParam).click();
    }
});

//------ Function to show submenu content
function ShowContent(id) {
    var i, x, tablinks;
    x = document.getElementsByClassName("side-menu-triangle");
    y = document.getElementsByClassName("content-container");
    tablinks = document.getElementsByClassName("side-menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        y[i].style.display = "none";
        tablinks[i].className = tablinks[i].className.replace(" w3-theme-l1", "");
    }

    document.getElementById("side-menu-triangle-"+id).style.display = "block";
    document.getElementById("content-container-"+id).style.display = "block";
    $("#side-menu-"+id).addClass("w3-theme-l1");
    $("#Side-menu-bar").toggleClass("side-menu-bar");
    window.location.hash = "tab="+id;
}

//-- Function to show hide side menu bar
function ShowHideSideBar(){
    $("#Side-menu-bar").toggleClass("side-menu-bar");
}

// Get URL filter parameter value
function getUrlParameter(sParam) {
    var hash = window.location.hash;
    sPageURL = decodeURIComponent(hash.substring(1));
    sURLVariables = sPageURL.split('&');
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? -1 : sParameterName[1];
        }
    }
    return -1;
};
