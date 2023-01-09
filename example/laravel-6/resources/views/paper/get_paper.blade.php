<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .table td{
            border:none;
        }
        .table td, .table th{
            padding: 0.4rem;
        }
    </style>
</head>

<body style="">
    <h6>Question Paper: <?php echo $subject['title'] . ' : ' . $chapter['title'] ?> </h6>
    
        <table class="table">
            <thead>
                <!-- <tr>
                    <th scope="col" style="width:5%">#</th>
                    <?php 
                        if($image == 1 && !empty($n['image'])){ 
                    ?>
                    <th scope="col" style="width:5%">Image</th>
                    <?php } ?>
                    
                    <th scope="col" style="width:60%">title</th>
                </tr> -->
            </thead>
            <tbody>
                <?php
                $i=1;
                $naration = '';
                $is_show = false;
                foreach ($questions as $n) { 
                ?>
                <tr>
                    <td>
                        <?php
                            if($naration == '' || $naration != $n['naration']['title'] ){
                                $naration = $n['naration']['title'];
                                if(!empty($naration)){
                                    $is_show = true;
                                    echo '<p>##</p>';
                                } 
                            } else {
                                $is_show = false;
                            }
                        ?>
                        <?php echo $i; ?>
                    </td>
                    
                    <?php 
                        if($image == 1 && !empty($n['image'])){ 
                    ?>
                    <td>
                        <img src="<?php echo $n['image'] ?>" style="width:100px" />
                    </td>
                    <?php } ?>
                    
                    <td>
                        <?php if($is_show) { ?>
                            <p><b>"<?php echo $naration; ?>"</b></p>
                        <?php } ?>

                        <?php echo $n['title'] ?>

                        <?php
                            echo $n['question_type']==1?"[ True / False ]":'';
                        ?>

                        <?php
                            if(!empty($n['options'])){
                                echo '<br/>'.$n['options'];
                            }
                        ?>
                    </td>
                </tr>
                <?php $i++; } ?>
                <tr>
                    <td colspan="3">
                        <table class="table" style="width:40%;">
                            <tr>
                                <td>
                                <ol style="display: inline-block;list-style-type: decimal;">
                                    <?php 
                                        if(!empty($column_a)) {
                                            foreach($column_a as $a){
                                    ?>
                                                <li><?php echo $a; ?></li>
                                    <?php } } ?>
                                </ol>
                                </td>
                                <td>
                                <ol style="display: inline-block;list-style-type: lower-alpha;">
                                    <?php 
                                        if(!empty($column_b)) {
                                            foreach($column_b as $a){
                                    ?>
                                                <li><?php echo $a; ?></li>
                                    <?php } } ?>
                                </ol>
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
            </tbody>
        </table>        

    </form>

<script  src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>

</html>