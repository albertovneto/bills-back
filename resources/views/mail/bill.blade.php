<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanastra</title>
</head>
<body>
<p>Prezado(a) {{$bill->name}},</p>

<p>Estamos entrando em contato para informar sobre a seguinte cobrança:</p>

<table>
    <tr>
        <th>Descrição</th>
        <th>Valor</th>
    </tr>
    <tr>
        <td>Boleto</td>
        <td>R$ {{$bill->debtAmount}}</td>
    </tr>
</table>
</body>
</html>
