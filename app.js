document.body.classList.toggle('dark-theme-var');


var uploads = document.getElementById('uploads');

function onFile() {
    var me = this,
        file = uploads.files[0],
        name = file.name.replace(/.[^/.]+$/, '');
        window.alert('Uploaded!');
}
