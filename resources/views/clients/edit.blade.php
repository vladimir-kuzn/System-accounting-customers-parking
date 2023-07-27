<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Редактировать клиента</h1>
    @include('clients._form', ['client' => $client, 'action' => route('clients.update', [$client->id, $method="PUT"])])
</div>
