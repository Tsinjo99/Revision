<?php
$base_url = '/public';       // chemin vers les assets CSS/JS/images
$title = 'Messages';
$activePage = 'message';
$unreadMessages = 3;         // exemple dynamique

// Inclure le header et le sidebar
include 'header.php';
include 'sidebar.php';
?>

<style>
    /* Layout Messenger */
    .messages-container {
        height: calc(100vh - 140px); /* Hauteur pleine moins le header */
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    .messages-layout {
        display: flex;
        height: 100%;
        overflow: hidden;
    }

    /* Sidebar Gauche */
    .messages-sidebar {
        width: 320px;
        border-right: 1px solid #e0e0e0;
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
    }
    .conversations-list {
        flex: 1;
        overflow-y: auto;
    }
    .conversation-item {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: background 0.2s;
        text-decoration: none;
        color: inherit;
    }
    .conversation-item:hover { background: #e9ecef; }
    .conversation-item.active {
        background: #e7f1ff;
        border-left: 4px solid #0d6efd;
    }
    .conversation-avatar img { border-radius: 50%; object-fit: cover; margin-right: 10px; }
    .conversation-name { margin: 0; font-weight: 600; font-size: 0.95rem; }
    .conversation-preview { margin: 0; font-size: 0.85rem; color: #6c757d; }

    /* Zone de Chat Droite */
    .chat-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        background-color: #fff;
    }
    .chat-header {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
        background: #fff;
        font-weight: bold;
    }
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-color: #f5f7fb;
    }
    .message { max-width: 75%; display: flex; flex-direction: column; }
    .message.own-message { align-self: flex-end; align-items: flex-end; }
    .message-bubble {
        padding: 10px 15px;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
    .message.own-message .message-bubble { background: #0d6efd; color: #fff; }
    .chat-input { padding: 15px; border-top: 1px solid #e0e0e0; background: #fff; }
</style>

<main class="admin-main">
    <div class="container-fluid p-4 p-lg-4">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h1 class="h3 mb-0"><?= htmlspecialchars($title) ?></h1>
                <p class="text-muted mb-0">Real-time communication center</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary d-lg-none" @click="toggleSidebar()">
                    <i class="bi bi-list me-2"></i>Conversations
                </button>
                <button type="button" class="btn btn-outline-secondary" @click="markAllRead()">
                    <i class="bi bi-check-all me-2"></i>Mark All Read
                </button>
                <button type="button" class="btn btn-primary" @click="newConversation()">
                    <i class="bi bi-plus-lg me-2"></i>New Message
                </button>
            </div>
        </div>

        <!-- Messages Container -->
        <div x-data="messagesComponent" x-init="init()" class="messages-container">
            <div class="messages-layout">

                <!-- Conversations Sidebar -->
                <div class="messages-sidebar" :class="{ 'mobile-show': sidebarVisible }">
                    <!-- Sidebar Header -->
                    <div class="messages-header">
                        <h5 class="header-title mb-0">Messages</h5>
                        <div class="d-flex gap-2 mt-3">
                            <div class="search-container flex-grow-1">
                                <input type="search" 
                                       class="form-control" 
                                       placeholder="Search conversations..."
                                       x-model="searchQuery"
                                       @input="filterConversations()">
                                <i class="bi bi-search search-icon"></i>
                            </div>
                            <button class="btn btn-primary btn-sm" @click="newConversation()" title="New Message">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Conversations List -->
                <div class="conversations-list">
                <?php foreach ($users as $user): ?>
                    <a href="#"
                       class="conversation-item"
                       onclick="openConversation(<?= $user['id'] ?>, '<?= htmlspecialchars($user['email']) ?>', this)">
                
                        <div class="conversation-avatar">
                            <img src="images/avatar-default.jpeg" alt="Avatar" class="avatar-img" width="40" height="40">
                        </div>
                
                        <div class="conversation-info">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="conversation-name">
                                    <?= htmlspecialchars($user['email']) ?>
                                </h6>
                                <?php if (isset($user['unread']) && $user['unread'] > 0): ?>
                                    <span class="badge bg-danger rounded-pill ms-2"><?= $user['unread'] ?></span>
                                <?php endif; ?>
                            </div>
                            <p class="conversation-preview">Say hi!</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            </div>
                
                <!-- Chat Area -->
            <div class="chat-area">

                <!-- Header conversation -->
                <div id="chatHeader" class="chat-header d-none">
                    <h6 id="chatUserName"></h6>
                </div>

                <!-- Messages -->
                <div id="chatMessages" class="chat-messages">
                    <div class="text-muted text-center mt-5">
                        Select a conversation to start chatting
                    </div>
                </div>

                <!-- Input -->
                <div id="chatInput" class="chat-input d-none">
                    <div class="input-group">
                        <textarea id="messageText" class="form-control"
                                  placeholder="Type a message..." rows="1"></textarea>
                        <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                    </div>
                </div>
            </div>


            </div> <!-- /.messages-layout -->
        </div> <!-- /.messages-container -->

    </div> <!-- /.container-fluid -->
</main>

<?php include 'footer.php'; ?>
