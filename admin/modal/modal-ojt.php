<!-- Add Modal -->
<div class="modal fade" id="modal_ojtADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Medical Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="ojtform_add">

        <div class="modal-body">

          <div class="row justify-content-between">

            <div class="col-6" style="border-right: 2px solid #9ca3af">
              <div>
                <h5 class="bg-info py-1 px-2 w-75 text-light">Medication Present</h5>
                <div class="form-group">
                  <div class="d-flex gap-4">
                    <p> Have an medication present? </p>
                    <span>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="medicationPresent" id="medicationNo"
                          value="0">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="medicationPresent" id="medicationYes"
                          value="1">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                      </div>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Diagnosis</label>
                  <input disabled type="text" id="diagnosis" class="form-control form-control-md">
                </div>
                <div class="form-group">
                  <label>Treatment</label>
                  <input disabled type="text" id="treatment" class="form-control form-control-md">
                </div>

              </div>
              <div>
                <h5 class="bg-info py-1 px-2 w-75 text-light">Past Medical History</h5>
                <div class="form-group">

                  <div class="form-check">
                    <input id="hyperthension" class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                      Hyperthension
                    </label>
                  </div>
                  <div class="form-check">
                    <input id="diabetes" class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                      Diabetes
                    </label>
                  </div>
                  <div class="form-check">
                    <input id="cardio" class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                      Cardiovascular(Heart)Desease
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="ptb">
                    <label class="form-check-label">
                      PTB
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hyperacidity">
                    <label class="form-check-label" for="defaultCheck2">
                      Hyperacidity
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="allergy">
                    <label class="form-check-label" for="defaultCheck2">
                      Allergy
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="epilepsy">
                    <label class="form-check-label" for="defaultCheck2">
                      Epilepsy
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="asthma">
                    <label class="form-check-label" for="defaultCheck2">
                      Asthma
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dysmenorrhea">
                    <label class="form-check-label" for="defaultCheck2">
                      Dysmenorrhea
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="liver">
                    <label class="form-check-label" for="defaultCheck2">
                      liver/Gall Blader Desease
                    </label>
                  </div>
                </div>


              </div>

            </div>

            <div class="col-6">
              <div class="form-group d-flex flex-column">
                <label>Student Name</label>
                <input type="hidden" id="ojtID" class="form-control form-control-sm">
                <a href="#" class="btn btn-primary btn-icon-split">
                  <input type="text" id="student_name" class="form-control form-control-sm" disabled>
                  <button id="search_ojt_btn" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#modal_ojtREQ">Select</button>
                </a>
              </div>
              <div class="form-group">
                <label>Urinalysis</label>
                <input type="file" id="urinalysis" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label>X-ray</label>
                <input type="file" id="x_ray" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label>Pregancy Test</label>
                <input type="file" id="pregnancy_test" class="form-control form-control-sm">
              </div>
            </div>

          </div>







        </div>
        <div class="modal-footer">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"
            data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="submit" id="ojtmed_add_btn" name="registerbtn"
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-save mx-1"></i>Save
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- #################################################################### -->

<div class="modal fade" id="modal_ojtREQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content px-2 py-1">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="float-end mb-1">
        <input id="ojtsearch_input" type="text" class="float-end form-control form-control-sm w-25 m-1"
          placeholder="Search for Student No.">
      </div>
      <div class="table-responsive">
        <table class="students_table table table-bordered table-sm" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th style="width: 35%">Student No.</th>
              <th style="width: 45%">Fullname</th>
              <th style="width: 20%"></th>
            </tr>
          </thead>

          <tbody class="ojtsearch_table">

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>