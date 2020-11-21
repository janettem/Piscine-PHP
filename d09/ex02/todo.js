function setCookie(name, value, days) {
    var expires1 = new Date();
    var expires2 = new Date();

    expires1.setTime(expires1.getTime() - (days * 24 * 60 * 60 * 1000));
    expires1.toUTCString();
    document.cookie = "expires=" + expires1;

    expires2.setTime(expires2.getTime() + (days * 24 * 60 * 60 * 1000));
    expires2.toUTCString();
    document.cookie = name + "=" + value + "; expires=" + expires2 + "; path=/";
}

function arrayToStr(array) {
    var str = "";

    for (var i = 0; i < array.length; i++) {
        if (i != 0) {
            str += ", ";
        }
        str += array[i];
    }

    return (str);
}

function getCookie(name) {
    var pairs = document.cookie.split("; ");
    for (var i = 0; i < pairs.length; i++) {
        var pair = pairs[i].split("=");
        if (pair.length == 2 && pair[0] == name) {
            return (pair[1]);
        }
    }
    return (null);
}

function removeItem(item) {
    var remove = confirm("Remove Item");

    if (remove) {
        var list = document.getElementById("ft_list");

        for (var i = 0; i < items.length; i++) {
            if (items[i] == item.innerHTML) {
                items.splice(i, 1);
                break ;
            }
        }
        setCookie("items", arrayToStr(items), 365);

        list.removeChild(item);
    }
}

function addItem(toDo, event) {
    var text = document.createTextNode(toDo);
    var item = document.createElement("div");
    var list = document.getElementById("ft_list");
    var itemId = "item" + nItems;

    item.appendChild(text);
    item.setAttribute("id", itemId);
    item.setAttribute("onclick", "removeItem(" + itemId + ")");
    list.prepend(item);

    if (event == "new") {
        items.push(toDo);
        setCookie("items", arrayToStr(items), 365);
    }

    nItems += 1;
}

function promptUser() {
    var toDo = prompt("Add Item");

    if (toDo != null && toDo != "") {
        addItem(toDo, "new");
    }
}

var nItems = 0;
var items = getCookie("items");

if (items != null) {
    var items = getCookie("items").split(", ");

    for (var i = 0; i < items.length; i++) {
        addItem(items[i], "old");
    }
} else {
    items = new Array();
}
