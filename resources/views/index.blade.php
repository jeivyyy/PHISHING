<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Tinder — conexões começam aqui</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            match: "#ff4458",
            plum: "#6d2ec2",
            ink: "#17171f"
          },
          fontFamily: {
            sans: ["Inter", "sans-serif"]
          }
        }
      }
    };
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet"
  >

  <script src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>

  <link rel="stylesheet" href="/assets/css/global.css">
</head>

<body class="bg-[#100e18] text-white">
  <main class="landing min-h-screen overflow-hidden">

    <nav class="relative z-10 mx-auto flex max-w-7xl items-center justify-between px-6 py-6">
      <a
        class="flex items-center gap-2 text-2xl font-black"
        href="index.html"
      >
        <i data-lucide="flame" class="fill-match text-match"></i>
        Tinder
      </a>

      <a
        href="./pages/login.html"
        class="rounded-full bg-white px-5 py-2.5 font-bold text-ink"
      >
        Entrar
      </a>
    </nav>

    <section class="relative z-10 mx-auto grid min-h-[calc(100vh-96px)] max-w-7xl items-center gap-12 px-6 pb-16 lg:grid-cols-2">

      <div>
        <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-semibold backdrop-blur">
          Novas pessoas. Novas histórias.
        </span>

        <h1 class="mt-7 max-w-2xl text-5xl font-black leading-[.95] tracking-[-.055em] sm:text-7xl">
          Uma conexão pode mudar o seu
          <span class="gradient-text">próximo capítulo.</span>
        </h1>

        <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/60">
          Conheça pessoas perto de você, descubra interesses em comum
          e comece conversas reais.
        </p>

        <div class="mt-9 flex flex-wrap gap-3">
          <a
            href="./pages/login.html"
            class="brand-gradient rounded-full px-7 py-4 font-extrabold shadow-xl shadow-rose-600/20"
          >
            Criar minha conta
          </a>

          <a
            href="./pages/discover.html"
            class="rounded-full border border-white/20 bg-white/5 px-7 py-4 font-bold backdrop-blur"
          >
            Ver demonstração
          </a>
        </div>

      </div>

      <div class="relative mx-auto hidden w-full max-w-lg lg:block">
        <div class="hero-orbit"></div>

        <div class="relative mx-auto h-[610px] w-[340px] rotate-3 overflow-hidden rounded-[44px] border-[9px] border-white/15 bg-black shadow-2xl">

          <img
            class="h-full w-full object-cover"
            src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=900&q=85"
            alt="Pessoa sorrindo"
          >

          <div class="card-scrim absolute inset-0"></div>

          <div class="absolute inset-x-0 bottom-0 p-6">
            <h2 class="text-3xl font-black">Marina, 24</h2>

            <p class="mt-1 text-white/75">
              Arquitetura • a 3 km
            </p>

            <div class="mt-5 flex justify-center gap-5">
              <span class="grid h-14 w-14 place-items-center rounded-full bg-white text-rose-500">
                <i data-lucide="x"></i>
              </span>

              <span class="grid h-14 w-14 place-items-center rounded-full bg-white text-emerald-500">
                <i data-lucide="heart" class="fill-current"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

    </section>
  </main>

  <script>
    lucide.createIcons();
  </script>
</body>
</html>