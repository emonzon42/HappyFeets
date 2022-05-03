
function addtocart(hashid) {
    storeCookies("cartitem", hashid);

    return true;
}

function storeCookies(name, value) {
    // Create your date and expiration here (look at class example)
    var date = new Date(2099, 12, 31);

    // Add your cookies here - You'll need string concatenation (look at class example)
    document.cookie = "" + name + "=" + value + "; expires=" + date.toUTCString() + "; path=/";

}