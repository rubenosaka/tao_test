<div class="row tao-filters">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-8">
                <h2>Load Data...</h2>
                <p>Click on the buttons to make an AJAX request</p>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="select_limit">Limit:</label>
                    <select class="form-control" id="select_limit">
                        <option value="-1" selected>All</option>
                        <option value="10">10</option>    
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>             
        </div>
        <div class="row text-center mt-5">
            <div class="col-4">
                <a id="load-data-json" href="#" class="btn tao-btn js-load-data" data-type="json" onclick="getOutput('json', null, 'src/users/user-ajax.php', event);">...from JSON</a>
            </div>
            <div class="col-4">
                <a id="load-data-csv" href="#" class="btn tao-btn js-load-data" data-type="csv" onclick="getOutput('csv', null, 'src/users/user-ajax.php', event);">...from CSV</a>
            </div>
            <div class="col-4">
                <a id="load-data-api" href="#" class="btn tao-btn js-load-data" data-type="api" onclick="getOutput('api', null, 'src/users/user-ajax.php', event);">...from API</a>
            </div>            
        </div>
    </div>            
</div>  