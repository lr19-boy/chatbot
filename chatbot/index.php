<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chatbot</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');

*{
	margin: 0;
	padding: 0;
}

body{
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Rubik", sans-serif;
  background: grey;
}

#bot {
  margin: 20px auto;
  height: 745px;
  width: 95%;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 3px 3px 15px black ;
  border-radius: 20px;
}

#container {
  height: 90%;
  border-radius: 6px;
  width: 90%;
  background: #F3F4F6;
}

#header {
  width: 100%;
  height: 10%;
  border-radius: 6px;
  background: #3B82F6;
  color: white;
  text-align: center;
  font-size: 2rem;
  padding-top: 12px;
  box-shadow: 2px 2px 8px black;
}

#body {
  width: 100%;
  height: 75%;
  background-color: red;
  box-shadow: 2px 2px 8px black;
  border-radius: 7px;
  overflow-y: auto;
}

.userSection {
	margin: 10px auto;
    width: 100%;
}

.seperator {
  width: 100%;
  height: 50px;
}

.messages {
  max-width: 60%;
  margin: .5rem;
  font-size: 1.2rem;
  padding: .5rem;
  border-radius: 7px;
}

.user-message {
  margin-top: 1rem;
  text-align: left;
  background: black;
  color: #E5E7EB;
  float: left;
}

.bot-reply {
  text-align: right;
  background: #E5E7EB;
  margin-top: 1rem;
  float: right;
  color: black;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}

#inputArea {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 8%;
  padding: 1rem;
  background: transparent;
  box-shadow: 2px 2px 8px black;
  border-radius: 5px;
}

#userInput {
  height: 20px;
  width: 80%;
  background-color: white;
  border-radius: 6px;
  padding: 1rem;
  font-size: 1rem;
  border: none;
  outline: none;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}

button {
	padding: 30px; 
	border-color: 4px 4px solid black;
}

#send {
  height: 50px;
  padding: 10px;
  font-size: 1rem;
  text-align: center;
  width: 10%;
  float: right;
  color: white;
  background: #3B82F6;
  cursor: pointer;
  border-radius: 6px;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
} 

.reset{
	height: 50px;
  padding: 10px;
  font-size: 1rem;
  text-align: center;
  width: 20%;
  color: white;
  background: #3B82F6;
  cursor: pointer;
  border: none;
  border-radius: 6px;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}
  </style>
</head>
<body>
<div id="bot">
  <div id="container">
    <div id="header">
        Online Chatbot App
    </div>

    <div id="body">
      <!-- This section will be dynamically inserted from JavaScript -->
        <div class="userSection">
          
        </div>
        <div class="botSection">
          
        </div>        
    </div>

    <div id="inputArea">
      <input type="text" name="messages" id="userInput" placeholder="Please enter your message here" required>
      <button type="submit" id="send">Send</button>
	  <button class="reset" id="reset">Reset</button>
    </div>
  </div>
  </div>

  <script type="text/javascript" lang="js">
      
	  document.querySelector("#reset").addEventListener("click", () => {
        document.querySelector("#body").innerHTML = "";
      });
		
      document.querySelector("#send").addEventListener("click", async () => {
        let xhr = new XMLHttpRequest();
		
        var userMessage = document.querySelector("#userInput").value

        let userHtml = '<div class="userSection">'+'<div class="messages user-message">'+userMessage+'</div>'+
        '<div class="seperator"></div>'+'</div>'
		
        document.querySelector('#body').innerHTML+= userHtml;

        xhr.open("POST", "query.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`messageValue=${userMessage}`);

        xhr.onload = function () {
            let botHtml = '<div class="messages bot-reply">'+this.responseText+'</div>'+'<div class="seperator"></div>'+'</div>'
            
            document.querySelector('#body').innerHTML+= botHtml;
			document.querySelector("#userInput").value = "";
			document.querySelector("#body").scrollTop = document.querySelector("#body").scrollHeight;
        }

      })
  </script>
  </body>
</html>
