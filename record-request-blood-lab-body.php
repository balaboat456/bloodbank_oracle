<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">
        <div class="card-body">
            <div class="container-fluid">
                

                <div class="form-group col-md-12">
                    <div class="tab">
                        <button type="button" class="tablinks" onclick="openTab(event, '1')"
                            >Result</button>
                        <button type="button" class="tablinks"
                            onclick="openTab(event, '2')" id="defaultOpen">Overview</button>
                    </div>

                    <div id="1" class="tabcontent">
                        <?php include('record-request-blood-lab-tab1.php'); ?>
                    </div>

                    <div id="2" class="tabcontent">
                        <?php include('record-request-blood-lab-tab2.php'); ?>
                    </div>
                </div>

            </div>
        </div><!-- end card-->
    </div>
</div>