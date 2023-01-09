<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body style="margin:2% 20%">
    <h1>Add Question </h1>
    <form action="{{url('add_question')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="subject">Subject</label>
            <select class="form-control" id="subject" name="subject">
                <option>Select Subject</option>
                <?php foreach($subjects as $sub){ ?>
                <option value="<?php echo $sub->id; ?>"><?php echo $sub->title; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="chapter">Chapter</label>
            <select class="form-control" id="chapter" name="chapter">
                <option value="">Select Chapter</option>
            </select>
        </div>

        <div class="form-group">
            <label for="chapter">Naration</label>
            <select class="form-control" id="naration" name="naration">
                <option value="">Select Naration</option>
            </select>
        </div>

        <div class="form-group">
            <label for="question_type">Question Type</label>
            <select required class="form-control" id="question_type" name="question_type">
                <option value="">Select question_type</option>
                <?php foreach($question_type as $qt){ ?>
                <option value="<?php echo $qt->id; ?>"><?php echo $qt->title; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Image</label>
            <input type='text' class="form-control" id="image" name="image" />
        </div>
        <div class="form-group">
            <label for="question">question</label>
            <textarea class="form-control" id="question" name="question" rows="3"></textarea>
        </div>

        <div class="form-group option_block" style="display:none;">
            <label for="exampleFormControlTextarea1">Options (use | sign as seprator)</label>
            <input type='text' class="form-control" id="options" name="options" />
        </div>

        <div class="form-group column_block" style="display:none;">
            <label for="exampleFormControlTextarea1">Column A (use | sign as seprator)</label>
            <input type='text' class="form-control" id="column_a" name="column_a" />
        </div>
        <div class="form-group column_block" style="display:none;">
            <label for="exampleFormControlTextarea1">Column B (use | sign as seprator)</label>
            <input type='text' class="form-control" id="column_b" name="column_b" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">title</th>
                    <th scope="col">subject</th>
                    <th scope="col">chapter</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $n) { ?>
                <tr>
                    <td>
                        <?php 
                            if(!empty($n->image)){ 
                    ?>
                        <img src="<?php echo $n->image ?>" style="width:50px" />
                    <?php } ?>
                    </td>
                    <td><?php echo $n->id ?></th>
                    <td><?php echo $n->title ?></td>
                    <td><?php echo $n->subject_id ?></td>
                    <td><?php echo $n->chapter_id ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>        

    </form>

<script  src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('#subject').change(function(d){
            var subject_id = (d.target.value);
            $.ajax({
                url: "{{url('ajax/get_chapter')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    subject_id:subject_id
                },
                type: "post",
                dataType: 'json'
            }).done(function(res){
                console.log(res.subject_id);

                var $select = $('#chapter');
                $select.find('option').remove();
                $select.append('<option value="">Select</option>');
                $.each(res,function(key, value)
                {
                    $select.append('<option value=' + value.id + '>' + value.title + '</option>');
                });
            });
        });
        
        $('#question_type').change(function(d){
            var type_id = parseInt(d.target.value);
            console.log(type_id);
            switch(type_id){
                case 3:{
                    $('.option_block').css({"display":'block'});
                    $('.column_block').css({"display":'none'});
                    break;
                }
                case 6:{
                    $('.option_block').css({"display":'none'});
                    $('.column_block').css({"display":'block'});
                    break;
                }
                default:{
                    $('.option_block').css({"display":'none'});
                    $('.column_block').css({"display":'none'});
                }
            }
        });

        $('#chapter').change(function(d){
            var chapter_id = (d.target.value);
            var subject_id = $('#subject').val();
            if(chapter_id != ''){
                $.ajax({
                    url: "{{url('ajax/get_naration')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        subject_id:subject_id,
                        chapter_id: chapter_id
                    },
                    type: "post",
                    dataType: 'json'
                }).done(function(res){
                    console.log(res.subject_id);

                    var $select = $('#naration');
                    $select.find('option').remove();
                    $select.append('<option value="">Select</option>');
                    $.each(res,function(key, value)
                    {
                        $select.append('<option value=' + value.id + '>' + value.title + '</option>');
                    });
                });
            }
            
        });

    });
    


</script>

</body>

</html>