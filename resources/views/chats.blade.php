<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Conversas — Tinder</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('icons/site.ico') }}">

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            match: "#ff4458",
            ink: "#17171f"
          },
          fontFamily: {
            sans: ["Inter", "sans-serif"]
          }
        }
      }
    };
  </script>

  @vite([
    'resources/css/global.css',
    'resources/js/shared.js',
    'resources/js/app.js'
  ])

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  >

  <script src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>

</head>

<body class="bg-[#f7f7fb] text-ink">
  <div class="app-layout">

    <aside id="appNav"></aside>

    <main class="min-h-screen pb-20 md:pb-0">
      <div class="mx-auto grid min-h-screen max-w-6xl bg-white md:grid-cols-[330px_1fr] md:shadow-xl">

        <section class="border-r border-black/5">
          <div class="p-6">
            <h1 class="text-2xl font-extrabold">
              Conversas
            </h1>

            <input
              class="field mt-5"
              placeholder="Buscar conversa"
            >
          </div>

          <div id="chatList"></div>
        </section>

        <section class="flex min-h-[70vh] flex-col">

          <header class="flex items-center gap-3 border-b border-black/5 p-4">
            <img
              id="chatAvatar"
              class="h-11 w-11 rounded-full object-cover"
              alt=""
            >

            <div>
              <h2 id="chatName" class="font-extrabold"></h2>
              <p class="text-xs text-emerald-500">Online agora</p>
            </div>
          </header>

          <div
            id="messages"
            class="flex flex-1 flex-col justify-end gap-3 bg-[#fafafd] p-5"
          >
            <p class="mx-auto mb-4 rounded-full bg-black/5 px-3 py-1 text-xs text-black/40">
              Hoje
            </p>

            <div class="bubble theirs">
              Oi! Vi que você também gosta de viajar 😊
            </div>

            <div class="bubble mine">
              Sim! Qual foi o lugar mais legal que você conheceu?
            </div>
          </div>

          <form
            id="messageForm"
            class="flex gap-3 border-t border-black/5 p-4"
          >
            <input
              id="messageInput"
              class="field"
              placeholder="Escreva uma mensagem"
            >

            <button
              class="brand-gradient grid h-12 w-12 shrink-0 place-items-center rounded-full text-white"
              aria-label="Enviar mensagem"
            >
              <i data-lucide="send" class="h-5 w-5"></i>
            </button>
          </form>

        </section>
      </div>
    </main>
  </div>

  <script>
    window.addEventListener("DOMContentLoaded", function () {
      const pessoas = getProfiles();

      const parametros = new URLSearchParams(window.location.search);
      const indiceSelecionado = Number(parametros.get("person")) || 0;
      const pessoaSelecionada = pessoas[indiceSelecionado];

      const avatar = document.querySelector("#chatAvatar");
      const nome = document.querySelector("#chatName");
      const lista = document.querySelector("#chatList");
      const formulario = document.querySelector("#messageForm");
      const campoMensagem = document.querySelector("#messageInput");
      const mensagens = document.querySelector("#messages");

      avatar.src = pessoaSelecionada.image;
      avatar.alt = "Foto de " + pessoaSelecionada.name;
      nome.textContent = pessoaSelecionada.name;

      lista.innerHTML = pessoas.map(function (pessoa, indice) {
        let texto;

        if (indice === 0) {
          texto = "Oi! Vi que você também...";
        } else {
          texto = "Vocês deram match!";
        }

        return `
          <a
            href="?person=${indice}"
            class="flex items-center gap-3 border-t border-black/5 p-4 hover:bg-black/[.025]"
          >
            <img
              src="${pessoa.image}"
              class="h-12 w-12 rounded-full object-cover"
              alt="Foto de ${pessoa.name}"
            >

            <span class="min-w-0">
              <b>${pessoa.name}</b>

              <small class="block truncate text-black/40">
                ${texto}
              </small>
            </span>
          </a>
        `;
      }).join("");

      formulario.addEventListener("submit", function (evento) {
        evento.preventDefault();

        const texto = campoMensagem.value.trim();

        if (!texto) {
          return;
        }

        const mensagemSegura = texto.replace(/[<>]/g, "");

        mensagens.insertAdjacentHTML(
          "beforeend",
          `<div class="bubble mine">${mensagemSegura}</div>`
        );

        campoMensagem.value = "";
      });
    });
    
  </script>
</body>
</html>