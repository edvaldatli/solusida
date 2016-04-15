<?php
    $teljari = 0;

    $data = $class->getCars();

    foreach($data as $row){
        $output[$teljari] = $row['name'];
        $teljari++;
    }
?>

<nav>
    <div class="car-nav container nav-wrapper">
        <div class="row">
            <ul class="">
                <?php
                    for($i = 0; $i <= 6; $i++){
                        echo '<li class="col s2 center"><a href="#" id="' . $i .'">' . $output[$i] . '</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
