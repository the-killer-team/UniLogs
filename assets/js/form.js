function init()
{
    document.formValid.title.getElementById = "";
    document.formValid.content.getElementById = "";
    document.formValid.author.getElementById = "";
    document.formValid.idCategory.getElementById = "";
    document.formValid.imageLogs.getElementById = "";
    document.getElementById("error").innerHTML = "";
    document.getElementById('error').style.display = "none";
}

function validate()
{
    init();

    // verification du titre
    var title = document.formValid.title.value;
    if(title == '')
    {
        document.getElementById("error").innerHTML += "<p>Veuillez ajouter un titre.</p>";
        document.getElementById('error').style.display = "block";
    }
    else if(title.length < 7)
    {
        document.getElementById("error").innerHTML += "<p>Le titre est trop court.</p>";
        document.getElementById('error').style.display = "block";
    }
    
   // Verification du contenu
    var content = document.formValid.content.value;
    if(content == '')
    {
        document.getElementById("error").innerHTML += "<p>Le  contenu n'est pas rempli.</p>";
        document.getElementById('error').style.display = "block";
    }
    
    else if(content.length > 240)
    {
        document.getElementById("error").innerHTML += "<p>Le  contenu est trop long.</p>";
        document.getElementById('error').style.display = "block";
    }

    // Verification de l'image
    var image = document.formValid.imageLogs.value;
    if(image == '')
    {
        document.getElementById("error").innerHTML += "<p>ajoutez une image.</p>";
        document.getElementById('error').style.display = "block";
    }
}