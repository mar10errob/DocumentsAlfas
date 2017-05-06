
function load()
{
    var title = document.getElementById('title');
    title.style.left = "-19%";

    setTimeout( function() {
        var inputs = document.getElementById('inputs');
        inputs.style.visibility ="visible";
        inputs.style.opacity = "1";
    },200);
}