function login_check() {
    var username = document.getElementById("username").value,
        password = document.getElementById("password").value;
    if (username == "" || password == "") {
        document.getElementById("login_error").innerHTML = "Username and password can not be empty";
        return false;
    }
    document.getElementById("login_error").innerHTML = "";
    return true;
}

function register_check() {
    var username = document.getElementById("username").value,
        password = document.getElementById("password").value,
        email = document.getElementById("email").value,
        email_pattern = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (username == "" || password == "" || email == "") {
        document.getElementById("register_error").innerHTML = "You must not leave empty fields";
        return false;
    }
    if (!email_pattern.test(email)) {
        document.getElementById("register_error").innerHTML = "Email not valid";
        return;
    }
    document.getElementById("register_error").innerHTML = "";
    return true;
}

function item_edit_click(number, item_id) {
    var num_field = document.getElementById("itemnum" + number),
        name_field = document.getElementById("itemname" + number),
        quantity_field = document.getElementById("itemquantity" + number),
        measure_field = document.getElementById("itemmeasure" + number),
        shop_field = document.getElementById("itemshop" + number),
        item_add_edit_number_field = document.getElementById("item_add_edit_number"),
        item_add_edit_name_field = document.getElementById("item_add_edit_name"),
        item_add_edit_quantity_field = document.getElementById("item_add_edit_quantity"),
        item_add_edit_measure_field = document.getElementById("item_add_edit_measure"),
        item_add_edit_shop_field = document.getElementById("item_add_edit_shop"),
        item_add_edit_id_field = document.getElementById("item_add_edit_id");

        item_add_edit_number_field.innerHTML = num_field.innerHTML;
        item_add_edit_name_field.value = name_field.innerHTML;
        item_add_edit_quantity_field.value = quantity_field.innerHTML;
        item_add_edit_measure_field.value = measure_field.getAttribute('data-id');
        item_add_edit_shop_field.value = shop_field.getAttribute('data-id');
        item_add_edit_id_field.value = item_id;
}

function item_edit_discard() {
    var item_add_edit_id_field = document.getElementById("item_add_edit_id"),
        item_add_edit_number_field = document.getElementById("item_add_edit_number"),
        item_add_edit_name_field = document.getElementById("item_add_edit_name"),
        item_add_edit_quantity_field = document.getElementById("item_add_edit_quantity"),
        item_add_edit_measure_field = document.getElementById("item_add_edit_measure"),
        item_add_edit_shop_field = document.getElementById("item_add_edit_shop");

    item_add_edit_id_field.value = "";
    item_add_edit_number_field.innerHTML = item_add_edit_number_field.getAttribute('data-id');
    item_add_edit_name_field.value = "";
    item_add_edit_quantity_field.value = "";
    item_add_edit_measure_field.selectedIndex = 0;
    item_add_edit_shop_field.selectedIndex = 0;
}

function shop_edit_click(number, shop_id) {
    var num_field = document.getElementById("shopnum" + number),
        name_field = document.getElementById("shopname" + number),
        shop_add_edit_number_field = document.getElementById("shop_add_edit_number"),
        shop_add_edit_name_field = document.getElementById("shop_add_edit_name"),
        shop_add_edit_id_field = document.getElementById("shop_add_edit_id");

        shop_add_edit_number_field.innerHTML = num_field.innerHTML;
        shop_add_edit_name_field.value = name_field.innerHTML;
        shop_add_edit_id_field.value = shop_id;
}

function shop_edit_discard() {
    var shop_add_edit_number_field = document.getElementById("shop_add_edit_number"),
    shop_add_edit_name_field = document.getElementById("shop_add_edit_name"),
    shop_add_edit_id_field = document.getElementById("shop_add_edit_id");

    shop_add_edit_id_field.value = "";
    shop_add_edit_number_field.innerHTML = shop_add_edit_number_field.getAttribute("data-id");
    shop_add_edit_name_field.value = "";
}

function add_edit_shop_check() {
    var name = document.getElementById("shop_add_edit_name");
    if (name.value == "") {
        name.classList.add("red_border");
        return false;
    }
    name.classList.remove("red_border");
    return true;
}

function add_edit_item_check() {
    var name = document.getElementById("item_add_edit_name"),
        quantity = document.getElementById("item_add_edit_quantity");
    if (name.value == "") {
        name.classList.add("red_border");
        return false;
    }
    name.classList.remove("red_border");
    if (quantity.value == "") {
        quantity.classList.add("red_border");
        return false;
    }
    quantity.classList.remove("red_border");
    return true;
}

function add_measure_check() {
    var name = document.getElementById("add_measure");
    if (name.value == "") {
        name.classList.add("red_border");
        return false;
    }
    name.classList.remove("red_border");
    return true;
}

function admin_measure_change() {
    var measures = document.getElementById("measure_edit_select"),
        id_field = document.getElementById("edit_measure_id"),
        name_field = document.getElementById("edit_measure");
    id_field.value = measures.value;
    name_field.value = measures.options[measures.selectedIndex].text;
}

function edit_measure_check() {
    var measures = document.getElementById("measure_edit_select"),
        id_field = document.getElementById("edit_measure_id"),
        name_field = document.getElementById("edit_measure");
    if (id_field.value == "") {
        measures.classList.add("red_border");
        return false;
    }
    measures.classList.remove("red_border");
    if (name_field.value == "") {
        name_field.classList.add("red_border");
        return false;
    }
    name_field.classList.remove("red_border");
    return true;
}

function admin_user_change() {
    var user = document.getElementById("user_change_select"),
        id_field = document.getElementById("edit_user_right_id"),
        right = document.getElementById("user_right_select");
    id_field.value = user.value;
    right.value = user.options[user.selectedIndex].getAttribute('data-id');
}

function edit_user_check() {
    var right_id = document.getElementById("edit_user_right_id"),
        right = document.getElementById("user_right_select"),
        user = document.getElementById("user_change_select");
    if (right_id.value == "") {
        user.classList.add("red_border");
        return false;
    }
    user.classList.remove("red_border");
    if (right.value == "") {
        right.classList.add("red_border");
        return false;
    }
    right.classList.remove("red_border");
    return true;
}
