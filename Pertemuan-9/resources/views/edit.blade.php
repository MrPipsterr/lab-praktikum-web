@include('navigator')
<div class="container mt-5">
    <h2>Edit Song Data</h2>
    <form action="{{route('songs.update', ['id' => $song->id])}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" value="{{ $song -> title }}" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="artist">Artist:</label>
        <input type="text" class="form-control" value="{{ $song -> artist }}" id="artist" name="artist" required>
      </div>
      <div class="form-group">
        <label for="album">Album:</label>
        <input type="text" class="form-control" value="{{ $song -> album }}" id="album" name="album" required>
      </div>
      <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" class="form-control" value="{{ $song -> genre }}" id="genre" name="genre" required>
      </div>
      <div class="form-group">
        <label for="duration">Duration:</label>
        <input type="text" class="form-control" value="{{ $song -> duration }}" id="duration" name="duration" required>
      </div>
      <button type="submit" class="btn btn-primary mt-2" onclick="return confirm('Apakah Anda yakin melakukan tindakan ini?')">Submit</button>
    </form>
</div>