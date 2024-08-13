<!-- Add Modal -->
<div class="modal fade" id="modal_medicineADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Medicine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="medicineform_add">
        <div class="modal-body">
          <div class="row">
            <div class="col" style="border-right: 2px solid #9ca3af">
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" id="brand" name="brand" class="form-control form-control-sm"
                  placeholder="Enter a brand name">
              </div>
              <div class="form-group">
                <label>Generic Name</label>
                <input type="text" id="medicine" name="medicine" class="form-control form-control-sm"
                  placeholder="Enter a generic name">
              </div>
              <div class="form-group">
                <label>Dossage</label>
                <input type="text" id="ml" name="ml" class="form-control form-control-sm" onchange="setTwoNumberDecimal"
                  min="0" max="10" step="0.25" placeholder="Enter a Dossage ammount">
              </div>

              <div class="form-group">
                <label>Medicine Type</label>
                <select id="medicine_type" name="medicine_type" class="form-control form-control-sm">
                  <?php
                  $query = "SELECT type_id, type_name FROM types";
                  $result = mysqli_query($conn, $query);
                  if (mysqli_num_rows($result) > 0) {
                    ?>
                    <option value="" disabled selected>------- Select Medicine type --------</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?= $row['type_id'] ?>"> <?= $row['type_name'] ?></option>
                      <?php
                    }
                  } else {
                    echo '<option value="">No medicine Type found</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control form-control-sm ">
              </div>
            </div>
            <!-- <div class="col">
              <div class="form-goup">
                <label>Medicine Prescription</label>
                <textarea id="pres_desc" rows="4" cols="50" class="form-control"
                  placeholder="Type your medicine description here..."></textarea>
              </div>
            </div> -->
          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"
            data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="submit" id="medicine_add_btn" name="registerbtn"
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

<script>
  function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
  }
</script>