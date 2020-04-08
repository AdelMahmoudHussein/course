<!-- Search filter -->
            <form class="form-inline" method='GET' action=''>
                <div class="form-group">
                    <label>Start Date : </label>
                    <input type='text' class='dateFilter form-control' name='fromDate' value='<?php if(isset($_REQUEST['fromDate'])) echo $_REQUEST['fromDate']; ?>'>
                </div>
                <div class="form-group">
                    <label>End Date : </label>
                    <input type='text' class='dateFilter form-control' name='endDate' value='<?php if(isset($_REQUEST['endDate'])) echo $_REQUEST['endDate']; ?>'>
                </div>
                <div class="form-group">
                    <label>Gender :</label>
                    <select name="gender" required>
                        <option value="both" <?= (!isset($_REQUEST['gender']) || (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 'both')) ? "selected" : ""; ?> > Male & Female </option>
                        <option value="male" <?= (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 'male') ? "selected" : ""; ?> > Male Only </option>
                        <option value="female" <?= (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 'female') ? "selected" : ""; ?> > Female Only </option>
                   </select>
                </div>
                <div class="form-group">
                    <input type='submit' class="btn btn-info" name='but_search'>
                </div>
            </form>