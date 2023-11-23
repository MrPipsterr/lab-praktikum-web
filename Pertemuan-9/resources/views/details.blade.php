  @include('navigator')


<div class="container mt-5">
    <h2>Song Detail</h2>
      @csrf
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" value="{{$song->title}}" name="title" disabled>
      </div>
      <div class="form-group">
        <label for="artist">Artist:</label>
        <input type="text" class="form-control" id="artist" name="artist" disabled value="{{$song->artist}}">
      </div>
      <div class="form-group">
        <label for="album">Album:</label>
        <input type="text" class="form-control" id="album" name="album" disabled value="{{$song->album}}">
      </div>
      <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" class="form-control" id="genre" name="genre" disabled value="{{$song->genre}}">
      </div>
      <div class="form-group">
        <label for="duration">Duration:</label>
        <input type="text" class="form-control" id="duration" name="duration" disabled value="{{$song->duration}}">
      </div>
</div>