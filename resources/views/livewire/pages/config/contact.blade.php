<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <h3 class="title">Contacto</h3>
                    <p class="description">Agrega y modifica la información de contacto de las aplicaciones.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="mail" class="form-label">Correo de contacto</label>
                        <input type="text" name="name" id="mail" class="form-control" wire:model.defer="mailText">
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="form-label">Teléfono de contacto</label>
                        <input type="email" name="email" id="phone" class="form-control" wire:model.defer="phoneText">
                    </div>
                    <div class="d-grid col-6 col-sm-5 col-md-4 me-auto">
                        <button type="button" class="btn btn-primary" wire:click="saveConfig">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>