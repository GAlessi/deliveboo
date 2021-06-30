<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>new order</title>
    </head>
    <body>
        <h1>Hai ricevuto un nuovo ordine da {{$editableOrder->nome_cliente}}</h1>
        <h3>
            ID ordine: {{$editableOrder->id}}

        </h3>
        <h3>
            Importo pagato: {{$editableOrder->totalPrice}} €

        </h3>
        <h3>
            Indirizzo di spedizione: Via {{$editableOrder->via}} , {{$editableOrder->n_civico}}
        </h3>

        <h3>

            Puoi contattare il cliente al numero: {{$editableOrder->telefono}}

        </h3>

        @if ($editableOrder->note)
            <h3>

                Note Cliente: {{$editableOrder->note}}
            </h3>
        @endif
    </body>
</html>
