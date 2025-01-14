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

        <div class="form-group">
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Choose a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($faq->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" name="question" id="question" class="form-control" 
                   value="{{ old('question', $faq->question) }}" required>
        </div>

    
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>
@endsection
<style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color:#8fc93c;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        ul li {
            margin: 5px 0;
        }
    </style>