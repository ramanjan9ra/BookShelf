<div id="chatbot" class="fixed bottom-5 right-5">
    <div class="bg-white rounded-lg shadow-lg w-80 max-h-96 overflow-hidden" x-data="{ open: false }">
        <button @click="open = !open" class="bg-blue-600 text-white w-full p-3 flex justify-between items-center">
            <span>BookShelf Chatbot</span>
            <svg x-show="!open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
            <svg x-show="open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        
        <div x-show="open" class="flex flex-col" style="height: 300px;">
            <div id="chat-messages" class="flex-1 p-4 overflow-y-auto">
                <div class="mb-2">
                    <div class="bg-blue-100 rounded p-2 inline-block">
                        Hi! I can answer questions about our authors and books. Try asking me:
                        <ul class="list-disc pl-5 mt-1">
                            <li>How many authors are there?</li>
                            <li>How many books are available?</li>
                            <li>List top 5 authors.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-t p-2 flex items-center">
                <input type="text" id="chat-input" placeholder="Ask a question..." 
                       class="flex-1 border rounded px-2 py-1 mr-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="chat-send" class="bg-blue-600 text-white px-3 py-1 rounded">
                    Send
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatInput = document.getElementById('chat-input');
        const chatSend = document.getElementById('chat-send');
        const chatMessages = document.getElementById('chat-messages');
        
        function appendMessage(message, isUser = false) {
            const div = document.createElement('div');
            div.className = 'mb-2 ' + (isUser ? 'text-right' : '');
            
            const innerDiv = document.createElement('div');
            innerDiv.className = isUser 
                ? 'bg-green-100 rounded p-2 inline-block' 
                : 'bg-blue-100 rounded p-2 inline-block';
            
            innerDiv.textContent = message;
            div.appendChild(innerDiv);
            chatMessages.appendChild(div);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        function sendChatbotQuery(query) {
            fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ query: query })
            })
            .then(response => response.json())
            .then(data => {
                appendMessage(data.answer);
            })
            .catch(error => {
                appendMessage('Sorry, I encountered an error.');
                console.error('Error:', error);
            });
        }
        
        chatSend.addEventListener('click', function() {
            const query = chatInput.value.trim();
            if (query) {
                appendMessage(query, true);
                chatInput.value = '';
                sendChatbotQuery(query);
            }
        });
        
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                chatSend.click();
            }
        });
    });
</script>
@endpush
