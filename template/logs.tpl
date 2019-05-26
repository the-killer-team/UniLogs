<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>uLogs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='/assets/css/bootstrap.min.css'>
</head>
<body>
{include file='../template/header.tpl'}

    <div class="container">
        {foreach from=$logs item=myLogs}
        <article>
            <h3>{$myLogs.title}</h3>
            <span>Le {$myLogs.date|date_format:"%d %B %Y à %H:%M"} <br /><div class="badge badge-primary text-white">Auteur: <var>{$myLogs.author}</var></div></span>
            <br />
            <br />
            <a href="{$link->getImageLogsLink($myLogs.image)}"><img src="/upload/200-{$link->getImageLink($myLogs.title)}.jpg" class="rounded img-fluid" alt="..."></a>
            <br />
            <br />
            <kbd>{$myLogs.content}</kbd>
            <br />
            <br />
            
        </article>
        {/foreach}
        <br />

        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Modifier</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Supprimer</button>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">{$myLogs.title}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                            
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="recipient-name"  class="col-form-label">Titre:</label>
                                <input type="text" class="form-control" name="title" value="{$myLogs.title}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="content" >{$myLogs.content}</textarea>
                            </div>

                                                        <div class="form-group">
                                <label for="message-text" class="col-form-label">Auteur:</label>
                                <textarea class="form-control" name="author" >{$myLogs.author}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text"  class="col-form-label">Catégorie:</label>
                                <select class="custom-select" name="idCategory" id="category">
                                    {foreach from=$myCategory item=category}
                                    <option value="{$category.idCategory}">{$category.category}</option>
                                    {/foreach}
                                </select>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="updateLogs" class="btn btn-primary">Modifier</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModallabel">{$myLogs.title}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>Êtes-vous sur de vouloir supprimer ce logs ?</p>
                    </div>

                    <div class="modal-footer">
                        <form method="POST" enctype="multipart/form-data">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" name="deleteLogs" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
</body>
</html>