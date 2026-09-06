<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Meu perfil — Tinder</title>

  <script src="https://cdn.tailwindcss.com"></script>
  
  @vite('resources/css/global.css')
  @vite('resources/js/shared.js')

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

</head>

<body class="bg-[#f7f7fb] text-ink">
  <div class="app-layout">

    <aside id="appNav"></aside>

    <main class="min-h-screen p-5 pb-24 md:p-10">
      <div class="mx-auto max-w-3xl">

        <header class="flex items-end justify-between">
          <div>
            <p class="text-sm font-bold text-match">CONTA</p>

            <h1 class="mt-1 text-3xl font-extrabold">
              Meu perfil
            </h1>
          </div>

          <button
            id="editBtn"
            class="rounded-full border border-black/10 bg-white px-5 py-2.5 font-bold"
          >
            Editar
          </button>
        </header>

        <section class="mt-8 overflow-hidden rounded-[32px] bg-white shadow-sm">

          <div class="profile-cover h-44"></div>

          <div class="px-6 pb-8 sm:px-10">

            <div class="-mt-16 flex items-end gap-5">
              <img
                class="h-32 w-32 rounded-full border-4 border-white object-cover shadow-lg"
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&q=85"
                alt="Foto do perfil"
              >

              <div class="pb-2">
                <h2 class="text-2xl font-extrabold">Ana, 25</h2>
                <p class="text-black/45">Ji-Paraná, RO</p>
              </div>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2">

              <div>
                <p class="profile-label">Sobre mim</p>

                <p
                  contenteditable="false"
                  class="editable mt-2 leading-relaxed text-black/60"
                >
                  Gosto de fotografia, viagens curtas e café sem pressa.
                  Estou sempre procurando um novo lugar para conhecer.
                </p>
              </div>

              <div>
                <p class="profile-label">Trabalho e estudos</p>

                <p
                  contenteditable="false"
                  class="editable mt-2 text-black/60"
                >
                  Estudante de Direito
                </p>

                <p class="mt-2 text-black/60">
                  Faculdade Metropolitana
                </p>
              </div>

              <div class="sm:col-span-2">
                <p class="profile-label">Interesses</p>

                <div class="mt-3 flex flex-wrap gap-2">
                  <span class="interest">Fotografia</span>
                  <span class="interest">Viagens</span>
                  <span class="interest">Café</span>
                  <span class="interest">Cinema</span>
                  <span class="interest">Música</span>
                </div>
              </div>

            </div>

            <div class="mt-8 border-t border-black/5 pt-6">
              <a
                href="index.html"
                class="font-bold text-rose-500"
              >
                Sair da demonstração
              </a>
            </div>
          </div>
        </section>

      </div>
    </main>
  </div>


  <script>
    const botaoEditar = document.querySelector("#editBtn");
    const camposEditaveis = document.querySelectorAll(".editable");

    let editando = false;

    botaoEditar.addEventListener("click", function () {
      editando = !editando;

      camposEditaveis.forEach(function (campo) {
        campo.contentEditable = editando;
        campo.classList.toggle("editing", editando);
      });

      if (editando) {
        botaoEditar.textContent = "Salvar";
      } else {
        botaoEditar.textContent = "Editar";
      }
    });
  </script>
</body>
</html>