





//AJAX Call example:


                  $.ajax({
						  url: '../demo/api/User.php?user_id='+user_id,     //Put the URL (can be relative)
						  type: 'GET',     //Type of the request: POST or PUT
						  async: false,     //An ajax call is by default synchronous, which means that the rest of the js code is compiled at the same time as the ajax call is processed, if you the data from the call is needed for the code below this whole ajax function, then put true
						  success: function(data) { //This function is processed when the call is a success, the parameter under parenthesis is the data retrieved.


							//Put your function here.
							console.log(data);

						  }
						});



						$.ajax({
						  url: '../demo/api/User.php',     //Put the URL (can be relative)
						  type: 'POST',     //Type of the request: POST or PUT
						   data: {text1: val1},   //text1 is the name of the parameter, HAS TO BE THE SAME WITH THE API-TAREGET, and val1 is the value, respect the type. Priyanka will share these infos with you.
						  async: false,     //An ajax call is by default synchronous, which means that the rest of the js code is compiled at the same time as the ajax call is processed, if you the data from the call is needed for the code below this whole ajax function, then put true
						  success: function(data) { //This function is processed when the call is a success, the parameter under parenthesis is the data retrieved.


							//Put your function here.
							console.log(data);

						  }
						});


	//You have any problem, contact me.
