<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="server.js" type="module"></script>
  <title>Chatbot - LR19Boy</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Rubik", sans-serif;
      background: grey;
    }

    #bot {
      margin: 0px auto;
      height: 730px;
      width: 95%;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 3px 3px 15px black;
      border-radius: 20px;
    }

    #container {
      height: 90%;
      width: 90%;
      background: #F3F4F6;
      border-radius: 6px;
      display: flex;
      flex-direction: column;
      box-shadow: 3px 3px 15px black;
    }

    #header {
      display: flex;
	  justify-content: center;
	  align-items: center;
      flex-shrink: 0;
      width: 100%;
      height: 10%;
      background: #3B82F6;
      color: white;
      text-align: center;
      font-size: 2rem;
      box-shadow: 2px 2px 8px black;
      border-radius: 6px 6px 0 0;
    }

    #body {
      flex: 1;
      width: 100%;
      background-color: coral;
      box-shadow: 2px 2px 8px black;
      border-radius: 0 0 0 0;
      overflow-y: auto;
      padding: 10px;
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
      text-align: left;
      background: black;
      color: #E5E7EB;
      float: left;
      margin-left: 10px;
    }

    .bot-reply {
      text-align: right;
      background: #E5E7EB;
      float: right;
      margin-right: 10px;
      color: black;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
    }

    #inputArea {
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 8%;
      padding: 1rem;
      background: #D3D3D3;
      box-shadow: 2px 2px 8px black;
      border-radius: 5px;
      width: 100%;
    }

    #userInput {
      flex: 1;
      height: 20px;
      background-color: white;
      border-radius: 6px;
      padding: 1rem;
      font-size: 1rem;
      border: none;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
      width: 50%;
    }

    .reset {
      padding: 10px 30px;
      display: flex;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      margin-left: 7px;
      color: white;
      background: red;
      box-shadow: 2px 2px 8px black;
      justify-content: space-between;
    }

    #send {
      padding: 10px 30px;
      display: flex;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      margin-left: 7px;
      cursor: pointer;
      color: white;
      background: #3B82F6;
      box-shadow: 2px 2px 8px black;
      justify-content: space-between;
    }

    footer {
      position: fixed;
      bottom: 0px;
      width: 100%;
      align-items: center;
      text-align: center;
      padding: 1rem;
      background: #3B82F6;
      color: white;
      box-shadow: 0 -2px 8px black;
    }
    
    #upload {
      padding: 10px 30px;
      display: flex;
      border: none;
      margin-left: 7px;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      color: white;
      background: black;
      box-shadow: 2px 2px 8px black;
    }
    
    #fileInput {
      padding: 10px 20px;
      margin-left: 7px;
      display: flex;
      border: none;
      justify-content: space-between;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      color: white;
      background: black;
      box-shadow: 2px 2px 8px black;
    }
	
	.status-dot {
    display: inline-block;
    height: 15px;
    width: 15px;
    background: #34ff4a;
    border-radius: 50%;
	margin-top: 15px;
	}
	
	.status-page-link {
		padding: 10px 10px;
		font-size: 16px;
		border-bottom: 1px solid #efeff4;
		border-top: 1px solid #efeff4;
		border: 0;
		box-shadow: none;
		outline: 0;
		display: block;
		height: 100%;
	}
	
	.status-dot1 {
    display: inline-block;
    height: 15px;
    width: 15px;
    background: red;
    border-radius: 50%;
	margin-top: 15px;
	}
	
	.status-page-link1 {
		padding: 10px 10px;
		font-size: 16px;
		border-bottom: 1px solid red;
		border-top: 1px solid red;
		border: 0;
		box-shadow: none;
		outline: 0;
		display: block;
		height: 100%;
	}

  </style>
</head>
<body id="chatbot">
  <div id="bot">
    <div id="container">
      <div id="header" id="chatbotTitle"></div>

      <div id="body">
        <div class="userSection"></div>
        <div class="botSection"></div>
      </div>

      <div id="inputArea">
        <input type="text" name="messages" id="userInput" placeholder="Please enter your message here" required>
        <input type="file" id="fileInput" name="image" required>
        <button id="upload">Upload</button>
        <button type="submit" id="send" disabled>Send</button>
        <button class="reset" id="reset">Clear All</button>
      </div>
    </div>
  </div>

  <footer> LR19Boy - &copy; Copyrights @ 2024 &copy; </footer>

  <script type="text/javascript">
    let userName;
	while (!userName || userName.includes(" ")) {
		userName = prompt("Please enter your name (no spaces allowed): ");
	}

    // Set the title dynamically
	if(userName)
	{
		document.querySelector("#header").innerHTML = `Online Chatbot App - ${userName} <div class="status-page-link"><div class="status-dot">`;
	}
	else {
		document.querySelector("#header").innerHTML = `Online Chatbot App -  <div class="status-page-link1"><div class="status-dot1">`;
	}
	

    // Disable send button initially
    var sendButton = document.querySelector("#send");
    var userInput = document.querySelector("#userInput");
	

    userInput.addEventListener("input", function () {
      if (userInput.value.trim() !== "") {
        sendButton.disabled = false;
      } else {
        sendButton.disabled = true;
      }
    });

    document.querySelector("#reset").addEventListener("click", () => {
      document.querySelector("#body").innerHTML = "";
    });

    document.querySelector("#send").addEventListener("click", sendMessage);
    userInput.addEventListener("keypress", function (e) {
      if (e.key === "Enter" && userInput.value.trim() !== "") {
        sendMessage();
      }
    });

    function sendMessage() {
      var userMessage = userInput.value.trim();

      if (userMessage === "") {
        return;
      }

      let xhr = new XMLHttpRequest();

      // Get the current date and time
      var date = new Date();
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var seconds = date.getSeconds();
      var period = "AM";

      // Convert to 12-hour format
      if (hours >= 12) {
        period = "PM";
        if (hours > 12) {
          hours -= 12;
        }
      } else if (hours === 0) {
        hours = 12;
      }

      // Format the time to always show two digits
      minutes = minutes < 10 ? '0' + minutes : minutes;
      seconds = seconds < 10 ? '0' + seconds : seconds;
      var currentTime = hours + ":" + minutes + ":" + seconds + " " + period;

      // Display the user message with time
      let userHtml = '<div class="userSection"><div class="messages user-message"><strong>' + userName + '- </strong> ' + userMessage + '<br><small>' + currentTime + '</small></div><div class="seperator"></div></div>';
      document.querySelector('#body').innerHTML += userHtml;

      xhr.open("POST", "query.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("messageValue=" + userMessage);
      xhr.onload = function () {
        var botReplyTime = new Date();
        var botHours = botReplyTime.getHours();
        var botMinutes = botReplyTime.getMinutes();
        var botSeconds = botReplyTime.getSeconds();
        var botPeriod = "AM";

        // Convert to 12-hour format
        if (botHours >= 12) {
          botPeriod = "PM";
          if (botHours > 12) {
            botHours -= 12;
          }
        } else if (botHours === 0) {
          botHours = 12;
        }

        // Format the time to always show two digits
        botMinutes = botMinutes < 10 ? '0' + botMinutes : botMinutes;
        botSeconds = botSeconds < 10 ? '0' + botSeconds : botSeconds;
        var botTime = botHours + ":" + botMinutes + ":" + botSeconds + " " + botPeriod;

        let msg = 'Bot';

        let botHtml = '<div class="messages bot-reply">' + msg + '- ' + this.responseText + '<br><small>' + botTime + '</small></div><div class="seperator"></div>';
        document.querySelector('#body').innerHTML += botHtml;
        userInput.value = "";
        document.querySelector("#body").scrollTop = document.querySelector("#body").scrollHeight;

        // Disable send button again
        sendButton.disabled = true;
      }
    }

    document.querySelector("#upload").addEventListener("click", () => {
      const fileInput = document.querySelector("#fileInput");

      if (fileInput.files.length === 0) {
        alert("Please select at least one image file.");
        return;
      }

      const botSection = document.querySelector(".botSection");
      botSection.innerHTML = "";
	  

      const files = Array.from(fileInput.files);

      files.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function (e) {
          const imgElement = document.createElement("img");
          imgElement.src = e.target.result;
          imgElement.style.maxWidth = "20%";
          imgElement.style.maxHeight = "20%";
          imgElement.style.border = "5px solid #3B82F6";

          botSection.append(imgElement);
        };

        reader.readAsDataURL(file);
      });

      console.log(fileInput.files); // Optional: Log the files array for debugging
    });
  </script>

</body>
</html>
