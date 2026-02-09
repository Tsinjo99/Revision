let currentUserId = null;

function openConversation(userId, userEmail, element) {
    currentUserId = userId;

    // Gestion de la classe active (surbrillance)
    document.querySelectorAll('.conversation-item').forEach(el => el.classList.remove('active'));
    if (element) {
        element.classList.add('active');
        // Supprimer le badge de notification visuellement
        const badge = element.querySelector('.badge');
        if (badge) badge.remove();
    }

    // Affichage UI
    document.getElementById('chatHeader').classList.remove('d-none');
    document.getElementById('chatInput').classList.remove('d-none');
    document.getElementById('chatUserName').innerText = userEmail;

    loadMessages();
}

function loadMessages() {
    fetch(`/conversation?user_id=${currentUserId}`)
        .then(res => res.json())
        .then(messages => {
            const box = document.getElementById('chatMessages');
            box.innerHTML = '';

            if (messages.length === 0) {
                box.innerHTML = `<p class="text-muted text-center mt-4">
                    No messages yet
                </p>`;
                return;
            }

            messages.forEach(msg => {
                const div = document.createElement('div');
                div.className = msg.id_me == currentUserId
                    ? 'message'
                    : 'message own-message';

                div.innerHTML = `
                    <div class="message-bubble">
                        <p>${msg.mess}</p>
                        <small>${msg.datetime}</small>
                    </div>
                `;
                box.appendChild(div);
            });

            box.scrollTop = box.scrollHeight;
        });
}

// Envoi avec la touche Entrée
document.getElementById('messageText').addEventListener('keypress', function (e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
});

function sendMessage() {
    const text = document.getElementById('messageText').value.trim();
    if (!text) return;

    fetch('/message/send', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `user_id=${currentUserId}&message=${encodeURIComponent(text)}`
    })
    .then(() => {
        document.getElementById('messageText').value = '';
        loadMessages();
    });
}
