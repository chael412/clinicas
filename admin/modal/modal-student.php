<!-- Add Modal -->
<div class="modal fade" id="modal_studentADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="studentform_add">

        <div class="modal-body">

          <div class="row">

            <div class="col">
              <div class="form-group">
                <label>Student No.</label>
                <input type="text" id="student_no" class="form-control form-control-sm">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Course</label>
                <select class="form-control form-control-sm" id="course_id" required>

                  <?php
                  $displayDept = "SELECT cs_id, course_name, acro FROM courses";
                  $deptResult = mysqli_query($conn, $displayDept);
                  if (mysqli_num_rows($deptResult) > 0) {
                    foreach ($deptResult as $deptItem) {
                      ?>
                      <option value='<?= $deptItem['cs_id'] ?>'>
                        <?= $deptItem['course_name'] ?>
                      </option>
                      <?php
                    }
                  } else {
                    echo '<option>No Course found!</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control form-control-sm"
                  pattern="[A-Za-z\-'. ]+" oninput="this.value = this.value.replace(/[^A-Za-z .'-]/g, '')">
              </div>

            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Middlename</label>
                <input type="text name=" id="middlename" class="form-control form-control-sm" pattern="[A-Za-z\-'. ]+"
                  oninput="this.value = this.value.replace(/[^A-Za-z .'-]/g, '')">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control form-control-sm"
                  pattern="[A-Za-z\-'. ]+" oninput="this.value = this.value.replace(/[^A-Za-z .'-]/g, '')">
              </div>

            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Birthdate</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Sex</label>
                <select name="" id="sex" class="form-control form-control-sm">
                  <option value="1" selected>Male</option>
                  <option value="2">Female</option>
                </select>
              </div>

            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Mobile No.</label>
                <input type="text" name="contact_no" id="contact_no" class="form-control form-control-sm"
                  oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"
            data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="submit" id="student_add_btn" name=""
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-save mx-1"></i>Save
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- #################################################################### -->

<!-- Delete Modal -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">

        <div class="modal-body">

          <input type="hidden" name="del_id_admin" id="del_id_admin">

          <h6>Do you want to delete this data?</h6>

        </div>
        <div class="modal-footer">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            data-dismiss="modal">No</button>
          <button type="submit" name="deletedata"
            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Yes</button>
        </div>
      </form>

    </div>
  </div>
</div>