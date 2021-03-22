<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax with laravel</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fonts/fontawesome/css/all.css">
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

    <br>
    <br>
    <br>

	<div class="wrap-table ">
        <a class="btn btn-sm btn-primary" data-toggle="modal" href="#student_modal">Add New Student</a>
        <br>
        <br>
		<div style="background-color:#FFEEDF;" class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table id="table_student" class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Roll</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="student_tbody">
                        @foreach ($all_data as $data )
                        <tr>
                            <td>{{ $loop -> index + 1}}</td>
                            <td>{{ $data -> name}}</td>
                            <td>{{ $data -> roll}}</td>
                            <td>{{ $data -> email}}</td>
                            <td>{{ $data -> cell}}</td>
                            <td><img src="media/students/{{ $data -> photo}}" alt=""></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="#">View</a>
                                <a id="edit_student" student_id="{{ $data -> id}}" class="btn btn-sm btn-warning" data-toggle="modal" href="#student_modal_edit">Edit</a>
                                <a class="btn btn-sm btn-danger" href="#">Delete</a>
                            </td>
                        </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
    </div>


    {{-- student modal data sent --}}
	<div id="student_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <h4>Add New Student</h4>
            </div>
            <div style="background-color:#30C5C4;" class="modal-body">
                <div class="mess"></div>
             <form id="add_student_form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input name="name" class="form-control" type="text" placeholder="Name">
                </div>
                <div class="form-group">
                    <input name="roll" class="form-control" type="text" placeholder="Roll">
                </div>
                <div class="form-group">
                    <input name="email" class="form-control" type="text" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input name="cell" class="form-control" type="text" placeholder="Cell">
                </div>
                <div class="form-group" style="font-size:30px; cursor: pointer;">
                    <img style="display: block; width: 250px; height:auto;" id="student_photo_load" src="" alt="">
                    <input name="photo" style="display: none;" type="file" id="student_photo">
                    <label for="student_photo"><i class="fas fa-photo-video"></i></label>
				</div>
                <div class="form-group">
                    <input class="btn btn-dark btn-block" type="submit" value="Add New">
                </div>
             </form>
            </div>
          </div>
        </div>
      </div>



      {{-- student modal edit --}}
      <div id="student_modal_edit" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Student Data</h4>
            </div>
            <div style="background-color:#FFC107;" class="modal-body">
                <div class="mess"></div>
             <form id="edit_student_form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input name="name" class="form-control" type="text" placeholder="Name">
                </div>
                <div class="form-group">
                    <input name="roll" class="form-control" type="text" placeholder="Roll">
                </div>
                <div class="form-group">
                    <input name="email" class="form-control" type="text" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input name="cell" class="form-control" type="text" placeholder="Cell">
                </div>
                <div class="form-group" style="font-size:30px; cursor: pointer;">
                    <img style="display: block; width: 250px; height:250px;" id="student_photo_load" src="" alt="">
                    <input name="photo" style="display: none;" type="file" id="student_photo">
                    <label for="student_photo"><i class="fas fa-photo-video"></i></label>
				</div>
                <div class="form-group">
                    <input class="btn btn-dark btn-block" type="submit" value="Update">
                </div>
             </form>
            </div>
          </div>
        </div>
      </div>









	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/datatables.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
