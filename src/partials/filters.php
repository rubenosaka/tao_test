<div class="row tao-filters">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <h2>Load Data...</h2>
            </div>            
        </div>
        <div class="row text-center mt-3">
            <div class="col-sm-4">
                <a id="load-data-json" href="#" class="btn tao-btn js-load-data" data-type="json" onclick="getOutput('json', null, 'src/users/user-ajax.php', event);">...from JSON</a>
            </div>
            <div class="col-sm-4">
                <a id="load-data-csv" href="#" class="btn tao-btn js-load-data" data-type="csv" onclick="getOutput('csv', null, 'src/users/user-ajax.php', event);">...from CSV</a>
            </div>
            <div class="col-sm-4">
                <a id="load-data-api" href="#" class="btn tao-btn js-load-data" data-type="api" onclick="getOutput('api', null, 'src/users/user-ajax.php', event);">...from API</a>
            </div>            
        </div>
    </div>            
</div>  