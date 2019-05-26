<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>uLogs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/bootstrap.min.css'>
    <style>  
    #error {
        display: none;
    }
    </style>

    <script>
    function prettySubmit(form, evt) {
    evt.preventDefault();
    window.location = form.action + '/' + form.q.value.replace(/ /g, '+');
    return false;
    }
    </script>

    <script src="assets/js/form.js"></script>
</head>
<body>
    {include file='template/header.tpl'}

    <div class="container">
    <div class="alert alert-danger error" id="error"></div>
        <h4 class="mb-3">Résultats de recherche</h4>
            <div class="mb-5" id="result-search"></div>

        <h4 class="mb-3">Ajouter un logs</h4>
        <form name="formValid" onsubmit="validate();return false;" action="/index" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Titre</span>
                </div>
            <input type="text" class="form-control" placeholder="Titre du logs" name="title" id="title">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contenu</span>
                </div>
            <textarea type="text" class="form-control" placeholder="Description..." name="content" id="content"></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Auteur</span>
                </div>
            <input type="text" class="form-control" placeholder="Auteur du logs" name="author" id="author">
            </div>            

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                </div>
                <select class="custom-select" name="idCategory" id="idCategory">
                {foreach from=$myCategory item=category}
                <option value="{$category.idCategory}">{$category.category}</option>
                {/foreach}
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Télécharger</span>
                </div>
                
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    <input type="file" class="custom-file-input" name="imageLogs" id="imageLogs" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01" data-browse="Rechercher">Choisir un fichier</label>
                </div>
            </div>

            <div class="input-group mb-5">
                <button type="submit" class="btn btn-primary" name="addLogs" onclick="validate">Ajouter</button>
            </div>              
        </form>
        
        <a href="/author"><button type="submit" class="float-right btn btn-dark" name="addLogs"><var>Voir les logs par auteur</var></button></a> 

        <h4 class="mb-3">Logs</h4>

        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
            <div class="card-header bg-danger">
                <h4 class="font-weight-normal text-white">A faire</h4>
            </div>

            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4" id="sortable1" class="connectedSortable">
                    {foreach from=$logs1 item=logs}
                        <li><a href="/logs/{$logs.idLogs}">{$logs.title}</a></li>
                    {/foreach}

                    {if !$logs1}
                        <li>Aucun logs.</li>
                    {/if}  
                </ul>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="font-weight-normal text-white">En cours</h4>
            </div>

            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4" id="sortable2" class="connectedSortable">
                    {foreach from=$logs2 item=logs}
                    <li><a href="/logs/{$logs.idLogs}">{$logs.title}</a></li>
                    {/foreach}

                    {if !$logs2}
                        <li>Aucun logs.</li>
                    {/if}                    
                </ul>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success">
                <h4 class="font-weight-normal text-white">Fini</h4>
            </div>

        <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4" id="sortable3" class="dropfalse">
                {foreach from=$logs3 item=logs}
                <li><a href="/logs/{$logs.idLogs}">{$logs.title}</a></li>
                {/foreach}

                    {if !$logs3}
                        <li>Aucun logs.</li>
                    {/if}                 
            </ul>
            </div>
        </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script src="assets/js/search.js"></script>
</body>
</html>