<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JogFarm</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            
        }
        main {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
            flex: 1;
        }
        .chat-list {
            width: 30%;
            max-width: 350px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .chat-list-header {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chat-list-header h2 {
            margin: 0;
            font-size: 20px;
        }
        .chat-list-header .options-button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
        .chat-list .filters {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
        }
        .chat-list .filters button {
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            background-color: #e1e1e1;
            cursor: pointer;
        }
        .chat-list .filters button.active {
            background-color: #28a745;
            color: white;
        }
        .chat-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .chat-item:hover {
            background-color: #f1f1f1;
        }
        .chat-item.active {
            background-color: #e9e9e9;
        }
        .chat-item h4 {
            margin: 0 0 5px;
            font-size: 16px;
        }
        .chat-item p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }
        .chat-item .chat-options {
            display: none;
        }
        .chat-item:hover .chat-options {
            display: block;
        }
        .chat-window {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #fff;
        }
        .chat-header {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .chat-header h3 {
            margin: 0;
            font-size: 18px;
        }
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
        }
        .message {
            margin-bottom: 15px;
        }
        .message p {
            margin: 5px 0;
        }
        .message.sent {
            text-align: right;
        }
        .message.sent .message-content {
            background-color: #dcf8c6;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
        }
        .message.received .message-content {
            background-color: #fff;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .chat-input {
            display: flex;
            padding: 15px;
            border-top: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .chat-input input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .chat-input button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .chat-input button:hover {
            background-color: #218838;
        }
        .empty-chat {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>
    
    @include('part.header')

    <main>
        <div class="chat-list">
            <div class="chat-list-header">
                <h2>KOTAK MASUK</h2>
                <button class="options-button">⋮</button>
            </div>
            <div class="filters">
                <button class="active">Semua</button>
                <button>Pertemuan</button>
                <button>Belum Dibaca</button>
                <button>Penting</button>
            </div>
            <div class="chat-item active" data-chat-id="1">
                <div>
                    <h4>UTY Farm</h4>
                    <p>lokasi mana gan?</p>
                </div>
                <div class="chat-options">
                    <button class="option-button">⋮</button>
                </div>
            </div>
            <div class="chat-item" data-chat-id="2">
                <div>
                    <h4>Ternak Ayam Jogja</h4>
                    <p>Nego??</p>
                </div>
                <div class="chat-options">
                    <button class="option-button">⋮</button>
                </div>
            </div>
            <div class="chat-item" data-chat-id="3">
                <div>
                    <h4>SetiaFarm</h4>
                    <p>Hai, ada yang bisa saya bantu?</p>
                </div>
                <div class="chat-options">
                    <button class="option-button">⋮</button>
                </div>
            </div>
        </div>
        <div class="chat-window">
            <div class="chat-header">
                <h3>UTY Farm</h3>
                <button class="options-button">⋮</button>
            </div>
            <div class="chat-messages" id="chatMessages">
                <div class="empty-chat">Pilih chat untuk melihat percakapan</div>
            </div>
            <div class="chat-input">
                <input type="text" id="messageInput" placeholder="Ketik pesan...">
                <button type="button" id="sendButton">Kirim</button>
            </div>
        </div>
    </main>
        
    @include('part.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatItems = document.querySelectorAll('.chat-item');
            const chatHeader = document.querySelector('.chat-header h3');
            const chatMessages = document.getElementById('chatMessages');
            const messageInput = document.getElementById('messageInput');
            const sendButton = document.getElementById('sendButton');

            const chats = {
                1: [
                    { type: 'received', content: 'Halo, ada yang bisa dibantu?' },
                    { type: 'sent', content: 'Info Produk Sapi berkualitas gan' },
                    { type: 'received', content: 'Ready nih, mau yg berat berapa??' },
                    { type: 'sent', content: '1 ton' },
                    { type: 'sent', content: 'lokasi mana gan?' }

                ],
                2: [
                    { type: 'sent', content: 'Nego??' }
                ],
                3: [
                    { type: 'sent', content: 'P??' },
                    { type: 'received', content: 'Hai, ada yang bisa saya bantu?' }
                ]
            };

            chatItems.forEach(item => {
                item.addEventListener('click', function() {
                    const chatId = this.getAttribute('data-chat-id');

                    document.querySelector('.chat-item.active').classList.remove('active');
                    this.classList.add('active');
                    chatHeader.textContent = `Chat dengan Penjual ${chatId}`;
                    loadChat(chatId);
                });
            });

            sendButton.addEventListener('click', function() {
                const activeChatId = document.querySelector('.chat-item.active').getAttribute('data-chat-id');
                const messageContent = messageInput.value.trim();
                if (messageContent !== '') {
                    const newMessage = { type: 'sent', content: messageContent };
                    chats[activeChatId].push(newMessage);
                    appendMessage(newMessage);
                    messageInput.value = '';
                    messageInput.focus();
                }
            });

            function loadChat(chatId) {
                chatMessages.innerHTML = '';
                chats[chatId].forEach(message => appendMessage(message));
            }

            function appendMessage(message) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message', message.type);
                const messageContentDiv = document.createElement('div');
                messageContentDiv.classList.add('message-content');
                messageContentDiv.textContent = message.content;
                messageDiv.appendChild(messageContentDiv);
                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // Load initial chat
            loadChat('1');
        });
    </script>
</body>
</html>
