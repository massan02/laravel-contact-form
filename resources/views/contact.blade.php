<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>
</head>
<body>
    <h1>お問い合わせ</h1>

    <form action="/" method="post">
        @csrf
        <div>
            <label for="name">名前</label>
            <input id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">メール</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="body">お問い合わせ内容</label>
            <textarea id="body" name="body" required>{{ old('body') }}</textarea>
            @error('body')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">送信</button>
    </form>
</body>
</html>