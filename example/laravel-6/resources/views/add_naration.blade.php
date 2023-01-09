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
    <h1>Add Naration </h1>
    <form action="{{url('add_naration')}}" method="post">
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
                <option>Select Chapter</option>
            </select>
        </div>

        <div class="form-group">
            <label for="naration">Naration</label>
            <textarea class="form-control" id="naration" name="naration" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">subject</th>
                    <th scope="col">chapter</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($naration as $n) { ?>
                <tr>
                    <th scope="row"><?php echo $n->id ?></th>
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
                $.each(res,function(key, value)
                {
                    $select.append('<option value=' + value.id + '>' + value.title + '</option>');
                });
            });
        });

    });
    


</script>

</body>

</html>