<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-gradient-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des articles</h3>

          <div class="card-tools d-flex align-items-center ">
          <a class="btn btn-link text-white mr-4 d-block" wire:click="toggleShowAddTypeArticleForm"><i class="fas fa-user-plus"></i> Nouveau un article</a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th ></th>
                <th >Article</th>
                <th class="text-center">Type</th>
                <th class="text-center">Etat</th>
                <th  class="text-center">Ajouté</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>
                            <img src="{{asset('images/imageplaceholder.png')}}" alt="" style="width:60px;height:60px;">
                        </td>
                        <td>{{$article->nom}} - {{$article->noSerie}}</td>
                        <td class="text-center">{{$article->nom}}</td>
                        <td class="text-center">
                            @if($article->estDisponible)
                                <span class="badge badge-success">Disponible</span>
                            @else
                            <span class="badge badge-success">Indisponible</span>
                            @endif
                        </td>
                        <td class="text-center">{{optional($article->created_at)->diffForHumans()}}</td>
                        <td class="text-center">
                            <button class="btn btn-link" wire:click="editArticle({{$article->id}})"> <i class="far fa-edit"></i> </button>

                            <button class="btn btn-link" wire:click="confirmDelete({{$article->id}})"> <i class="far fa-trash-alt"></i> </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="float-right">
              {{ $articles->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>
