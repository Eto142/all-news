<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Shared Posts</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<style>
		body { background: #f0f2f5; font-family: 'Roboto', Arial, sans-serif; }
		.container { max-width: 800px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 16px rgba(0,0,0,0.13); padding: 32px; }
		.post { margin-bottom: 32px; border-bottom: 1px solid #e4e6eb; padding-bottom: 24px; }
		.post:last-child { border-bottom: none; }
		.post-image { width: 100%; max-height: 320px; object-fit: cover; border-radius: 8px; background: #e4e6eb; }
		.post-writeup { font-size: 20px; font-weight: bold; margin: 16px 0 8px 0; color: #050505; }
		.post-link { color: #1877f2; font-size: 15px; word-break: break-all; }
	</style>
</head>
<body>
	<div class="container">
		<h1 style="text-align:center;">All Shared Posts</h1>
		@if($posts->count())
			@foreach($posts as $post)
				<div class="post">
					<img src="/{{ $post->image }}" class="post-image" alt="Shared Image">
					<div class="post-writeup">{{ $post->writeup }}</div>
					<a href="{{ url('/facebook/share/r/'.$post->token.'?mibextid=wwXIfr') }}" class="post-link" target="_blank">{{ url('/facebook/share/r/'.$post->token.'?mibextid=wwXIfr') }}</a>
				</div>
			@endforeach
		@else
			<p style="text-align:center;">No shared posts found.</p>
		@endif
	</div>
</body>
</html>
