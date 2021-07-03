

    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">{{ isset($note) ? 'Edit Note' : 'Add Note' }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            
        <form class="{{ isset($note) ? 'Note-edit-form' : 'Note-add-form' }}" data-url="{{ isset($note) ? route('edit-note') : route('add-note') }}">
            
            <div class="note note-add mb-4">
                <input id="Note-title"class="form-control mb-3" pattern=".{3,30}" title="Title Must Be Between 3:30 Chars"  type="text" name="title" placeholder="Title" value="{{ isset($note) ? $note->title : '' }}"  required>
                <textarea class="note-editor2" id="Note-text"  name="text" placeholder="Take a note..." >{{ isset($note) ? $note->text : '' }}</textarea>
            </div>

            @isset($note)
                <input  type="hidden"  name="note_id" value="{{ $note->id }}"> 
            @endisset
            
            <input  type="hidden"  name="user_id" value="{{ Auth::user()->id }}" >   
            <button type="submit" class="btn btn-primary">{{ isset($note) ? 'Save' : 'Add' }}</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
            
        </div>
    </div>

<script>
tinymce.init({
            selector:'textarea.note-editor2',
                plugins: 'advlist lists wordcount textpattern ',
            toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | formatselect',
        });
</script>