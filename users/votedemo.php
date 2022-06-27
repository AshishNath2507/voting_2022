<div class="col">
    <p class="fs-3">Boys Common Room Secretary</p>
    <?php
    $sql =  "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'candidate' AND u.cand_post = 'Boys Common Room Secretary'";

    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="form-check">

            <input class="form-check-input" type="radio" name="bcrs" id="bcrs" value="<?php echo $row['user_id']; ?>" required />
            <label class="form-check-label" for="bcrs">
                <?php echo $row['name']; ?>
            </label>
            <img src="<?php echo  $row['photo']; ?>" alt="img" style="width: 10%;">
        </div>
    <?php
        $_SESSION['cand_post'] = $row['cand_post'];
        $_SESSION['voted'] = $row['voted'];
    };
    ?>
</div>
<div class="col">
    <p class="fs-3">President</p>
    <?php
    $sql =  "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'candidate' AND u.cand_post = 'President'";

    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="form-check">

            <input class="form-check-input" type="radio" name="pres" id="pres" value="<?php echo $row['user_id']; ?>" required />
            <label class="form-check-label" for="pres">
                <?php echo $row['name']; ?>
            </label>
            <img src="<?php echo  $row['photo']; ?>" alt="img" style="width: 10%;">
        </div>
    <?php
        $_SESSION['cand_post'] = $row['cand_post'];
        $_SESSION['voted'] = $row['voted'];
    };
    ?>
</div>