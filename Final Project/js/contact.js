document.getElementById('contactbtn').onclick = function() {

   let myRequest = new XMLHttpRequest();

        //alert("we requestin)");
        // Create a function for when the ready state changes for your myRequest
        
        // Inside of that function will be an if statement to check the readyState (4) and status (200) of our request
        // You can refer to our request with "this" 
        // Inside of the if statement, you'll output this.responseText to the div tag with an id of fruitOutput 
        myRequest.onreadystatechange = function(){

            if(this.status == 200 && this.readyState == 4){
                document.getElementById('confirm').innerHTML = "<div id='confirm' class='center'>"+this.responseText+"</div>";
            }

        }

        let fname = document.getElementById('fname').value;
        let lname = document.getElementById('lname').value;
        let email = document.getElementById('email').value;
        let msg = document.getElementById('msg').value;
        myRequest.open("GET", "../tools/mail.php?fname="+fname+"&lname="+lname+"&email="+email+"&msg="+msg,true);
        myRequest.send();

      //  alert("we jus sent the sauce" + email + "hi");
        
    

}