@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>FAQ Bewerken</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
>
        <div class="form-group">
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Selecteer een categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($faq->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="question">Vraag</label>
            <input type="text" name="question" id="question" class="form-control" 
                   value="{{ old('question', $faq->question) }}" required>
        </div>

    
        <div class="form-group">
            <label for="answer">Antwoord</label>
            <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>
@endsection
