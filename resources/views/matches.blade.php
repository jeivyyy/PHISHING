<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Matches — Tinder</title>

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

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  >

  <script src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>

  @vite('resources/css/global.css')
  @vite('resources/js/shared.js')

</head>

<body class="bg-[#f7f7fb] text-ink">
  <div class="app-layout">

    <aside id="appNav"></aside>

    <main class="min-h-screen p-5 pb-24 md:p-10">
      <div class="mx-auto max-w-5xl">

        <p class="text-sm font-bold text-match">CONEXÕES</p>

        <h1 class="mt-1 text-3xl font-extrabold">
          Seus matches
        </h1>

        <p class="mt-2 text-black/45">
          Pessoas que também curtiram você.
        </p>

        <section
          id="matchesList"
          class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4"
        ></section>

      </div>
    </main>
  </div>

  <script>
    window.addEventListener("DOMContentLoaded", function () {
      const listaDeMatches = document.querySelector("#matchesList");
      const pessoas = getProfiles();

      listaDeMatches.innerHTML = pessoas.map(function (pessoa, indice) {
        let mensagem;

        if (indice === 0) {
          mensagem = "Enviou uma mensagem";
        } else {
          mensagem = "Novo match — diga oi!";
        }

        return `
          <a
            href="/chats?person=${indice}"
            class="group overflow-hidden rounded-3xl bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
          >
            <div class="relative aspect-[4/5] overflow-hidden">
              <img
                src="${pessoa.image}"
                class="h-full w-full object-cover transition group-hover:scale-105"
                alt="Foto de ${pessoa.name}"
              >

              <span class="absolute right-3 top-3 h-3 w-3 rounded-full border-2 border-white bg-emerald-400"></span>
            </div>

            <div class="p-4">
              <h2 class="text-lg font-extrabold">
                ${pessoa.name}, ${pessoa.age}
              </h2>

              <p class="mt-1 truncate text-sm text-black/45">
                ${mensagem}
              </p>
            </div>
          </a>
        `;
      }).join("");
    });
  </script>
</body>
</html>