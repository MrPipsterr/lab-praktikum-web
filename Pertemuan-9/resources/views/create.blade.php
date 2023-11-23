@include('navigator')

<div class="container mt-5">
    <h2>Add Song Data</h2>
    <form action="{{route('songs.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="artist">Artist:</label>
        <input type="text" class="form-control" id="artist" name="artist" required>
      </div>
      <div class="form-group">
        <label for="album">Album:</label>
        <input type="text" class="form-control" id="album" name="album" required>
      </div>
      <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
      </div>
      <div class="form-group">
        <label for="duration">Duration:</label>
        <input type="text" class="form-control" id="duration" name="duration" required>
      </div>
      <button type="submit" class="btn btn-primary mt-2" onclick="return confirm('Apakah Anda yakin melakukan tindakan ini?')">Submit</button>
    </form>
</div>