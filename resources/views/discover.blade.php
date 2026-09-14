<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Descobrir — Tinder</title>
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

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  >

  <script src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>

  @vite('resources/css/global.css')
  @vite('resources/js/shared.js')
  @vite('resources/js/app.js')

</head>

<body class="bg-[#f7f7fb] text-ink">
  <div class="app-layout">

    <aside id="appNav"></aside>

    <main class="min-h-screen p-4 pb-24 md:p-8">
      <header class="mx-auto mb-5 flex max-w-lg items-center justify-between">

        <div>
          <p class="text-sm font-bold text-match">DESCOBRIR</p>
          <h1 class="text-2xl font-extrabold">Perto de você</h1>
        </div>

        <button
          class="round-control"
          aria-label="Abrir filtros"
        >
          <i data-lucide="sliders-horizontal"></i>
        </button>
      </header>

      <section class="mx-auto max-w-lg">

        <div
          id="emptyState"
          class="hidden min-h-[560px] place-items-center rounded-[28px] bg-white p-10 text-center shadow-xl"
        >
          <div>
            <i data-lucide="search-x" class="mx-auto h-12 w-12 text-match"></i>

            <h2 class="mt-5 text-2xl font-extrabold">
              Você viu todo mundo
            </h2>

            <button
              id="restartBtn"
              class="brand-gradient mt-6 rounded-full px-6 py-3 font-bold text-white"
            >
              Recomeçar
            </button>
          </div>
        </div>

        <article
          id="profileCard"
          class="profile-card relative min-h-[560px] overflow-hidden rounded-[28px] bg-zinc-900 shadow-2xl sm:min-h-[650px]"
        >
          <img
            id="profileImage"
            class="absolute inset-0 h-full w-full object-cover"
            alt=""
          >

          <div class="card-scrim absolute inset-0"></div>

          <div
            class="absolute left-5 top-5 flex gap-2"
            id="tags"
          ></div>

          <div class="absolute inset-x-0 bottom-0 p-6 text-white">
            <h2
              id="profileTitle"
              class="text-3xl font-extrabold"
            ></h2>

            <p
              id="profileJob"
              class="mt-1 font-medium text-white/85"
            ></p>

            <p
              id="profileBio"
              class="mt-3 text-sm text-white/70"
            ></p>
          </div>

          <div id="likeStamp" class="swipe-stamp like-stamp">
            CURTI
          </div>

          <div id="nopeStamp" class="swipe-stamp nope-stamp">
            NÃO
          </div>
        </article>

        <div class="mt-5 flex justify-center gap-4">
          <button
            class="action-btn text-amber-400"
            id="undoBtn"
            aria-label="Desfazer"
          >
            <i data-lucide="rotate-ccw"></i>
          </button>

          <button
            class="action-btn text-rose-500"
            id="nopeBtn"
            aria-label="Recusar"
          >
            <i data-lucide="x"></i>
          </button>

          <button
            class="action-btn text-sky-500"
            id="superBtn"
            aria-label="Superlike"
          >
            <i data-lucide="star" class="fill-current"></i>
          </button>

          <button
            class="action-btn text-emerald-500"
            id="likeBtn"
            aria-label="Curtir"
          >
            <i data-lucide="heart" class="fill-current"></i>
          </button>
        </div>

      </section>
    </main>
  </div>
  
</body>
</html>