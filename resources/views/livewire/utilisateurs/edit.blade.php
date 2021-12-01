<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateUser()" method="POST">
            <div class="card-body">

                <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Nom</label>
                        <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid @enderror">

                        @error("editUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Prenom</label>
                        <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid @enderror">

                        @error("editUser.prenom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label >Sexe</label>
                    <select class="form-control @error('editUser.sexe') is-invalid @enderror" wire:model="editUser.sexe">
                        <option value="">---------</option>
                        <option value="H">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                    @error("editUser.sexe")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label >Adresse e-mail</label>
                    <input type="text" class="form-control @error('editUser.email') is-invalid @enderror" wire:model="editUser.email">
                    @error("editUser.email")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Telephone 1</label>
                        <input type="text" class="form-control @error('editUser.telephone1') is-invalid @enderror" wire:model="editUser.telephone1">
                        @error("editUser.telephone1")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Telephone 2</label>
                        <input type="text" class="form-control" wire:model="editUser.telephone2">
                    </div>
                </div>

                <div class="form-group">
                    <label >Piece d'identité</label>
                    <select class="form-control @error('editUser.pieceIdentite') is-invalid @enderror" wire:model="editUser.pieceIdentite">
                        <option value="">---------</option>
                        <option value="CNI">CNI</option>
                        <option value="PASSPORT">PASSPORT</option>
                        <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                    </select>
                    @error("editUser.pieceIdentite")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label >Numero de piece d'identité</label>
                    <input type="text" class="form-control @error('editUser.numeroPieceIdentite') is-invalid @enderror" wire:model="editUser.numeroPieceIdentite">
                    @error("editUser.numeroPieceIdentite")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    </div>
                <div class="col-6">
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Réinitialisation de mot de passe</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="" class="btn btn-link" wire:click.prevent="confirmPwdReset">Réinitialiser le mot de passe</a>
                                <span>(Par défaur: "password")</span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-fingerprint fa-2x"></i> Roles & permissions</h3>
                    </div>
                    <div class="card-body">
                        <div class="accordion">
                            @foreach($rolePermissions["roles"] as $role)
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="card-title flex-grow-1">
                                        <a data-parent="#accordion" href="#" aria-expanded="true">
                                            {{$role["role_nom"]}}
                                        </a>
                                    </h4>
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch">
                                        <label for="customSwitch" class="custom-control-label"> Activé</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-3">
                        <table class="table table-bordered">
                            <thead>
                                <th>Permissions</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ajouter un client</td>
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchPermission">
                                            <label for="customSwitchPermission" class="custom-control-label"> Activé</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

