<!-- Add Modal -->
<div class="modal fade" id="modal_consultADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Consultationx</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="consultform_add">
        <div class="modal-body" style="overflow-y: auto; max-height: calc(90vh - 120px);">
          <div class="row justify-content-between">
            <div class="col-6" style="border-right: 2px solid #9ca3af">
              <div class="form-group">
                <label>Client Name</label>
                <input type="hidden" id="uID" class="form-control form-control-sm">
                <div class="input-group">
                  <input type="text" id="client_name" class="form-control form-control-sm" disabled>
                  <div class="input-group-append">
                    <button id="search_consult_btn" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                      data-target="#modal_consultREQ">Select</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Chief Complaints</label>
                <textarea id="complaints" rows="4" cols="50" class="form-control"
                  placeholder="Type your complaints here..."></textarea>
              </div>
              <div class="form-group">
                <label>Recommendation</label>
                <textarea id="recommendation" rows="4" cols="50" class="form-control"
                  placeholder="Type your recommendation here..."></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-12">
                  <h5 class="bg-info py-1 px-2 w-75 text-light">Medicine</h5>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Medicine Name</label>
                    <select id="medicines" name="medicine[]" class="form-control form-control-sm">
                      <?php
                      $query = "SELECT mdn_id, medicine_name FROM medicine";
                      $result = mysqli_query($conn, $query);
                      if (mysqli_num_rows($result) > 0) {
                        ?>
                        <option value="" disabled selected>------- Select Medicine --------</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <option value="<?= $row['mdn_id'] ?>"> <?= $row['medicine_name'] ?></option>
                          <?php
                        }
                      } else {
                        echo '<option value="">No medicine found</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity[]" class="form-control form-control-sm" />
                  </div>
                </div>
                <div class="col-2" style="margin-top: 30px">
                  <button type="button" id="addMedicineBtn" class="btn btn-primary btn-sm"><i
                      class="fas fa-plus"></i></button>
                </div>
              </div>



              <div class="row">
                <div class="col">
                  <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Medicines list
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                          <div id="additionalMedicineInputs"></div>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label>Medicine Prescription</label>
                  <textarea id="med_desc" rows="4" cols="50" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"
            data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="submit" id="consult_add_btn"
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
              class="fas fa-save mx-1"></i>Save</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- #################################################################### -->

<div class="modal fade" id="modal_consultREQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content px-2 py-1">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="float-end mb-1">
        <input id="Studentsearch_input" type="text" class="float-end form-control form-control-sm w-25 m-1"
          placeholder="Search for lastname.">
      </div>
      <div class="table-responsive">
        <table class=" table table-bordered table-sm" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th style="width: 15%">Student No.</th>
              <th style="width: 65%">Fullname</th>
              <th style="width: 20%"></th>
            </tr>
          </thead>

          <tbody class="consultsearch_table">

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>