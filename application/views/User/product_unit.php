<!DOCTYPE html>
<html>
<?php
$page = "party_list";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1 text-center">
            <h4>MANAGE PRODUCT UNIT</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Party Information</h3>
              <div class="card-tools">
                <a href="party_information" class="btn btn-sm btn-block btn-primary">Add Party</a>
              </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form">
                <div class="card-body row">

                  <div class="form-group col-md-10 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="" id="" title="Enter Unit Name" placeholder="Enter Unit Name">
                  </div>
                  <div class="form-group col-md-8 offset-md-2">
                    <div class="form-group">
                      <!-- <label for="exampleInputFile">File input</label> -->
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                   </div>


                  <div class="form-group col-md-2 offset-md-2">
                    <button class="btn btn-sm btn-block btn-primary">Add  </button>
                  </div>
                  <div class="form-group col-md-2 offset-md-2">
                    <button href="" class="btn btn-sm btn-block btn-primary">Cancel</button>
                  </div>
                  <div class="col-md-12">


                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Image</th>
                      <th>Unit Name</th>
                      <th>Status </th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1 </td>
                          <td>1</td>
                          <td>1 </td>
                        </tr>

                    </tbody>
                  </table>
                    </div>

                </div>
                <!-- /.card-body -->
              </div>

            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>


</body>
</html>
