<!DOCTYPE html>
<html ng-app="angCrud">
<head>
	<title>AngularJS DataGrid</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
</head>
<body>
	<div class="container-fluid">
		<controller ng-controller="angcrudCtrl">
			<div class="row">
				<div class="col-md-12">
					<h1>Add New Contact!</h1>
					<form ng-submit="if_exist_phone()">
						<div class="form-group">
							<div class="input-group"><input type="hidden" ng-model="id">
								<span class="input-group-addon">Full Name</span>
								<input type="text" class="form-control" ng-model="fname" required>
								<span class="input-group-addon">Place</span>
								<input type="text" class="form-control" ng-model="place" required>
								<span class="input-group-addon">Phone</span>
								<input type="text" class="form-control" ng-model="phone" required>
								<span class="input-group-addon">E-mail</span>
								<input type="email" class="form-control" ng-model="mail" required>
								<span class="input-group-addon">Gender</span>
								<select class="form-control" ng-model="gend">
									<option>Select</option>
									<option ng-model="Male">Male</option>
									<option ng-model="Female">Female</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-info" value="Save" style="float: right;">
						</div>
					</form>
					<br/>&nbsp;
					<span class="text text-succsess">{{suc_msg}}</span>
					<span class="text text-danger">{{err_msg}}</span>
					<div class="table-responsive">
						<label>Search : <input type="text" ng-model="search" class="form-control"></label>
						<table class="table table-hover table-bordered">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>Place</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Actions</th>
							</thead>
							<tbody ng-init="showAll()">
								<tr ng-repeat="x in datas | filter:search">
									<td>{{$index + 1}}</td>
									<td>{{x.name}}</td>
									<td>{{x.place}}</td>
									<td>{{x.phone}}</td>
									<td>{{x.email}}</td>
									<td>{{x.gender}}</td>
									<td><a href="#" class="btn btn-warning" ng-click="selectTo_update(x.id)">Edit</a> &nbsp;<a href="#{{x.id}}" ng-click="delData(x.id)" class="btn btn-danger">Delete</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</controller>
	</div>

<script src="<?php echo base_url();?>assets/js/jquery-1.12.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/angular.min.js"></script>
<script src="<?php echo base_url();?>assets/js/app.js"></script>
</body>
</html>