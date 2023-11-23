<!-- resources/views/song.blade.php -->

@include('navigator')

@section('title', 'Book')

<table class="table table-hover">
  <thead>
    <tr class="text-center">
      <th scope="col">Song Title</th>
      <th scope="col">Artist</th>
      <th scope="col">Genre</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($songs as $song)
    <tr>
      <td style="padding-left: 30px">{{$song->title}}</td>
      <td>{{$song->artist}}</td>
      <td>{{$song->genre}}</td>
      <td>
        <!-- Detail Button -->
        {{-- <a class="btn btn-info btn-sm">Detail</a> --}}
        <a href="{{ route('songs.details', $song->id) }}" class="btn btn-info btn-sm">Detail</a>

        <!-- Edit Button -->
        {{-- <a class="btn btn-primary btn-sm">Edit</a> --}}
        <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-primary btn-sm">Edit</a>

        <!-- Delete Button -->
        {{-- <form method="post" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
        </form> --}}
        <form action="{{ route('songs.destroy', $song->id) }}" method="post" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
