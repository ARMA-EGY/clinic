            @foreach(range(1, 50) as $n)
                @if (in_array($n, $appointments))
                    <a href="javascript:void(0)" class="btn mx-1 mb-2 btn-grey disabled">{{$n}}</a>
                @else 
                    <a href="javascript:void(0)" class="btn mx-1 mb-2 available-time" data-value="{{$n}}">{{$n}}</a>
                @endif
            @endforeach