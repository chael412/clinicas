<!-- Add Modal -->
<div class="modal fade" id="modal_foodADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Medical Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="foodform_add">

        <div class="modal-body">

          <div class="form-group d-flex flex-column">
            <label>Student Name</label>
            <input type="hidden" id="sID" class="form-control form-control-sm">
            <a href="#" class="btn btn-primary btn-icon-split">
              <input type="text" id="student_name" class="form-control form-control-sm" disabled>
              <button id="search_food_btn" type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                data-target="#modal_foodREQ">Select</button>
            </a>
          </div>
          <div class="form-group">
            <label>CBC</label>
            <input type="file" id="cbc" class="form-control form-control-sm">
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
          <div class="form-group">
            <label>Screening</label>
            <input type="file" id="screening" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label>Fecalysis</label>
            <input type="file" id="fecalysis" class="form-control form-control-sm">
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"
            data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="submit" id="foodmed_add_btn" name=""
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-save mx-1"></i>Save
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- #################################################################### -->

<div class="modal fade" id="modal_foodREQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <input id="Studentsearch_input" type="text" class="float-end form-control form-control-sm w-25 m-1"
          placeholder="Search for Student No.">
      </div>
      <div class="table-responsive">
        <table class=" table table-bordered table-sm" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th style="width: 35%">Student No.</th>
              <th style="width: 45%">Fullname</th>
              <th style="width: 20%"></th>
            </tr>
          </thead>

          <tbody class="foodsearch_table">

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>