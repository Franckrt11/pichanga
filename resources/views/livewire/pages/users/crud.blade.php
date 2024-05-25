<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">@if ($typecrud == 'Nuevo') Crear @else Editar @endif Cliente @if ($typecrud != 'Nuevo') / ID: {{ $user->id }} @endif</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <form class="form-aera" wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" wire:model.defer="data.name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellido</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" wire:model.defer="data.lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Celular</label>
                            <input type="tel" name="phone" id="phone" class="form-control" wire:model.defer="data.phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" wire:model.defer="data.email" required>
                        </div>
                        <div class="mb-3">
                            <label for="district" class="form-label">Distrito</label>
                            <input type="text" name="district" id="district" class="form-control" wire:model.defer="data.district" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-5 col-lg-3">
                                <p>Estado</p>
                            </div>
                            <div class="col-12 col-md-7 col-lg-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="status" id="status" wire:model="data.status">
                                    <label class="form-check-label" for="status">{{ $switchLabel }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-grid gap-2 col-6 mx-auto d-none">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    <h3>Foto de perfil</h3>
                    <div class="avatar avatar-crud" wire:ignore>
                        @if($data['photo'] == NULL)
                        <img src="{{ asset('images/admin/client-icon.svg') }}" id="avatar-img" alt>
                        @else
                        <img src="{{ asset('storage/users/'.$data['photo']) }}" id="avatar-img" alt>
                        @endif
                    </div>
                    <div class="controls mt-3 ms-4">
                        <div class="icon edit" data-id="{{ $user->id }}">
                            <p class="mb-0 me-1">Editar</p>
                            <x-admin.icons.edit />
                        </div>
                        <div class="icon delete">
                            <p class="mb-0 me-1">Borrar</p>
                            <x-admin.icons.delete />
                        </div>
                    </div>
                    <input type="file" class="hidden-file invisible">
                    <div class="d-grid gap-2 col-6 mx-auto d-md-none">
                        <button type="button" class="btn btn-primary" wire:click="save">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cropperModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cropper-wrapper">
                        <img style="max-width: 100%; display:block;" id="croppimage" src="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-5" id="cropper-cut">Cortar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            const editBtn = document.querySelector('.edit');
            const deleteBtn = document.querySelector('.delete');
            const hiddenFileInput = document.querySelector('.hidden-file');
            const modal = document.getElementById('cropperModal');
            const cutBtn = document.getElementById('cropper-cut');
            const avatarImage = document.getElementById('avatar-img');
            let canvasBlob;
            let cropper;

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            const cropperModal = new Modal(modal, {
                backdrop: 'static',
                keyboard: false
            });

            editBtn.addEventListener('click', () => {
                hiddenFileInput.click();
            });

            deleteBtn.addEventListener('click', () => {
                Swal.fire({
                    title: 'Borrar foto de Perfil',
                    text: "¿Estás seguro de querer borrar la foto de perfil?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        @this.deletePhoto()
                    }
                });
            });

            hiddenFileInput.onchange = e => {
                const file = e.target.files[0];

                if (!file.type.includes('image/')) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'El archivo debe ser una imagen.'
                    });
                    return;
                }

                if (typeof FileReader === 'function') {
                    const reader = new FileReader();
                    const image = document.getElementById('croppimage');

                    reader.onload = e => {
                        let source = e.target.result;
                        image.src = source;
                        cropper = new Cropper(image, {
                            viewMode: 2,
                            aspectRatio: 1,
                            minContainerWidth: 460,
                            minContainerHeight: 350,
                        });
                    };

                    reader.readAsDataURL(file);
                    cropperModal.show();
                } else {
                    console.log('Sorry, FileReader API not supported');
                    return;
                }
            };

            modal.addEventListener('hide.bs.modal', () => {
                if (cropper) {
                    cropper.destroy();
                }
            });

            modal.addEventListener('show.bs.modal', () => {
                cropper = null;
            });

            cutBtn.addEventListener('click', () => {
                let initialURL;
                let canvas;

                if (cropper) {
                    canvas = cropper.getCroppedCanvas({
                        width: 350,
                        height: 350,
                    });
                    avatarImage.src = canvas.toDataURL('image/jpg');

                    canvas.toBlob(blob => {
                        canvasBlob = blob;
                        cropperModal.hide();

                        @this.upload('imageUploaded', canvasBlob, () => {
                            console.log('imageUploaded');
                        }, (err) => {
                            console.error(err);
                        });
                    });
                }
            });
        });
    </script>
</main>