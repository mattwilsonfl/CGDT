<?php
    if (isset($_SESSION['success']))
        {
    ?>
            <div class="alert alert-success" id='alertArea'>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
                <?php
                    unset($_SESSION['success']);
        }
        /*success alerts stop*/
        

        
        /*danger alerts start*/
        if (isset($_SESSION['danger']))
        {
                ?>
            <div class="alert alert-danger" role="alert">
                <?php
                        echo $_SESSION['danger'];
                        unset($_SESSION['danger']);
        }
                ?>
            </div>