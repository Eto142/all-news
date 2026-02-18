@foreach($messages as $msg)
    <div class="mb-2 flex {{ $msg->is_admin ? 'justify-end' : 'justify-start' }}">
        <div class="rounded-lg px-4 py-2 {{ $msg->is_admin ? 'bg-black text-white' : 'bg-purple-600 text-white' }} max-w-[70%]">
            <div class="text-xs text-gray-500 mb-1 flex items-center">
                {{ $msg->is_admin ? 'Admin' : 'User' }} • {{ $msg->created_at->format('M d, H:i') }}
                @if($msg->is_admin)
                    <button class="ml-2 text-xs font-bold bg-transparent border-none cursor-pointer" style="color:#22c55e;text-shadow:0 1px 2px #333;" onclick="editMessage({{ $msg->id }}, '{{ addslashes($msg->message) }}')">Edit</button>
                    <button class="ml-2 text-xs font-bold bg-transparent border-none cursor-pointer" style="color:#ef4444;text-shadow:0 1px 2px #333;" onclick="deleteMessage({{ $msg->id }})">Delete</button>
                @endif
            </div>
            <div id="msg-content-{{ $msg->id }}">{{ $msg->message }}</div>
        </div>
        <script>
        function editMessage(id, message) {
            const msgDiv = document.getElementById('msg-content-' + id);
            msgDiv.innerHTML = `<input type='text' id='edit-input-${id}' value='${message}' class='form-control' style='width:80%;display:inline-block;'> <button onclick='saveEdit(${id})' class='btn-admin btn-admin-sm btn-admin-primary'>Save</button>`;
        }
        function saveEdit(id) {
            const newMsg = document.getElementById('edit-input-' + id).value;
            fetch(`/admin/chats/message/${id}/edit`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: 'message=' + encodeURIComponent(newMsg)
            }).then(() => { window.location.reload(); });
        }
        function deleteMessage(id) {
            if(confirm('Delete this message?')) {
                fetch(`/admin/chats/message/${id}/delete`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(() => { window.location.reload(); });
            }
        }
        </script>
        </div>
    </div>
@endforeach
