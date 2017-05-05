<!-- adds the donationPanel -->

<div class='col-md-5'>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h3 class='panel-title'>Add new donation</h3>
        </div>

        <div class='panel-body'>

            <form action='sites/addDonation.php' method='POST' class='form-horizontal'>
            <input type='hidden' name='patientID' value='<?=$patientID?>'>

            <!-- select medicament -->
            <div class='form-group row'>
                <label class='col-sm-3 control-label'>Medicament</label>
                <div class='col-sm-9'>
                    <select class='form-control' name='medicamentID'>
                    <?php

                    $sql = "SELECT * FROM medicament";

                    $statement = $dbh->prepare($sql);
                    $result = $statement->execute();

                    while ($line = $statement->fetch()) {
                        echo "<option value='".$line['medicamentID']."'>".$line['medicament_name']."</option>\n";
                    }

                    ?>
                    </select>
                </div>
            </div>

            <!-- select physician -->
            <div class='form-group row'>
                <label class='col-sm-3 control-label'>Physician</label>
                <div class='col-sm-9'>
                    <select class='form-control' name='physID'>
                    <?php

                    $sql = "SELECT * FROM staff WHERE fonctionID = 2;";

                    $statement = $dbh->prepare($sql);
                    $result = $statement->execute();

                    while ($line = $statement->fetch()) {
                        echo "<option value='".$line['staffID']."'>".$line['username']."</option>\n";
                    }

                    ?>
                    </select>
                </div>
            </div>

            <!-- select nurse -->
            <div class='form-group row'>

                <label class='col-sm-3 control-label text-left'>Nurse</label>
                <div class='col-sm-9'>
                    <select class='form-control' name='nurseID'>
                    <?php

                    $sql = "SELECT * FROM staff WHERE fonctionID = 1;";

                    $statement = $dbh->prepare($sql);
                    $result = $statement->execute();

                    while ($line = $statement->fetch()) {
                        echo "<option value='".$line['staffID']."'>".$line['username']."</option>\n";
                    }

                    ?>
                    </select>
                </div>
            </div>

            <div class='form-group'>
                <label class='col-sm-3 control-label'>Quantity</label>
                <div class='col-sm-9'><input class='form-control' type='text' name='quantity' placeholder='quantity'></div>
            </div>

            <div class='form-group'>
                <label class='col-sm-3 control-label'>Note</label>
                <div class='col-sm-9'><textarea class='form-control' name='note' placeholder='note'></textarea></div>
            </div>


            <div class='form-group'>
                <div class="col-sm-offset-3 col-sm-9">
                <button class="btn btn-default" type='submit'>Add donation</button></form>
                </div>
            </div>
        </div>
    </div>
</div>