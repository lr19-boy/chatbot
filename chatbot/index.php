<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
      margin: 13px auto;
      height: 720px;
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
      flex-shrink: 0;
      width: 100%;
      height: 10%;
      background: #3B82F6;
      color: white;
      text-align: center;
      font-size: 2rem;
      padding-top: 12px;
      box-shadow: 2px 2px 8px black;
      border-radius: 6px 6px 0 0;
    }

    #body {
      flex: 1;
      width: 100%;
      background-color: coral;
      box-shadow: 2px 2px 8px black;
      border-radius: 0 0 7px 7px;
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
      background: transparent;
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
      margin-right: 10px;
    }

    .reset {
      padding: 10px 30px;
      display: flex;
      right: 5px;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      color: white;
      background: red;
      box-shadow: 2px 2px 8px black;
    }

    #send {
      padding: 10px 30px;
      display: flex;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      color: white;
      background: #3B82F6;
      box-shadow: 2px 2px 8px black;
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
        <div class="userSection"></div>
        <div class="botSection"></div>
      </div>

      <div id="inputArea">
        <input type="text" name="messages" id="userInput" placeholder="Please enter your message here" required>
        <button type="submit" id="send">Send</button>
        <button class="reset" id="reset">Clear All</button>
      </div>
    </div>
  </div>

  <footer> LR19Boy - &copy; Copyrights @ 2024 &copy; </footer>

  <script type="text/javascript">
    let userName = prompt("Please enter your name : ");

    document.querySelector("#reset").addEventListener("click", () => {
      document.querySelector("#body").innerHTML = "";
    });

    document.querySelector("#send").addEventListener("click", sendMessage);
    document.querySelector("#userInput").addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        sendMessage();
      }
    });

    function sendMessage() {
      let xhr = new XMLHttpRequest();
      var userMessage = document.querySelector("#userInput").value;

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

        let botHtml = '<div class="messages bot-reply">' + this.responseText + '<br><small>' + botTime + '</small></div><div class="seperator"></div>';
        document.querySelector('#body').innerHTML += botHtml;
        document.querySelector("#userInput").value = "";
        document.querySelector("#body").scrollTop = document.querySelector("#body").scrollHeight;
      }
    }
  </script>

</body>
</html>
