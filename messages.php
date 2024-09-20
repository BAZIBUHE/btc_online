<html><head><base href="https://websim.app/messenger/">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BTC Messenger Pro</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');

body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f2f5;
  color: #1c1e21;
}

.container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 20px;
  display: flex;
  height: 100vh;
}

.sidebar {
  width: 350px;
  background-color: white;
  border-right: 1px solid #dddfe2;
  height: calc(100vh - 40px);
  overflow-y: auto;
  transition: all 0.3s ease;
}

.sidebar-header {
  padding: 20px;
  border-bottom: 1px solid #dddfe2;
}

.sidebar-header h2 {
  margin: 0;
  font-size: 24px;
  color: #1877f2;
}

.sidebar-footer {
  padding: 20px;
  border-top: 1px solid #dddfe2;
}

.payment-button {
  width: 100%;
  padding: 10px;
  background-color: #0084ff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.payment-button:hover {
  background-color: #0069d9;
}

.chat-window {
  flex: 1;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  margin-left: 20px;
}

.chat-header {
  padding: 15px 20px;
  border-bottom: 1px solid #dddfe2;
  display: flex;
  align-items: center;
  background-color: #f0f2f5;
}

.chat-messages {
  flex: 1;
  overflow-y: auto;
  padding: 20px;
  background-color: #fff;
}

.message {
  max-width: 70%;
  margin-bottom: 15px;
  padding: 12px 16px;
  border-radius: 18px;
  position: relative;
  clear: both;
  font-size: 14px;
  line-height: 1.4;
}

.message.sent {
  background-color: #0084ff;
  color: white;
  float: right;
  border-bottom-right-radius: 4px;
}

.message.received {
  background-color: #f0f0f0;
  float: left;
  border-bottom-left-radius: 4px;
}

.message-time {
  font-size: 11px;
  color: #65676b;
  margin-top: 5px;
  text-align: right;
}

.chat-input {
  padding: 15px;
  border-top: 1px solid #dddfe2;
  display: flex;
  align-items: center;
  background-color: #f0f2f5;
}

.chat-input input {
  flex: 1;
  padding: 12px 16px;
  border: none;
  border-radius: 20px;
  background-color: white;
  font-size: 14px;
}

.chat-input button {
  background-color: #0084ff;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 50%;
  margin-left: 10px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.chat-input button:hover {
  background-color: #0069d9;
}

.user-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.user-item {
  padding: 15px 20px;
  border-bottom: 1px solid #dddfe2;
  cursor: pointer;
  display: flex;
  align-items: center;
  transition: background-color 0.3s ease;
}

.user-item:hover {
  background-color: #f5f6f7;
}

.user-item.active {
  background-color: #e7f3ff;
}

.user-avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 15px;
  object-fit: cover;
}

.user-info {
  flex: 1;
}

.user-name {
  font-weight: 500;
  margin-bottom: 3px;
}

.user-status {
  font-size: 12px;
  color: #65676b;
}

.online-indicator {
  width: 10px;
  height: 10px;
  background-color: #31a24c;
  border-radius: 50%;
  display: inline-block;
  margin-right: 5px;
}

.chat-options {
  display: flex;
  align-items: center;
}

.chat-option {
  padding: 8px;
  background: none;
  border: none;
  cursor: pointer;
  color: #65676b;
  font-size: 18px;
  margin-left: 10px;
  transition: color 0.3s ease;
}

.chat-option:hover {
  color: #1877f2;
}

.emoji-picker {
  position: absolute;
  bottom: 70px;
  right: 20px;
  background-color: white;
  border: 1px solid #dddfe2;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: none;
}

.emoji-picker.active {
  display: block;
}

.emoji-list {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 5px;
  padding: 10px;
}

.emoji {
  font-size: 24px;
  cursor: pointer;
  text-align: center;
}

@media (max-width: 768px) {
  .container {
    flex-direction: column;
  }
  
  .sidebar {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
  }
  
  .chat-window {
    margin-left: 0;
  }
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 500px;
  border-radius: 8px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

#paymentForm {
  display: flex;
  flex-direction: column;
}

#paymentForm label {
  margin-top: 10px;
}

#paymentForm input,
#paymentForm select {
  margin-top: 5px;
  padding: 5px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

#paymentForm button {
  margin-top: 20px;
  padding: 10px;
  background-color: #0084ff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#paymentForm button:hover {
  background-color: #0069d9;
}
</style>
</head>
<body>
<div class="container">
  <div class="sidebar">
    <div class="sidebar-header">
      <h2>BTC Messenger Pro</h2>
    </div>
    <ul class="user-list" id="userList">
      <!-- User list will be populated dynamically -->
    </ul>
    <div class="sidebar-footer">
      <button id="paymentButton" class="payment-button">Make a Payment</button>
    </div>
  </div>
  <div class="chat-window">
    <div class="chat-header">
      <img src="https://via.placeholder.com/50" alt="Selected user avatar" class="user-avatar" id="selectedUserAvatar">
      <div class="user-info">
        <h3 id="selectedUserName">Select a conversation</h3>
        <span id="selectedUserStatus"></span>
      </div>
      <div class="chat-options">
        <button class="chat-option"><i class="fas fa-phone"></i></button>
        <button class="chat-option"><i class="fas fa-video"></i></button>
        <button class="chat-option"><i class="fas fa-info-circle"></i></button>
      </div>
    </div>
    <div class="chat-messages" id="chatMessages">
      <!-- Messages will be populated dynamically -->
    </div>
    <div class="chat-input">
      <button id="emojiButton" class="chat-option"><i class="far fa-smile"></i></button>
      <input type="text" id="messageInput" placeholder="Type a message...">
      <button id="sendButton"><i class="fas fa-paper-plane"></i></button>
    </div>
    <div class="emoji-picker" id="emojiPicker">
      <div class="emoji-list">
        <!-- Emojis will be populated dynamically -->
      </div>
    </div>
  </div>
</div>

<div id="paymentModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Make a Payment</h2>
    <form id="paymentForm">
      <label for="amount">Amount:</label>
      <input type="number" id="amount" name="amount" step="0.01" required>
      
      <label for="paymentMethod">Payment Method:</label>
      <select id="paymentMethod" name="paymentMethod" required>
        <option value="Airtel Money">Airtel Money</option>
        <option value="M-Pesa">M-Pesa</option>
        <option value="TMB">TMB</option>
        <option value="Orange Money">Orange Money</option>
        <option value="Carte Bancaire">Carte Bancaire</option>
        <option value="MoneyGram">MoneyGram</option>
      </select>
      
      <label for="courseId">Course ID:</label>
      <input type="number" id="courseId" name="courseId" required>
      
      <button type="submit">Pay</button>
    </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
const userList = document.getElementById('userList');
const chatMessages = document.getElementById('chatMessages');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendButton');
const selectedUserName = document.getElementById('selectedUserName');
const selectedUserAvatar = document.getElementById('selectedUserAvatar');
const selectedUserStatus = document.getElementById('selectedUserStatus');
const emojiButton = document.getElementById('emojiButton');
const emojiPicker = document.getElementById('emojiPicker');
const paymentButton = document.getElementById('paymentButton');
const paymentModal = document.getElementById('paymentModal');
const closeModal = document.getElementsByClassName('close')[0];
const paymentForm = document.getElementById('paymentForm');

let currentUser = null;
let users = [];
let messages = [];

// Simulated user data
const simulatedUsers = [
  { id: 1, name: 'Alice Johnson', avatar: 'https://i.pravatar.cc/150?img=1', status: 'online' },
  { id: 2, name: 'Bob Smith', avatar: 'https://i.pravatar.cc/150?img=2', status: 'offline' },
  { id: 3, name: 'Charlie Brown', avatar: 'https://i.pravatar.cc/150?img=3', status: 'online' },
  { id: 4, name: 'Diana Prince', avatar: 'https://i.pravatar.cc/150?img=4', status: 'away' },
];

// Simulated message data
const simulatedMessages = [
  { id: 1, senderId: 1, receiverId: 2, content: 'Hey Bob, how are you?', timestamp: '2023-05-10T10:30:00Z' },
  { id: 2, senderId: 2, receiverId: 1, content: 'Hi Alice! I\'m doing great, thanks for asking. How about you?', timestamp: '2023-05-10T10:32:00Z' },
  { id: 3, senderId: 1, receiverId: 2, content: 'I\'m good too! Just working on some coding projects.', timestamp: '2023-05-10T10:35:00Z' },
  { id: 4, senderId: 3, receiverId: 1, content: 'Alice, do you have time for a quick call?', timestamp: '2023-05-10T11:00:00Z' },
];

function loadUsers() {
  users = simulatedUsers;
  renderUserList();
}

function loadMessages(userId) {
  messages = simulatedMessages.filter(m => 
    (m.senderId === userId && m.receiverId === currentUser.id) || 
    (m.senderId === currentUser.id && m.receiverId === userId)
  );
  renderMessages();
}

function renderUserList() {
  userList.innerHTML = '';
  users.forEach(user => {
    const li = document.createElement('li');
    li.className = 'user-item';
    li.innerHTML = `
      <img src="${user.avatar}" alt="${user.name}'s avatar" class="user-avatar">
      <div class="user-info">
        <div class="user-name">${user.name}</div>
        <div class="user-status">
          <span class="online-indicator" style="background-color: ${user.status === 'online' ? '#31a24c' : user.status === 'away' ? '#f7b928' : '#65676b'}"></span>
          ${user.status}
        </div>
      </div>
    `;
    li.addEventListener('click', () => selectUser(user));
    userList.appendChild(li);
  });
}

function selectUser(user) {
  currentUser = user;
  selectedUserName.textContent = user.name;
  selectedUserAvatar.src = user.avatar;
  selectedUserStatus.innerHTML = `
    <span class="online-indicator" style="background-color: ${user.status === 'online' ? '#31a24c' : user.status === 'away' ? '#f7b928' : '#65676b'}"></span>
    ${user.status}
  `;
  loadMessages(user.id);
  
  // Update active user in the list
  document.querySelectorAll('.user-item').forEach(item => item.classList.remove('active'));
  document.querySelector(`.user-item:nth-child(${users.indexOf(user) + 1})`).classList.add('active');
}

function renderMessages() {
  chatMessages.innerHTML = '';
  messages.forEach(message => {
    const messageElement = document.createElement('div');
    messageElement.className = `message ${message.senderId === currentUser.id ? 'received' : 'sent'}`;
    messageElement.innerHTML = `
      ${message.content}
      <div class="message-time">${formatTimestamp(message.timestamp)}</div>
    `;
    chatMessages.appendChild(messageElement);
  });
  chatMessages.scrollTop = chatMessages.scrollHeight;
}

function formatTimestamp(timestamp) {
  const date = new Date(timestamp);
  return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

function sendMessage() {
  const content = messageInput.value.trim();
  if (content && currentUser) {
    const newMessage = {
      id: messages.length + 1,
      senderId: 2, // Assuming the logged-in user has ID 2 (Bob)
      receiverId: currentUser.id,
      content: content,
      timestamp: new Date().toISOString()
    };
    messages.push(newMessage);
    renderMessages();
    messageInput.value = '';
  }
}

sendButton.addEventListener('click', sendMessage);
messageInput.addEventListener('keypress', (e) => {
  if (e.key === 'Enter') {
    sendMessage();
  }
});

// Emoji picker functionality
const emojis = ['😀', '😃', '😄', '😁', '😆', '😅', '😂', '🤣', '😊', '😇', '🙂', '🙃', '😉', '😌', '😍', '🥰', '😘', '😗', '😙', '😚', '😋', '😛', '😝', '😜', '🤪', '🤨', '🧐', '🤓', '😎', '🤩', '🥳'];

function renderEmojiPicker() {
  const emojiList = emojiPicker.querySelector('.emoji-list');
  emojiList.innerHTML = '';
  emojis.forEach(emoji => {
    const emojiElement = document.createElement('div');
    emojiElement.className = 'emoji';
    emojiElement.textContent = emoji;
    emojiElement.addEventListener('click', () => addEmoji(emoji));
    emojiList.appendChild(emojiElement);
  });
}

function addEmoji(emoji) {
  messageInput.value += emoji;
  emojiPicker.classList.remove('active');
}

emojiButton.addEventListener('click', () => {
  emojiPicker.classList.toggle('active');
});

// Initialize payment modal
paymentButton.addEventListener('click', () => {
  paymentModal.style.display = 'block';
});

closeModal.addEventListener('click', () => {
  paymentModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target == paymentModal) {
    paymentModal.style.display = 'none';
  }
});

paymentForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const amount = document.getElementById('amount').value;
  const paymentMethod = document.getElementById('paymentMethod').value;
  const courseId = document.getElementById('courseId').value;
  
  processPayment(amount, paymentMethod, courseId);
});

function processPayment(amount, paymentMethod, courseId) {
  const paymentSuccess = Math.random() < 0.8; // 80% success rate

  if (paymentSuccess) {
    showNotification(`Payment of ${amount} successful via ${paymentMethod} for course ${courseId}. Funds will be sent to +243 970 297 332.`, 'success');
    paymentModal.style.display = 'none';
    paymentForm.reset();
  } else {
    showNotification('Payment failed. Please try again.', 'error');
  }
}

function showNotification(message, type = 'info') {
  const notification = document.createElement('div');
  notification.className = `notification ${type}`;
  notification.textContent = message;
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.remove();
  }, 5000);
}

// Initialize the app
loadUsers();
renderEmojiPicker();
currentUser = users[0]; // Set the first user as the current user for this example
selectUser(currentUser);

// Close emoji picker when clicking outside
document.addEventListener('click', (e) => {
  if (!emojiPicker.contains(e.target) && e.target !== emojiButton) {
    emojiPicker.classList.remove('active');
  }
});
</script>
</body>
</html>