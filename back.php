<?php
require './connect.php';

// $sql = "SELECT * FROM posts ORDER BY p_id ASC";
// $query = $con->query($sql);
// while ($row = $query->fetch_assoc()) {
//     $sql = "SELECT * FROM users WHERE cand_post = '" . $row['p_name'] . "'";
//     $cquery = $con->query($sql);
//     $carray = array();
//     $varray = array();
//     while ($crow = $cquery->fetch_assoc()) {
//         array_push($carray, $crow['name']);
//         $sql = "SELECT * FROM cand_pc WHERE candidate_id = '" . $crow['id'] . "'";
//         $vquery = $con->query($sql);
//         array_push($varray, $vquery->num_rows);
//     }
//     $carray = json_encode($carray);
//     $varray = json_encode($varray);

// echo "<pre>'" .$carray. "'</pre>";
// echo "<pre>'" .$varray. "'</pre>";
// }
?>
<input type="date" id="dob">
<script>
    let dob = document.getElementById('dob').value
    let date = new Date();
    dob.addEventListener('onchange', () => {

        alert(dob);
        let final = dob - date;
        console.log(final);
    })

    
</script>