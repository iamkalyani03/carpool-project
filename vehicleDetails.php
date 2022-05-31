<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Vehicle Name</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php
                        if(isset($_SESSION['vname'])){
                            echo $_SESSION['vname'];
                        }
                        else {
                            echo $error;
                        }
                        ?>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Vehicle Number</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php
                                                if(isset($_SESSION['vnumber'])){
                                                    echo $_SESSION['vnumber'];
                                                }
                                                else {
                                                    echo $error;
                                                }
                                                ?>

                </p>
            </div>
        </div>
    </div>
</div>