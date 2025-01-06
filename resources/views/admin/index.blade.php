<form action="{{ route('admin.newsitems.destroy', $newsitem->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this news item?')">Delete</button>
</form>
