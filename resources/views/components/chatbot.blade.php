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
                
                // Simulate response (you can replace this with actual AJAX call)
                setTimeout(() => {
                    let response;
                    const lcMessage = message.toLowerCase();
                    
                    if (lcMessage.includes('how many authors')) {
                        response = "We have several talented authors in our collection. You can view them all in the Authors section!";
                    } else if (lcMessage.includes('how many books')) {
                        response = "Our collection includes multiple books across various genres. Check out the Books section to see them all!";
                    } else if (lcMessage.includes('top 5 authors') || lcMessage.includes('list top 5')) {
                        response = "Here are some of our popular authors: Jane Austen, Gabriel García Márquez, Haruki Murakami, and more!";
                    } else {
                        response = "I'm not sure how to answer that. Try asking about our authors or books collection!";
                    }
                    
                    appendMessage(response);
                }, 1000);
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
@endpush
