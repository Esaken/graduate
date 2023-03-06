// Set up event listener for the send button
document.getElementById("sendbtn").addEventListener("click", sendMsg);

// Function to send user message to the server and receive a response
function sendMsg() {
  // Get user input
  var usermsg = document.getElementById("usermsg").value;

  // Create HTTP request
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Parse the response from the server
      var response = JSON.parse(this.responseText)["response"];

      // Display the user's message and the bot's response in the chatbox
      var chatbox = document.getElementById("chatbox");
      chatbox.innerHTML += "<p><strong>You:</strong> " + usermsg + "</p>";
      chatbox.innerHTML += "<p><strong>Bot:</strong> " + response + "</p>";
    }
  };

  // Send the user's message to the server to get a response
  xhttp.open("GET", "/get_response?msg=" + usermsg, true);
  xhttp.send();
}
