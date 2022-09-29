@foreach($comments as $comment)
    <div>
        <strong>{{ $comment->users->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" ></a>
        <form method="post" action="https://update3.downlater.net/{{ route('reply.add') }}">
            @csrf
            <div >
                <input type="text" name="comment_body"  />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div >
                <input type="submit"  value="Reply" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach