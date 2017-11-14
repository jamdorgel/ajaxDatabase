<!DOCTYPE html>
<html>
	<head>

		<script>var number = 0; </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
		<script src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">

		<script> 
			function clearFields(element){
				console.log(element.id);
				if (element.id == "searchfirstname"){
					$("#searchsurname").val("");
					$("searchemail").val("");
				}

				else if (element.id == "searchsurname"){
					$("#searchfirstname").val("");
					$("searchemail").val("");
				}

				else if (element.id == "searchemail"){
					$("#searchfirstname").val("");
					$("#searchsurname").val("");
				}

				$("#firstname").val("");
				$("#surname").val("");
				$("#email").val("");
				$("#password").val("");
				$("#username").val("");
				$("#femaleradio").prop('checked',false);
				$("#maleradio").prop('checked',false); 
				$("#nonradio").prop('checked',false);
				$("#nunnyaradio").prop('checked',false);
			}

			function submitAjax() {
				var data = $('#signupForm').serialize();

				//calling backend php code through Ajax
				$.ajax({
					url: "form.php",
					method: "POST",
					data: {"data" : data },
					success:  function(response){
						$("#ajaxDiv").html("form submitted successfully");
					}			
				}); // end of ajax call	
			};

			function fetchDatabase() {
				var surname = $('#searchsurname').val();
				var firstname = $('#searchfirstname').val();
				var email = $('#searchemail').val();

				if (firstname != "") {
					// alert("firstname");
					$("#ajaxDiv").html("Searching database for user: " + firstname);
					$.ajax({
						url:"search.php",
						method: "POST",
						data: {"searchfirstname" : firstname},
						success: function(response){
							$("#ajaxDiv").html(response);
						}
					});			

				}

				else if (surname != "") {
					// alert("surname");
					$("#ajaxDiv").html("Searching database for user: " + surname);
					$.ajax({
						url:"search.php",
						method: "POST",
						data: {"searchsurname" : surname},
						success: function(response){
							$("#ajaxDiv").html(response);
						}
					});			

				}		

				else if (email != "") {
					// alert("email");
					$("#ajaxDiv").html("Searching database for user: " + email);
					$.ajax({
						url:"search.php",
						method: "POST",
						data: {"searchemail" : email},
						success: function(response){
							$("#ajaxDiv").html(response);
						}
					});			

				}		

				$("#firstname").val("");
				$("#surname").val("");
				$("#email").val("");
				$("#password").val("");
				$("#username").val("");
				$("#femaleradio").prop('checked',false);
				$("#maleradio").prop('checked',false); 
				$("#nonradio").prop('checked',false);
				$("#nunnyaradio").prop('checked',false);

				};

			function deleteRows() {
				var surname = $('#searchsurname').val();
				var firstname = $('#searchfirstname').val();
				var email = $('#searchemail').val();

				if (firstname != "") {
					// alert("firstname");
					$("#ajaxDiv").html("Searching database for user: " + firstname);
					$.ajax({
						url:"delete.php",
						method: "POST",
						data: {"searchfirstname" : firstname},
						success: function(response){
							$("#ajaxDiv").html(response);
						}
					});			

				}

				else if (surname != "") {
					// alert("surname");
					$("#ajaxDiv").html("Searching database for user: " + surname);
					$.ajax({
						url:"delete.php",
						method: "POST",
						data: {"searchsurname" : surname},
						success: function(response){
							$("#ajaxDiv").html(response);
						}
					});			

				}		

				else if (email != "") {
					// alert("email");
					$("#ajaxDiv").html("Searching database for user: " + email);
					$.ajax({
						url:"delete.php",
						method: "POST",
						data: {"searchemail" : email},
						success: function(response){
							$("#ajaxDiv").html(response);
						}
					});			

				}		

				$("#firstname").val("");
				$("#surname").val("");
				$("#email").val("");
				$("#password").val("");
				$("#username").val("");
				$("#femaleradio").prop('checked',false);
				$("#maleradio").prop('checked',false); 
				$("#nonradio").prop('checked',false);
				$("#nunnyaradio").prop('checked',false);


			}
	
		</script>

	</head>
	<body>
		<div class="column small-centered small-4">
			<h1><center>Sign up Form</center></h1>
			<form class="small-centered small-12 column" id="signupForm" action="">

			<div class="row">
				<div class="small-6 column">
				<label> First Name:
					<input type="text" id="firstname" name="firstname" placeholder="Enter Name">
				</label>
				</div>

				<div class="small-6 column">
				<label> Surname:
					<input type="text" id="surname" name="surname" placeholder="Enter Surname">
				</label>
				</div>
			</div>

			<div class="row">
				<div class="small-6 column">
				<label> Email:
					<input type="text" id="email" name="email" placeholder="Enter Email">
				</label>
				</div>

				<div class="small-6 column">
				<label> Password:
					<input type="text" id="password" name="password" placeholder="Enter Password">
				</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 column">
				<label> Username (A-Z characters only):
					<input type="text" id="username" name="username" placeholder="Enter username">
				</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 column">
				<label>Gender Marker:</label>
				<input type="radio" name="gender" value="male" id="maleradio"><label for="maleradio">Male</label><br/>
				<input type="radio" name="gender" value="female" id="femaleradio"><label for="femaleradio">Female</label><br/>
				<input type="radio" name="gender" value="non-binary" id="nonradio"><label for="nonradio">Non-Binary</label><br/>
				<input type="radio" name="gender" value="nunnya" id="nunnyaradio"><label for="nunnyaradio">"Nunnya"</label>
				</div>


			<input class="button small-12 column" id="testAjax" value="Register" type ="button" onclick="submitAjax();">

			</div>

			<br/><br/>

			<div class="row">
				<div class="small-6 column">
					<label><i>(Search by first name:)</i>
						<input type="text" name="search" id="searchfirstname" placeholder="enter first name" onfocus="clearFields(this);"></label>
				</div>


				<div class="small-6 column">
					<label><i>(Search by surname:)</i>
						<input type="text" name="search" id="searchsurname" placeholder="enter surname" onfocus="clearFields(this);"></label>
				</div>


				<div class="small-12 column">
					<label><i>(Search by email:)</i>
						<input type="text" name="search" id="searchemail" placeholder="enter email" onfocus="clearFields(this);"></label>
				</div>

			<input class="button small-6 column" id="fetchAjax" value="Fetch" type ="button" onclick="fetchDatabase();">
			<input class="button alert small-6 column" id="deleteAjax" value="Delete" type ="button" onclick="deleteRows();">
		</form>

			<p id="ajaxDiv">
			</p>
		
		</div>
	</body>
</html>