        <!-- Limit Select -->
            <form class="form-inline" method='post' action=''>
                <br/>
                <div class="form-group">
                    <label>Limit Now is : <?= $limit ?></label>
                    <select name="limit" required>
                        <option value="0" disabled selected >--Change Results Per Page--</option>
                        <option value="5"> 5 </option>
                        <option value="10"> 10 </option>
                        <option value="15"> 15 </option>
                        <option value="20"> 20 </option>
                        <option value="25"> 25 </option>
                   </select>
                </div>
                <div class="form-group">
                    <input type='submit' class="btn btn-info" name='btn_limit' value='Display'>
                </div>
            </form>