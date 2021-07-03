
            


        @foreach ($todos as $todo)
        
            <li class="down @if ($todo->done == 1) done @endif">
                <a  class="check-button" data-done="{{$todo->done}}" data-id="{{$todo->id}}" data-url="{{route('edit-todo')}}">
                <i class="@if ($todo->done == 1) fa fa-check-circle @else fas fa-circle-notch @endif "></i>
                </a>
                <div class="todo-task">
                    <p class=" @if ($todo->done == 1) line-through @endif">{{ ucfirst(trans($todo->task)) }}</p>
                </div>
                <a  class="delete-button" data-del="{{$todo->id}}" data-url="{{route('remove-todo')}}">
                <i class="fa fa-times-circle"></i>
                </a>
            </li>
        
        @endforeach
