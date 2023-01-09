<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hello, world!</title>
    <!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->
</head>

<body style="margin:2% 20%">
    <h1>Add Chapter </h1>
    <form action="{{url('chapter_post')}}" method="post">
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
            <label for="exampleFormControlTextarea1">Title</label>
            <input type='text' class="form-control" id="title" name="title" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>



        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">subject</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chapters as $n) { ?>
                <tr>
                    <th scope="row"><?php echo $n->id ?></th>
                    <td><?php echo $n->title ?></td>
                    <td><?php echo $n->subject_id ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        

    </form>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>