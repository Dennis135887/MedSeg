function enviarMensagem() {
    const input = document.getElementById("user-input");
    const mensagem = input.value.trim();
    const chatLog = document.getElementById("chat-log");

    if (!mensagem) return;

    // Mostra mensagem do usuário com prefixo "Você:"
    const userDiv = document.createElement("div");
    userDiv.className = "chat-message user-message";
    userDiv.innerHTML = "<strong>Você:</strong> " + mensagem;
    chatLog.appendChild(userDiv);

    input.value = "";

    fetch("http://127.0.0.1:5000/chat", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ message: mensagem })
    })
    .then(res => res.json())
    .then(data => {
        const botDiv = document.createElement("div");
        botDiv.className = "chat-message bot-message";
        botDiv.innerHTML = "<strong>Bot:</strong> " + data.reply;
        chatLog.appendChild(botDiv);
        chatLog.scrollTop = chatLog.scrollHeight;
    })
    .catch(() => {
        const errorDiv = document.createElement("div");
        errorDiv.className = "chat-message bot-message";
        errorDiv.innerText = "❌ Erro ao conectar com o servidor.";
        chatLog.appendChild(errorDiv);
    });
}