<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>new order</title>

  <style media="screen">
    * {
      font-family: system-ui;
    }

    .logo {
      background-color: #2a9d8f;
      padding: 5px;
      text-align: center;
      border-radius: 5px;
    }

    .logo h1 {
      color: #f4a261;
      text-shadow: 2px 2px 2px rgb(50 50 50 / 91%);
    }

    .scheda {
      width: 60%;
      margin: 20px auto;
      padding-bottom: 20px;
      border: 1px solid;
      border-radius: 5px;
      border-color: #2A9D8F;
      background: linear-gradient(0deg, #2a9d8f 0%, #f4a261 35%, #e9c46a 75%);
      text-align: center;
    }

    .scheda h3 {
      margin: 2px;
    }

    .contact p,
    h4 {
      margin: 0;
    }

  </style>
</head>

<body>
  <div class="logo">
    <h1>Deliveboo</h1>
  </div>
  <div class="scheda">
    <h1>Ciao {{ $editableOrder->nome_cliente }} </br> il tuo ordine presso ilo ristorante "{{ $nome }}" è
      avvenuto con successo</h1>

    <h3>
      ID ordine: {{ $editableOrder->id }}

    </h3>
    <h3>
      Importo pagato: {{ round($editableOrder->totalPrice, 2) }} €

    </h3>
    <h3>
      Indirizzo di spedizione: Via {{ $editableOrder->via }} , {{ $editableOrder->n_civico }}
    </h3>

    @if ($editableOrder->note)
      <h3>
        Note Cliente: {{ $editableOrder->note }}
      </h3>
    @endif

  </div>
  <div class="contact">
    <h4>Deliveboo Team</h4>
    <p>This message was sent to you, as a Deliveboo user, consistent with your email preferences.</p>
  </div>
</body>

</html>
