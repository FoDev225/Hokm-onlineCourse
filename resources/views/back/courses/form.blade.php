@extends('back.layout')

  @section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
  @endsection

@section('main') 
  <div class="container-fluid"> 
    @if(session()->has('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('alert') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
        
          <form method="POST" action="@isset($courses) {{ route('courses.update', $courses->id) }} @else {{ route('courses.store') }} @endisset" enctype="multipart/form-data">
            <div class="card-body">
              @isset($courses) @method('PUT') @endisset
              @csrf   
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="category_id" class="col-form-label text-md-right">Categorie de la formation</label>
                </div>
                  <div class="col-md-12">
                    <select class="form-control" id="category_id" name="category_id" required>
                      <option value="">Veuillez choisir...</option>
                      @foreach(App\Models\Category::get() as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="category_id" class="col-form-label text-md-right">Formateur</label>
                </div>
                  <div class="col-md-12">
                    <select class="form-control" id="user_id" name="user_id" required>
                      <option value="">Veuillez choisir...</option>
                      @foreach(App\Models\User::get() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <x-inputbs4
                name="title"
                type="text"
                label="Titre"
                :value="isset($courses) ? $courses->title : ''"
              ></x-inputbs4>
              <x-inputbs4
                name="slug"
                type="text"
                label="Slug"
                :value="isset($courses) ? $courses->slug : ''"
              ></x-inputbs4>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
              </div>

              <x-inputbs4
                name="price"
                type="text"
                label="Prix"
                :value="isset($courses) ? $courses->price : ''"
                required="true"
              ></x-inputbs4>
          
              <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">
                <label for="image">Image</label>
                @if(isset($courses) && !$errors->has('image'))
                  <div>
                    <p><img src="{{ asset('images/courses/' . $course->image) }}" width="100"></p>
                    <button id="changeImage" class="btn btn-warning">Changer d'image</button>
                  </div>
                @endif
                <div id="wrapper">
                  @if(!isset($courses) || $errors->has('image'))
                    <div class="custom-file">
                      <input type="file" id="image" name="image"
                            class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" required>
                      <label class="custom-file-label" for="image"></label>
                      @if ($errors->has('image'))
                        <div class="invalid-feedback">
                          {{ $errors->first('image') }}
                        </div>
                      @endif
                    </div> 
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="published" name="published" @if(old('published', isset($courses) ? $courses->published : false)) checked @endif>
                  <label class="custom-control-label" for="published">Formation publi??</label>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-12">
                  <a class="btn btn-primary" href="{{ route('courses.index') }}" role="button"><i class="fas fa-arrow-left"></i> Retour ?? la liste des formations</a>
                   <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </div>
              
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
  <script>
    $(document).ready(function() {
      $.extend($.summernote.lang, {
        'fr-FR': {
          font: {
            bold: 'Gras',
            italic: 'Italique',
            underline: 'Soulign??',
            clear: 'Effacer la mise en forme',
            height: 'Interligne',
            name: 'Famille de police',
            strikethrough: 'Barr??',
            superscript: 'Exposant',
            subscript: 'Indice',
            size: 'Taille de police',
          },
          image: {
            image: 'Image',
            insert: 'Ins??rer une image',
            resizeFull: 'Taille originale',
            resizeHalf: 'Redimensionner ?? 50 %',
            resizeQuarter: 'Redimensionner ?? 25 %',
            floatLeft: 'Align?? ?? gauche',
            floatRight: 'Align?? ?? droite',
            floatNone: 'Pas d\'alignement',
            shapeRounded: 'Forme: Rectangle arrondi',
            shapeCircle: 'Forme: Cercle',
            shapeThumbnail: 'Forme: Vignette',
            shapeNone: 'Forme: Aucune',
            dragImageHere: 'Faites glisser une image ou un texte dans ce cadre',
            dropImage: 'Lachez l\'image ou le texte',
            selectFromFiles: 'Choisir un fichier',
            maximumFileSize: 'Taille de fichier maximale',
            maximumFileSizeError: 'Taille maximale du fichier d??pass??e',
            url: 'URL de l\'image',
            remove: 'Supprimer l\'image',
            original: 'Original',
          },
          video: {
            video: 'Vid??o',
            videoLink: 'Lien vid??o',
            insert: 'Ins??rer une vid??o',
            url: 'URL de la vid??o',
            providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion ou Youku)',
          },
          link: {
            link: 'Lien',
            insert: 'Ins??rer un lien',
            unlink: 'Supprimer un lien',
            edit: 'Modifier',
            textToDisplay: 'Texte ?? afficher',
            url: 'URL du lien',
            openInNewWindow: 'Ouvrir dans une nouvelle fen??tre',
          },
          table: {
            table: 'Tableau',
            addRowAbove: 'Ajouter une ligne au-dessus',
            addRowBelow: 'Ajouter une ligne en dessous',
            addColLeft: 'Ajouter une colonne ?? gauche',
            addColRight: 'Ajouter une colonne ?? droite',
            delRow: 'Supprimer la ligne',
            delCol: 'Supprimer la colonne',
            delTable: 'Supprimer le tableau',
          },
          hr: {
            insert: 'Ins??rer une ligne horizontale',
          },
          style: {
            style: 'Style',
            p: 'Normal',
            blockquote: 'Citation',
            pre: 'Code source',
            h1: 'Titre 1',
            h2: 'Titre 2',
            h3: 'Titre 3',
            h4: 'Titre 4',
            h5: 'Titre 5',
            h6: 'Titre 6',
          },
          lists: {
            unordered: 'Liste ?? puces',
            ordered: 'Liste num??rot??e',
          },
          options: {
            help: 'Aide',
            fullscreen: 'Plein ??cran',
            codeview: 'Afficher le code HTML',
          },
          paragraph: {
            paragraph: 'Paragraphe',
            outdent: 'Diminuer le retrait',
            indent: 'Augmenter le retrait',
            left: 'Aligner ?? gauche',
            center: 'Centrer',
            right: 'Aligner ?? droite',
            justify: 'Justifier',
          },
          color: {
            recent: 'Derni??re couleur s??lectionn??e',
            more: 'Plus de couleurs',
            background: 'Couleur de fond',
            foreground: 'Couleur de police',
            transparent: 'Transparent',
            setTransparent: 'D??finir la transparence',
            reset: 'Restaurer',
            resetToDefault: 'Restaurer la couleur par d??faut',
          },
          shortcut: {
            shortcuts: 'Raccourcis',
            close: 'Fermer',
            textFormatting: 'Mise en forme du texte',
            action: 'Action',
            paragraphFormatting: 'Mise en forme des paragraphes',
            documentStyle: 'Style du document',
            extraKeys: 'Touches suppl??mentaires',
          },
          help: {
            'insertParagraph': 'Ins??rer paragraphe',
            'undo': 'D??faire la derni??re commande',
            'redo': 'Refaire la derni??re commande',
            'tab': 'Tabulation',
            'untab': 'Tabulation arri??re',
            'bold': 'Mettre en caract??re gras',
            'italic': 'Mettre en italique',
            'underline': 'Mettre en soulign??',
            'strikethrough': 'Mettre en texte barr??',
            'removeFormat': 'Nettoyer les styles',
            'justifyLeft': 'Aligner ?? gauche',
            'justifyCenter': 'Centrer',
            'justifyRight': 'Aligner ?? droite',
            'justifyFull': 'Justifier ?? gauche et ?? droite',
            'insertUnorderedList': 'Basculer liste ?? puces',
            'insertOrderedList': 'Basculer liste ordonn??e',
            'outdent': 'Diminuer le retrait du paragraphe',
            'indent': 'Augmenter le retrait du paragraphe',
            'formatPara': 'Changer le paragraphe en cours en normal (P)',
            'formatH1': 'Changer le paragraphe en cours en ent??te H1',
            'formatH2': 'Changer le paragraphe en cours en ent??te H2',
            'formatH3': 'Changer le paragraphe en cours en ent??te H3',
            'formatH4': 'Changer le paragraphe en cours en ent??te H4',
            'formatH5': 'Changer le paragraphe en cours en ent??te H5',
            'formatH6': 'Changer le paragraphe en cours en ent??te H6',
            'insertHorizontalRule': 'Ins??rer s??paration horizontale',
            'linkDialog.show': 'Afficher fen??tre d\'hyperlien',
          },
          history: {
            undo: 'Annuler la derni??re action',
            redo: 'Restaurer la derni??re action annul??e',
          },
          specialChar: {
            specialChar: 'Caract??res sp??ciaux',
            select: 'Choisir des caract??res sp??ciaux',
          },
        },
      });
      $('#description').summernote({
        tabsize: 2,
        height: 400,
        lang: 'fr-FR',
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']],
        ],
      });
      @isset($course)
        const content = {!! json_encode($course->description) !!};
        $('#description').summernote('code', content);
      @endisset
    });
  </script>

  <script>
    $(document).ready(() => {
      $('form').on('change', '#image', e => {
        $(e.currentTarget).next('.custom-file-label').text(e.target.files[0].name);
      });
      $('#changeImage').click(e => {
        $(e.currentTarget).parent().hide();
        $('#wrapper').html(`
          <div id="image" class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input" required>
            <label class="custom-file-label" for="image"></label>
          </div>`
        );
      });
    });
  </script>
@endsection