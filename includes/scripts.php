<!-- Bootstrap core JavaScript-->
<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="./assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="./assets/js/demo/chart-area-demo.js"></script>
<script src="./assets/js/demo/chart-pie-demo.js"></script>

<!-- Ajax -->
<!-- jQuery library -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/js/sweet.js"></script>
<script src="./ajax.js"></script>

<!-- Datatables -->
<script>
    $(document).ready(function () {
        $('#datatableid').DataTable();
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#equipment_div").load("all_eq.php");
        $("#categ_dropdown").change(function () {
            var selected = $(this).val();
            $("#event_div").load("event.php", { selected_categ: selected });
        });
        // $("#refresh").click(function(){
        //     $("#equipment_div").load("all_eq.php");
        // });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#equipment1_div").load("all_eq.php");
        $("#categ1_dropdown").change(function () {
            var selected = $(this).val();
            $("#event1_div").load("event1.php", { selected_categ: selected });
        });
        // $("#refresh").click(function(){
        //     $("#equipment_div").load("all_eq.php");
        // });
    });
</script>

<!--     <script>
        function text(x) {
            // Student
            if (x == 0)document.getElementById("course_div").style.display="block";
            else document.getElementById("course_div").style.display="none";
            if (x == 0)document.getElementById("section_div").style.display="block";
            else document.getElementById("section_div").style.display="none";
            if (x == 0)document.getElementById("dept_div").style.display="block";
            else document.getElementById("dept_div").style.display="none";
            if (x == 0)document.getElementById("office_div").style.display="none";
            if (x == 0)document.getElementById("school_div").style.display="none";

           // Faculty or Staff
            if (x == 1)document.getElementById("office_div").style.display="block";
            else document.getElementById("office_div").style.display="none";
            if (x == 1)document.getElementById("school_div").style.display="none";

            // Visitor
             if (x == 2)document.getElementById("school_div").style.display="block";
            else document.getElementById("school_div").style.display="none";
            if (x == 2)document.getElementById("office_div").style.display="none";
            return;
        }
    </script> -->



<!-- ################################################## -->