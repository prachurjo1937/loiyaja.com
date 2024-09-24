function isValid(form){
    
    let itemName = form.itemName.value;
    let category = form.category.value;
    let price = form.price.value;
    let myfile = form.myfile.value;
    let flag = true;
    
    document.getElementById("itemNameError").innerHTML = "";
    document.getElementById("categoryError").innerHTML = "";
    document.getElementById("priceError").innerHTML = "";
    document.getElementById("pictureError").innerHTML = "";

    if(!itemName) {

        document.getElementById("itemNameError").innerHTML = "Please enter item name<br>";
        flag = false;

    }
    if(!category) {

        document.getElementById("categoryError").innerHTML = "Please enter category<br>";
        flag = false;

    }
    if(!myfile) {

        document.getElementById("pictureError").innerHTML = "Please enter item picture<br>";
        flag = false;

    }
    if(!price) {

        document.getElementById("priceError").innerHTML = "Please enter price<br>";
        flag = false;

    }
    else{
        for (let i = 0; i < price.length; i++) {
            if (!Number.isInteger(parseInt(price[i]))) {
                document.getElementById('priceError').innerHTML = "Price can only be numeric<br>";
                flag = false;
                break;
            }
        }
    }

    return flag;

}