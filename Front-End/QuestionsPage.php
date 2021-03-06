<?php
	session_start();
	$user = $_SESSION['user_id'];
	echo '<script>
	var user_id = ' . $user . ';
	</script>';
	if (!isset($user)){
		echo '<script> alert("Not logged in"); location.href = "../Front-End/login.html";</script>'; #
	} #can't access if not logged in
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="qpagestyle.css"/>
	<title> All questions </title>
</head>

<body>

	<section id="main">

		<h2> All questions </h2>

		<fieldset id="newQuestion">

			<legend>Can't find what you're looking for? Ask a question! </legend>
			<div id="inner">
			<input id="title" type="text" placeholder="Title" required /> <br/>
			<textarea id="q" placeholder="Your question..."> </textarea> <br/>
			<button id="post" name="questionpost"> Post </button>
			<button id="cancel" name="questioncancel"> Cancel </button>
		</div>
		</fieldset>

		<div id="top">
			<input type="search" placeholder="Search questions" />

			<label for="sortby">Sort questions by:</label>
			<select name="sortby" id="sortby">
				<option value="date"> Newest </option>
				<option value="best"> Best </option>
			</select>
		</div>

		<div id="questions">
			<!-- Where all the questions will show -->
		</div>

		<script src="http://code.jquery.com/jquery.js"> </script>
		<script>
			$( function(){


				$('#cancel').click(erase);

				function erase () {
					$('#q').val("");
					$('#title').val("");
				}

				$('#post').click(addNew);

				function addNew () {
					var title = $('#title').val();

					//Will need to be retrived from the database
					var score = 0;

					var date = new Date();

					//Will depend on the current logged-in account
					var username = "user";

					link = $("<a href=''>").html(title);
					titleDiv = $("<div class='qTitle'>").html(link);
					infoDiv = $("<div class='info'>");
					scoreDiv = $("<div class= 'score'>").html("Good question? " + score);

					dateDiv = $("<div class= 'date'>").html("Posted by " + username + " on " + date.toLocaleDateString() + " " + date.toLocaleTimeString());
					$(infoDiv).append(scoreDiv).append(dateDiv);
					$(titleDiv).append(infoDiv);

					var text = $('#sortby option:selected').text();
					if (text === "Newest"){
						$('#questions').prepend(titleDiv);
					}
					else{
						$('#questions').append(titleDiv);
					}

					$('#q').val("");
					$('#title').val("");

				}
			});
		</script>

	</section>

</html>
