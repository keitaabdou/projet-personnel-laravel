<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajout d'un article</h5>

              </div>
              <div class="modal-body">
                <div class="d-flex">
                    <div class="my-4 bg-gray-light p-3 flex-grow-1">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Numero de serie</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <select class="form-control">
                                <option value=""></option>
                                <option value="1">Disponible</option>
                                <option value="0">Indisponible</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="form-group">
                            <input type="file">
                        </div>
                        <div style="border: 1px solid #d0d1d3; border-radius:20px; height: 80%;">

                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="closeModal">Fermer</button>
              </div>
        </div>
    </div>

</div>
