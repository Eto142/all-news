@include('admin.header')
@include('admin.navbar')
<main class="admin-main-content">
    <div class="admin-card max-w-2xl mx-auto">
        <h2 class="admin-card-title mb-4">Chat with {{ $user->first_name }} {{ $user->last_name }}</h2>
        <div id="chat-box" class="h-96 overflow-y-scroll bg-gray-50 p-4 rounded mb-4">
            @include('admin.support.partials.messages', ['messages' => $messages])
        </div>
        <form id="admin-reply-form" class="flex gap-2">
            <textarea id="message-input" name="message" class="form-control flex-1" placeholder="Type your message..."></textarea>
            <button type="submit" class="btn-admin btn-admin-primary">Send</button>
        </form>
    </div>
</main>
<script>
    function updateChat() {
        fetch("{{ route('admin.support.fetch', $user->id) }}")
            .then(response => response.text())
            .then(html => {
                document.getElementById('chat-box').innerHTML = html;
                var chatBox = document.getElementById('chat-box');
                chatBox.scrollTop = chatBox.scrollHeight;
            });
    }
    document.getElementById('admin-reply-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const message = document.getElementById('message-input').value;
        if (message.trim() === '') return;
        fetch("{{ route('admin.support.send', $user->id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: 'message=' + encodeURIComponent(message)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('message-input').value = '';
                updateChat();
            }
        });
    });
    setInterval(updateChat, 5000);
    updateChat();
</script>
@include('admin.footer')
