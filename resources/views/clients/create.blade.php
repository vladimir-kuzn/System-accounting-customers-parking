<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Создать клиента</h1>
    @include('clients._form', ['client' => null, 'action' => route('clients.store')])
</div>
