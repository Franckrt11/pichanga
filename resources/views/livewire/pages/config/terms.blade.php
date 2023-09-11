<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <h3 class="title">Términos y condiciones</h3>
                    <p class="description">Modifica los Términos y condiciones de las aplicaciones.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <label for="tynimce" class="form-label">Contenido</label>
                        <div data-component="tinymce" wire:ignore>
                            <textarea id="tynimce" wire:model="termsText"></textarea>
                        </div>
                    </div>
                    <div class="d-grid col-6 col-sm-5 col-md-4 me-auto">
                        <button type="button" class="btn btn-primary" id="saveBtn">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            const btn = document.getElementById('saveBtn');

            btn.addEventListener('click', () => {
                const tinySaveBtn = document.querySelector('.tox-tbtn[title=Guardar]');
                if (!tinySaveBtn.classList.contains('tox-tbtn--disabled')) tinySaveBtn.click();
            });
        });
    </script>
</main>