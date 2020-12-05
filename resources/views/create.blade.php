
@extends("layout.layout")
@section("content")
    <form  method="post" enctype="multipart/form-data" action="{{route('questions.save')}}">

        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Question</label>
                <input type="name" class="form-control" placeholder="Name" name="question">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Answer 1</label>
                <input type="name" class="form-control" placeholder="Name" name="answer1[]">
                <input type="checkbox" class="d" placeholder="Name" name="answer1[]">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Answer 2</label>
                <input type="name" class="form-control" placeholder="Name" name="answer2[]">
                <input type="checkbox" class="d" placeholder="Name" name="answer2[]">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Answer 3</label>
                <input type="name" class="form-control" placeholder="Name" name="answer3[]">
                <input type="checkbox" class="d" placeholder="Name" name="answer3[]">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Answer 4</label>
                <input type="name" class="form-control" placeholder="Name" name="answer4[]">
                <input type="checkbox" class="d" placeholder="Name" name="answer4[]">
            </div>


        </div>
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

        <script>
            $('input.d').on('change', function() {
                $('input.d').not(this).prop('checked', false);
            });

        </script>
    </form>
@endsection
