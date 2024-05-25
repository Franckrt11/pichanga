<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">@if ($typecrud == 'Nuevo') Agregar nueva @else <span>Empresa ID: {{ $field->company_id }} / </span> Editar @endif Cancha</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <form class="form-aera">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre de cancha</label>
                                    <input type="text" name="name" id="name" class="form-control" wire:model.defer="data.name" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" wire:model.defer="data.phone" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Celular o Whatsapp</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" wire:model.defer="data.mobile" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="parking" class="form-label">Cantidad de estacionamientos</label>
                                    <input type="text" name="parking" id="parking" class="form-control" wire:model.defer="data.parking" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="size" class="form-label">Medida de la cancha</label>
                                    <input type="text" name="size" id="size" class="form-control" wire:model.defer="data.size" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipo de cancha</label>
                                    <input type="text" name="type" id="type" class="form-control" wire:model.defer="data.type" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="players" class="form-label">Cantidad máxima de jugadores</label>
                                    <input type="text" name="players" id="players" class="form-control" wire:model.defer="data.players" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>Modo de Juego</p>
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div class="d-grid mb-3 check-aera">
                                            <input class="btn-check" type="checkbox" value="5v5" id="modeCheckbox1" wire:model.defer="data.games" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="modeCheckbox1">5 vs 5</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="d-grid mb-3 check-aera">
                                            <input class="btn-check" type="checkbox" value="6v6" id="modeCheckbox2" wire:model.defer="data.games" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="modeCheckbox2">6 vs 6</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="d-grid mb-3 check-aera">
                                            <input class="btn-check" type="checkbox" value="7v7" id="modeCheckbox3" wire:model.defer="data.games" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="modeCheckbox3">7 vs 7</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="d-grid mb-3 check-aera">
                                            <input class="btn-check" type="checkbox" value="8v8" id="modeCheckbox4" wire:model.defer="data.games" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="modeCheckbox4">8 vs 8</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="d-grid mb-3 check-aera">
                                            <input class="btn-check" type="checkbox" value="9v9" id="modeCheckbox5" wire:model.defer="data.games" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="modeCheckbox5">9 vs 9</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="d-grid mb-3 check-aera">
                                            <input class="btn-check" type="checkbox" value="11v11" id="modeCheckbox6" wire:model.defer="data.games" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="modeCheckbox6">11 vs 11</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Pais</label>
                                    <input type="text" name="country" id="country" class="form-control" wire:model.defer="data.country" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="city" class="form-label">Ciudad</label>
                                    <input type="text" name="city" id="city" class="form-control" wire:model.defer="data.city" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="district" class="form-label">Distrito</label>
                                    <input type="text" name="district" id="district" class="form-control" wire:model.defer="data.district" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Dirección</label>
                                    <input type="text" name="address" id="address" class="form-control" wire:model.defer="data.address" required>
                                </div>
                            </div>
                            <div class="col-12" >
                                <p>Ubicación</p>
                                <div class="mb-3" data-component="map-picker" data-props="{{ $data['map_latitude'] }},{{ $data['map_longitude'] }}">
                                    <div class="map-container" id="map"></div>
                                </div>
                            </div>
                        </div>
                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                        <div class="d-grid col-6 mx-auto mt-4">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Foto de portada</h3>
                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                        <button type="button" class="btn btn-primary btn-sm px-4" id="add-portrait">AGREGAR FOTO</button>
                        @endif
                    </div>
                    <div class="avatar avatar-crud" wire:ignore>
                        @if($data['portrait'] == NULL)
                        <img src="{{ asset('images/admin/client-icon.svg') }}" id="avatar-img" alt>
                        @else
                        <img src="{{ asset('storage/fields/'.$data['portrait']) }}" id="avatar-img" alt>
                        @endif
                    </div>
                    <input type="file" class="hidden-file invisible">
                    @if ($typecrud != 'Nuevo')
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Galería</h3>
                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                        <button type="button" class="btn btn-primary btn-sm px-4" id="add-gallery">AGREGAR FOTOS</button>
                        @endif
                    </div>
                    <div class="row">
                        @foreach ($images as $image)
                        <div class="col-6 col-md-4 col-lg-3" wire:key="image-{{ $image->id }}">
                            <div class="avatar avatar-crud-full">
                                <img src="{{ asset('storage/fields/'.$image->filename) }}" id="avatar-img" alt>
                            </div>
                            <div class="controls justify-content-center mt-3">
                                @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                                <div class="icon delete" data-id="{{ $image->id }}">
                                    <p class="mb-0 me-1">Borrar</p>
                                    <x-admin.icons.delete />
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
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
            const addPortraitBtn = document.getElementById('add-portrait');
            @if ($typecrud != 'Nuevo')
            const addGalleryBtn = document.getElementById('add-gallery');
            @endif
            const deleteBtns = document.querySelectorAll('.delete');

            const hiddenFileInput = document.querySelector('.hidden-file');
            const avatarImage = document.getElementById('avatar-img');

            const modal = document.getElementById('cropperModal');
            const cutBtn = document.getElementById('cropper-cut');

            const googleMap = document.getElementById("map");
            const formAera = document.querySelector('.form-aera');

            let canvasBlob;
            let cropper;
            let cropperType = false;

            const inputEvent = () => {
                hiddenFileInput.click();
            };

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

            const uploads = {
                portrait: blob => {
                    @this.upload('portraitUploaded', blob, () => {
                        console.log('portraitUploaded');
                    }, (err) => {
                        console.error(err);
                    });
                },
                gallery: blob => {
                    @this.upload('galleryUploaded', blob, () => {
                        @this.saveImage();
                    }, (err) => {
                        console.error(err);
                    });
                },
            };

            addPortraitBtn.addEventListener('click', () => {
                cropperType = 'portrait';
                hiddenFileInput.click();
            });
            @if ($typecrud != 'Nuevo')
            addGalleryBtn.addEventListener('click', () => {
                cropperType = 'gallery';
                hiddenFileInput.click();
            });
            @endif

            hiddenFileInput.onchange = e => {
                if (!cropperType) return;

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
                cropperType = false;
            });

            modal.addEventListener('show.bs.modal', () => {
                cropper = null;
            });

            cutBtn.addEventListener('click', () => {
                let canvas;

                if (cropper) {
                    canvas = cropper.getCroppedCanvas({
                        width: 350,
                        height: 350,
                    });

                    if (cropperType === 'gallery') {
                        canvas.toBlob(blob => {
                            canvasBlob = blob;
                            cropperModal.hide();
                            uploads.gallery(canvasBlob);
                        });

                    }

                    if (cropperType === 'portrait') {
                        avatarImage.src = canvas.toDataURL('image/jpg');
                        canvas.toBlob(blob => {
                            canvasBlob = blob;
                            cropperModal.hide();
                            uploads.portrait(canvasBlob);
                        });
                    }
                }
            });

            deleteBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.dataset.id;

                    Swal.fire({
                        title: 'Borrar foto de Galería',
                        text: "¿Estás seguro de querer borrar la foto?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si'
                    }).then((result) => {
                        if (result.value) {
                            @this.deleteImage(id)
                        }
                    });
                });
            });

            formAera.addEventListener('submit', (event) => {
                event.preventDefault();
                let savedMarker = document.querySelector('[data-component="map-picker"]');
                let marker = googleMap.dataset.marker ? googleMap.dataset.marker : savedMarker.dataset.props;
                @this.save(marker);
            });
        });
    </script>
</main>
