document.getElementById('submit').onclick = function() {

   let myRequest = new XMLHttpRequest();

        alert("we requestin)");
        // Create a function for when the ready state changes for your myRequest
        
        // Inside of that function will be an if statement to check the readyState (4) and status (200) of our request
        // You can refer to our request with "this" 
        // Inside of the if statement, you'll output this.responseText to the div tag with an id of fruitOutput 
        myRequest.onreadystatechange = function(){

            if(this.status == 200 && this.readyState == 4){
                document.getElementById('confirm').innerHTML = "<p>"+this.responseText+"</p>";
            }

        }

        myRequest.open("POST", "../tools/mail");
        var data = {
            fname:document.getElementById('submit'),
            lname: document.getElementById('lname'),
            email: document.getElementById('email'),
            msg: document.getElementById('msg')
        };

        myRequest.send(JSON.stringify(data));

        alert("we jus sent the sauce");
        
    

}