<h2>Select a location and show the amount of the cars that are there:</h2>
<form action="task7.php" method="post">
    <div class="select">
        <select name="locValue">
            <option> -- Select location -- </option>
            <option value="11">Location 1</option>
            <option value="12">Location 2</option>
            <option value="13">Location 3</option>
            <option value="14">Location 4</option>
            <option value="15">Location 5</option>
            <option value="16">Location 6</option>
            <option value="17">Location 7</option>
        </select>
            <div class="select_arrow">
            </div>
    </div>
    <div>
        <span class="input-group-btn">
                <input class="btn btn-color" type="submit" name="submit" value="Count cars at selected location" />
        </span>
    </div>
</form>

<!-- <button type="button" class="btn btn-outline-dark btn-md btn-block" id="toggleFn">Click to toggle details</button> -->
<div class="row col-xs-12 col-sm-12 col-md-6 col-lg-9 col-xl-12">