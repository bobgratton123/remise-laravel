
                    <h1 class="display-4">Créer un nouvel etudiant </h1>
                   
                    <form method="GET">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Nom</label>
                                <input type="text" id="title" class="form-control" name="etudiant_nom"
                                       placeholder="Entrer le titre du message" required>
                            </div>

                            <div class="control-group col-12">
                                <label for="title">adresse</label>
                                <input type="text" id="title" class="form-control" name="adresse"
                                       placeholder="adresse" required>
                            </div>

                            <div class="control-group col-12">
                                <label for="title">phone</label>
                                <input type="text" id="title" class="form-control" name="phone"
                                       placeholder="phone" required>
                            </div>

                            <div class="control-group col-12">
                                <label for="title">email</label>
                                <input type="text" id="title" class="form-control" name="email"
                                       placeholder="email" required>
                            </div>

                            <div class="control-group col-12">
                                <label for="title">date_de_naissance</label>
                                <input type="text" id="title" class="form-control" name="date_de_naissance"
                                       placeholder="date_de_naissance" required>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Créer un Etudiant 
                                </button>
                            </div>
                        </div>
                    </form>

                    222
                    