const profileData = [
  {
    name: "Marina",
    age: 24,
    job: "Estudante de Arquitetura",
    distance: "a 3 km",
    bio: "Café forte, fotografia e uma queda por lugares que ainda não conheço.",
    image: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=1000&q=85",
    tags: ["Fotografia", "Viagens"]
  },
  {
    name: "Lucas",
    age: 27,
    job: "Designer de Produto",
    distance: "a 5 km",
    bio: "Música ao vivo, pedal no fim de tarde e conversas que fogem do óbvio.",
    image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=1000&q=85",
    tags: ["Design", "Música"]
  },
  {
    name: "Bianca",
    age: 25,
    job: "Jornalista",
    distance: "a 7 km",
    bio: "Sempre com um livro na bolsa e uma história nova para contar.",
    image: "https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1000&q=85",
    tags: ["Livros", "Natureza"]
  },
  {
    name: "Rafael",
    age: 29,
    job: "Engenheiro Agrônomo",
    distance: "a 11 km",
    bio: "Gosto de estrada, comida feita em casa e fins de semana ao ar livre.",
    image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=1000&q=85",
    tags: ["Campo", "Viagens"]
  }
];

window.getProfiles = function () {
  return profileData;
};

const navegacao = document.querySelector("#appNav");

if (navegacao) {
  const caminho = window.location.pathname;
  const paginaAtual = caminho.split("/").pop() || "discover.html";

  navegacao.innerHTML = `
    <div class="side-nav">

      <a href="../index.html" class="nav-brand">
        <i data-lucide="flame" class="fill-white"></i>
        <span>tinder</span>
      </a>

      <div class="nav-links">
        <a
          href="discover.html"
          class="${paginaAtual === "discover.html" ? "active" : ""}"
        >
          <i data-lucide="flame"></i>
          <span>Descobrir</span>
        </a>

        <a
          href="matches.html"
          class="${paginaAtual === "matches.html" ? "active" : ""}"
        >
          <i data-lucide="heart"></i>
          <span>Matches</span>
        </a>

        <a
          href="chats.html"
          class="${paginaAtual === "chats.html" ? "active" : ""}"
        >
          <i data-lucide="message-circle"></i>
          <span>Conversas</span>
        </a>

        <a
          href="profile.html"
          class="${paginaAtual === "profile.html" ? "active" : ""}"
        >
          <i data-lucide="user-round"></i>
          <span>Perfil</span>
        </a>
      </div>

    </div>
  `;
}

lucide.createIcons();