<div class="main mt-3">
	<div class="container shadow-sm p-3 page-item">
		<div class="d-flex justify-content-between">
			<button type="button" data-bs-toggle="modal" data-bs-target="#searchUser" id="search" class="btn"><i class="fa-solid fa-magnifying-glass"></i> <span class="text-secondary">Search Users</span></button>
			<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addUser">
				<i class="fa-solid fa-user-plus"></i>
				Add New User
			</button>

			<!-- Modal for add user -->
			<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Add new user</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="addUserNew">
							<div class="mb-3">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="emailA" name="email">
							</div>
							<div class="mb-3">
								<label for="type">Account type</label>
								<select class="form-select" id="type" name="actype">
									<option selected value="admin">Admin</option>
									<option value="author">Author</option>
									<option value="user">User</option>
								</select>
							</div>
							<div class="p text-warning">If you don't know following details don't change those.</div>
							<div class="mb-3">
								<label for="fname">First Name</label>
								<input type="text" class="form-control" id="finame" name="firstName" value="Jhon">
							</div>
							<div class="mb-3">
								<label for="lname">Last Name</label>
								<input type="text" class="form-control" id="laname" name="lastName" value="Duo">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
					</div>
				</div>
			</div>
			<!-- Modal for search users -->
			<div class="modal" id="searchUser" tabindex="-1" aria-labelledby="searchUser" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"style="height: 400px; max-height: 400px;">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Search users</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<input type="text" id="searchUsersajaxInput" class="form-control" placeholder="Enter user email address" onkeyup="showResult(this.value)">
						<div id="searchtitle" class="mt-3"></div>
						<div id="searchResults" class="mt-3"></div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#searchUsersajaxInput").keyup(function (e) { 
			var userEmailS = $("#searchUsersajaxInput").val();
			$("#searchtitle").html("Searching result(s) for " + userEmailS);
		});
	});
	function showResult(str) {
		document.getElementById("searchResults").innerHTML= str;
		if (str.length==0) {
			document.getElementById("searchResults").innerHTML="";
			return;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
			document.getElementById("searchResults").innerHTML=this.responseText;
			}
		}
		xmlhttp.open("GET","<?php echo base_url('admin/get_users') ?>?q="+str,true);
		xmlhttp.send();
	}
</script>
