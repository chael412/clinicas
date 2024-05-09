<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-visitor.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-brown">Visitors
                <button type="button" class="d-none d-sm-inline-block float-right btn btn-sm btn-success shadow-sm m-1"
                    data-toggle="modal" data-target="#modal_visitorADD"><i class="fas fa-plus"></i> Add
                    Visitors</button>
            </h5>
        </div>
        <div class="card-body">

            <?php

            $query = "SELECT vs.v_id, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS visitor_name  FROM visitors vs
            INNER JOIN users AS us ON vs.u_id = us.u_id ORDER BY vs.v_id DESC";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="table-responsive">
                <table id="datatableid" class="visitors_table table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10%">No.</th>
                            <th style="width: 65%">Visitor Name</th>
                            <th style="width: 25%"></th>
                        </tr>
                    </thead>
                    <?php
                    $a = 1;
                    if (mysqli_num_rows($query_run) > 0) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $a++ ?>
                                    </td>

                                    <td>
                                        <?php echo $row['visitor_name']; ?>
                                    </td>

                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col col-lg-2">
                                                <form action="visitor_view.php" method="POST">
                                                    <input type="hidden" name="view_id" value="<?= $row['v_id']; ?>">
                                                    <button disabled type="submit" name="view_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2 mx-1">
                                                <form action="visitor_edit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?= $row['v_id']; ?>">
                                                    <button disabled type="submit" name="edit_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2">
                                                <button disabled type="button" name="del_visitor"
                                                    onclick="deleteVisitor(<?= $row['v_id'] ?>)"
                                                    class="d-none d-sm-inline-block btn btn-sm btn-outline-danger shadow-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php

                        }
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>