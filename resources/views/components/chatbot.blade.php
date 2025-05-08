<div id="chatbot" class="fixed bottom-5 right-5 z-50" x-data="{ open: false }">
    <div class="bg-white rounded-xl shadow-xl w-80 max-h-96 overflow-hidden transition-all duration-300 transform" 
         :class="open ? 'scale-100 opacity-100' : 'scale-95 opacity-0'" 
         x-show="open" 
         x-transition 
         @click.away="open = false">
        
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-4 flex justify-between items-center">
            <div class="flex items-center">
                <i class="fas fa-robot text-xl mr-2"></i>
                <span class="font-medium">BookShelf Assistant</span>
            </div>
            <button @click="open = false" class="text-white hover:bg-white hover:bg-opacity-20 rounded p-1 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="flex flex-col" style="height: 320px;">
            <div id="chat-messages" class="flex-1 p-4 overflow-y-auto space-y-3">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-indigo-100 rounded-full p-2 mr-3">
                        <i class="fas fa-robot text-indigo-600"></i>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 max-w-[85%]">
                        <p class="text-gray-800 text-sm">Hi! I can answer questions about our authors and books. Try asking me:</p>
                        <ul class="list-disc pl-4 mt-2 text-sm text-gray-600 space-y-1">
                            <li>How many authors are there?</li>
                            <li>How many books are available?</li>
                            <li>List top 5 authors.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-t p-3 bg-gray-50">
                <div class="flex items-center">
                    <input type="text" id="chat-input" placeholder="Ask a question..." 
                           class="flex-1 border rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500">
                    <button id="chat-send" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-r-lg px-4 py-2 transition">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chat bubble button -->
    <button @click="open = !open" 
            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full p-4 shadow-lg hover:shadow-xl transition transform hover:scale-105" 
            :class="{'rotate-45': open}">
        <i class="fas" :class="open ? 'fa-times' : 'fa-comment-dots'"></i>
    </button>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatInput = document.getElementById('chat-input');
        const chatSend = document.getElementById('chat-send');
        const chatMessages = document.getElementById('chat-messages');
        
        function appendMessage(message, isUser = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start';
            
            if (isUser) {
                messageDiv.innerHTML = `
                    <div class="ml-auto flex items-start">
                        <div class="bg-indigo-600 text-white rounded-lg p-3 max-w-[85%]">
                            <p class="text-sm">${message}</p>
                        </div>
                        <div class="flex-shrink-0 bg-indigo-100 rounded-full p-2 ml-3">
                            <i class="fas fa-user text-indigo-600"></i>
                        </div>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="flex-shrink-0 bg-indigo-100 rounded-full p-2 mr-3">
                        <i class="fas fa-robot text-indigo-600"></i>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 max-w-[85%]">
                        <p class="text-gray-800 text-sm">${message}</p>
                    </div>
                `;
            }
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        
        function handleSend() {
            const message = chatInput.value.trim();
            if (message) {
                appendMessage(message, true);
                chatInput.value = '';
                
                // Show typing indicator
                const typingIndicator = document.createElement('div');
                typingIndicator.id = 'typing-indicator';
                typingIndicator.className = 'flex items-start';
                typingIndicator.innerHTML = `
                    <div class="flex-shrink-0 bg-indigo-100 rounded-full p-2 mr-3">
                        <i class="fas fa-robot text-indigo-600"></i>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 max-w-[85%]">
                        <p class="text-gray-800 text-sm">Thinking<span class="typing-dots">...</span></p>
                    </div>
                `;
                chatMessages.appendChild(typingIndicator);
                chatMessages.scrollTop = chatMessages.scrollHeight;
                
                // Make AJAX call to ChatbotController
                fetch('/chatbot/query', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ query: message })
                })
                .then(response => response.json())
                .then(data => {
                    // Remove typing indicator
                    const typingIndicator = document.getElementById('typing-indicator');
                    if (typingIndicator) {
                        typingIndicator.remove();
                    }
                    
                    // Display response from server
                    appendMessage(data.answer);
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Remove typing indicator
                    const typingIndicator = document.getElementById('typing-indicator');
                    if (typingIndicator) {
                        typingIndicator.remove();
                    }
                    
                    appendMessage("Sorry, I'm having trouble connecting right now. Please try again later.");
                });
            }
        }
        
        chatSend.addEventListener('click', handleSend);
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                handleSend();
            }
        });
    });
</script>

<style>
    .typing-dots {
        animation: typingDots 1.5s infinite;
    }
    
    @keyframes typingDots {
        0%, 20% { content: "."; }
        40% { content: ".."; }
        60%, 100% { content: "..."; }
    }
</style>
@endpush
