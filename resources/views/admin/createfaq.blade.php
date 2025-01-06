@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Create FAQ</h1>
        <form method="POST" action="{{ route('faqs.store') }}">
            @csrf

            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
                @error('question')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea>
                @error('answer')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create FAQ</button>
        </form>
    </div>
@endsection