
            


        @foreach ($notes as $note)
        
            <div class="note">
                <h6>
                    <strong>{{$note->title}}</strong>
                    <i class="fa fa-trash-alt text-danger note-del" data-id="{{$note->id}}" data-url="{{route('remove-note')}}"></i>
                    <i class="fas fa-edit text-success note-edit" data-id="{{$note->id}}" data-url="{{route('show-note')}}"></i>
                </h6>
                <div class="note-text">{!! $note->text !!}</div>
                <span class="note-date">{{ $note->created_at->format('d-m-Y') }}</span>
            </div>
        
        @endforeach
