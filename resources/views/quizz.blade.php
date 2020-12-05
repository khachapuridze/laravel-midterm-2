@extends("layout.layout")
@section("content")

    <form method="post" action="{{route('logout')}}">
        @csrf

        <button type="submit" class="btn btn-primary">logout</button>
    </form>
    <form  method="post" enctype="multipart/form-data" action="{{route('questions.append')}}">
        @foreach ($questions as $question)
        <div class="box-body ">

            <p>{{$question->question}}</p>


            @foreach($question -> answers  as $answer)
            <div>

                <input type="checkbox" class="{{$question->id}}" value="{{$answer->id}}"  name="{{$answer->id}}">
                <label for="scales">{{ $answer->answer  }}</label>

            </div>
            @endforeach



        </div>

            <script>
                $('input.{{$question->id}}').on('change', function() {
                    $('input.{{$question->id}}').not(this).prop('checked', false);
                });

            </script>
        @endforeach
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">კითხვარის დასრულება</button>
        </div>
    </form>
@endsection
